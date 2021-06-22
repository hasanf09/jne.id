 <!-- Begin Page Content -->
 <div class="container-fluid">


     <!-- Content Row -->

     <div class="row">

         <!-- Area Card Body -->
         <div class="col-xl-12 col-lg-10">
             <!-- Flash Data menggunakan Sweet Alert -->
             <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
             <div class="card shadow mb-4">
                 <!-- DataTales Example -->
                 <div class="card shadow mb">
                     <div class="card-header py-3">
                         <h6 class="m-0 font-weight-bold text-primary">Riwayat Pickup</h6>
                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th>No</th>
                                         <th>Tanggal Pickup</th>
                                         <th>Nama</th>
                                         <th>Alamat</th>
                                         <th>Kendaraan</th>
                                         <th>Status</th>
                                         <th>Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $no = 1; ?>
                                     <?php foreach ($pickup as $p) : ?>
                                         <tr>
                                             <th scope="row"><?= $no; ?></th>
                                             <td><?= $p['tanggal_pickup']; ?></td>
                                             <td><?= $p['nama']; ?> - <?= $p['no_hp']; ?></td>
                                             <td><?= $p['alamat']; ?></td>
                                             <td><?= $p['kendaraan']; ?></td>
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
                                             </td>
                                             <th>
                                                 <center>
                                                     <?php
                                                        if ($p['status'] !== "Menunggu Konfirmasi") { ?> <button href="" name=" batal" id="batal" class="badge badge-danger batal" disabled><i class="fas fa-close"></i> Batal</button>
                                                     <?php } else { ?>
                                                         <a href="<?= base_url('pickup/hapuspickup/' . $p['id_pickup']); ?>" name=" batal" id="batal" class="badge badge-danger batal"><i class="fas fa-close"></i> Batal</a>
                                                     <?php } ?>
                                                 </center>
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