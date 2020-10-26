@extends('layouts.app', [
    'parentSection' => 'Utama',
    'elementName' => 'dashboard'
])

@section('content') 
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Utama') }} 
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">{{ __('Utama') }}</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">{{ __('Utama') }}</li>
        @endcomponent
        @include('layouts.headers.cards') 
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8">
                <div class="card bg-default">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                {{-- <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6> --}}
                                <h5 class="h3 text-white mb-0">Jumlah Jualan</h5>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}'
                                        data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Bulan</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}'
                                        data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Minggu</span>
                                            <span class="d-md-none">W</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                {{-- <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6> --}}
                                <h5 class="h3 mb-0">Jumlah Jualan</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-bars" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush