 <!-- Area Chart -->
 <div class="wrapper wrapper-content">
     <div class="col-xl-10 col-md-5 mx-auto my-3">
         <div class="card shadow mb-4">


             <div class="card shadow mb">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Profil <?= $user['nama']; ?></h6>
                 </div>
                 <div class="card-body">

                     <?= form_open_multipart('user/ubahprofil'); ?>

                     <div class="row">
                         <div class="col-md-6 mx-auto">
                             <div class="col-md-12 my-2">
                                 
                             </div>
                         </div>
                     </div>


                     <!-- Divider -->
                     <hr class="sidebar-divider d-none d-md-block">
                     <div class="row">
                         <div class="col-md-6">
                             <div class="col-md-12 my-2">
                                 <label for="nama"><b>Nama Lengkap</b></label>
                                 <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                                 <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama']; ?>">
                                 <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                             </div>
                         </div>
                         <div class="col-md-6 my-2">
                             <div class="col-md-12">
                                 <label><b>Ubah Foto Profil</b></label>
                                 <div class="custom-file">
                                     <input type="file" class="custom-file-input" id="image" name="image">
                                     <label class="custom-file-label" for="image">Pilih file</label>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-md-6">
                             <div class="col-md-12 my-2">
                                 <label for="no_hp"><b>No HP</b></label>
                                 <input type="number" name="no_hp" id="no_hp" class="form-control" value="<?= $user['no_hp']; ?>">
                                 <?= form_error('no_hp', '<small class="text-danger pl-1">', '</small>'); ?>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="col-md-12 my-2">
                                 <label for="email"><b>Email</b></label>
                                 <input type="text" name="email" id="email" class="form-control" value="<?= $user['email']; ?>" readonly>
                             </div>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-md-6">
                             <div class="col-md-12 my-2">
                                 <label for="alamat"><b>Alamat Lengkap</b></label>
                                 <textarea type="text" name="alamat" id="alamat" class="form-control"><?= $user['alamat']; ?></textarea>
                                 <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?>
                             </div>
                         </div>
                         <div class="col-md-6 my-2">
                             <div class="col-md-12">
                                 <label for=""><b>Jenis Kelamin</b></label>
                                 <select type="select" name="gender" id="gender" class="form-control" value="$user['jenis_kelamin']">
                                     <?php
                                        $gender = $user['jenis_kelamin'];
                                        if ($gender == "Laki-Laki") echo "<option value='Laki-Laki' selected>Laki-Laki</option>";
                                        else echo "<option value='Laki-Laki'>Laki-Laki</option>";
                                        if ($gender == "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
                                        else echo "<option value='Perempuan'>Perempuan</option>";
                                        ?>
                                 </select>
                             </div>
                         </div>
                     </div>

                     <!-- Divider -->
                     <hr class="sidebar-divider d-none d-md-block">
                     <div class="row">
                         <div class="col-md-6">
                             <div class="col-md-12 my-3 text-left">
                                 <a href="<?= base_url('user/profilsaya'); ?>" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp; Batal</a>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="col-md-12 my-3 text-right">
                                 <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp; Simpan Perubahan</button>
                             </div>
                         </div>
                     </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>