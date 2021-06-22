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
                 <div class="card shadow mb">
                     <div class="card-header py-3">
                         <h6 class="m-0 font-weight-bold text-primary">Daftar Slide</h6>
                     </div>
                     <div class="card-body">
                         <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#sliderBaruModal"><i class="far fa-images"></i> Upload Slide</a>
                         <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                             <thead>
                                 <tr>
                                     <th>No</th>
                                     <th>Keterangan Slide</th>
                                     <th>Gambar</th>
                                     <th>Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $no = 1; ?>
                                 <?php foreach ($slider as $s) : ?>
                                     <tr>
                                         <th scope="row"><?= $no; ?></th>
                                         <td><?= $s['keterangan']; ?></td>
                                         <td>
                                             <picture>
                                                 <source srcset="" type="image/svg+xml">
                                                 <img src="<?= base_url('assets/img/slider/') . $s['image']; ?>" class="img-fluid img-thumbnail" alt="...">
                                             </picture>
                                         </td>
                                         <th>
                                             <a href="<?= base_url('admin/hapusslider/' . $s['id_slider']); ?>" name=" batal" id="batal" class="btn btn-circle  btn-danger batal"><i class="far fa-trash-alt"></i></a>
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
     <!-- /.container-fluid -->
 </div>
 </div>
 <!-- End of Main Content -->

 <!-- MODAL UPLOAD SLIDER -->
 <div class="modal fade" id="sliderBaruModal" tabindex="-1" role="dialog" aria-labelledby="sliderBaruModalLabel" aria-hidden="true">
     <div class="modal-dialog" role=" document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="sliderBaruModalLabel"><strong> Upload Slider Baru </strong></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="<?= base_url('admin/slider'); ?>" method="POST" enctype="multipart/form-data">
                 <div class="modal-body">
                     <div class="col-lg-12  my-4">
                         <div class="form-group row">
                             <label for="keterangan" class="col-sm-2 col-form-label">Keterangan Slide</label>
                             <div class="col-sm-8 mx-4">
                                 <input type="text" class="form-control" id="keterangan" name="keterangan">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label class="col-sm-2 col-form-label">Upload Gambar</label>
                             <div class="col-sm-8 mx-4">
                                 <input type="file" class="form-control" id="image" name="image">
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
 <!-- END OF MODAL UPLOADF SLIDER  -->


 <!-- Scipt databale -->
 <script>
     $(document).ready(function() {
         $('#dataTable').DataTable();
     });
 </script>