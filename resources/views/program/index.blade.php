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
            <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Senarai') }}</li>
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
                    <div class="card-body">
                        <form method="get" class="item-form" action="{{ route('program.index') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ __('Program') }}</label>
                                        <input type="text" class="form-control" name="program" autofocus>
                                
                                        @include('alerts.feedback', ['field' => 'program'])
                                    </div>
                                </div>
                                {{-- <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ __('Program') }}</label>
                                        <select type="text" id="setactive-links" class="form-control" name="program" autofocus>
                                            <option selected value="00">Sila Pilih</option>
                                            @foreach ($programList as $program_no => $program_data)
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
                                </div> --}}
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-info">{{ __('Cari') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php $no = 1; ?>
            @foreach ($program as $data)
            <div class="row mt-20">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Nama Program :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>{{ ucwords($data->nama) }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Kategori :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>{{ ucwords($data->nama_kategori) }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Manfaat :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>{{ ucwords($data->nama_manfaat) }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-control-label" for="input-name">Kekerapan :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>{{ ucwords($data->nama_kekerapan) }}</span>
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
                                        <span>:{{ date('d-m-Y', strtotime($data->tarikh_rekod)) }}</span>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="input-name">Status Pelaksanaan</label>
                                    </div>
                                    <div class="col-md-6">
                                        <?php 
                                        // if ($data->status_pelaksanaan_id == '1')
                                        //     { echo "<span class='badge badge-success'>Aktif</span>"; }  
                                        // else if ($data->status_pelaksanaan_id == '2')
                                        //     { echo "<span class='badge badge-danger'>Tidak Aktif</span>"; }
                                        ?>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="input-name">Status Program</label>
                                    </div>
                                    <div class="col-md-6">
                                        <?php 
                                        if ($data->status_program_id == '1')
                                            { echo "<span class='badge badge-warning'>Dihantar</span>"; }  
                                        else if ($data->status_program_id == '2')
                                            { echo "<span class='badge badge-success'>Berjaya</span>"; }
                                        else if ($data->status_program_id == '3')
                                            { echo "<span class='badge badge-danger'>Ditolak</span>"; }
                                        ?>
                                    </div>
                                </div>
                            {{-- </div> --}}
                            {{-- <div class="form-group"> --}}
                                <div class="row pt-15">
                                    <div class="col-md-6 text-right">
                                        @if (auth()->user()->can('update', App\Program::class))
                                            <a href="{{ route('program.edit', $data->id) }}" class="btn btn-success btn-sm">
                                                <span class="btn-inner--text"><i class="fas fa-edit"></i></span>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="col-md-6 text-left">
                                        @if (auth()->user()->can('delete', App\Program::class))
                                            <form action="{{ route('program.destroy', $data->id) }}" method="POST">
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
                    {{ $program->links() }}
                </div>
            </div>


            {{-- <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->nama }}</td>
                <td>
                    <?php 
                    // if ($data->kos == null) {
                    //     echo 'NA';
                    // }else {
                    //     echo $data->kos;
                    // } 
                    ?>
                </td>
                <td>
                    <?php 
                    // if ($data->sebab_tidak_aktif == null) {
                    //     echo 'NA';
                    // }else {
                    //     echo $data->sebab_tidak_aktif;
                    // } 
                    ?>
                </td>
                <td>{{$data->nama_kekerapan}}</td>
                <td>{{$data->nama_manfaat}}</td>
                <td>
                    <?php 
                    // if ($data->status_pelaksanaan_id == '1')
                    //     { echo "<span class='badge badge-success'>Aktif</span>"; }  
                    // else if ($data->status_pelaksanaan_id == '2')
                    //     { echo "<span class='badge badge-danger'>Tidak Aktif</span>"; }
                    ?>
                </td>
                <td>
                    <?php 
                    // if ($data->status_program_id == '1')
                    //     { echo "<span class='badge badge-warning'>Dihantar</span>"; }  
                    // else if ($data->status_program_id == '2')
                    //     { echo "<span class='badge badge-success'>Berjaya</span>"; }
                    // else if ($data->status_program_id == '3')
                    //     { echo "<span class='badge badge-danger'>Ditolak</span>"; }
                    ?>
                </td>
                <td>
                    <?php 
                        // if ( $data->logo == null ){
                        //     echo "NA";
                        // } else {
                        //     echo "<img src='/storage/".$data->logo."' alt='' style='max-width: 50px;height:50px;'>";
                        // }
                    ?>
                </td>
                <td>{{ date('d-m-Y', strtotime($data->tarikh_rekod)) }}</td>
                <td>{{ date('d-m-Y', strtotime($data->tarikh_kemaskini)) }}</td>
                <td>

                    @can('manage-items',  App\Program::class)
                        @if (auth()->user()->can('update', App\Program::class))
                            <a href="{{ route('program.edit', $data->id) }}" class="btn btn-success btn-sm">
                                <span class="btn-inner--text"><i class="fas fa-edit"></i></span>
                            </a>
                        @endif

                        <!-- @if (auth()->user()->can('delete', $program))
                            <form action="{{ route('program.destroy', $program) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this request?") }}') ? this.parentElement.submit() : ''">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        @endif -->

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
            </tr> --}}


        
            
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