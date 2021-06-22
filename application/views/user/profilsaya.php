 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Content Row -->
     <div class="row">
         <div class="col-lg-12">
             <!-- Area Chart -->
             <div class="col-xl-10 col-md-5 mx-auto my-3">
                 <!-- Flash Data menggunakan Sweet Alert -->
                 <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                 <div class="card shadow mb-4">

                     <!-- DataTales Example -->
                     <div class="card shadow mb">
                         <div class="card-header py-3">
                             <h6 class="m-0 font-weight-bold text-primary">Profil Saya </h6>
                         </div>
                         <div class="card-body">

                             <div class="row">
                                 
                                <div class="col-lg-5">
                                     <center>
                                         <h5 class="card-text" style="font-size: 30px; font-style:italic;"><strong><?= $user['nama']; ?></strong></h5>
                                         <p class="card-text" style="font-size: 15px;"><?= $user['alamat']; ?> &nbsp;<i class="fas fa-map-marker-alt"></i></p>
                                         <p class="card-text" style="font-size: 15px;"><i class="far fa-envelope"></i>&nbsp; <b><?= $user['email']; ?></b></p>
                                         <p class="card-text" style="font-size: 15px;"><i class="fas fa-mobile-alt"></i>&nbsp; <b><?= $user['no_hp']; ?></b></p>
                                         <p class="card-text" style="font-size: 15px;"><i class="fas fa-venus-mars"></i>&nbsp; <b><?= $user['jenis_kelamin']; ?></b></p>
                                         <p class="card-text" style="font-size: 15px;"><i class=" fas fa-hourglass-end"></i>&nbsp; Sejak : <b><?= date('d F, Y', $user['tanggal_input']); ?></b></p>
</center>
                                     <!-- Divider -->
                                     <hr class="sidebar-divider d-none d-md-block">
                                     <div class="btn btn-primary ml-1">
                                         <a href="<?= base_url('user/ubahprofil'); ?>" class="btn-primary"><i class="fas fa-user-edit"></i>&nbsp; Ubah Profil</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 </div>