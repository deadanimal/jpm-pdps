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
        // dd($request->nama);
        if($request->nama != null){
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
                $profil = DB::table('profil')
                    // ->leftJoin('users', 'users.id', '=', 'media.created_by')
                    // ->leftJoin('program', 'program.id', '=', 'media.program_id')
                    // ->select( 'media.*', 'users.name as user_name','program.nama as program_name')
                    ->where('profil.nama', 'LIKE', '%' . $request->nama . '%')
                    ->get();
            // }
            // dd($profil);
            return view('profil.index', ['profil' => $profil]);
            // }
        }

        return view('profil.index');
    }

    public function store(ProfilRequest $request,Profil $model){}
}
