@extends('layouts.app', [
    'title' => __('Banner & Berita'),
    'parentSection' => 'laravel',
    'elementName' => 'req-publish'
])

@section('content')
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Banner & Berita') }} 
            @endslot

            <li class="breadcrumb-item text-dark"><a href="{{ route('media.index') }}" class="text-dark">{{ __('Banner & Berita') }}</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">{{ __('Baru') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Banner & Berita') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('media.index') }}" class="btn btn-sm btn-primary">{{ __('Kembali') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="item-form" action="{{ route('media.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            {{-- <h6 class="heading-small text-muted mb-4">{{ __('Item information') }}</h6> --}}
                            <div class="pl-lg-4">

                                {{-- agensi --}}
                                <div class="form-group{{ $errors->has('agensi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Agensi') }}</label>
                                    <select disabled type="text" id="setactive-links" class="form-control" name="agensi_id" autofocus>
                                        <?php 
                                        foreach ($agensi as $agensi_no => $agensi_data){ 
                                            if($agensi_data->id == $agensi_id){
                                                echo "<option selected value='$agensi_data->id'>$agensi_data->nama</option>";
                                            }else{
                                                echo "<option value='$agensi_data->id'>$agensi_data->nama</option>";
                                            }
                                        } ?>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'agensi_id'])
                                </div>

                                {{-- jenis --}}
                                <div  class="form-group{{ $errors->has('jenis') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Jenis Pemohonan') }}</label>
                                    <select class="form-control jenisMedia" name="jenis" required autofocus>
                                        <option selected="selected" value="1">Berita</option>
                                        <option value="2">Banner</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'jenis'])
                                </div>

                                {{-- program --}}
                                <div class="programList form-group{{ $errors->has('program') ? ' has-danger' : '' }}" style="display: none">
                                    <label class="form-control-label">{{ __('Program') }}</label>
                                    <select type="text" id="setactive-links" class="form-control" name="program_id" required autofocus>
                                        @foreach ($program as $program_no => $program_data)
                                            <option value='{{$program_data->id}}'>{{$program_data->nama}}</option>
                                        @endforeach
                                    </select>

                                    @include('alerts.feedback', ['field' => 'agensi_id'])
                                </div>

                                {{-- tajuk --}}
                                <div class="berita-tajuk form-group{{ $errors->has('tajuk') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Tajuk') }}</label>
                                    <input type="text" name="tajuk" id="input-name" class="form-control{{ $errors->has('tajuk') ? ' is-invalid' : '' }}" placeholder="{{ __('Tajuk') }}" value="{{ old('tajuk') }}" autofocus>

                                    @include('alerts.feedback', ['field' => 'tajuk'])
                                </div>

                                {{-- keterangan --}}
                                <div class="berita-keterangan form-group{{ $errors->has('keterangan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Keterangan') }}</label>
                                    <textarea type="text" name="keterangan" id="input-name" class="form-control{{ $errors->has('Keterangan') ? ' is-invalid' : '' }}" placeholder="{{ __('Keterangan') }}" value="{{ old('keterangan') }}" autofocus></textarea>
                                    @include('alerts.feedback', ['field' => 'keterangan'])
                                </div>

                                {{-- tarikh_mula --}}
                                <div class="form-group{{ $errors->has('tarikh_mula') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Tarikh Mula') }}</label>
                                    <input type="date" name="tarikh_mula" id="input-name" class="form-control{{ $errors->has('tarikh_mula') ? ' is-invalid' : '' }}" placeholder="{{ __('Tarikh Mula') }}" value="{{ old('tarikh_mula') }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'tarikh_mula'])
                                </div>

                                {{-- tarikh_tamat --}}
                                <div class="form-group{{ $errors->has('tarikh_tamat') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Tarikh Tamat') }}</label>
                                    <input type="date" name="tarikh_tamat" id="input-name" class="form-control{{ $errors->has('tarikh_tamat') ? ' is-invalid' : '' }}" placeholder="{{ __('Tarikh Tamat') }}" value="{{ old('tarikh_tamat') }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'tarikh_tamat'])
                                </div>

                                {{-- gambar --}}
                                <div style="display: none" class="gambar-banner form-group{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Gambar') }}</label>
                                    <input type="file" name="photo" class="form-control{{ $errors->has('gambar') ? ' is-invalid' : '' }}" id="input-picture" accept="image/*" />
                                    @include('alerts.feedback', ['field' => 'photo'])
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Simpan') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/quill/dist/quill.core.css">
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/select2/dist/js/select2.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/quill/dist/quill.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('argon') }}/js/items.js"></script>
@endpush
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {  
        // $('#jenisMedia').on('change', function() {
        //     alert( this.value );
        // });
      $(".jenisMedia").change(function () {
        console.log( $(".jenisMedia").val() );
        if ( $(".jenisMedia").val() == "1" ) {
          $(".berita-tajuk").show();
          $(".berita-keterangan").show();
          $(".gambar-banner").hide();
          $(".programList").hide();
        } else if ( $(".jenisMedia").val() == "2" ) {
          $(".berita-tajuk").hide();
          $(".berita-keterangan").hide();
          $(".gambar-banner").show();
          $(".programList").show();
        }
      });
    });
  </script>