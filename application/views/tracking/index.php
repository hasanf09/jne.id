 <!-- Begin Page Content -->
 <div class="container-fluid">


     <!-- Content Row -->

     <div class="row">
         <!-- Area Chart -->
         <div class="col-xl-12 col-lg-10">
             <div class="card shadow mb-4">

                 <!-- DataTales Example -->
                 <div class="card shadow mb">
                     <div class="card-header py-3">
                         <h6 class="m-0 font-weight-bold text-primary">Pengiriman</h6>
                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th>No</th>
                                         <th>No Resi</th>
                                         <th>Status</th>
                                         <th>Keterangan</th>
                                         <th>Pengirim</th>
                                         <th>Penerima</th>
                                         <th>Tanggal</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $no = 1; ?>
                                     <?php foreach ($tracking as $t) : ?>
                                         <tr>
                                             <th scope="row"><?= $no; ?></th>
                                             <td><?= $t['no_resi']; ?></td>
                                             <?php
                                                if ($t['status'] == "Booking") {
                                                    $status = "warning";
                                                } else if ($t['status'] == "Manifest") {
                                                    $status = "info";
                                                } else if ($t['status'] == "On Process") {
                                                    $status = "primary";
                                                } else if ($t['status'] == "Received On Destination") {
                                                    $status = "secondary";
                                                } else if ($t['status'] == "Delivered") {
                                                    $status = "success";
                                                } else {
                                                    $status = "danger";
                                                }
                                                ?>
                                             <td><button class="btn btn-<?= $status; ?> btn-sm"><?= $t['status']; ?></button>
                                             </td>
                                             <?php
                                                if ($t['status'] == "Manifest") {
                                                    $ket = "Paket sudah diterima, menunggu untuk dikirim";
                                                } else if ($t['status'] == "On Process") {
                                                    $ket = "Paket sedang dalam proses pengiriman/perjalanan ke kota tujuan";
                                                } else if ($t['status'] == "Received On Destination") {
                                                    $ket = "Paket sudah sampai di kota tujuan, dan akan dikirim ke alamat tujuan";
                                                } else if ($t['status'] == "Delivered") {
                                                    $ket = "Paket sudah sampai / diterima.";
                                                } else {
                                                    $ket = "Pengiriman Gagal";
                                                }
                                                ?>
                                             <td><?= $ket;  ?></td>
                                             <td><?= $t['nama_pengirim']; ?> - <?= $t['nohp_pengirim']; ?></td>
                                             <td><?= $t['nama_penerima']; ?> - <?= $t['nohp_penerima']; ?></td>
                                             <td><?= $t['tanggal_konfirm']; ?></td>
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


 <!-- Scipt databale -->
 <script>
     $(document).ready(function() {
         $('#dataTable').DataTable();
     });
 </script>