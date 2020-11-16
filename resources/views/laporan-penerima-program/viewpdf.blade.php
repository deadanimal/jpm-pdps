<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="description" content="PMO - PDPS" />
    <meta name="keywords" content="PMO - PDPS" />
    <meta name="author" content="ThemeMascot" />

    <!-- Page Title -->
    <title>JPM - PDPS</title>
    <style>
        /* #tablestyle{
            width: 100%;
            border-collapse:collapse
        }
        #tablestyle td, #tablestyle th {
            border: 1px black;
            padding: 8px;
        } */
        table, th, td {
            border: 1px solid black;
            width: 100%;
        }
    </style>
    <link href="{{ asset('custom') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
</head>
<body>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header text-center">
                        <span class="pt-9">
                            <h3>Laporan Program Bantuan </h3>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive py-4">

                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{ __('No') }}</th>
                                        <th scope="col">{{ __('Nama Program') }}</th>
                                        <th scope="col">{{ __('Kategori') }}</th>
                                        <th scope="col">{{ __('Nama') }}</th>
                                        <th scope="col">{{ __('No Kad Pengenalan') }}</th>
                                        <th scope="col">{{ __('Jantina') }}</th>
                                        <th scope="col">{{ __('Etnik') }}</th>
                                        <th scope="col">{{ __('Agama') }}</th>
                                        <th scope="col">{{ __('Status Perkahwinan') }}</th>
                                        {{-- <th scope="col">{{ __('Status Tempat kediaman') }}</th>
                                        <th scope="col">{{ __('Jenis Tempat Kediaman') }}</th> --}}
                                        <th scope="col">{{ __('Poskod') }}</th>
                                        <th scope="col">{{ __('Negeri') }}</th>
                                        <th scope="col">{{ __('Daerah') }}</th>
                                        <th scope="col">{{ __('Mukim') }}</th>
                                        <th scope="col">{{ __('Strata') }}</th>
                                        <th scope="col">{{ __('Pekerjaan') }}</th>
                                        {{-- <th scope="col">{{ __('Jumlah Bantuan') }}</th> --}}
                                        <th scope="col">{{ __('Manfat Yang Diterima') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1; 
                                        if(!empty($laporan)){ ?>
                                            @foreach ($laporan as $pro_k => $pro_data)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $pro_data->program_nama }}</td>
                                                    <td>{{ $pro_data->nama_kategori }}</td>
                                                    <td>{{ $pro_data->profil_nama }}</td>
                                                    <td>{{ $pro_data->profil_kp }}</td>
                                                    <td>{{ $pro_data->jantina_nama }}</td>
                                                    <td>{{ $pro_data->etnik_nama }}</td>
                                                    <td>{{ $pro_data->agama_nama }}</td>
                                                    <td>{{ $pro_data->status_kahwin_nama }}</td>
                                                    <td>{{ $pro_data->profil_poskod }}</td>
                                                    <td>{{ $pro_data->negeri_nama }}</td>
                                                    <td>{{ $pro_data->daerah_nama }}</td>
                                                    <td>{{ $pro_data->mukim_nama }}</td>
                                                    <td>{{ $pro_data->strata_nama }}</td>
                                                    <td>{{ $pro_data->pekerjaan_nama }}</td>
                                                    {{-- <td>{{ $pro_data->jumlah }}</td> --}}
                                                    <td>{{ $pro_data->manfaat_nama }}</td>
                                                </tr>
                                            <?php $no++; ?>
                                        @endforeach
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>