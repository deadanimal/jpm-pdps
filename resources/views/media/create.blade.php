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
            <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Baru') }}</li>
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
                    {{-- onsubmit="return confirm('Tambah Banner/Berita ?');" --}}
                        <form method="post" class="item-form" action="{{ route('media.store') }}" autocomplete="off" enctype="multipart/form-data" onsubmit="return confirm('Anda pasti untuk tambah banner & berita ?');">
                            @csrf

                            {{-- <h6 class="heading-small text-muted mb-4">{{ __('Item information') }}</h6> --}}
                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col-md-6" id="agensi_div">
                                        {{-- agensi --}}
                                        <?php if($role_id == '1'){ ?>
                                            <div class="form-group{{ $errors->has('agensi') ? ' has-danger' : '' }}">
                                                <label class="form-control-label">{{ __('Agensi') }} <span class="text-red">*</span></label>
                                                <select type="text" id="agensi_id" id="setactive-links" class="form-control" name="agensi_id" required autofocus>
                                                    <option selected="selected" value="0">Sila Pilih</option>
                                                    @foreach ($agensi as $agensi_no => $agensi_data)
                                                        <option value='{{$agensi_data->id}}'>{{$agensi_data->nama}}</option>
                                                    @endforeach
                                                </select>
                                                <p class="text-red" id="err_agensi_id"></p>
        
                                                @include('alerts.feedback', ['field' => 'agensi_id'])
                                            </div>
                                        <?php }else{ ?>
                                            <div class="form-group{{ $errors->has('agensi') ? ' has-danger' : '' }}">
                                                <label class="form-control-label">{{ __('Agensi') }} <span class="text-red">*</span></label>
                                                    @foreach ($agensi as $agensi_no => $agensi_data)
                                                        <?php 
                                                        if($agensi_id == $agensi_data->id){
                                                            $agensiname = $agensi_data->nama;
                                                        } ?>
                                                    @endforeach
                                                    <input disabled type="text" class="form-control" value="{{$agensiname}}" autofocus>
                                                    <input type="hidden" id="agensi_id" name="agensi_id" value="{{$agensi_id}}">
                                                    <p class="text-red" id="err_agensi_id"></p>
                                                @include('alerts.feedback', ['field' => 'agensi_id'])
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6" id="jenis_div">
                                        {{-- jenis --}}
                                        <div  class="form-group{{ $errors->has('jenis') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('Jenis Pemohonan') }} <span class="text-red">*</span></label>
                                            <select class="form-control jenisMedia" name="jenis" id="jenis" required autofocus>
                                                <option selected="selected" value="1">Berita</option>
                                                <option value="2">Banner</option>
                                            </select>
                                            <p class="text-red" id="err_jenis"></p>
                                            @include('alerts.feedback', ['field' => 'jenis'])
                                        </div>
                                    </div>
                                    <div class="col-md-6 programList" id="program_div" style="display: none">
                                        {{-- program --}}
                                        <div class="form-group{{ $errors->has('program') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('Program') }} <span class="text-red">*</span></label>
                                            <select type="text" id="program_id" class="form-control" name="program_id" autofocus>
                                                <option selected="selected" value="0">Sila Pilih</option>
                                                @foreach ($program as $program_no => $program_data)
                                                    <option value='{{$program_data->id}}'>{{$program_data->nama}}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-red" id="err_program_id"></p>
        
                                            @include('alerts.feedback', ['field' => 'agensi_id'])
                                        </div>
                                    </div>
                                    <div class="col-md-6 berita-tajuk" id="tajuk_div">
                                        {{-- tajuk --}}
                                        <div class="form-group{{ $errors->has('tajuk') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Tajuk') }} <span class="text-red">*</span></label>
                                            <input type="text" name="tajuk" id="tajuk" class="form-control{{ $errors->has('tajuk') ? ' is-invalid' : '' }}" placeholder="{{ __('Tajuk') }}" value="{{ old('tajuk') }}" autofocus>
                                            <p class="text-red" id="err_tajuk"></p>
                                            @include('alerts.feedback', ['field' => 'tajuk'])
                                        </div>
                                    </div>
                                    <div class="berita-keterangan col-md-6" id="keterangan_div">
                                        {{-- keterangan --}}
                                        <div class="form-group{{ $errors->has('keterangan') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Keterangan') }} <span class="text-red">*</span></label>
                                            <textarea type="text" name="keterangan" id="keterangan" class="form-control{{ $errors->has('Keterangan') ? ' is-invalid' : '' }}" placeholder="{{ __('Keterangan') }}" value="{{ old('keterangan') }}" autofocus></textarea>
                                            <p class="text-red" id="err_keterangan"></p>
                                            @include('alerts.feedback', ['field' => 'keterangan'])
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="tarikh_mula_div">
                                        {{-- tarikh_mula --}}
                                        <div class="form-group{{ $errors->has('tarikh_mula') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Tarikh Mula') }} <span class="text-red">*</span></label>
                                            <input type="date" name="tarikh_mula" id="tarikh_mula" class="form-control{{ $errors->has('tarikh_mula') ? ' is-invalid' : '' }}" placeholder="{{ __('Tarikh Mula') }}" value="{{ old('tarikh_mula') }}" autofocus>
                                            <p class="text-red" id="err_tarikh_mula"></p>
                                            @include('alerts.feedback', ['field' => 'tarikh_mula'])
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="tarikh_tamat_div">
                                        {{-- tarikh_tamat --}}
                                        <div class="form-group{{ $errors->has('tarikh_tamat') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Tarikh Tamat') }} <span class="text-red">*</span></label>
                                            <input type="date" name="tarikh_tamat" id="tarikh_tamat" class="form-control{{ $errors->has('tarikh_tamat') ? ' is-invalid' : '' }}" placeholder="{{ __('Tarikh Tamat') }}" value="{{ old('tarikh_tamat') }}" autofocus>
                                            <p class="text-red" id="err_tarikh_tamat"></p>
                                            @include('alerts.feedback', ['field' => 'tarikh_tamat'])
                                        </div>
                                    </div>
                                    <div style="display: none" class="gambar-banner col-md-6">
                                        {{-- gambar --}}
                                        <div class="form-group{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('Gambar') }} <span class="text-red">*</span></label>
                                            <input type="file" name="photo" id="photo" class="form-control{{ $errors->has('gambar') ? ' is-invalid' : '' }}" id="input-picture" accept="image/*" />
                                            <p class="text-red" id="err_photo"></p>
                                            @include('alerts.feedback', ['field' => 'photo'])
                                        </div></div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-default" onclick="return mediaValidationEvent()">Simpan</button>
                                    {{-- <button type="submit" class="btn btn-success mt-4">{{ __('Simpan') }}</button> --}}
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
            var agensi_id = document.getElementById("agensi_id").value;
            var jenis = document.getElementById("jenis").value;
            var program_id = document.getElementById("program_id").value;
            var tajuk = document.getElementById("tajuk").value;
            var keterangan = document.getElementById("keterangan").value;
            var tarikh_mula = document.getElementById("tarikh_mula").value;
            var tarikh_tamat = document.getElementById("tarikh_tamat").value;
            var photo = document.getElementById("photo").value;
            
        
            // alert(tarikh_mula);
            // alert(tarikh_tamat);

            // Conditions
            if (agensi_id == '0') {
                text = "Sila Pilih Agensi";
                document.getElementById("err_agensi_id").innerHTML = text;
                var agensi_div = document.getElementById("agensi_div");
                agensi_div.scrollIntoView();
                return false;
            }

            // check if it is banner/berita
            if (jenis == '2') {
                if(program_id == '0'){
                    text = "Sila Pilih program";
                    document.getElementById("err_program_id").innerHTML = text;
                    var program_div = document.getElementById("program_div");
                    program_div.scrollIntoView();
                    return false;
                }
            }
            if (jenis == '1') {
                if (tajuk == '') {
                    text = "Sila Isi tajuk";
                    document.getElementById("err_tajuk").innerHTML = text;
                    var tajuk_div = document.getElementById("tajuk_div");
                    tajuk_div.scrollIntoView();
                    return false;
                }
            }
            if (jenis == '1') {
                if (keterangan == '') {
                    text = "Sila Isi keterangan";
                    document.getElementById("err_keterangan").innerHTML = text;
                    var keterangan_div = document.getElementById("keterangan_div");
                    keterangan_div.scrollIntoView();
                    return false;
                }
            }

            if (tarikh_mula == '') {
                text = "Sila Isi tarikh mula";
                document.getElementById("err_tarikh_mula").innerHTML = text;
                var tarikh_mula_div = document.getElementById("tarikh_mula_div");
                tarikh_mula_div.scrollIntoView();
                return false;
            }

            if (tarikh_tamat == '') {
                text = "Sila Isi tarikh tamat";
                document.getElementById("err_tarikh_tamat").innerHTML = text;
                var tarikh_tamat_div = document.getElementById("tarikh_tamat_div");
                tarikh_tamat_div.scrollIntoView();
                return false;
            }
            if (jenis == '2') {
                if (photo == '') {
                    text = "Sila Pilih Photo";
                    document.getElementById("err_photo").innerHTML = text;
                    return false;
                }
            }
            
            return true
            // else {
                // alert("All fields are required.....!");
                // return false;
            // }
            
        }
    </script>

@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.css">
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/select2/dist/js/select2.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/quill/dist/quill.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('argon') }}/js/items.js"></script>
@endpush
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {  
        // $('#jenisMedia').on('change', function() {
        //     alert( this.value );
        // });
      $(".jenisMedia").change(function () {
        console.log( $(".jenisMedia").val() );
        if ( $(".jenisMedia").val() == "1" ) {
          $(".berita-tajuk").show();
          $(".berita-keterangan").show();
          $(".gambar-banner").hide();
          $(".programList").hide();
        } else if ( $(".jenisMedia").val() == "2" ) {
          $(".berita-tajuk").hide();
          $(".berita-keterangan").hide();
          $(".gambar-banner").show();
          $(".programList").show();
        }
      });
    });
  </script>