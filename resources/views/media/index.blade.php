@extends('layouts.app', [
    'title' => __('Banner & Berita'),
    'parentSection' => 'laravel',
    'elementName' => 'media'
])

@section('content')
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Banner & Berita') }} 
            @endslot

            <li class="breadcrumb-item text-white">
                <a href="{{ route('media.index') }}" class="text-white">{{ __('Banner & Berita') }}</a>
            </li>
            <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Senarai') }}
            </li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0 text-dark">{{ __('Senarai Banner & Berita') }}</h3>
                                <p class="text-sm mb-0">
                                    <!-- {{ __('This is an example of item management. This is a minimal setup in order to get started fast.') }} -->
                                </p>
                            </div>
                            @if (auth()->user()->can('create', App\Media::class))
                                <div class="col-4 text-right">
                                    <a href="{{ route('media.create') }}" class="btn btn-sm btn-primary">{{ __('Tambah Banner & Berita') }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        {{-- <div class="col-12 mt-2">
            @include('alerts.success')
            @include('alerts.errors')
        </div> --}}

        <?php $no = 1; ?>
        @foreach ($medias as $media)

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
                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        @if (auth()->user()->can('update', App\Media::class))
                                            <a href="{{ route('media.edit', $media->id) }}" class="btn btn-success btn-sm">
                                                <span class="btn-inner--text"><i class="fas fa-edit"></i></span>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="col-md-6 text-left">
                                        @if (auth()->user()->can('delete', App\Media::class))
                                            <form action="{{ route('media.destroy', $media->id) }}" method="POST">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button class="btn btn-danger btn-sm">
                                                    <span class="btn-inner--text"><i class="fas fa-trash"></i></span>
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
                {{ $medias->links() }}
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