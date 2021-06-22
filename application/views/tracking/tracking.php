<style>
    td {
        padding: 10px 15px;
        border: 1px solid #d4d4d4;
        font-size: 15px;
    }

    .panel-cr {
        width: 100%;
        padding: 12px 15px;
        background-color: #eee;
        border: 1px solid #d4d4d4;
        font-size: 16px;
    }

    .bdg {
        background-color: #02a8f3;
        color: #fff;
        width: 50px;
        text-align: center;
        padding: 6px 10px;
        border-radius: 5px;
        margin-left: 15px;
        font-size: 13px;
        font-weight: 900;
    }

    .cnnoHeader:hover {
        cursor: pointer;
    }

    .cnnoContent {
        padding: 10px;
        border: 1px solid rgba(0, 0, 0, .125);
        border-top: none;
    }

    .act {
        display: block;
    }

    .blc {
        display: none;
    }
</style>
<section>
    <div class="page-header-berita-bg">
        <div class="page-header">
            <div class="container">
                <h1 class="header-title">Cek Resi Pengiriman</h1>
            </div>
        </div>
    </div>
</section>

<section style="margin: 30px 0">
    <div class="container">
        <h1 class="header-title">Cek Resi</h1>
    </div>
</section>
<section id="cekresi">
    <div class="container">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <?php foreach ($track as $t) : ?>
                <div class="cnnoAll" style="margin-bottom: 5px">
                    <div class="panel-cr cnnoHeader" data-btnseq="cnno_660002411199">
                        <?= $t['no_resi']; ?>
                        <div class="pull-right hidden-xs">
                            <i class="fa fa-check"></i>&nbsp;&nbsp;
                            <?= $t['status']; ?> &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-clock-o"></i> &nbsp;
                            <?= $t['tanggal_konfirm']; ?> </div>
                    </div>
                    <div class="cnnoContent" id="cnno_660002411199" style="margin-bottom: 10px; display: block">
                        <table width="100%">
                            <tr>
                                <td width="50%">
                                    <strong>Pengirim:</strong><br>
                                    <strong><?= $t['nama_pengirim']; ?></strong><br>
                                    <small><?= $t['alamat_pengirim']; ?></small><br>
                                    <small>No HP : <?= $t['nohp_pengirim']; ?></small><br>
                                    <small>Asal : <?= $t['kota_asal']; ?></small>
                                </td>
                                <td width="50%">
                                    <strong>Penerima:</strong><br>
                                    <strong><?= $t['nama_penerima']; ?></strong><br>
                                    <small><?= $t['alamat_penerima']; ?></small><br>
                                    <small>No HP : <?= $t['nohp_penerima']; ?></small><br>
                                    <small>Tujuan : <?= $t['kota_tujuan']; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><strong>Isi :</strong> &nbsp;
                                    <?= $t['isi_paket']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2"><strong>Layanan :</strong> &nbsp;
                                    <?= $t['layanan']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2"><strong>Alamat Penerima:</strong> &nbsp;
                                    <?= $t['alamat_penerima']; ?></td>

                            </tr>
                        </table>
                        <hr>
                        <table width="100%">
                            <tr width="50%">
                                <td><strong>Status</strong></td>
                                <td><strong>Keterangan</strong></td>
                                <td><strong>Tanggal</strong></td>
                                <td><strong>Berat</strong></td>
                                <td><strong>Ongkir</strong></td>
                            </tr>
                            <tr width="50">
                                <?php
                                if ($t['status'] == "Booking") {
                                    $status = "warning";
                                } else if ($t['status'] == "Manifest") {
                                    $status = "info";
                                } else if ($t['status'] == "On Process") {
                                    $status = "primary";
                                } else if ($t['status'] == "Received On Destination") {
                                    $status = "secondary";
                                } else if ($t['status'] == "Delivered") {
                                    $status = "success";
                                } else {
                                    $status = "danger";
                                }
                                ?>
                                <td><button class="btn btn-<?= $status; ?>"><?= $t['status']; ?></button>
                                    <?php
                                    if ($t['status'] == "Manifest") {
                                        $ket = "Paket sudah diterima, menunggu untuk dikirim";
                                    } else if ($t['status'] == "On Process") {
                                        $ket = "Paket sedang dalam proses pengiriman/perjalanan ke";
                                    } else if ($t['status'] == "Received On Destination") {
                                        $ket = "Paket sudah sampai di kota tujuan, dan akan dikirim ke alamat tujuan";
                                    } else if ($t['status'] == "Delivered") {
                                        $ket = "Paket sudah sampai / diterima.";
                                    } else {
                                        $ket = "Pengiriman Gagal";
                                    }
                                    ?>
                                <td><?= $ket;  ?></td>
                                <td><?= $t['tanggal_konfirm']; ?></td>
                                <td><?= $t['berat']; ?> KG</td>
                                <td>Rp. <?= number_format($t['ongkir'], '2', ',', '.') ?></td>
                            </tr>
                        </table>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>