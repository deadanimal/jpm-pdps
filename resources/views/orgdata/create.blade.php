@extends('layouts.app', [
    'title' => __('Pemohonan Data'),
    'parentSection' => 'laravel',
    'elementName' => 'req-data'
])

@section('content')
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Pemohonan Data') }} 
            @endslot

            <li class="breadcrumb-item text-white"><a href="{{ route('item.index') }}" class="text-white">{{ __('Pemohonan Data') }}</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Tambah') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Permintaan Data') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="javascript:history.go(-1)" class="btn btn-sm btn-default">{{ __('Kembali') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="item-form" action="{{ route('orgdata.store') }}" autocomplete="off" enctype="multipart/form-data" onsubmit="return confirm('Anda pasti untuk tambah Pemohonan ?');">
                            @csrf

                            {{-- <h6 class="heading-small text-muted mb-4">{{ __('Item information') }}</h6> --}}
                            <div class="pl-lg-4">

                                {{-- pemohon --}}
                                <?php if( $role_id == 1 ){ ?>
                                <div class="form-group{{ $errors->has('pemohon') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Agensi Pemohon') }} <span class="text-red">*</span></label>
                                    <select type="text" id="pemohon_id" class="form-control" name="pemohon_id" autofocus>
                                        <option selected="selected" value="0">Sila Pilih</option>
                                        @foreach ($agensi as $agensi_no => $agensi_data)
                                                <option class="form-control" value='{{$agensi_data->id}}'>{{$agensi_data->nama}}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-red" id="err_pemohon_id"></p>
                                </div>
                                <?php }else{ ?>
                                    <div class="form-group{{ $errors->has('pemohon') ? ' has-danger' : '' }}">
                                        <label class="form-control-label">{{ __('Agensi Pemohon') }} <span class="text-red">*</span></label>
                                        <select type="text" id="pemohon_id" class="form-control" disabled autofocus>
                                            @foreach ($agensi as $agensi_no => $agensi_data)
                                                <?php if($agensi_data->id == $agensi_id){ ?>
                                                    <option class="form-control" value='{{$agensi_data->id}}'>{{$agensi_data->nama}}</option>
                                                    <input type="hidden" name="pemohon_id" value="{{$agensi_data->id}}">
                                                <?php } ?>
                                            @endforeach
                                        </select>
                                        
                                        <p class="text-red" id="err_pemohon_id"></p>
                                    </div>
                                <?php } ?>

                                {{-- agensi --}}
                                <div class="form-group{{ $errors->has('agensi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Pemohonan data kepada agensi') }} <span class="text-red">*</span></label>
                                    
                                    <select type="text" id="agensi_id" class="form-control" name="agensi_id" autofocus>
                                        <option selected="selected" value="0">Sila Pilih</option>
                                        @foreach ($agensi as $agensi_no => $agensi_data)
                                                <option class="form-control" value='{{$agensi_data->id}}'>{{$agensi_data->nama}}</option>
                                        @endforeach
                                    </select>
                                    
                                    {{-- </select> --}}
                                    <p class="text-red" id="err_agensi_id"></p>
                                </div>

                                {{-- program --}}
                                <div class="form-group{{ $errors->has('program') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Program') }} <span class="text-red">*</span></label>
                                    <select type="text" id="program_id" class="form-control" name="program_id" autofocus>
                                        <option selected="selected" value="0">Sila Pilih</option>
                                        @foreach ($program as $program_no => $program_data)
                                            <option value='{{$program_data->id}}'>{{$program_data->nama}}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-red" id="err_program_id"></p>

                                    @include('alerts.feedback', ['field' => 'program_id'])
                                </div>

                                <div class="form-group{{ $errors->has('subjek') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Subjek') }} <span class="text-red">*</span></label>
                                    <input type="text" name="subjek" id="subjek" class="form-control{{ $errors->has('subjek') ? ' is-invalid' : '' }}" placeholder="{{ __('Subjek') }}" value="{{ old('subjek') }}" required autofocus />
                                    <p class="text-red" id="err_subjek"></p>
                                    @include('alerts.feedback', ['field' => 'subjek'])
                                </div>

                                <div class="text-center">
                                    <button type="submit" onclick="return orgdataValidationEvent()" class="btn btn-success mt-4">{{ __('Simpan') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
    <script>
        $(document).ready(function() {
            $("#pemohon_id").change(function () {
                console.log( $(this).val() );
                if($(this).val() != '0'){
                    $("#err_pemohon_id").hide();
                }else{
                    $("#err_pemohon_id").show();
                }
            });
            $("#agensi_id").change(function () {
                console.log( $(this).val() );
                if($(this).val() != '0'){
                    $("#err_agensi_id").hide();
                }else{
                    $("#err_agensi_id").show();
                }
            });
            $("#program_id").change(function () {
                console.log( $(this).val() );
                if($(this).val() != '0'){
                    $("#err_program_id").hide();
                }else{
                    $("#err_program_id").show();
                }
            });
            $("#subjek").change(function () {
                console.log( $(this).val() );
                if($(this).val() != ''){
                    $("#err_subjek").hide();
                }else{
                    $("#err_subjek").show();
                }
            });
        });
    </script>
    <script>
        // Below Function Executes On Form Submit
        function orgdataValidationEvent() {
            // Storing Field Values In Variables
            var pemohon_id = document.getElementById("pemohon_id").value;
            var agensi_id = document.getElementById("agensi_id").value;
            var program_id = document.getElementById("program_id").value;
            var subjek = document.getElementById("subjek").value;
            
            // Conditions

            if (pemohon_id == '0') {
                text = "Sila pilih agensi";
                document.getElementById("err_pemohon_id").innerHTML = text;
                return false;
            }

            if (agensi_id == '0') {
                text = "Sila pilih agensi";
                document.getElementById("err_agensi_id").innerHTML = text;
                return false;
            }
        
            if (program_id == '0') {
                text = "Sila pilih program";
                document.getElementById("err_program_id").innerHTML = text;
                return false;
            }

            if (subjek == '') {
                text = "Sila isi subjek";
                document.getElementById("err_subjek").innerHTML = text;
                return false;
            }
            
            return true
            // return false;
            // else {
                // alert("All fields are required.....!");
            // }
            
        }
    </script>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.css">
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/select2/dist/js/select2.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/quill/dist/quill.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('argon') }}/js/items.js"></script>
@endpush