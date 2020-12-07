<?php

namespace App\Http\Controllers;

use Request;
use App\JenisSubKategori; 
use App\SubKategori; 
use App\Kategori; 
use App\Program;
use App\Agensi;
use App\ProgramMaster;
use App\KumpulanSasar;
use App\ProgramKumpulanSasar;
use App\Teras;
use App\Kekerapan;
use App\Manfaat;
use App\User;
use App\AuditTrailPortal;
use App\Http\Requests\PortalRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Adrianorosa\GeoLocation\GeoLocation;

class PortalController extends Controller
{
    public function index(PortalRequest $request)
    {

        // dd($details);
        $banner = DB::table('media')->where([['status', 2],['jenis',2]])->get();
        $berita = DB::table('media')->where([['status', 2],['jenis',1]])->get();

        $berita_data = [];
        $no = 1;
        $no_page = 1;
        
        foreach($berita as $berita_val){
            $berita_data[$no_page][$no]['tajuk'] = $berita_val->tajuk;
            $berita_data[$no_page][$no]['keterangan'] = $berita_val->keterangan;
            
            if($no % 3 == 0){
                $no_page++;
            }
            $no++;
        }
        $kategori_data = '0';
        $user_kategori = '0';
        $nama_kategori = '0';
        
        if($request->all()){
            if($request->user_age <= 18){
                $user_kategori = '1';
                $nama_kategori = 'Kanak-kanak';
            }else if($request->user_age > 18 && $request->user_age <= 59){
                $user_kategori = '2';
                $nama_kategori = 'Dewasa';
            }else if($request->user_age >= 60){
                $user_kategori = '3';
                $nama_kategori = 'Warga Emas';
            }

            $kategori = DB::table('program_kumpulan_sasar')
                ->leftJoin('kumpulan_sasar', 'kumpulan_sasar.id', '=', 'program_kumpulan_sasar.kumpulan_sasar_id')
                ->leftJoin('program', 'program.id', '=', 'program_kumpulan_sasar.program_id')
                ->select('program.*')
                ->where('kumpulan_sasar.id',$user_kategori)
                ->get();
            
            $kategori_id = [];
            foreach($kategori as $k_id => $k_val){
                if(!empty($k_val->id)){
                    $kategori_id[] = $k_val->kategori_id;
                }
            }               

            $kategori_id = array_unique($kategori_id);

            $no_run = 1;
            if(!empty($kategori_id)){
                foreach($kategori_id as $qwe){
                    if($no_run == 1){
                        $kat_id = $qwe;
                    }else{
                        $kat_id .= ",".$qwe;
                    }
                    $no_run++;
                }

                $mysql = "select * from kategori
                where id in (".$kat_id.")";
                // .[$kategori_id];
    
                $kategori_data = DB::select($mysql);

            }else{
                $kat_id = 0;
                $kategori_data = "NA";
            }

        }
        // dd($berita_data);
        return view('portals.index',[
            'banner'=>$banner,
            'berita'=>$berita_data,
            'kategori_data'=>$kategori_data,
            'user_kategori'=>$user_kategori,
            'nama_kategori'=>$nama_kategori
            ]
        );
    }

    public function program_list($kump_sasar,$kategori_id){

        $kategori_kanak = "(10,1,2,3)";
        $kategori_dewasa = "(1,2,3,4,5,6,7,8,9)";
        $kategori_emas = "(2,3,4,5)";

        if($kategori_id == 0){
            if($kump_sasar == 1){
                $kategori_id = 1;
            }else if($kump_sasar == 2){
                $kategori_id = 1;
            }else if($kump_sasar == 3){
                $kategori_id = 2;
            }
        }

        $mysql_kanak = "select * from kategori
        where id in ".$kategori_kanak;
        $kategori_data_kanak = DB::select($mysql_kanak);

        $mysql_dewasa = "select * from kategori
        where id in ".$kategori_dewasa;
        $kategori_data_dewasa = DB::select($mysql_dewasa);

        $mysql_emas = "select * from kategori
        where id in ".$kategori_emas;
        $kategori_data_emas = DB::select($mysql_emas);

        $mysql_program = "select * from program
        where kategori_id = ".$kategori_id;
        $program_data = DB::select($mysql_program);

        $program_data = DB::table('program_kumpulan_sasar')
        ->leftJoin('kumpulan_sasar', 'kumpulan_sasar.id', '=', 'program_kumpulan_sasar.kumpulan_sasar_id')
        ->leftJoin('program', 'program.id', '=', 'program_kumpulan_sasar.program_id')
        ->select('program.*')
        ->where([['program.kategori_id',$kategori_id],['kumpulan_sasar.id',$kump_sasar]])
        ->paginate(10);
        // ->get();

        // dd($program_data);

        $kump_sasar_data = KumpulanSasar::find($kump_sasar);
        $kategori_data = Kategori::find($kategori_id);

        return view('portals.program-list',
        [
            'program_data'=>$program_data,
            'kategori_data_kanak'=>$kategori_data_kanak,
            'kategori_data_dewasa'=>$kategori_data_dewasa,
            'kategori_data_emas'=>$kategori_data_emas,
            'kump_sasar_data'=>$kump_sasar_data,
            'kategori_data'=>$kategori_data,
            'kump_sasar'=>$kump_sasar,
            'kategori_id'=>$kategori_id
        ]);
    }

