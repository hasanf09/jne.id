 <!-- Begin Page Content -->
 <div class="container-fluid">


     <!-- Content Row -->

     <div class="row">
         <!-- Area Chart -->
         <div class="col-xl-12 col-lg-10">
             <a href="<?= base_url('laporan/cetak_laporan_pickup'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Cetak</a>
             <!-- <a href="<?= base_url('laporan/laporan_pickup_pdf'); ?>" class="btn btn-danger mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a> -->
             <a href="<?= base_url('laporan/pickup_export_excel'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Download Excel</a>
             <div class="card shadow mb-4" style="width: 100%">
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-sm" width="100%" cellspacing="0">
                             <thead>
                                 <tr>
                                     <th>No</th>
                                     <th>Tanggal</th>
                                     <th>Nama</th>
                                     <th>No Hp</th>
                                     <th>Email</th>
                                     <th>Alamat</th>
                                     <th>Barang</th>
                                     <th>Jumlah</th>
                                     <th>Kendaraan</th>
                                     <th>Jadwal</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $no = 1; ?>
                                 <?php foreach ($pickup as $b) : ?>
                                     <tr>
                                         <th scope="row"><?= $no; ?></th>
                                         <td><?= $b['tanggal_pickup']; ?></td>
                                         <td><?= $b['nama']; ?></td>
                                         <td><?= $b['no_hp']; ?></td>
                                         <td><?= $b['email']; ?></td>
                                         <td><?= $b['alamat']; ?></td>
                                         <td><?= $b['barang']; ?></td>
                                         <td><?= $b['jumlah']; ?></td>
                                         <td><?= $b['kendaraan']; ?></td>
                                         <td><?= $b['waktu']; ?></td>
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