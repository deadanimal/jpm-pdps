<?php

namespace App\Http\Controllers;

use Gate;
use App\User;
use App\Agensi;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $agensi = Agensi::all();
        return view('profile.edit',['agensi'=>$agensi]);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {

        // dd($request->all());
        auth()->user()->update(
            $request->merge([
                'agensi_id' => $request->agensi_id ? $request->agensi_id:'0' ,
                'picture' => $request->photo ? $request->photo->store('profile', 'public') : null
                ])
            ->except([$request->hasFile('photo') ? '' : 'picture'])
        );

        return back()->withStatus(__('Profil Berjaya Disimpan.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Kata Laluan Berjaya Disimpan.'));
    }
}
