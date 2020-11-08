<?php

namespace App\Http\Controllers;

use Mail;
use Request;
use App\Agensi;
use App\Program; 
use App\Media;
use App\User;
use Carbon\Carbon;
use App\Http\Requests\MediaRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class MediaController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Media::class);
    }

    /**
     * Display a listing of the Media
     *
     * @param \App\Media  $model
     * @return \Illuminate\View\View
     */
    public function index(Media $model)
    {
        $user_id = auth()->user()->id; 
        $role_id = auth()->user()->role_id; 
        $agensi_id = auth()->user()->agensi_id; 
        
        if($role_id == '3'){
            $media = DB::table('media')
                ->leftJoin('users', 'users.id', '=', 'media.created_by')
                ->leftJoin('program', 'program.id', '=', 'media.program_id')
                ->select( 'media.*', 'users.name as user_name','program.nama as program_name')
                ->where('media.created_by',$user_id)
                // ->get();
                ->paginate(3);
        }else if ($role_id == '2'){
            $media = DB::table('media')
                ->leftJoin('users', 'users.id', '=', 'media.created_by')
                ->leftJoin('program', 'program.id', '=', 'media.program_id')
                ->select( 'media.*', 'users.name as user_name','program.nama as program_name')
                // ->where('media.agensi_id',$agensi_id)
                ->where('media.created_by',$user_id)
                // ->get();
                ->paginate(3);
        }else if ($role_id == '1'){
            $media = DB::table('media')
                ->leftJoin('users', 'users.id', '=', 'media.created_by')
                ->leftJoin('program', 'program.id', '=', 'media.program_id')
                ->select( 'media.*', 'users.name as user_name','program.nama as program_name')
                // ->get();
                ->paginate(3);
        }

        // echo Request::ip();
        // dd($_SERVER);
        // $media = DB::table('media')
        //     ->join('users', 'users.id', '=', 'media.created_by')
        //     ->join('program', 'program.id', '=', 'media.program_id')
        //     ->select( 'media.*', 'users.name as user_name','program.nama as program_name')
        //     ->get();
            // dd($media);

        $user = User::all();
        $program = Program::all();
        // $media = $model->all();

        // print_r("qweqweqweq");die;
        // return view('Media.index', ['Media' => $model->with(['tags', 'category'])->get()]);
        // $this->authorize('manage-items', User::class);

        // return view('media.index', ['media' => $model->all());
        return view('media.index', ['medias' => $media]);
    }

    public function create(MediaRequest $request, Media $model)
    {
        // print_r("qweqweqwe");die;

        $user_id = auth()->user()->id; 
        $role_id = auth()->user()->role_id; 
        $agensi_id = auth()->user()->agensi_id; 
        $agensi = Agensi::all();
        $program = Program::all();
        return view('media.create',[
            'program' => $program,
            'agensi'=>$agensi,
            'role_id'=>$role_id,
            'agensi_id'=>$agensi_id
        ]);

        // return view('Program.create', [
        //     'tags' => $tagModel->get(['id', 'name']),
        //     'categories' => $categoryModel->get(['id', 'name'])
        // ]);

        // $model->create($request->all());
        // return redirect()->route('program.index')->withStatus(__('Role successfully created.'));
    }
    
    public function store(MediaRequest $request,Media $model)
    {   
        $userid = auth()->user()->id; 
        // echo "<pre>";
        // print_r($request->name);
        // dd($request->all());
        // die;
        // echo "</pre>";
        if($request->jenis == '1'){
            $prog_id = null;
        }else if($request->jenis == '2'){
            $prog_id = $request->program_id;
        }

        $media = $model->create(
            $request->merge([
                'jenis' => $request->jenis ? $request->jenis : null ,
                'program_id' => $prog_id,
                'status' => 1,
                'tajuk' => $request->tajuk ? $request->tajuk : null,
                'tarikh_mula' => $request->tarikh_mula ? $request->tarikh_mula : null,
                'tarikh_tamat' => $request->tarikh_tamat ? $request->tarikh_tamat : null,
                'gambar' => $request->photo ? $request->photo->store('banner', 'public'): null,
                'keterangan' => $request->keterangan ? $request->keterangan : null,
                'created_by' => $userid,
                'created_at' => now(),
                'updated_by' => $userid,
                'updated_at' => now()
                // 'date' => $request->date ? Carbon::parse($request->date)->format('Y-m-d') : null
            ])->all()
        );

        if($media){

            $data = [
                'userid'=>$userid,
                'task'=>'update'
            ];

            Mail::send('media.email',$data, function ($message) {
                $message->from('noreply@pipeline.com.my', 'Pipeline noreply');
                $message->to('yusliadiyusof@pipeline.com.my');
                $message->subject('Pemohonan Data');
            });
        }

        return redirect()->route('media.index')->withStatus(__('Media successfully created.'));
    }

    /**
     * Show the form for editing the specified item
     *
     * @param  \App\Item  $item
     * @param  \App\Tag   $tagModel
     * @param  \App\Category $categoryModel
     * @return \Illuminate\View\View
     */
    public function edit($media)
    {
        $role_id = auth()->user()->role_id; 
        $agensi = Agensi::all();
        $media = Media::find($media);
        $program = Program::all();
        return view('media.edit',[
            'media'=>$media,
            'program'=>$program,
            'role_id'=>$role_id,
            'agensi'=>$agensi
        ]);
    }
    // public function edit(media  $media)
    // {
    //     return view('media.edit', compact('media'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Itemuest  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(MediaRequest $request, Media $media)
    {
        $userid = auth()->user()->id; 
        // $media = Media::find($media);
        // print_r($request->name);
        // print_r($request->description);
        // dd($request);

        // $item->tags()->sync($request->get('tags'));

        dd($request->all());

        $success = $media->update(
            $request->merge([
                'program_id' => !empty($request->program_id) ? $request->program_id : null,
                'status' => $request->status,
                'tajuk' => $request->tajuk ? $request->tajuk : null,
                'keterangan' => $request->keterangan ? $request->keterangan : null,
                'tarikh_mula' => $request->tarikh_mula ? $request->tarikh_mula : null,
                'tarikh_tamat' => $request->tarikh_tamat ? $request->tarikh_tamat : null,
                'gambar' => $request->photo ? $request->photo->store('banner', 'public'): null,
                'updated_by' => $userid,
                'updated_at' => now()
            // ])->all()
            ])->except([$request->hasFile('photo') ? '' : 'gambar'])
        );

        dd($success);
        
        if($media){

            $data = [
                'userid'=>$userid,
                'task'=>'update'
            ];

            Mail::send('media.email',$data, function ($message) {
                $message->from('noreply@pipeline.com.my', 'Pipeline noreply');
                $message->to('yusliadiyusof@pipeline.com.my');
                $message->subject('Pemohonan Banner & Berita');
            });
        }

        // $program->update($request->all());
        return redirect()->route('media.index')->withStatus(__('Media Berjaya Disimpan.'));
    }

    public function destroy($id)
    {
        $media = Media::find($id);
        $media->destroy($id);
        return redirect()->route('media.index')->withStatus(__('Media Berjaya Dipadam.'));
    }
}
