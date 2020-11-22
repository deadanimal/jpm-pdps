<?php

namespace App\Http\Controllers;

use Gate;
use App\Profil;
use App\Program;
use App\Agensi;
use App\AuditTrailPortal;
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

class LaporanPengunjungPortalController extends Controller
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

                $mysql = "select *,audit_trail.created_at as audit_created  from audit_trail
                left join users on audit_trail.created_by = users.id
                where audit_trail.created_at between '".$request->tarikh_mula."' and '".$request->tarikh_tamat."'";
                //" where ".$prog_sql.$agensi_sql;
                $laporan = DB::select($mysql);
            }

            return view('laporan-pengunjung-portal.index', [
                'laporan' => $laporan,
                'agensi'=>$agensi,
                'program'=>$program,
                'tarikh_mula'=>$request->tarikh_mula,
                'tarikh_tamat'=>$request->tarikh_tamat
            ]);
        }

        $tarikh_mula = '00';
        $tarikh_tamat = '00';

        return view('laporan-pengunjung-portal.index',[
            'agensi'=>$agensi,
            'program'=>$program,
            'tarikh_mula'=>$tarikh_mula,
            'tarikh_tamat'=>$tarikh_tamat
        ]);
    }

    public function excel($tarikh_mula,$tarikh_tamat){

        $mysql = "select users.name as username, users.email as email,
        audit_trail.created_at as audit_created, audit_trail.proses as proses, 
        audit_trail.keterangan_proses as keterangan
        from audit_trail
        left join users on audit_trail.created_by = users.id
        where audit_trail.created_at between '".$tarikh_mula."' and '".$tarikh_tamat."'";
        //" where ".$prog_sql.$agensi_sql;
        $laporan = DB::select($mysql);
        
        return Excel::download(new ProgramBantuanExport($laporan), 'jejak-audit.xlsx');
        // return (new ProgramBantuanExport($program_id))->download('profil_data.pdf', \Maatwebsite\Excel\Excel::DOMPDF);

    }

    public function viewpdf($program_id,$agensi_id){

        $laporan = '';

        return view('laporan-pengunjung-portal.viewpdf',['laporan' => $laporan]);
    }

    public function exportPdf($tarikh_mula,$tarikh_tamat){

        $mysql = "select users.name as username, users.email as email,
        audit_trail.created_at as audit_created, audit_trail.proses as proses, 
        audit_trail.keterangan_proses as keterangan,audit_trail.ip_address as ip_address
        from audit_trail
        left join users on audit_trail.created_by = users.id
        where audit_trail.created_at between '".$tarikh_mula."' and '".$tarikh_tamat."'";
        //" where ".$prog_sql.$agensi_sql;
        $laporan = DB::select($mysql);

        // view()->share('profil.viewpdf',$data);
        $pdf = PDF::loadView('laporan-pengunjung-portal.viewpdf',['laporan' => $laporan]);

        // download PDF file with download method
        return $pdf->download('jejak-audit.pdf');
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
            'Nama Penguna','Email','Tarikh Cipta','Proses','Keterangan'
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