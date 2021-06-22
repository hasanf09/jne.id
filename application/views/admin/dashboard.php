<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pickup</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $total = $this->ModelPickup->totalPickup();
                                echo $total;
                                ?> Pickup</div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('data/pickup') ?>"><i class="fas fa-map-marker-alt fa-2x text-gray-300"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Booking</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $total = $this->ModelBooking->total();
                                echo $total;
                                ?> Booking</div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('data/databooking') ?>"><i class="fas fa-calendar-check fa-2x text-gray-300"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $id = $this->session->userdata('id_user');
                                $total = $this->ModelUser->totalUser($id);
                                echo $total;
                                ?> User</div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('data/datauser') ?>"><i class="fas fa-users fa-2x text-gray-300"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Kurir</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $id = $this->session->userdata('id_user');
                                $total = $this->ModelAdmin->totalKurir($id);
                                echo $total;
                                ?> Kurir </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('data/datakurir') ?>"><i class="fas fa-id-badge fa-2x text-gray-300"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-danger"> <i class="fas fa-fw fa-calendar-check"></i>&nbsp; Konfirmasi Booking</h6>
                    <a href="<?= base_url('data/databooking') ?>" class="m-0 font-weight-bold text-primary"> <i class="fas fa-search"></i>&nbsp; Tampilkan Semua</a>
                </div>
                <!-- Card Body -->
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

    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-danger"> <i class="fas fa-fw fa-map-marker-alt"></i>&nbsp; Konfirmasi Pickup</h6>
                    <a href="<?= base_url('data/pickup') ?>" class="m-0 font-weight-bold text-primary"> <i class="fas fa-search"></i>&nbsp; Tampilkan Semua</a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm" id="dataTablePickup" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Customer</th>
                                    <th>Status</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th>Kendaraan</th>
                                    <th>Catatan (Opsional)</th>
                                    <th>Jadwal pickup</th>
                                    <th>Tanggal Pickup</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($pickup as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $no; ?></th>
                                        <!-- <td><?= $p['id_user']; ?></td> -->
                                        <td><?= $p['nama']; ?> - <?= $p['no_hp']; ?></td>
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
                                        <td><button class="badge badge-counter badge-<?= $status; ?> btn-sm text-white"><?= $p['status']; ?></button></td>
                                        <td><?= $p['email']; ?></td>
                                        <td><?= $p['alamat']; ?></td>
                                        <td><?= $p['barang']; ?></td>
                                        <td><?= $p['jumlah']; ?></td>
                                        <td><?= $p['kendaraan']; ?></td>
                                        <td><?= $p['note']; ?></td>
                                        <td><?= $p['waktu']; ?></td>
                                        <td><?= $p['tanggal_pickup']; ?></td>
                                        <th>
                                            <form action="<?= base_url('pickup/konfir/' . $p['id_pickup']); ?>" method="POST">
                                                <?php
                                                if ($p['status'] !== "Menunggu Konfirmasi") { ?> <button href="" class="btn btn-success btn-sm" disabled><i class="fas fa-check"></i>&nbsp; Terkonfirmasi</button>
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
    <!-- /.container-fluid -->
</div>
</div>
<!-- Script Booking chart -->
<script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>
<script type="text/javascript">
    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Total Booking",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "#5a5c69",
                pointHoverBorderColor: "#5a5c69",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: <?= json_encode($bkg); ?>,
            }, ],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: 5
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // // Include a dollar sign in the ticks
                        // callback: function(value, index, values) {
                        //     return number_format(value);
                        // }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    // label: function(tooltipItem, chart) {
                    //     var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                    //     return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    // }
                }
            }
        }
    });
</script>
<!-- End Of Script Booking Chart -->

<!-- Chart Pickup  -->
<script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>
<script type="text/javascript">
    // Area Chart Example
    var ctx = document.getElementById("myAreaChartPickup");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Total Pickup",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "#5a5c69",
                pointHoverBorderColor: "#5a5c69",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: <?= json_encode($pkp); ?>,
            }, ],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: 5
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // // Include a dollar sign in the ticks
                        // callback: function(value, index, values) {
                        //     return number_format(value);
                        // }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    // label: function(tooltipItem, chart) {
                    //     var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                    //     return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    // }
                }
            }
        }
    });
</script>
<!-- End Of Chart Pickup -->

<script>
    $(document).ready(function() {
        $('#dataTablePickup').DataTable();
    });
</script>