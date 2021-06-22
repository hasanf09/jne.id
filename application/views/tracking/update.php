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
                         <h6 class="m-0 font-weight-bold text-primary">Update Status Pengiriman</h6>
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
                                         <th>Tanggal</th>
                                         <th>Aksi</th>
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
                                             <td><button class="badge badge-counter badge-<?= $status; ?>"><?= $t['status']; ?></button>
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
                                             <td><?= $t['tanggal_konfirm']; ?></td>
                                             <th>
                                                 <form action="<?= base_url('tracking/updateProcess/' . $t['id_booking']); ?>" method="POST">
                                                     <?php
                                                        if ($t['status'] == "Delivered") { ?> <button href="" class="btn btn-success btn-sm" disabled><i class="fas fa-check"></i>&nbsp; Selesai</button>
                                                     <?php } else { ?>
                                                         <button type="submit" class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Update</button>
                                                     <?php } ?>
                                                 </form>

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


 <!-- Scipt databale -->
 <script>
     $(document).ready(function() {
         $('#dataTable').DataTable();
     });
 </script>