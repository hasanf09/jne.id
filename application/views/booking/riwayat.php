 <!-- Begin Page Content -->
 <div class="container-fluid">


     <!-- Content Row -->

     <div class="row">

         <!-- Area INFO  -->
         <div class="col-lg-12 mb-4">
             
         </div>
         <!-- Area Card Body -->
         <div class="col-xl-12 col-lg-10">
             <!-- Flash Data menggunakan Sweet Alert -->
             <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
             <div class="card shadow mb-4">
                 <!-- DataTales Example -->
                 <div class="card shadow mb">
                     <div class="card-header py-3">
                         <h6 class="m-0 font-weight-bold text-primary">Riwayat Booking</h6>
                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th>No</th>
                                         <th>Kode Booking</th>
                                         <th>Nama Pengirim</th>
                                         <th>Nama Penerima</th>
                                         <th>Tanggal Booking</th>
                                         <th>Resi</th>
                                         <th>Status</th>
                                         <th>Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $no = 1; ?>
                                     <?php foreach ($riwayat as $rw) : ?>
                                         <tr>
                                             <th scope="row"><?= $no; ?></th>
                                             <td><?= $rw['kode_booking']; ?></a></td>
                                             <td><?= $rw['nama_pengirim']; ?> - <?= $rw['nohp_pengirim']; ?></td>
                                             <td><?= $rw['nama_penerima']; ?> - <?= $rw['nohp_penerima']; ?></td>
                                             <td><?= $rw['tanggal_booking']; ?></td>
                                             <td><?= $rw['no_resi']; ?></td>
                                             <?php
                                                if ($rw['status'] == "Booking") {
                                                    $status = "warning";
                                                } else if ($rw['status'] == "Manifest") {
                                                    $status = "info";
                                                } else if ($rw['status'] == "On Process") {
                                                    $status = "primary";
                                                } else if ($rw['status'] == "Received On Destination") {
                                                    $status = "secondary";
                                                } else if ($rw['status'] == "Delivered") {
                                                    $status = "success";
                                                } else {
                                                    $status = "danger";
                                                }
                                                ?>
                                             <td><button class="btn btn-<?= $status; ?> btn-sm"><?= $rw['status']; ?></button>
                                             </td>
                                             <th>
                                                 <center>
                                                     <?php
                                                        if ($rw['status'] !== "Booking") { ?><a href="<?= base_url('booking/cetaklabel/' . $rw['id_booking']); ?>" class="badge badge-primary"><i class="fas fa-print"></i> Cetak</a>
                                                     <?php } else { ?>
                                                         <a href="<?= base_url('booking/cetaklabel/' . $rw['id_booking']); ?>" class="badge badge-primary"><i class="fas fa-print"></i> Cetak</a>
                                                         <a href="<?= base_url('booking/hapusbooking/' . $rw['id_booking']); ?>" name=" batal" id="batal" class="badge badge-danger batal"><i class="fas fa-close"></i> Batal</a>
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