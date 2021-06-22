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
                        <h6 class="m-0 font-weight-bold text-primary">Form Booking Paket </h6>
                    </div>
                    <div class="card-body">

                        <form class="user" action="<?php echo base_url('booking/index'); ?>" method="POST">
                            <div class="form-group row">
                                <label for="provinsiasal" class="col-sm-2 col-form-label"><b>Provinsi Asal</b></label>
                                <div class="col">
                                    <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                                    <select class="form-control" name="provinsiasal" id="provinsiasal">
                                        <option value="">-- Provinsi Asal --</option>
                                        <?php $this->load->view('booking/prov'); ?>
                                    </select>
                                    <?= form_error('provinsiasal', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                                <label for="courier" class="col-sm-2 col-form-label"><b>Kurir</b></label>
                                <div class="col">
                                    <select class="custom-select" name="kurir" id="kurir">
                                        <option value="">-- Pilih Kurir --</option>
                                        <option value="jne" <?= set_select('kurir', 'jne'); ?>>JNE</option>
                                    </select>
                                    <?= form_error('kurir', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="asal" class="col-sm-2 col-form-label"><b>Kota Asal</b></label>
                                <div class="col">
                                    <select class="form-control" id="asal" name="asal">
                                        <option value="" disabled selected>-- Pilih Kota / Kab--</option>
                                    </select>
                                    <?= form_error('asal', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                                <label for="layanan" class="col-sm-2 col-form-label"><b>Produk Layanan</b></label>
                                <div class="col">
                                    <select class="form-control" id="layanan" name="layanan">
                                        <option value="" disabled selected>-- Pilih Layanan --</option>
                                    </select>
                                    <?= form_error('layanan', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"><b>Provinsi Tujuan</b></label>
                                <div class="col">
                                    <select class="form-control" name="prov" id="provinsi">
                                        <option value="">-- Provinsi Tujuan --</option>
                                        <?php $this->load->view('booking/prov'); ?>
                                    </select>
                                    <?= form_error('prov', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <label for="jeniskiriman" class="col-sm-2 col-form-label"><b>Jenis Kiriman</b></label>
                                <div class="col">
                                    <select class="custom-select" name="jeniskiriman" id="jeniskiriman">
                                        <option value="">-- Pilih Jenis Kiriman --</option>
                                        <option value="paket" <?= set_select('jeniskiriman', 'paket'); ?>>PAKET</option>
                                        <option value="dokumen" <?= set_select('jeniskiriman', 'dokumen'); ?>>DOKUMEN</option>
                                    </select>
                                    <?= form_error('jeniskiriman', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kabupaten" class="col-sm-2 col-form-label"><b>Kota Tujuan</b></label>
                                <div class="col">
                                    <select class="form-control" name="kabupaten" id="kabupaten">
                                        <option value="" disabled selected>-- Pilih Kota / Kab --</option>
                                    </select>
                                    <?= form_error('kabupaten', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                                <label for="isi" class="col-sm-2 col-form-label"><b>Isi Paket</b></label>
                                <div class="col">
                                    <input type="text" class="form-control" id="isi" name="isi" placeholder="-- Isi Paket --" value="<?= set_value('isi'); ?>">
                                    <?= form_error('isi', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="berat" class="col-sm-2 col-form-label"><b>Berat</b></label>
                                <div class="col">
                                    <div class="input-group-prepend">
                                        <input type="number" class="form-control" id="berat" name="berat" value="" placeholder="-- Isi Berat --">
                                        <span class="input-group-text">Kilogram</span>
                                        <?= form_error('berat', '<small class="text-danger pl-1">', '</small>') ?>
                                    </div>
                                </div>
                                <label for="ongkir" class="col-sm-2 col-form-label"><b>Ongkos Kirim</b></label>
                                <div class="col">
                                    <input type="number" class="form-control" id="ongkir" name="ongkir" value="" readonly>
                                </div>
                            </div>

                            <!-- Divider -->
                            <hr class="sidebar-divider d-none d-md-block">



                            <div class="row">
                                <div class="col-4">
                                    <b>PENGIRIM</b>
                                </div>
                                <div class="col">
                                    <a href="" data-toggle="modal" data-target="#dataPengirimModal" class="btn btn-info btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-address-book"></i>
                                        </span>
                                        <span class="text">Buku Alamat</span>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <b>PENERIMA</b>
                                </div>
                                <div class="col">
                                    <a href="" data-toggle="modal" data-target="#dataPenerimaModal" class="btn btn-info btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-address-book"></i>
                                        </span>
                                        <span class="text">Buku Alamat</span>
                                    </a>
                                </div>
                            </div>
                            <!-- Divider -->
                            <hr class="sidebar-divider d-none d-md-block">

                            <div class="form-group row">
                                <label for="nama_pengirim" class="col-sm-2 col-form-label"><b>Nama</b></label>
                                <div class="col">
                                    <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" placeholder="Nama Pengirim" value="<?= set_value('nama_pengirim'); ?>">
                                    <input type="hidden" name="kode_booking" value="<?= $kodebooking ?>">
                                    <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                                    <input type="hidden" name="id_pengirim" value="<?= $pengirim; ?>">
                                    <?= form_error('nama_pengirim', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <label for="nama_penerima" class="col-sm-2 col-form-label"><b>Nama</b></label>
                                <div class="col">
                                    <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" placeholder="Nama Penerima" value="<?= set_value('nama_penerima'); ?>">
                                    <input type="hidden" name="id_penerima" value="<?= $penerima; ?>">
                                    <?= form_error('nama_penerima', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="label_pengirim" class="col-sm-2 col-form-label"><b>Label</b></label>
                                <div class="col">
                                    <input type="text" class="form-control" id="label_pengirim" name="label_pengirim" placeholder="Cth : Alamat Rumah" value="<?= set_value('label_pengirim'); ?>">
                                    <?= form_error('label_pengirim', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <label for="label_penerima" class="col-sm-2 col-form-label"><b>Label</b></label>
                                <div class="col">
                                    <input type="text" class="form-control" id="label_penerima" name="label_penerima" placeholder="Cth : Alamat Rumah" value="<?= set_value('label_penerima'); ?>">
                                    <?= form_error('label_penerima', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nohp_penerima" class="col-sm-2 col-form-label"><b>No HP</b></label>
                                <div class="col">
                                    <input type="number" class="form-control" id="nohp_pengirim" name="nohp_pengirim" placeholder="No HP Pengirim" value="<?= set_value('nohp_pengirim'); ?>">
                                    <?= form_error('nohp_pengirim', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                                <label for="nohp_penerima" class="col-sm-2 col-form-label"><b>No HP</b></label>
                                <div class="col">
                                    <input type="number" class="form-control" id="nohp_penerima" name="nohp_penerima" placeholder="No HP Penerima" value="<?= set_value('nohp_penerima'); ?>">
                                    <?= form_error('nohp_penerima', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat_pengirim" class="col-sm-2 col-form-label"><b>Alamat</b></label>
                                <div class="col">
                                    <textarea type="text" class="form-control" id="alamat_pengirim" name="alamat_pengirim" placeholder="Alamat Pengirim"><?= set_value('alamat_pengirim'); ?></textarea>
                                    <?= form_error('alamat_pengirim', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                                <label for="alamat_penerima" class="col-sm-2 col-form-label"><b>Alamat</b></label>
                                <div class="col">
                                    <textarea type="text" class="form-control" id="alamat_penerima" name="alamat_penerima" placeholder="Alamat Penerima"><?= set_value('alamat_penerima'); ?></textarea>
                                    <?= form_error('alamat_penerima', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="province" class="col-sm-2 col-form-label"><b>Provinsi</b></label>
                                <div class="col">
                                    <select class="form-control" name="province" id="province">
                                        <option value='0'> Pilih Provinsi</option>
                                        <?php foreach ($province as $prov) {
                                            echo "<option value='$prov[id]'>$prov[name_province]</option>";
                                        } ?>
                                    </select>
                                    <?= form_error('province', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                                <label for="province1" class="col-sm-2 col-form-label"><b>Provinsi</b></label>
                                <div class="col">
                                    <select class="form-control" name="province1" id="province1">
                                        <option value='0'> Pilih Provinsi</option>
                                        <?php foreach ($province as $prov) {
                                            echo "<option value='$prov[id]'>$prov[name_province]</option>";
                                        } ?>
                                    </select>
                                    <?= form_error('province1', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kabupaten-kota" class="col-sm-2 col-form-label"><b>Kota/Kab</b></label>
                                <div class="col">
                                    <select class="form-control" name="kabupaten-kota" id="kabupaten-kota">
                                        <option value='0'> Pilih Kota / Kabupaten </option>
                                    </select>
                                    <?= form_error('kabupaten-kota', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                                <label for="kabupaten-kota1" class="col-sm-2 col-form-label"><b>Kota/Kab</b></label>
                                <div class="col">
                                    <select class="form-control" name="kabupaten-kota1" id="kabupaten-kota1">
                                        <option value='0'> Pilih Kota / Kabupaten </option>
                                    </select>
                                    <?= form_error('kabupaten-kota1', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kecamatan" class="col-sm-2 col-form-label"><b>Kecamatan</b></label>
                                <div class="col">
                                    <select class="form-control" name="kecamatan" id="kecamatan">
                                        <option value='0'> Pilih Kecamatan </option>
                                    </select>
                                    <?= form_error('kecamatan', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                                <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Kecamatan</b></label>
                                <div class="col">
                                    <select class="form-control" name="kecamatan1" id="kecamatan1">
                                        <option value='0'> Pilih Kecamatan </option>
                                    </select>
                                    <?= form_error('kecamatan1', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Desa / Kelurahan</b></label>
                                <div class="col">
                                    <select class="form-control" name="kelurahan-desa" id="kelurahan-desa">
                                        <option value='0'> Pilih Kelurahan / Desa </option>
                                    </select>
                                    <?= form_error('kelurahan-desa', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                                <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Desa / Kelurahan</b></label>
                                <div class="col">
                                    <select class="form-control" name="kelurahan-desa1" id="kelurahan-desa1">
                                        <option value='0'> Pilih Kelurahan / Desa </option>
                                    </select>
                                    <?= form_error('kelurahan-desa1', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>


                            <!-- Divider -->
                            <hr class="sidebar-divider d-none d-md-block">

                            <center>
                                <div class="my-2"></div>
                                <button type="submit" id="tombol" class="btn btn-primary">
                                    <span class="icon text-white-50">
                                    </span>
                                    <span class="text">Buat Kode Booking</span>
                                </button>
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

<!-- MODAL CARA BOOKING -->
<div class="modal fade" id="caraBookingModal" tabindex="-1" role="dialog" aria-labelledby="caraBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role=" document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="caraBookingLabel"><strong> 6 Langkah Melakukan Booking </strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="20px"><i class="fas fa-list-ul"></i></td>
                        <td>Isi form booking</td>
                    </tr>
                    <tr>
                        <td width="20px"><i class="fas fa-check"></i></td>
                        <td>Pastikan data yang anda inputkan sudah benar</td>
                    </tr>
                    <tr>
                        <td width="20px"><i class="fas fa-print"></i></td>
                        <td>Setelah mengisi form anda akan mendapatkan kode booking dan dapat mencetak label pengiriman</td>
                    </tr>
                    <tr>
                        <td width="20px"><i class="fas fa-truck"></i></td>
                        <td>Anda bisa mengantar langsung barang ke counter terdekat atau pun melakukan pickup</td>
                    </tr>
                    <tr>
                        <td width="20px"><i class="fas fa-money-bill-wave"></i></td>
                        <td>Ongkos kirim bisa dibayarkan langsung di counter terdekat atau melalui kurir pickup</td>
                    </tr>
                    <tr>
                        <td width="20px"><i class="fas fa-check-double"></i></td>
                        <td>Resi akan otomatis terupdate apabila barang sudah dikonfirmasi / sudah diterima di counter terdekat</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- END OF MODAL CARA BOOKING -->


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
<script type="text/javascript">
    $(function() {

        $.ajaxSetup({
            type: "POST",
            url: "<?php echo base_url('booking/ambil_data') ?>",
            cache: false,
        });

        $("#province1").change(function() {

            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    data: {
                        modul: 'kabupaten',
                        id: value
                    },
                    success: function(respond) {
                        $("#kabupaten-kota1").html(respond);
                    }
                })
            }

        });


        $("#kabupaten-kota1").change(function() {
            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    data: {
                        modul: 'kecamatan',
                        id: value
                    },
                    success: function(respond) {
                        $("#kecamatan1").html(respond);
                    }
                })
            }
        });

        $("#kecamatan1").change(function() {
            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    data: {
                        modul: 'kelurahan',
                        id: value
                    },
                    success: function(respond) {
                        $("#kelurahan-desa1").html(respond);
                    }
                })
            }
        });
    })
</script>