

<div class="container">

        <?php if($task == 'create'){ ?>
                Kehadapan Semua, 
                <br /><br /><br />
                {{ $title }} {{ date('d-m-Y', strtotime($tarikh_pohon)) }}. Perincian :
                <br /><br />
                <table>
                        <?php if($pemohon != '-'){ ?>
                                <tr>
                                        <td style="width: 15%"></td>
                                        <td style="width: 30%"><b>Pemohon</b></td>
                                        <td style="width: 40%"><b>: {{ ucwords($pemohon) }}</b></td>
                                        <td style="width: 15%"></td>
                                </tr>
                        <?php } ?>
                        <?php if($dipohon != '-'){ ?>
                                <tr>
                                        <td style="width: 15%"></td>
                                        <td style="width: 30%"><b>Kepada</b></td>
                                        <td style="width: 40%"><b>: {{ ucwords($dipohon) }}</b></td>
                                        <td style="width: 15%"></td>
                                </tr>
                        <?php } ?>
                </table>
        <?php }else{ ?>

                Kehadapan {{ ucwords($pemohon) }}, 
                <br /><br /><br />
                Pemohonan data kepada <b>{{ ($dipohon != '-'? ucwords($dipohon):'-') }}</b> yang telah dipohon pada {{ date('d-m-Y', strtotime($tarikh_pohon)) }} telah <?php if($status=='2'){ echo 'diluluskan'; }else if($status=='3'){ echo 'ditolak'; } ?>

        <?php } ?>
        <br /><br />
        Terima Kasih.
</div>
