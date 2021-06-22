<div class="container content">
    <div class="row">
        <div class="col-md-12">
            <h6 class="title-bar"><i class="fa fa-caret-square-o-right"></i> CEK ONGKIR</h6>
            <hr />
            <table class="table table-bordered">
                <tr>
                    <th>Berat</th>
                    <td><?php echo $query->rajaongkir->query->weight / 1000; ?> Kg</td>
                </tr>
                <tr>
                    <th>Kurir</th>
                    <td><?php echo $query->rajaongkir->results[0]->name; ?></td>
                </tr>
            </table>

            <h6 class="title-bar"><i class="fa fa-caret-square-o-right"></i> KOTA ASAL</h6>
            <hr />
            <table class="table table-bordered">
                <tr>
                    <th>Provinsi</th>
                    <td><?php echo $query->rajaongkir->origin_details->province; ?></td>
                </tr>
                <tr>
                    <th>Kota/Kabupaten</th>
                    <td><?php echo $query->rajaongkir->origin_details->city_name; ?></td>
                </tr>
                <tr>
                    <th>Kode Pos</th>
                    <td><?php echo $query->rajaongkir->origin_details->postal_code; ?></td>
                </tr>
            </table>

            <h6 class="title-bar"><i class="fa fa-caret-square-o-right"></i> KOTA TUJUAN</h6>
            <hr />
            <table class="table table-bordered">
                <tr>
                    <th>Provinsi</th>
                    <td><?php echo $query->rajaongkir->destination_details->province; ?></td>
                </tr>
                <tr>
                    <th>Kota/Kabupaten</th>
                    <td><?php echo $query->rajaongkir->destination_details->city_name; ?></td>
                </tr>
                <tr>
                    <th>Kode Pos</th>
                    <td><?php echo $query->rajaongkir->destination_details->postal_code; ?></td>
                </tr>
            </table>

            <h6 class="title-bar"><i class="fa fa-caret-square-o-right"></i> TARIF</h6>
            <hr />
            <table class="table table-bordered">
                <tr>
                    <th>Jenis Layanan</th>
                    <th>Tarif (Rp)</th>
                    <th>Estimasi (Hari)</th>
                </tr>
                <?php foreach ($query->rajaongkir->results[0]->costs as $q) { ?>
                    <tr>
                        <td><?php echo $q->service; ?></td>
                        <td><?php echo $q->cost['0']->value; ?></td>
                        <td><?php echo $q->cost['0']->etd; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>