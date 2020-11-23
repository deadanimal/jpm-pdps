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
            <li class="breadcrumb-item active text-white" aria-current="page">{{ __('View') }}</li>
        @endcomponent
    @endcomponent
    {{-- {{ ($role_id == '1' ? 'disabled':'' ) }} --}}
    <?php //dd($program_data); ?>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ ucwords($program_data->nama) }}</h3>
                            </div>
                            <div class="col-4 text-right">
                              <a href="javascript:history.go(-1)" class="btn btn-sm btn-default">{{ __('Kembali') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12" id="divBsh">
                              <div class="row">
                                <div class="col-md-12 col-lg-12">
                                  <table
                                    class="table align-items-center table-flush table-hover text-black"
                                  >
                                    <tbody class="list">
                                      <tr>
                                        <td>Agensi</td>
                                      <td>: {{ ucwords($agensi->nama) }}</td>
                                      </tr>
                                      <tr>
                                        <td>Nama Program</td>
                                        <td>: {{ ucwords($program_data->nama) }}</td>
                                      </tr>
                                      <tr>
                                        <td>Kumpulan Sasaran</td>
                                        <td>: <?php foreach($kumpulansasar as $pks){
                                                echo "<span class='badge badge-info ml-1'>".$pks->ks_nama."</span>";
                                            } ?>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Kategori</td>
                                        <td>: {{ $program_data->kategori_nama }} </td>
                                      </tr>
                                      <tr>
                                        <td>Sub Kategori</td>
                                        <td>: <?php 
                                            foreach($prog_master as $pm){ 
                                                echo $pm->jenis_sub_cat_name,", ";
                                            }
                                            ?>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Objektif Program</td>
                                        <td>: {{ $program_data->objektif }} </td>
                                      </tr>
                                      <tr>
                                        <td>Kriteria/Syarat</td>
                                        <td>: {{ $program_data->syarat_program }} </td>
                                      </tr>
                                      <tr>
                                        <td>Manfaat</td>
                                        <td>: {{ $program_data->manfaat_nama }} </td>
                                      </tr>
                                      <tr>
                                        <td>Kos (RM)</td>
                                        <td>: {{ $program_data->kos == null ? '--' : $program_data->kos }}</td>
                                      </tr>
                                      <tr>
                                        <td>Kekerapan</td>
                                        <td>: {{ $program_data->kekerapan_nama }} </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" class="text-left">

                                            <a href="<?php echo (!empty($program_data->url) ?$program_data->url : '#' ) ?>" target="_blank">
                                                <?php if(!empty($program_data->logo)){ ?>
                                                   <img src='/storage/{{$program_data->logo}}' alt='' style='max-width: 70px;height:40px;'>
                                                <?php }else { ?>
                                                    <button class='btn btn-primary'>Pautan</button>
                                                <?php } ?>
                                            </a>
                                          
                                        </td>
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