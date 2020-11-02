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
                                <a href="{{ route('media.index') }}" class="btn btn-sm btn-primary">{{ __('Kembali Ke Senarai') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('media.update', $media->id) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            {{-- <h6 class="heading-small text-muted mb-4">{{ __('Tag information') }}</h6> --}}
                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col-md-6">{{-- agensi --}}
                                        <div class="form-group{{ $errors->has('agensi') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('Agensi') }}  <span class="text-red">*</span></label>
                                            <select disabled type="text" id="setactive-links" class="form-control" name="agensi_id" autofocus>
                                                <?php 
                                                foreach ($agensi as $agensi_no => $agensi_data){ 
                                                    if($agensi_data->id == $media->agensi_id){
                                                        echo "<option selected value='$agensi_data->id'>$agensi_data->nama</option>";
                                                    }else{
                                                        echo "<option value='$agensi_data->id'>$agensi_data->nama</option>";
                                                    }
                                                } ?>
                                            </select>
                                            @include('alerts.feedback', ['field' => 'agensi_id'])
                                        </div>
                                    </div>

                                    <?php if ($media->jenis == '2') { ?>
                                        <div class="col-md-6">
                                        {{-- program --}}
                                            <div class="form-group{{ $errors->has('program') ? ' has-danger' : '' }}">
                                                <label class="form-control-label">{{ __('Program') }} <span class="text-red">*</span></label>
                                                <select type="text" id="setactive-links" class="form-control" name="program_id" required autofocus>
                                                    <?php 
                                                    foreach ($program as $program_no => $program_data){ 
                                                        if($program_data->id == $media->program_id){
                                                            echo "<option selected value='$program_data->id'>$program_data->nama</option>";
                                                        }else{
                                                            echo "<option value='$program_data->id'>$program_data->nama</option>";
                                                        }
                                                    } ?>
                                                </select>
        
                                                @include('alerts.feedback', ['field' => 'agensi_id'])
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($media->jenis == '1') { ?>
                                        <div class="col-md-6">
                                        {{-- tajuk --}}
                                            <div class="form-group{{ $errors->has('tajuk') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Tajuk') }} <span class="text-red">*</span></label>
                                                <input type="text" name="tajuk" id="input-name" class="form-control{{ $errors->has('tajuk') ? ' is-invalid' : '' }}" placeholder="{{ __('Tajuk') }}" value="{{ old('tajuk',$media->tajuk) }}" autofocus>
        
                                                @include('alerts.feedback', ['field' => 'tajuk'])
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($media->jenis == '1') { ?>
                                        <div class="col-md-6">
                                        {{-- keterangan --}}
                                            <div class="form-group{{ $errors->has('keterangan') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Keterangan') }} <span class="text-red">*</span></label>
                                                <textarea type="text" name="keterangan" id="input-name" class="form-control{{ $errors->has('Keterangan') ? ' is-invalid' : '' }}" placeholder="{{ __('Keterangan') }}" value="{{ old('keterangan',$media->keterangan) }}" autofocus>{{$media->keterangan}}</textarea>
                                                @include('alerts.feedback', ['field' => 'keterangan'])
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <div class="col-md-6">
                                        {{-- tarikh_mula --}}
                                        <div class="form-group{{ $errors->has('tarikh_mula') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Tarikh Mula') }} <span class="text-red">*</span></label>
                                            <input type="date" name="tarikh_mula" id="input-name" class="form-control{{ $errors->has('tarikh_mula') ? ' is-invalid' : '' }}" placeholder="{{ __('Tarikh Mula') }}" value="{{ old('tarikh_mula',$media->tarikh_mula) }}" autofocus>
                                            @include('alerts.feedback', ['field' => 'tarikh_mula'])
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        {{-- tarikh_tamat --}}
                                        <div class="form-group{{ $errors->has('tarikh_tamat') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Tarikh Tamat') }} <span class="text-red">*</span></label>
                                            <input type="date" name="tarikh_tamat" id="input-name" class="form-control{{ $errors->has('tarikh_tamat') ? ' is-invalid' : '' }}" placeholder="{{ __('Tarikh Tamat') }}" value="{{ old('tarikh_tamat',$media->tarikh_tamat) }}" autofocus>
                                            @include('alerts.feedback', ['field' => 'tarikh_tamat'])
                                        </div>
                                    </div>
                                    <?php if ($media->jenis == '2') { ?>
                                        <div class="col-md-6">
                                        {{-- gambar --}}
                                            <div class="form-group{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                                                <label style="padding-right:50px" class="form-control-label">{{ __('Banner') }} <span class="text-red">*</span></label>
                                                {{-- <input type="file" name="photo" class="form-control{{ $errors->has('gambar') ? ' is-invalid' : '' }}" placeholder="{{ __('Gambar') }}" value="{{ old('gambar',$media->gambar) }}" autofocus>
                                                @include('alerts.feedback', ['field' => 'gambar']) --}}
                                                <img src='/storage/{{$media->gambar}}' alt='qq' style='max-width: 50px;height:50px;'>
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

                                <div class="text-center">
                                    <button type="submit" class="btn btn-default" data-toggle="sweet-alert" data-sweet-alert="success">Simpan</button>
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
                            text: "Banner / Berita Berjaya DiKemaskini",
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
                            title: "Are you sure?",
                            text: "You won't be able to revert this!",
                            type: "warning",
                            showCancelButton: true,
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-danger",
                            confirmButtonText: "Yes, delete it!",
                            cancelButtonClass: "btn btn-secondary"
                        }).then(result => {
                            if (result.value) {
                                // Show confirmation
                                swal({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    type: "success",
                                    buttonsStyling: false,
                                    confirmButtonClass: "btn btn-primary"
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
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.css">
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
@endpush