@extends('layouts.app', [
    'title' => __('Laporan Management'),
    'parentSection' => 'laravel',
    'elementName' => 'laporan'
])

@section('content')
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Cari Laporan') }} 
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('laporan.program_bantuan') }}" class="">{{ __('Laporan') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Cari') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    {{-- <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Laporan') }}</h3>
                            </div>
                        </div>
                    </div> --}}
                    <div class="card-body">

                        <form method="get" class="item-form" action="{{ route('laporan.program_bantuan') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label class="form-control-label">Laporan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" name="nama" placeholder="Masukkan Nama Pemohon" type="text">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-info mt-4">{{ __('Cari') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h3 class="mb-0">{{ __('Laporan') }}</h3>
                            </div>
                            <div class="col-md-4 text-right">
                                <?php if(!empty($laporan)){ ?>
                                    <button class="btn btn-default">{{ __('Export') }}</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 mt-2">
                        @include('alerts.success')
                        @include('alerts.errors')
                    </div>

                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush"  id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Nama') }}</th>
                                    <th scope="col">{{ __('Category') }}</th>
                                    <th scope="col">{{ __('Picture') }}</th>
                                    <th scope="col">{{ __('Tags') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    {{-- @can('manage-items', App\User::class) --}}
                                        <th scope="col"></th>
                                    {{-- @endcan --}}
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1; 
                                    if(!empty($laporan)){ ?>
                                @foreach ($laporan as $pro_k => $pro_data)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $pro_data->nama }}</td>
                                        <td>{{ date('d-m-Y', strtotime($pro_data->created_at)) }}</td>
                                        {{-- @can('manage-items', App\User::class)
                                            <td class="text-right">
                                                @if (auth()->user()->can('update', $pro) || auth()->user()->can('delete', $pro))
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            @can('update', $pro)
                                                                <a class="dropdown-item" href="{{ route('pro.edit', $pro) }}">{{ __('Edit') }}</a>
                                                            @endcan
                                                            @can('delete', $pro)
                                                                <form action="{{ route('pro.destroy', $pro) }}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this item?") }}') ? this.parentElement.submit() : ''">
                                                                            {{ __('Delete') }}
                                                                    </button>
                                                                </form>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        @endcan --}}
                                    </tr>
                                @endforeach
                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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