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
use Maatwebsite\Excel\Excel;

class LaporanController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Laporan::class);
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
            return view('laporan.program_bantuan', ['laporan' => $laporan]);
            // }
        }

        return view('laporan.program_bantuan');
    }

    public function store(LaporanRequest $request,Laporan $model){}
}
