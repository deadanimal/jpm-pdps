<?php

namespace App\Http\Controllers;

use Request;
use Mail;
use App\Role;
use App\Negeri;
use App\User;
use App\Agensi;
use App\AuditTrail;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(User::class);
    }

    public function index(User $model)
    {
        $role_id = auth()->user()->role_id; 
        $userid = auth()->user()->id; 
        $log = [
            'task'=>'Pengurusan Penguna',
            'details'=>'Senarai Penguna',
            'entity_id'=>'0'
        ];
        $this->log_audit_trail($log);
        // $this->authorize('manage-users', User::class);
        if($role_id == 1){
            $agensi_id = auth()->user()->agensi_id; 

            $user_data = DB::table('users')
            ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->select( 'users.*','roles.name as role_name')
            ->orderBy('id', 'desc')
            ->paginate(3);
            // ->get();
        }else{

            $agensi_id = auth()->user()->agensi_id; 

            $user_data = DB::table('users')
            ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->select( 'users.*','roles.name as role_name')
            ->where('users.agensi_id',"=",$agensi_id)
            ->orderBy('id', 'desc')
            ->paginate(3);
            // ->get();
        }
        
        return view('users.index', ['users' => $user_data]);
    }

    public function create(Role $model)
    {
        $role_id = auth()->user()->role_id; 
        if($role_id == 1){
            $agensi_id = '0';
        }else{
            $agensi_id = auth()->user()->agensi_id; 
        }
        $log = [
            'task'=>'Pengurusan Penguna',
            'details'=>'Halaman Tambah Penguna',
            'entity_id'=>'0'
        ];
        $this->log_audit_trail($log);

        $negeri = Negeri::all();
        $agensi = Agensi::all();
        return view('users.create', [ 
            'roles' => $model->get(['id', 'name']),
            'agensi'=>$agensi,
            'negeri'=>$negeri,
            'agensi_id'=>$agensi_id,
            'role_id'=>$role_id
        ]);
    }

    public function store(UserRequest $request, User $model)
    {
        $login_password = $request->password;
        $usernama = $request->name; 
        $login_email = $request->email; 
        // dd($request->password);
        $user = $model->create($request->merge([
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
        
        if($user){

            /// simpan log
            $log = [
                'task'=>'Pengurusan Penguna',
                'details'=>'Simpan Penguna Baru',
                'entity_id'=>$user->id
            ];
            $this->log_audit_trail($log);

            // sent email notification

            $data = [
                'title'=>'Portal PDPS kini dapat diakses di alamat https://pdps.icu.gov.my dengan menggunakan id pengguna dan kata laluan seperti yang berikut:',
                'task'=>'create',
                'login_id'=>$login_email,
                'login_katalaluan'=>$login_password,
                'nama'=>$usernama
            ];

            // dd($data);
                
            Mail::send('users.email',$data, function ($message) use ($login_email) {
                $message->from('noreply@pdps.com.my', 'PDPS noreply');
                // $message->to(['yusliadiyusof@pipeline.com.my','yusliadi46@gmail.com']);
                $message->to($login_email);
                $message->subject('Pendaftaran Pengguna Baru');
            });
        }

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    public function edit(User $user, Role $model)
    {
        $log = [
            'task'=>'Pengurusan Penguna',
            'details'=>'Halaman Kemaskini Penguna',
            'entity_id'=>$user->id
        ];
        $this->log_audit_trail($log);

        $role_id = auth()->user()->role_id; 

        if($role_id == 1){
            $agensi_id = '0';
        }else{
            $agensi_id = auth()->user()->agensi_id; 
        }

        $negeri = Negeri::all();
        $agensi = Agensi::all();
        return view('users.edit', [
            'user' => $user->load('role'), 
            'roles' => $model->get(['id', 'name']),
            'agensi' => $agensi,
            'negeri' => $negeri,
            'agensi_id' => $agensi_id
        ]);
    }

    public function update(UserRequest $request, User $user)
    {
        $hasPassword = $request->get("password");
        $user->update(
            $request->merge([
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
                'picture' => $request->photo ? $request->photo->store('profile', 'public') : $user->picture,
                'password' => Hash::make($request->get('password'))
            ])->except([$hasPassword ? '' : 'password'])
        );

        if($user){
            $log = [
                'task'=>'Pengurusan Penguna',
                'details'=>'Simpan Kemaskini Baru',
                'entity_id'=>$user->id
            ];
            $this->log_audit_trail($log);
        }

        return redirect()->route('user.index')->withStatus(__('Penguna Berjaya Disimpan.'));
    }

    public function destroy(User $user)
    {
        $result = $user->delete();

        $log = [
            'task'=>'Pengurusan Penguna',
            'details'=>'Padam Penguna',
            'entity_id'=>$user->id
        ];
        $this->log_audit_trail($log);

        return redirect()->route('user.index')->withStatus(__('Penguna Berjaya DiKemaskini.'));
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
        $auditTrail->created_at = now();
        $auditTrail->updated_by = $userid;
        $auditTrail->updated_at = now();
        $auditTrail->save();
        
        return $auditTrail;
    } 
}
