<?php

namespace App\Http\Controllers;

use Request;
use Gate;
use App\Profil;
use App\Program;
use App\Agensi;
use App\AuditTrail;
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

class LaporanPengunjungProgramBantuanController extends Controller
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
        
        $agensi = Agensi::all();

        if($role_id == '2'){
            $senarai_program = DB::table('program')->where('agensi_id', $agensi_id)->get();
        }else if ($role_id == '3'){
            $senarai_program = DB::table('program')->where('rekod_oleh',$user_id)->get();
        }else if($role_id == '1'){
            $senarai_program = Program::all();
        }

        if($request->all() != []){

            $tarikh_tamat = date('Y-m-d', strtotime($request->tarikh_tamat . ' +1 day'));
            $tarikh_mula = $request->tarikh_mula;

            if($request->program != '00'){
                $program_sql = " and a.program_id = ".$request->program;
                $program_id = $request->program;
            }else{
                $program_sql = "";
                $program_id = 00;
            }

            if($request->agensi != '00'){
                $agensi_sql = " and b.agensi_id = ".$request->agensi;
                $agensi_id = $request->agensi;
            }else{
                $agensi_sql = "";
                $agensi_id = 00;
            }

            // echo $request->tarikh_mula."--".$tarikh_tamat;

            $mysql = "select * from audit_trail_portal a
            left join program b on b.id = a.program_id
            where a.created_at between '".$tarikh_mula."' and '".$tarikh_tamat."'".$program_sql.$agensi_sql;
            //" where ".$prog_sql.$agensi_sql;
            $laporan_sql = DB::select($mysql);

            $arr_program_id = [];

            foreach($laporan_sql as $laporan_k => $laporan_val){
                $arr_program_id[] = $laporan_val->program_id;
            }

            $unique_program_id = array_unique($arr_program_id);

            $laporan_data = [];

            foreach($unique_program_id as $program_k){
                $program_data = Program::find($program_k);
                $total_visitor_sql = "select count(id) as bilangan from audit_trail_portal where audit_trail_portal.created_at between '".$tarikh_mula."' and '".$tarikh_tamat."' and program_id = ".$program_k;
                $total_visitor = DB::select($total_visitor_sql);
                $total_visitor = $total_visitor[0];

                $laporan_data[$program_k]['tarikh_mula'] = $request->tarikh_mula;
                $laporan_data[$program_k]['tarikh_tamat'] = $request->tarikh_tamat;
                $laporan_data[$program_k]['program_name'] = $program_data->nama;
                $laporan_data[$program_k]['bilangan_pengunjung'] = $total_visitor->bilangan;
            }
            // dd($laporan_data);
            // $laporan = [];

            return view('laporan-pengunjung-program-bantuan.index', [
                'laporan' => $laporan_data,
                'agensi' => $agensi,
                'program' => $senarai_program,
                'program_id' => $program_id,
                'agensi_id' => $agensi_id,
                'tarikh_mula' => $tarikh_mula,
                'tarikh_tamat' => $tarikh_tamat
            ]);
        }

        // log data
        $log = [
            'task'=>'laporan pungunjung program portal',
            'details'=>'Halaman Laporan pungunjung program bantuan portal',
            'entity_id'=>'0'
        ];
        $this->log_audit_trail($log);

        $tarikh_mula = '00';
        $tarikh_tamat = '00';
        $laporan = [];

        return view('laporan-pengunjung-program-bantuan.index',[
            'laporan' => $laporan,
            'agensi' => $agensi,
            'program' => $senarai_program,
            'tarikh_mula' => $tarikh_mula,
            'tarikh_tamat' => $tarikh_tamat
        ]);
    }

    public function excel($tarikh_mula,$tarikh_tamat,$pid,$aid){

        if($pid != '00'){
            $program_sql = " and a.program_id = ".$pid;
        }else{
            $program_sql = "";
        }

        if($aid != '00'){
            $agensi_sql = " and b.agensi_id = ".$aid;
        }else{
            $agensi_sql = "";
        }

        // echo $tarikh_mula."--".$tarikh_tamat."--".$agensi_sql."--".$program_sql;

        $mysql = "select * from audit_trail_portal a
        left join program b on b.id = a.program_id
        where a.created_at between '".$tarikh_mula."' and '".$tarikh_tamat."'".$program_sql.$agensi_sql.
        // "GROUP BY a.city, a.program_id";
        "";
        //" where ".$prog_sql.$agensi_sql;
        $laporan_sql = DB::select($mysql);

        // dd($laporan_sql);

        $arr_program_id = [];

        foreach($laporan_sql as $laporan_k => $laporan_val){
            $arr_program_id[] = $laporan_val->program_id;
        }

        $unique_program_id = array_unique($arr_program_id);

        $laporan_data = [];

        foreach($unique_program_id as $program_k){

            $program_data = DB::table('program')->where('id', $program_k)->get()->first();
            $total_visitor_sql = "select count(id) as bilangan from audit_trail_portal where audit_trail_portal.created_at between '".$tarikh_mula."' and '".$tarikh_tamat."' and program_id = ".$program_k;
            $total_visitor = DB::select($total_visitor_sql);
            $total_visitor = $total_visitor[0];

            $laporan_data[$program_k]['tarikh_mula'] = $tarikh_mula;
            $laporan_data[$program_k]['tarikh_tamat'] = $tarikh_tamat;
            $laporan_data[$program_k]['program_name'] = $program_data->nama;
            $laporan_data[$program_k]['bilangan_pengunjung'] = $total_visitor->bilangan;
        }
        
        return Excel::download(new LaporanPengunjungPorgramBantuanExport($laporan_data), 'laporan-pengunjung-program-bantuan.xlsx');
        // return (new LaporanPengunjungPorgramBantuanExport($program_id))->download('profil_data.pdf', \Maatwebsite\Excel\Excel::DOMPDF);

    }

    public function viewpdf($program_id,$agensi_id){

        $laporan = '';

        return view('laporan-pengunjung-program-bantuan.viewpdf',['laporan' => $laporan]);
    }

    public function exportPdf($tarikh_mula,$tarikh_tamat,$pid,$aid){

        if($pid != '00'){
            $program_sql = " and a.program_id = ".$pid;
        }else{
            $program_sql = "";
        }

        if($aid != '00'){
            $agensi_sql = " and b.agensi_id = ".$aid;
        }else{
            $agensi_sql = "";
        }

        // echo $tarikh_mula."--".$tarikh_tamat."--".$agensi_sql."--".$program_sql;

        $mysql = "select * from audit_trail_portal a
        left join program b on b.id = a.program_id
        where a.created_at between '".$tarikh_mula."' and '".$tarikh_tamat."'".$program_sql.$agensi_sql;
        //" where ".$prog_sql.$agensi_sql;
        $laporan_sql = DB::select($mysql);

        // dd($laporan_sql);

        $arr_program_id = [];

        foreach($laporan_sql as $laporan_k => $laporan_val){
            $arr_program_id[] = $laporan_val->program_id;
        }

        $unique_program_id = array_unique($arr_program_id);

        $laporan_data = [];

        foreach($unique_program_id as $program_k){

            $program_data = DB::table('program')->where('id', $program_k)->get()->first();
            $total_visitor_sql = "select count(id) as bilangan from audit_trail_portal where audit_trail_portal.created_at between '".$tarikh_mula."' and '".$tarikh_tamat."' and program_id = ".$program_k;
            $total_visitor = DB::select($total_visitor_sql);
            $total_visitor = $total_visitor[0];

            $laporan_data[$program_k]['tarikh_mula'] = $tarikh_mula;
            $laporan_data[$program_k]['tarikh_tamat'] = $tarikh_tamat;
            $laporan_data[$program_k]['program_name'] = $program_data->nama;
            $laporan_data[$program_k]['bilangan_pengunjung'] = $total_visitor->bilangan;
        }

        // view()->share('profil.viewpdf',$data);
        $pdf = PDF::loadView('laporan-pengunjung-program-bantuan.viewpdf',['laporan' => $laporan_data]);

        // download PDF file with download method
        return $pdf->download('laporan-pengunjung-program-bantuan.pdf');
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

class LaporanPengunjungPorgramBantuanExport implements  WithHeadings,FromArray
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
            'Nama Program','Tarikh Mula','Tarikh Tamat','Jumlah Pengunjung'
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