     <!-- Begin Page Content -->
     <div class="container-fluid">

         <!-- Content Row -->

         <?php if (validation_errors()) : ?>
             <div class="alert alert-danger" role="alert">
                 <?= validation_errors(); ?>
             </div>
         <?php endif; ?>
         <div class="row">

             <!-- Area Chart -->
             <div class="col-xl-6 col-lg-7">
                 <div class="card shadow mb-4">
                     <!-- Card Header - Dropdown -->
                     <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary"> Detail Pengirim</h6>
                     </div>
                     <!-- Card Body -->
                     <div class="card-body">
                         <?php foreach ($pengirim as $pr) : ?>
                             <div class="card-text"><i class="fas fa-tag"></i>&nbsp; <?= $pr['label_pengirim']; ?></div>
                             <div class="card-text"><i class="fas fa-user-alt"></i>&nbsp; <?= $pr['nama_pengirim']; ?></div>
                             <div class="card-text"><i class="fas fa-phone-alt"></i>&nbsp; <?= $pr['nohp_pengirim']; ?></div>
                             <div class="card-text"><i class="fas fa-home"></i>&nbsp; <?= $pr['alamat_pengirim']; ?></div>
                             <div class="card-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $pr['name_villages']; ?>,<?= $pr['name_districts']; ?>, <?= $pr['name_regencies']; ?>, </div>
                             <div class="card-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $pr['name_province']; ?></div>
                         <?php endforeach; ?>
                     </div>
                 </div>
             </div>

             <!-- Pie Chart -->
             <div class="col-xl-6 col-lg-5">
                 <div class="card shadow mb-4">
                     <!-- Card Header - Dropdown -->
                     <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary"> Detail Penerima</h6>
                     </div>
                     <!-- Card Body -->
                     <div class="card-body">
                         <?php foreach ($penerima as $pm) : ?>
                             <div class="card-text"><i class="fas fa-tag"></i>&nbsp; <?= $pm['label_penerima']; ?></div>
                             <div class="card-text"><i class="fas fa-user-alt"></i>&nbsp; <?= $pm['nama_penerima']; ?></div>
                             <div class="card-text"><i class="fas fa-phone-alt"></i>&nbsp; <?= $pm['nohp_penerima']; ?></div>
                             <div class="card-text"><i class="fas fa-home"></i>&nbsp; <?= $pm['alamat_penerima']; ?></div>
                             <div class="card-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $pm['name_villages']; ?>, <?= $pm['name_districts']; ?>, <?= $pm['name_regencies']; ?>,</div>
                             <div class="card-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $pm['name_province']; ?></div>
                         <?php endforeach; ?>
                     </div>
                 </div>
             </div>
         </div>


     </div>
     <!-- /.container-fluid -->

     </div>
     <!-- End of Main Content -->