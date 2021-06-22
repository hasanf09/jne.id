<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        @page {
            size: "A4";
            margin: 0mm;
        }

        @media print {
            #col-hd {
                display: none;
            }
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row" style="padding: 15px; text-transform:uppercase;">
            <div class="col-5" style="max-width: 600px !important; width: 600px; flex: 0 0 600px; border: 1px solid #333; padding-top: 10px; padding-bottom: 10px">
                <div class="row">
              <center>      <div class="col-4 my-2"><img src="<?= base_url('assets/'); ?>img/logo/logo jne.png" height="65px" alt=""></div> </center>
                    <div class="col-5 text-center" style="border-right: 1px solid #333">
                        <?php foreach ($booking as $b) { ?>
                            
                    </div>
                    <div class="col-3 text-center">
                        <h1 style="font-size: 25px;" class="my-4"><?= $b['layanan']; ?></h1>
                    </div>
                </div>
                <hr style="margin-top: 5px; border-style: dashed; border-color: #333">
                <div class="row">
                    <div class="col-2" style="border-right: 1px solid #333; text-transform: none;">Kepada</div>
                    <div class="col-10">
                        <?php foreach ($penerima as $pm) { ?>
                            <strong><?= $pm['nama_penerima']; ?></strong> - <?= $pm['nohp_penerima']; ?> <br>
                            <?= $pm['alamat_penerima']; ?> <br>
                            <?= $pm['name_villages']; ?>, <?= $pm['name_districts']; ?>,<?= $pm['name_regencies']; ?>,<?= $pm['name_province']; ?>
                        <?php } ?>
                    </div>
                </div>
                <div style="margin: 8px 0"></div>
                <div class="row">
                    <div class="col-2" style="border-right: 1px solid #333; text-transform: none;">Dari</div>
                    <div class="col-10">
                        <?php foreach ($pengirim as $pr) { ?>
                            <strong><?= $pr['nama_pengirim']; ?></strong> - <?= $pr['nohp_pengirim']; ?> <br>
                            <?= $pr['alamat_pengirim']; ?> <br>
                            <?= $pr['name_villages']; ?>, <?= $pr['name_districts']; ?>,<?= $pr['name_regencies']; ?>,<?= $pr['name_province']; ?>
                        <?php } ?>
                    </div>
                </div>
                <hr style="margin-top: 5px; border-style: dashed; border-color: #333">
                <table class="table-borderless table-sm" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Isi</th>
                            <th>Berat</th>
                            <th>Layanan</th>
                            <th>Ongkir</th>
                            <th>Tanda Terima</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $b['isi_paket']; ?></td>
                            <td><?= $b['berat']; ?> KG</td>
                            <td><?= $b['layanan']; ?></td>
                            <td>Rp.<?= number_format($b['ongkir'], '0', ',', '.'); ?></td>
                            <td style="border: 2px solid #333; height: 55px;"></td>
                        </tr>
                    </tbody>

                </table>
            <?php } ?>
            <div style="margin: 10px 0"></div>
            <div class="row">
                <div class="col-12">
                </div>
            </div>
            </div>
            <div class="col-1" style="overflow: hidden;" id="col-hd"><button id="print" class="btn btn-sm btn-default">Print</button></div>
        </div>
    </div>
    <script>
        $('#print').click(function(e) {
            e.preventDefault();
            window.print();
        });
    </script>
</body>

</html>