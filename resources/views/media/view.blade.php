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
                                <h3 class="mb-0">{{ __('Lihat Banner & Berita') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="javascript:history.go(-1)" class="btn btn-sm btn-default">{{ __('Kembali') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="pl-lg-4">

                            <div class="row pt-2 pb-2">
                                <div class="col-md-4">Nama Agensi</div>
                                <div class="col-md-8">: {{ ucwords($media->nama_agensi) }}</div>
                            </div>
                            <?php if($media->jenis == '1'){ ?>
                                <div class="row pt-2 pb-2">
                                    <div class="col-md-4">Tajuk</div>
                                    <div class="col-md-8">: {{ ucwords($media->tajuk) }}</div>
                                </div>
                                <div class="row pt-2 pb-2">
                                    <div class="col-md-4">Keterangan</div>
                                    <div class="col-md-8">: {{ ucwords($media->keterangan) }}</div>
                                </div>
                            <?php }else{ ?>
                                <div class="row pt-2 pb-2">
                                    <div class="col-md-4">Nama Program</div>
                                    <div class="col-md-8">: {{ ucwords($media->program_name) }}</div>
                                </div>
                            <?php } ?>
                            <div class="row pt-2 pb-2">
                                <div class="col-md-4">Tarikh Mula</div>
                                <div class="col-md-8">: {{ date('d-m-Y', strtotime($media->tarikh_mula)) }}</div>
                            </div>
                            <div class="row pt-2 pb-2">
                                <div class="col-md-4">Tarikh Tamat</div>
                                <div class="col-md-8">: {{ date('d-m-Y', strtotime($media->tarikh_tamat)) }}</div>
                            </div>
                            <?php if($media->jenis == '2'){ ?>
                                <div class="row pt-2 pb-2">
                                    <div class="col-md-4">Banner</div>
                                    <div class="col-md-8">: 
                                        <img src='/storage/{{$media->gambar}}' style='max-width: 50px;height:50px;'>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.css">
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
@endpush