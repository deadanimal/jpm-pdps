<?php

namespace App\Http\Controllers;

use Gate;
use App\Profil;
use App\Http\Requests\ProfilRequest;
use App\Http\Requests\PasswordRequest;

class ProfilController extends Controller
{

    public function index(Profil $model)
    {   
        $profil = $model->all();
        // echo "<pre>";
        // print_r($program);
        // echo "</pre>";die;
        // return view('Program.index', ['Program' => $model->with(['tags', 'category'])->get()]);
        // $this->authorize('manage-items', User::class);

        return view('profil.index', ['profils' => $profil]);
    }
    /**
     * Show the form for editing the profil.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profil.edit');
    }

    /**
     * Update the profil
     *
     * @param  \App\Http\Requests\ProfilRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfilRequest $request)
    {
        auth()->user()->update(
            $request->merge(['picture' => $request->photo ? $request->photo->store('profil', 'public') : null])
                ->except([$request->hasFile('photo') ? '' : 'picture'])
        );

        return back()->withStatus(__('Profil Berjaya Disimpan.'));
    }
}
