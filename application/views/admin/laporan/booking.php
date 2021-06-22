 <!-- Begin Page Content -->
 <div class="container-fluid">


     <!-- Content Row -->
     <div class="row">
         <div class="col-xl-12 col-lg-10">
             <a href="<?= base_url('laporan/cetak_laporan_booking'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Cetak</a>
             <!-- <a href="<?= base_url('laporan/laporan_booking_pdf'); ?>" class="btn btn-danger mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a> -->
             <a href="<?= base_url('laporan/booking_export_excel'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Download Excel</a>
             <div class="card shadow mb-4" style="width: 100%">
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-sm" width="100%" cellspacing="0">
                             <thead>
                                 <tr>
                                     <th>No</th>
                                     <th>Tanggal</th>
                                     <th>Kode Booking</th>
                                     <th>No Resi</th>
                                     <th>Pengirim</th>
                                     <th>Penerima</th>
                                     <th>Asal</th>
                                     <th>Tujuan</th>
                                     <th>Isi</th>
                                     <th>Berat</th>
                                     <th>Status</th>
                                     <th>Ongkir</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $no = 1; ?>
                                 <?php foreach ($booking as $b) : ?>
                                     <tr>
                                         <th scope="row"><?= $no; ?></th>
                                         <td><?= $b['tanggal_booking']; ?></td>
                                         <td><?= $b['kode_booking']; ?></td>
                                         <td><?= $b['no_resi']; ?></td>
                                         <td><?= $b['nama_pengirim']; ?></td>
                                         <td><?= $b['nama_penerima']; ?></td>
                                         <td><?= $b['kota_asal']; ?></td>
                                         <td><?= $b['kota_tujuan']; ?></td>
                                         <td><?= $b['isi_paket']; ?></td>
                                         <td><?= $b['berat']; ?></td>
                                         <td><?= $b['status']; ?></td>
                                         <td><?= $b['ongkir']; ?></td>
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
 <!-- End of Main Content -->