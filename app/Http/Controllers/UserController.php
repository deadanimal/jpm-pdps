<?php

namespace App\Http\Controllers;

use App\Role;
use App\Negeri;
use App\User;
use App\Agensi;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $this->authorize('manage-users', User::class);
        return view('users.index', ['users' => $model->with('role')->get()]);
    }

    /**
     * Show the form for creating a new user
     *
     * @param  \App\Role  $model
     * @return \Illuminate\View\View
     */
    public function create(Role $model)
    {
        $negeri = Negeri::all();
        $agensi = Agensi::all();
        return view('users.create', [ 
            'roles' => $model->get(['id', 'name']),'agensi'=>$agensi,'negeri'=>$negeri
        ]);
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        // dd($request->all());
        $model->create($request->merge([
            'name'=> $request->name,
            'email'=> $request->email,
            'nric'=> $request->ic_no,
            'no_telepon'=> $request->no_telepon,
            'alamat'=> $request->alamat,
            'jawatan'=> $request->jawatan,
            'role_id'=> $request->role_id,
            'negeri_id'=> $request->negeri_id,
            'agensi_id'=> $request->agensi_id,
            'created_by'=> auth()->user()->id,
            'updated_by'=> auth()->user()->id,
            'picture' => $request->photo ? $request->photo->store('profile', 'public') : null,
            'password' => Hash::make($request->get('password'))
        ])->all());

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @param  \App\Role  $model
     * @return \Illuminate\View\View
     */
    public function edit(User $user, Role $model)
    {
        return view('users.edit', ['user' => $user->load('role'), 'roles' => $model->get(['id', 'name'])]);
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $hasPassword = $request->get("password");
        $user->update(
            $request->merge([
                'picture' => $request->photo ? $request->photo->store('profile', 'public') : $user->picture,
                'password' => Hash::make($request->get('password'))
            ])->except([$hasPassword ? '' : 'password'])
        );

        return redirect()->route('user.index')->withStatus(__('Penguna Berjaya Disimpan.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('Penguna Berjaya DiKemaskini.'));
    }
}
