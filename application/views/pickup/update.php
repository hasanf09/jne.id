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
                         <h6 class="m-0 font-weight-bold text-primary">Update Status Pickup</h6>
                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th>No</th>
                                         <th>ID User</th>
                                         <th>Nama Customer</th>
                                         <th>Alamat</th>
                                         <th>Nama Kurir</th>
                                         <th>Kendaraan</th>
                                         <th>Jenis Kendaraan</th>
                                         <th>Nomor Polisi</th>
                                         <th>Tanggal</th>
                                         <th>Status</th>
                                         <th>Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $no = 1; ?>
                                     <?php foreach ($pickup as $p) : ?>
                                         <tr>
                                             <th scope="row"><?= $no; ?></th>
                                             <td><?= $p['id_user']; ?></td>
                                             <td><?= $p['nama']; ?> - <?= $p['no_hp']; ?></td>
                                             <td><?= $p['alamat']; ?></td>
                                             <td><?= $p['nama_kurir']; ?> - <?= $p['nohp_kurir']; ?></td>
                                             <td><?= $p['kendaraan']; ?></td>
                                             <td><?= $p['jenis_kendaraan']; ?></td>
                                             <td><?= $p['nopol']; ?></td>
                                             <td><?= $p['tanggal_pickup']; ?></td>
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
                                             </td>
                                             <th>
                                                 <form action="<?= base_url('pickup/updatepickup/' . $p['id_pickup']); ?>" method="POST">
                                                     <?php
                                                        if ($p['status'] == "Barang Sudah Diterima Kurir") { ?> <button href="" class="btn btn-success btn-sm" disabled><i class="fas fa-check"></i>&nbsp; Selesai</button>
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