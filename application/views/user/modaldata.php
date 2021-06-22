<!-- Modal data alamat pengirim -->
<div class="modal fade" id="dataPengirimModal" tabindex="-1" role="dialog" aria-labelledby="dataPengirimModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role=" document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataPengirimModalLabel"><strong>Alamat Pengirim </strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('booking/index'); ?>" method="POST">
                <div class="modal-body">
                    <div class="col-lg-10 my-4 mx-auto">
                        <?php foreach ($datapengirim as $pr) { ?>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"><?= $pr['label_pengirim']; ?></h6>
                                    <a href="" class=""></i>&nbsp; Pilih</a>
                                </div>
                                <div class="card-body">
                                    <p class="card-text" style="font-size: 15px;"><i class="fas fa-user-alt"></i>&nbsp; <b><?= $pr['nama_pengirim']; ?></b></p>
                                    <p class="card-text" style="font-size: 15px;"><i class="fas fa-phone-alt"></i>&nbsp; <b><?= $pr['nohp_pengirim']; ?></b></p>
                                    <p class="card-text" style="font-size: 15px;"><i class="fas fa-home"></i>&nbsp; <b><?= $pr['alamat_pengirim']; ?></b></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Of Modal data alamat pengirim -->

<!-- Modal data alamat penerima -->
<div class="modal fade" id="dataPenerimaModal" tabindex="-1" role="dialog" aria-labelledby="dataPenerimaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataPenerimaModalLabel"><strong>Alamat Penerima </strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('booking/index'); ?>" method="POST">
                <div class="modal-body">
                    <div class="col-lg-10 my-4 mx-auto">
                        <?php foreach ($datapenerima as $pm) { ?>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"><?= $pm['label_penerima']; ?></h6>
                                    <a href="" class=""></i>&nbsp; Pilih</a>
                                </div>
                                <div class="card-body">
                                    <p class="card-text" style="font-size: 15px;"><i class="fas fa-user-alt"></i>&nbsp; <b><?= $pm['nama_penerima']; ?></b></p>
                                    <p class="card-text" style="font-size: 15px;"><i class="fas fa-phone-alt"></i>&nbsp; <b><?= $pm['nohp_penerima']; ?></b></p>
                                    <p class="card-text" style="font-size: 15px;"><i class="fas fa-home"></i>&nbsp; <b><?= $pm['alamat_penerima']; ?></b></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END of modal data alamat penerima -->