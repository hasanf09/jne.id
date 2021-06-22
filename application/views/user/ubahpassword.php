  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Content Row -->
      <div class="row">

          <div class="col-xl-12 mb-4">
              <div class="col-xl-10 col-md-5 mx-auto my-3">
                  <!-- <?= $this->session->flashdata('message'); ?> -->
                  <div class="card shadow mb-4">
                      <div class="card shadow mb">
                          <div class="card-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary">Form Ubah Password</h6>
                          </div>
                          <div class="card-body">
                              <div class="col-md-8 mx-auto">
                                  <?= $this->session->flashdata('message'); ?>
                              </div>
                              <form action="<?= base_url('user/ubahpassword'); ?>" method="POST">
                                  <div class="form-group">
                                      <div class="col-md-8 mx-auto">
                                          <label for="password_lama"><b>Password Lama</b></label>
                                          <input type="password" class="form-control" id="password_lama" name="password_lama">
                                          <?= form_error('password_lama', '<small class="text-danger pl-1">', '</small>'); ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-md-8 mx-auto">
                                          <label for="password_baru1"><b>Password Baru</b></label>
                                          <input type="password" class="form-control" id="password_baru1" name="password_baru1">
                                          <?= form_error('password_baru1', '<small class="text-danger pl-1">', '</small>'); ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-md-8 mx-auto">
                                          <label for="password_baru2"><b>Konfirmasi Password<b></label>
                                          <input type="password" class="form-control" id="password_baru2" name="password_baru2">
                                          <?= form_error('password_baru2', '<small class="text-danger pl-1">', '</small>'); ?>
                                      </div>
                                  </div>
                                  <center>
                                      <div class="form-group">
                                          <div class="col-md-8 mx-auto my-4">
                                              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp; Simpan Perubahan</button>
                                          </div>
                                      </div>
                                  </center>
                              </form>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
      </div>