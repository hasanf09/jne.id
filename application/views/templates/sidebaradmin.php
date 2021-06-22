<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-shipping-fast"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> MY JNE ADMIN</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Management Transaksi
    </div>

    <!-- Update  -->
    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pengiriman/resi') ?>">
            <i class="fas fa-fw fa-paperclip"></i>
            <span>Update Resi</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('tracking/update') ?>">
            <i class="fas fa-fw fa-paper-plane"></i>
            <span>Update Pengiriman</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pickup/update') ?>">
            <i class="fas fa-fw fa-map-marker-alt"></i>
            <span>Update Pickup</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Management Data
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('data/databooking') ?>">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Data Booking</span></a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="<?= base_url('data/pengiriman') ?>">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Data Pengiriman</span></a>
    </li> -->

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('data/pickup') ?>">
            <i class="fas fa-fw fa-map-marker-alt"></i>
            <span>Data Pickup</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('data/datauser') ?>">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>Data User</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('data/datakurir') ?>">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>Data Kurir</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Management Laporan
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('laporan/booking') ?>">
            <i class="fas fa-book"></i>
            <span>Laporan Data Booking</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('laporan/pickup'); ?>">
            <i class="fas fa-book"></i>
            <span>Laporan Data Pickup</span></a>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
    <div class="sidebar-heading">
        Management Home
    </div>

    <!-- Nav Item - Charts -->
<li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/slider'); ?>">
            <i class="far fa-images"></i>
            <span>Update Slider</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">

        <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Keluar</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->