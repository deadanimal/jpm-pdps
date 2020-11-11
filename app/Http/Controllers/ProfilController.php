<?php

namespace App\Http\Controllers;

use Gate;
use App\Profil;
use App\Agensi;
use App\Http\Requests\ProfilRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Excel;
use PDF;

class ProfilController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Profil::class);
    }

    public function index(ProfilRequest $request)
    {
        $profil = Profil::all();
        // dd($request->no_kp);
        if($request->no_kp != null){
            $user_id = auth()->user()->id; 
            $role_id = auth()->user()->role_id; 
            $agensi_id = auth()->user()->agensi_id; 
            // dd($request->nama);

            // $this->profilPdf($request->no_kp);

            // if($request != null){
            // dd($request->nama);
            // if($role_id == '3'){
            // }else if ($role_id == '2'){
            // }else if ($role_id == '1'){
                $profil = DB::table('bantuan')
                    ->leftJoin('profil', 'profil.id', '=', 'bantuan.profil_id')
                    ->leftJoin('program', 'program.id', '=', 'bantuan.program_id')
                    ->leftJoin('agensi', 'agensi.id', '=', 'program.agensi_id')
                    ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                    ->select( 'bantuan.*',
                            'profil.nama as profil_nama',
                            'profil.no_kp as profil_kp',
                            'program.nama as program_nama',
                            'agensi.nama as agensi_nama',
                            'kekerapan.nama as kekerapan_nama'
                    )
                    ->where('profil.no_kp', 'LIKE', '%' . $request->no_kp . '%')
                    ->get()->toArray();
            // }

            // $this->profilPdf($profil,$request->no_kp);

            return view('profil.index', 
                [
                    'profil' => $profil,
                    'nokp'=>$request->no_kp,
                ]
            );
            // }
        }else{
            $profil = '';
        }

        return view('profil.index');
    }

    public function view($bantuan_id)
    {
        if($bantuan_id){
            $user_id = auth()->user()->id; 
            $role_id = auth()->user()->role_id; 
            $agensi_id = auth()->user()->agensi_id; 

            // if($role_id == '3'){
            // }else if ($role_id == '2'){
            // }else if ($role_id == '1'){
                $profil = DB::table('bantuan')
                    ->leftJoin('profil', 'profil.id', '=', 'bantuan.profil_id')
                    ->leftJoin('program', 'program.id', '=', 'bantuan.program_id')
                    ->leftJoin('agensi', 'agensi.id', '=', 'program.agensi_id')
                    ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                    ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                    ->leftJoin('jantina', 'jantina.id', '=', 'profil.jantina_id')
                    ->leftJoin('etnik', 'etnik.id', '=', 'profil.etnik_id')
                    ->leftJoin('agama', 'agama.id', '=', 'profil.agama_id')
                    ->leftJoin('status_kahwin', 'status_kahwin.id', '=', 'profil.status_kahwin_id')
                    ->leftJoin('negeri', 'negeri.id', '=', 'profil.negeri_id')
                    ->leftJoin('daerah', 'daerah.id', '=', 'profil.daerah_id')
                    ->leftJoin('mukim', 'mukim.id', '=', 'profil.mukim_id')
                    ->leftJoin('strata', 'strata.id', '=', 'profil.strata_id')
                    ->leftJoin('pekerjaan', 'pekerjaan.id', '=', 'profil.pekerjaan_id')
                    ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                    ->select( 'bantuan.*','bantuan.jumlah as jumlah_bantuan',
                            'profil.nama as profil_nama',
                            'profil.no_kp as profil_kp',
                            'profil.poskod as profil_poskod',
                            'program.nama as program_nama',
                            'program.id as program_id',
                            'agensi.nama as agensi_nama',
                            'kekerapan.nama as kekerapan_nama',
                            'kategori.nama_kategori as nama_kategori',
                            'jantina.nama as jantina_nama',
                            'etnik.nama as etnik_nama',
                            'agama.nama as agama_nama',
                            'status_kahwin.nama as status_kahwin_nama',
                            'negeri.nama as negeri_nama',
                            'daerah.nama as daerah_nama',
                            'mukim.nama as mukim_nama',
                            'strata.nama as strata_nama',
                            'pekerjaan.nama as pekerjaan_nama',
                            'manfaat.nama as manfaat_nama'
                    )
                    ->where('bantuan.id',$bantuan_id)
                    ->get()->first();
            // }
            // dd($profil);

            // $this->profilPdf($profil,$request->no_kp);
            // dd($profil);

            return view('profil.view', 
                [
                    'profil' => $profil
                ]
            );
            // }
        }

        return view('profil.index');
    }

    public function excel($icno){
        return Excel::download(new ProfilExport($icno), 'profil_data.xlsx');
        // return (new ProfilExport($icno))->download('profil_data.pdf', \Maatwebsite\Excel\Excel::DOMPDF);

    }

    public function profilPdf(){

        // $profil = DB::table('bantuan')
        // ->leftJoin('profil', 'profil.id', '=', 'bantuan.profil_id')
        // ->leftJoin('status_bantuan', 'status_bantuan.id', '=', 'bantuan.status_bantuan_id')
        // ->leftJoin('program', 'program.id', '=', 'bantuan.program_id')
        // ->leftJoin('agensi', 'agensi.id', '=', 'program.agensi_id')
        // ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
        // ->select( 'bantuan.*',
        //         'profil.nama as profil_nama',
        //         'profil.no_kp as profil_kp',
        //         'program.nama as program_nama',
        //         'agensi.nama as agensi_nama',
        //         'kekerapan.nama as kekerapan_nama',
        //         'status_bantuan.nama'
        // )
        // ->where('profil.no_kp', 'LIKE', '%950305112010%')
        // ->get();

        // share profil to view
        $profil = '';

        return view('profil.profilPdf',['profil' => $profil]);
    }

    public function exportPdf($icno){

        $profil = DB::table('bantuan')
        ->leftJoin('profil', 'profil.id', '=', 'bantuan.profil_id')
        ->leftJoin('status_bantuan', 'status_bantuan.id', '=', 'bantuan.status_bantuan_id')
        ->leftJoin('program', 'program.id', '=', 'bantuan.program_id')
        ->leftJoin('agensi', 'agensi.id', '=', 'program.agensi_id')
        ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
        ->select( 'bantuan.*',
                'profil.nama as profil_nama',
                'profil.no_kp as profil_kp',
                'program.nama as program_nama',
                'agensi.nama as agensi_nama',
                'kekerapan.nama as kekerapan_nama',
                'status_bantuan.nama'
        )
        ->where('profil.no_kp', 'LIKE', '%'.$icno.'%')
        ->get();

        // view()->share('profil.profilPdf',$data);
        $pdf = PDF::loadView('profil.profilPdf',['profil' => $profil]);

        // download PDF file with download method
        return $pdf->download('profil_data.pdf');
    }



    // public function store(ProfilRequest $request,Profil $model){}
}

class ProfilExport implements FromCollection, WithHeadings
{
    protected $icno;

    function __construct($icno) {
            $this->icno = $icno;
    }

    public function collection()
    {
        // return Agensi::all();

        $profil = DB::table('bantuan')
        ->leftJoin('profil', 'profil.id', '=', 'bantuan.profil_id')
        ->leftJoin('status_bantuan', 'status_bantuan.id', '=', 'bantuan.status_bantuan_id')
        ->leftJoin('program', 'program.id', '=', 'bantuan.program_id')
        ->leftJoin('agensi', 'agensi.id', '=', 'program.agensi_id')
        ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
        ->select( 
                'profil.nama as profil_nama',
                'profil.no_kp as profil_kp',
                'program.nama as program_nama',
                'agensi.nama as agensi_nama',
                'kekerapan.nama as kekerapan_nama',
                'bantuan.jumlah as jumlah','status_bantuan.nama'
        )
        ->where('profil.no_kp', 'LIKE', '%' . $this->icno . '%')
        ->get();
        return $profil;
    }
    
    public function headings(): array
    {
        return [
            'Nama Profil',
            'No KP Profil',
            'Nama Program',
            'Nama Agensi',
            'Kekerapan',
            'Jumlah',
            'Status'
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