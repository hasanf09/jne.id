  <!-- Begin Page Content -->
  <div class="container-fluid">
      <div class="row">
          <!-- Area Chart -->
          <div class="col-lg-12 mb-4">
              <div class="card shadow mb-4">

                  <!-- Basic Card Example -->
                  <div class="card shadow mb">
                      <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Booking Form Alamat</h6>
                      </div>
                      <div class="card-body">

                          <div class="row">
                              <div class="col-4">
                                  <b>PENGIRIM</b>
                              </div>
                              <div class="col">
                                  <button href="#" class="btn btn-info btn-icon-split btn-sm">
                                      <span class="icon text-white-50">
                                          <i class="fas fa-address-book"></i>
                                      </span>
                                      <span class="text">Buku Alamat</span>
                                  </button>
                              </div>
                              <div class="col-4">
                                  <b>PENERIMA</b>
                              </div>
                              <div class="col">
                                  <button href="#" class="btn btn-info btn-icon-split btn-sm">
                                      <span class="icon text-white-50">
                                          <i class="fas fa-address-book"></i>
                                      </span>
                                      <span class="text">Buku Alamat</span>
                                  </button>
                              </div>
                          </div>
                          <!-- Divider -->
                          <hr class="sidebar-divider d-none d-md-block">

                          <form class="user" method="POST" action='<?= base_url('booking/index'); ?>'>
                              <div class="form-group row">
                                  <label for="nama_pengirim" class="col-sm-2 col-form-label"><b>Nama</b></label>
                                  <div class="col">
                                      <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" placeholder="Nama Pengirim">
                                      <?= form_error('nama_pengirim', '<small class="text-danger pl-3">', '</small>'); ?>
                                  </div>
                                  <label for="nama_penerima" class="col-sm-2 col-form-label"><b>Nama</b></label>
                                  <div class="col">
                                      <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" placeholder="Nama Penerima">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="nohp_penerima" class="col-sm-2 col-form-label"><b>No HP</b></label>
                                  <div class="col">
                                      <input type="text" class="form-control" id="nohp_penerima" name="nohp_penerima" placeholder="No HP Pengirim">
                                  </div>
                                  <label for="nohp_penerima" class="col-sm-2 col-form-label"><b>No HP</b></label>
                                  <div class="col">
                                      <input type="text" class="form-control" id="nohp_penerima" name="nohp_penerima" placeholder="No HP Penerima">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="alamat_pengirim" class="col-sm-2 col-form-label"><b>Alamat</b></label>
                                  <div class="col">
                                      <textarea type="text" class="form-control" id="alamat_pengirim" name="alamat_pengirim" placeholder="Alamat Pengirim"></textarea>
                                  </div>
                                  <label for="alamat_penerima" class="col-sm-2 col-form-label"><b>Alamat</b></label>
                                  <div class="col">
                                      <textarea type="text" class="form-control" id="alamat_penerima" name="alamat_penerima" placeholder="Alamat Penerima"></textarea>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="provinsi" class="col-sm-2 col-form-label"><b>Provinsi</b></label>
                                  <div class="col">
                                      <select class="form-control" name="province" id="province">
                                          <option value='0'> Pilih Provinsi</option>
                                          <?php foreach ($province as $prov) {
                                                echo "<option value='$prov[id]'>$prov[name]</option>";
                                            } ?>
                                      </select>
                                  </div>
                                  <label for="provinsi" class="col-sm-2 col-form-label"><b>Provinsi</b></label>
                                  <div class="col">
                                      <select class="form-control" name="province1" id="province1">
                                          <option value='0'> Pilih Provinsi</option>
                                          <?php foreach ($province as $prov) {
                                                echo "<option value='$prov[id]'>$prov[name]</option>";
                                            } ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="kabupaten2" class="col-sm-2 col-form-label"><b>Kota/Kab</b></label>
                                  <div class="col">
                                      <select class="form-control" name="kabupaten-kota" id="kabupaten-kota">
                                          <option value='0'> Pilih Kota / Kabupaten </option>
                                      </select>
                                  </div>
                                  <label for="kabupaten2" class="col-sm-2 col-form-label"><b>Kota/Kab</b></label>
                                  <div class="col">
                                      <select class="form-control" name="kabupaten-kota1" id="kabupaten-kota1">
                                          <option value='0'> Pilih Kota / Kabupaten </option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="kecamatan" class="col-sm-2 col-form-label"><b>Kecamatan</b></label>
                                  <div class="col">
                                      <select class="form-control" name="kecamatan" id="kecamatan">
                                          <option value='0'> Pilih Kecamatan </option>
                                      </select>
                                  </div>
                                  <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Kecamatan</b></label>
                                  <div class="col">
                                      <select class="form-control" name="kecamatan1" id="kecamatan1">
                                          <option value='0'> Pilih Kecamatan </option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Desa / Kelurahan</b></label>
                                  <div class="col">
                                      <select class="form-control" name="kelurahan-desa" id="kelurahan-desa">
                                          <option value='0'> Pilih Kelurahan / Desa </option>
                                      </select>
                                  </div>
                                  <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Desa / Kelurahan</b></label>
                                  <div class="col">
                                      <select class="form-control" name="kelurahan-desa1" id="kelurahan-desa1">
                                          <option value='0'> Pilih Kelurahan / Desa </option>
                                      </select>
                                  </div>
                              </div>
                          </form>


                          <!-- Divider -->
                          <hr class="sidebar-divider d-none d-md-block">

                          <center>
                              <div class="my-2"></div>
                              <button type="submit" href="#" class="btn btn-primary">
                                  <span class="icon text-white-50">
                                  </span>
                                  <span class="text">Buat Kode Booking</span>
                              </button>
                              <button href="#" class="btn btn-danger">
                                  <span class="icon text-white-50">
                                  </span>
                                  <span class="text">Reset</span>
                              </button>
                          </center>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

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