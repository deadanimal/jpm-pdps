@extends('layouts.app', [
    'title' => __('Program'),
    'parentSection' => 'laravel',
    'elementName' => 'req-data'
])

@section('content')
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Program') }} 
            @endslot

            <li class="breadcrumb-item text-white"><a href="{{ route('program.index') }}" class="text-white">{{ __('Program') }}</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Edit') }}</li>
        @endcomponent
    @endcomponent
    {{-- {{ ($role_id == '1' ? 'disabled':'' ) }} --}}
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Sila Penuhkan Maklumat') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('program.index') }}" class="btn btn-sm btn-primary">{{ __('Kembali') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" name="myform" action="{{ route('program.update', $program->id) }}" autocomplete="off"  onsubmit="return confirm('Kemaskini Program ?');">
                            @csrf
                            @method('put')

                            {{-- <h6 class="heading-small text-muted mb-4">{{ __('Tag information') }}</h6> --}}
                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col">
                                        {{-- agensi --}}
                                        <div class="form-group{{ $errors->has('agensi') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('Agensi') }} <span class="text-red">*</span></label>
                                                @foreach ($agensi as $agensi_no => $agensi_data)
                                                    <?php 
                                                    if($agensi_data->id == $program->agensi_id){
                                                        $agensiname = $agensi_data->nama;
                                                    } ?>
                                                @endforeach
                                                <input disabled type="text" id="agensi_id" name="agensi_id" class="form-control" value="{{$agensiname}}" autofocus>
                                                <input type="hidden" name="agensi_id" value="{{$program->agensi_id}}" autofocus>
                                                <p class="text-red" id="err_agensi_id"></p>

                                            @include('alerts.feedback', ['field' => 'agensi_id'])
                                        </div>
                                    </div>
                                    <div class="col">
                                        {{-- nama --}}
                                        <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Nama Program') }} <span class="text-red">*</span></label>
                                            <input type="text" name="nama" id="nama" class="form-control{{ $errors->has('Nama Program') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Program') }}" value="{{ old('name', $program->nama) }}" autofocus>
                                            <p class="text-red" id="err_nama"></p>
                                            @include('alerts.feedback', ['field' => 'nama'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                
                                        {{-- kategori --}}
                                        <div class="form-group{{ $errors->has('kategori') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('Kategori') }} <span class="text-red">*</span></label>
                                            <select type="text" id="kategori_id" class="form-control" name="kategori_id" required autofocus>
                                                <option selected="selected" value="0">Sila Pilih</option>
                                                    @foreach ($kat as $katid => $kdata)
                                                        <?php if($program->kategori_id == $kdata->id){ ?>
                                                            <option selected value='{{$kdata->id}}'>{{$kdata->nama_kategori}}</option>
                                                        <?php }else{ ?>
                                                            <option value='{{$kdata->id}}'>{{$kdata->nama_kategori}}</option>
                                                        <?php } ?>
                                                    @endforeach
                                            </select>
                                            <p class="text-red" id="err_kategori_id"></p>
                                            @include('alerts.feedback', ['field' => 'kategori_id'])
                                        </div>
                                    </div>
                                    <div class="col">
                                        {{-- teras --}}
                                        <div class="form-group{{ $errors->has('teras') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('Teras') }} <span class="text-red">*</span></label>
                                            <select type="text" id="teras_id" class="form-control" name="teras_id" value="{{ old('name', $program->teras_id) }}" required autofocus>
                                                <option selected="selected" value="0">Sila Pilih</option>
                                                @foreach ($teras as $teras_k => $teras_val)
                                                    <option value="{{$teras_val->id}}" {{ $teras_val->id == $program->teras_id ? 'selected' : '' }}>{{$teras_val->nama}}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-red" id="err_teras_id"></p>
        
                                            @include('alerts.feedback', ['field' => 'teras_id'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                    <?php 
                                        $no = 1;
                                        $arrno = 0;
                                        foreach($jenis_sub_kategori_opt as $jsko_key => $jsko_data){ 
                                    ?>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Sub Kategori <span class="text-red">*</span></label>
                                                        <select type="text" class="form-control kategoriId" name="sub_kategori_id[]" autofocus>
                                                            <?php foreach($subkat as $sk_key => $sk_data ){
                                                                if($sk_data->id == $jsko_key){
                                                                    echo '<option selected value="'.$sk_data->id.'">'.$sk_data->nama_sub_kategori.'</option>';
                                                                }else{
                                                                    echo '<option value="'.$sk_data->id.'">'.$sk_data->nama_sub_kategori.'</option>';
                                                                }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Sub Kategori <span class="text-red">*</span></label>
                                                        <select name="nama_sub_kategori_id[]" class="form-control nama_sub_kat select2 select-multiple" data-toggle="select" multiple="multiple" >
                                                            <?php 
                                                            foreach($jenissubkat as $jsk_key => $jsk_data ){
                                                                if($jsk_data->sub_kategori_id == $jsko_key){
                                                                    if(in_array($jsk_data->id, $jsko_data)){
                                                                        echo '<option selected value="'.$jsko_key.'_'.$jsk_data->id.'">'.$jsk_data->nama_jenis_sub_kategori.'</option>';
                                                                    }else{
                                                                        echo '<option value="'.$jsk_data->sub_kategori_id.'_'.$jsk_data->id.'">'.$jsk_data->nama_jenis_sub_kategori.'</option>';
                                                                    }
                                                                }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?php // if($role_id != '1'){ ?>
                                                    <?php if($no != '1'){ ?>
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <span class="btn btn-danger mt-4" style="font-size:1.3em" id="buangBtn"> - </span>
                                                        </div>
                                                    </div>
                                                    <?php }else if($no == '1'){ ?>
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <span class="btn btn-info mt-4" style="font-size:1.3em" id="add"> + </span>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                <?php // } ?>
                                            </div>
                                        <?php $no++; } ?>
                                        <?php // if($role_id != '1'){ ?>
                                            <div id="dynamic_sub_kat_que">
                                            </div>
                                        <?php // } ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        {{-- Kumpulan sasar --}}
                                        <div class="form-group{{ $errors->has('kumpulan sasar') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('Kumpulan Sasar') }} <span class="text-red">*</span></label>
                                                <br />
                                                @foreach ($kumpulansasar as $ks_k => $ks_data)
                                                    <?php if(in_array($ks_data->id,$pks)){ ?>
                                                        <input checked name="ks_id[]" id="ks_id" class="pr-10" type="checkbox" value='{{$ks_data->id}}' />{{$ks_data->nama}}<br />
                                                    <?php }else{ ?>
                                                        <input name="ks_id[]" id="ks_id" class="pr-10" type="checkbox" value='{{$ks_data->id}}' />{{$ks_data->nama}}<br />
                                                    <?php } ?>
                                                @endforeach
                                                <p class="text-red" id="err_ks_id"></p>
        
                                            @include('alerts.feedback', ['field' => 'agensi_id'])
                                        </div>
                                    </div>
                                    <div class="col">
                                        {{-- kekerapan --}}
                                        <div class="form-group{{ $errors->has('kekerapan') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Kekerapan') }} <span class="text-red">*</span></label>
                                            <select name="kekerapan_id" id="kekerapan_id" class="form-control{{ $errors->has('kekerapan') ? ' is-invalid' : '' }}" value="{{ old('kekerapan_id') }}" required autofocus>
                                                <option selected="selected" value="0">Sila Pilih</option>
                                                @foreach ($kekerapan as $kekerapan_k => $kekerapan_val)
                                                    <option value="{{$kekerapan_val->id}}" {{ $kekerapan_val->id == $program->kekerapan_id ? 'selected' : '' }}>{{$kekerapan_val->nama}}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-red" id="err_kekerapan_id"></p>
                                            @include('alerts.feedback', ['field' => 'kekerapan_id'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        {{-- tarikh mula --}}
                                        <div class="form-group{{ $errors->has('tarikh_mula') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('tarikh_mula') }} <span class="text-red">*</span></label>
                                            <input type="date" name="tarikh_mula" id="tarikh_mula" class="form-control{{ $errors->has('tarikh_mula') ? ' is-invalid' : '' }}" placeholder="{{ __('tarikh_mula') }}" value="{{ old('tarikh_mula', $program->tarikh_mula) }}" autofocus>
                                            <p class="text-red" id="err_tarikh_mula"></p>
                                            @include('alerts.feedback', ['field' => 'tarikh_mula'])
                                        </div>
                                    </div>
                                    <div class="col">
                                        {{-- tarikh tamat --}}
                                        <div class="form-group{{ $errors->has('tarikh_tamat') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('tarikh_tamat') }} <span class="text-red">*</span></label>
                                            <input type="date" name="tarikh_tamat" id="tarikh_tamat" class="form-control{{ $errors->has('tarikh_tamat') ? ' is-invalid' : '' }}" placeholder="{{ __('tarikh_tamat') }}" value="{{ old('tarikh_tamat', $program->tarikh_tamat) }}" autofocus>
                                            <p class="text-red" id="err_tarikh_tamat"></p>
                                            @include('alerts.feedback', ['field' => 'tarikh_tamat'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        {{-- manfaat --}}
                                        <div class="form-group{{ $errors->has('manfaat') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Manfaat') }} <span class="text-red">*</span></label>
                                            <select type="text" name="manfaat_id" id="manfaatval" class="form-control{{ $errors->has('Manfaat') ? ' is-invalid' : '' }}" placeholder="{{ __('Manfaat') }}" value="{{ old('name', $program->manfaat_id) }}" autofocus>
                                                <option selected="selected" value="0">Sila Pilih</option>
                                                @foreach ($manfaat as $manfaat_k => $manfaat_val)
                                                    <?php if($program->manfaat_id == $manfaat_val->id){ ?>
                                                    <option selected value="{{$manfaat_val->id}}" {{ $manfaat_val->id == $program->kekerapan_id ? 'selected' : '' }}>{{$manfaat_val->nama}}</option>
                                                    <?php }else{ ?>
                                                        <option value="{{$manfaat_val->id}}" {{ $manfaat_val->id == $program->kekerapan_id ? 'selected' : '' }}>{{$manfaat_val->nama}}</option>
                                                    <?php } ?>
                                                @endforeach
                                            </select>
                                            <p class="text-red" id="err_manfaat_id"></p>
                                            @include('alerts.feedback', ['field' => 'manfaat_id'])
                                        </div>
                                    </div>
                                    <?php  if($program->manfaat_id == '1'){
                                            $divsp = 'block';
                                        } else {
                                            $divsp = 'none';
                                        }
                                    ?>
                                    <div class="col-md-6" style="display: {{ $divsp }}" id="kosval">
                                        {{-- kos --}}
                                        <div class="form-group{{ $errors->has('kos') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Kos') }}</label>
                                            <input type="number" name="kos" id="kos" class="form-control{{ $errors->has('kos') ? ' is-invalid' : '' }}" placeholder="{{ __('kos') }}" value="{{ old('kos', $program->kos) }}" autofocus>
                                            <p class="text-red" id="err_kos"></p>
                                            @include('alerts.feedback', ['field' => 'kos'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        {{-- objektif --}}
                                        <div class="form-group{{ $errors->has('objektif') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Objektif') }} <span class="text-red">*</span></label>
                                            <textarea type="text" id="objektif" name="objektif"  class="form-control{{ $errors->has('objektif') ? ' is-invalid' : '' }}" placeholder="{{ __('Objektif') }}" value="{{ old('objektif', $program->objektif) }}" autofocus>{{ $program->objektif }}</textarea>
                                            <p class="text-red" id="err_objektif"></p>
                                            @include('alerts.feedback', ['field' => 'objektif'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        {{-- syarat program --}}
                                        <div class="form-group{{ $errors->has('Syarat Program') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Syarat Program') }} <span class="text-red">*</span></label>
                                            <textarea rows="3" type="text" name="syarat_program" id="syarat_program" class="form-control{{ $errors->has('syarat_program') ? ' is-invalid' : '' }}" placeholder="{{ __('Syarat Program') }}"  autofocus>{{$program->syarat_program}}</textarea>
                                            <p class="text-red" id="err_syarat_program"></p>
                                            @include('alerts.feedback', ['field' => 'syarat_program'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        {{-- status_pelaksanaan	 --}}
                                        <div class="form-group{{ $errors->has('status_pelaksanaan') ? ' has-danger' : '' }}">
                                            <label class="form-control-label">{{ __('Status Pelaksanaan') }} <span class="text-red">*</span></label>
                                            <select type="text" id="statuspelaksanaan" class="form-control" name="status_pelaksanaan_id" value="{{ old('status_pelaksanaan_id', $program->status_pelaksanaan_id) }}" autofocus>
                                                <option value="1" {{ $program->status_pelaksanaan_id	 == 1 ? 'selected' : '' }}>Aktif</option>
                                                <option value="2" {{ $program->status_pelaksanaan_id	 == 2 ? 'selected' : '' }}>Tidak Aktif</option>
                                            </select>
                                            <p class="text-red" id="err_statuspelaksanaan"></p>
                                            @include('alerts.feedback', ['field' => 'status_pelaksanaan'])
                                        </div>
                                    </div>
                                    <?php if($role_id == '1'){ ?>
                                        <div class="col-md-6">
                                            {{-- status_program	 --}}
                                            <div class="form-group{{ $errors->has('status_program') ? ' has-danger' : '' }}">
                                                <label class="form-control-label">{{ __('Status Program') }} <span class="text-red">*</span></label>
                                                <select type="text" id="setactive-links" class="form-control" name="status_program_id" value="{{ old('status_program_id', $program->status_program_id) }}" autofocus>
                                                    <option value="1" {{ $program->status_program_id	 == 1 ? 'selected' : '' }}>Dihantar</option>
                                                    <option value="2" {{ $program->status_program_id	 == 2 ? 'selected' : '' }}>Berjaya</option>
                                                    <option value="3" {{ $program->status_program_id	 == 3 ? 'selected' : '' }}>Ditolak</option>
                                                </select>
                                                @include('alerts.feedback', ['field' => 'status_program'])
                                            </div>
                                        </div>
                                    <?php } ?>
                                            {{-- sebab tidak aktif --}}
                                            <?php if($program->status_pelaksanaan_id == 1){
                                                $div = 'none';
                                            } else {
                                                $div = 'block';
                                            }
                                            ?>
                                        <div class="col-md-6" style="display: {{$div}}" id="sebabxaktif">
                                            <div class="form-group{{ $errors->has('Syarat Program') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{$program->status_pelaksanaan}}{{ __('Sebab Tidak Aktif') }} <span class="text-red">*</span></label>
                                                <textarea rows="3" type="text" name="sebab_tidak_aktif" id="sebab_tidak_aktif" class="form-control{{ $errors->has('sebab_tidak_aktif') ? ' is-invalid' : '' }}" placeholder="{{ __('Sebab TIdak Aktif') }}"  autofocus>{{$program->sebab_tidak_aktif}}</textarea>
                                                <p class="text-red" id="err_sebab_tidak_aktif"></p>
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                        {{-- url --}}
                                        <div class="form-group{{ $errors->has('url') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Agensi URL') }} <span class="text-red">*</span></label>
                                            <input type="text" name="url" id="url" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" placeholder="{{ __('URL') }}" value="{{ old('url', $program->url) }}" autofocus>
                                            <p class="text-red" id="err_url"></p>
                                            @include('alerts.feedback', ['field' => 'url'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        {{-- logo --}}
                                        <div class="form-group{{ $errors->has('logo') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" style="padding-right: 50px" for="input-name">{{ __('Logo') }}</label>
                                            {{-- <input type="file" name="photo" id="input-name" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" placeholder="{{ __('Logo') }}" value="{{ old('logo', $program->logo) }}" autofocus> --}}
                                            <img src='/storage/{{$program->logo}}' alt='' style='max-width: 50px;height:50px;'>
                                            @include('alerts.feedback', ['field' => 'logo'])
                                        </div>
                                    </div>

                                </div>

                                <div class="text-center">
                                    <button class="btn btn-default" onclick="return programValidationEvent()">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Below Function Executes On Form Submit
            function programValidationEvent() {
                // Storing Field Values In Variables
                // var agensi_id = document.getElementById("agensi_id").value;
                var nama = document.getElementById("nama").value;
                var kategori_id = document.getElementById("kategori_id").value;
                var teras_id = document.getElementById("teras_id").value;
                var tarikh_mula = document.getElementById("tarikh_mula").value;
                var tarikh_tamat = document.getElementById("tarikh_tamat").value;
                var kekerapan_id = document.getElementById("kekerapan_id").value;
                var manfaatval = document.getElementById("manfaatval").value;
                var objektif = document.getElementById("objektif").value;
                var syarat_program = document.getElementById("syarat_program").value;
                var statuspelaksanaan = document.getElementById("statuspelaksanaan").value;
                var url = document.getElementById("url").value;
                var sebab_tidak_aktif = document.getElementById("sebab_tidak_aktif").value;
                
                // // check if it is banner/berita
                if(nama == ''){
                    text = "Sila isi program";
                    document.getElementById("err_nama").innerHTML = text;
                    return false;
                }
    
                if (kategori_id == '0') {
                    text = "Sila pilih kategori";
                    document.getElementById("err_kategori_id").innerHTML = text;
                    return false;
                }
    
                if (teras_id == '0') {
                    text = "Sila pilih teras";
                    document.getElementById("err_teras_id").innerHTML = text;
                    return false;
                }
    
                // // check for sub kategori
                // // console.log(document.myform["sub_kategori_id[]"]);
                // if(sub_kategori_id == '0'){
                //     text = "Sila pilih Sub Kategori";
                //     document.getElementById("err_sub_kategori_id").innerHTML = text;
                //     return false;
                // }
                // // check for sub kategori
                // // check for kump sasar
                var flag = 0;
                for (var i = 0; i<= 3; i++) {
                    if(document.myform["ks_id[]"][i].checked){
                        flag ++;
                    }
                }
                if (flag == 0) {
                    text = "Sila pilih kumpulan sasar";
                    document.getElementById("err_ks_id").innerHTML = text;
                    return false;
                }
                // // check for kump sasar
    
                if (tarikh_mula == '') {
                    text = "Sila isi tarikh mula";
                    document.getElementById("err_tarikh_mula").innerHTML = text;
                    return false;
                }
    
                if (tarikh_tamat == '') {
                    text = "Sila isi tarikh tamat";
                    document.getElementById("err_tarikh_tamat").innerHTML = text;
                    return false;
                }
    
                if (kekerapan_id == '0') {
                    text = "Sila pilih kekerapan";
                    document.getElementById("err_kekerapan_id").innerHTML = text;
                    return false;
                }
    
                if (manfaatval == '0') {
                    text = "Sila pilih manfaat";
                    document.getElementById("err_manfaat_id").innerHTML = text;
                    return false;
                }
    
                if (manfaatval == '1') {
                    var kos = document.getElementById("kos").value;
                    if (kos == '0' || kos == '') {
                        text = "Sila isi kos";
                        document.getElementById("err_kos").innerHTML = text;
                        return false;
                    }
                }
    
                if (objektif == '') {
                    text = "Sila isi objektif";
                    document.getElementById("err_objektif").innerHTML = text;
                    return false;
                }
    
                if (syarat_program == '') {
                    text = "Sila isi syarat program";
                    document.getElementById("err_syarat_program").innerHTML = text;
                    return false;
                }
    
                if (statuspelaksanaan == '0') {
                    text = "Sila isi status pelaksanaan";
                    document.getElementById("err_statuspelaksanaan").innerHTML = text;
                    return false;
                }
    
                if (statuspelaksanaan == '2') {
                     var sebab_tidak_aktif = document.getElementById("sebab_tidak_aktif").value;
                    if (sebab_tidak_aktif == '') {
                        text = "Sila isi sebab tidak aktif";
                        document.getElementById("err_sebab_tidak_aktif").innerHTML = text;
                        return false;
                    }
                }
    
                if (url == '') {
                    text = "Sila isi url";
                    document.getElementById("err_url").innerHTML = text;
                    return false;
                }
                
                return true;
                // return false;
                // else {
                    // alert("All fields are required.....!");
                    // return false;
                // }
                
            }
        </script>
        
        
        {{-- @include('layouts.footers.auth') --}}
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        @if (session('alert'))
            swal("{{ session('alert') }}");
        @endif
    </script>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.css">
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/select2/dist/js/select2.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/quill/dist/quill.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('argon') }}/js/items.js"></script>
@endpush
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script>
    $(document).ready(function(){

        var subkatarray = <?php echo json_encode($subkat); ?>;
        var jenissubkatarray = <?php echo json_encode($jenissubkat); ?>;
    
        var count = 1;

        dynamic_field(count);
        $(".kategoriId").change(function () {
            var kat_id = $(this).val();
            window.value = kat_id;
            console.log(kat_id);
            console.log("atas");

            $('.sub_id'+count).remove();

            var jenissubkatarray = <?php echo json_encode($jenissubkat); ?>;

            $.each(jenissubkatarray, function (i, data2) {
                console.log(kat_id, data2.sub_kategori_id);
                if(kat_id == data2.sub_kategori_id){
                    html2 = '<option class="sub_id'+count+'" value="'+kat_id+'_'+data2.id+'">'+data2.nama_jenis_sub_kategori+'</option>';
                    $('.nama_sub_kat'+count).append(html2);
                }
            });
        });

        function dynamic_field(number)
        {
            html = '<div class="row">';
                html += '<div class="col-md-6">';
                    html += '<div class="form-group">';
                        html += '<label class="form-control-label">Sub Kategori</label>';
                        html += '<select type="text" class="form-control kategoriId" name="sub_kategori_id[]" autofocus>';
                        html += '<option selected="selected">Sila Pilih</option>';
                        
                        $.each(subkatarray, function (i, data1) {
                            html += '<option value="'+data1.id+'">'+data1.nama_sub_kategori+'</option>';
                        });
                        
                        html += '</select>';
                    html += '</div>';
                html += '</div>';
                html += '<div class="col-md-5">';
                    html += '<div class="form-group">';
                        html += '<label class="form-control-label">Sub Kategori</label>';
                        html += '<select name="nama_sub_kategori_id[]" class="form-control nama_sub_kat'+count+' select2 select-multiple" data-toggle="select" multiple="multiple" >';
                        html += '</select>';
                    html += '</div>';
                html += '</div>';
                html += '<div class="col-md-1">';
                    html += '<div class="form-group">';
                        html += '<span class="btn btn-danger mt-4" style="font-size:1.3em" id="buangBtn"> - </span>';
                    html += '</div>';
                html += '</div>';
            html += '</div>';
            
            $('#dynamic_sub_kat_que').append(html);
            $('.select-multiple').select2();

            $(".kategoriId").change(function () {
                var kat_id = $(this).val();
                window.value = kat_id;
                console.log(kat_id);
                console.log("atas");

                $('.sub_id'+count).remove();

                var jenissubkatarray = <?php echo json_encode($jenissubkat); ?>;

                $.each(jenissubkatarray, function (i, data2) {
                    console.log(kat_id, data2.sub_kategori_id);
                    if(kat_id == data2.sub_kategori_id){
                        html2 = '<option class="sub_id'+count+'" value="'+kat_id+'_'+data2.id+'">'+data2.nama_jenis_sub_kategori+'</option>';
                        $('.nama_sub_kat'+count).append(html2);
                    }
                });
            });

        }
        
        $(document).on('click', '#add', function(){
        $('.select-multiple').select2();
        count++;
        // console.log(count);
        dynamic_field(count);
        });
        
        $(document).on('click', '#buangBtn', function(){
        count--;
        $(this).closest(".row").remove();
        });
    });

    $(document).ready(function() {
        $("#manfaatval").change(function () {
            console.log( $(this).val() );
            if($(this).val() == '2'){
                $("#kosval").hide();
            }else{
                $("#kosval").show();
            }
        });
    });
    $(document).ready(function() {
        $("#statuspelaksanaan").change(function () {
            console.log( $(this).val() );
            if($(this).val() == '2'){
                $("#sebabxaktif").show();
            }else{
                $("#sebabxaktif").hide();
            }
        });
    });
    </script>