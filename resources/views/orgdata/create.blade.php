@extends('layouts.app', [
    'title' => __('Pemohonan Data'),
    'parentSection' => 'laravel',
    'elementName' => 'req-data'
])

@section('content')
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Pemohonan Data') }} 
            @endslot

            <li class="breadcrumb-item text-white"><a href="{{ route('item.index') }}" class="text-white">{{ __('Pemohonan Data') }}</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Tambah') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Permintaan Data') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('orgdata.index') }}" class="btn btn-sm btn-primary">{{ __('Kembali') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="item-form" action="{{ route('orgdata.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            {{-- <h6 class="heading-small text-muted mb-4">{{ __('Item information') }}</h6> --}}
                            <div class="pl-lg-4">

                                {{-- agensi --}}
                                <div class="form-group{{ $errors->has('agensi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Pemohonan data kepada agensi') }}</label>
                                    <select type="text" id="setactive-links" class="form-control" name="agensi_id" autofocus>
                                        <option selected="selected">Sila Pilih</option>
                                        @foreach ($agensi as $agensi_no => $agensi_data)
                                            <option value='{{$agensi_data->id}}'>{{$agensi_data->nama}}</option>
                                        @endforeach
                                    </select>

                                    @include('alerts.feedback', ['field' => 'agensi_id'])
                                </div>

                                {{-- program --}}
                                <div class="form-group{{ $errors->has('program') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Program') }}</label>
                                    <select type="text" id="setactive-links" class="form-control" name="program_id" autofocus>
                                        <option selected="selected">Sila Pilih</option>
                                        @foreach ($program as $program_no => $program_data)
                                            <option value='{{$program_data->id}}'>{{$program_data->nama}}</option>
                                        @endforeach
                                    </select>

                                    @include('alerts.feedback', ['field' => 'agensi_id'])
                                </div>

                                <div class="form-group{{ $errors->has('subjek') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Subjek') }}</label>
                                    <input type="text" name="subjek" class="form-control{{ $errors->has('subjek') ? ' is-invalid' : '' }}" placeholder="{{ __('Subjek') }}" value="{{ old('subjek') }}" required autofocus />
                                    @include('alerts.feedback', ['field' => 'subjek'])
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4" data-toggle="sweet-alert" data-sweet-alert="success">{{ __('Simpan') }}</button>
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
                            text: "Pemohonan Berjaya Disimpan",
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