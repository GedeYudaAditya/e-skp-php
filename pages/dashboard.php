<?php
include 'layouts/header.php';
include 'layouts/slidebar.php';

include 'pages/admin/auth/filter.php';

$userD = new User();
$dataMaha = $userD->getUserWhere(
    [
        'role' => 'user'
    ]
);

$statsUser = $dataMaha->toArray();

$dataBem = $userD->getUserWhere(
    [
        'role' => 'bem'
    ]
);

$statsBem = $dataBem->toArray();

$dataAdmin = $userD->getUserWhere(
    [
        'role' => 'admin'
    ]
);

$statsAdmin = $dataAdmin->toArray();

$allUser = $userD->all();

$statsAll = $allUser->toArray();

// var_dump($statsAll);
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column inti">

    <!-- Main Content -->
    <div id="content">

        <?php
        include 'layouts/topbar.php';
        ?>


        <!-- Begin Page Content -->
        <div class="container-fluid isinya">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard Website</h1>
                <a href="page/tambahAdmin.html" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sm text-white-50"></i>Tambahkan Admin</a>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="page/dataMahasiswa.html">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Jumlah Mahasiswa</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            echo count($statsUser);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Earnings (Monthly) Card Example -->

                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="adminBem.html">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Jumlah Akun Admin</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            echo count($statsAdmin);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="adminBem.html">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Jumlah Admin BEM</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            echo count($statsBem);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Semua Akun</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        echo count($statsAll);
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->

            <div class="row">

                <!-- Area -->
                <!-- Pie Chart -->

            </div>

            <!-- Content Row -->


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright @2022</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

<?php
include 'layouts/bottom.php';
?>