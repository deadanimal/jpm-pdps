@extends('layouts.app', [
    'title' => __('Program'),
    'parentSection' => 'laravel',
    'elementName' => 'req-data'
])

@section('content')
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Program') }} 
            @endslot

            <li class="breadcrumb-item text-dark"><a href="{{ route('program.index') }}" class="text-dark">{{ __('Program') }}</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">{{ __('Senarai') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0 text-dark">{{ __('Senarai Program') }}</h3>
                                <p class="text-sm mb-0">
                                    <!-- {{ __('This is an example of item management. This is a minimal setup in order to get started fast.') }} -->
                                </p>
                            </div>
                            @if (auth()->user()->can('create', App\Program::class))
                                <div class="col-4 text-right">
                                    <a href="{{ route('program.create') }}" class="btn btn-sm btn-primary">{{ __('Tambah Program') }}</a>
                                </div>
                            @endif
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
                                    <th scope="col">{{ __('No') }}</th>
                                    <th scope="col">{{ __('Nama Program') }}</th>
                                    <th scope="col">{{ __('Objektif Program') }}</th>
                                    <th scope="col">{{ __('kos (RM)') }}</th>
                                    <th scope="col">{{ __('Sebab Tidak Aktif') }}</th>
                                    <th scope="col">{{ __('Kekerapan') }}</th>
                                    <th scope="col">{{ __('Status Pelaksanaan') }}</th>
                                    <th scope="col">{{ __('Status Program') }}</th>
                                    <th scope="col">{{ __('Logo') }}</th>
                                    <th scope="col">{{ __('Tarikh Rekod') }}</th>
                                    <th scope="col">{{ __('Tarikh Kemaskini') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($program as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>
                                            <?php if ($data->objektif == null) {
                                                echo 'NA';
                                            }else {
                                                echo $data->objektif;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($data->kos == null) {
                                                echo 'NA';
                                            }else {
                                                echo $data->kos;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($data->sebab_tidak_aktif == null) {
                                                echo 'NA';
                                            }else {
                                                echo $data->sebab_tidak_aktif;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php 
                                            if ($data->kekerapan == '1')
                                                { echo "Sekali"; }  
                                            else if ($data->kekerapan == '2')
                                                { echo "Sebulan Sekali"; }
                                            else if ($data->kekerapan == '3')
                                                { echo "Enam Bulan Sekali"; }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                            if ($data->status_pelaksanaan == '1')
                                                { echo "<span class='badge badge-warning'>Dihantar</span>"; }  
                                            else if ($data->status_pelaksanaan == '2')
                                                { echo "<span class='badge badge-success'>Berjaya</span>"; }
                                            else if ($data->status_pelaksanaan == '3')
                                                { echo "<span class='badge badge-danger'>Ditolak</span>"; }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                            if ($data->status_program == '1')
                                                { echo "<span class='badge badge-success'>Aktif</span>"; }  
                                            else if ($data->status_program == '2')
                                                { echo "<span class='badge badge-danger'>Tidak Aktif</span>"; }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                if ( $data->logo == null ){
                                                    echo "NA";
                                                } else {
                                                    echo "<img src='/storage/".$data->logo."' alt='' style='max-width: 50px;height:50px;'>";
                                                }
                                            ?>
                                        </td>
                                        <td>{{ date('d-m-Y', strtotime($data->tarikh_rekod)) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($data->tarikh_kemaskini)) }}</td>
                                        <td>

                                            @can('manage-items',  App\Program::class)
                                                {{-- @if (auth()->user()->can('update', $data)) --}}
                                                @if (auth()->user()->can('update', App\Program::class))
                                                    <a href="{{ route('program.edit', $data) }}" class="btn btn-success btn-sm">
                                                        <span class="btn-inner--text"><i class="fas fa-edit"></i></span>
                                                    </a>
                                                @endif

                                                {{-- <!-- @if (auth()->user()->can('delete', $program))
                                                    <form action="{{ route('program.destroy', $program) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this request?") }}') ? this.parentElement.submit() : ''">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                @endif --> --}}

                                                @if (auth()->user()->can('delete', App\Program::class))
                                                    <form action="{{ route('program.destroy', $data->id) }}" method="POST">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-danger btn-sm">
                                                            <span class="btn-inner--text"><i class="fas fa-trash"></i></span>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
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