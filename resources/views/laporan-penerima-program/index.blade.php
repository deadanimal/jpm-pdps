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

            <li class="breadcrumb-item"><a href="{{ route('laporan-penerima-program.index') }}" class="">{{ __('Laporan Penerima Program') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Cari') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">

                        <?php 
                        // if(!empty($profil)){
                        //     $val = 'value='.$nokp.'';
                        // }else{
                        //     $val = 'value=950305112010';
                        // }
                        ?>

                        <form method="get" class="item-form" action="{{ route('laporan-penerima-program.index') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ __('Program') }}</label>
                                        <select type="text" id="setactive-links" class="form-control" name="program" autofocus>
                                            <option selected value="00">Sila Pilih</option>
                                            @foreach ($program as $program_no => $program_data)
                                                <option value='{{$program_data->id}}'>{{$program_data->nama}}</option>
                                            @endforeach
                                            <option value="all">Semua</option>
                                        </select>

                                        @include('alerts.feedback', ['field' => 'program_id'])
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ __('Agensi') }}</label>
                                        <select type="text" id="setactive-links" class="form-control" name="agensi" autofocus>
                                            <option selected value="00">Sila Pilih</option>
                                            @foreach ($agensi as $agensi_no => $agensi_data)
                                                <option value='{{$agensi_data->id}}'>{{$agensi_data->nama}}</option>
                                            @endforeach
                                            <option value="all">Semua</option>
                                        </select>

                                        @include('alerts.feedback', ['field' => 'agensi_id'])
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-info">{{ __('Cari') }}</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <?php
            
            $no = 1; 
            if(!empty($laporan)){ 
                
        ?>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('laporan-penerima-program.excel',[$req_program,$req_agensi]) }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-file-excel-o text-success fa-2x"></i>
                                </a>
                                <a href="{{ route('laporan-penerima-program.exportPdf', [$req_program,$req_agensi]) }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-file-pdf text-danger fa-2x"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush"  id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('No') }}</th>
                                    <th scope="col">{{ __('Nama Program') }}</th>
                                    <th scope="col">{{ __('Kategori') }}</th>
                                    <th scope="col">{{ __('Nama') }}</th>
                                    <th scope="col">{{ __('No Kad Pengenalan') }}</th>
                                    <th scope="col">{{ __('Jantina') }}</th>
                                    <th scope="col">{{ __('Etnik') }}</th>
                                    <th scope="col">{{ __('Agama') }}</th>
                                    <th scope="col">{{ __('Status Perkahwinan') }}</th>
                                    {{-- <th scope="col">{{ __('Status Tempat kediaman') }}</th>
                                    <th scope="col">{{ __('Jenis Tempat Kediaman') }}</th> --}}
                                    <th scope="col">{{ __('Poskod') }}</th>
                                    <th scope="col">{{ __('Negeri') }}</th>
                                    <th scope="col">{{ __('Daerah') }}</th>
                                    <th scope="col">{{ __('Mukim') }}</th>
                                    <th scope="col">{{ __('Strata') }}</th>
                                    <th scope="col">{{ __('Pekerjaan') }}</th>
                                    {{-- <th scope="col">{{ __('Jumlah Bantuan') }}</th> --}}
                                    <th scope="col">{{ __('Manfat Yang Diterima') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1; 
                                    if(!empty($laporan)){ ?>
                                        @foreach ($laporan as $pro_k => $pro_data)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $pro_data->program_nama }}</td>
                                                <td>{{ $pro_data->nama_kategori }}</td>
                                                <td>{{ $pro_data->profil_nama }}</td>
                                                <td>{{ $pro_data->profil_kp }}</td>
                                                <td>{{ $pro_data->jantina_nama }}</td>
                                                <td>{{ $pro_data->etnik_nama }}</td>
                                                <td>{{ $pro_data->agama_nama }}</td>
                                                <td>{{ $pro_data->status_kahwin_nama }}</td>
                                                <td>{{ $pro_data->profil_poskod }}</td>
                                                <td>{{ $pro_data->negeri_nama }}</td>
                                                <td>{{ $pro_data->daerah_nama }}</td>
                                                <td>{{ $pro_data->mukim_nama }}</td>
                                                <td>{{ $pro_data->strata_nama }}</td>
                                                <td>{{ $pro_data->pekerjaan_nama }}</td>
                                                {{-- <td>{{ $pro_data->jumlah }}</td> --}}
                                                <td>{{ $pro_data->manfaat_nama }}</td>
                                            </tr>
                                        <?php $no++; ?>
                                    @endforeach
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            }else{
                if($req_program != '00' || $req_agensi != '00'){
        ?>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header text-center">
                                Tiada Data
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
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