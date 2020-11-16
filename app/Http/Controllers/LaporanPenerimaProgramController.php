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
        $agensi = Agensi::all();
        $program = Program::all();

        $user_id = auth()->user()->id; 
        $role_id = auth()->user()->role_id; 
        $agensi_id = auth()->user()->agensi_id; 

        if($request->all() != []){
            
            if($role_id == '2'){
            }else if ($role_id == '1'){

                if($request->program != '00'){
                    $prog_sql = "bantuan.id = ".$request->program;
                    $req_program = $request->program;
                }else{
                    $prog_sql = '';
                    $req_program = $request->program;
                }

                if($request->agensi != '00'){
                    $and = (!empty($prog_sql) ? ' and' : '');
                    $agensi_sql = $and." agensi.id = ".$request->agensi;
                    $req_agensi = $request->agensi;
                }else{
                    $agensi_sql = '';
                    $req_agensi = $request->agensi;
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
                where ".$prog_sql.$agensi_sql;
                $laporan = DB::select($mysql);
            }
            
            return view('laporan-penerima-program.index', [
                'laporan' => $laporan,
                'agensi'=>$agensi,
                'program'=>$program,
                'req_program'=>$req_program,
                'req_agensi'=>$req_agensi
            ]);
        }

        $req_program = '00';
        $req_agensi = '00';

        return view('laporan-penerima-program.index',[
            'agensi'=>$agensi,
            'program'=>$program,
            'req_program'=>$req_program,
            'req_agensi'=>$req_agensi
        ]);
    }

    public function excel($program_id,$agensi_id){

        if($program_id != '00'){
            $prog_sql = " program.id = ".$program_id;
            $req_program = $program_id;
        }else{
            $prog_sql = '';
            $req_program = $program_id;
        }

        if($agensi_id != '00'){
            $and = (!empty($prog_sql) ? ' and' : '');
            $agensi_sql = $and." program.agensi_id = ".$agensi_id;
            $req_agensi = $agensi_id;
        }else{
            $agensi_sql = '';
            $req_agensi = $agensi_id;
        }

        $mysql = "
        select  
            program.nama as program_nama, kategori.nama_kategori as nama_kategori,
            profil.nama as profil_nama, profil.no_kp as profil_kp,
            jantina.nama as jantina_nama, etnik.nama as etnik_nama,
            agama.nama as agama_nama, status_kahwin.nama as status_kahwin_nama,
            profil.poskod as profil_poskod, negeri.nama as negeri_nama,
            daerah.nama as daerah_nama, mukim.nama as mukim_nama,
            strata.nama as strata_nama, pekerjaan.nama as pekerjaan_nama,
            manfaat.nama as manfaat_nama
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
        where ".$prog_sql.$agensi_sql;
        $laporan = DB::select($mysql);
        
        return Excel::download(new ProgramBantuanExport($laporan), 'program_bantuan.xlsx');
        // return (new ProgramBantuanExport($program_id))->download('profil_data.pdf', \Maatwebsite\Excel\Excel::DOMPDF);

    }

    public function viewpdf($program_id,$agensi_id){

        $laporan = '';

        return view('laporan-penerima-program.viewpdf',['laporan' => $laporan]);
    }

    public function exportPdf($program_id,$agensi_id){

        if($program_id != '00'){
            $prog_sql = " program.id = ".$program_id;
            $req_program = $program_id;
        }else{
            $prog_sql = '';
            $req_program = $program_id;
        }

        if($agensi_id != '00'){
            $and = (!empty($prog_sql) ? ' and' : '');
            $agensi_sql = $and." program.agensi_id = ".$agensi_id;
            $req_agensi = $agensi_id;
        }else{
            $agensi_sql = '';
            $req_agensi = $agensi_id;
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
        where ".$prog_sql.$agensi_sql;
        $laporan = DB::select($mysql);

        // view()->share('profil.viewpdf',$data);
        $pdf = PDF::loadView('laporan-penerima-program.viewpdf',['laporan' => $laporan]);

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