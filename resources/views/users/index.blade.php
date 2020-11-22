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
                <div class="card">
                    <div class="card-header">
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

                    <div class="col-12 mt-2">
                        @include('alerts.success')
                        @include('alerts.errors')
                    </div>

                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush"  id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Photo</th>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('Role') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    @can('manage-users', App\User::class)
                                        <th scope="col"></th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <span class="avatar avatar-sm rounded-circle">
                                                <?php if($user->picture!=NULL){ ?>
                                                    <img src="/storage/{{$user->picture}}" alt="" style="max-width: 100px; border-radiu: 25px">
                                                <?php }else{ ?>
                                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ6N4vGCUaa3tOlRA98UJZEpDAIqB_OyjhwJg&usqp=CAU" alt="" style="max-width: 100px; border-radiu: 25px">
                                                <?php } ?>
                                            </span>
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </td>
                                        <td>{{ $user->role_name }}</td>
                                        <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                                        @can('manage-users', App\User::class)
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <div class="row">
                                                        <div class="col">
                                                            <a class="btn btn-success btn-sm" href="{{ route('user.edit', $user->id) }}">
                                                                <span class="btn-inner--text"><i class="fas fa-edit"></i></span>
                                                            </a>
                                                        </div>
                                                        @can('manage-users-admin', App\User::class)
                                                            <div class="col">
                                                                <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirm('{{ __("Padam penguna ?") }}') ? this.parentElement.submit() : ''">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </td>
                                        @endcan
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
