@extends('layouts.app', [
    'title' => __('User Management'),
    'parentSection' => 'laravel',
    'elementName' => 'user-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Examples') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('user.index') }}" class="text-dark">{{ __('User Management') }}</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">{{ __('Edit User') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('User Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Kembali') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.update', $user) }}" autocomplete="off"
                            enctype="multipart/form-data" onsubmit="return confirm('Kemaskini Penguna ?');">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            <div class="pl-lg-4">

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="name">{{ __('Nama') }}<span class="text-red">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{ old('name', $user->name) }}"  required autofocus>
                                    <p class="text-red" id="err_name"></p>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="email">{{ __('Email') }}<span class="text-red">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required>
                                    <p class="text-red" id="err_email"></p>
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>

                                <div class="form-group{{ $errors->has('ic_no') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('No Kad Pengenalan') }}<span class="text-red">*</span></label>
                                    <input type="number" name="ic_no" id="ic_no" class="form-control{{ $errors->has('No Kad Pengenalan') ? ' is-invalid' : '' }}" placeholder="{{ __('No Kad Pengenalan') }}" value="{{ old('nric',$user->nric) }}" required>
                                    <p class="text-red" id="err_ic_no"></p>
                                    @include('alerts.feedback', ['field' => 'ic_no'])
                                </div>

                                <div class="form-group{{ $errors->has('no_telepon') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('No Telefon') }}<span class="text-red">*</span></label>
                                    <input type="number" name="no_telepon" id="no_telepon" class="form-control{{ $errors->has('no_telepon') ? ' is-invalid' : '' }}" placeholder="{{ __('No Telefon') }}" value="{{ old('no_telepon',$user->no_telepon) }}" required>
                                    <p class="text-red" id="err_no_telepon"></p>
                                    @include('alerts.feedback', ['field' => 'no_telepon'])
                                </div>

                                <div class="form-group{{ $errors->has('alamat') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Alamat Pejabat') }}<span class="text-red">*</span></label>
                                    <input type="text" name="alamat" id="alamat" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" placeholder="{{ __('Alamat Pejabat') }}" value="{{ old('alamat',$user->alamat) }}" required>
                                    <p class="text-red" id="err_alamat"></p>
                                    @include('alerts.feedback', ['field' => 'alamat'])
                                </div>

                                <div class="form-group{{ $errors->has('jawatan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Jawatan') }}<span class="text-red">*</span></label>
                                    <input type="text" name="jawatan" id="jawatan" class="form-control{{ $errors->has('jawatan') ? ' is-invalid' : '' }}" placeholder="{{ __('Jawatan') }}" value="{{ old('jawatan',$user->jawatan) }}" required>
                                    <p class="text-red" id="err_jawatan"></p>
                                    @include('alerts.feedback', ['field' => 'jawatan'])
                                </div>


                                <div class="form-group{{ $errors->has('role_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-role">{{ __('Peranan') }}<span class="text-red">*</span></label>
                                    <select name="role_id" id="userrole" class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}" placeholder="{{ __('Peranan') }}" required>
                                        <option value="0">Sila Pilih</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{ $role->id == old('role_id', $user->role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-red" id="err_userrole"></p>
                                    @include('alerts.feedback', ['field' => 'role_id'])
                                </div>
                                <?php if($agensi_id == '0'){ ?>
                                <div id="usseragensi" class="form-group{{ $errors->has('agensi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Agensi') }}<span class="text-red">*</span></label>
                                    <select type="text" id="agensi_id" class="form-control" required name="agensi_id" autofocus>
                                        <option value="0">Sila Pilih</option>
                                        @foreach ($agensi as $agensi_no => $agensi_data)
                                            <?php if($agensi_data->id == $user->agensi_id){ ?>
                                                <option selected="selected" value="{{$agensi_data->id}}">{{$agensi_data->nama}}</option>
                                            <?php }else{ ?>
                                                <option value="{{$agensi_data->id}}">{{$agensi_data->nama}}</option>
                                            <?php } ?>
                                        @endforeach
                                    </select>
                                    <p class="text-red" id="err_agensi_id"></p>
                                    @include('alerts.feedback', ['field' => 'agensi_id'])
                                </div>
                                <?php }else{ ?>
                                    <div class="form-group{{ $errors->has('agensi') ? ' has-danger' : '' }}">
                                        <label class="form-control-label">{{ __('Agensi') }}<span class="text-red">*</span></label>
                                        @foreach ($agensi as $agensi_no => $agensi_data)
                                            <?php if($agensi_data->id == $agensi_id){ ?>
                                                <input type="text" id="agensi_id" class="form-control" value='{{$agensi_data->nama}}' disabled />
                                                <input type="hidden" name="agensi_id" value='{{$agensi_data->id}}' />
                                            <?php } ?>
                                        @endforeach
                                    </div>
                                <?php } ?>

                                <div class="form-group{{ $errors->has('negeri_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-role">{{ __('Negeri') }}<span class="text-red">*</span></label>
                                    <select name="negeri_id" id="negeri_id" class="form-control{{ $errors->has('negeri_id') ? ' is-invalid' : '' }}" placeholder="{{ __('Negeri') }}" required>
                                        <option value="0">Sila Pilih</option>
                                        @foreach ($negeri as $negeri_val)
                                            <?php if($negeri_val->id == $user->negeri_id){ ?>
                                                <option selected="selected" value="{{$negeri_val->id}}">{{$negeri_val->nama}}</option>
                                            <?php }else{ ?>
                                                <option value="{{$negeri_val->id}}">{{$negeri_val->nama}}</option>
                                            <?php } ?>
                                        @endforeach
                                    </select>
                                    <p class="text-red" id="err_negeri_id"></p>
                                    @include('alerts.feedback', ['field' => 'negeri_id'])
                                </div>
                                <div class="form-group{{ $errors->has('photo') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Gambar Profil') }}</label>
                                    <div class="custom-file">
                                        <input type="file" name="photo" id="photo" class="custom-file-input{{ $errors->has('photo') ? ' is-invalid' : '' }}" accept="image/*">
                                        <label class="custom-file-label" for="input-picture">{{ __('Sila Pilih Gambar Profil') }}</label>
                                    </div>
                                    <p class="text-red" id="err_photo"></p>
                                    @include('alerts.feedback', ['field' => 'photo'])
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="password">{{ __('Kata Laluan') }}<span class="text-red">*</span></label>
                                    <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Kata laluan') }}" value="">
                                    <p class="text-red" id="err_password"></p>
                                    @include('alerts.feedback', ['field' => 'password'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Pengesahan Kata Laluan') }}<span class="text-red">*</span></label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Pengesahan kata laluan') }}" value="">
                                    <p class="text-red" id="err_password_confirmation"></p>
                                </div>

                                <div class="text-center">
                                    <button type="submit" onclick="return userValidationEvent()" class="btn btn-success mt-4">{{ __('Simpan') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

    <script>
        // Below Function Executes On Form Submit
        function userValidationEvent() {
            // Storing Field Values In Variables
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var ic_no = document.getElementById("ic_no").value;
            var no_telepon = document.getElementById("no_telepon").value;
            var alamat = document.getElementById("alamat").value;
            var jawatan = document.getElementById("jawatan").value;
            var userrole = document.getElementById("userrole").value;
            var agensi_id = document.getElementById("agensi_id").value;
            var negeri_id = document.getElementById("negeri_id").value;
            var password = document.getElementById("password").value;
            var password_confirmation = document.getElementById("password_confirmation").value;
        
            // alert(tarikh_tamat);

            // Conditions
            if (name == '') {
                text = "Sila Isi Nama";
                document.getElementById("err_name").innerHTML = text;
                return false;
            }

            if (email == '') {
                text = "Sila Isi Email";
                document.getElementById("err_email").innerHTML = text;
                return false;
            }

            if (ic_no == '') {
                text = "Sila Isi No Kad Pengenalan";
                document.getElementById("err_ic_no").innerHTML = text;
                return false;
            }

            if (no_telepon == '') {
                text = "Sila Isi No Telefon";
                document.getElementById("err_no_telepon").innerHTML = text;
                return false;
            }

            if (alamat == '') {
                text = "Sila Isi Alamat";
                document.getElementById("err_alamat").innerHTML = text;
                return false;
            }

            if (jawatan == '') {
                text = "Sila Isi Jawatan";
                document.getElementById("err_jawatan").innerHTML = text;
                return false;
            }

            if (userrole == '0') {
                text = "Sila Pilih Peranan";
                document.getElementById("err_userrole").innerHTML = text;
                return false;
            }

            if (agensi_id == '0') {
                text = "Sila Pilih Agensi";
                document.getElementById("err_agensi_id").innerHTML = text;
                return false;
            }

            if (negeri_id == '0') {
                text = "Sila Pilih Negeri";
                document.getElementById("err_negeri_id").innerHTML = text;
                return false;
            }

            if (password == '') {
                text = "Sila Isi Kata Laluan";
                document.getElementById("err_password").innerHTML = text;
                return false;
            }

            if (password.length <= 8) {
                text = "Kata laluan kurang dari 8 karakter";
                document.getElementById("err_password").innerHTML = text;
                return false;
            }

            if (password_confirmation == '') {
                text = "Sila Isi Kata Laluan";
                document.getElementById("err_password_confirmation").innerHTML = text;
                return false;
            }

            if (password_confirmation.length <= 8) {
                text = "Kata laluan kurang dari 8 karakter";
                document.getElementById("err_password_confirmation").innerHTML = text;
                return false;
            }
            
            return true
            
        }
    </script>
    <script>
    
    $(document).ready(function() {
        $("#userrole").change(function () {
            console.log( $(this).val() );
            
            if($(this).val() != '1'){
                $("#usseragensi").show();
            }else{
                $("#usseragensi").hide();
            }
        });
    });
    </script>
@endsection