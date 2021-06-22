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
                         <h6 class="m-0 font-weight-bold text-primary">Data Pickup</h6>
                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th>No</th>
                                         <!-- <th>ID User</th> -->
                                         <th>Nama Customer</th>
                                         <th>Status</th>
                                         <th>Email</th>
                                         <th>Alamat</th>
                                         <th>Barang</th>
                                         <th>Jumlah Barang</th>
                                         <th>Kendaraan</th>
                                         <th>Catatan (Opsional)</th>
                                         <th>Jadwal pickup</th>
                                         <th>Tanggal Pickup</th>
                                         <th>Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $no = 1; ?>
                                     <?php foreach ($pickup as $p) : ?>
                                         <tr>
                                             <th scope="row"><?= $no; ?></th>
                                             <!-- <td><?= $p['id_user']; ?></td> -->
                                             <td><?= $p['nama']; ?> - <?= $p['no_hp']; ?></td>
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
                                             <td><button class="badge badge-counter badge-<?= $status; ?> btn-sm text-white"><?= $p['status']; ?></button></td>
                                             <td><?= $p['email']; ?></td>
                                             <td><?= $p['alamat']; ?></td>
                                             <td><?= $p['barang']; ?></td>
                                             <td><?= $p['jumlah']; ?></td>
                                             <td><?= $p['kendaraan']; ?></td>
                                             <td><?= $p['note']; ?></td>
                                             <td><?= $p['waktu']; ?></td>
                                             <td><?= $p['tanggal_pickup']; ?></td>
                                             <th>
                                                 <form action="<?= base_url('pickup/konfir/' . $p['id_pickup']); ?>" method="POST">
                                                     <?php
                                                        if ($p['status'] !== "Menunggu Konfirmasi") { ?> <button href="" class="btn btn-success btn-sm" disabled><i class="fas fa-check"></i>&nbsp; Terkonfirmasi</button>
                                                     <?php } else { ?>
                                                         <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-exclamation"></i>&nbsp; Konfirmasi</button>
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

 <!-- Scipt databale-->
 <script>
     $(document).ready(function() {
         $('#dataTable').DataTable();
     });
 </script>
 <!-- End script datable -->