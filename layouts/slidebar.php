<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="superAdmin.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?= $user['name']  ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($_GET['page'] == 'dashboard') || ($_GET['page'] == null) || ($_GET['page'] == 'bem') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= BASE_URL ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <?php
    if ($user['role'] == 'admin') :
    ?>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?= ($_GET['page'] == 'admin/daftarAdmin') || ($_GET['page'] == 'admin/tambahAdmin') ? 'active' : '' ?>">
            <a class="nav-link <?= ($_GET['page'] == 'admin/daftarAdmin') || ($_GET['page'] == 'admin/tambahAdmin') ? '' : 'collapsed' ?>" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Admin Website</span>
            </a>
            <div id="collapseTwo" class="collapse <?= ($_GET['page'] == 'admin/daftarAdmin') || ($_GET['page'] == 'admin/tambahAdmin') ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Data Admin</h6>
                    <a class="collapse-item <?= ($_GET['page'] == 'admin/daftarAdmin') ? 'active' : '' ?>" href="<?= BASE_URL . '?page=admin/daftarAdmin' ?>">Daftar Admin</a>
                    <a class="collapse-item <?= ($_GET['page'] == 'admin/tambahAdmin') ? 'active' : '' ?>" href="<?= BASE_URL . '?page=admin/tambahAdmin' ?>">Tambah Admin</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item <?= ($_GET['page'] == 'admin/akunMahasiswa') || ($_GET['page'] == 'admin/akunBem') ? 'active' : '' ?>">
            <a class="nav-link <?= ($_GET['page'] == 'admin/akunMahasiswa') || ($_GET['page'] == 'admin/akunBem') ? '' : 'collapsed' ?>" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Pengelolaan Akun</span>
            </a>
            <div id="collapseUtilities" class="collapse <?= ($_GET['page'] == 'admin/akunMahasiswa') || ($_GET['page'] == 'admin/akunBem') ? 'show' : '' ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header"></h6>
                    <a class="collapse-item <?= ($_GET['page'] == 'admin/akunMahasiswa') ? 'active' : '' ?>" href="<?= BASE_URL . '?page=admin/akunMahasiswa' ?>">Akun Mahasiswa</a>
                    <a class="collapse-item <?= ($_GET['page'] == 'admin/akunBem') ? 'active' : '' ?>" href="<?= BASE_URL . '?page=admin/akunBem' ?>">Akun BEM</a>
                    <!-- <a class="collapse-item" href="utilities-border.html">Pending Validate</a> -->
                    <!-- <a class="collapse-item" href="utilities-animation.html">Validated Mahasiswa</a> -->
                    <!-- <a class="collapse-item" href="utilities-other.html">Other</a> -->
                </div>
            </div>
        </li>

    <?php
    elseif ($user['role'] == 'user') :
    ?>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Menu Mahasiswa</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pilihan</h6>
                    <a class="collapse-item" href="<?= BASE_URL . '?page=user/dataKegiatan' ?>">Data Kegiatan</a>
                    <a class="collapse-item" href="<?= BASE_URL . '?page=user/ajukanKegiatan' ?>">Ajukan Kegiatan</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Laporan</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pilihan</h6>
                    <a class="collapse-item" href="page/dataMahasiswa.html">Data SKP Mahasiswa</a>
                    <a class="collapse-item" href="utilities-border.html">Pending Validate</a>
                    <a class="collapse-item" href="utilities-animation.html">Validated Mahasiswa</a>
                    <a class="collapse-item" href="utilities-other.html">Other</a>
                </div>
            </div>
        </li> -->
    <?php
    elseif ($user['role'] == 'bem') :
    ?>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Menu BEM</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pilihan</h6>
                    <a class="collapse-item" href="<?= BASE_URL . '?page=bem/validasiKegiatan' ?>">Validasi Kegiatan</a>
                    <a class="collapse-item" href="<?= BASE_URL . '?page=bem/tambahKegiatan' ?>">Tambahkan Kegiatan</a>
                </div>
            </div>
        </li>

    <?php
    endif;
    ?>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->


    <!-- Nav Item - Pages Collapse Menu -->


    <!-- Nav Item - Charts -->


    <!-- Nav Item - Tables -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>
<!-- End of Sidebar -->