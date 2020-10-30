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

            <li class="breadcrumb-item text-dark"><a href="{{ route('media.index') }}" class="text-dark">{{ __('Banner & Berita') }}</a></li>
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
                    
                    <div class="col-12 mt-2">
                        @include('alerts.success')
                        @include('alerts.errors')
                    </div>



                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush"  id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('No') }}</th>
                                    <th scope="col">{{ __('Jenis Pemohonan') }}</th>
                                    <th scope="col">{{ __('Program') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('Tajuk')}}</th>
                                    <th scope="col">{{ __('Keterangan')}}</th>
                                    <th scope="col">{{ __('Gambar')}}</th>
                                    <th scope="col">{{ __('Tarikh Mula') }}</th>
                                    <th scope="col">{{ __('Tarikh Tamat') }}</th>
                                    <th scope="col">{{ __('Rekod Oleh') }}</th>
                                    <th scope="col">{{ __('Tarikh Rekod') }}</th>
                                    {{-- <th scope="col">{{ __('Kemaskini Oleh') }}</th>
                                    <th scope="col">{{ __('Tarikh Kemaskini') }}</th> --}}
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($medias as $media)
                                
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>
                                            <?php 
                                                if ( $media->jenis == '1' ){
                                                    echo "Berita";
                                                } else {
                                                    echo "Banner";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                if ( $media->program_name == null ){
                                                    echo "NA";
                                                } else {
                                                    echo $media->program_name;
                                                }
                                            ?>
                                        </td>
                                        <td> 
                                            <?php 
                                            if($media->status == '1'){
                                                echo '<span class="badge badge-info">Dihantar</span>';
                                            } else if ($media->status == '2'){
                                                echo '<span class="badge badge-success">Berjaya</span>';
                                            }  else if ($media->status == '3'){
                                                echo '<span class="badge badge-danger">Ditolak</span>';
                                            } 
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                if ( $media->tajuk == null ){
                                                    echo "NA";
                                                } else {
                                                    echo $media->tajuk;
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                if ( $media->keterangan == null ){
                                                    echo "NA";
                                                } else {
                                                    echo $media->keterangan;
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            
                                            <?php 
                                                if ( $media->gambar == null ){
                                                    echo "NA";
                                                } else {
                                                    echo "<img src='/storage/".$media->gambar."' alt='' style='max-width: 50px;'>";
                                                }
                                            ?>
                                        </td>
                                        <td>{{ date('d-m-Y', strtotime($media->tarikh_mula)) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($media->tarikh_tamat)) }}</td>
                                        <td>{{ $media->user_name }}</td>
                                        <td>{{ date('d-m-Y', strtotime($media->created_at)) }}</td>
                                        {{-- <td>{{ $media->updated_by }}</td>
                                        <td>{{ date('d-m-Y', strtotime($media->updated_at)) }}</td> --}}
                                        <td>
                                            <a href="{{ route('media.edit', $media->id) }}" class="btn btn-success btn-sm">
                                                <span class="btn-inner--text"><i class="fas fa-edit"></i></span>
                                            </a>
                                            @if (auth()->user()->can('delete', App\Media::class))
                                                <form action="{{ route('media.destroy', $media->id) }}" method="POST">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-danger btn-sm">
                                                        <span class="btn-inner--text"><i class="fas fa-trash"></i></span>
                                                    </button>
                                                </form>
                                            @endif
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