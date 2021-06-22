<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user/index'); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-shipping-fast"></i>
        </div>
        <div class="sidebar-brand-text mx-4"> MY JNE <br>CS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/index'); ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Nav Item - Booking -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('booking'); ?>">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Booking</span></a>
    </li>


    <!-- Nav Item - Pickup -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pickup'); ?>">
            <i class="fas fa-fw fa-map-marker-alt"></i>
            <span>Pickup</span></a>

        <!-- RIWAYAT  -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-history"></i>
            <span>Riwayat</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Riwayat Aktivitas :</h6>
                <a class="collapse-item" href="<?= base_url('riwayat/booking'); ?>"> <i class="fas fa-calendar-check"></i>&nbsp; Booking</a>
                <a class="collapse-item" href="<?= base_url('riwayat/pickup'); ?>"><i class="fas fa-map-marker-alt"></i>&nbsp; Pickup</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Shipment -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('tracking'); ?>">
            <i class="fas fa-fw fa-paper-plane"></i>
            <span>Pengiriman</span></a>
    </li>

    <!-- USER MANAGEMENT  -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>User Menu</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Menu:</h6>
                <a class="collapse-item" href="<?= base_url('user/profilsaya'); ?>"><i class="fas fa-id-card"></i>&nbsp; Profil Saya</a>
                <a class="collapse-item" href="<?= base_url('user/ubahpassword'); ?>"><i class="fas fa-key"></i>&nbsp; Ubah Password</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Buku Alamat -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('alamat/bukualamat'); ?>">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Buku Alamat</span></a>
    </li>


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