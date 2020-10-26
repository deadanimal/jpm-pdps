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
                                <h3 class="mb-0">{{ __('Sila Isikan maklumat Program') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('program.index') }}" class="btn btn-sm btn-primary">{{ __('Kembali Ke Senarai') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <form method="post" class="item-form" action="{{ route('program.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            {{-- <h6 class="heading-small text-muted mb-4">{{ __('Item information') }}</h6> --}}
                            <div class="pl-lg-4">

                                {{-- nama --}}
                                <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Nama Program') }}</label>
                                    <input type="text" name="nama" id="input-name" class="form-control{{ $errors->has('Nama Program') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Program') }}" value="{{ old('nama') }}" autofocus>

                                    @include('alerts.feedback', ['field' => 'nama'])
                                </div>

                                {{-- agensi --}}
                                <div class="form-group{{ $errors->has('agensi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Agensi') }}</label>
                                    <select type="text" id="setactive-links" class="form-control" name="agensi_id" autofocus>
                                        <option selected="selected">Sila Pilih</option>
                                        @foreach ($agensi as $agensi_no => $agensi_data)
                                            <option value='{{$agensi_data->id}}'>{{$agensi_data->nama}}</option>
                                        @endforeach
                                    </select>

                                    @include('alerts.feedback', ['field' => 'agensi_id'])
                                </div>
                                
                                {{-- kategori --}}
                                <div class="form-group{{ $errors->has('kategori') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Kategori') }}</label>
                                    <select type="text" id="setactive-links" class="form-control" name="kategori_id" autofocus>
                                        <option selected="selected">Sila Pilih</option>
                                            @foreach ($kat as $katid => $kdata)
                                                <option value='{{$kdata->id}}'>{{$kdata->nama_kategori}}</option>
                                            @endforeach
                                    </select>

                                    @include('alerts.feedback', ['field' => 'kategori_id'])
                                </div>

                                {{-- sub kategori --}}
                                <div class="form-group" id="dynamic_sub_kat_que">
                                    
                                </div>

                                {{-- teras --}}
                                <div class="form-group{{ $errors->has('teras') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Teras') }}</label>
                                    <select type="text" id="setactive-links" class="form-control" name="teras_id" autofocus>
                                        <option selected="selected">Sila Pilih</option>
                                        <option value="1">Teras 1</option>
                                        <option value="2">Teras 2</option>
                                        <option value="3">Teras 3</option>
                                        <option value="4">Teras 4</option>
                                    </select>

                                    @include('alerts.feedback', ['field' => 'teras_id'])
                                </div>

                                {{-- tarikh mula --}}
                                <div class="form-group{{ $errors->has('tarikh_mula') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Tarikh Mula') }}</label>
                                    <input type="date" name="tarikh_mula" id="input-name" class="form-control{{ $errors->has('tarikh_mula') ? ' is-invalid' : '' }}" placeholder="{{ __('tarikh_mula') }}" value="{{ old('tarikh_mula') }}" autofocus>

                                    @include('alerts.feedback', ['field' => 'tarikh_mula'])
                                </div>

                                {{-- tarikh tamat --}}
                                <div class="form-group{{ $errors->has('tarikh_tamat') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Tarikh Tamat') }}</label>
                                    <input type="date" name="tarikh_tamat" id="input-name" class="form-control{{ $errors->has('tarikh_tamat') ? ' is-invalid' : '' }}" placeholder="{{ __('tarikh_tamat') }}" value="{{ old('tarikh_tamat') }}" autofocus>

                                    @include('alerts.feedback', ['field' => 'tarikh_tamat'])
                                </div>

                                {{-- kekerapan --}}
                                <div class="form-group{{ $errors->has('kekerapan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Kekerapan') }}</label>
                                    <select name="kekerapan" id="input-name" class="form-control{{ $errors->has('kekerapan') ? ' is-invalid' : '' }}" value="{{ old('kekerapan') }}" autofocus>
                                        <option value="1">Sekali</option>
                                        <option value="2">Sebulan Sekali</option>
                                        <option value="3">Enam Bulan Sekali</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'kekerapan'])
                                </div>

                                {{-- objektif --}}
                                <div class="form-group{{ $errors->has('objektif') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Objektif') }}</label>
                                    <input type="text" name="objektif" id="input-name" class="form-control{{ $errors->has('objektif') ? ' is-invalid' : '' }}" placeholder="{{ __('Objektif') }}" value="{{ old('objektif') }}" autofocus>

                                    @include('alerts.feedback', ['field' => 'objektif'])
                                </div>

                                {{-- manfaat --}}
                                <div class="form-group{{ $errors->has('manfaat') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Manfaat') }}</label>
                                    <select name="manfaat" id="manfaatval" class="form-control{{ $errors->has('Kumpulan Sasaran') ? ' is-invalid' : '' }}" value="{{ old('manfaat') }}" autofocus>
                                        <option value="1">Wang</option>
                                        <option value="2">Kerusi Roda</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'manfaat'])
                                </div>

                                {{-- kos --}}
                                <div id="kosval" class="form-group{{ $errors->has('kos') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Kos') }}</label>
                                    <input type="number" value="0" name="kos" id="input-name" class="form-control{{ $errors->has('kos') ? ' is-invalid' : '' }}" placeholder="{{ __('kos') }}" value="{{ old('kos') }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'kos'])
                                </div>

                                {{-- syarat program --}}
                                <div class="form-group{{ $errors->has('Syarat Program') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Syarat Program') }}</label>
                                    <textarea rows="3" type="text" name="syarat_program" id="input-name" class="form-control{{ $errors->has('syarat_program') ? ' is-invalid' : '' }}" placeholder="{{ __('Syarat Program') }}" value="{{ old('syarat_program') }}" autofocus></textarea>
                                    @include('alerts.feedback', ['field' => 'syarat_program'])
                                </div>

                                {{-- url --}}
                                <div class="form-group{{ $errors->has('url') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Agensi URL') }}</label>
                                    <input type="text" name="url" id="input-name" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" placeholder="{{ __('URL') }}" value="{{ old('url') }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'url'])
                                </div>

                                {{-- logo --}}
                                <div class="form-group{{ $errors->has('logo') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Logo') }}</label>
                                    <input type="file" name="photo" id="input-name" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" placeholder="{{ __('Logo') }}" value="{{ old('logo') }}" autofocus>
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
            if(number > 1)
            {
                html += '<div class="form-group">';
                html += '<label class="form-control-label">Buang</label><br/>';
                html += '<span class="btn btn-danger" id="buangBtn">- Buang</span>';
                html += '</div>';
                html += '</div></div>';
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
            else
            {   
                html += '<div class="form-group">';
                html += '<label class="form-control-label">Tambah</label><br/>';
                html += '<span class="btn btn-info text-sm" id="add">+ Tambah</span>';
                html += '</div>';
                html += '</div></div>';
                $('#dynamic_sub_kat_que').html(html);
                $('.select-multiple').select2();
                $(".kategoriId").change(function () {
                    var kat_id = $(this).val();
                    console.log(kat_id);
                });
            }
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