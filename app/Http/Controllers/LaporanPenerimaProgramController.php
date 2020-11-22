<?php

namespace App\Http\Controllers;

use Gate;
use App\Profil;
use App\Program;
use App\Agensi;
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

class LaporanPenerimaProgramController extends Controller
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

        $jantina = DB::table('jantina')->get();
        $etnik = DB::table('etnik')->get();
        $agama = DB::table('agama')->get();
        $status_perkahwinan = DB::table('status_kahwin')->get();
        $negeri = DB::table('negeri')->get();

        if($request->all() != []){

            $run_no = 0;

            if($request->jantina != '00'){
                $jantina_sql = "where jantina.id = ".$request->jantina;
                $req_jantina = $request->jantina;
                $run_no++;
            }else{
                $jantina_sql = '';
                $req_jantina = $request->jantina;
            }

            if($request->etnik != '00'){
                $and = ($run_no != 0 ? ' and ':' where ' );
                $etnik_sql = $and."etnik.id = ".$request->etnik;
                $req_etnik = $request->etnik;
                $run_no++;
            }else{
                $etnik_sql = '';
                $req_etnik = $request->etnik;
            }

            if($request->agama != '00'){
                $and = ($run_no != 0 ? ' and ':' where ' );
                $agama_sql = $and." agama.id = ".$request->agama;
                $req_agama = $request->agama;
                $run_no++;
            }else{
                $agama_sql = '';
                $req_agama = $request->agama;
            }

            if($request->status_perkahwinan != '00'){
                $and = ($run_no != 0 ? ' and ':' where ' );
                $status_perkahwinan_sql = $and."status_kahwin.id = ".$request->status_perkahwinan;
                $req_status_perkahwinan = $request->status_perkahwinan;
                $run_no++;
            }else{
                $status_perkahwinan_sql = '';
                $req_status_perkahwinan = $request->status_perkahwinan;
            }

            if($request->negeri != '00'){
                $and = ($run_no != 0 ? ' and ':' where ' );
                $negeri_sql = $and." negeri.id = ".$request->negeri;
                $req_negeri = $request->negeri;
                $run_no++;
            }else{
                $negeri_sql = '';
                $req_negeri = $request->negeri;
            }

            $mysql = "
            select bantuan.*, profil.nama as profil_nama,profil.no_kp as profil_kp,
            profil.poskod as profil_poskod,program.nama as program_nama,
            program.id as program_id,agensi.nama as agensi_nama,
            kekerapan.nama as kekerapan_nama,kategori.nama_kategori as nama_kategori,
            jantina.nama as jantina_nama,etnik.nama as etnik_nama,
            agama.nama as agama_nama,status_kahwin.nama as status_kahwin_nama,
            negeri.nama as negeri_nama,daerah.nama as daerah_nama,
            mukim.nama as mukim_nama,strata.nama as strata_nama,
            pekerjaan.nama as pekerjaan_nama,manfaat.nama as manfaat_nama
            from bantuan 
            left join  profil on profil.id = bantuan.profil_id
            left join program on program.id = bantuan.program_id
            left join agensi on agensi.id = program.agensi_id
            left join kekerapan on kekerapan.id = program.kekerapan_id
            left join kategori on kategori.id = program.kategori_id
            left join jantina on jantina.id = profil.jantina_id
            left join etnik on etnik.id = profil.etnik_id
            left join agama on agama.id = profil.agama_id
            left join status_kahwin on status_kahwin.id = profil.status_kahwin_id
            left join negeri on negeri.id = profil.negeri_id
            left join daerah on daerah.id = profil.daerah_id
            left join mukim on mukim.id = profil.mukim_id
            left join strata on strata.id = profil.strata_id
            left join pekerjaan on pekerjaan.id = profil.pekerjaan_id
            left join manfaat on manfaat.id = program.manfaat_id
            ".$jantina_sql.$etnik_sql.$agama_sql.$status_perkahwinan_sql.$negeri_sql;
            $laporan_data = DB::select($mysql);
            
            // dd($laporan_data);
            
            return view('laporan-penerima-program.index', [
                'jantina'=>$jantina,
                'etnik'=>$etnik,
                'agama'=>$agama,
                'status_perkahwinan'=>$status_perkahwinan,
                'negeri'=>$negeri,
                'req_jantina'=>$req_jantina,
                'req_etnik'=>$req_etnik,
                'req_agama'=>$req_agama,
                'req_status_perkahwinan'=>$req_status_perkahwinan,
                'req_negeri'=>$req_negeri,
                'laporan' => $laporan_data
            ]);
        }

        $laporan = '';

        return view('laporan-penerima-program.index',[
            'jantina'=>$jantina,
            'etnik'=>$etnik,
            'agama'=>$agama,
            'status_perkahwinan'=>$status_perkahwinan,
            'negeri'=>$negeri,
            'laporan' => $laporan,
            'req_jantina'=>'00',
            'req_etnik'=>'00',
            'req_agama'=>'00',
            'req_status_perkahwinan'=>'00',
            'req_negeri'=>'00',
        ]);
    }

    public function excel($req_jantina,$req_etnik,$req_agama,$req_status_perkahwinan,$req_negeri){

        $run_no = 0;

        if($req_jantina != '00'){
            $jantina_sql = "jantina.id = ".$req_jantina;
            $req_jantina = $req_jantina;
            $run_no++;
        }else{
            $jantina_sql = '';
            $req_jantina = $req_jantina;
        }

        if($req_etnik != '00'){
            $and = ($run_no != 0 ? ' and ':' where ' );
            $etnik_sql = $and."etnik.id = ".$req_etnik;
            $req_etnik = $req_etnik;
            $run_no++;
        }else{
            $etnik_sql = '';
            $req_etnik = $req_etnik;
        }

        if($req_agama != '00'){
            $and = ($run_no != 0 ? ' and ':' where ' );
            $agama_sql = $and." agama.id = ".$req_agama;
            $req_agama = $req_agama;
            $run_no++;
        }else{
            $agama_sql = '';
            $req_agama = $req_agama;
        }

        if($req_status_perkahwinan != '00'){
            $and = ($run_no != 0 ? ' and ':' where ' );
            $status_perkahwinan_sql = $and."status_kahwin.id = ".$req_status_perkahwinan;
            $req_status_perkahwinan = $req_status_perkahwinan;
            $run_no++;
        }else{
            $status_perkahwinan_sql = '';
            $req_status_perkahwinan = $req_status_perkahwinan;
        }

        if($req_negeri != '00'){
            $and = ($run_no != 0 ? ' and ':' where ' );
            $negeri_sql = $and." negeri.id = ".$req_negeri;
            $req_negeri = $req_negeri;
            $run_no++;
        }else{
            $negeri_sql = '';
            $req_negeri = $req_negeri;
        }

        $mysql = "
        select profil.nama as profil_nama,profil.no_kp as profil_kp,
        profil.poskod as profil_poskod,program.nama as program_nama,
        program.id as program_id,agensi.nama as agensi_nama,
        kekerapan.nama as kekerapan_nama,kategori.nama_kategori as nama_kategori,
        jantina.nama as jantina_nama,etnik.nama as etnik_nama,
        agama.nama as agama_nama,status_kahwin.nama as status_kahwin_nama,
        negeri.nama as negeri_nama,daerah.nama as daerah_nama,
        mukim.nama as mukim_nama,strata.nama as strata_nama,
        pekerjaan.nama as pekerjaan_nama,manfaat.nama as manfaat_nama
        from bantuan 
        left join  profil on profil.id = bantuan.profil_id
        left join program on program.id = bantuan.program_id
        left join agensi on agensi.id = program.agensi_id
        left join kekerapan on kekerapan.id = program.kekerapan_id
        left join kategori on kategori.id = program.kategori_id
        left join jantina on jantina.id = profil.jantina_id
        left join etnik on etnik.id = profil.etnik_id
        left join agama on agama.id = profil.agama_id
        left join status_kahwin on status_kahwin.id = profil.status_kahwin_id
        left join negeri on negeri.id = profil.negeri_id
        left join daerah on daerah.id = profil.daerah_id
        left join mukim on mukim.id = profil.mukim_id
        left join strata on strata.id = profil.strata_id
        left join pekerjaan on pekerjaan.id = profil.pekerjaan_id
        left join manfaat on manfaat.id = program.manfaat_id
        where ".$jantina_sql.$etnik_sql.$agama_sql.$status_perkahwinan_sql.$negeri_sql;
        $laporan_data = DB::select($mysql);
        
        return Excel::download(new ProgramBantuanExport($laporan_data), 'program_bantuan.xlsx');
        // return (new ProgramBantuanExport($program_id))->download('profil_data.pdf', \Maatwebsite\Excel\Excel::DOMPDF);

    }

    public function viewpdf(){

        $laporan = '';

        return view('laporan-penerima-program.viewpdf',['laporan' => $laporan]);
    }

    public function exportPdf($req_jantina,$req_etnik,$req_agama,$req_status_perkahwinan,$req_negeri){

        $run_no = 0;

        if($req_jantina != '00'){
            $jantina_sql = "jantina.id = ".$req_jantina;
            $req_jantina = $req_jantina;
            $run_no++;
        }else{
            $jantina_sql = '';
            $req_jantina = $req_jantina;
        }

        if($req_etnik != '00'){
            $and = ($run_no != 0 ? ' and ':' where ' );
            $etnik_sql = $and."etnik.id = ".$req_etnik;
            $req_etnik = $req_etnik;
            $run_no++;
        }else{
            $etnik_sql = '';
            $req_etnik = $req_etnik;
        }

        if($req_agama != '00'){
            $and = ($run_no != 0 ? ' and ':' where ' );
            $agama_sql = $and." agama.id = ".$req_agama;
            $req_agama = $req_agama;
            $run_no++;
        }else{
            $agama_sql = '';
            $req_agama = $req_agama;
        }

        if($req_status_perkahwinan != '00'){
            $and = ($run_no != 0 ? ' and ':' where ' );
            $status_perkahwinan_sql = $and."status_kahwin.id = ".$req_status_perkahwinan;
            $req_status_perkahwinan = $req_status_perkahwinan;
            $run_no++;
        }else{
            $status_perkahwinan_sql = '';
            $req_status_perkahwinan = $req_status_perkahwinan;
        }

        if($req_negeri != '00'){
            $and = ($run_no != 0 ? ' and ':' where ' );
            $negeri_sql = $and." negeri.id = ".$req_negeri;
            $req_negeri = $req_negeri;
            $run_no++;
        }else{
            $negeri_sql = '';
            $req_negeri = $req_negeri;
        }

        $mysql = "
        select profil.nama as profil_nama,profil.no_kp as profil_kp,
        profil.poskod as profil_poskod,program.nama as program_nama,
        program.id as program_id,agensi.nama as agensi_nama,
        kekerapan.nama as kekerapan_nama,kategori.nama_kategori as nama_kategori,
        jantina.nama as jantina_nama,etnik.nama as etnik_nama,
        agama.nama as agama_nama,status_kahwin.nama as status_kahwin_nama,
        negeri.nama as negeri_nama,daerah.nama as daerah_nama,
        mukim.nama as mukim_nama,strata.nama as strata_nama,
        pekerjaan.nama as pekerjaan_nama,manfaat.nama as manfaat_nama
        from bantuan 
        left join  profil on profil.id = bantuan.profil_id
        left join program on program.id = bantuan.program_id
        left join agensi on agensi.id = program.agensi_id
        left join kekerapan on kekerapan.id = program.kekerapan_id
        left join kategori on kategori.id = program.kategori_id
        left join jantina on jantina.id = profil.jantina_id
        left join etnik on etnik.id = profil.etnik_id
        left join agama on agama.id = profil.agama_id
        left join status_kahwin on status_kahwin.id = profil.status_kahwin_id
        left join negeri on negeri.id = profil.negeri_id
        left join daerah on daerah.id = profil.daerah_id
        left join mukim on mukim.id = profil.mukim_id
        left join strata on strata.id = profil.strata_id
        left join pekerjaan on pekerjaan.id = profil.pekerjaan_id
        left join manfaat on manfaat.id = program.manfaat_id
        where ".$jantina_sql.$etnik_sql.$agama_sql.$status_perkahwinan_sql.$negeri_sql;
        $laporan_data = DB::select($mysql);

        // view()->share('profil.viewpdf',$data);
        $pdf = PDF::loadView('laporan-penerima-program.viewpdf',['laporan' => $laporan_data]);

        // download PDF file with download method
        return $pdf->download('program_bantuan.pdf');
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
            'Nama Program','Kategori','Nama','No Kad Pengenalan',
            'Jantina','Etnik','Agama','Status Perkahwinan',
            'Poskod','Negeri','Daerah','Mukim','Strata','Pekerjaan',
            'Manfaat'
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