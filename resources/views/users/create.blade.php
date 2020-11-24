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
            <li class="breadcrumb-item active text-dark" aria-current="page">{{ __('Add User') }}</li>
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
                                <a href="javascript:history.go(-1)" class="btn btn-sm btn-default">{{ __('Kembali') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.store') }}" autocomplete="off"
                            enctype="multipart/form-data" onsubmit="return confirm('Tambah Penguna ?');">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Nama') }}<span class="text-red">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{ old('name') }}" required autofocus>
                                            <p class="text-red" id="err_name"></p>
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('Email') }}<span class="text-red">*</span></label>
                                            <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>
                                            <p class="text-red" id="err_email"></p>
                                            @include('alerts.feedback', ['field' => 'email'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('ic_no') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('No Kad Pengenalan') }}<span class="text-red">*</span></label>
                                            <input type="number" name="ic_no" id="ic_no" class="form-control{{ $errors->has('No Kad Pengenalan') ? ' is-invalid' : '' }}" placeholder="{{ __('No Kad Pengenalan') }}" value="{{ old('nric') }}" required>
                                            <p class="text-red" id="err_ic_no"></p>
                                            @include('alerts.feedback', ['field' => 'ic_no'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('no_telepon') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('No Telefon') }}<span class="text-red">*</span></label>
                                            <input type="number" name="no_telepon" id="no_telepon" class="form-control{{ $errors->has('no_telepon') ? ' is-invalid' : '' }}" placeholder="{{ __('No Telefon') }}" value="{{ old('no_telepon') }}" required>
                                            <p class="text-red" id="err_no_telepon"></p>
                                            @include('alerts.feedback', ['field' => 'no_telepon'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('alamat') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('Alamat Pejabat') }}<span class="text-red">*</span></label>
                                            <input type="text" name="alamat" id="alamat" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" placeholder="{{ __('Alamat Pejabat') }}" value="{{ old('alamat') }}" required>
                                            <p class="text-red" id="err_alamat"></p>
                                            @include('alerts.feedback', ['field' => 'alamat'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('jawatan') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('Jawatan') }}<span class="text-red">*</span></label>
                                            <input type="text" name="jawatan" id="jawatan" class="form-control{{ $errors->has('jawatan') ? ' is-invalid' : '' }}" placeholder="{{ __('Jawatan') }}" value="{{ old('jawatan') }}" required>
                                            <p class="text-red" id="err_jawatan"></p>
                                            @include('alerts.feedback', ['field' => 'jawatan'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($role_id == 1){ ?>
                                        <div class="form-group{{ $errors->has('role_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-role">{{ __('Peranan') }}<span class="text-red">*</span></label>
                                            <select name="role_id" id="userrole" class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}" placeholder="{{ __('Peranan') }}" required>
                                                <option value="">Sila Pilih</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" {{ $role->id == old('role_id') ? 'selected' : '' }}>{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-red" id="err_userrole"></p>
                                            @include('alerts.feedback', ['field' => 'role_id'])
                                        </div>
                                        <?php }else{ ?>
                                            <div class="form-group{{ $errors->has('role_id') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-role">{{ __('Peranan') }}<span class="text-red">*</span></label>
                                                <input type="text" id="userrole" class="form-control" value="Agensi" disabled />
                                                <input type="hidden" value="{{$role_id}}" />
                                                <p class="text-red" id="err_userrole"></p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($agensi_id == '0'){ ?>
                                        <div id="usseragensi" class="form-group{{ $errors->has('agensi') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('Agensi') }}<span class="text-red">*</span></label>
                                            <select type="text" id="agensi_id" class="form-control" required name="agensi_id" autofocus>
                                                <option selected="selected" value="0">Sila Pilih</option>
                                                @foreach ($agensi as $agensi_no => $agensi_data)
                                                    <option value='{{$agensi_data->id}}'>{{$agensi_data->nama}}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-red" id="err_agensi_id"></p>
                                            @include('alerts.feedback', ['field' => 'agensi_id'])
                                        </div>
                                        <?php }else{ ?>
                                            <div id="usseragensi" class="form-group{{ $errors->has('agensi') ? ' has-danger' : '' }}">
                                                <label class="form-control-label">{{ __('Agensi') }}<span class="text-red">*</span></label>
                                                @foreach ($agensi as $agensi_no => $agensi_data)
                                                    <?php if($agensi_data->id == $agensi_id){ ?>
                                                        <input type="text" class="form-control" id="agensi_id" value='{{$agensi_data->nama}}' disabled />
                                                        <input type="hidden" name="agensi_id" value='{{$agensi_data->id}}' />
                                                    <?php } ?>
                                                @endforeach
                                                <p class="text-red" id="err_agensi_id"></p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('negeri_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-role">{{ __('Negeri') }}<span class="text-red">*</span></label>
                                            <select name="negeri_id" id="negeri_id" class="form-control{{ $errors->has('negeri_id') ? ' is-invalid' : '' }}" placeholder="{{ __('Negeri') }}" required>
                                                <option value="">Sila Pilih</option>
                                                @foreach ($negeri as $negeri_val)
                                                    <option value="{{ $negeri_val->id }}" {{ $negeri_val->id == old('negeri_id') ? 'selected' : '' }}>{{ $negeri_val->nama }}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-red" id="err_negeri_id"></p>
                                            @include('alerts.feedback', ['field' => 'negeri_id'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('photo') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Profile photo') }}</label>
                                            <div class="custom-file">
                                                <input type="file" name="photo" id="photo" class="custom-file-input{{ $errors->has('photo') ? ' is-invalid' : '' }}" id="input-picture" accept="image/*">
                                                <label class="custom-file-label" for="input-picture">{{ __('Select profile photo') }}</label>
                                            </div>
                                            <p class="text-red" id="err_photo"></p>
                                            @include('alerts.feedback', ['field' => 'photo'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-password">{{ __('Kata Laluan') }}<span class="text-red">*</span><span style="font-size: 0.7em"> (Minimum 8 Karakter)</span></label>
                                            <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Kata Laluan') }}" value="" required>
                                            <p class="text-red" id="err_password"></p>
                                            @include('alerts.feedback', ['field' => 'password'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-password-confirmation">{{ __('Pengesahan Kata laluan') }}<span class="text-red">*</span><span style="font-size: 0.7em"> (Minimum 8 Karakter)</span></label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Pengesahan Kata Laluan') }}" value="" required>
                                            <p class="text-red" id="err_password_confirmation"></p>
                                        </div>
                                    </div>
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
        $(document).ready(function() {
            $("#name").change(function () {
                console.log( $(this).val() );
                if($(this).val() != '0'){
                    $("#err_name").hide();
                }else{
                    $("#err_name").show();
                }
            });
            $("#email").change(function () {
                console.log( $(this).val() );
                if($(this).val() != ''){
                    $("#err_email").hide();
                }else{
                    $("#err_email").show();
                }
            });
            $("#ic_no").change(function () {
                console.log( $(this).val() );
                if($(this).val() != ''){
                    $("#err_ic_no").hide();
                }else{
                    $("#err_ic_no").show();
                }
            });
            $("#no_telepon").change(function () {
                console.log( $(this).val() );
                if($(this).val() != ''){
                    $("#err_no_telepon").hide();
                }else{
                    $("#err_no_telepon").show();
                }
            });
            $("#alamat").change(function () {
                console.log( $(this).val() );
                if($(this).val() != ''){
                    $("#err_alamat").hide();
                }else{
                    $("#err_alamat").show();
                }
            });
            $("#jawatan").change(function () {
                console.log( $(this).val() );
                if($(this).val() != ''){
                    $("#err_jawatan").hide();
                }else{
                    $("#err_jawatan").show();
                }
            });
            $("#userrole").change(function () {
                console.log( $(this).val() );
                if($(this).val() != ''){
                    $("#err_userrole").hide();
                }else{
                    $("#err_userrole").show();
                }
            });
            $("#agensi_id").change(function () {
                console.log( $(this).val() );
                if($(this).val() != ''){
                    $("#err_agensi_id").hide();
                }else{
                    $("#err_agensi_id").show();
                }
            });
            $("#negeri_id").change(function () {
                console.log( $(this).val() );
                if($(this).val() != ''){
                    $("#err_negeri_id").hide();
                }else{
                    $("#err_negeri_id").show();
                }
            });
            $("#password").change(function () {
                console.log( $(this).val() );
                if($(this).val() != ''){
                    $("#err_password").hide();
                }else{
                    $("#err_password").show();
                }
            });
            $("#password_confirmation").change(function () {
                console.log( $(this).val() );
                if($(this).val() != ''){
                    $("#err_password_confirmation").hide();
                }else{
                    $("#err_password_confirmation").show();
                }
            });
        });
    </script>

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
            var negeri_id = document.getElementById("negeri_id").value;
            var password = document.getElementById("password").value;
            var password_confirmation = document.getElementById("password_confirmation").value;
            var agensi_id = document.getElementById("agensi_id").value;
            
        
            // alert(tarikh_mula);
            // alert(tarikh_tamat);

            // Conditions

            if (name == '') {
                text = "Sila Isi Nama";
                document.getElementById("err_name").innerHTML = text;
                var name_div = document.getElementById("name_div");
                name_div.scrollIntoView();
                return false;
            }

            if (email == '') {
                text = "Sila Isi Email";
                document.getElementById("err_email").innerHTML = text;
                var email_div = document.getElementById("email_div");
                email_div.scrollIntoView();
                return false;
            }

            if (ic_no == '') {
                text = "Sila Isi No Kad Pengenalan";
                document.getElementById("err_ic_no").innerHTML = text;
                var ic_no_div = document.getElementById("ic_no_div");
                ic_no_div.scrollIntoView();
                return false;
            }

            if (no_telepon == '') {
                text = "Sila Isi No Telefon";
                document.getElementById("err_no_telepon").innerHTML = text;
                var no_telepon_div = document.getElementById("no_telepon_div");
                no_telepon_div.scrollIntoView();
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

            if (userrole == '') {
                text = "Sila Pilih Peranan";
                document.getElementById("err_userrole").innerHTML = text;
                return false;
            }

            if (agensi_id == '0') {
                text = "Sila Pilih Agensi";
                document.getElementById("err_agensi_id").innerHTML = text;
                return false;
            }

            if (negeri_id == '') {
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
            // else {
                // alert("All fields are required.....!");
                // return false;
            // }
            
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