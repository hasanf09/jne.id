<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Content Row -->

    <div class="row">

        <div class="col-lg-12 mb-4">
            
        </div>



        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-10">
            <div class="card shadow mb-4">

                <!-- Basic Card Example -->
                <div class="card shadow mb">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Pick Up </h6>
                    </div>
                    <div class="card-body">

                        <form class="user" action="<?php echo base_url('pickup/index'); ?>" method="POST">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label"><b>Nama Lengkap *</b></label>
                                <div class="col">
                                    <input type="text" class="form-control" id="nama" name="nama" value="">
                                    <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                                    <?= form_error('nama', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                                <label for="province" class="col-sm-2 col-form-label"><b>Provinsi *</b></label>
                                <div class="col">
                                    <select class="form-control" name="province" id="province">
                                        <option value='0'>-- Pilih Provinsi --</option>
                                        <?php foreach ($province as $prov) {
                                            echo "<option value='$prov[id]'>$prov[name_province]</option>";
                                        } ?>
                                    </select>
                                    <?= form_error('province', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_hp" class="col-sm-2 col-form-label"><b>No Handphone *</b></label>
                                <div class="col">
                                    <input type="number" class="form-control" name="no_hp" id="no_hp" value="<">
                                    <?= form_error('no_hp', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                                <label for="kabupaten-kota" class="col-sm-2 col-form-label"><b>Kota / Kab *</b></label>
                                <div class="col">
                                    <select class="form-control" name="kabupaten-kota" id="kabupaten-kota">
                                        <option value='0'>-- Pilih Kota / Kabupaten --</option>
                                    </select>
                                    <?= form_error('kabupaten-kota', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label"><b>Email *</b></label>
                                <div class="col">
                                    <input type="text" class="form-control" name="email" id="email" value="">
                                    <?= form_error('email', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                                <label for="kecamatan" class="col-sm-2 col-form-label"><b>Kecamatan *</b></label>
                                <div class="col">
                                    <select class="form-control" name="kecamatan" id="kecamatan">
                                        <option value='0'>-- Pilih Kecamatan --</option>
                                    </select>
                                    <?= form_error('kecamatan', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-2 col-form-label"><b>Alamat Lengkap *</b></label>
                                <div class="col">
                                    <textarea type="text" class="form-control" name="alamat" id="alamat"></textarea>
                                    <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                                <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Desa / Kelurahan *</b></label>
                                <div class="col">
                                    <select class="form-control" name="kelurahan-desa" id="kelurahan-desa">
                                        <option value='0'>-- Pilih Kelurahan / Desa --</option>
                                    </select>
                                    <?= form_error('kelurahan-desa', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>


                            <!-- Divider -->
                            <hr class="sidebar-divider d-none d-md-block">

                            <div class="form-group row">
                                <label for="barang" class="col-sm-2 col-form-label"><b>Barang *</b></label>
                                <div class="col">
                                    <input type="text" class="form-control" name="barang" id="barang" placeholder="Barang akan dikirim" value="<?= set_value('barang'); ?>">
                                    <?= form_error('barang', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                                <label for="waktu" class="col-sm-2 col-form-label"><b>Waktu Pickup *</b></label>
                                <div class="col">
                                    <select class="custom-select" name="waktu" id="waktu">
                                        <option value="">-- Pilih Waktu Pickup --</option>
                                        <option value="Pagi 09.00 - 11.00" <?= set_select('waktu', 'Pagi 09.00 - 11.00'); ?>>Pagi 09.00 - 11.00</option>
                                        <option value="Siang 13.000 - 15.00" <?= set_select('waktu', 'Siang 13.000 - 15.00'); ?>>Siang 13.000 - 15.00</option>
                                        <option value="Malam 18.00 - 20.00" <?= set_select('waktu', 'Malam 18.00 - 20.00'); ?>>Malam 18.00 - 20.00</option>
                                    </select>
                                    <?= form_error('waktu', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="qty" class="col-sm-2 col-form-label"><b>Jumlah Barang *</b></label>
                                <div class="col">
                                    <div class="input-group-prepend">
                                        <input type="number" class="form-control" id="qty" name="qty" value="" placeholder="-- Jumlah Barang --">
                                        <span class="input-group-text">Pcs</span>
                                        <?= form_error('qty', '<small class="text-danger pl-1">', '</small>') ?>
                                    </div>
                                </div>
                                <label for="kendaraan" class="col-sm-2 col-form-label"><b>Kendaraan *</b></label>
                                <div class="col">
                                    <select class="custom-select" name="kendaraan" id="kendaraan">
                                        <option value="">-- Pilih Kendaraan --</option>
                                        <option value="motor" <?= set_select('kendaraan', 'Motor'); ?>>Motor</option>
                                        <option value="mobil" <?= set_select('kendaraan', 'Mobil'); ?>>Mobil</option>
                                    </select>
                                    <?= form_error('kendaraan', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="note" class="col-sm-2 col-form-label"><b>Catatan</b></label>
                                <div class="col">
                                    <textarea type="text" class="form-control" name="note" id="note" placeholder="Catatan untuk kurir"><?= set_value('note'); ?></textarea>
                                </div>
                            </div>


                            <!-- Divider -->
                            <hr class="sidebar-divider d-none d-md-block">
                            <center>
                                <div class="my-2"></div>

                                <input type="submit" name="cari" id="tombol" class="btn btn-primary" value="Pickup Sekarang">

                                <button type="reset" class="btn btn-danger">
                                    <span class="icon text-white-50">
                                    </span>
                                    <span class="text">Reset</span>
                                </button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>
</div>
<!-- End of Main Content -->

<!-- MODAL CARA PICKUP  -->
<div class="modal fade" id="caraPickupModal" tabindex="-1" role="dialog" aria-labelledby="caraPickupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role=" document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="caraPickupModalLabel"><strong> 4 Langkah Melakukan Pickup </strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="20px"><i class="fas fa-list-ul"></i></td>
                        <td>Isi form pickup</td>
                    </tr>
                    <tr>
                        <td width="20px"><i class="fas fa-truck"></i></td>
                        <td>Pastikan anda memilih jenis kendaraan yang sesuai dengan jumlah barang</td>
                    </tr>
                    <tr>
                        <td width="20px"><i class="fas fa-box-open"></i></td>
                        <td>Setelah anda mendapatkan data kurir, kurir akan sampai ke alamat tujuan dalam rentang waktu yang telah ditentukan</td>
                    </tr>
                    <tr>
                        <td width="20px"><i class="fas fa-money-bill-wave"></i></td>
                        <td>Pembayaran ongkos kirim dilakukan pada saat kurir menjemput barang</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- END OF MODAL CARA PICKUP  -->




<!-- Script Ambil data provinsi  -->
<script type="text/javascript">
    $(function() {

        $.ajaxSetup({
            type: "POST",
            url: "<?php echo base_url('booking/ambil_data') ?>",
            cache: false,
        });

        $("#province").change(function() {

            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    data: {
                        modul: 'kabupaten',
                        id: value
                    },
                    success: function(respond) {
                        $("#kabupaten-kota").html(respond);
                    }
                })
            }

        });


        $("#kabupaten-kota").change(function() {
            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    data: {
                        modul: 'kecamatan',
                        id: value
                    },
                    success: function(respond) {
                        $("#kecamatan").html(respond);
                    }
                })
            }
        });

        $("#kecamatan").change(function() {
            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    data: {
                        modul: 'kelurahan',
                        id: value
                    },
                    success: function(respond) {
                        $("#kelurahan-desa").html(respond);
                    }
                })
            }
        });
    })
</script>
<!-- End Script Ambil Data Provinsi  -->