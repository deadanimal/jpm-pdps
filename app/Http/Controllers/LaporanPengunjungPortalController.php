<?php

namespace App\Http\Controllers;

use Request;
use Gate;
use App\Profil;
use App\Program;
use App\Agensi;
use App\AuditTrailPortal;
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

class LaporanPengunjungPortalController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Profil::class);
    }

    public function index(ProgramRequest $request)
    {

        $agensi = Agensi::all();

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
            
            if($role_id == '2'){
            }else if ($role_id == '1'){

                $mysql = "select *,audit_trail.created_at as audit_created  from audit_trail
                left join users on audit_trail.created_by = users.id
                where audit_trail.created_at between '".$request->tarikh_mula."' and '".$request->tarikh_tamat."'";
                //" where ".$prog_sql.$agensi_sql;
                $laporan = DB::select($mysql);
            }

            // log data
            $log = [
                'task'=>'laporan Pungunjung portal',
                'details'=>'Carian Laporan Pungunjung portal',
                'entity_id'=>'0'
            ];
            $this->log_audit_trail($log);

            return view('laporan-pengunjung-portal.index', [
                'laporan' => $laporan,
                'agensi'=>$agensi,
                'program'=>$program,
                'tarikh_mula'=>$request->tarikh_mula,
                'tarikh_tamat'=>$request->tarikh_tamat
            ]);
        }

        // log data
        $log = [
            'task'=>'laporan Pungunjung portal',
            'details'=>'Halaman Laporan Pungunjung portal',
            'entity_id'=>'0'
        ];
        $this->log_audit_trail($log);

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

        // log data
        $log = [
            'task'=>'laporan Pungunjung portal',
            'details'=>'Eksport excel Laporan Pungunjung portal',
            'entity_id'=>'0'
        ];
        $this->log_audit_trail($log);

        $mysql = "select users.name as username, users.email as email,
        audit_trail.created_at as audit_created, audit_trail.proses as proses, 
        audit_trail.keterangan_proses as keterangan
        from audit_trail
        left join users on audit_trail.created_by = users.id
        where audit_trail.created_at between '".$tarikh_mula."' and '".$tarikh_tamat."'";
        //" where ".$prog_sql.$agensi_sql;
        $laporan = DB::select($mysql);
        
        return Excel::download(new LaporanPengunjungPortalExport($laporan), 'jejak-audit.xlsx');
        // return (new LaporanPengunjungPortalExport($program_id))->download('profil_data.pdf', \Maatwebsite\Excel\Excel::DOMPDF);

    }

    public function viewpdf($program_id,$agensi_id){

        $laporan = '';

        return view('laporan-pengunjung-portal.viewpdf',['laporan' => $laporan]);
    }

    public function exportPdf($tarikh_mula,$tarikh_tamat){

        // log data
        $log = [
            'task'=>'laporan Pungunjung portal',
            'details'=>'Eksport pdf Laporan Pungunjung portal',
            'entity_id'=>'0'
        ];
        $this->log_audit_trail($log);

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

class LaporanPengunjungPortalExport implements  WithHeadings,FromArray
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