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

            <li class="breadcrumb-item text-white"><a href="{{ route('orgdata.index') }}" class="text-white">{{ __('Pemohonan Data') }}</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Maklumat') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Lihat Pemohonan Data') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                              <a href="javascript:history.go(-1)" class="btn btn-sm btn-default">{{ __('Kembali') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        {{-- <h6 class="heading-small text-muted mb-4">{{ __('Tag information') }}</h6> --}}
                        <div class="pl-lg-4">

                            {{-- agensi --}}
                            <?php if($role_id == '1'){ ?>
                            <div class="row pt-2 pb-2">
                                <div class="col-md-4">Nama Agensi Pemohon</div>
                                <div class="col-md-8">: {{ ($agensi_pemohon!=''?ucwords($agensi_pemohon):'admin') }}</div>
                            </div>
                            <?php } ?>
                            <div class="row pt-2 pb-2">
                                <div class="col-md-4">Nama Agensi Dipohon</div>
                                <div class="col-md-8">: {{ ucwords($orgdata->nama_agensi) }}</div>
                            </div>
                            <div class="row pt-2 pb-2">
                                <div class="col-md-4">Nama Program</div>
                                <div class="col-md-8">: {{ ucwords($orgdata->program_name) }}</div>
                            </div>
                            <div class="row pt-2 pb-2">
                                <div class="col-md-4">Subjek</div>
                                <div class="col-md-8">: {{ ucwords($orgdata->subjek) }}</div>
                            </div>


                            {{-- status	 --}}
                                {{-- <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Status') }}</label>
                                    <select type="text" id="setactive-links" class="form-control" name="status" value="{{ old('status', $orgdata->status) }}" autofocus>
                                        <option value="1" {{ $orgdata->status	 == 1 ? 'selected' : '' }}>Dihantar</option>
                                        <option value="2" {{ $orgdata->status	 == 2 ? 'selected' : '' }}>Berjaya</option>
                                        <option value="3" {{ $orgdata->status	 == 3 ? 'selected' : '' }}>Ditolak</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'status'])
                                </div> --}}
                        </div>
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
                            text: "Pemohonan Berjaya DiKemaskini",
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