 <!-- Begin Page Content -->
 <div class="container-fluid">


     <!-- Content Row -->

     <div class="row">
         <!-- Area Chart -->
         <div class="col-xl-12 col-lg-10">
             <?php if (validation_errors()) { ?>
                 <div class="alert alert-danger" role="alert">
                     <?= validation_errors(); ?>
                 </div>
             <?php } ?>
             <!-- Flash Data menggunakan Sweet Alert -->
             <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
             <!-- END Of Flash Data Sweet Alert -->
             <div class="card shadow mb-4">

                 <!-- DataTales Example -->
                 <div class="card shadow mb">
                     <div class="card-header py-3">
                         <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
                     </div>
                     <div class="card-body">
                         <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#adminBaruModal"><i class="fas fa-plus"></i> Tambah Admin</a>
                         <div class="table-responsive">
                             <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th>No</th>
                                         <th>Nama</th>
                                         <th>Email</th>
                                         <th>No HP</th>
                                         <th>Jenis Kelamin</th>
                                         <th>Alamat</th>
                                         <th>Sejak</th>
                                         <th>Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $no = 1; ?>
                                     <?php foreach ($dataadmin as $da) : ?>
                                         <tr>
                                             <th scope="row"><?= $no; ?></th>
                                             <td><?= $da['nama']; ?></td>
                                             <td><?= $da['email']; ?></td>
                                             <td><?= $da['no_hp']; ?></td>
                                             <td><?= $da['jenis_kelamin']; ?></td>
                                             <td><?= $da['alamat']; ?></td>
                                             <?php
                                                if ($da['is_active'] == "1") {
                                                    $status = "success";
                                                    echo $nilai = "";
                                                } else {
                                                    $status = "secondary";
                                                    echo $nilai = "Non Aktif";
                                                }
                                                ?>
                                             <td><?= date('d F, Y', $da['tanggal_input']); ?></td>
                                             <th>
                                                 <center>
                                                     <a href="" class="btn btn-circle btn-primary btn-sm my-2" data-toggle="modal" data-target="#ubahAdminModal<?= $da['id_user']; ?>"><i class="far fa-edit"></i></a>
                                                     <a href="<?= base_url('admin/hapusadmin/' . $da['id_user']); ?>" name=" batal" id="batal" class="btn btn-circle  btn-danger btn-sm batal"><i class="fas fa-close"></i></a>
                                                 </center>
                                             </th>
                                         </tr>
                                         <?php $no++; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- Area Chart -->
         <div class="col-xl-12 col-lg-10">
             <div class="card shadow mb-4">

                 <!-- DataTales Example -->
                 <div class="card shadow mb">
                     <div class="card-header py-3">
                         <h6 class="m-0 font-weight-bold text-primary">Data Customer Service</h6>
                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table table-bordered table-sm" id="dataTableUser" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th>No</th>
                                         <th>Nama</th>
                                         <th>Email</th>
                                         <th>No HP</th>
                                         <th>Jenis Kelamin</th>
                                         <th>Alamat</th>
                                         <th>Sejak</th>
                                         <th>Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $no = 1; ?>
                                     <?php foreach ($datauser as $du) : ?>
                                         <tr>
                                             <th scope="row"><?= $no; ?></th>
                                             <td><?= $du['nama']; ?>
                                             </td>
                                             <td><?= $du['email']; ?></td>
                                             <td><?= $du['no_hp']; ?></td>
                                             <td><?= $du['jenis_kelamin']; ?></td>
                                             <td><?= $du['alamat']; ?></td>
                                             <?php
                                                if ($du['is_active'] == "1") {
                                                    $status = "success";
                                                    echo $nilai = "";
                                                } else {
                                                    $status = "secondary";
                                                    echo $nilai = "Non Aktif";
                                                }
                                                ?>
                                             <td><?= date('d F, Y', $du['tanggal_input']); ?></td>
                                             <th>
                                                 <center>
                                                     <a href="" class="btn btn-circle btn-primary btn-sm my-2" data-toggle="modal" data-target="#ubahUserModal<?= $du['id_user']; ?>"><i class="far fa-edit"></i></a>
                                                     <a href="<?= base_url('admin/hapususer/' . $du['id_user']); ?>" name=" batal" id="batal" class="btn btn-circle  btn-danger btn-sm batal"><i class="fas fa-close"></i></a>
                                                 </center>
                                             </th>
                                         </tr>
                                         <?php $no++; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

     </div>
     <!-- /.container-fluid -->
 </div>
 </div>
 <!-- End of Main Content -->

 <!-- Modal Admin Baru -->
 <div class="modal fade" id="adminBaruModal" tabindex="-1" role="dialog" aria-labelledby="adminBaruModalLabel" aria-hidden="true">
     <div class="modal-dialog" role=" document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="adminBaruModalLabel"><strong> Tambah Data Admin Baru </strong></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="<?= base_url('admin/add'); ?>" method="POST" enctype="multipart/form-data">
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="nama">Nama</label>
                         <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Admin">
                     </div>
                     <div class="form-group">
                         <label for="email">Email</label>
                         <input type="text" class="form-control" id="email" name="email" placeholder="Email Admin">
                     </div>
                     <div class="form-group">
                         <label for="no_hp">No HP</label>
                         <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="No Hp Admin">
                     </div>
                     <div class="form-group">
                         <label for="">Jenis Kelamin </label>
                         <select class="form-control" id="gender" name="gender">
                             <option>-- Pilih Jenis Kelamin --</option>
                             <option value="Laki-Laki">Laki-Laki</option>
                             <option value="Perempuan">Perempuan</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="alamat">alamat</label>
                         <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"></textarea>
                     </div>
                     <div class="form-group">
                         <label for="password1">Password</label>
                         <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                     </div>
                     <div class="form-group">
                         <label for="password2">Ulangi Password</label>
                         <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password">
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                     <button type="submit" class="btn btn-primary">Tambah</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!-- End Of modal tambah admin baru -->

 <!-- Modal Ubah Admin -->
 <?php foreach ($dataadmin as $da) : ?>
     <div class="modal fade" id="ubahAdminModal<?= $da['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="ubahAdminModalLabel" aria-hidden="true">
         <div class="modal-dialog" role=" document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="ubahAdminModalLabel"><strong> Ubah Data <?= $da['nama']; ?> </strong></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <?= form_open_multipart('admin/ubahadmin'); ?>
                 <div class="modal-body">
                     <div class="col-md-12 my-2">
                         
                     </div>
                     <div class="form-group">
                         <label for="nama">Nama</label>
                         <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $da['id_user']; ?>">
                         <input type="text" class="form-control" id="nama" name="nama" value="<?= $da['nama']; ?>">
                     </div>
                     <div class="form-group">
                         <label for="email">Email</label>
                         <input type="text" class="form-control" id="email" name="email" value="<?= $da['email']; ?>">
                     </div>
                     <div class="form-group">
                         <label for="no_hp">No HP</label>
                         <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $da['no_hp']; ?>">
                     </div>
                     <div class="form-group">
                         <label for="">Jenis Kelamin</label>
                         <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                             <?php
                                $jenis_kelamin = array('Laki - Laki', 'Perempuan');
                                foreach ($jenis_kelamin as $key => $val) {
                                ?>
                                 <option value="<?= $val; ?>" <?php if ($val == $da['jenis_kelamin']) {
                                                                    echo " selected='selected'";
                                                                } ?>><?= $val; ?>
                                 </option>
                             <?php } ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="alamat">Alamat </label>
                         <textarea type="text" class="form-control" id="alamat" name="alamat"><?= $da['alamat']; ?></textarea>
                     </div>
                     <div class="form-group">
                         <label for="">Level</label>
                         <select class="form-control" id="role_id" name="role_id">
                             <?php
                                $role = $da['role_id'];
                                if ($role == "1") echo "<option value='1' selected>Admin</option>";
                                else echo "<option value='1'>Admin</option>";
                                if ($role == "2") echo "<option value='2' selected>User</option>";
                                else echo "<option value='2'>User</option>";
                                ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="tanggal_input">Bergabung Sejak</label>
                         <input type="text" class="form-control" id="tanggal_input" name="tanggal_input" value="<?= date('d F, Y', $da['tanggal_input']); ?>" readonly>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                     <button type="submit" class="btn btn-primary">Tambah</button>
                 </div>
                 </form>
             </div>
         </div>
     </div>
 <?php endforeach; ?>
 <!-- END modal tambah admin -->

 <!-- Modal Edit User -->
 <?php foreach ($datauser as $du) : ?>
     <div class="modal fade" id="ubahUserModal<?= $du['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="ubahUserModalLabel" aria-hidden="true">
         <div class="modal-dialog" role=" document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="ubahUserModalLabel"><strong> Ubah Data <?= $du['nama']; ?> </strong></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <?= form_open_multipart('admin/ubahuser'); ?>
                 <div class="modal-body">
                     <div class="col-md-12 my-2">
                     </div>
                     <div class="form-group">
                         <label for="nama">Nama</label>
                         <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $du['id_user']; ?>">
                         <input type="text" class="form-control" id="nama" name="nama" value="<?= $du['nama']; ?>">
                     </div>
                     <div class="form-group">
                         <label for="email">Email</label>
                         <input type="text" class="form-control" id="email" name="email" value="<?= $du['email']; ?>">
                     </div>
                     <div class="form-group">
                         <label for="no_hp">No HP</label>
                         <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $du['no_hp']; ?>">
                     </div>
                     <div class="form-group">
                         <label for="">Jenis Kelamin</label>
                         <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                             <?php
                                $jenis_kelamin = array('Laki - Laki', 'Perempuan');
                                foreach ($jenis_kelamin as $key => $val) {
                                ?>
                                 <option value="<?= $val; ?>" <?php if ($val == $du['jenis_kelamin']) {
                                                                    echo " selected='selected'";
                                                                } ?>><?= $val; ?>
                                 </option>
                             <?php } ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="alamat">Alamat </label>
                         <textarea type="text" class="form-control" id="alamat" name="alamat"><?= $du['alamat']; ?></textarea>
                     </div>
                     <div class="form-group">
                         <label for="tanggal_input">Bergabung Sejak</label>
                         <input type="text" class="form-control" id="tanggal_input" name="tanggal_input" value="<?= date('d F, Y', $du['tanggal_input']); ?>" readonly>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                     <button type="submit" class="btn btn-primary">Tambah</button>
                 </div>
                 </form>
             </div>
         </div>
     </div>
 <?php endforeach; ?>

 <!-- End Of Modal Edit User -->

 <!-- Scipt databale Admin-->
 <script>
     $(document).ready(function() {
         $('#dataTable').DataTable();
     });
 </script>
 <!-- Scipt databale User -->
 <script>
     $(document).ready(function() {
         $('#dataTableUser').DataTable();
     });
 </script>