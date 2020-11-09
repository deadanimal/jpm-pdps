

<div class="container">

        <?php if($task == 'create'){ ?>
                Kehadapan Semua, 
                <br /><br /><br />
                {{ $title }} {{ date('d-m-Y', strtotime($tarikh_pohon)) }}. Perincian :
                <br /><br />
                <table>
                        <?php if($program != '-'){ ?>
                                <tr>
                                        <td style="width: 15%"></td>
                                        <td style="width: 30%"><b>Nama Program</b></td>
                                        <td style="width: 40%"><b>: {{ ucwords($program) }}</b></td>
                                        <td style="width: 15%"></td>
                                </tr>
                        <?php } ?>
                        <?php if($agensi != '-'){ ?>
                                <tr>
                                        <td style="width: 15%"></td>
                                        <td style="width: 30%"><b>Nama Agensi</b></td>
                                        <td style="width: 40%"><b>: {{ ucwords($agensi) }}</b></td>
                                        <td style="width: 15%"></td>
                                </tr>
                        <?php } ?>
                        <?php if($pemohon != '-'){ ?>
                                <tr>
                                        <td style="width: 15%"></td>
                                        <td style="width: 30%"><b>Nama Pemohon</b></td>
                                        <td style="width: 40%"><b>: {{ ucwords($pemohon) }}</b></td>
                                        <td style="width: 15%"></td>
                                </tr>
                        <?php } ?>
                        <?php if($mula != '-'){ ?>
                                <tr>
                                        <td style="width: 15%"></td>
                                        <td style="width: 30%"><b>Tarikh Mula</b></td>
                                        <td style="width: 40%"><b>: {{ date('d-m-Y', strtotime($mula)) }}</b></td>
                                        <td style="width: 15%"></td>
                                </tr>
                        <?php } ?>
                        <?php if($tamat != '-'){ ?>
                                <tr>
                                        <td style="width: 15%"></td>
                                        <td style="width: 30%"><b>Tarikh Tamat</b></td>
                                        <td style="width: 40%"><b>: {{ date('d-m-Y', strtotime($tamat)) }}</b></td>
                                        <td style="width: 15%"></td>
                                </tr>
                        <?php } ?>
                </table>
        <?php }else{ ?>

                Kehadapan {{ ucwords($pemohon) }}, 
                <br /><br /><br />
                Program <b>{{ ucwords($program) }}</b> yang telah dipohon pada {{ date('d-m-Y', strtotime($tarikh_pohon)) }} telah <?php if($status=='2'){ echo 'diluluskan'; }else if($status=='3'){ echo 'ditolak'; } ?>

        <?php } ?>
        <br /><br />
        Terima Kasih.
</div>
