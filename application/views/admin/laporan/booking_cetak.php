<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>

    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: verdana;
            padding: 10px 10px 10px 10px;
        }

        h3 {
            font-family: verdana;
        }
    </style>

    <h3>
        <center>Laporan Data Booking JNE</center>
    </h3>
    <br />
    <table class="table-data">
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
    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>