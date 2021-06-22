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
                         <h6 class="m-0 font-weight-bold text-primary">Data Pengiriman</h6>
                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th>No</th>
                                         <th>Kode Booking</th>
                                         <th>ID User</th>
                                         <th>Tanggal Booking</th>
                                         <th>Tanggal Konfirmasi</th>
                                         <th>Status</th>
                                         <th>No Resi</th>
                                         <th>Aksi</th>
                                         <th>Label</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $no = 1; ?>
                                     <?php foreach ($pengiriman as $ship) : ?>
                                         <tr>
                                             <th scope="row"><?= $no; ?></th>
                                             <td><?= $ship['kode_booking']; ?></td>
                                             <td><?= $ship['id_user']; ?></td>
                                             <td><?= $ship['tanggal_booking']; ?></td>
                                             <td><?= $ship['tanggal_konfirm']; ?></td>
                                             <?php
                                                if ($ship['status'] == "Booking") {
                                                    $status = "warning";
                                                } else if ($ship['status'] == "Manifest") {
                                                    $status = "info";
                                                } else if ($ship['status'] == "On Process") {
                                                    $status = "primary";
                                                } else if ($ship['status'] == "Received On Destination") {
                                                    $status = "secondary";
                                                } else if ($ship['status'] == "Delivered") {
                                                    $status = "success";
                                                } else {
                                                    $status = "danger";
                                                }
                                                ?>
                                             <td><button class="badge badge-counter badge-<?= $status; ?> btn-sm text-white"><?= $ship['status']; ?></button>
                                             </td>
                                             <td><?= $ship['no_resi']; ?></td>
                                             <th>
                                                 <form action="<?= base_url('pengiriman/updateresi/' . $ship['id_booking']); ?>" method="POST">
                                                     <?php
                                                        if ($ship['no_resi'] == "-") { ?><button type="submit" class="btn btn-primary btn-sm my-2"><i class="fas fa-exclamation"></i>&nbsp; Update Resi</button>
                                                     <?php } else { ?>
                                                         <button href="" class="btn btn-success btn-sm" disabled><i class="fas fa-check"></i>&nbsp; Berhasil</button>
                                                     <?php } ?>
                                                 </form>
                                             </th>
                                             <th>
                                                 <center>
                                                     <a href="<?= base_url('pengiriman/cetakresi/' . $ship['id_booking']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-print"></i>&nbsp; Cetak</a>
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


 <!-- Sweet alert batal -->
 <script type="text/javascript">
     $('.batal').on('click', function(e) {

         e.preventDefault();
         const href = $(this).attr('href');

         Swal.fire({
             title: 'Apakah anda yakin?',
             text: "Booking ini akan dibatalkan",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Ya, batalkan'
         }).then((result) => {
             if (result.value) {
                 document.location.href = href;
                 Swal.fire(
                     'Dibatalkan!',
                     'Booking ini berhasil dibatalkan.',
                     'success'
                 )
             }
         })
     });
 </script>


 <!-- Scipt databale -->
 <script>
     $(document).ready(function() {
         $('#dataTable').DataTable();
     });
 </script>