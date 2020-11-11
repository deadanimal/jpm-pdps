@extends('layouts.app', [
    'title' => __('Pemohonan Data'),
    'parentSection' => 'laravel',
    'elementName' => 'orgdata'
])

@section('content')
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Pemohonan Data') }} 
            @endslot

            <li class="breadcrumb-item text-white"><a href="{{ route('item.index') }}" class="text-white">{{ __('Pemohonan Data') }}</a></li>
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
                                <h3 class="text-dark">{{ __('Senarai Pemohonan Data') }}</h3>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            @if (auth()->user()->can('create', App\Program::class))
                                <div class="col-12 text-right">
                                        <form method="get" class="item-form" action="{{ route('orgdata.index') }}" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Nama program" name="nama">
                                                        <button type="submit" class="btn btn-sm btn-default">{{ __('Cari') }}</button>
                                    <a href="{{ route('orgdata.create') }}" class="btn btn-sm btn-primary">{{ __('Tambah Program') }}</a>
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
        @foreach ($orgdata as $val)

            <div class="row mt-20">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                {{-- <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Agensi Yang Memohon :</label>
                                    </div>
                                    <div class="col-md-8">
                                        
                                        @foreach ($agensidata as $ag_val)

                                            <?php // if($ag_val->id == $agensi_id){ ?>
                                                <span>{{ ucwords($ag_val->nama) }}</span>
                                            <?php //xs } ?>

                                        @endforeach
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Program :</label>
                                    </div>
                                    <div class="col-md-8">
                                            <span>{{ ucwords($val->program_name) }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Agensi Yang Dipohon :</label>
                                    </div>
                                    <div class="col-md-8">
                                            <span>{{ ucwords($val->nama_agensi) }}</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Subjek :</label>
                                    </div>
                                    <div class="col-md-8">
                                            <span>{{ $val->subjek }}</span>
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
                                        <span>:{{ date('d-m-Y', strtotime($val->created_at)) }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="input-name">Status</label>
                                    </div>
                                    <div class="col-md-6">
                                        <?php 
                                        if ($val->status == '1')
                                            { echo "<span class='badge badge-warning'>Dihantar</span>"; }  
                                        else if ($val->status == '2')
                                            { echo "<span class='badge badge-success'>Berjaya</span>"; }
                                        else if ($val->status == '3')
                                            { echo "<span class='badge badge-danger'>Ditolak</span>"; }
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    @if (auth()->user()->can('update', App\Orgdata::class))
                                        <div class="col text-center">
                                                <a href="{{ route('orgdata.show', $val->id) }}" class="btn btn-info">
                                                    <span class="btn-inner--text"><i class="fas fa-eye fa-2x"></i></span>
                                                </a>
                                        </div>
                                    @endif
                                    <div class="col text-center">
                                        @if (auth()->user()->can('update', App\Orgdata::class))
                                            <a href="{{ route('orgdata.edit', $val->id) }}" class="btn btn-success">
                                                <span class="btn-inner--text"><i class="fas fa-edit fa-2x"></i></span>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="col text-center">
                                        @if (auth()->user()->can('delete', App\Orgdata::class))
                                            <form action="{{ route('orgdata.destroy', $val->id) }}" method="POST" onsubmit="return confirm('Padam Pemohonan ?');">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">
                                                    <span class="btn-inner--text"><i class="fas fa-trash fa-2x"></i></span>
                                                </button>
                                            </form>
                                        @endif
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
                {{ $orgdata->links() }}
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
@endpush