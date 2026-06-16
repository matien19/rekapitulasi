<body id="page-top">

<!-- PAGE WRAPPER -->
<div id="wrapper">

    <!-- SIDEBAR -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
        id="accordionSidebar">

        <!-- BRAND -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center"
           href="<?= base_url('index.php/administrator/dashboard') ?>">

            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-database"></i>
            </div>

            <div class="sidebar-brand-text mx-2">
                Rekap Saksi
            </div>

        </a>

        <!-- DIVIDER -->
        <hr class="sidebar-divider my-0">

        <!-- DASHBOARD -->
        <li class="nav-item active">

            <a class="nav-link"
               href="<?= base_url('index.php/administrator/dashboard') ?>">

                <i class="fas fa-fw fa-tachometer-alt"></i>

                <span>Dashboard</span>

            </a>

        </li>

        <hr class="sidebar-divider">

        <!-- HEADING -->
        <div class="sidebar-heading">
            Data Master
        </div>

        <!-- PROVINSI -->
        <li class="nav-item">

            <a class="nav-link"
               href="<?= base_url('index.php/administrator/provinsi') ?>">

                <i class="fas fa-map"></i>

                <span>Provinsi</span>

            </a>

        </li>

        <!-- KABUPATEN -->
        <li class="nav-item">

            <a class="nav-link"
               href="<?= base_url('index.php/administrator/kabupaten') ?>">

                <i class="fas fa-city"></i>

                <span>Kabupaten</span>

            </a>

        </li>

        <!-- KECAMATAN -->
        <li class="nav-item">

            <a class="nav-link"
               href="<?= base_url('index.php/administrator/kecamatan') ?>">

                <i class="fas fa-layer-group"></i>

                <span>Kecamatan</span>

            </a>

        </li>

        <!-- DESA -->
        <li class="nav-item">

            <a class="nav-link"
               href="<?= base_url('index.php/administrator/desa') ?>">

                <i class="fas fa-home"></i>

                <span>Desa</span>

            </a>

        </li>

        <!-- TPS -->
        <li class="nav-item">

            <a class="nav-link"
               href="<?= base_url('index.php/administrator/tps') ?>">

                <i class="fas fa-map-marker-alt"></i>

                <span>TPS</span>

            </a>

        </li>

        <hr class="sidebar-divider">

        <!-- REKAP -->
        <div class="sidebar-heading">
            Rekapitulasi
        </div>

        <!-- CALEG -->
        <li class="nav-item">

            <a class="nav-link"
               href="<?= base_url('index.php/administrator/caleg') ?>">

                <i class="fas fa-users"></i>

                <span>Data Caleg</span>

            </a>

        </li>

        <!-- DAPIL -->
        <li class="nav-item">

            <a class="nav-link"
               href="<?= base_url('index.php/administrator/dapil') ?>">

                <i class="fas fa-map"></i>

                <span>Data Dapil</span>

            </a>

        </li>

        <!-- SAKSI -->
        <li class="nav-item">

            <a class="nav-link"
               href="<?= base_url('index.php/administrator/saksi') ?>">

                <i class="fas fa-user"></i>

                <span>Data Saksi</span>

            </a>

        </li>

        <!-- HASIL -->
        <li class="nav-item">

            <a class="nav-link"
               href="<?= base_url('index.php/administrator/hasil_suara') ?>">

                <i class="fas fa-chart-bar"></i>

                <span>Hasil Suara</span>

            </a>

        </li>

        <!-- USER -->
        <li class="nav-item">

            <a class="nav-link"
               href="<?= base_url('index.php/administrator/user') ?>">

                <i class="fas fa-user-cog"></i>

                <span>Manajemen User</span>

            </a>

        </li>

        <hr class="sidebar-divider">

        <!-- LOGOUT -->
        <li class="nav-item">

            <a class="nav-link"
               href="<?= base_url('index.php/administrator/auth/logout') ?>">

                <i class="fas fa-sign-out-alt"></i>

                <span>Logout</span>

            </a>

        </li>

        <!-- SIDEBAR TOGGLER -->
        <hr class="sidebar-divider d-none d-md-block">

        <div class="text-center d-none d-md-inline">

            <button class="rounded-circle border-0"
                    id="sidebarToggle"></button>

        </div>

    </ul>
    <!-- END SIDEBAR -->

    <!-- CONTENT WRAPPER -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- MAIN CONTENT -->
        <div id="content">

            <!-- TOPBAR -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- TOGGLE MOBILE -->
                <button id="sidebarToggleTop"
                        class="btn btn-link d-md-none rounded-circle mr-3">

                    <i class="fa fa-bars"></i>

                </button>

                <!-- TITLE -->
                <h5 class="ml-2 mt-2 text-primary">

                    Sistem Rekapitulasi Data Saksi

                </h5>

                <!-- RIGHT -->
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown no-arrow">

                        <a class="nav-link dropdown-toggle"
                           href="#"
                           id="userDropdown"
                           role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">

                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                                Admin

                            </span>

                            <img class="img-profile rounded-circle"
                                 src="<?= base_url('assets/img/user.png') ?>"
                                 width="40">

                        </a>

                        <!-- DROPDOWN -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">

                            <a class="dropdown-item" href="#">

                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>

                                Profile

                            </a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item"
                               href="<?= base_url('index.php/administrator/auth/logout') ?>">

                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>

                                Logout

                            </a>

                        </div>

                    </li>

                </ul>

            </nav>
            <!-- END TOPBAR -->


<!-- WAJIB DI FOOTER SEBELUM </body> -->

<!-- JQuery -->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>

<!-- Bootstrap -->
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- JQuery Easing -->
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

<!-- SB ADMIN -->
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

<!-- TOGGLE SIDEBAR -->
<script>

$(document).ready(function() {

    $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {

        $("body").toggleClass("sidebar-toggled");

        $(".sidebar").toggleClass("toggled");

        if ($(".sidebar").hasClass("toggled")) {

            $('.sidebar .collapse').collapse('hide');
        }
    });

});

</script>