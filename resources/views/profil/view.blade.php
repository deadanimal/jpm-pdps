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

            <li class="breadcrumb-item text-white"><a href="{{ route('profil.index') }}" class="text-white">{{ __('Program') }}</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">{{ __('View') }}</li>
        @endcomponent
    @endcomponent
    {{-- {{ ($role_id == '1' ? 'disabled':'' ) }} --}}
    <?php //dd($program_data); ?>
    <style>
        td {
            height:50px;
        }
    </style>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"> {{ ucwords($profil->program_nama) }} </h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('profil.index') }}" class="btn btn-sm btn-primary">{{ __('Kembali') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-12 col-lg-12"></div>
                                <div class="col-md-12 col-lg-12" style="overflow-x:auto;">
                                  <table
                                    class="table align-items-center table-flush table-hover text-black"
                                  >
                                    <tbody class="list">
                                      <tr>
                                        <td width="15%">Nama Program</td>
                                        <td width="35%">: {{ ucwords($profil->program_nama) }}</td>
                                        <td width="15%">Kategori</td>
                                        <td width="35%">: {{ ucwords($profil->nama_kategori) }}</td>
                                      </tr>
                                      <tr>
                                        <td>Nama</td>
                                        <td>: {{ ucwords($profil->profil_nama) }}</td>
                                        <td>No Kad Pengenalan</td>
                                        <td>: {{ ucwords($profil->profil_kp) }}</td>
                                      </tr>
                                      <tr>
                                        <td>Agensi</td>
                                        <td>: {{ ucwords($profil->agensi_nama) }}</td>
                                        <td>Etnik</td>
                                        <td>: {{ ucwords($profil->etnik_nama) }}</td>
                                      </tr>
                                      <tr>
                                        <td>Agama</td>
                                        <td>: {{ ucwords($profil->agama_nama) }}</td>
                                        <td>Status Perkahwinan</td>
                                        <td>: {{ ucwords($profil->status_kahwin_nama) }}</td>
                                      </tr>
                                      <tr>
                                        <td>Poskod</td>
                                        <td>: {{ $profil->profil_poskod }}</td>
                                        <td>Negeri</td>
                                        <td>: {{ ucwords($profil->negeri_nama) }}</td>
                                      </tr>
                                      <tr>
                                        <td>Daerah</td>
                                        <td>: {{ ucwords($profil->daerah_nama) }}</td>
                                        <td>Mukim</td>
                                        <td>: {{ ucwords($profil->mukim_nama) }}</td>
                                      </tr>
                                      <tr>
                                        <td>Strata</td>
                                        <td>: {{ ucwords($profil->strata_nama) }}</td>
                                        <td>Pekerjaan</td>
                                        <td>: {{ ucwords($profil->pekerjaan_nama) }}</td>
                                      </tr>
                                      <tr>
                                        <td>Jantina</td>
                                        <td>: {{ ucwords($profil->jantina_nama) }}</td>
                                        <td>Manfaat Yang Diterima</td>
                                        <td>: {{ ucwords($profil->manfaat_nama) }}</td>
                                      </tr>
                                      <tr>
                                        <td>Kekerapan</td>
                                        <td>: {{ ucwords($profil->kekerapan_nama) }}</td>
                                        <td>Jumlah Bantuan Yang Diterima</td>
                                        <td>: {{ $profil->jumlah_bantuan }}</td>
                                      </tr>
                                      <tr>
                                        <td>Tarikh Mula Terima Bantuan</td>
                                        <td>: {{ date('d-m-Y', strtotime($profil->tarikh_mula)) }}</td>
                                        <td>Tarikh Tamat Terima Bantuan</td>
                                        <td>: {{ date('d-m-Y', strtotime($profil->tarikh_tamat)) }}</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @include('layouts.footers.auth') --}}
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.css">
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/select2/dist/js/select2.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/quill/dist/quill.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('argon') }}/js/items.js"></script>
@endpush
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>