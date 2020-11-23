<?php

namespace App\Http\Controllers;

use Request;
use Gate;
use App\Profil;
use App\Program;
use App\Agensi;
use App\AuditTrail;
use App\Http\Requests\ProgramRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Excel;
use PDF;

class LaporanProgramBantuanController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Profil::class);
    }

    public function index(ProgramRequest $request)
    {
        $user_id = auth()->user()->id; 
        $role_id = auth()->user()->role_id; 
        $agensi_id = auth()->user()->agensi_id; 

        if($role_id == '2'){
            $program = DB::table('program')->where('agensi_id', $agensi_id)->get();
        }else if ($role_id == '3'){
        //     $agensi = Agensi::all();
            $program = DB::table('program')->where('rekod_oleh',$user_id)->get();
        }else if($role_id == '1'){
            $program = Program::all();
        }

        if($request->all() != []){
            
            if($request->program != '00'){
                $prog_sql = " a.id = ".$request->program;
                $req_program = $request->program;
            }else{
                $prog_sql = '';
                $req_program = $request->program;
            }

            if($role_id == '2'){
                $and = ($prog_sql!= ''?' and':'');
                $agensi_sql = $and." a.agensi_id = ".$agensi_id;
            }else if ($role_id == '3'){
                $and = ($prog_sql!= ''?' and':'');
                $agensi_sql = $and." a.rekod_oleh = ".$user_id;
            }


            $psql = "
                select a.*,b.`nama` as nama_teras,
                c.`nama` as nama_kekerapan,
                d.`nama_kategori` as nama_kategori
                from program a 
                left join teras b on a.`teras_id` = b.`id`
                left join kekerapan c on a.`kekerapan_id` = c.`id`
                left join kategori d on a.`kategori_id` = d.`id`
                where ".$prog_sql.$agensi_sql;
            $laporan = DB::select($psql);

            $laporan_data = [];

            foreach($laporan as $program_key => $program_val){
                
                $programId = $program_val->id;
                $programNama = $program_val->nama;
                $programTeras = $program_val->nama_teras;
                $programKekerapan = $program_val->nama_kekerapan;
                $programKategori = $program_val->nama_kategori;
                // dd($program_val);

                $pks_data = DB::table('program_kumpulan_sasar')
                ->leftJoin('kumpulan_sasar','kumpulan_sasar.id','=','program_kumpulan_sasar.kumpulan_sasar_id')
                ->select('program_kumpulan_sasar.*','kumpulan_sasar.nama as ks_nama')
                ->where('program_kumpulan_sasar.program_id', $program_val->id)
                ->get();

                $pks_str = '';
                $no = 1;
                foreach($pks_data as $pks_val){
                    if($no == 1){
                        $pks_str .= $pks_val->ks_nama;
                    }else{
                        $pks_str .= ", ".$pks_val->ks_nama;
                    }
                    $no++;
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
                ->where('program_master.program_id', $program_val->id)
                ->get();

                $prog_str = '';
                $no = 1;
                foreach($prog_master as $prog_val){
                    if($no == 1){
                        $prog_str .= $prog_val->jenis_sub_cat_name;
                    }else{
                        $prog_str .= ", ".$prog_val->jenis_sub_cat_name;
                    }
                    $no++;
                }

                $aktif_sql = "select count(id) as bilangan from bantuan where program_id = ".$program_val->id." and status_bantuan_id = 1";
                $aktif_penerima = DB::select($aktif_sql);
                $bilangan_aktif = ( array ) $aktif_penerima[0];

                $tak_aktif_sql = "select count(id) as bilangan from bantuan where program_id = ".$program_val->id." and status_bantuan_id = '2'";
                $tak_aktif_penerima = DB::select($tak_aktif_sql);
                $bilangan_tidak_aktif = (array)$tak_aktif_penerima[0];

                $laporan_data[$programId]['id'] = $programId;
                $laporan_data[$programId]['nama'] = $programNama;
                $laporan_data[$programId]['teras'] = $programTeras;
                $laporan_data[$programId]['kump_sasar'] = $pks_str;
                $laporan_data[$programId]['sub_kategori'] = $prog_str;
                $laporan_data[$programId]['kategori'] = $programKategori;
                $laporan_data[$programId]['kakerapan'] = $programKekerapan;
                $laporan_data[$programId]['jumlah_aktif'] = $bilangan_aktif;
                $laporan_data[$programId]['jumlah_tidak_aktif'] = $bilangan_tidak_aktif;
                
            }

            // log data
            $log = [
                'task'=>'laporan program bantuan',
                'details'=>'Carian Laporan program bantuan',
                'entity_id'=>'0'
            ];
            $this->log_audit_trail($log);

            return view('laporan-program-bantuan.index', [
                'laporan' => $laporan_data,
                'program'=>$program,
                'req_program'=>$req_program,
            ]);
        }

        // log data
        $log = [
            'task'=>'laporan program bantuan',
            'details'=>'Halaman Laporan program bantuan',
            'entity_id'=>'0'
        ];
        $this->log_audit_trail($log);

        $req_program = '00';
        $req_agensi = '00';

        return view('laporan-program-bantuan.index',[
            'program'=>$program,
            'req_program'=>$req_program,
            'req_agensi'=>$req_agensi
        ]);
    }

    public function excel($program_id){

        // log data
        $log = [
            'task'=>'laporan program bantuan',
            'details'=>'Eksport excel Laporan program bantuan',
            'entity_id'=>'0'
        ];
        $this->log_audit_trail($log);

        $user_id = auth()->user()->id; 
        $role_id = auth()->user()->role_id; 
        $agensi_id = auth()->user()->agensi_id; 

        if($program_id != '00'){
            $prog_sql = " a.id = ".$program_id;
            $req_program = $program_id;
        }else{
            $prog_sql = '';
            $req_program = $program_id;
        }

        if($role_id == '2'){
            $and = ($prog_sql!= ''?' and':'');
            $agensi_sql = $and." a.agensi_id = ".$agensi_id;
        }else if ($role_id == '3'){
            $and = ($prog_sql!= ''?' and':'');
            $agensi_sql = $and." a.rekod_oleh = ".$user_id;
        }

        $psql = "
            select a.*,b.`nama` as nama_teras,
            c.`nama` as nama_kekerapan,
            d.`nama_kategori` as nama_kategori
            from program a 
            left join teras b on a.`teras_id` = b.`id`
            left join kekerapan c on a.`kekerapan_id` = c.`id`
            left join kategori d on a.`kategori_id` = d.`id`
            where ".$prog_sql.$agensi_sql;
        $laporan = DB::select($psql);


        $laporan_data = [];

        foreach($laporan as $program_key => $program_val){
            
            $programId = $program_val->id;
            $programNama = $program_val->nama;
            $programTeras = $program_val->nama_teras;
            $programKekerapan = $program_val->nama_kekerapan;
            $programKategori = $program_val->nama_kategori;

            $pks_data = DB::table('program_kumpulan_sasar')
            ->leftJoin('kumpulan_sasar','kumpulan_sasar.id','=','program_kumpulan_sasar.kumpulan_sasar_id')
            ->select('program_kumpulan_sasar.*','kumpulan_sasar.nama as ks_nama')
            ->where('program_kumpulan_sasar.program_id', $program_val->id)
            ->get();

            $pks_str = '';
            $no = 1;
            foreach($pks_data as $pks_val){
                if($no == 1){
                    $pks_str .= $pks_val->ks_nama;
                }else{
                    $pks_str .= ", ".$pks_val->ks_nama;
                }
                $no++;
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
            ->where('program_master.program_id', $program_val->id)
            ->get();

            $prog_str = '';
            $no = 1;
            foreach($prog_master as $prog_val){
                if($no == 1){
                    $prog_str .= $prog_val->jenis_sub_cat_name;
                }else{
                    $prog_str .= ", ".$prog_val->jenis_sub_cat_name;
                }
                $no++;
            }

            $aktif_sql = "select count(id) as bilangan from bantuan where program_id = ".$program_val->id." and status_bantuan_id = 1";
            $aktif_penerima = DB::select($aktif_sql);
            $bilangan_aktif = ( array ) $aktif_penerima[0];

            $tak_aktif_sql = "select count(id) as bilangan from bantuan where program_id = ".$program_val->id." and status_bantuan_id = '2'";
            $tak_aktif_penerima = DB::select($tak_aktif_sql);
            $bilangan_tidak_aktif = (array)$tak_aktif_penerima[0];

            $laporan_data[$programId]['nama'] = $programNama;
            $laporan_data[$programId]['teras'] = $programTeras;
            $laporan_data[$programId]['kategori'] = $programKategori;
            $laporan_data[$programId]['kump_sasar'] = $pks_str;
            $laporan_data[$programId]['sub_kategori'] = $prog_str;
            $laporan_data[$programId]['kakerapan'] = $programKekerapan;
            $laporan_data[$programId]['jumlah_aktif'] = ($bilangan_aktif['bilangan']!='0'?$bilangan_aktif['bilangan']:'0');
            $laporan_data[$programId]['jumlah_tidak_aktif'] = ($bilangan_tidak_aktif['bilangan']!='0'?$bilangan_tidak_aktif['bilangan']:'0');
        }
        
        return Excel::download(new ProgramBantuanExport($laporan_data), 'program_bantuan.xlsx');
        // return (new ProgramBantuanExport($program_id))->download('profil_data.pdf', \Maatwebsite\Excel\Excel::DOMPDF);

    }

    public function viewpdf(){

        $laporan = '';

        return view('laporan-program-bantuan.viewpdf',['laporan' => $laporan]);
    }

    public function exportPdf($program_id){

        // log data
        $log = [
            'task'=>'laporan program bantuan',
            'details'=>'Eksport pdf Laporan program bantuan',
            'entity_id'=>'0'
        ];
        $this->log_audit_trail($log);

        $user_id = auth()->user()->id; 
        $role_id = auth()->user()->role_id; 
        $agensi_id = auth()->user()->agensi_id; 

        if($program_id != '00'){
            $prog_sql = " a.id = ".$program_id;
            $req_program = $program_id;
        }else{
            $prog_sql = '';
            $req_program = $program_id;
        }

        if($role_id == '2'){
            $and = ($prog_sql!= ''?' and':'');
            $agensi_sql = $and." a.agensi_id = ".$agensi_id;
        }else if ($role_id == '3'){
            $and = ($prog_sql!= ''?' and':'');
            $agensi_sql = $and." a.rekod_oleh = ".$user_id;
        }

        $psql = "
            select a.*,b.`nama` as nama_teras,
            c.`nama` as nama_kekerapan,
            d.`nama_kategori` as nama_kategori
            from program a 
            left join teras b on a.`teras_id` = b.`id`
            left join kekerapan c on a.`kekerapan_id` = c.`id`
            left join kategori d on a.`kategori_id` = d.`id`
            where ".$prog_sql.$agensi_sql;
        $laporan = DB::select($psql);

        $laporan_data = [];

        
        foreach($laporan as $program_key => $program_val){
            
            $programId = $program_val->id;
            $programNama = $program_val->nama;
            $programTeras = $program_val->nama_teras;
            $programKekerapan = $program_val->nama_kekerapan;
            $programKategori = $program_val->nama_kategori;

            $pks_data = DB::table('program_kumpulan_sasar')
            ->leftJoin('kumpulan_sasar','kumpulan_sasar.id','=','program_kumpulan_sasar.kumpulan_sasar_id')
            ->select('program_kumpulan_sasar.*','kumpulan_sasar.nama as ks_nama')
            ->where('program_kumpulan_sasar.program_id', $program_val->id)
            ->get();

            $pks_str = '';
            $no = 1;
            foreach($pks_data as $pks_val){
                if($no == 1){
                    $pks_str .= $pks_val->ks_nama;
                }else{
                    $pks_str .= ",".$pks_val->ks_nama;
                }
                $no++;
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
            ->where('program_master.program_id', $program_val->id)
            ->get();

            $prog_str = '';
            $no = 1;
            foreach($prog_master as $prog_val){
                if($no == 1){
                    $prog_str .= $prog_val->jenis_sub_cat_name;
                }else{
                    $prog_str .= ",".$prog_val->jenis_sub_cat_name;
                }
                $no++;
            }

            $aktif_sql = "select count(id) as bilangan from bantuan where program_id = ".$program_val->id." and status_bantuan_id = 1";
            $aktif_penerima = DB::select($aktif_sql);
            $bilangan_aktif = ( array ) $aktif_penerima[0];

            $tak_aktif_sql = "select count(id) as bilangan from bantuan where program_id = ".$program_val->id." and status_bantuan_id = '2'";
            $tak_aktif_penerima = DB::select($tak_aktif_sql);
            $bilangan_tidak_aktif = (array)$tak_aktif_penerima[0];

            $laporan_data[$programId]['nama'] = $programNama;
            $laporan_data[$programId]['teras'] = $programTeras;
            $laporan_data[$programId]['kump_sasar'] = $pks_str;
            $laporan_data[$programId]['sub_kategori'] = $prog_str;
            $laporan_data[$programId]['kategori'] = $programKategori;
            $laporan_data[$programId]['kakerapan'] = $programKekerapan;
            $laporan_data[$programId]['jumlah_aktif'] = ($bilangan_aktif['bilangan']!='0'?$bilangan_aktif['bilangan']:'0');
            $laporan_data[$programId]['jumlah_tidak_aktif'] = ($bilangan_tidak_aktif['bilangan']!='0'?$bilangan_tidak_aktif['bilangan']:'0');
        }
        // view()->share('profil.viewpdf',$data);
        $pdf = PDF::loadView('laporan-program-bantuan.viewpdf',['laporan' => $laporan_data]);

        // download PDF file with download method
        return $pdf->download('program_bantuan.pdf');
    }

    public function log_audit_trail($log){

        $userid = auth()->user()->id; 
        $role_id = auth()->user()->role_id; 
        $agensi_id = auth()->user()->agensi_id; 
        $ip_address = Request::ip();

        $auditTrail = new AuditTrail;
        $auditTrail->entity_id = $log['entity_id'];
        $auditTrail->proses = $log['task'];
        $auditTrail->keterangan_proses = $log['details'];
        $auditTrail->ip_address = $ip_address;
        $auditTrail->created_by = $userid;
        $auditTrail->created_at = now();
        $auditTrail->updated_by = $userid;
        $auditTrail->updated_at = now();
        $auditTrail->save();
        
        return $auditTrail;
    } 
}

class ProgramBantuanExport implements  WithHeadings,FromArray
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }
    
    public function headings(): array
    {
        return [
            'Nama Program',
            'Teras',
            'kategori',
            'Kumpulan Sasar',
            'Sub Kategori',
            'Kekerapan',
            'Jumlah Aktif',
            'Jumlah Tidak Aktif'
        ];
    }
    
    // public function FromCollection($row): array
    // {
    //     dd($row);
    //     return [
    //         $row->nama,
    //         Date::dateTimeToExcel($invoice->created_at),
    //     ];
    // }
}