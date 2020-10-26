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

            <li class="breadcrumb-item text-dark"><a href="{{ route('item.index') }}" class="text-dark">{{ __('Pemohonan Data') }}</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">{{ __('Kemaskini') }}</li>
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
                        <form method="post" action="{{ route('orgdata.update', $orgdata->id) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            {{-- <h6 class="heading-small text-muted mb-4">{{ __('Tag information') }}</h6> --}}
                            <div class="pl-lg-4">

                                {{-- agensi --}}
                                <div class="form-group{{ $errors->has('agensi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Pemohonan data kepada agensi') }}</label>
                                    <select {{ ($role_id == '1' ? 'disabled':'' ) }} type="text" id="setactive-links" class="form-control" name="agensi_id" value="{{ old('agensi_id', $orgdata->agensi_id) }}" autofocus>
                                        <?php 
                                        foreach ($agensi as $agensi_no => $agensi_data){ 
                                            if($agensi_data->id == $orgdata->agensi_id){
                                                echo "<option selected value='$agensi_data->id'>$agensi_data->nama</option>";
                                            }else{
                                                echo "<option value='$agensi_data->id'>$agensi_data->nama</option>";
                                            }
                                        } ?>
                                    </select>

                                    @include('alerts.feedback', ['field' => 'agensi_id'])
                                </div>

                                {{-- program --}}
                                <div class="form-group{{ $errors->has('program') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Program') }}</label>
                                    <select {{ ($role_id == '1' ? 'disabled':'' ) }} type="text" id="setactive-links" class="form-control" name="program_id" value="{{ old('program_id', $orgdata->program_id) }}" autofocus>
                                        <?php 
                                        foreach ($program as $program_no => $program_data){ 
                                            if($program_data->id == $orgdata->program_id){
                                                echo "<option selected value='$program_data->id'>$program_data->nama</option>";
                                            }else{
                                                echo "<option value='$program_data->id'>$program_data->nama</option>";
                                            }
                                        } ?>
                                    </select>

                                    @include('alerts.feedback', ['field' => 'program_id'])
                                </div>

                                <div class="form-group{{ $errors->has('subjek') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Subjek') }}</label>
                                    <input {{ ($role_id == '1' ? 'disabled':'' ) }} type="text" name="subjek" class="form-control{{ $errors->has('subjek') ? ' is-invalid' : '' }}" placeholder="{{ __('Subjek') }}" value="{{ old('subjek', $orgdata->subjek) }}" autofocus />
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
                                <?php } ?>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
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