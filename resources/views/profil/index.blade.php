@extends('layouts.app', [
    'title' => __('Profil Management'),
    'parentSection' => 'laravel',
    'elementName' => 'profil'
])

@section('content')
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Cari Profil') }} 
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('profil.index') }}" class="">{{ __('Cari Profil') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Cari') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row pt-2 pb-5" style="padding: 1.5rem;">
            <div class="col text-left"><h2>Carian Profil Individu</h2></div>
        </div>
        <div class="row pb-5">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                        <?php 
                        if(!empty($profil)){
                            $val = 'value='.$nokp.'';
                        }else{
                            $val = 'value=';
                        }
                        ?>

                        <form method="get" class="item-form" action="{{ route('profil.index') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                                <div class="row bg-transparent">
                                    <div class="col-md-10">
                                        <input class="form-control" name="no_kp" placeholder="Masukkan No. Kad Pengenalan Pemohon" type="number" {{ $val }}>
                                        <span class="text-sm">Contoh : 621027095057, 691009095081, 650828045167</span>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-default">{{ __('Cari') }}</button>
                                    </div>
                                </div>
                        </form>
            </div>
            <div class="col-md-2"></div>
        </div>
        <?php
            $no = 1; 
            if(!empty($profil)){ ?>
        {{-- <div class="row">
            <div class="col"> --}}
                {{-- <div class="card">
                    <div class="card-header"> --}}
                        <div class="row pb-3" style="margin-right: -15px;margin-left: -15px;">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <?php $run_no = 1; ?>
                                @foreach ($profil as $pro_k => $pro_data)
                                    <?php if($run_no == 1){ ?>
                                        <div class="row">
                                            <div class="col-md-3">Nama </div>
                                            <div class="col-md-7">: {{ ucwords($pro_data->profil_nama) }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">No Kad Pengenalan </div>
                                            <div class="col-md-7">: {{ $pro_data->profil_kp }}</div>
                                        </div>
                                    <?php $run_no++;  } ?>
                                @endforeach
                            </div>
                            <div class="col-md-2 text-right">

                                <a href="{{ route('profil.excel', $nokp) }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-file-excel-o text-success fa-2x"></i>
                                </a>
                                <a href="{{ route('profil.exportPdf', $nokp) }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-file-pdf text-danger fa-2x"></i>
                                </a>

                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    {{-- </div> --}}
                    <div class="card-body">
                    <div class="table-responsive py-4 bg-white">
                        <table class="table align-items-center table-flush"  id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('No') }}</th>
                                    <th scope="col">{{ __('Nama Program') }}</th>
                                    <th scope="col">{{ __('Agensi') }}</th>
                                    <th scope="col">{{ __('Nilai') }}</th>
                                    <th scope="col">{{ __('Kekerapan') }}</th>
                                    <th scope="col">{{ __('Tarikh Terima') }}</th>
                                    <th scope="col">{{ __('Tarikh Tamat') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1; 
                                    if(!empty($profil)){ ?>
                                        @foreach ($profil as $pro_k => $pro_data)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>
                                                    <a href="{{ route('profil.view', $pro_data->id) }}">
                                                        {{ $pro_data->program_nama }}
                                                    </a>
                                                </td>
                                                <td>{{ $pro_data->agensi_nama }}</td>
                                                <td>{{ $pro_data->jumlah }}</td>
                                                <td>{{ $pro_data->kekerapan_nama }}</td>
                                                <td>{{ date('d-m-Y', strtotime($pro_data->tarikh_mula)) }}</td>
                                                <td>{{ date('d-m-Y', strtotime($pro_data->tarikh_tamat)) }}</td>
                                            </tr>
                                        <?php $no++; ?>
                                    @endforeach
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            {{-- </div>
        </div> --}}
        <?php } ?>
            
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