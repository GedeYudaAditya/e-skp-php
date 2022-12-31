<?php
include 'layouts/header.php';
include 'layouts/slidebar.php';

include 'pages/user/auth/filter.php';

?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column inti">

    <!-- Main Content -->
    <div id="content">
        <?php
        include 'layouts/topbar.php';
        ?>

        <!-- Begin Page Content -->
        <!-- <div class="container-fluid isinya">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-6 mb-4">
                    <a class="text-decoration-none" href="page/dataMahasiswa.html">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Jumlah Point SKP yang di Peroleh</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">150</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-star fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-6 col-md-6 mb-4">
                    <a class="text-decoration-none" href="adminBem.html">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Jumlah Kegiatan yang di Ikuti</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div> -->

        <!-- Begin Page Content -->
        <div class="container-fluid isinya">

            <!-- Page Heading -->
            <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div> -->
            <!--Begin Main Overview-->

            <?php

            $skpPoint = 0;

            if (isset($user->events)) {
                foreach ($user->events as $e) {
                    $events = new Event();
                    $event = $events->getEvent(
                        ['slug' => $e['slug']]
                    );

                    // var_dump($event);
                    if ($e['status'] == 'acc') {
                        $skpPoint += $event['skp_point'];
                    }
                }
            }
            ?>

            <div class="main-overview">
                <div class="overviewcard  <?= $user->status == 'active' ? 'card-success' : '' ?>">
                    <div class="overviewcard__icon">
                        <?= $user->status == 'active' ? 'Akun Aktif' : 'Akun Nonaktif' ?>
                    </div>
                    <div class="overviewcard__info">Status</div>
                </div>
                <div class="overviewcard">
                    <div class="overviewcard__icon"><?= $skpPoint ?></div>
                    <div class="overviewcard__info">Jumlah SKP</div>
                </div>
                <div class="overviewcard">
                    <div class="overviewcard__icon"><?= isset($user->events) ? count($user->events) : '-' ?></div>
                    <div class="overviewcard__info">Event Diikuti</div>
                </div>
                <div class="overviewcard">
                    <div class="overviewcard__icon">2</div>
                    <div class="overviewcard__info">Pengajuan Pending</div>
                </div>
            </div>
            <!--End Main Overview-->
            <!--Begin Main Cards-->
            <div class="main-cards">
                <div class="cardku">
                    <img src="<?= asset('img/user/logo.png') ?>" class="img-fluid" alt="">
                </div>
                <div class="cardku">
                    <img src="<?= asset('img/user/header.png') ?>" class="img-fluid" alt="">
                </div>
                <div class="cardku">
                    <img src="<?= asset('img/user/spanduk.png') ?>" class="img-fluid" alt="">
                </div>
            </div>

        </div>
    </div>
    <!-- End of Main Content -->

</div>

<?php
include 'layouts/bottom.php';
?>