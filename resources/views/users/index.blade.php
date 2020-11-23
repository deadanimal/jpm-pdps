@extends('layouts.app', [
    'title' => __('User Management'),
    'parentSection' => 'laravel',
    'elementName' => 'user-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Examples') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('user.index') }}" class="text-dark">{{ __('User Management') }}</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">{{ __('List') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Senarai Penguna') }}</h3>
                            </div>
                            @can('manage-users', App\User::class)
                                <div class="col-4 text-right">
                                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Tambah Penguna') }}</a>
                                </div>
                            @endcan
                        </div>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <?php $no = 1; ?>
                @foreach ($users as $user)
                <div class="row mt-20">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-control-label" for="input-name">Nama Penguna</label>
                                        </div>
                                        <div class="col-md-8">
                                            <span>: {{ ucwords($user->name) }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-control-label" for="input-name">Email</label>
                                        </div>
                                        <div class="col-md-8">
                                            <span>: <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-control-label" for="input-name">Peranan</label>
                                        </div>
                                        <div class="col-md-8">
                                            <span>: {{ $user->role_name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                    {{-- <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-control-label" for="input-name">Gambar Profil </label>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <span class="avatar avatar-sm rounded-circle">
                                                <?php // if($user->picture!=NULL){ ?>
                                                    <img src="/storage/{{$user->picture}}" alt="" style="max-width: 100px; border-radius: 100px">
                                                <?php // }else{ ?>
                                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ6N4vGCUaa3tOlRA98UJZEpDAIqB_OyjhwJg&usqp=CAU" alt="" style="max-width: 100px; border-radiu: 25px">
                                                <?php // } ?>
                                            </span>
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-control-label" for="input-name">Tarikh Dicipta </label>
                                        </div>
                                        <div class="col-md-6">
                                            <span>: {{ date('d-m-Y', strtotime($user->created_at)) }}</span>
                                        </div>
                                    </div>
                                    <div class="row pt-15">
                                        <div class="col-md-12 text-center">
                                            <div class="row">
                                                {{-- <div class="col">
                                                    <a href="{{ route('program.show', $user->id) }}" class="btn btn-info btn-sm">
                                                        <span class="btn-inner--text"><i class="fas fa-eye fa-2x"></i></span>
                                                    </a>
                                                </div> --}}
                                                @if (auth()->user()->can('update', App\Program::class))
                                                    <div class="col">
                                                        <a class="btn btn-success btn-sm" href="{{ route('user.edit', $user->id) }}">
                                                            <span class="btn-inner--text"><i class="fas fa-edit fa-2x"></i></span>
                                                        </a>
                                                    </div>
                                                @endif
                                                @can('manage-users-admin', App\User::class)
                                                    <div class="col">
                                                        <div class="col">
                                                            <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="button" class="btn btn-danger btn-sm" onclick="confirm('{{ __("Padam penguna ?") }}') ? this.parentElement.submit() : ''">
                                                                    <i class="fas fa-trash fa-2x"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="row text-right">
                    <div class="col text-right">
                        {{ $users->links() }}
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
