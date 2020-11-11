<?php

namespace App\Http\Controllers;

use Mail;
use App\Program; 
use App\Orgdata;
use App\Agensi;
use App\User;
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

    public function index(Orgdata $model)
    {
        $this->authorize('manage-items', User::class);
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
                ->orderBy('id', 'desc')
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
                ->orderBy('id', 'desc')
                ->paginate(3);
        }else if ($role_id == '1'){
            $permitaandata = DB::table('permintaan_data')
                ->leftjoin('users', 'users.id', '=', 'permintaan_data.created_by')
                ->leftjoin('program', 'program.id', '=', 'permintaan_data.program_id')
                ->leftjoin('agensi', 'agensi.id', '=', 'permintaan_data.agensi_id')
                ->select( 'permintaan_data.*', 'users.name as user_name','program.nama as program_name','agensi.nama as nama_agensi')
                // ->get();
                ->orderBy('id', 'desc')
                ->paginate(3);
        }

        // $user = User::all();
        // $program = Program::all();
        // print_r("qweqweqweq");die;
        // return view('orgdata.index', ['orgdata' => $model->with(['tags', 'category'])->get()]);
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

    public function create(OrgdataRequest $request, Orgdata $model)
    {

        $program = Program::all();
        $agensi = Agensi::all();

        return view('orgdata.create', ['program'=>$program,'agensi'=>$agensi]);
        // return view('orgdata.create');

        // $model->create($request->all());
        // return redirect()->route('orgdata.index')->withStatus(__('Role successfully created.'));
    }

    public function store(OrgdataRequest $request, Orgdata $model)
    {   
        $userid = auth()->user()->id; 
        $role_id = auth()->user()->role_id; 
        
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


        if($orgdata){
            if ($role_id != '1'){

                // get email
                $usernama = auth()->user()->name; 
                $agensi_id = auth()->user()->agensi_id; 
                $agensi_pemohon = Agensi::find($agensi_id);
                $dipohon = Agensi::find($orgdata->agensi_id);

                $data = [
                    'title'=>'Pemohonan data telah dimohon',
                    'task'=>'create',
                    'pemohon'=>($agensi_pemohon->nama?$agensi_pemohon->nama:'-'),
                    'dipohon'=>($dipohon->nama?$dipohon->nama:'-'),
                    'tarikh_pohon'=>$orgdata->created_at,
                    'status'=>'-'
                ];

                // get admin email
                $admin_data = DB::table('users')->where('role_id', 1)->get();
                $admin_email = [];
                foreach($admin_data as $ad){
                    $admin_email[] = $ad->email;
                }
                    
                Mail::send('orgdata.email',$data, function ($message) use ($admin_email) {
                    $message->from('noreply@pdps.com.my', 'PDPS noreply');
                    $message->to($admin_email);
                    $message->subject('Pemohonan Data Baru');
                });
            }

            // Mail::send('orgdata.email', [], function ($message) {
            //     $message->from('noreply@pipeline.com.my', 'Pemohonan Data');
            //     $message->to('yusliadiyusof@pipeline.com.my')->cc('yusliadiyusof@pipeline.com.my');
            //     $message->subject('Pemohonan Data');
            // });

        }

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

    public function show($orgdata)
    {
        $user_id = auth()->user()->id; 
        $role_id = auth()->user()->role_id; 
        $orgdata_detail = DB::table('permintaan_data')
                    ->leftjoin('users', 'users.id', '=', 'permintaan_data.created_by')
                    ->leftjoin('program', 'program.id', '=', 'permintaan_data.program_id')
                    ->leftjoin('agensi', 'agensi.id', '=', 'permintaan_data.agensi_id')
                    ->select( 'permintaan_data.*', 
                            'users.name as user_name',
                            'program.nama as program_name',
                            'agensi.nama as nama_agensi','users.agensi_id as agensi_pemohon_id')
                    ->where('permintaan_data.id','=',$orgdata)
                    ->first();
        // dd($orgdata);
        // $program = Program::find($orgdata->program_id);
        // $agensi_dipohon = Agensi::find($orgdata->agensi_id);
        // $user = User::find($orgdata->created_by);
        // echo $orgdata_detail->agensi_pemohon_id;
        // die;
        $agensi_pemohon = Agensi::find($orgdata_detail->agensi_pemohon_id);
        // echo $orgdata->agensi_id." ".$user->agensi_id;
        // dd($agensi_pemohon);
        return view('orgdata.view', [
            'orgdata'=>$orgdata_detail,
            // 'agensi_dipohon'=>$agensi_dipohon,
            'agensi_pemohon'=>$agensi_pemohon,
            'role_id'=>$role_id,
            ]);
    }
    
    public function update(OrgdataRequest $request,$orgdata)
    {
        $userid = auth()->user()->id; 
        $role_id = auth()->user()->role_id; 
        $oid = $orgdata;
        $orgdata = Orgdata::find($orgdata);
        // dd($request);

        // $item->tags()->sync($request->get('tags'));
        if($role_id == '1' ){
            $orgdata = $orgdata->update($request->merge([
                'status' => $request->status ? $request->status : null,
                'updated_by' => $userid,
                'updated_at' => now()
            ])->all());

            if($orgdata){

                // get email
                $org_data = Orgdata::find($oid);
                $dimohon_data = User::find($org_data->created_by);
                $agensi_dimohon = Agensi::find($dimohon_data->agensi_id);
                $email_pemohon = $dimohon_data->email;

                $data = [
                    'title'=>'Pemohonan data telah dimohon',
                    'task'=>'update',
                    'pemohon'=>$dimohon_data->name,
                    'dipohon'=>($org_data->nama?$org_data->nama:'-'),
                    'tarikh_pohon'=>$org_data->created_at,
                    'status'=>'-'
                ];
                 
                Mail::send('orgdata.email',$data, function ($message) use ($email_pemohon) {
                    $message->from('noreply@pdps.com.my', 'PDPS noreply');
                    $message->to($email_pemohon);
                    $message->subject('Status Pemohonan Data');
                });
            }
            
        }else {
            $orgdata = $orgdata->update($request->merge([
                'program_id' => $request->program_id ? $request->program_id : null,
                'agensi_id' => $request->agensi_id ? $request->agensi_id : null,
                'subjek' => $request->subjek ? $request->subjek : null,
                'status' => $request->status ? $request->status : null,
                'updated_by' => $userid,
                'updated_at' => now()
            ])->all());

            // if($orgdata){

            //     $data = [
            //         'userid'=>$userid,
            //         'task'=>'update'
            //     ];

            //     Mail::send('orgdata.email',$data, function ($message) {
            //         $message->from('noreply@pipeline.com.my', 'Pipeline noreply');
            //         $message->to('yusliadiyusof@pipeline.com.my');
            //         $message->subject('Pemohonan Data');
            //     });
            // }
        }


        // $orgdata->update($request->all());
        return redirect()->route('orgdata.index')->withStatus(__('Pemohonan Data Berjaya Disimpan.'));
    }
    
    public function destroy($id)
    {
        $orgdata = Orgdata::find($id);
        $orgdata->destroy($id);
        return redirect()->route('orgdata.index')->withStatus(__('orgdata successfully deleted.'));
    }
}
