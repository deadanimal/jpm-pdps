

<div class="container">

        <?php if($task == 'create'){ ?>
                Kehadapan {{ ucwords($nama) }}, 
                <br /><br /><br />
                {{ $title }}
                <br /><br />
                <table>
                        <tr>
                                <td style="width: 15%"></td>
                                <td style="width: 30%"><b>ID Penguna</b></td>
                                <td style="width: 55%"><b>: {{ $login_id }}</b></td>
                        </tr>
                        <tr>
                                <td style="width: 15%"></td>
                                <td style="width: 30%"><b>Kata Laluan</b></td>
                                <td style="width: 55%"><b>: {{ $login_katalaluan }}</b></td>
                        </tr>
                </table>

        <?php } ?>
        <br /><br />
        Terima Kasih.
</div>
