<?php

namespace App\Http\Controllers;

use Gate;
use App\Profil;
use App\Http\Requests\ProfilRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Profil::class);
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

            // if($request != null){
            // dd($request->nama);
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

            // $profil_nama = '';
            // $profil_kp = '';

            // foreach($profil as $profil_k => $profil_data ){

            //     $profil_nama = $profil_data->$profil_nama;
            //     $profil_kp = $profil_data->$profil_kp;

            // }

            // dd($profil);
            return view('profil.index', 
                [
                    'profil' => $profil,
                    'nokp'=>$request->no_kp,
                    // 'profil_nama'=>$profil_data->$profil_nama,
                    // 'profil_kp'=>$profil_kp
                ]
            );
            // }
        }else{
            $profil = '';
        }

        return view('profil.index');
    }

    public function store(ProfilRequest $request,Profil $model){}
}
