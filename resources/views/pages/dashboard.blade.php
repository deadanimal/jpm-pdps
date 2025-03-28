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

            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">{{ __('Utama') }}</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Utama') }}</li>
        @endcomponent
        {{-- @include('layouts.headers.cards')  --}}
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col"></div>
            <div class="col-xl-4 col-md-4 col-sm-6">
                <a href="{{ route('program.index') }}">
                    <div class="card" style="cursor: pointer;">
                        <div class="card-body text-center">
                            <img src="{{ asset('custom') }}/images/graphic2/g1.png" width="70%" height="80px" alt="" />
                        </div>
                        <div class="card-footer text-center header-dark">
                            <div class="text-black">Program</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col"></div>
            <div class="col-xl-4 col-md-4 col-sm-6">
                <a href="{{ route('media.index') }}">
                    <div class="card" style="cursor: pointer;">
                        <div class="card-body text-center">
                            <img src="{{ asset('custom') }}/images/graphic2/g2.png" width="70%" height="80px" alt="" />
                        </div>
                        <div class="card-footer text-center">
                            <div class="text-black">Banner & Berita Semasa</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-xl-4 col-md-4 col-sm-6">
                <a href="{{ route('profil.index') }}">
                    <div class="card" style="cursor: pointer;">
                        <div class="card-body text-center">
                            <img src="{{ asset('custom') }}/images/graphic2/g3.png" width="70%" height="80px" alt="" />
                        </div>
                        <div class="card-footer text-center header-dark">
                            <div class="text-black">Carian Profil Individu</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col"></div>
            <div class="col-xl-4 col-md-4 col-sm-6">
                <a href="{{ route('user.index') }}">
                    <div class="card" style="cursor: pointer;">
                        <div class="card-body text-center">
                            <img src="{{ asset('custom') }}/images/graphic2/g4.png" width="70%" height="80px" alt="" />
                        </div>
                        <div class="card-footer text-center">
                            <div class="text-black">Pengurusan Penguna</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-xl-4 col-md-4 col-sm-6">
                <a href="{{ route('laporan.index') }}">
                    <div class="card" style="cursor: pointer;">
                        <div class="card-body text-center">
                            <img src="{{ asset('custom') }}/images/graphic2/g5.png" width="70%" height="80px" alt="" />
                        </div>
                        <div class="card-footer text-center header-dark">
                            <div class="text-black">Laporan</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col"></div>
            <div class="col-xl-4 col-md-4 col-sm-6">
                <a href="{{ route('orgdata.index') }}">
                    <div class="card" style="cursor: pointer;">
                        <div class="card-body text-center">
                            <img src="{{ asset('custom') }}/images/graphic2/g6.png" width="70%" height="80px" alt="" />
                        </div>
                        <div class="card-footer text-center">
                            <div class="text-black">Pemohonan Data</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col"></div>
        </div>
        <!-- Footer -->
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush