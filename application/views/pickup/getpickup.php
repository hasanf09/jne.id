 <!-- Begin Page Content -->
 <div class="container-fluid">


     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-12 col-lg-12">
             <!-- Flash Data menggunakan Sweet Alert -->
             <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
             <div class="card shadow mb-4">

                 <?php foreach ($kurir as $k) : ?>
                     <div class="card shadow mb">
                         <div class="card-header py-3">
                             <h6 class="m-0 font-weight-bold text-primary">Kurir Pickup</h6>
                         </div>
                         <div class="card-body">
                             <center>
                                 <h6 style="font-size: 20px;"><b>Data Kurir :</b></h6>
                                 <center>
                                     <div class="row">
                                         <div class="card col-lg-10 mx-auto">
                                             <div class="row no-gutters">
                                                 
                                                 <div class="col-lg-8">
                                                     <div class="card-body">
                                                         <div class="card-body">
                                                             <table class="table table-bordered">
                                                                 <tr>
                                                                     <td width="45px" class="bg-gray-100"><i class="fas fa-id-card-alt"></i></td>
                                                                     <td><?= $k['nama_kurir']; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                     <td width="45px" class="bg-gray-100"><i class="fas fa-phone-alt"></i></td>
                                                                     <td><?= $k['nohp_kurir']; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                     <td width="45px" class="bg-gray-100"><i class="fas fa-truck"></i></td>
                                                                     <td><?= $k['jenis_kendaraan']; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                     <td width="45px" class="bg-gray-100"><i class="fas fa-align-justify"></i></td>
                                                                     <td><?= $k['nopol']; ?></td>
                                                                 </tr>
                                                             </table>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>


                                         <div class="col-12 mx-auto my-4">
                                             <button type="submit" onclick="history.back(-1)" class="btn btn-secondary">
                                                 <span class="icon text-white-50">
                                                 </span>
                                                 <i class="fas fa-undo"></i>
                                                 <span class="text">Kembali</span>
                                             </button>
                                         </div>
                                     </div>
                         </div>
                     </div>
                 <?php endforeach; ?>
             </div>
         </div>


         <!-- Area Chart -->
         <div class="col-xl-12 col-lg-10">
             <div class="card shadow mb-4">

                 <!-- Basic Card Example -->
                 <div class="card shadow mb">
                     <div class="card-header py-3">
                         <h6 class="m-0 font-weight-bold text-primary">Data Pickup</h6>
                     </div>
                     <div class="card-body">
                         <div class="table">
                             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th scope="col">No</th>
                                         <th scope="col">Nama</th>
                                         <th scope="col">Alamat</th>
                                         <th scope="col">Jumlah</th>
                                         <th scope="col">Kendaraan</th>
                                         <th scope="col">Jam Pickup</th>
                                         <th scope="col">Status</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $no = 1; ?>
                                     <?php foreach ($pickup as $p) : ?>
                                         <tr>
                                             <th scope="row"><?= $no; ?></th>
                                             <td><?= $p['nama']; ?> - <?= $p['no_hp']; ?></td>
                                             <td><?= $p['alamat']; ?></td>
                                             <td><?= $p['jumlah']; ?> PCS</td>
                                             <td><?= $p['kendaraan']; ?></td>
                                             <td><?= $p['waktu']; ?></td>
                                             <?php
                                                if ($p['status'] == "Menunggu Konfirmasi") {
                                                    $status = "warning";
                                                } else if ($p['status'] == "Kurir Sedang Dalam Perjalanan") {
                                                    $status = "info";
                                                } else if ($p['status'] == "Barang Sudah Diterima Kurir") {
                                                    $status = "success";
                                                } else {
                                                    $status = "danger";
                                                }
                                                ?>
                                             <td><button class="btn btn-<?= $status; ?> btn-sm text-white"><?= $p['status']; ?></button></td>
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
 </div>