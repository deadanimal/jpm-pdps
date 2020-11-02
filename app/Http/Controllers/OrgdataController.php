<?php

namespace App\Http\Controllers;

use App\Program; 
use App\Orgdata;
use App\Agensi;
use Carbon\Carbon;
use App\Http\Requests\OrgdataRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrgdataController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Orgdata::class);
    }

    /**
     * Display a listing of the orgdata
     *
     * @param \App\Orgdata  $model
     * @return \Illuminate\View\View
     */
    public function index(Orgdata $model)
    {
        $user_id = auth()->user()->id; 
        $role_id = auth()->user()->role_id; 
        $agensi_id = auth()->user()->agensi_id;
        $agensi = Agensi::all();

        if($role_id == '3'){
            $permitaandata = DB::table('permintaan_data')
                ->leftjoin('users', 'users.id', '=', 'permintaan_data.created_by')
                ->leftjoin('program', 'program.id', '=', 'permintaan_data.program_id')
                ->leftjoin('agensi', 'agensi.id', '=', 'permintaan_data.agensi_id')
                ->select('permintaan_data.*', 'users.name as user_name','program.nama as program_name','agensi.nama as nama_agensi')
                ->where('permintaan_data.created_by',$user_id)
                // ->get();
                ->paginate(3);
        }else if ($role_id == '2'){
            $permitaandata = DB::table('permintaan_data')
                ->leftjoin('users', 'users.id', '=', 'permintaan_data.created_by')
                ->leftjoin('program', 'program.id', '=', 'permintaan_data.program_id')
                ->leftjoin('agensi', 'agensi.id', '=', 'permintaan_data.agensi_id')
                ->select('permintaan_data.*', 'users.name as user_name','program.nama as program_name','agensi.nama as nama_agensi')
                // ->where('permintaan_data.agensi_id',$agensi_id)
                ->where('permintaan_data.created_by',$user_id)
                // ->get();
                ->paginate(3);
        }else if ($role_id == '1'){
            $permitaandata = DB::table('permintaan_data')
                ->leftjoin('users', 'users.id', '=', 'permintaan_data.created_by')
                ->leftjoin('program', 'program.id', '=', 'permintaan_data.program_id')
                ->leftjoin('agensi', 'agensi.id', '=', 'permintaan_data.agensi_id')
                ->select( 'permintaan_data.*', 'users.name as user_name','program.nama as program_name','agensi.nama as nama_agensi')
                // ->get();
                ->paginate(3);
        }

        foreach($permitaandata as $qweqwe){
            
        }

        // $user = User::all();
        // $program = Program::all();
        // print_r("qweqweqweq");die;
        // return view('orgdata.index', ['orgdata' => $model->with(['tags', 'category'])->get()]);
        // $this->authorize('manage-items', User::class);
        // $perimtaanData = $model->all();
        // $permitaandata = DB::table('permintaan_data')
        //     ->leftjoin('users', 'users.id', '=', 'permintaan_data.created_by')
        //     ->leftjoin('program', 'program.id', '=', 'permintaan_data.program_id')
        //     ->leftjoin('agensi', 'agensi.id', '=', 'permintaan_data.agensi_id')
        //     ->select( 'permintaan_data.*', 'users.name as user_name','program.nama as program_name','agensi.nama as nama_agensi')
        //     ->get();

            // dd($permitaandata);

        return view('orgdata.index', ['orgdata' => $permitaandata,'agensidata'=>$agensi,'agensi_id'=>$agensi_id]);
    }

    /**
     * Show the form for creating a new item
     *
     * @param  \App\Tag $tagModel
     * @param  \App\Category $categoryModel
     * @return \Illuminate\View\View
     */
    public function create(OrgdataRequest $request, Orgdata $model)
    {
        $program = Program::all();
        $agensi = Agensi::all();

        return view('orgdata.create', ['program'=>$program,'agensi'=>$agensi]);
        // return view('orgdata.create');

        // $model->create($request->all());
        // return redirect()->route('orgdata.index')->withStatus(__('Role successfully created.'));
    }

    /**
     * Store a newly created item in storage
     *
     * @param  \App\Http\Requests\ItemRequest  $request
     * @param  \App\Item  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OrgdataRequest $request, Orgdata $model)
    {   
        $userid = auth()->user()->id; 
        
        // dd($request->all());
        
        $orgdata = $model->create($request->merge([
            'program_id' => $request->program_id ? $request->program_id : "-",
            'agensi_id' => $request->agensi_id ? $request->agensi_id : "-",
            'status' => 1,
            'subjek' => $request->subjek ? $request->subjek : "-",
            'created_by' => $userid,
            'created_at' => now(),
            'updated_by' => $userid,
            'updated_at' => now()
        ])->all());

        // $orgdata->tags()->sync($request->get('tags'));

        return redirect()->route('orgdata.index')->withStatus(__('Item successfully created.'));
    }

    public function edit($orgdata)
    {
        $user_id = auth()->user()->id; 
        $role_id = auth()->user()->role_id; 
        $program = Program::all();
        $agensi = Agensi::all();
        $orgdata = Orgdata::find($orgdata);
        // return view('orgdata.edit', compact('orgdata'));
        return view('orgdata.edit', [
            'orgdata'=>$orgdata,
            'program'=>$program,
            'agensi'=>$agensi,
            'role_id'=>$role_id,
            ]);
    }
    // public function edit(Orgdata  $orgdata)
    // {
    //     return view('orgdata.edit', compact('orgdata'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Itemuest  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OrgdataRequest $request,$orgdata)
    {
        $userid = auth()->user()->id; 
        $role_id = auth()->user()->role_id; 
        $orgdata = Orgdata::find($orgdata);
        // dd($request);

        // $item->tags()->sync($request->get('tags'));
        if($role_id == '1' ){
            $orgdata = $orgdata->update($request->merge([
                'status' => $request->status ? $request->status : null,
                'updated_by' => $userid,
                'updated_at' => now()
            ])->all());
        }else {
            $orgdata = $orgdata->update($request->merge([
                'program_id' => $request->program_id ? $request->program_id : null,
                'agensi_id' => $request->agensi_id ? $request->agensi_id : null,
                'subjek' => $request->subjek ? $request->subjek : null,
                'status' => $request->status ? $request->status : null,
                'updated_by' => $userid,
                'updated_at' => now()
            ])->all());
        }

        // $orgdata->update($request->all());
        return redirect()->route('orgdata.index')->withStatus(__('Pemohonan Data Berjaya Disimpan.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $orgdata = Orgdata::find($id);
        $orgdata->destroy($id);
        return redirect()->route('orgdata.index')->withStatus(__('orgdata successfully deleted.'));
    }
}
