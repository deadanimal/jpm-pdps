@extends('layouts.app', [
    'title' => __('Banner & Berita'),
    'parentSection' => 'laravel',
    'elementName' => 'req-publish'
])

@section('content')
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Banner & Berita') }} 
            @endslot

            <li class="breadcrumb-item text-white"><a href="{{ route('media.index') }}" class="text-white">{{ __('Banner & Berita') }}</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Kemaskini') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Banner & Berita') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="javascript:history.go(-1)" class="btn btn-sm btn-default">{{ __('Kembali') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="item-form"  action="{{ route('media.update', $media) }}" autocomplete="off" enctype="multipart/form-data" onsubmit="return confirm('Anda pasti untuk mengemaskini banner & berita tersebut ?');">
                            @csrf
                            @method('put')

                            {{-- <h6 class="heading-small text-muted mb-4">{{ __('Tag information') }}</h6> --}}
                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col-md-6">{{-- agensi --}}
                                        <div class="form-group{{ $errors->has('agensi') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('Agensi') }}  <span class="text-red">*</span></label>
                                            <select disabled type="text" id="agensi_id" class="form-control" name="agensi_id" autofocus>
                                                <?php 
                                                foreach ($agensi as $agensi_no => $agensi_data){ 
                                                    if($agensi_data->id == $media->agensi_id){
                                                        echo "<option selected value='$agensi_data->id'>$agensi_data->nama</option>";
                                                    }else{
                                                        echo "<option value='$agensi_data->id'>$agensi_data->nama</option>";
                                                    }
                                                } ?>
                                            </select>
                                            <input type="hidden" value="{{$media->agensi_id}}">
                                            <p class="text-red" id="err_agensi_id"></p>
                                            @include('alerts.feedback', ['field' => 'agensi_id'])
                                        </div>
                                    </div>

                                    <?php if ($media->jenis == '2') { ?>
                                        <div class="col-md-6">
                                        {{-- program --}}
                                            <div class="form-group{{ $errors->has('program') ? ' has-danger' : '' }}">
                                                <label class="form-control-label">{{ __('Program') }} <span class="text-red">*</span></label>
                                                <select type="text" id="program_id" class="form-control" name="program_id" required autofocus>
                                                    <option selected="selected" value="0">Sila Pilih</option>
                                                    <?php 
                                                    foreach ($program as $program_no => $program_data){ 
                                                        if($program_data->id == $media->program_id){
                                                            echo "<option selected value='$program_data->id'>$program_data->nama</option>";
                                                        }else{
                                                            echo "<option value='$program_data->id'>$program_data->nama</option>";
                                                        }
                                                    } ?>
                                                </select>
                                                <p class="text-red" id="err_program_id"></p>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($media->jenis == '1') { ?>
                                        <div class="col-md-6">
                                        {{-- tajuk --}}
                                            <div class="form-group{{ $errors->has('tajuk') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Tajuk') }} <span class="text-red">*</span></label>
                                                <input type="text" name="tajuk" id="tajuk" class="form-control{{ $errors->has('tajuk') ? ' is-invalid' : '' }}" placeholder="{{ __('Tajuk') }}" value="{{ old('tajuk',$media->tajuk) }}" autofocus>
        
                                                <p class="text-red" id="err_tajuk"></p>
                                                @include('alerts.feedback', ['field' => 'tajuk'])
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($media->jenis == '1') { ?>
                                        <div class="col-md-6">
                                        {{-- keterangan --}}
                                            <div class="form-group{{ $errors->has('keterangan') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Keterangan') }} <span class="text-red">*</span></label>
                                                <textarea type="text" name="keterangan" id="keterangan" class="form-control{{ $errors->has('Keterangan') ? ' is-invalid' : '' }}" placeholder="{{ __('Keterangan') }}" value="{{ old('keterangan',$media->keterangan) }}" autofocus>{{$media->keterangan}}</textarea>
                                                <p class="text-red" id="err_keterangan"></p>
                                                @include('alerts.feedback', ['field' => 'keterangan'])
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <div class="col-md-6">
                                        {{-- tarikh_mula --}}
                                        <div class="form-group{{ $errors->has('tarikh_mula') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Tarikh Mula') }} <span class="text-red">*</span></label>
                                            <input type="date" name="tarikh_mula" id="tarikh_mula" class="form-control{{ $errors->has('tarikh_mula') ? ' is-invalid' : '' }}" placeholder="{{ __('Tarikh Mula') }}" value="{{ old('tarikh_mula',$media->tarikh_mula) }}" autofocus>
                                            <p class="text-red" id="err_tarikh_mula"></p>
                                            @include('alerts.feedback', ['field' => 'tarikh_mula'])
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        {{-- tarikh_tamat --}}
                                        <div class="form-group{{ $errors->has('tarikh_tamat') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Tarikh Tamat') }} <span class="text-red">*</span></label>
                                            <input type="date" name="tarikh_tamat" id="tarikh_tamat" class="form-control{{ $errors->has('tarikh_tamat') ? ' is-invalid' : '' }}" placeholder="{{ __('Tarikh Tamat') }}" value="{{ old('tarikh_tamat',$media->tarikh_tamat) }}" autofocus>
                                            <p class="text-red" id="err_tarikh_tamat"></p>
                                            @include('alerts.feedback', ['field' => 'tarikh_tamat'])
                                        </div>
                                    </div>
                                    <?php if ($media->jenis == '2') { ?>
                                        <div class="col-md-6">
                                        {{-- gambar --}}
                                            <div class="form-group{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                                                <label style="padding-right:50px" class="form-control-label">{{ __('Banner') }} <span class="text-red">*</span></label>
                                                <img src='/storage/{{$media->gambar}}' alt='qq' style='max-width: 50px;height:50px;'>
                                                {{-- <input type="file" name="photo" id="photo" class="form-control{{ $errors->has('gambar') ? ' is-invalid' : '' }}" placeholder="{{ __('Gambar') }}" value="{{ old('gambar',$media->gambar) }}" autofocus> --}}
                                                <p class="text-red" id="err_photo"></p>
                                                @include('alerts.feedback', ['field' => 'photo'])
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($role_id == '1') { ?>
                                        <div class="col-md-6">
                                        {{-- status --}}
                                            <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                                <label class="form-control-label">{{ __('Status') }}</label>
                                                <select type="text" id="setactive-links" class="form-control" name="status" value="{{ old('gambar',$media->status) }}" required autofocus>
                                                    <option value="1"{{ $media->status	 == 1 ? 'selected' : '' }}>Dihantar</option>
                                                    <option value="2"{{ $media->status	 == 2 ? 'selected' : '' }}>Berjaya</option>
                                                    <option value="3"{{ $media->status	 == 3 ? 'selected' : '' }}>Ditolak</option>
                                                </select>
        
                                                @include('alerts.feedback', ['field' => 'status'])
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="row text-center">
                                    <div class="col">
                                        <input type="hidden" name="jenis" value="{{$media->jenis}}" />
                                        <button type="submit" class="btn btn-default" onclick="return mediaValidationEvent()">Simpan</button>
                                        {{-- <button type="submit" class="btn btn-success mt-4">{{ __('Simpan') }}</button> --}}
                                    </div>
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
            $("#agensi_id").change(function () {
                console.log( $(this).val() );
                if($(this).val() != '0'){
                    $("#err_agensi_id").hide();
                }else{
                    $("#err_agensi_id").show();
                }
            });
            $("#jenis").change(function () {
                console.log( $(this).val() );
                if($(this).val() != ''){
                    $("#err_jenis").hide();
                }else{
                    $("#err_jenis").show();
                }
            });
            $("#program_id").change(function () {
                console.log( $(this).val() );
                if($(this).val() != ''){
                    $("#err_program_id").hide();
                }else{
                    $("#err_program_id").show();
                }
            });
            $("#tajuk").change(function () {
                console.log( $(this).val() );
                if($(this).val() != ''){
                    $("#err_tajuk").hide();
                }else{
                    $("#err_tajuk").show();
                }
            });
            $("#keterangan").change(function () {
                console.log( $(this).val() );
                if($(this).val() != ''){
                    $("#err_keterangan").hide();
                }else{
                    $("#err_keterangan").show();
                }
            });
            $("#tarikh_mula").change(function () {
                console.log( $(this).val() );
                if($(this).val() != ''){
                    $("#err_tarikh_mula").hide();
                }else{
                    $("#err_tarikh_mula").show();
                }
            });
            $("#tarikh_tamat").change(function () {
                console.log( $(this).val() );
                if($(this).val() != ''){
                    $("#err_tarikh_tamat").hide();
                }else{
                    $("#err_tarikh_tamat").show();
                }
            });
            $("#photo").change(function () {
                console.log( $(this).val() );
                if($(this).val() != ''){
                    $("#err_photo").hide();
                }else{
                    $("#err_photo").show();
                }
            });
        });
    </script>
    <script>
        // Below Function Executes On Form Submit
        function mediaValidationEvent() {
            // Storing Field Values In Variables
            var jenis = <?php echo $media->jenis; ?>;
            var agensi_id = document.getElementById("agensi_id").value;
            var tarikh_mula = document.getElementById("tarikh_mula").value;
            var tarikh_tamat = document.getElementById("tarikh_tamat").value;
            
        
            // alert(tarikh_mula);
            // alert(tarikh_tamat);

            // Conditions

            // check if it is banner/berita
            if (jenis == '2') {

                var program_id = document.getElementById("program_id").value;

                if(program_id == '0'){
                    text = "Sila Pilih program";
                    document.getElementById("err_program_id").innerHTML = text;
                    var program_div = document.getElementById("program_div");
                    program_div.scrollIntoView();
                    return false;
                }
            }
            if (jenis == '1') {

                var tajuk = document.getElementById("tajuk").value;
                var keterangan = document.getElementById("keterangan").value;

                if (tajuk == '') {
                    text = "Sila Isi tajuk";
                    document.getElementById("err_tajuk").innerHTML = text;
                    var program_div = document.getElementById("program_div");
                    program_div.scrollIntoView();
                    return false;
                }

                if (keterangan == '') {
                    text = "Sila Isi keterangan";
                    document.getElementById("err_keterangan").innerHTML = text;
                    return false;
                }
            }

            if (tarikh_mula == '') {
                text = "Sila Isi tarikh mula";
                document.getElementById("err_tarikh_mula").innerHTML = text;
                return false;
            }

            if (tarikh_tamat == '') {
                text = "Sila Isi tarikh tamat";
                document.getElementById("err_tarikh_tamat").innerHTML = text;
                return false;
            }
            
            return true;
            // else {
                // alert("All fields are required.....!");
                // return false;
            // }
            
        }
    </script>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.css">
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
@endpush