@extends('layouts.app', [
    'title' => __('Program'),
    'parentSection' => 'laravel',
    'elementName' => 'req-data'
])

@section('content')
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Program') }} 
            @endslot

            <li class="breadcrumb-item text-white"><a href="{{ route('program.index') }}" class="text-white">{{ __('Program') }}</a></li>
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
                                <h3 class="mb-0">{{ __('Sila Isikan maklumat Program') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('program.index') }}" class="btn btn-sm btn-primary">{{ __('Kembali Ke Senarai') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <form method="post" class="item-form" action="{{ route('program.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            {{-- <h6 class="heading-small text-muted mb-4">{{ __('Item information') }}</h6> --}}
                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col-md-6">
                                        {{-- agensi --}}
                                        <?php if($role_id == '1'){ ?>
                                            <div class="form-group{{ $errors->has('agensi') ? ' has-danger' : '' }}">
                                                <label class="form-control-label">{{ __('Agensi') }} <span class="text-red">*</span></label>
                                                <select type="text" id="setactive-links" class="form-control" name="agensi_id" autofocus>
                                                    @foreach ($agensi as $agensi_no => $agensi_data)
                                                        <option value='{{$agensi_data->id}}'>{{$agensi_data->nama}}</option>
                                                    @endforeach
                                                </select>
        
                                                @include('alerts.feedback', ['field' => 'agensi_id'])
                                            </div>
                                        <?php }else{ ?>
                                            <div class="form-group{{ $errors->has('agensi') ? ' has-danger' : '' }}">
                                                <label class="form-control-label">{{ __('Agensi') }} <span class="text-red">*</span></label>
                                                    @foreach ($agensi as $agensi_no => $agensi_data)
                                                        <?php 
                                                        if($agensiid == $agensi_data->id){
                                                            $agensiname = $agensi_data->nama;
                                                        } ?>
                                                    @endforeach
                                                    <input disabled type="text" class="form-control" value="{{$agensiname}}" autofocus>
                                                    <input type="hidden" name="agensi_id" value="{{$agensiid}}">
                                                @include('alerts.feedback', ['field' => 'agensi_id'])
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <div class="col-md-6">
                                        {{-- nama --}}
                                        <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Nama Program') }} <span class="text-red">*</span></label>
                                            <input type="text" name="nama" id="input-name" class="form-control{{ $errors->has('Nama Program') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Program') }}" value="{{ old('nama') }}" required autofocus>
        
                                            @include('alerts.feedback', ['field' => 'nama'])
                                        </div>
                                    </div>

                                    <div class="col-md-6">{{-- kategori --}}
                                        <div class="form-group{{ $errors->has('kategori') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('Kategori') }} <span class="text-red">*</span></label>
                                            <select type="text" id="setactive-links" class="form-control" name="kategori_id" required autofocus>
                                                <option selected="selected">Sila Pilih</option>
                                                    @foreach ($kat as $katid => $kdata)
                                                        <option value='{{$kdata->id}}'>{{$kdata->nama_kategori}}</option>
                                                    @endforeach
                                            </select>
        
                                            @include('alerts.feedback', ['field' => 'kategori_id'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        {{-- teras --}}
                                        <div class="form-group{{ $errors->has('teras') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('Teras') }} <span class="text-red">*</span></label>
                                            <select type="text" id="setactive-links" class="form-control" name="teras_id" required autofocus>
                                                
                                                @foreach ($teras as $teras_k => $teras_val)
                                                    <option value="{{$teras_val->id}}">{{$teras_val->nama}}</option>
                                                @endforeach
                                            </select>
        
                                            @include('alerts.feedback', ['field' => 'teras_id'])
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        {{-- sub kategori --}}
                                        <div class="form-group" id="dynamic_sub_kat_que">
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        {{-- Kumpulan sasar --}}
                                        <div class="form-group{{ $errors->has('kumpulan sasar') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('Kumpulan Sasar') }} <span class="text-red">*</span></label>
                                                <br />
                                                @foreach ($kumpulansasar as $ks_k => $ks_data)
                                                <span class="pr-20">
                                                    <input name="ks_id[]" class="pr-10" type="checkbox" value='{{$ks_data->id}}' />{{$ks_data->nama}}<br />
                                                </span>
                                                @endforeach
        
                                            @include('alerts.feedback', ['field' => 'agensi_id'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        {{-- tarikh mula --}}
                                        <div class="form-group{{ $errors->has('tarikh_mula') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Tarikh Mula') }} <span class="text-red">*</span></label>
                                            <input type="date" name="tarikh_mula" id="input-name" class="form-control{{ $errors->has('tarikh_mula') ? ' is-invalid' : '' }}" placeholder="{{ __('tarikh_mula') }}" value="{{ old('tarikh_mula') }}" required autofocus>
        
                                            @include('alerts.feedback', ['field' => 'tarikh_mula'])
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        {{-- tarikh tamat --}}
                                        <div class="form-group{{ $errors->has('tarikh_tamat') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Tarikh Tamat') }} <span class="text-red">*</span></label>
                                            <input type="date" name="tarikh_tamat" id="input-name" class="form-control{{ $errors->has('tarikh_tamat') ? ' is-invalid' : '' }}" placeholder="{{ __('tarikh_tamat') }}" value="{{ old('tarikh_tamat') }}" required autofocus>
        
                                            @include('alerts.feedback', ['field' => 'tarikh_tamat'])
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        {{-- kekerapan --}}
                                        <div class="form-group{{ $errors->has('kekerapan') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Kekerapan') }} <span class="text-red">*</span></label>
                                            <select name="kekerapan_id" id="input-name" class="form-control{{ $errors->has('kekerapan') ? ' is-invalid' : '' }}" value="{{ old('kekerapan_id') }}" required autofocus>
                                                @foreach ($kekerapan as $kekerapan_k => $kekerapan_val)
                                                    <option value="{{$kekerapan_val->id}}">{{$kekerapan_val->nama}}</option>
                                                @endforeach
                                            </select>
                                            @include('alerts.feedback', ['field' => 'kekerapan_id'])
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        {{-- manfaat --}}
                                        <div class="form-group{{ $errors->has('manfaat') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Manfaat') }} <span class="text-red">*</span></label>
                                            <select name="manfaat_id" id="manfaatval" class="form-control{{ $errors->has('Kumpulan Sasaran') ? ' is-invalid' : '' }}" value="{{ old('manfaat') }}" required autofocus>
                                                @foreach ($manfaat as $manfaat_k => $manfaat_val)
                                                    <option value="{{$manfaat_val->id}}">{{$manfaat_val->nama}}</option>
                                                @endforeach
                                            </select>
                                            @include('alerts.feedback', ['field' => 'manfaat_id'])
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        {{-- kos --}}
                                        <div id="kosval" class="form-group{{ $errors->has('kos') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Kos') }} <span class="text-red">*</span></label>
                                            <input type="number" value="0" name="kos" id="input-name" class="form-control{{ $errors->has('kos') ? ' is-invalid' : '' }}" placeholder="{{ __('kos') }}" value="{{ old('kos') }}" required autofocus>
                                            @include('alerts.feedback', ['field' => 'kos'])
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        {{-- objektif --}}
                                        <div class="form-group{{ $errors->has('objektif') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Objektif') }} <span class="text-red">*</span></label>
                                            <textarea type="text" name="objektif" class="form-control{{ $errors->has('objektif') ? ' is-invalid' : '' }}" placeholder="{{ __('Objektif') }}" value="{{ old('objektif') }}" autofocus required></textarea>
                                            @include('alerts.feedback', ['field' => 'objektif'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        {{-- syarat program --}}
                                        <div class="form-group{{ $errors->has('Syarat Program') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Syarat Program') }} <span class="text-red">*</span></label>
                                            <textarea rows="3" type="text" name="syarat_program" id="input-name" class="form-control{{ $errors->has('syarat_program') ? ' is-invalid' : '' }}" placeholder="{{ __('Syarat Program') }}" value="{{ old('syarat_program') }}" autofocus></textarea>
                                            @include('alerts.feedback', ['field' => 'syarat_program'])
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        {{-- status_pelaksanaan	 --}}
                                        <div class="form-group{{ $errors->has('status_pelaksanaan') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('Status Pelaksanaan') }}</label>
                                            <select type="text" class="form-control" name="status_pelaksanaan_id" autofocus>
                                                <option value="1">Aktif</option>
                                                <option value="2">Tidak Aktif</option>
                                            </select>
        
                                            @include('alerts.feedback', ['field' => 'status_pelaksanaan'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        {{-- url --}}
                                        <div class="form-group{{ $errors->has('url') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Agensi URL') }} <span class="text-red">*</span></label>
                                            <input type="text" name="url" id="input-name" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" placeholder="{{ __('URL') }}" value="{{ old('url') }}" required autofocus>
                                            @include('alerts.feedback', ['field' => 'url'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        {{-- logo --}}
                                        <div class="form-group{{ $errors->has('logo') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Logo') }}</label>
                                            <input type="file" name="photo" id="input-name" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" placeholder="{{ __('Logo') }}" value="{{ old('logo') }}" autofocus>
                                            @include('alerts.feedback', ['field' => 'logo'])
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <?php if($role_id == '1'){ ?>
                                        <button class="btn btn-default" data-toggle="sweet-alert" data-sweet-alert="success">Simpan</button>
                                    <?php }else{ ?>
                                        <button class="btn btn-default" data-toggle="sweet-alert" data-sweet-alert="confirm">Simpan</button>
                                    <?php } ?>
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
        (function($) {
        "use strict";
    
        $(function() {
            $('[data-toggle="sweet-alert"]').on("click", function() {
                var type = $(this).data("sweet-alert");
    
                switch (type) {
                    case "basic":
                        swal({
                            title: "Here's a message!",
                            text: "A few words about this sweet alert ...",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-primary"
                        });
                        break;
    
                    case "info":
                        swal({
                            title: "Info",
                            text: "A few words about this sweet alert ...",
                            type: "info",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-info"
                        });
                        break;
    
                    case "info":
                        swal({
                            title: "Info",
                            text: "A few words about this sweet alert ...",
                            type: "info",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-info"
                        });
                        break;
    
                    case "success":
                        swal({
                            title: "Berjaya",
                            text: "Program Berjaya Disimpan",
                            type: "success",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-success"
                        });
                        break;
    
                    case "warning":
                        swal({
                            title: "Warning",
                            text: "A few words about this sweet alert ...",
                            type: "warning",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-warning"
                        });
                        break;
    
                    case "question":
                        swal({
                            title: "Are you sure?",
                            text: "A few words about this sweet alert ...",
                            type: "question",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-default"
                        });
                        break;
    
                    case "confirm":
                        swal({
                            title: "Hantar Permohonan ?",
                            // text: "Hantar Permohonan ?",
                            type: "warning",
                            showCancelButton: true,
                            buttonsStyling: false,
                            cancelButtonText: "Batal",
                            confirmButtonClass: "btn btn-danger",
                            confirmButtonText: "Hantar",
                            cancelButtonClass: "btn btn-secondary"
                        }).then(result => {
                            if (result.value) {
                                // Show confirmation
                                swal({
                                    title: "Berjaya",
                                    text: "Program Berjaya Disimpan",
                                    type: "success",
                                    buttonsStyling: false,
                                    confirmButtonClass: "btn btn-success"
                                });
                            }
                        });
                        break;
    
                    case "image":
                        swal({
                            title: "Sweet",
                            text: "Modal with a custom image ...",
                            imageUrl: "../../assets/img/ill/ill-1.svg",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-primary",
                            confirmButtonText: "Super!"
                        });
                        break;
    
                    case "timer":
                        swal({
                            title: "Auto close alert!",
                            text: "I will close in 2 seconds.",
                            timer: 2000,
                            showConfirmButton: false
                        });
                        break;
                }
            });
        });
    })(jQuery);
    </script>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.css">
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/select2/dist/js/select2.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/quill/dist/quill.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('argon') }}/js/items.js"></script>
@endpush
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        var subkatarray = <?php echo json_encode($subkat); ?>;
        var jenissubkatarray = <?php echo json_encode($jenissubkat); ?>;
    
        var count = 1;

        dynamic_field(count);
        $(".kategoriId").change(function () {
            var kat_id = $(this).val();
            window.value = kat_id;
            console.log(kat_id);
            console.log("atas");

            $('.sub_id'+count).remove();

            var jenissubkatarray = <?php echo json_encode($jenissubkat); ?>;

            $.each(jenissubkatarray, function (i, data2) {
                console.log(kat_id, data2.sub_kategori_id);
                if(kat_id == data2.sub_kategori_id){
                    html2 = '<option class="sub_id'+count+'" value="'+kat_id+'_'+data2.id+'">'+data2.nama_jenis_sub_kategori+'</option>';
                    $('.nama_sub_kat'+count).append(html2);
                }
            });
        });

        function dynamic_field(number)
        {
            html = '<div class="row">';
            html += '<div class="col-md-4">';
            html += '<div class="form-group">';
            html += '<label class="form-control-label">Kategori '+ count +' <span class="text-red">*</span></label>';
            html += '<select type="text" class="form-control kategoriId" name="sub_kategori_id[]" autofocus>';
            html += '<option selected="selected">Sila Pilih</option>';
            
            $.each(subkatarray, function (i, data1) {
                html += '<option value="'+data1.id+'">'+data1.nama_sub_kategori+'</option>';
            });
            
            html += '</select>';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-md-6">';
            html += '<div class="form-group">';
            html += '<label class="form-control-label">Sub Kategori '+ count +' <span class="text-red">*</span></label>';
            html += '<select name="nama_sub_kategori_id[]" class="form-control nama_sub_kat'+count+' select2 select-multiple" data-toggle="select" multiple="multiple" >';

            html += '</select>';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-md-2">';
            if(number > 1)
            {
                html += '<div class="form-group">';
                html += '<label class="form-control-label">Buang</label><br/>';
                html += '<span class="btn btn-danger" id="buangBtn">- Buang</span>';
                html += '</div>';
                html += '</div></div>';
                $('#dynamic_sub_kat_que').append(html);
                $('.select-multiple').select2();

                $(".kategoriId").change(function () {
                    var kat_id = $(this).val();
                    window.value = kat_id;
                    console.log(kat_id);
                    console.log("atas");

                    $('.sub_id'+count).remove();

                    var jenissubkatarray = <?php echo json_encode($jenissubkat); ?>;

                    $.each(jenissubkatarray, function (i, data2) {
                        console.log(kat_id, data2.sub_kategori_id);
                        if(kat_id == data2.sub_kategori_id){
                            html2 = '<option class="sub_id'+count+'" value="'+kat_id+'_'+data2.id+'">'+data2.nama_jenis_sub_kategori+'</option>';
                            $('.nama_sub_kat'+count).append(html2);
                        }
                    });
                });

            }
            else
            {   
                html += '<div class="form-group">';
                html += '<label class="form-control-label">Tambah</label><br/>';
                html += '<span class="btn btn-info text-sm" id="add">+ Tambah</span>';
                html += '</div>';
                html += '</div></div>';
                $('#dynamic_sub_kat_que').html(html);
                $('.select-multiple').select2();
                $(".kategoriId").change(function () {
                    var kat_id = $(this).val();
                    console.log(kat_id);
                });
            }
        }
        
        $(document).on('click', '#add', function(){
        $('.select-multiple').select2();
        count++;
        // console.log(count);
        dynamic_field(count);
        });
        
        $(document).on('click', '#buangBtn', function(){
        count--;
        $(this).closest(".row").remove();
        });
    });

    $(document).ready(function() {
        $("#manfaatval").change(function () {
            console.log( $(this).val() );
            if($(this).val() == '1'){
                $("#kosval").show();
            }else{
                $("#kosval").hide();
            }
        });
    });
    </script>