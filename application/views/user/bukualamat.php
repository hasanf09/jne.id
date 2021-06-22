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
                 <!-- Flash Data menggunakan Sweet Alert -->
                 <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                 <div class="card shadow mb-4">
                     <!-- Card Header - Dropdown -->
                     <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary"> Alamat Pengirim</h6>
                         <a href="" class="add-btn" data-toggle="modal" data-target="#tambahPengirimModal"><i class="fas fa-plus"></i>&nbsp; Tambah Baru</a>
                     </div>
                     <!-- Card Body -->
                     <div class="card-body">
                         <table class="table">
                             <thead>
                                 <tr>
                                     <th scope="col">No</th>
                                     <th scope="col">Nama</th>
                                     <th scope="col">Label</th>
                                     <th scope="col">Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $no = 1; ?>
                                 <?php foreach ($pengirim as $pr) : ?>
                                     <tr>
                                         <th scope="row"><?= $no; ?></th>
                                         <td><?= $pr['nama_pengirim']; ?></td>
                                         <td><?= $pr['label_pengirim']; ?></td>
                                         <td>
                                             <a href="" class="btn-sm btn-primary" data-toggle="modal" data-target="#detailPengirimModal<?= $pr['id_pengirim']; ?>">Detail</a>
                                             <a href="<?= base_url('alamat/hapuspengirim/') . $pr['id_pengirim']; ?>" class="btn-sm btn-danger batal"><i class="far fa-trash-alt"></i></a>
                                         </td>
                                     </tr>
                                     <?php $no++; ?>
                                 <?php endforeach; ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>

             <!-- Pie Chart -->
             <div class="col-xl-6 col-lg-5">
                 <div class="card shadow mb-4">
                     <!-- Card Header - Dropdown -->
                     <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary"> Alamat Penerima</h6>
                         <a href="" class="add-btn" data-toggle="modal" data-target="#tambahPenerimaModal"><i class="fas fa-plus"></i>&nbsp; Tambah Baru</a>
                     </div>
                     <!-- Card Body -->
                     <div class="card-body">
                         <table class="table">
                             <thead>
                                 <tr>
                                     <th scope="col">No</th>
                                     <th scope="col">Nama</th>
                                     <th scope="col">Label</th>
                                     <th scope="col">Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $no = 1; ?>
                                 <?php foreach ($penerima as $pm) : ?>
                                     <tr>
                                         <th scope="row"><?= $no; ?></th>
                                         <td><?= $pm['nama_penerima']; ?></td>
                                         <td><?= $pm['label_penerima']; ?></td>
                                         <td>
                                             <a href="" class="btn-sm btn-primary" data-toggle="modal" data-target="#detailPenerimaModal<?= $pm['id_penerima']; ?>">Detail</a>
                                             <a href="<?= base_url('alamat/hapuspenerima/' . $pm['id_penerima']); ?>" class="btn-sm btn-danger batal"><i class="far fa-trash-alt"></i></a>
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
     <!-- /.container-fluid -->

     </div>
     <!-- End of Main Content -->