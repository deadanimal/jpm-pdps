<?php

namespace App\Http\Controllers;

use App\Agensi;
use App\Program; 
use App\Media;
use App\User;
use App\Profil;
use Carbon\Carbon;
use App\Http\Requests\ProfilRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
// use Maatwebsite\Excel\Excel;
use Excel;

class LaporanController extends Controller
{
    private $excel;

    public function __construct()
    {
        // $this->authorizeResource(Laporan::class);
        // $this->excel = $excel;
    }


    public function index(ProfilRequest $request)
    {
        $agensi = Agensi::all();
        // dd($request->nama);
        if($request->nama != null){
        //     $user_id = auth()->user()->id; 
        //     $role_id = auth()->user()->role_id; 
        //     $agensi_id = auth()->user()->agensi_id; 
            // dd($request->nama);

            // if($request != null){
            // if($role_id == '3'){
            //     $media = DB::table('media')
            //         ->leftJoin('users', 'users.id', '=', 'media.created_by')
            //         ->leftJoin('program', 'program.id', '=', 'media.program_id')
            //         ->select( 'media.*', 'users.name as user_name','program.nama as program_name')
            //         ->where('media.created_by',$user_id)
            //         ->get();
            // }else if ($role_id == '2'){
            //     $media = DB::table('media')
            //         ->leftJoin('users', 'users.id', '=', 'media.created_by')
            //         ->leftJoin('program', 'program.id', '=', 'media.program_id')
            //         ->select( 'media.*', 'users.name as user_name','program.nama as program_name')
            //         // ->where('media.agensi_id',$agensi_id)
            //         ->where('media.created_by',$user_id)
            //         ->get();
            // }else if ($role_id == '1'){


                // $laporan = DB::table('profil')
                //     // ->leftJoin('users', 'users.id', '=', 'media.created_by')
                //     // ->leftJoin('program', 'program.id', '=', 'media.program_id')
                //     // ->select( 'media.*', 'users.name as user_name','program.nama as program_name')
                //     ->where('profil.nama', 'LIKE', '%ka%')
                //     ->get();


            // }
            $sql = "select * from profil where nama like '%".$request->nama."%'";
            $laporan = DB::select($sql);
            // dd($laporan);
            // return Excel::download(new Profil,'profil.xlxs');
            return view('laporan.index', ['laporan' => $laporan]);
            // }
        }

        return view('laporan.index');
    }

