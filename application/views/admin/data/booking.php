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
                         <h6 class="m-0 font-weight-bold text-primary">Data Booking</h6>
                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th>No</th>
                                         <th>Kode Booking</th>
                                         <th>Status</th>
                                         <th>Kota Asal</th>
                                         <th>Kota Tujuan</th>
                                         <th>Layanan</th>
                                         <th>Jenis</th>
                                         <th>isi</th>
                                         <th>Berat</th>
                                         <th>Tanggal</th>
                                         <th>Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $no = 1; ?>
                                     <?php foreach ($booking as $b) : ?>
                                         <tr>
                                             <th scope="row"><?= $no; ?></th>
                                             <td> <a class="btn btn-link" href="<?= base_url('data/bookingDetail/' . $b['id_booking']); ?>"><?= $b['kode_booking']; ?></a>
                                             </td>
                                             <?php
                                                if ($b['status'] == "Booking") {
                                                    $status = "warning";
                                                } else if ($b['status'] == "Manifest") {
                                                    $status = "info";
                                                } else if ($b['status'] == "On Process") {
                                                    $status = "primary";
                                                } else if ($b['status'] == "Received On Destination") {
                                                    $status = "secondary";
                                                } else if ($b['status'] == "Delivered") {
                                                    $status = "success";
                                                } else {
                                                    $status = "danger";
                                                }
                                                ?>
                                             <td><button class="badge badge-counter badge-<?= $status; ?> btn-sm text-white"><?= $b['status']; ?></button></td>
                                             <td><?= $b['kota_asal']; ?></td>
                                             <td><?= $b['kota_tujuan']; ?></td>
                                             <td><?= $b['layanan']; ?></td>
                                             <td><?= $b['jenis_kiriman']; ?></td>
                                             <td><?= $b['isi_paket']; ?></td>
                                             <td><?= $b['berat']; ?>KG</td>
                                             <td><?= $b['tanggal_booking']; ?></td>
                                             <th>
                                                 <form action="<?= base_url('pengiriman/konfir/' . $b['id_booking']); ?>" method="POST">
                                                     <?php
                                                        if ($b['status'] !== "Booking") { ?> <button href="" class="btn btn-success btn-sm" disabled><i class="fas fa-check"></i>&nbsp; Terkonfirmasi</button>
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