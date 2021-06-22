 <!-- Begin Page Content -->
 <div class="container-fluid">


     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-12 col-lg-12">
             <!-- Flash Data menggunakan Sweet Alert -->
             <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
             <div class="card shadow mb-4">

                 <!-- LOOPING -->
                 <?php foreach ($kodebooking as $kd) : ?>
                     <div class="card shadow mb">
                         <div class="card-header py-3">
                             <h6 class="m-0 font-weight-bold text-primary">Kode Booking </h6>
                         </div>
                         <div class="card-body">
                             <center>
                                 <h6 style="font-size: 20px;"><b>Kode Booking kamu adalah :</b></h6>
                                 <h6 style="font-size: 35px; color:mediumblue"><b><?= $kd['kode_booking']; ?></b></h6><br>
                                 <button type="submit" onclick="history.back(-1)" class="btn btn-secondary">
                                     <span class="icon text-white-50">
                                     </span>
                                     <i class="fas fa-undo"></i>
                                     <span class="text">Kembali</span>
                                 </button>
                                 <a href="<?= base_url('pickup/index'); ?>">
                                     <button type="submit" class="btn btn-primary">
                                         <span class="icon text-white-50">
                                         </span>
                                         <i class="fas fa-map-marker-alt"></i>
                                         <span class="text">Pickup</span>
                                     </button></a>
                                 <a href="<?= base_url('booking/cetaklabel/' . $kd['id_booking']); ?>">
                                     <button type="submit" class="btn btn-success">
                                         <span class="icon text-white-50">
                                         </span>
                                         <i class="fas fa-print"></i>
                                         <span class="text">Cetak Label</span>
                                     </button></a>
                             </center>
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
                         <h6 class="m-0 font-weight-bold text-primary">Data Booking</h6>
                     </div>
                     <div class="card-body">
                         <div class="table">
                             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th scope="col">No</th>
                                         <th scope="col">Pengirim</th>
                                         <th scope="col">Asal</th>
                                         <th scope="col">Penerima</th>
                                         <th scope="col">Tujuan</th>
                                         <th scope="col">Isi</th>
                                         <th scope="col">Layanan</th>
                                         <th scope="col">Ongkir</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $no = 1; ?>
                                     <?php foreach ($kodebooking as $kd) : ?>
                                         <tr>
                                             <th scope="row"><?= $no; ?></th>
                                             <td><?= $kd['nama_pengirim']; ?></td>
                                             <td><?= $kd['kota_asal']; ?></td>
                                             <td><?= $kd['nama_penerima']; ?></td>
                                             <td><?= $kd['kota_tujuan']; ?></td>
                                             <td><?= $kd['isi_paket']; ?></td>
                                             <td><?= $kd['layanan']; ?></td>
                                             <td>Rp.<?= number_format($kd['ongkir'], '0', ',', '.'); ?></td>
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