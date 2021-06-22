     <!-- Modal tambah alamat pengirim baru -->
     <div class="modal fade" id="tambahPengirimModal" tabindex="-1" role="dialog" aria-labelledby="tambahPengirimModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="tambahPengirimModalLabel"><strong>Tambah Alamat Pengirim</strong></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <form action="<?= base_url('alamat/tambahpengirim'); ?>" method="POST" enctype="multipart/form-data">
                     <div class="modal-body">
                         <div class="form-group row">
                             <label for="label_pengirim" class="col-sm-2 col-form-label">Label</label>
                             <div class="col">
                                 <input type="text" class="form-control" id="label_pengirim" name="label_pengirim" placeholder="Cth : Alamat Rumah" value="<?= set_value('label_pengirim'); ?>">
                                 <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                             </div>
                             <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                             <div class="col">
                                 <select class="form-control" name="province" id="province">
                                     <option value='0'> Pilih Provinsi</option>
                                     <?php foreach ($province as $prov) {
                                            echo "<option value='$prov[id]'>$prov[name_province]</option>";
                                        } ?>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="nama_pengirim" class="col-sm-2 col-form-label">Nama</label>
                             <div class="col">
                                 <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" placeholder="" value="<?= set_value('nama_pengirim'); ?>">
                             </div>
                             <label for="kabupaten-kota" class="col-sm-2 col-form-label">Kota</label>
                             <div class="col">
                                 <select class="form-control" name="kabupaten-kota" id="kabupaten-kota">
                                     <option value='0'> Pilih Kota / Kabupaten </option>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="nohp_pengirim" class="col-sm-2 col-form-label">No HP</label>
                             <div class="col">
                                 <input type="number" class="form-control" id="nohp_pengirim" name="nohp_pengirim" placeholder="" value="<?= set_value('nohp_pengirim'); ?>">
                             </div>
                             <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                             <div class="col">
                                 <select class="form-control" name="kecamatan" id="kecamatan">
                                     <option value='0'> Pilih Kecamatan </option>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="alamat_pengirim" class="col-sm-2 col-form-label">Alamat</label>
                             <div class="col">
                                 <textarea type="text" class="form-control" id="alamat_pengirim" name="alamat_pengirim"><?= set_value('alamat_pengirim'); ?></textarea>
                             </div>
                             <label for="kelurahan-desa" class="col-sm-2 col-form-label">Desa</label>
                             <div class="col">
                                 <select class="form-control" name="kelurahan-desa" id="kelurahan-desa">
                                     <option value='0'> Pilih Kelurahan / Desa </option>
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                         <button type="submit" class="btn btn-primary">Tambah Alamat</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
     <!-- End Of Modal alamat pengirim baru  -->


     <!-- Modal tambah alamat penerima baru -->
     <div class="modal fade" id="tambahPenerimaModal" tabindex="-1" role="dialog" aria-labelledby="tambahPenerimaModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="tambahPenerimaModalLabel"><strong>Tambah Alamat Penerima</strong></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <form action="<?= base_url('alamat/tambahpenerima'); ?>" method="POST" enctype="multipart/form-data">
                     <div class="modal-body">
                         <div class="form-group row">
                             <label for="label_penerima" class="col-sm-2 col-form-label">Label</label>
                             <div class="col">
                                 <input type="text" class="form-control" id="label_penerima" name="label_penerima" placeholder="Cth : Alamat Rumah" value="<?= set_value('label_penerima'); ?>">
                                 <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                             </div>
                             <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                             <div class="col">
                                 <select class="form-control" name="province1" id="province1">
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
                                 <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" placeholder="" value="<?= set_value('nama_penerima'); ?>">
                             </div>
                             <label for="kabupaten-kota1" class="col-sm-2 col-form-label">Kota</label>
                             <div class="col">
                                 <select class="form-control" name="kabupaten-kota1" id="kabupaten-kota1">
                                     <option value='0'> Pilih Kota / Kabupaten </option>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="nohp_penerima" class="col-sm-2 col-form-label">No HP</label>
                             <div class="col">
                                 <input type="number" class="form-control" id="nohp_penerima" name="nohp_penerima" placeholder="" value="<?= set_value('nohp_penerima'); ?>">
                             </div>
                             <label for="kecamatan1" class="col-sm-2 col-form-label">Kecamatan</label>
                             <div class="col">
                                 <select class="form-control" name="kecamatan1" id="kecamatan1">
                                     <option value='0'> Pilih Kecamatan </option>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="alamat_penerima" class="col-sm-2 col-form-label">Alamat</label>
                             <div class="col">
                                 <textarea type="text" class="form-control" id="alamat_penerima" name="alamat_penerima"><?= set_value('alamat_penerima'); ?></textarea>
                             </div>
                             <label for="kelurahan-desa" class="col-sm-2 col-form-label">Desa</label>
                             <div class="col">
                                 <select class="form-control" name="kelurahan-desa1" id="kelurahan-desa1">
                                     <option value='0'> Pilih Kelurahan / Desa </option>
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                         <button type="submit" class="btn btn-primary">Tambah Alamat</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
     <!-- End Of Modal alamat penerima baru  -->


     <!-- Script ambil alamat tambah alamat -->
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
     <!-- End of scirpt am,bil alamat -->