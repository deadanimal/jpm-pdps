@extends('layouts.app', [
    'title' => __('Program'),
    'parentSection' => 'laravel',
    'elementName' => 'program'
])

@section('content')
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Program') }} 
            @endslot

            <li class="breadcrumb-item text-white"><a href="{{ route('program.index') }}" class="text-white">{{ __('Program') }}</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Senarai') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                {{-- <div class="card">
                    <div class="card-header"> --}}
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h3 class="text-dark">{{ __('Senarai Program') }}</h3>
                                <p class="text-sm mb-0">
                                    <!-- {{ __('This is an example of item management. This is a minimal setup in order to get started fast.') }} -->
                                </p>
                            </div>
                        </div>
                        <div class="row align-items-center">
                                @if (auth()->user()->can('create', App\Program::class))
                                    <div class="col-12 text-right">
                                            <form method="get" class="item-form" action="{{ route('program.index') }}" autocomplete="off" enctype="multipart/form-data">
                                                @csrf
                                                        <div class="form-group">
                                                            <input type="text" placeholder="Nama program" name="program">
                                                            <button type="submit" class="btn btn-sm btn-default">{{ __('Cari') }}</button>
                                        <a href="{{ route('program.create') }}" class="btn btn-sm btn-primary">{{ __('Tambah Program') }}</a>
                                                        </div>
                                            </form>
                                    </div>
                                @endif
                        </div>
                    {{-- </div> --}}

                    <div class="col-12 mt-2">
                        @include('alerts.success')
                        @include('alerts.errors')
                    </div>
                    {{-- <div class="card-body"> --}}
                        
                    {{-- </div> --}}
                {{-- </div> --}}
            </div>
        </div>
        <?php $no = 1; ?>
            @foreach ($program as $data)
            <div class="row mt-20">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Nama Program :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>{{ ucwords($data->nama) }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Kategori :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>{{ ucwords($data->nama_kategori) }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Manfaat :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>{{ ucwords($data->nama_manfaat) }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Kekerapan :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>{{ ucwords($data->nama_kekerapan) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            {{-- <div class="form-group"> --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="input-name">Tarikh Dihantar </label>
                                    </div>
                                    <div class="col-md-6">
                                        <span>:{{ date('d-m-Y', strtotime($data->tarikh_rekod)) }}</span>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="input-name">Status Pelaksanaan</label>
                                    </div>
                                    <div class="col-md-6">
                                        <?php 
                                        // if ($data->status_pelaksanaan_id == '1')
                                        //     { echo "<span class='badge badge-success'>Aktif</span>"; }  
                                        // else if ($data->status_pelaksanaan_id == '2')
                                        //     { echo "<span class='badge badge-danger'>Tidak Aktif</span>"; }
                                        ?>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="input-name">Status Program</label>
                                    </div>
                                    <div class="col-md-6">
                                        <?php 
                                        if ($data->status_program_id == '1')
                                            { echo "<span class='badge badge-warning'>Dihantar</span>"; }  
                                        else if ($data->status_program_id == '2')
                                            { echo "<span class='badge badge-success'>Berjaya</span>"; }
                                        else if ($data->status_program_id == '3')
                                            { echo "<span class='badge badge-danger'>Ditolak</span>"; }
                                        ?>
                                    </div>
                                </div>
                            {{-- </div> --}}
                            {{-- <div class="form-group"> --}}
                                <div class="row pt-15">
                                    <div class="col-md-12 text-center">
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ route('program.show', $data->id) }}" class="btn btn-info btn-sm">
                                                    <span class="btn-inner--text"><i class="fas fa-eye fa-2x"></i></span>
                                                </a>
                                            </div>
                                            @if (auth()->user()->can('update', App\Program::class))
                                                <div class="col">
                                                    <a href="{{ route('program.edit', $data->id) }}" class="btn btn-success btn-sm">
                                                        <span class="btn-inner--text"><i class="fas fa-edit fa-2x"></i></span>
                                                    </a>
                                                </div>
                                            @endif
                                            @if (auth()->user()->can('delete', App\Program::class))
                                                <div class="col">
                                                    <form action="{{ route('program.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Padam Program ?');">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash fa-2x"></i>
                                                        </button>

                                                        {{-- <button class="btn btn-default" data-toggle="sweet-alert" data-sweet-alert="confirm"><i class="fas fa-trash fa-2x"></i></button> --}}
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row text-center">
                <div class="col text-center">
                    {{ $program->links() }}
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
                            title: "Padam data ?",
                            // text: "Hantar Permohonan ?",
                            type: "danger",
                            showCancelButton: true,
                            buttonsStyling: false,
                            cancelButtonText: "Batal",
                            confirmButtonClass: "btn btn-secondary",
                            confirmButtonText: "Padam",
                            cancelButtonClass: "btn btn-danger"
                        }).then(result => {
                            // if (result.value) {
                                // Show confirmation
                                swal({
                                    title: "Berjaya",
                                    text: "Program Berjaya Dipadam",
                                    type: "success",
                                    buttonsStyling: false,
                                    confirmButtonClass: "btn btn-success"
                                });
                            // }
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
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.css">
@endpush

@push('js')
<script src="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
@endpush