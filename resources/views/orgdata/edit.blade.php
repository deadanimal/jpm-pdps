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
            <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Kemaskini') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Kemaskini Pemohonan Data') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('orgdata.index') }}" class="btn btn-sm btn-primary">{{ __('Kembali') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('orgdata.update', $orgdata->id) }}" autocomplete="off" onsubmit="return confirm('Kemaskini Pemohonan Data ?');">
                            @csrf
                            @method('put')

                            {{-- <h6 class="heading-small text-muted mb-4">{{ __('Tag information') }}</h6> --}}
                            <div class="pl-lg-4">

                                {{-- agensi --}}
                                <div class="form-group{{ $errors->has('agensi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Pemohonan data kepada agensi') }}</label>
                                    <?php if($role_id == '1'){ ?>
                                    <select  disabled type="text" id="agensi_id" class="form-control" name="agensi_id" value="{{ old('agensi_id', $orgdata->agensi_id) }}" autofocus>
                                        <?php 
                                        foreach ($agensi as $agensi_no => $agensi_data){ 
                                            if($agensi_data->id == $orgdata->agensi_id){
                                                echo "<option selected value='$agensi_data->id'>$agensi_data->nama</option>";
                                            }else{
                                                echo "<option value='$agensi_data->id'>$agensi_data->nama</option>";
                                            }
                                        } ?>
                                    </select>
                                    <input type="hidden" value="{{$orgdata->agensi_id}}" name="agensi_id" />
                                    <?php }else{ ?>
                                        <select type="text" id="agensi_id" class="form-control" name="agensi_id" value="{{ old('agensi_id', $orgdata->agensi_id) }}" autofocus>
                                            <?php 
                                            foreach ($agensi as $agensi_no => $agensi_data){ 
                                                if($agensi_data->id == $orgdata->agensi_id){
                                                    echo "<option selected value='$agensi_data->id'>$agensi_data->nama</option>";
                                                }else{
                                                    echo "<option value='$agensi_data->id'>$agensi_data->nama</option>";
                                                }
                                            } ?>
                                        </select>
                                    <?php } ?>
                                    <p class="text-red" id="err_agensi_id"></p>
                                    @include('alerts.feedback', ['field' => 'agensi_id'])
                                </div>

                                {{-- program --}}
                                <div class="form-group{{ $errors->has('program') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Program') }}</label>
                                    <select {{ ($role_id == '1' ? 'disabled':'' ) }} type="text" id="program_id" class="form-control" name="program_id" value="{{ old('program_id', $orgdata->program_id) }}" autofocus>
                                        <?php 
                                        foreach ($program as $program_no => $program_data){ 
                                            if($program_data->id == $orgdata->program_id){
                                                echo "<option selected value='$program_data->id'>$program_data->nama</option>";
                                            }else{
                                                echo "<option value='$program_data->id'>$program_data->nama</option>";
                                            }
                                        } ?>
                                    </select>
                                    <p class="text-red" id="err_program_id"></p>

                                    @include('alerts.feedback', ['field' => 'program_id'])
                                </div>

                                <div class="form-group{{ $errors->has('subjek') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Subjek') }}</label>
                                    <input {{ ($role_id == '1' ? 'disabled':'' ) }} id="subjek" type="text" name="subjek" class="form-control{{ $errors->has('subjek') ? ' is-invalid' : '' }}" placeholder="{{ __('Subjek') }}" value="{{ old('subjek', $orgdata->subjek) }}" autofocus />
                                    <p class="text-red" id="err_subjek"></p>
                                    @include('alerts.feedback', ['field' => 'subjek'])
                                </div>

                                {{-- status	 --}}
                                <?php if($role_id == '1'){ ?>
                                    <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                        <label class="form-control-label">{{ __('Status') }}</label>
                                        <select type="text" id="setactive-links" class="form-control" name="status" value="{{ old('status', $orgdata->status) }}" autofocus>
                                            <option value="1" {{ $orgdata->status	 == 1 ? 'selected' : '' }}>Dihantar</option>
                                            <option value="2" {{ $orgdata->status	 == 2 ? 'selected' : '' }}>Berjaya</option>
                                            <option value="3" {{ $orgdata->status	 == 3 ? 'selected' : '' }}>Ditolak</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'status'])
                                    </div>
                                <?php }else{ ?>
                                    <input type="hidden" name="status" value="{{ old('status', $orgdata->status) }}" />
                                <?php } ?>

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
        // Below Function Executes On Form Submit
        function orgdataValidationEvent() {
            // Storing Field Values In Variables
            var agensi_id = document.getElementById("agensi_id").value;
            var program_id = document.getElementById("program_id").value;
            var subjek = document.getElementById("subjek").value;
            
            // Conditions

            if (agensi_id == '0') {
                text = "Sila pilih agensi";
                document.getElementById("err_orgdata_agensi_id").innerHTML = text;
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
    <script>
        (function($) {
        "use strict";
    
        $(function() {
            $('[data-toggle="sweet-alert"]').on("click", function() {
                var type = $(this).data("sweet-alert");
    
                switch (type) {
                    case "basic":
                        swal({
                            title: "Here's a message!",
                            text: "A few words about this sweet alert ...",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-primary"
                        });
                        break;
    
                    case "info":
                        swal({
                            title: "Info",
                            text: "A few words about this sweet alert ...",
                            type: "info",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-info"
                        });
                        break;
    
                    case "info":
                        swal({
                            title: "Info",
                            text: "A few words about this sweet alert ...",
                            type: "info",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-info"
                        });
                        break;
    
                    case "success":
                        swal({
                            title: "Berjaya",
                            text: "Pemohonan Berjaya DiKemaskini",
                            type: "success",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-success"
                        });
                        break;
    
                    case "warning":
                        swal({
                            title: "Warning",
                            text: "A few words about this sweet alert ...",
                            type: "warning",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-warning"
                        });
                        break;
    
                    case "question":
                        swal({
                            title: "Are you sure?",
                            text: "A few words about this sweet alert ...",
                            type: "question",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-default"
                        });
                        break;
    
                    case "confirm":
                        swal({
                            title: "Are you sure?",
                            text: "You won't be able to revert this!",
                            type: "warning",
                            showCancelButton: true,
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-danger",
                            confirmButtonText: "Yes, delete it!",
                            cancelButtonClass: "btn btn-secondary"
                        }).then(result => {
                            if (result.value) {
                                // Show confirmation
                                swal({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    type: "success",
                                    buttonsStyling: false,
                                    confirmButtonClass: "btn btn-primary"
                                });
                            }
                        });
                        break;
    
                    case "image":
                        swal({
                            title: "Sweet",
                            text: "Modal with a custom image ...",
                            imageUrl: "../../assets/img/ill/ill-1.svg",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-primary",
                            confirmButtonText: "Super!"
                        });
                        break;
    
                    case "timer":
                        swal({
                            title: "Auto close alert!",
                            text: "I will close in 2 seconds.",
                            timer: 2000,
                            showConfirmButton: false
                        });
                        break;
                }
            });
        });
    })(jQuery);
    </script>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.css">
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
@endpush