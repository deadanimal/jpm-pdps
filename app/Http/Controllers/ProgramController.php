<?php

namespace App\Http\Controllers;

use Mail;
use App\JenisSubKategori; 
use App\SubKategori; 
use App\Kategori; 
use App\Program;
use App\Agensi;
use App\ProgramMaster;
use App\KumpulanSasar;
use App\ProgramKumpulanSasar;
use App\Teras;
use App\Kekerapan;
use App\Manfaat;
use Carbon\Carbon;
use App\Http\Requests\ProgramRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProgramController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Program::class);
    }

    /**
     * Display a listing of the program
     *
     * @param \App\Program  $model
     * @return \Illuminate\View\View
     */
    public function index(ProgramRequest $request,Program $model)
    {   
        // $program = $model->all();

        $user_id = auth()->user()->id; 
        $role_id = auth()->user()->role_id; 
        $agensi_id = auth()->user()->agensi_id; 

        $programList = Program::all();
        $agensi = Agensi::all();
        $jenissubkat = JenisSubKategori::all();
        $subkat = SubKategori::all();
        $kat = Kategori::all();
        $agensi = Agensi::all();
        $teras = Teras::all();
        $kekerapan = Kekerapan::all();
        $manfaat = Manfaat::all();

        if($request->all() != []){

            if($role_id == '3'){
            }else if ($role_id == '2'){
            }else if ($role_id == '1'){
    
                if($request->program != '00'){
                    // $data_sql1 = "['program.id', '=',".$request->program."]";
                    $data_sql1 = ['program.id'=>1];
                }else{
                    $data_sql1 = '';
                }

                if($request->agensi != '00'){
                    $and = ($request->program != '00' ? ' ,' : '');
                    $data_sql2 = $and."['program.agensi_id',6]";
                }else{
                    $data_sql2 = '';
                }

                $whereData = [
                    $data_sql1
                ];

                // print_r($whereData);
    
            }
    
            // $psql = "
            //     select a.*, c.nama as nama_manfaat, b.nama as nama_kekerapan, d.nama_kategori as nama_kategori 
            //     from program a
            //     left join kekerapan b on b.id = a.kekerapan_id
            //     left join manfaat c on c.`id`= a.`manfaat_id`
            //     left join kategori d on d.`id` = a.`kategori_id` where
            //     ".$prog_sql.$agensi_sql." order by a.id DESC ";
            // $program = DB::select($psql);

            // print_r($data_sql1);
            // print_r($data_sql2);
            // die;

            $program = DB::table('program')
            ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
            ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
            ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
            ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
            ->where('program.nama','like','%'.$request->program.'%')
            ->orderBy('id', 'desc')
            // ->get();
            ->paginate(3);

            // dd($program);
            // return view('program.index', ['program' => $program,'agensi'=>$agensi,'programList'=>$programList]);
        }else{

            if($role_id == '3'){

                $program = DB::table('program')
                    ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                    ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                    ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                    ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                    ->where('program.rekod_oleh',$user_id)
                    ->orderBy('id', 'desc')
                    // ->get();
                    ->paginate(3);
                // $program = Program::where('rekod_oleh', $user_id)->get();
            }else if ($role_id == '2'){

                $program = DB::table('program')
                    ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                    ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                    ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                    ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                    ->where('program.rekod_oleh',$user_id)
                    ->orderBy('id', 'desc')
                    // ->get();
                    ->paginate(3);
                // $program = Program::where('rekod_oleh', $user_id)->get();
                // $program = Program::where('agensi_id', $agensi_id)->get();

            }else if ($role_id == '1'){
                $program = DB::table('program')
                    ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                    ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                    ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                    ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                    ->orderBy('id', 'desc')
                    //  ->get()
                    ->paginate(3);
                // $program = Program::orderBy('id', 'desc')->paginate(3);
            }
        }
        
        // return view('Program.index', ['Program' => $model->with(['tags', 'category'])->get()]);
        // $this->authorize('manage-items', User::class);

        return view('program.index', ['program' => $program,'agensi'=>$agensi,'programList'=>$programList]);
    }

    /**
     * Show the form for creating a new item
     *
     * @param  \App\Tag $tagModel
     * @param  \App\Category $categoryModel
     * @return \Illuminate\View\View
     */
    public function create(ProgramRequest $request, Program $model)
    {
        $agensi_id = auth()->user()->agensi_id; 
        $role_id = auth()->user()->role_id; 
        $jenissubkat = JenisSubKategori::all();
        $subkat = SubKategori::all();
        $kat = Kategori::all();
        $agensi = Agensi::all();
        $teras = Teras::all();
        $kekerapan = Kekerapan::all();
        $manfaat = Manfaat::all();
        $kumpulansasar = KumpulanSasar::all();
        $programkumpulansasar = ProgramKumpulanSasar::all();

        return view('program.create', ['subkat'=>$subkat,
            'jenissubkat'=>$jenissubkat,
            'kat'=>$kat,
            'agensi'=>$agensi,
            'kumpulansasar'=>$kumpulansasar,
            'agensiid'=>$agensi_id,
            'role_id'=>$role_id,
            'teras'=>$teras,
            'kekerapan'=>$kekerapan,
            'manfaat'=>$manfaat
        ]);

        // dd($tagModel->get(['id', 'name']));
        // return view('Program.create', [
        //     'tags' => $tagModel->get(['id', 'name']),
        //     'categories' => $categoryModel->get(['id', 'name'])
        // ]);

        // $model->create($request->all());
        // return redirect()->route('program.index')->withStatus(__('Role successfully created.'));
    }

    /**
     * Store a newly created item in storage
     *
     * @param  \App\Http\Requests\ItemRequest  $request
     * @param  \App\Item  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProgramRequest $request, Program $model )
    {   
        $userid = auth()->user()->id; 
        
        $program = $model->create($request->merge([
            'nama' => $request->nama ? $request->nama : "-" ,
            'agensi_id' => $request->agensi_id ? $request->agensi_id : null,
            'kategori_id' => $request->kategori_id ? $request->kategori_id : null,
            'teras_id' => $request->teras_id ? $request->teras_id : null,
            'manfaat_id' => $request->manfaat_id ? $request->manfaat_id : null,
            'tarikh_mula' => $request->tarikh_mula ? $request->tarikh_mula : null,
            'tarikh_tamat' => $request->tarikh_tamat ? $request->tarikh_tamat : null,
            'kekerapan_id' => $request->kekerapan_id ? $request->kekerapan_id : null,
            'objektif' => $request->objektif ? $request->objektif : null,
            'kos' => $request->kos ? $request->kos : null,
            'syarat_program' => $request->syarat_program ? $request->syarat_program : null,
            'status_pelaksanaan_id' => $request->status_pelaksanaan_id ? $request->status_pelaksanaan_id : null,
            'url' => $request->url ? $request->url : null,
            'logo' => $request->photo ? $request->photo->store('logo', 'public') : null,
            'rekod_oleh' => $userid,
            'tarikh_rekod' => now(),
            'kemaskini_oleh' => $userid,
            'tarikh_kemaskini' => now()
        ])->all());

        if($program){

            //  insert data to kumpulan sasar
            if(!empty($request->ks_id)){
                foreach($request->ks_id as $ks){
                    $progkumpsasar = new ProgramKumpulanSasar;
                    $progkumpsasar->program_id = $program->id;
                    $progkumpsasar->kumpulan_sasar_id = $ks;
                    $progkumpsasar->created_by = $userid;
                    $progkumpsasar->created_at = now();
                    $progkumpsasar->updated_by = $userid;
                    $progkumpsasar->updated_at = now();
                    $progkumpsasar->save();
                    // print_r($idss);
                    // echo $idss[0]."--".$idss[1]."  ";
                    // $createcompany=DB::table('program_master')->create(
                    //     [
                    //         'program_id' => $program->id,
                    //         'sub_kategori_id' => $idss[0],
                    //         'jenis_sub_kategori_id' => $idss[1]
                    //     ]
                    // );
                }
            }

            // insert data to sub kategori
            if(!empty($request->nama_sub_kategori_id)){
                foreach($request->nama_sub_kategori_id as $qq){
                    $idss  = explode('_',$qq);
                    $program_master = new ProgramMaster;
                    $program_master->program_id = $program->id;
                    $program_master->sub_kategori_id = $idss[0];
                    $program_master->jenis_sub_kategori_id = $idss[1];
                    $program_master->created_by = $userid;
                    $program_master->created_at = now();
                    $program_master->updated_by = $userid;
                    $program_master->updated_at = now();
                    $program_master->save();
                    // print_r($idss);
                    // echo $idss[0]."--".$idss[1]."  ";
                    // $createcompany=DB::table('program_master')->create(
                    //     [
                    //         'program_id' => $program->id,
                    //         'sub_kategori_id' => $idss[0],
                    //         'jenis_sub_kategori_id' => $idss[1]
                    //     ]
                    // );
                }
            }
            
            $data = [
                'userid'=>$userid,
                'task'=>'create'
            ];
                
            Mail::send('program.email',$data, function ($message) {
                $message->from('noreply@pipeline.com.my', 'pipeline noreply');
                $message->to('yusliadiyusof@pipeline.com.my');
                $message->subject('Create Program');
            });

        }

        // $program->tags()->sync($request->get('tags'));

        return redirect()->route('program.index')->withStatus(__('Program Berjaya Dicipta.'));
    }

    /**
     * Show the form for editing the specified item
     *
     * @param  \App\Item  $item
     * @param  \App\Tag   $tagModel
     * @param  \App\Category $categoryModel
     * @return \Illuminate\View\View
     */
    public function edit($program)
    {
        $role_id = auth()->user()->role_id; 
        $agensi = Agensi::all();
        $program = Program::find($program);
        $jenissubkat = JenisSubKategori::all();
        $subkat = SubKategori::all();
        $kat = Kategori::all();
        $agensi = Agensi::all();
        $teras = Teras::all();
        $kekerapan = Kekerapan::all();
        $manfaat = Manfaat::all();
        $kumpulansasar = KumpulanSasar::all();
        $programkumpulansasar = ProgramKumpulanSasar::all();

        $pks_data = DB::table('program_kumpulan_sasar')
            ->select( 'program_kumpulan_sasar.*') 
            ->where('program_kumpulan_sasar.program_id', $program->id)
            ->get();
        
        $pks = [];
        
        foreach($pks_data as $pks_k => $pks_val){
            $pks[] = $pks_val->kumpulan_sasar_id;
        }

        $prog_master = DB::table('program_master')
            ->leftjoin('program', 'program.id', '=', 'program_master.program_id')
            ->leftjoin('sub_kategori', 'sub_kategori.id', '=', 'program_master.sub_kategori_id')
            ->leftjoin('jenis_sub_kategori', 'jenis_sub_kategori.id', '=', 'program_master.jenis_sub_kategori_id')
            ->select( 'program_master.*', 
                'sub_kategori.id as sub_kat_id', 
                'sub_kategori.nama_sub_kategori', 
                'jenis_sub_kategori.id as jenis_sub_cat_id',
                'jenis_sub_kategori.nama_jenis_sub_kategori as jenis_sub_cat_name')
            ->where('program_master.program_id', $program->id)
            ->get();
        
        $sub_kategori_opt = [];
        $jenis_sub_kategori_opt = [];
        foreach($prog_master as $pm_key => $pm_data){
            $sub_kategori_opt[] = $pm_data->sub_kategori_id;
            $jenis_sub_kategori_opt[$pm_data->sub_kategori_id][] = $pm_data->jenis_sub_kategori_id;
        }

        // dd($jenis_sub_kategori_opt);
        $sub_kategori_opt = array_unique($sub_kategori_opt);
        // print_r($sub_kategori_opt);
        // die;

        // dd($prog_master);


        return view('program.edit', [
            'subkat'=>$subkat,
            'jenissubkat'=>$jenissubkat,
            'kat'=>$kat,
            'program'=>$program,
            'agensi'=>$agensi,
            'prog_master'=>$prog_master,
            'sub_kategori_opt'=>$sub_kategori_opt,
            'jenis_sub_kategori_opt'=>$jenis_sub_kategori_opt,
            'role_id'=>$role_id,
            'kumpulansasar'=>$kumpulansasar,
            'pks'=>$pks,
            'teras'=>$teras,
            'manfaat'=>$manfaat,
            'kekerapan'=>$kekerapan
        ]);
    }
    // public function edit(program  $program)
    // {
    //     return view('program.edit', compact('program'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Itemuest  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProgramRequest $request,$program)
    {
        $userid = auth()->user()->id; 
        $role_id = auth()->user()->role_id; 
        $program = Program::find($program);
        $pid = $program->id;
        // print_r($program);
        // print_r($request->description);
        // dd($request->all());

        // if($role_id == '1'){
        //     $program = $program->update(
        //         $request->merge([
        //             // 'logo' => $request->photo ? $request->photo->store('logo', 'public') : null,
        //             'status_pelaksanaan' => $request->status_pelaksanaan ? $request->status_pelaksanaan : null,
        //             'status_program' => $request->status_program ? $request->status_program : null,
        //             'kemaskini_oleh' => $userid,
        //             'tarikh_kemaskini' => now(),
        //         // ])->all());
        //         ])->except([$request->hasFile('photo') ? '' : 'logo'])
        //     );

        // }else{
            $program = $program->update(
                $request->merge([
                    'nama' => $request->nama ? $request->nama : "-" ,
                    'agensi_id' => $request->agensi_id ? $request->agensi_id : null,
                    'kategori_id' => $request->kategori_id ? $request->kategori_id : null,
                    'teras_id' => $request->teras_id ? $request->teras_id : null,
                    'manfaat_id' => $request->manfaat_id ? $request->manfaat_id : null,
                    'tarikh_mula' => $request->tarikh_mula ? $request->tarikh_mula : null,
                    'tarikh_tamat' => $request->tarikh_tamat ? $request->tarikh_tamat : null,
                    'kekerapan_id' => $request->kekerapan_id ? $request->kekerapan_id : null,
                    'objektif' => $request->objektif ? $request->objektif : null,
                    'kos' => $request->kos ? $request->kos : null,
                    'syarat_program' => $request->syarat_program ? $request->syarat_program : null,
                    'url' => $request->url ? $request->url : null,
                    // 'logo' => $request->photo ? $request->photo->store('logo', 'public') : null,
                    'status_pelaksanaan_id' => $request->status_pelaksanaan_id ? $request->status_pelaksanaan_id : null,
                    'status_program_id' => $request->status_program_id ? $request->status_program_id : null,
                    'kemaskini_oleh' => $userid,
                    'tarikh_kemaskini' => now(),
                // ])->all());
                ])->except([$request->hasFile('photo') ? '' : 'logo'])
            );
        // }

        if($program){
            //  insert data to kumpulan sasar
            if(!empty($request->ks_id)){
                $qqq = DB::table('program_kumpulan_sasar')->where('program_kumpulan_sasar.program_id', $pid)->delete();
                foreach($request->ks_id as $ks){
                    $progkumpsasar = new ProgramKumpulanSasar;
                    $progkumpsasar->program_id = $pid;
                    $progkumpsasar->kumpulan_sasar_id = $ks;
                    $progkumpsasar->created_by = $userid;
                    $progkumpsasar->created_at = now();
                    $progkumpsasar->updated_by = $userid;
                    $progkumpsasar->updated_at = now();
                    $progkumpsasar->save();
                    // print_r($idss);
                    // echo $idss[0]."--".$idss[1]."  ";
                    // $createcompany=DB::table('program_master')->create(
                    //     [
                    //         'program_id' => $program->id,
                    //         'sub_kategori_id' => $idss[0],
                    //         'jenis_sub_kategori_id' => $idss[1]
                    //     ]
                    // );
                }
            }

            // insert into sub kategori
            if(!empty($request->nama_sub_kategori_id)){
                $qqq = DB::table('program_master')->where('program_master.program_id', $pid)->delete();
                // dd($qqq);

                foreach($request->nama_sub_kategori_id as $qq){
                    $idss  = explode('_',$qq);
                    $program_master = new ProgramMaster;
                    $program_master->program_id = $pid;
                    $program_master->sub_kategori_id = $idss[0];
                    $program_master->jenis_sub_kategori_id = $idss[1];
                    $program_master->created_by = $userid;
                    $program_master->created_at = now();
                    $program_master->updated_by = $userid;
                    $program_master->updated_at = now();
                    $program_master->save();
                    // print_r($idss);
                    // echo $idss[0]."--".$idss[1]."  ";
                    // $createcompany=DB::table('program_master')->create(
                    //     [
                    //         'program_id' => $program->id,
                    //         'sub_kategori_id' => $idss[0],
                    //         'jenis_sub_kategori_id' => $idss[1]
                    //     ]
                    // );
                }
            }

            $data = [
                'userid'=>$userid,
                'task'=>'update'
            ];
                
            Mail::send('orgdata.emailAdminUpdate',$data, function ($message) {
                $message->from('noreply@pipeline.com.my', 'pipeline noreply');
                $message->to('yusliadiyusof@pipeline.com.my');
                $message->subject('Update Program');
            });
        }

        // $program->update($request->all());
        return redirect()->route('program.index')->withStatus(__('Program Berjaya Dikemaskini.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy($id)
    {
        // $program = Program::where('id',$id)->delete();  // ni piun boleh
        $program = Program::find($id);
        $program->destroy($id);
        return redirect()->route('program.index')->withStatus(__('program Berjaya Dipadam.'));
    }
}
