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
                                        <th scope="col" rowspan="2">{{ __('No') }}</th>
                                        <th scope="col" rowspan="2">{{ __('Nama Program') }}</th>
                                        <th scope="col" rowspan="2">{{ __('Teras') }}</th>
                                        <th scope="col" rowspan="2">{{ __('Kategori') }}</th>
                                        <th scope="col" rowspan="2">{{ __('Kumpulan Sasaran') }}</th>
                                        <th scope="col" rowspan="2">{{ __('Sub Kategori') }}</th>
                                        <th scope="col" rowspan="2">{{ __('Kekerapan') }}</th>
                                        <th scope="col" colspan="2">{{ __('Jumlah Penerima Semasa') }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Aktif</th>
                                        <th>Tidak Aktif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1; 
                                        if(!empty($laporan)){ ?>
                                            @foreach ($laporan as $pro_k => $pro_data)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $pro_data['nama'] }}</td>
                                                    <td>{{ $pro_data['teras'] }}</td>
                                                    <td>{{ $pro_data['kategori'] }}</td>
                                                    <td>{{ $pro_data['kump_sasar'] }}</td>
                                                    <td>{{ $pro_data['sub_kategori'] }}</td>
                                                    <td>{{ $pro_data['kakerapan'] }}</td>
                                                    <td>{{ $pro_data['jumlah_aktif'] }}</td>
                                                    <td>{{ $pro_data['jumlah_tidak_aktif'] }}</td>
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