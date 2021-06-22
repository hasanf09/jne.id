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
             <div class="card shadow mb-4">
                 <!-- DataTales Example -->
                 <div class="card shadow mb">
                     <div class="card-header py-3">
                         <h6 class="m-0 font-weight-bold text-primary">Data Pengiriman</h6>
                     </div>
                     <div class="card-body">
                         <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#infoBaruModal"><i class="fas fa-bullhorn"></i> Update Info</a>
                         <div class="table-responsive">
                             <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th>No</th>
                                         <th>Judul</th>
                                         <th>Type</th>
                                         <th>Icon</th>
                                         <th>Deskripsi</th>
                                         <th>Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $no = 1; ?>
                                     <?php foreach ($info as $i) : ?>
                                         <tr>
                                             <th scope="row"><?= $no; ?></th>
                                             <td><?= $i['judul']; ?></td>
                                             <td><?= $i['type']; ?></td>
                                             <td><?= $i['icon']; ?></td>
                                             <td><?= $i['deskripsi']; ?></td>
                                             <td>
                                                 <a href="" class="btn btn-circle  btn-primary btn-sm" data-toggle="modal" data-target="#ubahInfoModal<?= $i['id_info']; ?>"><i class=" far fa-edit"></i></a>
                                                 <a href="<?= base_url('admin/hapusinfo/' . $i['id_info']); ?>" name=" batal" id="batal" class="btn btn-circle  btn-danger btn-sm batal"><i class="far fa-trash-alt"></i></a>
                                             </td>
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

 <!-- Modal Tambah Info Baru -->
 <div class="modal fade" id="infoBaruModal" tabindex="-1" role="dialog" aria-labelledby="infoBaruModalLabel" aria-hidden="true">
     <div class="modal-dialog" role=" document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="infoBaruModalLabel"><strong> Update Info Baru </strong></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="<?= base_url('admin/info'); ?>" method="POST" enctype="multipart/form-data">
                 <div class="modal-body">
                     <div class="col-lg-12  my-4">
                         <div class="form-group row">
                             <label class="col-sm-2 col-form-label">Judul</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="judul" name="judul" placeholder="Info libur">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label class="col-sm-2 col-form-label">Type</label>
                             <div class="col-sm-10">
                                 <select name="type" id="type" class="form-control">
                                     <option value="<?= set_value('gender'); ?>"> Pilih Type </option>
                                     <option value="info">Info</option>
                                     <option value="warning">Warning</option>
                                     <option value="success">Success</option>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label class="col-sm-2 col-form-label">Icon</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="icon" name="icon" placeholder="fas fa-home">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label class="col-sm-2 col-form-label">Deskripsi</label>
                             <div class="col-sm-10">
                                 <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Info keterlambatan pengirman"></textarea>
                             </div>
                         </div>
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
 <!-- End Of Modal Tambah Info Baru -->


 <!-- Modal Ubah Info -->
 <?php foreach ($info as $i) : ?>
     <div class="modal fade" id="ubahInfoModal<?= $i['id_info']; ?>" tabindex="-1" role="dialog" aria-labelledby="ubahInfoModalLabel" aria-hidden="true">
         <div class="modal-dialog" role=" document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="ubahInfoModalLabel"><strong> Update Info Baru </strong></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <?= form_open_multipart('admin/ubahinfo'); ?>
                 <div class="modal-body">
                     <div class="col-lg-12  my-4">
                         <div class="form-group row">
                             <label class="col-sm-2 col-form-label">Judul</label>
                             <div class="col-sm-10">
                                 <input type="hidden" class="form-control" id="id_info" name="id_info" value="<?= $i['id_info']; ?>">
                                 <input type="text" class="form-control" id="judul" name="judul" value="<?= $i['judul']; ?>">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label class="col-sm-2 col-form-label">Type</label>
                             <div class="col-sm-10">
                                 <select name="type" id="type" class="form-control" value="<?= $i['type']; ?>">
                                     <?php
                                        $type = $i['type'];
                                        if ($type == "info") echo "<option value='info' selected>info</option>";
                                        else echo "<option value='info'>info</option>";
                                        if ($type == "warning") echo "<option value='warning' selected>warning</option>";
                                        else echo "<option value='warning'>warning</option>";
                                        if ($type == "success") echo "<option value='success' selected>success</option>";
                                        else echo "<option value='success'>success</option>";
                                        ?>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label class="col-sm-2 col-form-label">Icon</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="icon" name="icon" value="<?= $i['icon']; ?>">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label class="col-sm-2 col-form-label">Deskripsi</label>
                             <div class="col-sm-10">
                                 <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"><?= $i['deskripsi']; ?></textarea>
                             </div>
                         </div>
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
 <!-- END of Modal ubah Info -->

 <!-- Scipt databale -->
 <script>
     $(document).ready(function() {
         $('#dataTable').DataTable();
     });
 </script>