<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<h3>
    <center>Laporan Data Pickup JNE</center>
</h3>
<br />
<table class="table-data">
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