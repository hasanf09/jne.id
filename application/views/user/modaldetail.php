<!-- Modal detail alamat pengirim -->
<?php foreach ($pengirim as $pr) { ?>
    <div class="modal fade" id="detailPengirimModal<?= $pr['id_pengirim']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailPengirimModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailPengirimModalLabel"><strong>Detail Alamat Pengirim</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('alamat/ubahpengirim'); ?>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="label_pengirim" class="col-sm-2 col-form-label">Label</label>
                        <div class="col">
                            <input type="hidden" class="form-control" id="id_pengirim" name="id_pengirim" value="<?= $pr['id_pengirim']; ?>">
                            <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $user['id_user']; ?>">
                            <input type="text" class="form-control" id="label_pengirim" name="label_pengirim" placeholder="" value="<?= $pr['label_pengirim']; ?>">
                        </div>
                        <?= form_error('label_pengirim', '<small class="text-danger pl-1">', '</small>') ?>
                        <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col">
                            <select class="form-control" name="province2" id="province2">
                                <option value='0'> Pilih Provinsi</option>
                                <?php foreach ($province as $prov) {
                                    echo "<option value='$prov[id]'>$prov[name_province]</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_pegirim" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col">
                            <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" placeholder="" value="<?= $pr['nama_pengirim']; ?>">
                            <?= form_error('nama_pengirim', '<small class="text-danger pl-1">', '</small>') ?>
                        </div>
                        <label for="kabupaten-kota2" class="col-sm-2 col-form-label">Kota</label>
                        <div class="col">
                            <select class="form-control" name="kabupaten-kota2" id="kabupaten-kota2">
                                <option value='0'> Pilih Kota / Kabupaten </option>
                            </select>
                            <?= form_error('kabupaten-kota2', '<small class="text-danger pl-1">', '</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nohp_pengirim" class="col-sm-2 col-form-label">No HP</label>
                        <div class="col">
                            <input type="number" class="form-control" id="nohp_pengirim" name="nohp_pengirim" placeholder="" value="<?= $pr['nohp_pengirim']; ?>">
                            <?= form_error('nohp_pengirim', '<small class="text-danger pl-1">', '</small>') ?>
                        </div>
                        <label for="kecamatan2" class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col">
                            <select class="form-control" name="kecamatan2" id="kecamatan2">
                                <option value='0'> Pilih Kecamatan </option>
                            </select>
                            <?= form_error('kecamatan2', '<small class="text-danger pl-1">', '</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat_pengirim" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col">
                            <textarea type="text" class="form-control" id="alamat_pengirim" name="alamat_pengirim"><?= $pr['alamat_pengirim']; ?></textarea>
                            <?= form_error('alamat_pengirim', '<small class="text-danger pl-1">', '</small>') ?>
                        </div>
                        <label for="kelurahan-desa2" class="col-sm-2 col-form-label">Desa</label>
                        <div class="col">
                            <select class="form-control" name="kelurahan-desa2" id="kelurahan-desa2">
                                <option value='0'> Pilih Kelurahan / Desa </option>
                            </select>
                            <?= form_error('kelurahan-desa2', '<small class="text-danger pl-1">', '</small>') ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<!-- End Of Modal detail alamat pengirim -->

<!-- Modal detail alamat penerima -->
<?php foreach ($penerima as $pm) { ?>
    <div class="modal fade" id="detailPenerimaModal<?= $pm['id_penerima']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailPenerimaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailPenerimaModalLabel"><strong>Detail Alamat Penerima</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('alamat/ubahpenerima'); ?>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="label_penerima" class="col-sm-2 col-form-label">Label</label>
                        <div class="col">
                            <input type="hidden" class="form-control" id="id_penerima" name="id_penerima" value="<?= $pm['id_penerima']; ?>">
                            <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $user['id_user']; ?>">
                            <input type="text" class="form-control" id="label_penerima" name="label_penerima" placeholder="" value="<?= $pm['label_penerima']; ?>">
                        </div>
                        <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col">
                            <select class="form-control" name="province3" id="province3">
                                <option value='0'> Pilih Provinsi</option>
                                <?php foreach ($province as $prov) {
                                    echo "<option value='$prov[id]'>$prov[name_province]</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_penerima" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col">
                            <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" placeholder="" value="<?= $pm['nama_penerima']; ?>">
                        </div>
                        <label for="kabupaten-kota3" class="col-sm-2 col-form-label">Kota</label>
                        <div class="col">
                            <select class="form-control" name="kabupaten-kota3" id="kabupaten-kota3">
                                <option value='0'> Pilih Kota / Kabupaten </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nohp_penerima" class="col-sm-2 col-form-label">No HP</label>
                        <div class="col">
                            <input type="number" class="form-control" id="nohp_penerima" name="nohp_penerima" placeholder="" value="<?= $pm['nohp_penerima']; ?>">
                        </div>
                        <label for="kecamatan3" class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col">
                            <select class="form-control" name="kecamatan3" id="kecamatan3">
                                <option value='0'> Pilih Kecamatan </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat_penerima" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col">
                            <textarea type="text" class="form-control" id="alamat_penerima" name="alamat_penerima"><?= $pm['alamat_penerima']; ?></textarea>
                        </div>
                        <label for="kelurahan-desa" class="col-sm-2 col-form-label">Desa</label>
                        <div class="col">
                            <select class="form-control" name="kelurahan-desa3" id="kelurahan-desa3">
                                <option value='0'> Pilih Kelurahan / Desa </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Of Modal detail alamat penerima -->


<!-- script ambil data alamat ubah alamat  -->
<script type="text/javascript">
    $(function() {

        $.ajaxSetup({
            type: "POST",
            url: "<?php echo base_url('booking/ambil_data') ?>",
            cache: false,
        });

        $("#province2").change(function() {

            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    data: {
                        modul: 'kabupaten',
                        id: value
                    },
                    success: function(respond) {
                        $("#kabupaten-kota2").html(respond);
                    }
                })
            }

        });


        $("#kabupaten-kota2").change(function() {
            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    data: {
                        modul: 'kecamatan',
                        id: value
                    },
                    success: function(respond) {
                        $("#kecamatan2").html(respond);
                    }
                })
            }
        });

        $("#kecamatan2").change(function() {
            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    data: {
                        modul: 'kelurahan',
                        id: value
                    },
                    success: function(respond) {
                        $("#kelurahan-desa2").html(respond);
                    }
                })
            }
        });
    })
</script>
<script type="text/javascript">
    $(function() {

        $.ajaxSetup({
            type: "POST",
            url: "<?php echo base_url('booking/ambil_data') ?>",
            cache: false,
        });

        $("#province3").change(function() {

            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    data: {
                        modul: 'kabupaten',
                        id: value
                    },
                    success: function(respond) {
                        $("#kabupaten-kota3").html(respond);
                    }
                })
            }

        });


        $("#kabupaten-kota3").change(function() {
            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    data: {
                        modul: 'kecamatan',
                        id: value
                    },
                    success: function(respond) {
                        $("#kecamatan3").html(respond);
                    }
                })
            }
        });

        $("#kecamatan3").change(function() {
            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    data: {
                        modul: 'kelurahan',
                        id: value
                    },
                    success: function(respond) {
                        $("#kelurahan-desa3").html(respond);
                    }
                })
            }
        });
    })
</script>
<!-- END of script ambil data ubah alamat  -->