<?php 
    date_default_timezone_set('Asia/Jakarta');
    $tgl=date('Y');
    $tgl1=date('d');
    $tgl2=date('F');
?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Laporan Hasil Diagnosis</title>
            <style>
            body{
                font-family: Verdana;
                font-size: 13px;
            }
            h1{
                font-size: 14px;
                border-bottom: 4px double #000;
                padding:3px 0;
            }
            table{
                border-collapse: collapse;   
                margin-bottom: 10px; 
                padding: 10px;
            }
            td, th{
                
            }
            .wrapper{
                margin: 0 auto;
                width: 980px;
            }
            </style>
        </head>
        <body>
        <div class="row">
            <div class="wrapper">
                <table align="center" border="0" cellspacing="0" cellspacing="0" width="100%;">
                    <tr>
                        <td colspan="2">
                            <div style="font-weight: bolder; font-size: 20px; padding-left: 230px;">
                                Laporan Hasil Diagnosa Pasien
                            </div>
                        </td>
                    </tr>
                </table>
                <br />
                <br />
                <table border="0" cellspacing="0" cellspacing="0" width="100%;">
                    <tr>
                        <td style="width: 20%">Nama Pasien</td>
                        <td>: <?= $record['nama_users'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat Lengkap</td>
                        <td>: <?= $record['alamat_users'] ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: <?= $record['email'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Penyakit</td>
                        <td>: <?= $record['nama_penyakit']; ?></td>
                    </tr>
                </table>
                <br />
                <br />
                <table border="0" cellspacing="0" cellspacing="0" width="100%">
                    <tr>
                        <td style="width: 20%">Penyebab</td>
                        <td>: <?= $record['keterangan_penyakit']; ?></td>
                    </tr>
                    <tr>
                        <td>Solusi</td>
                        <td>: <?= $record['solusi']; ?></td>
                    </tr>
                </table>
                <br>
                <br>
                <table border="0" cellspacing="0" cellspacing="0" width="100%">
                    <tr>
                    <td style="width: 20%">
                    
                    <p style="margin-left: 450px;">Pandeglang <?= $tgl1;?> <?= $tgl2;?> <?= $tgl;?><br >Pasien<br><br><br><br>
                    ..................</p>
                    </td>
                </tr>
                </table>
            </div>
        </div>
      </body>
      </html>