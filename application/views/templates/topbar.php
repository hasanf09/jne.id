<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>


            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">



                <div class="navbar" href="#" id="u" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
                    <span class="d-none d-lg-inline text-gray-600 small"><i class="far fa-calendar-alt"></i>&nbsp; <?= date('d F,   Y'); ?></span>
                </div>

                <div class="topbar-divider d-none d-sm-block"></div>


                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
                    </a>

                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= base_url('user'); ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profil Saya
                        </a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-grays-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>

        <!-- End of Topbar -->