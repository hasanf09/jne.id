 <!-- Begin Page Content -->
 <div class="container-fluid">


     <!-- Content Row -->

     <div class="row">
         <!-- Area Chart -->
         <div class="col-xl-12 col-lg-10">
             <?php if (validation_errors()) { ?>
                 <div class="alert alert-danger" role="alert">
                     <?= validation_errors(); ?>
                 </div>
             <?php } ?>
             <!-- Flash Data menggunakan Sweet Alert -->
             <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
             <!-- END Of Flash Data Sweet Alert -->

             <div class="card shadow mb-4">
                 <!-- DataTales Example -->
                 <div class="card shadow mb">
                     <div class="card-header py-3">
                         <h6 class="m-0 font-weight-bold text-primary">Data Kurir</h6>
                     </div>
                     <div class="card-body">
                         <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#kurirBaruModal"><i class="fas fa-plus"></i> Tambah Kurir</a>
                         <div class="table-responsive">
                             <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th>No</th>
                                         <th>Nama</th>
                                         <th>No HP</th>
                                         <th>Cabang</th>
                                         <th>Kendaraan</th>
                                         <th>Jenis Kendaraan</th>
                                         <th>Nomor Polisi</th>
                                         <th>Status</th>
                                         <th>Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $no = 1; ?>
                                     <?php foreach ($kurir as $k) : ?>
                                         <tr>
                                             <th scope="row"><?= $no; ?></th>
                                             <td><?= $k['nama_kurir']; ?></td>
                                             <td><?= $k['nohp_kurir']; ?></td>
                                             <td><?= $k['cabang']; ?></td>
                                             <td><?= $k['kendaraan']; ?></td>
                                             <td><?= $k['jenis_kendaraan']; ?></td>
                                             <td><?= $k['nopol']; ?></td>
                                             <td><?= $k['status']; ?></td>
                                             <th>
                                                 <a href="" class="btn btn-circle btn-primary btn-sm my-2" data-toggle="modal" data-target="#ubahKurirModal<?= $k['id_kurir']; ?>"><i class="far fa-edit"></i></a>
                                                 <a href="<?= base_url('kurir/hapuskurir/' . $k['id_kurir']); ?>" name=" batal" id="batal" class="btn btn-circle btn-danger btn-sm batal"><i class="fas fa-close"></i></a>

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

 <!-- Modal Tambah Kurir Baru -->
 <div class="modal fade" id="kurirBaruModal" tabindex="-1" role="dialog" aria-labelledby="kurirBaruModalLabel" aria-hidden="true">
     <div class="modal-dialog" role=" document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="kurirBaruModalLabel"><strong> Tambah Data Kurir Baru </strong></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="<?= base_url('kurir/index'); ?>" method="POST" enctype="multipart/form-data">
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="nama">Nama</label>
                         <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kurir">
                     </div>
                     <div class="form-group">
                         <label for="no_hp">No HP</label>
                         <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="No Hp Kurir">
                     </div>
                     <div class="form-group">
                         <label for="">Cabang </label>
                         <select class="form-control" id="cabang" name="cabang">
                             <option>-- Pilih Cabang --</option>
                             <option value="Bali">Denpasar - Bali</option>
                             <option value="Bali">Tuban - Bali</option>
                             <option value="Bali">Ubud - Bali</option>
                             <option value="Bali">Tabanan - Bali</option>
                             <option value="Bali">Singaraja - Bali</option>
                             <option value="Jakarta">S Parman - Jakarta Barat</option>
                             <option value="Jakarta">Gajah Mada - Jakarta Barat</option>
                             <option value="Jakarta">Tubagus Angke - Jakarta Barat</option>
                             <option value="Jakarta">Meruya - Jakarta Barat</option>
                             <option value="Jakarta">Mangga Besar - Jakarta Barat</option>
                             <option value="Jakarta">Senen - Jakarta Pusat</option>
                             <option value="Jakarta">Kebon Kacang - Jakarta Pusat</option>
                             <option value="Jakarta">ASP Sevel Cikini - Jakarta Pusat</option>
                             <option value="Jakarta">KH Hasyim Ashari - Jakarta Pusat</option>
                             <option value="Jakarta">Pondok Indah - Jakarta Selatan</option>
                             <option value="Jakarta">Fatmawati - Jakarta Selatan</option>
                             <option value="Jakarta">Mampang - Jakarta Selatan</option>
                             <option value="Jakarta">Casablanca - Jakarta Selatan</option>
                             <option value="Jakarta">Pondok Pinang - Jakarta Selatan</option>
                             <option value="Jakarta">Pasar Minggu - Jakarta Selatan</option>
                             <option value="Jakarta">Kelapa Gading - Jakarta Utara</option>
                             <option value="Jakarta">Sunter - Jakarta Utara</option>
                             <option value="Jakarta">Dewi Sartika - Jakarta Timur</option>
                             <option value="Jakarta">Rawamangun - Jakarta Timur</option>
                             <option value="Jakarta">Kalimalang - Jakarta Timur</option>
                             <option value="Jakarta">Matraman - Jakarta Timur</option>
                             <option value="Aceh">Kota Banda Aceh - Aceh Darussalam</option>
                             <option value="Aceh">Subulussalam - Aceh Darussalam</option>
                             <option value="Aceh">Tapaktuan - Aceh Darussalam</option>
                             <option value="Aceh">Kuta Cane - Aceh Darussalam</option>
                             <option value="Aceh">Kuta Binje - Aceh Darussalam</option>
                             <option value="Aceh">Takengon - Aceh Darussalam</option>
                             <option value="Aceh">Meulaboh - Aceh Darussalam</option>
                             <option value="Aceh">Sigli - Aceh Darussalam</option>
                             <option value="Aceh">Bireuen - Aceh Darussalam</option>
                             <option value="Aceh">Krueng Geukuh - Aceh Darussalam</option>
                             <option value="Aceh">Lhoksukon - Aceh Darussalam</option>
                             <option value="Aceh">Blang Pidie - Aceh Darussalam</option>
                             <option value="Aceh">Blang Kejeren - Aceh Darussalam</option>
                             <option value="Aceh">Kuala Simpang - Aceh Darussalam</option>
                             <option value="Aceh">Nagan Raya - Aceh Darussalam</option>
                             <option value="Aceh">Kota Sabang - Aceh Darussalam</option>
                             <option value="Aceh">Kota Langsa - Aceh Darussalam</option>
                             <option value="Aceh">Lhokseumawe - Aceh Darussalam</option>
                             <option value="Sumut">Medan - Sumatera Utara</option>
                             <option value="Sumut">Indrapura - Sumatera Utara</option>
                             <option value="Sumut">Kisaran - Sumatera Utara</option>
                             <option value="Sumut">Sidikalang - Sumatera Utara</option>
                             <option value="Sumut">Lubuk Pakam - Sumatera Utara</option>
                             <option value="Sumut">Kabanjahe - Sumatera Utara</option>
                             <option value="Sumut">Binjai - Sumatera Utara</option>
                             <option value="Sumut">Nias - Sumatera Utara</option>
                             <option value="Sumut">Padang Sidempuan - Sumatera Utara</option>
                             <option value="Sumut">Pematang Siantar - Sumatera Utara</option>
                             <option value="Sumut">Sibolga - Sumatera Utara</option>
                             <option value="Sumut">Tanjung Balai - Sumatera Utara</option>
                             <option value="Sumut">Labuhan Batu - Sumatera Utara</option>
                             <option value="Sumut">Rantau Prapat - Sumatera Utara</option>
                             <option value="Sumut">Aek Kanopan - Sumatera Utara</option>
                             <option value="Sumut">Rampah - Sumatera Utara</option>
                             <option value="Sumut">Stabat - Sumatera Utara</option>
                             <option value="Sumut">Penyabungan - Sumatera Utara</option>
                             <option value="Sumut">Salak - Sumatera Utara</option>
                             <option value="Sumut">Pangururan - Sumatera Utara</option>
                             <option value="Sumut">Perdagangan - Sumatera Utara</option>
                             <option value="Sumut">Batang Toru - Sumatera Utara</option>
                             <option value="Sumut">Pancur Batu - Sumatera Utara</option>
                             <option value="Sumut">Sibuhuan - Sumatera Utara</option>
                             <option value="Sumut">Tarutung - Sumatera Utara</option>
                             <option value="Sumut">Belawan - Sumatera Utara</option>
                             <option value="Sumut">Marelan - Sumatera Utara</option>
                             <option value="Sumut">Balige - Sumatera Utara</option>
                             <option value="Sumbar">Padang - Sumatera Barat</option>
                             <option value="Sumbar">Mentawai - Sumatera Barat</option>
                             <option value="Sumbar">Painan - Sumatera Barat</option>
                             <option value="Sumbar">Solok - Sumatera Barat</option>
                             <option value="Sumbar">Sawahlunto - Sumatera Barat</option>
                             <option value="Sumbar">Batu Sangkar - Sumatera Barat</option>
                             <option value="Sumbar">Sicincin - Sumatera Barat</option>
                             <option value="Sumbar">Lubuk Alung - Sumatera Barat</option>
                             <option value="Sumbar">Lubuk Basung Agam - Sumatera Barat</option>
                             <option value="Sumbar">Lubuk Sikaping - Sumatera Barat</option>
                             <option value="Sumbar">Muara Labuh - Sumatera Barat</option>
                             <option value="Sumbar">Gunung Medan - Sumatera Barat</option>
                             <option value="Sumbar">Simpang Empat - Sumatera Barat</option>
                             <option value="Sumbar">Ujung Gading - Sumatera Barat</option>
                             <option value="Sumbar">Padang Panjang - Sumatera Barat</option>
                             <option value="Sumbar">Bukit Tinggi - Sumatera Barat</option>
                             <option value="Sumbar">Payakumbuh - Sumatera Barat</option>
                             <option value="Bengkulu">Bengkulu</option>
                             <option value="Bengkulu">Manna - Bengkulu</option>
                             <option value="Bengkulu">Curup - Bengkulu</option>
                             <option value="Bengkulu">Arga Makmur - Bengkulu</option>
                             <option value="Bengkulu">Kaur - Bengkulu</option>
                             <option value="Bengkulu">Mukomuko - Bengkulu</option>
                             <option value="Bengkulu">Kepahiang - Bengkulu</option>
                             <option value="Jambi">Jambi</option>
                             <option value="Jambi">Kerinci - Jambi</option>
                             <option value="Jambi">Bangko - Jambi</option>
                             <option value="Jambi">Sarolangun - Jambi</option>
                             <option value="Jambi">Bulian - Jambi</option>
                             <option value="Jambi">Muaro Sabak - Jambi</option>
                             <option value="Jambi">Tebing Tinggi - Jambi</option>
                             <option value="Jambi">Tungkal - Jambi</option>
                             <option value="Jambi">Muaro Bungo - Jambi</option>
                             <option value="Riau">Pekanbaru - Riau</option>
                             <option value="Riau">Ujung Tanjung - Riau</option>
                             <option value="Riau">Teluk Kuantan - Riau</option>
                             <option value="Riau">Rengat - Riau</option>
                             <option value="Riau">Tembilahan - Riau</option>
                             <option value="Riau">Pangkalan Kerinci - Riau</option>
                             <option value="Riau">Lubuk Sakat - Riau</option>
                             <option value="Riau">Siak - Riau</option>
                             <option value="Riau">Perawang - Riau</option>
                             <option value="Riau">Bangkinang - Riau</option>
                             <option value="Riau">Ujung Batu - Riau</option>
                             <option value="Riau">Bagan Siapiapi - Riau</option>
                             <option value="Riau">Bengkalis - Riau</option>
                             <option value="Riau">Duri - Riau</option>
                             <option value="Riau">Meranti - Riau</option>
                             <option value="Riau">Dumal - Riau</option>
                             <option value="Riau">Batam - Kepulauaun Riau</option>
                             <option value="Riau">Tanjung Pinang - Kepulauaun Riau</option>
                             <option value="Riau">Tanjung Balai Karimun - Kepulauaun Riau</option>
                             <option value="Riau">Tanjung Batu - Kepulauaun Riau</option>
                             <option value="Riau">Ranai - Kepulauaun Riau</option>
                             <option value="Riau">Dabo Singkep - Kepulauaun Riau</option>
                             <option value="Bangka">Pangkal Pinang - Bangka Belitung</option>
                             <option value="Bangka">Tanjung Pandan - Bangka Belitung</option>
                             <option value="Bangka">Sungai Liat - Bangka Belitung</option>
                             <option value="Bangka">Belinyu - Bangka Belitung</option>
                             <option value="Bangka">Sunghin - Bangka Belitung</option>
                             <option value="Bangka">Kenanga - Bangka Belitung</option>
                             <option value="Bangka">Kelapa - Bangka Belitung</option>
                             <option value="Bangka">Mentok - Bangka Belitung</option>
                             <option value="Bangka">Jebus - Bangka Belitung</option>
                             <option value="Bangka">Koba - Bangka Belitung</option>
                             <option value="Bangka">Batu Rasa - Bangka Belitung</option>
                             <option value="Bangka">Toboali - Bangka Belitung</option>
                             <option value="Bangka">Manggar - Bangka Belitung</option>
                             <option value="Bangka">Gantung - Bangka Belitung</option>
                             <option value="Bangka">Kelapa Kampit - Bangka Belitung</option>
                             <option value="Sumsel">Palembang - Sumatera Selatan</option>
                             <option value="Sumsel">Batu Raja - Sumatera Selatan</option>
                             <option value="Sumsel">Batumarta - Sumatera Selatan</option>
                             <option value="Sumsel">Kayu Agung - Sumatera Selatan</option>
                             <option value="Sumsel">Muara Enim - Sumatera Selatan</option>
                             <option value="Sumsel">Tanjung Enim - Sumatera Selatan</option>
                             <option value="Sumsel">Pendopo Talang Ubi- Sumatera Selatan</option>
                             <option value="Sumsel">Tebat Agung - Sumatera Selatan</option>
                             <option value="Sumsel">Lahat - Sumatera Selatan</option>
                             <option value="Sumsel">Lubuk Linggau - Sumatera Selatan</option>
                             <option value="Sumsel">Sekayu - Sumatera Selatan</option>
                             <option value="Sumsel">Sungai Lilin - Sumatera Selatan</option>
                             <option value="Sumsel">Pangkalan Balai - Sumatera Selatan</option>
                             <option value="Sumsel">Betung - Sumatera Selatan</option>
                             <option value="Lampung">Liwa - Lampung</option>
                             <option value="Lampung">Kotabumi - Lampung</option>
                             <option value="Lampung">Metro - Lampung</option>
                             <option value="Jabar">Bogor - Jawa Barat</option>
                             <option value="Jabar">Ciamis - Jawa Barat</option>
                             <option value="Jabar">Subang - Jawa Barat</option>
                             <option value="Jabar">Bandung - Jawa Barat</option>
                             <option value="Jabar">Bekasi - Jawa Barat</option>
                             <option value="Banten">Tangerang - Banten</option>
                             <option value="Banten">Serpong - Banten</option>
                             <option value="Banten">Bintaro - Banten</option>
                             <option value="Banten">Ciledug - Banten</option>
                             <option value="Jateng">Solo - Jawa Tengah</option>
                             <option value="Jateng">Semarang - Jawa Tengah</option>
                             <option value="Jateng">Tegal - Jawa Tengah</option>
                             <option value="Jateng">Salatiga - Jawa Tengah</option>
                             <option value="Jateng">Cilacap - Jawa Tengah</option>
                             <option value="Yogya">Yogyakarta</option>
                             <option value="Yogya">Wonosari - Yogyakarta</option>
                             <option value="Yogya">Wates - Yogyakarta</option>
                             <option value="Jatim">Surabaya - Jawa Timur</option>
                             <option value="Jatim">Banyuwangi - Jawa Timur</option>
                             <option value="Jatim">Lumajang - Jawa Timur</option>
                             <option value="Jatim">Situbondo - Jawa Timur</option>
                             <option value="Jatim">Blitar - Jawa Timur</option>
                             <option value="NTB">Mataram - Nusa Tenggara Barat</option>
                             <option value="NTB">Bima - Nusa Tenggara Barat</option>
                             <option value="NTB">Praya - Nusa Tenggara Barat</option>
                             <option value="NTT">Kupang - Nusa Tenggara Timur</option>
                             <option value="NTT">Maumere - Nusa Tenggara Timur</option>
                             <option value="NTT">Ende - Nusa Tenggara Timur</option>
                             <option value="Kalbar">Pontianak - Kalimantan Barat</option>
                             <option value="Kalbar">Sambas - Kalimantan Barat</option>
                             <option value="Kalbar">Ketapang - Kalimantan Barat</option>
                             <option value="Kalteng">Palangkaraya - Kalimantan Tengah</option>
                             <option value="Kalteng">Sampit - Kalimantan Tengah</option>
                             <option value="Kalteng">Kasongan - Kalimantan Tengah</option>
                             <option value="Kalsel">Tanjung - Kalimantan Selatan</option>
                             <option value="Kalsel">Rantau - Kalimantan Selatan</option>
                             <option value="Kalsel">Barabai - Kalimantan Selatan</option>
                             <option value="Kaltim">Balikpapan - Kalimantan Timur</option>
                             <option value="Kaltim">Markoni - Kalimantan Timur</option>
                             <option value="Kaltim">Samarinda - Kalimantan Timur</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="">Kendaraan</label>
                         <select class="form-control" id="kendaraan" name="kendaraan">
                             <option>-- Pilih Jenis Kendaraan --</option>
                             <option value="Mobil">Mobil</option>
                             <option value="Motor">Motor</option>
                             <option value="Pick Up">Pick Up</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="">Jenis Kendaraan</label>
                         <input type="text" class="form-control" id="jenis_kendaraan" name="jenis_kendaraan" placeholder="Honda Vario 234">
                     </div>
                     <div class="form-group">
                         <label for="">Nomor Polisi</label>
                         <input type="text" class="form-control" id="nopol" name="nopol" placeholder="B 1234 AB">
                     </div>
                     <div class="form-group">
                         <label for="">Status</label>
                         <select class="form-control" id="status" name="status">
                             <option>-- Pilih Status --</option>
                             <option value="Tersedia">Tersedia</option>
                             <option value="Tidak Tersedia">Tidak tersedia</option>
                         </select>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                     <button type="submit" class="btn btn-primary">Tambah</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!-- End Of modal tambah kurir baru -->

 <!-- Scripu Ubah Kurir -->
 <?php foreach ($kurir as $k) : ?>
     <div class="modal fade" id="ubahKurirModal<?= $k['id_kurir']; ?>" tabindex="-1" role="dialog" aria-labelledby="ubahKurirModalLabel" aria-hidden="true">
         <div class="modal-dialog" role=" document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="ubahKurirModalLabel"><strong> Ubah Data Kurir </strong></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <?= form_open_multipart('kurir/ubahkurir'); ?>
                 <div class="modal-body">
                     <div class="col-md-12 my-2">
                     </div>
                     <div class="form-group">
                         <label for="nama">Nama</label>
                         <input type="hidden" class="form-control" id="id_kurir" name="id_kurir" value="<?= $k['id_kurir']; ?>">
                         <input type="text" class="form-control" id="nama" name="nama" value="<?= $k['nama_kurir']; ?>">
                     </div>
                     <div class="form-group">
                         <label for="no_hp">No HP</label>
                         <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $k['nohp_kurir']; ?>">
                     </div>
                     <div class="form-group">
                         <label for="">Cabang </label>
                         <select class="form-control" id="cabang" name="cabang" value="$k['cabang']">
                             <?php
                                $cabang = array('Bali', 'Jakarta', 'Aceh', 'Sumut', 'Sumbar', 'Bengkulu', 'Jambi', 'Riau', 'Bangka', 'Sumsel', 'Lampung', 'Jabar', 'Banten', 'Jateng', 'Yogya', 'Jatim', 'NTB', 'NTT', 'Kalbar', 'Kalteng', 'Kalsel', 'Kaltim');
                                foreach ($cabang as $key => $val) {
                                ?>
                                 <option value="<?= $val; ?>" <?php if ($val == $k['cabang']) {
                                                                    echo " selected='selected'";
                                                                } ?>><?= $val; ?></option>
                             <?php } ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="">Kendaraan </label>
                         <select class="form-control" id="kendaraan" name="kendaraan" value="$k['kendaraan']">
                             <?php
                                $kendaraan = array('Mobil', 'Motor', 'Pick Up');
                                foreach ($kendaraan as $key => $val) {
                                ?>
                                 <option value="<?= $val; ?>" <?php if ($val == $k['kendaraan']) {
                                                                    echo " selected='selected'";
                                                                } ?>><?= $val; ?></option>
                             <?php } ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="">Jenis Kendaraan</label>
                         <input type="text" class="form-control" id="jenis_kendaraan" name="jenis_kendaraan" value="<?= $k['jenis_kendaraan']; ?>">
                     </div>
                     <div class="form-group">
                         <label for="">Nomor Polisi</label>
                         <input type="text" class="form-control" id="nopol" name="nopol" value="<?= $k['nopol']; ?>">
                     </div>
                     <div class="form-group">
                         <label for="">Status</label>
                         <select class="form-control" id="status" name="status">
                             <?php
                                $status = array('Tersedia', 'Tidak Tersedia');
                                foreach ($status as $key => $val) {
                                ?>
                                 <option value="<?= $val; ?>" <?php if ($val == $k['status']) {
                                                                    echo " selected='selected'";
                                                                } ?>><?= $val; ?>
                                 </option>
                             <?php } ?>
                         </select>
                     </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                     <button type="submit" class="btn btn-primary">Tambah</button>
                 </div>
                 </form>
             </div>
         </div>
     </div>
 <?php endforeach; ?>
 <!--  End Script ubah kurir -->

 <!-- Scipt databale-->
 <script>
     $(document).ready(function() {
         $('#dataTable').DataTable();
     });
 </script>