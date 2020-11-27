<?php

namespace App\Http\Controllers;

use Request;
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
use App\User;
use App\AuditTrail;
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

    public function index(ProgramRequest $request,Program $model)
    {   
        // $program = $model->all();

        $this->authorize('manage-items', User::class);

        $log = [
            'task'=>'program',
            'details'=>'Senarai Program',
            'entity_id'=>'0'
        ];
        $this->log_audit_trail($log);
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
                // echo "qweqweqe - ".$agensi_id;
                // dd($request->all());
                $program = DB::table('program')
                ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                ->where([['program.rekod_oleh','=',$user_id],['program.nama','like','%'.$request->program.'%']])
                ->orderBy('tarikh_kemaskini', 'desc')
                ->paginate(3);
            }else if ($role_id == '2'){
                // echo "asdsadasd - ".$agensi_id;
                // dd($request->all());
                $program = DB::table('program')
                ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                ->where([['program.nama','like','%'.$request->program.'%'],['program.agensi_id','=',$agensi_id]])
                ->orderBy('tarikh_kemaskini', 'desc')
                ->paginate(3);
            }else if ($role_id == '1'){
                // echo "zxcxzczxc - ".$agensi_id;
                // dd($request->all());
                $program = DB::table('program')
                ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                ->where('program.nama','like','%'.$request->program.'%')
                ->orderBy('tarikh_kemaskini', 'desc')
                ->paginate(3);
            }


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
                    ->orderBy('tarikh_kemaskini', 'desc')
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
                    ->orderBy('tarikh_kemaskini', 'desc')
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
                    ->orderBy('tarikh_kemaskini', 'desc')
                    //  ->get()
                    ->paginate(3);
                // $program = Program::orderBy('id', 'desc')->paginate(3);
            }
        }
        
        // return view('Program.index', ['Program' => $model->with(['tags', 'category'])->get()]);

        return view('program.index', ['program' => $program,'agensi'=>$agensi,'programList'=>$programList]);
    }

    public function create(ProgramRequest $request, Program $model)
    {
        // save log
        $log = [
            'task'=>'program',
            'details'=>'Halaman bina program baru',
            'entity_id'=>'0'
        ];
        $this->log_audit_trail($log);

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

    public function store(ProgramRequest $request, Program $model )
    {   
        $role_id = auth()->user()->role_id; 
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
            
            if ($role_id != '1'){
                // get admin email
                $usernama = auth()->user()->name; 
                $agensi_id = auth()->user()->agensi_id; 
                $pemohon = User::find($program->rekod_oleh);
                $agensi_data = Agensi::find($agensi_id);
                $program_data = Program::find($program->id);
                // dd($agensi_id);

                $data = [
                    'title'=>'Pemohonan Baru Telah Dipohon pada',
                    'task'=>'create',
                    'program'=>($program_data->nama ? $program_data->nama : "-"),
                    'agensi'=>($agensi_data->nama ? $agensi_data->nama : '-'),
                    'pemohon'=>$usernama,
                    'mula'=>($program_data->tarikh_mula ? $program_data->tarikh_mula : '-'),
                    'tamat'=>($program_data->tarikh_tamat ? $program_data->tarikh_tamat : '-'),
                    'tarikh_pohon'=>$program_data->created_at,
                    'status'=>$program_data->status_program_id

                ];

                // dd($data);

                // get admin email
                $admin_data = DB::table('users')->where('role_id', 1)->get();
                $admin_email = [];
                foreach($admin_data as $ad){
                    $admin_email[] = $ad->email;
                }
                // dd($admin_email);
                    
                Mail::send('program.email',$data, function ($message) use ($admin_email) {
                    $message->from('noreply@pdps.com.my', 'PDPS noreply');
                    // $message->to(['yusliadiyusof@pipeline.com.my','yusliadi46@gmail.com']);
                    $message->to($admin_email);
                    $message->subject('Permohonan Program Baru');
                });
            }
            
            // log
            $log = [
                'task'=>'program',
                'details'=>'Simpan program baru',
                'entity_id'=>$program->id
            ];
            $this->log_audit_trail($log);

        }

        // $program->tags()->sync($request->get('tags'));

        return redirect()->route('program.index')->withStatus(__('Program Berjaya Dicipta.'));
    }

    public function edit($program)
    {
        // log
        $log = [
            'task'=>'program',
            'details'=>'Halaman Kemaskini program',
            'entity_id'=>$program
        ];
        $this->log_audit_trail($log);

        $role_id = auth()->user()->role_id; 
        $agensi = Agensi::all();

        $program_data = Program::find($program);

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
            ->where('program_kumpulan_sasar.program_id','=', $program)
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
            ->where('program_master.program_id', $program)
            ->get();
        
        $sub_kategori_opt = [];
        $jenis_sub_kategori_opt = [];
        foreach($prog_master as $pm_key => $pm_data){
            $sub_kategori_opt[] = $pm_data->sub_kategori_id;
            $jenis_sub_kategori_opt[$pm_data->sub_kategori_id][] = $pm_data->jenis_sub_kategori_id;
        }

        $sub_kategori_opt = array_unique($sub_kategori_opt);

        return view('program.edit', [
            'subkat'=>$subkat,
            'jenissubkat'=>$jenissubkat,
            'kat'=>$kat,
            'program'=>$program_data,
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

    public function show($program)
    {
        // log
        $log = [
            'task'=>'program',
            'details'=>'Halaman lihat program',
            'entity_id'=>$program
        ];
        $this->log_audit_trail($log);

        $agensi_id = auth()->user()->agensi_id; 
        $role_id = auth()->user()->role_id; 
        $jenissubkat = JenisSubKategori::all();
        $subkat = SubKategori::all();
        $teras = Teras::all();
        $kategori = Kategori::all();
        $kekerapan = Kekerapan::all();
        $manfaat = Manfaat::all();
        $kumpulansasar = KumpulanSasar::all();
        $programkumpulansasar = ProgramKumpulanSasar::all();

        $program_data = DB::table('program')
            ->leftJoin('manfaat','manfaat.id','=','program.manfaat_id')
            ->leftJoin('kekerapan','kekerapan.id','=','program.kekerapan_id')
            ->leftJoin('kategori','kategori.id','=','program.kategori_id')
            ->select('program.*',
                    'manfaat.nama as manfaat_nama',
                    'kekerapan.nama as kekerapan_nama',
                    'kategori.nama_kategori as kategori_nama'
                    )
            ->where('program.id', $program)
            ->get()->first();

        $agensi_data = Agensi::find($program_data->agensi_id);
        // dd($agensi_data);

        $pks_data = DB::table('program_kumpulan_sasar')
            ->leftJoin('kumpulan_sasar','kumpulan_sasar.id','=','program_kumpulan_sasar.kumpulan_sasar_id')
            ->select('program_kumpulan_sasar.*','kumpulan_sasar.nama as ks_nama')
            ->where('program_kumpulan_sasar.program_id', $program)
            ->get();
        
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
            ->where('program_master.program_id', $program)
            ->get();
        
        // $sub_kategori_opt = [];
        // $jenis_sub_kategori_opt = [];
        // foreach($prog_master as $pm_key => $pm_data){
        //     $sub_kategori_opt[] = $pm_data->sub_kategori_id;
        //     $jenis_sub_kategori_opt[$pm_data->sub_kategori_id][] = $pm_data->jenis_sub_kategori_id;
        // }

        // dd($prog_master);
        // $sub_kategori_opt = array_unique($sub_kategori_opt);

        return view('program.view', [
            'subkat'=>$subkat,
            'jenissubkat'=>$jenissubkat,
            'program_data'=>$program_data,
            'agensi'=>$agensi_data,
            'prog_master'=>$prog_master,
            // 'sub_kategori_opt'=>$sub_kategori_opt,
            // 'jenis_sub_kategori_opt'=>$jenis_sub_kategori_opt,
            'role_id'=>$role_id,
            'kumpulansasar'=>$pks_data
        ]);
    }

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
                    $progkumpsasar->tarikh_kemaskini = now();
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
                    $program_master->tarikh_kemaskini = now();
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

            if ($role_id == '1'){

                // get email
                $program_data = Program::find($pid);
                $pemohon = User::find($program_data->rekod_oleh);

                $email_pemohon = $pemohon->email;
                
                // dd($pemohon->email);

                $data = [
                    'title'=>'Status Pemohonan Program.',
                    'task'=>'update',
                    'program'=>($program_data->nama ? $program_data->nama : "-"),
                    'agensi'=>'-',
                    'pemohon'=>$pemohon->name,
                    'mula'=>'-',
                    'tamat'=>'-',
                    'tarikh_pohon'=>$program_data->created_at,
                    'status'=>$program_data->status_program_id
                ];
                    
                Mail::send('program.email',$data, function ($message) use ($email_pemohon) {
                    $message->from('noreply@pdps.com.my', 'PDPS noreply');
                    $message->to($email_pemohon);
                    // $message->to($admin_email);
                    $message->subject('Status Pemohonan Program');
                });
            }

            // log
            $log = [
                'task'=>'program',
                'details'=>'Halaman lihat program',
                'entity_id'=>$pid
            ];
            $this->log_audit_trail($log);
        }

        // $program->update($request->all());
        return redirect()->route('program.index')->withStatus(__('Program Berjaya Dikemaskini.'));
    }

    public function destroy($id)
    {
        // log
        $log = [
            'task'=>'program',
            'details'=>'Padam Program',
            'entity_id'=>$id
        ];
        $this->log_audit_trail($log);

        // $program = Program::where('id',$id)->delete();  // ni piun boleh
        $program = Program::find($id);
        $program->destroy($id);
        // return redirect()->route('program.index')->withStatus(__('program Berjaya Dipadam.'));
        return redirect()->route('program.index')->with('alert', 'Deleted!');
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
        // $auditTrail->created_at = now();
        $auditTrail->updated_by = $userid;
        // $auditTrail->tarikh_kemaskini = now();
        $auditTrail->save();
        
        return $auditTrail;
    } 
}
