<?php

namespace App\Http\Controllers;

use Mail;
use Request;
use App\Agensi;
use App\Program; 
use App\Media;
use App\User;
use App\AuditTrail;
use Carbon\Carbon;
use App\Http\Requests\MediaRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\JenisSubKategori; 
use App\SubKategori; 
use App\Kategori; 
use App\ProgramMaster;
use App\KumpulanSasar;
use App\ProgramKumpulanSasar;
use App\Teras;
use App\Kekerapan;
use App\Manfaat;

class PengurusanKandunganController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Media::class);
    }

    public function program(MediaRequest $request,Media $model)
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

            if ($role_id == '2'){
                // echo "asdsadasd - ".$agensi_id;
                // dd($request->all());
                if($request->task == 1){
                    $program_new = DB::table('program')
                    ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                    ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                    ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                    ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                    ->where([['status_program_id','2'],['program.nama','like','%'.$request->program.'%'],['program.agensi_id','=',$agensi_id]])
                    ->orderBy('tarikh_kemaskini', 'desc')
                    ->paginate(2);

                    $program_approved = DB::table('program')
                    ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                    ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                    ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                    ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                    ->where([['status_program_id','2'],['program.agensi_id','=',$agensi_id]])
                    ->orderBy('tarikh_kemaskini', 'desc')
                    ->paginate(2);
                }else{
                    $program_new = DB::table('program')
                    ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                    ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                    ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                    ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                    ->where([['status_program_id','2'],['program.agensi_id','=',$agensi_id]])
                    ->orderBy('tarikh_kemaskini', 'desc')
                    ->paginate(2);

                    $program_approved = DB::table('program')
                    ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                    ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                    ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                    ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                    ->where([['status_program_id','2'],['program.nama','like','%'.$request->program.'%'],['program.agensi_id','=',$agensi_id]])
                    ->orderBy('tarikh_kemaskini', 'desc')
                    ->paginate(2);
                }

            }else if ($role_id == '1'){
                // echo "zxcxzczxc - ".$agensi_id;
                // dd($request->all());
                if($request->task == 1){
                    $program_new = DB::table('program')
                    ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                    ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                    ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                    ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                    ->where([['status_program_id','1'],['program.nama','like','%'.$request->program.'%']])
                    ->orderBy('tarikh_kemaskini', 'desc')
                    ->paginate(2);

                    $program_approved = DB::table('program')
                    ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                    ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                    ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                    ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                    ->where('status_program_id','2')
                    ->orderBy('tarikh_kemaskini', 'desc')
                    ->paginate(2);
                }else{
                    $program_new = DB::table('program')
                    ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                    ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                    ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                    ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                    ->where('status_program_id','1')
                    ->orderBy('tarikh_kemaskini', 'desc')
                    ->paginate(2);

                    $program_approved = DB::table('program')
                    ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                    ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                    ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                    ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                    ->where([['status_program_id','2'],['program.nama','like','%'.$request->program.'%']])
                    ->orderBy('tarikh_kemaskini', 'desc')
                    ->paginate(2);
                }
            }

        }else{

            if($role_id == '3'){

                $program_new = DB::table('program')
                    ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                    ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                    ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                    ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                    ->where([['status_program_id','1'],['program.rekod_oleh',$user_id]])
                    ->orderBy('tarikh_kemaskini', 'desc')
                    // ->get();
                    ->paginate(2);

                $program_approved = DB::table('program')
                    ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                    ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                    ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                    ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                    ->where([['status_program_id','2'],['program.rekod_oleh',$user_id]])
                    ->orderBy('tarikh_kemaskini', 'desc')
                    // ->get();
                    ->paginate(2);

            }else if ($role_id == '2'){

                $program_new = DB::table('program')
                    ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                    ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                    ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                    ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                    ->where([['status_program_id','1'],['program.rekod_oleh',$user_id]])
                    ->orderBy('tarikh_kemaskini', 'desc')
                    // ->get();
                    ->paginate(2);

                $program_approved = DB::table('program')
                    ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                    ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                    ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                    ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                    ->where([['status_program_id','2'],['program.rekod_oleh',$user_id]])
                    ->orderBy('tarikh_kemaskini', 'desc')
                    // ->get();
                    ->paginate(2);

            }else if ($role_id == '1'){
                $program_new = DB::table('program')
                    ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                    ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                    ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                    ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                    ->where('status_program_id','1')
                    ->orderBy('tarikh_kemaskini', 'desc')
                    //  ->get()
                    ->paginate(2);

                $program_approved = DB::table('program')
                    ->leftJoin('kekerapan', 'kekerapan.id', '=', 'program.kekerapan_id')
                    ->leftJoin('manfaat', 'manfaat.id', '=', 'program.manfaat_id')
                    ->leftJoin('kategori', 'kategori.id', '=', 'program.kategori_id')
                    ->select( 'program.*', 'manfaat.nama as nama_manfaat','kekerapan.nama as nama_kekerapan','kategori.nama_kategori as nama_kategori')
                    ->where('status_program_id','2')
                    ->orderBy('tarikh_kemaskini', 'desc')
                    //  ->get()
                    ->paginate(2);
            }
        }
        
        // return view('Program.index', ['Program' => $model->with(['tags', 'category'])->get()]);

        return view('pengurusan-kandungan.program', ['program_new' => $program_new,'program_approved' => $program_approved,'agensi'=>$agensi,'programList'=>$programList]);
        // return view('pengurusan-kandungan.program', ['medias' => $media]);
    }

    public function approve_program ($id,$value,$task){

        $userid = auth()->user()->id; 
        if($task == 1){
            // log
            if($value == 2){
                $log = [
                    'task'=>'program',
                    'details'=>'Luluskan pemohonan program',
                    'entity_id'=>$id
                ];
                $this->log_audit_trail($log);
            }else if($value == 3){
                $log = [
                    'task'=>'program',
                    'details'=>'Tolak pemohonan program',
                    'entity_id'=>$id
                ];
                $this->log_audit_trail($log);
            }

            $sql = 'UPDATE program
            SET status_program_id = '.$value.', kemaskini_oleh = '.$userid.',tarikh_kemaskini = "'.now().'"
            WHERE id = '.$id;
            $laporan = DB::select($sql);
        }else{

            // log
            $log = [
                'task'=>'program',
                'details'=>'Tidak terbitkan pemohonan program',
                'entity_id'=>$id
            ];
            $this->log_audit_trail($log);

            $sql = 'UPDATE program
            SET status_pelaksanaan_id = '.$value.', kemaskini_oleh = '.$userid.',tarikh_kemaskini = "'.now().'"
            WHERE id = '.$id;
            $laporan = DB::select($sql);
        }

        return redirect()->route('pengurusan-kandungan.program')->withStatus(__('Program Berjaya Dikemaskini.'));
    }
    
    public function delete_program($id)
    {
        // log
        $log = [
            'task'=>'program',
            'details'=>'Padam Program',
            'entity_id'=>$id
        ];
        $this->log_audit_trail($log);

        // $program = Program::where('id',$id)->delete();  // ni piun boleh
        $program = Program::where('id',$id)->delete();
        // $program->destroy($id);
        // return redirect()->route('program.index')->withStatus(__('program Berjaya Dipadam.'));
        return redirect()->route('pengurusan-kandungan.program')->with('alert', 'Deleted!');
    }

    public function media(MediaRequest $request,Media $model)
    {
        $this->authorize('manage-items', User::class);

        // save log
        $log = [
            'task'=>'banner & berita',
            'details'=>'Senarai banner & berita',
            'entity_id'=>'0'
        ];
        $this->log_audit_trail($log);

        $user_id = auth()->user()->id; 
        $role_id = auth()->user()->role_id; 
        $agensi_id = auth()->user()->agensi_id; 
        
        if($request->all() != []){
            
            if ($role_id == '1' && !empty($request->media) ){
                
                $media_new = DB::table('media')
                    ->leftJoin('users', 'users.id', '=', 'media.created_by')
                    ->leftJoin('program', 'program.id', '=', 'media.program_id')
                    ->select( 'media.*', 'users.name as user_name','program.nama as program_name')
                    ->where([['status',1],['media.jenis',$request->media]])
                    ->orderBy('updated_at', 'desc')
                    ->paginate(2);

                $media_approved = DB::table('media')
                    ->leftJoin('users', 'users.id', '=', 'media.created_by')
                    ->leftJoin('program', 'program.id', '=', 'media.program_id')
                    ->select( 'media.*', 'users.name as user_name','program.nama as program_name')
                    ->where('status',2)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(2);
            }else{

                $media_new = DB::table('media')
                    ->leftJoin('users', 'users.id', '=', 'media.created_by')
                    ->leftJoin('program', 'program.id', '=', 'media.program_id')
                    ->select( 'media.*', 'users.name as user_name','program.nama as program_name')
                    ->where('status',1)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(2);

                $media_approved = DB::table('media')
                    ->leftJoin('users', 'users.id', '=', 'media.created_by')
                    ->leftJoin('program', 'program.id', '=', 'media.program_id')
                    ->select( 'media.*', 'users.name as user_name','program.nama as program_name')
                    ->where('status',2)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(2);
            }
        }else{

                $media_new = DB::table('media')
                    ->leftJoin('users', 'users.id', '=', 'media.created_by')
                    ->leftJoin('program', 'program.id', '=', 'media.program_id')
                    ->select( 'media.*', 'users.name as user_name','program.nama as program_name')
                    ->where('status',1)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(2);

                $media_approved = DB::table('media')
                    ->leftJoin('users', 'users.id', '=', 'media.created_by')
                    ->leftJoin('program', 'program.id', '=', 'media.program_id')
                    ->select( 'media.*', 'users.name as user_name','program.nama as program_name')
                    ->where('status',2)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(2);
        }
        return view('pengurusan-kandungan.media', ['media_new' => $media_new,'media_approved' => $media_approved]);
    }

    public function approve_media ($id,$value,$task){

        $userid = auth()->user()->id; 
        if($task == 1){
            // log
            if($value == 2){
                $log = [
                    'task'=>'banner & berita',
                    'details'=>'Luluskan pemohonan banner & berita',
                    'entity_id'=>$id
                ];
                $this->log_audit_trail($log);
            }else if($value == 3){
                $log = [
                    'task'=>'banner & berita',
                    'details'=>'Tolak pemohonan banner & berita',
                    'entity_id'=>$id
                ];
                $this->log_audit_trail($log);
            }

            $sql = 'UPDATE media
            SET status = '.$value.', updated_by = '.$userid.',updated_at = "'.now().'"
            WHERE id = '.$id;
            $laporan = DB::select($sql);
        }else{

            // log
            $log = [
                'task'=>'program',
                'details'=>'Tidak terbitkan pemohonan program',
                'entity_id'=>$id
            ];
            $this->log_audit_trail($log);

            $sql = 'UPDATE media
            SET status = '.$value.', updated_by = '.$userid.',updated_at = "'.now().'"
            WHERE id = '.$id;
            $laporan = DB::select($sql);
        }

        return redirect()->route('pengurusan-kandungan.media')->withStatus(__('Program Berjaya Dikemaskini.'));
    }
    
    public function delete_media($id)
    {
        // log
        $log = [
            'task'=>'banner & berita',
            'details'=>'Padam banner & berita',
            'entity_id'=>$id
        ];
        $this->log_audit_trail($log);

        // $program = Program::where('id',$id)->delete();  // ni piun boleh
        $media = Media::where('id',$id)->delete();
        // $program->destroy($id);
        // return redirect()->route('program.index')->withStatus(__('program Berjaya Dipadam.'));
        return redirect()->route('pengurusan-kandungan.media')->with('alert', 'Deleted!');
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
