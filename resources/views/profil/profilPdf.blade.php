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
                            <h3>Laporan Profil </h3>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive py-4">
                            <table class="table align-items-center table-flush" style="border-collapse:collapse;border:1px black;" id="tablestyle" bordered id="datatable-basic">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{ __('No') }}</th>
                                        <th scope="col">{{ __('Nama Program') }}</th>
                                        <th scope="col">{{ __('Agensi') }}</th>
                                        <th scope="col">{{ __('Nilai') }}</th>
                                        <th scope="col">{{ __('Kekerapan') }}</th>
                                        <th scope="col">{{ __('Tarikh Terima') }}</th>
                                        <th scope="col">{{ __('Tarikh Tamat') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1; 
                                        if(!empty($profil)){ ?>
                                            @foreach ($profil as $pro_k => $pro_data)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $pro_data->program_nama }}</td>
                                                    <td>{{ $pro_data->agensi_nama }}</td>
                                                    <td>{{ $pro_data->jumlah }}</td>
                                                    <td>{{ $pro_data->kekerapan_nama }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($pro_data->tarikh_mula)) }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($pro_data->tarikh_tamat)) }}</td>
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