    public function program_bantuan(ProfilRequest $request)
    {

        $agensi = Agensi::all();
        $program = Program::all();

        $user_id = auth()->user()->id; 
        $role_id = auth()->user()->role_id; 
        $agensi_id = auth()->user()->agensi_id; 

        if($request->all() != []){
            
            if($role_id == '3'){
            //     $media = DB::table('media')
            //         ->leftJoin('users', 'users.id', '=', 'media.created_by')
            //         ->leftJoin('program', 'program.id', '=', 'media.program_id')
            //         ->select( 'media.*', 'users.name as user_name','program.nama as program_name')
            //         ->where('media.created_by',$user_id)
            //         ->get();
            }else if ($role_id == '2'){
            //     $media = DB::table('media')
            //         ->leftJoin('users', 'users.id', '=', 'media.created_by')
            //         ->leftJoin('program', 'program.id', '=', 'media.program_id')
            //         ->select( 'media.*', 'users.name as user_name','program.nama as program_name')
            //         // ->where('media.agensi_id',$agensi_id)
            //         ->where('media.created_by',$user_id)
            //         ->get();
            }else if ($role_id == '1'){

                // $prog_sql = [];

                if($request->program != '00'){
                    $prog_sql = " a.id = ".$request->program;
                }else{
                    $prog_sql = '';
                }

                if($request->agensi != '00'){
                    $and = (!empty($prog_sql) ? ' and' : '');
                    $agensi_sql = $and." a.agensi_id = ".$request->agensi;
                }else{
                    $agensi_sql = '';
                }

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

            // $laporan = json_decode($laporan,true);
            // $laporan = (array)$laporan;
            // dd($array);

            foreach($laporan as $program_key => $program_val){
                
                $programId = $program_val->id;
                $programNama = $program_val->nama;
                $programTeras = $program_val->nama_teras;
                $programKekerapan = $program_val->nama_kekerapan;
                $programKategori = $program_val->nama_kategori;
                // dd($program_val);


                $aktif_sql = "select count(id) as bilangan from bantuan where program_id = ".$program_val->id." and status_bantuan_id = 1";
                $aktif_penerima = DB::select($aktif_sql);
                $bilangan_aktif = ( array ) $aktif_penerima[0];

                $tak_aktif_sql = "select count(id) as bilangan from bantuan where program_id = ".$program_val->id." and status_bantuan_id = '2'";
                $tak_aktif_penerima = DB::select($tak_aktif_sql);
                $bilangan_tidak_aktif = (array)$tak_aktif_penerima[0];

                $laporan_data[$programId]['id'] = $programId;
                $laporan_data[$programId]['nama'] = $programNama;
                $laporan_data[$programId]['teras'] = $programTeras;
                $laporan_data[$programId]['kakerapan'] = $programKekerapan;
                $laporan_data[$programId]['kategori'] = $programKategori;
                $laporan_data[$programId]['jumlah_aktif'] = $bilangan_aktif;
                $laporan_data[$programId]['jumlah_tidak_aktif'] = $bilangan_tidak_aktif;

                // echo "<pre>";
                // print_r($laporan_data);                
                // echo "</pre>";
                // die;

                
            }

            // dd($laporan_data);
            return view('laporan.program_bantuan', ['laporan' => $laporan_data,'agensi'=>$agensi,'program'=>$program]);
            // }
        }

        return view('laporan.program_bantuan',['agensi'=>$agensi,'program'=>$program]);
    }

    public function penerima_program_bantuan(ProfilRequest $request)
    {
    }

    public function excel()
    {
        $profil_data = DB::table('profil')->get()->toArray();
        $profil_array[] = array('nama', 'no_kp');

        $agensi = Agensi::all();

        foreach($profil_data as $profil)
        {
            // $profil_array[] = array(
            //     'nama'  => $profil->nama,
            //     'no_kp'   => $profil->no_kp,
            // );
            
        }
        // $profil_array = [
        //         [1, 2, 3],
        //         [4, 5, 6]
        //     ];

        // $profil_array = [
        //     'creator'        => 'Patrick Brouwers',
        //     'lastModifiedBy' => 'Patrick Brouwers',
        //     'title'          => 'Invoices Export',
        //     'description'    => 'Latest Invoices',
        //     'subject'        => 'Invoices',
        //     'keywords'       => 'invoices,export,spreadsheet',
        //     'category'       => 'Invoices',
        //     'manager'        => 'Patrick Brouwers',
        //     'company'        => 'Maatwebsite',
        // ];
        $profil_array = ['qqqqq'];

        // echo '<pre>';
        // print_r($profil_array);
        // echo '</pre>';
        // die;
        // return (new Profil)->download('invoices.xlsx');
        // return Excel::download($agensi, 'test.xlsx');
        return Excel::download(new InvoicesExport, 'invoices.xlsx');
        // return (new InvoicesExport(2018))->download('invoices.xlsx');
        
        // return Excel::create('profile_data',function ($excel) use ($profil_array){
        //     $excel->sheet('sheet name',function($sheet) use ($profil_array){
        //         $sheet->fromArray($profil_array);
        //     });
        // })->download('csv');

        // Excel::download('profil_data.xlsx', function($excel) use ($profil_array){
        //     $excel->setTitle('profil Data');
        //     $excel->sheet('profil Data', function($sheet) use ($profil_array){
        //     $sheet->fromArray($profil_array, null, 'A1', false, false);
        // });
        // })->download('xlsx');
    }

    public function store(LaporanRequest $request,Laporan $model){}
}

class InvoicesExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return Agensi::all();
    }
    
    public function headings(): array
    {
        return [
            '#',
            'Date',
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