    public function program_detail($kump_sasar,$kategori_id,$pid){

        // log
        $log = [
            'program_id'=>$pid
        ];
        $this->log_audit_trail($log);

        $kategori_kanak = "(10,1,2,3)";
        $kategori_dewasa = "(1,2,3,4,5,6,7,8,9)";
        $kategori_emas = "(2,3,4,5)";

        $mysql_kanak = "select * from kategori
        where id in ".$kategori_kanak;
        $kategori_data_kanak = DB::select($mysql_kanak);

        $mysql_dewasa = "select * from kategori
        where id in ".$kategori_dewasa;
        $kategori_data_dewasa = DB::select($mysql_dewasa);

        $mysql_emas = "select * from kategori
        where id in ".$kategori_emas;
        $kategori_data_emas = DB::select($mysql_emas);

        $mysql_program = "select * from program
        where kategori_id = ".$kategori_id;
        $program_data = DB::select($mysql_program);

        //////// get program data
        $program_data = DB::table('program')
        ->leftJoin('manfaat','manfaat.id','=','program.manfaat_id')
        ->leftJoin('kekerapan','kekerapan.id','=','program.kekerapan_id')
        ->leftJoin('kategori','kategori.id','=','program.kategori_id')
        ->leftJoin('agensi','agensi.id','=','program.agensi_id')
        ->select('program.*',
                'manfaat.nama as manfaat_nama',
                'kekerapan.nama as kekerapan_nama',
                'kategori.nama_kategori as kategori_nama',
                'agensi.nama as agensi_nama'
                )
        ->where('program.id', $pid)
        ->get()->first();

        $agensi_data = Agensi::find($program_data->agensi_id);
        // dd($agensi_data);

        $pks_data = DB::table('program_kumpulan_sasar')
            ->leftJoin('kumpulan_sasar','kumpulan_sasar.id','=','program_kumpulan_sasar.kumpulan_sasar_id')
            ->select('program_kumpulan_sasar.*','kumpulan_sasar.nama as ks_nama')
            ->where('program_kumpulan_sasar.program_id', $pid)
            ->get();
        
        foreach($pks_data as $pks_k => $pks_val){
            $pks[] = $pks_val->kumpulan_sasar_id;
        }

        $sub_kategori = DB::table('program_master')
            ->leftjoin('sub_kategori', 'sub_kategori.id', '=', 'program_master.sub_kategori_id')
            ->leftjoin('jenis_sub_kategori', 'jenis_sub_kategori.id', '=', 'program_master.jenis_sub_kategori_id')
            ->select( 
                'sub_kategori.id as sub_kat_id', 
                'sub_kategori.nama_sub_kategori')
            ->where('program_master.program_id', $pid)
            ->get();
        
            $sub_kategori_data = [];
        foreach($sub_kategori as $sk_val){
            $sub_kategori_data[$sk_val->sub_kat_id]['id'] = $sk_val->sub_kat_id;
            $sub_kategori_data[$sk_val->sub_kat_id]['nama'] = $sk_val->nama_sub_kategori;
        }

        $prog_master = DB::table('program_master')
            ->leftjoin('program', 'program.id', '=', 'program_master.program_id')
            ->leftjoin('sub_kategori', 'sub_kategori.id', '=', 'program_master.sub_kategori_id')
            ->leftjoin('jenis_sub_kategori', 'jenis_sub_kategori.id', '=', 'program_master.jenis_sub_kategori_id')
            ->select( 'program_master.*', 
                'sub_kategori.id as sub_kat_id', 
                'sub_kategori.nama_sub_kategori', 
                'jenis_sub_kategori.id as jenis_sub_cat_id',
                'jenis_sub_kategori.nama_jenis_sub_kategori as jenis_sub_cat_name')
            ->where('program_master.program_id', $pid)
            ->get();

            // dd($prog_master);
    
        //////// end get program data

        $kump_sasar_data = KumpulanSasar::find($kump_sasar);
        $kategori_data = Kategori::find($kategori_id);

        return view('portals.program-detail',
        [
            'sub_kategori_data'=>$sub_kategori_data,
            'prog_master'=>$prog_master,
            'program_data'=>$program_data,
            'kategori_data_kanak'=>$kategori_data_kanak,
            'kategori_data_dewasa'=>$kategori_data_dewasa,
            'kategori_data_emas'=>$kategori_data_emas,
            'kump_sasar_data'=>$kump_sasar_data,
            'kategori_data'=>$kategori_data,
            'kump_sasar'=>$kump_sasar,
            'kategori_id'=>$kategori_id
        ]);
    }


    public function bantuan_sosial(){
        return view('portals.bantuan-sosial');
    }

    public function insuran_sosial(){
        return view('portals.insuran-sosial');
    }

    public function inetrvensi_pasaran_buruh(){
        return view('portals.intervensi-pasaran-buruh');
    }

    public function pengurusan_data(){
        return view('portals.pengurusan-data');
    }

    public function faq(){
        return view('portals.faq');
    }

    public function contact_us(){
        return view('portals.contact-us');
    }

    public function log_audit_trail($log){

        // $userid = auth()->user()->id; 
        // $role_id = auth()->user()->role_id; 
        // $agensi_id = auth()->user()->agensi_id; 
        $ip_address = Request::ip();
        $details = GeoLocation::lookup($ip_address);

        $auditTrail = new AuditTrailPortal;
        $auditTrail->program_id = $log['program_id'];
        $auditTrail->city = $details->getCity();
        $auditTrail->region = $details->getRegion();
        $auditTrail->country = $details->getCountry();
        $auditTrail->ip_address = $ip_address;
        // $auditTrail->created_by = $userid;
        $auditTrail->created_at = now();
        // $auditTrail->updated_by = $userid;
        $auditTrail->updated_at = now();
        $auditTrail->save();
        
        return $auditTrail;
    } 
}
