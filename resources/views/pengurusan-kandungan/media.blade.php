@extends('layouts.app', [
    'title' => __('media'),
    'parentSection' => 'laravel',
    'elementName' => 'media'
])

@section('content')
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Banner & News') }} 
            @endslot
            <li class="breadcrumb-item text-white">
                <a href="{{ route('media.index') }}" class="text-white">{{ __('Media') }}</a>
            </li>
            <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Senarai') }}
            </li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">

        <div class="row">
            <div class="col">
                {{-- <div class="card">
                    <div class="card-header"> --}}
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h3 class="text-dark">{{ __('Senarai program') }}</h3>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            @if (auth()->user()->can('create', App\Program::class))
                                <div class="col-12 text-right">
                                        <form method="get" class="item-form" action="{{ route('pengurusan-kandungan.media') }}" autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <select type="text" placeholder="Subjek" name="media">
                                                    <option value="1">Berita</option>
                                                    <option value="2">Banner</option>
                                                </select>
                                                <button type="submit" class="btn btn-sm btn-default">{{ __('Cari') }}</button>
                                                <a href="{{ route('media.create') }}" class="btn btn-sm btn-primary">{{ __('Tambah Banner/Berita') }}</a>
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

        {{-- <div class="col-12 mt-2">
            @include('alerts.success')
            @include('alerts.errors')
        </div> --}}

        <?php $no = 1; ?>
        @foreach ($media_new as $media)

            <div class="row mt-20">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Jenis Pemohonan :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <?php if($media->jenis == '1'){ ?>
                                            <span>{{ ucwords('Berita') }}</span>
                                        <?php }else if($media->jenis == '2'){ ?>
                                            <span>{{ ucwords('Banner') }}</span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Tajuk :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>{{ ucwords($media->tajuk) }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Maklumat Berita :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>{{ ucwords($media->keterangan) }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Tarikh Mula :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>{{ date('d-m-Y', strtotime($media->tarikh_mula)) }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Tarikh Tamat :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>{{ date('d-m-Y', strtotime($media->tarikh_tamat)) }}</span>
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
                                        <span>:{{ date('d-m-Y', strtotime($media->created_at)) }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="input-name">Status</label>
                                    </div>
                                    <div class="col-md-6">
                                        <?php 
                                        if ($media->status == '1')
                                            { echo "<span class='badge badge-warning'>Dihantar</span>"; }  
                                        else if ($media->status == '2')
                                            { echo "<span class='badge badge-success'>Berjaya</span>"; }
                                        else if ($media->status == '3')
                                            { echo "<span class='badge badge-danger'>Ditolak</span>"; }
                                        ?>
                                    </div>
                                </div>
                                
                                <div class="row pt-15">
                                    <div class="col-md-12 text-center">
                                        <a href="{{ route('media.show', $media->id) }}" class="pl-20">
                                            <span class="btn-inner--text"><i class="fas fa-eye fa-2x text-info"></i></span>
                                        </a>
                                        <a href="{{ route('pengurusan-kandungan.approve-media', [$media->id,2,1]) }}" class="pl-20">
                                            <span class="btn-inner--text"><i class="fa fa-check fa-2x text-success"></i></span>
                                        </a>
                                        <a href="{{ route('pengurusan-kandungan.approve-media', [$media->id,3,1]) }}" class="pl-20">
                                            <span class="btn-inner--text"><i class="fa fa-ban fa-2x text-danger"></i>
                                            </span>
                                        </a>
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
                {{ $media_new->links() }}
            </div>
        </div>
            
    </div>

    <div class="container-fluid mt-0">

        <div class="row">
            <div class="col">
                {{-- <div class="card">
                    <div class="card-header"> --}}
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h3 class="text-dark">{{ __('Senarai program') }}</h3>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            @if (auth()->user()->can('create', App\Program::class))
                                <div class="col-12 text-right">
                                        <form method="get" class="item-form" action="{{ route('pengurusan-kandungan.media') }}" autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <select type="text" placeholder="Subjek" name="media">
                                                    <option value="1">Berita</option>
                                                    <option value="2">Banner</option>
                                                </select>
                                                <button type="submit" class="btn btn-sm btn-default">{{ __('Cari') }}</button>
                                                <a href="{{ route('media.create') }}" class="btn btn-sm btn-primary">{{ __('Tambah Banner/Berita') }}</a>
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

        {{-- <div class="col-12 mt-2">
            @include('alerts.success')
            @include('alerts.errors')
        </div> --}}

        <?php $no = 1; ?>
        @foreach ($media_approved as $media_app)

            <div class="row mt-20">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Jenis Pemohonan :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <?php if($media_app->jenis == '1'){ ?>
                                            <span>{{ ucwords('Berita') }}</span>
                                        <?php }else if($media_app->jenis == '2'){ ?>
                                            <span>{{ ucwords('Banner') }}</span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Tajuk :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>{{ ucwords($media_app->tajuk) }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Maklumat Berita :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>{{ ucwords($media_app->keterangan) }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Tarikh Mula :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>{{ date('d-m-Y', strtotime($media_app->tarikh_mula)) }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Tarikh Tamat :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>{{ date('d-m-Y', strtotime($media_app->tarikh_tamat)) }}</span>
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
                                        <span>:{{ date('d-m-Y', strtotime($media_app->created_at)) }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="input-name">Status</label>
                                    </div>
                                    <div class="col-md-6">
                                        <?php 
                                        if ($media_app->status == '1')
                                            { echo "<span class='badge badge-warning'>Dihantar</span>"; }  
                                        else if ($media_app->status == '2')
                                            { echo "<span class='badge badge-success'>Berjaya</span>"; }
                                        else if ($media_app->status == '3')
                                            { echo "<span class='badge badge-danger'>Ditolak</span>"; }
                                        ?>
                                    </div>
                                </div>
                                <div class="row pt-15">
                                    <div class="col-md-12 text-center">
                                        
                                        <a href="{{ route('media.show', $media_app->id) }}" class="pl-20">
                                            <span class="btn-inner--text"><i class="fas fa-eye fa-2x text-info"></i></span>
                                        </a>
                                        <a href="{{ route('pengurusan-kandungan.approve-media', [$media_app->id,4,2]) }}" class="pl-20">
                                            <span class="btn-inner--text"><i class="fa fa-eraser fa-2x text-warning"></i></span>
                                        </a>
                                        <a href="{{ route('pengurusan-kandungan.delete-media', $media_app->id) }}" class="pl-20">
                                            <span class="btn-inner--text"><i class="fa fa-trash fa-2x text-danger"></i></span>
                                        </a>

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
                {{ $media_approved->links() }}
            </div>
        </div>
            
    </div>
    @include('layouts.footers.auth')

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