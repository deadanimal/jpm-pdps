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

            <li class="breadcrumb-item text-dark"><a href="{{ route('program.index') }}" class="text-dark">{{ __('Program') }}</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">{{ __('Edit') }}</li>
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
                        <form method="post" action="{{ route('program.update', $program->id) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            {{-- <h6 class="heading-small text-muted mb-4">{{ __('Tag information') }}</h6> --}}
                            <div class="pl-lg-4">

                                {{-- nama --}}

                                <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Nama Program') }}</label>
                                    <input type="text" name="nama" id="input-name" class="form-control{{ $errors->has('Nama Program') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Program') }}" value="{{ old('name', $program->nama) }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'nama'])
                                </div>

                                {{-- agensi --}}
                                <div class="form-group{{ $errors->has('agensi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Agensi') }}</label>
                                    <select type="text" id="setactive-links" class="form-control" name="agensi_id" value="{{ old('name', $program->agensi_id) }}" autofocus>
                                        <?php 
                                        foreach ($agensi as $agensi_no => $agensi_data){ 
                                            if($agensi_data->id == $program->agensi_id){
                                                echo "<option selected value='$agensi_data->id'>$agensi_data->nama</option>";
                                            }else{
                                                echo "<option value='$agensi_data->id'>$agensi_data->nama</option>";
                                            }
                                        } ?>
                                    </select>

                                    @include('alerts.feedback', ['field' => 'agensi_id'])
                                </div>
                                
                                {{-- kategori --}}
                                <div class="form-group{{ $errors->has('kategori') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Kategori') }}</label>
                                    <select type="text" id="setactive-links" class="form-control" name="kategori_id" value="{{ old('name', $program->kategori_id) }}" autofocus>
                                        <option>Sila Pilih</option>
                                        <option value="1" {{ $program->kategori_id == 1 ? 'selected' : '' }}>Kategori 1</option>
                                        <option value="2" {{ $program->kategori_id == 2 ? 'selected' : '' }}>Kategori 2</option>
                                        <option value="3" {{ $program->kategori_id == 3 ? 'selected' : '' }}>Kategori 3</option>
                                        <option value="4" {{ $program->kategori_id == 4 ? 'selected' : '' }}>Kategori 4</option>
                                    </select>

                                    @include('alerts.feedback', ['field' => 'kategori_id'])
                                </div>

                                <div class="col-md-12">
                                <?php 
                                    $no = 1;
                                    $arrno = 0;
                                    foreach($jenis_sub_kategori_opt as $jsko_key => $jsko_data){ 
                                ?>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Kategori {{ $no }}</label>
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Sub Kategori  {{ $no }}</label>
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
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Buang</label><br/>
                                                        <span class="btn btn-danger" id="buangBtn">- Buang</span>
                                                    </div>
                                                </div>
                                                <?php }else if($no == '1'){ ?>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Tambah</label><br/>
                                                        <span class="btn btn-info text-sm" id="add">+ Tambah</span>
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

                                {{-- teras --}}
                                <div class="form-group{{ $errors->has('teras') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Teras') }}</label>
                                    <select type="text" id="setactive-links" class="form-control" name="teras_id" value="{{ old('name', $program->teras_id) }}" autofocus>
                                        <option>Sila Pilih</option>
                                        <option value="1" {{ $program->teras_id == 1 ? 'selected' : '' }}>Teras 1</option>
                                        <option value="2" {{ $program->teras_id == 2 ? 'selected' : '' }}>Teras 2</option>
                                        <option value="3" {{ $program->teras_id == 3 ? 'selected' : '' }}>Teras 3</option>
                                        <option value="4" {{ $program->teras_id == 4 ? 'selected' : '' }}>Teras 4</option>
                                    </select>

                                    @include('alerts.feedback', ['field' => 'teras_id'])
                                </div>

                                {{-- tarikh mula --}}
                                <div class="form-group{{ $errors->has('tarikh_mula') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('tarikh_mula') }}</label>
                                    <input type="date" name="tarikh_mula" id="input-name" class="form-control{{ $errors->has('tarikh_mula') ? ' is-invalid' : '' }}" placeholder="{{ __('tarikh_mula') }}" value="{{ old('tarikh_mula', $program->tarikh_mula) }}" autofocus>

                                    @include('alerts.feedback', ['field' => 'tarikh_mula'])
                                </div>

                                {{-- tarikh tamat --}}
                                <div class="form-group{{ $errors->has('tarikh_tamat') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('tarikh_tamat') }}</label>
                                    <input type="date" name="tarikh_tamat" id="input-name" class="form-control{{ $errors->has('tarikh_tamat') ? ' is-invalid' : '' }}" placeholder="{{ __('tarikh_tamat') }}" value="{{ old('tarikh_tamat', $program->tarikh_tamat) }}" autofocus>

                                    @include('alerts.feedback', ['field' => 'tarikh_tamat'])
                                </div>

                                {{-- kekerapan --}}
                                <div class="form-group{{ $errors->has('kekerapan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Kekerapan') }}</label>
                                    <select name="kekerapan" id="input-name" class="form-control{{ $errors->has('kekerapan') ? ' is-invalid' : '' }}" value="{{ old('kekerapan') }}" autofocus>
                                        <option value="1" {{ $program->kekerapan == 1 ? 'selected' : '' }}>Sekali</option>
                                        <option value="2" {{ $program->kekerapan == 2 ? 'selected' : '' }}>Sebulan Sekali</option>
                                        <option value="3" {{ $program->kekerapan == 3 ? 'selected' : '' }}>Enam Bulan Sekali</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'kekerapan'])
                                </div>

                                {{-- objektif --}}
                                <div class="form-group{{ $errors->has('objektif') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Objektif') }}</label>
                                    <input type="text" name="objektif" id="input-name" class="form-control{{ $errors->has('objektif') ? ' is-invalid' : '' }}" placeholder="{{ __('Objektif') }}" value="{{ old('objektif', $program->objektif) }}" autofocus>

                                    @include('alerts.feedback', ['field' => 'objektif'])
                                </div>

                                {{-- manfaat --}}
                                <div class="form-group{{ $errors->has('manfaat') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Manfaat') }}</label>
                                    <select type="text" name="manfaat" id="input-name" class="form-control{{ $errors->has('Manfaat') ? ' is-invalid' : '' }}" placeholder="{{ __('Manfaat') }}" value="{{ old('name', $program->manfaat) }}" autofocus>
                                        <option value="1" {{ $program->manfaat == 1 ? 'selected' : '' }}>Wang</option>
                                        <option value="2" {{ $program->manfaat == 1 ? 'selected' : '' }}>Kerusi Roda</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'manfaat'])
                                </div>

                                {{-- kos --}}
                                <div class="form-group{{ $errors->has('kos') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Kos') }}</label>
                                    <input type="number" name="kos" id="input-name" class="form-control{{ $errors->has('kos') ? ' is-invalid' : '' }}" placeholder="{{ __('kos') }}" value="{{ old('kos', $program->kos) }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'kos'])
                                </div>

                                {{-- syarat program --}}
                                <div class="form-group{{ $errors->has('Syarat Program') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Syarat Program') }}</label>
                                    <textarea rows="3" type="text" name="syarat_program" id="input-name" class="form-control{{ $errors->has('syarat_program') ? ' is-invalid' : '' }}" placeholder="{{ __('Syarat Program') }}"  autofocus>{{$program->syarat_program}}</textarea>
                                    @include('alerts.feedback', ['field' => 'syarat_program'])
                                </div>

                                {{-- sebab tidak aktif --}}
                                <div class="form-group{{ $errors->has('Syarat Program') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Sebab Tidak Aktif') }}</label>
                                    <textarea rows="3" type="text" name="sebab_tidak_aktif" id="input-name" class="form-control{{ $errors->has('sebab_tidak_aktif') ? ' is-invalid' : '' }}" placeholder="{{ __('Sebab TIdak Aktif') }}"  autofocus>{{$program->sebab_tidak_aktif}}</textarea>
                                    @include('alerts.feedback', ['field' => 'sebab_tidak_aktif'])
                                </div>

                                {{-- status_pelaksanaan	 --}}
                                <?php if($role_id == '1'){ ?>
                                    <div class="form-group{{ $errors->has('status_pelaksanaan') ? ' has-danger' : '' }}">
                                        <label class="form-control-label">{{ __('Status Pelaksanaan') }}</label>
                                        <select type="text" id="setactive-links" class="form-control" name="status_pelaksanaan" value="{{ old('status_pelaksanaan', $program->status_pelaksanaan) }}" autofocus>
                                            <option value="1" {{ $program->status_pelaksanaan	 == 1 ? 'selected' : '' }}>Dihantar</option>
                                            <option value="2" {{ $program->status_pelaksanaan	 == 2 ? 'selected' : '' }}>Berjaya</option>
                                            <option value="3" {{ $program->status_pelaksanaan	 == 3 ? 'selected' : '' }}>Ditolak</option>
                                        </select>

                                        @include('alerts.feedback', ['field' => 'status_pelaksanaan'])
                                    </div>

                                    {{-- status_program	 --}}
                                    <div class="form-group{{ $errors->has('status_program') ? ' has-danger' : '' }}">
                                        <label class="form-control-label">{{ __('Status Program') }}</label>
                                        <select type="text" id="setactive-links" class="form-control" name="status_program" value="{{ old('status_program', $program->status_program) }}" autofocus>
                                            <option value="1" {{ $program->status_program	 == 1 ? 'selected' : '' }}>Aktif</option>
                                            <option value="2" {{ $program->status_program	 == 2 ? 'selected' : '' }}>Tidak Aktif</option>
                                        </select>

                                        @include('alerts.feedback', ['field' => 'status_program'])
                                    </div>
                                <?php } ?>

                                {{-- url --}}
                                <div class="form-group{{ $errors->has('url') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Agensi URL') }}</label>
                                    <input type="text" name="url" id="input-name" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" placeholder="{{ __('URL') }}" value="{{ old('url', $program->url) }}" autofocus>

                                    @include('alerts.feedback', ['field' => 'url'])
                                </div>

                                {{-- logo --}}
                                <div class="form-group{{ $errors->has('logo') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" style="padding-right: 50px" for="input-name">{{ __('Logo') }}</label>
                                    {{-- <input type="file" name="photo" id="input-name" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" placeholder="{{ __('Logo') }}" value="{{ old('logo', $program->logo) }}" autofocus> --}}
                                    <img src='/storage/{{$program->logo}}' alt='' style='max-width: 50px;height:50px;'>
                                    @include('alerts.feedback', ['field' => 'logo'])
                                </div>

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
                html += '<div class="col-md-4">';
                    html += '<div class="form-group">';
                        html += '<label class="form-control-label">Kategori '+ count +'</label>';
                        html += '<select type="text" class="form-control kategoriId" name="sub_kategori_id[]" autofocus>';
                        html += '<option selected="selected">Sila Pilih</option>';
                        
                        $.each(subkatarray, function (i, data1) {
                            html += '<option value="'+data1.id+'">'+data1.nama_sub_kategori+'</option>';
                        });
                        
                        html += '</select>';
                    html += '</div>';
                html += '</div>';
                html += '<div class="col-md-6">';
                    html += '<div class="form-group">';
                        html += '<label class="form-control-label">Sub Kategori '+ count +'</label>';
                        html += '<select name="nama_sub_kategori_id[]" class="form-control nama_sub_kat'+count+' select2 select-multiple" data-toggle="select" multiple="multiple" >';
                        html += '</select>';
                    html += '</div>';
                html += '</div>';
                html += '<div class="col-md-2">';
                    html += '<div class="form-group">';
                        html += '<label class="form-control-label">Buang</label><br/>';
                        html += '<span class="btn btn-danger" id="buangBtn">- Buang</span>';
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
    </script>