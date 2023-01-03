<?php
include 'layouts/header.php';
include 'layouts/slidebar.php';

include 'pages/bem/auth/filter.php';
include 'pages/bem/logic/logic.php';

$userMhs = new User();
$dataMaha = $userMhs->getUserWhere(
    [
        'role' => 'user'
    ]
);

$statsUser = $dataMaha->toArray();

$event = new Event();
$dataEvent = $event->all();

$statsEvent = $dataEvent->toArray();

// kegiatan user yang belum di validasi
$userPending = new User();
$dataPending = $userPending->getUserWhere(
    ['events.status' => 'pen'],
    ['_id' => 0, 'events' => ['$elemMatch' => ['status' => 'pen']]]
);

$statsPending = $dataPending->toArray();

$events = new Event();
$dataEvents = $events->all();

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
                <h1 class="h3 mb-0 text-gray-800">Dashboard Bem</h1>
                <!-- <a href="page/tambahAdmin.html" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sm text-white-50"></i>Tambahkan Admin</a> -->
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
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($statsUser) ?></div>
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
                                            Jumlah Event yang di buat</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($statsEvent) ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Progress
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Pending Validate</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($statsPending) ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Alert -->
            <?php if (isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>
                        <?= $_SESSION['error'] ?>
                    </strong> Hubungi pihak terkait jika kesalahan terjadi secara tidak wajar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>
                        <?= $_SESSION['success'] ?>
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="container bg-white p-3 shadow rounded">
                <table id="example" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kegiatan</th>
                            <th scope="col">Point</th>
                            <th scope="col">Dibuat Pada</th>
                            <th scope="col">Diupdate Pada</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($dataEvents as $e) : ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $e['name'] ?></td>
                                <td><?= $e['skp_point'] ?></td>
                                <td><?= getDateMongoDB($e['created_at']) ?></td>
                                <td><?= getDateMongoDB($e['updated_at']) ?></td>
                                <td>
                                    <form action="" method="post" onsubmit="return confirm('Yakin untuk menghapus kegiatan ini?')">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $e['slug'] ?>">
                                            Edit
                                        </button>
                                        <input type="hidden" name="slug" value="<?= $e['slug'] ?>">
                                        <button type="submit" class="btn btn-danger" name="deletKegiatan">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <!-- modal for edit data -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?= $e['slug'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title fs-5" id="exampleModalLabel">Edit data</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="" method="POST">
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <input type="hidden" name="slug" value="<?= $e['slug'] ?>">
                                                    <div class="mb-3">
                                                        <label for="Nama" class="form-label">Nama Kegiatan</label>
                                                        <input type="text" value="<?= $e['name'] ?>" name="name" class="form-control" id="Nama" aria-describedby="Nama">
                                                    </div>
                                                    <!-- <div class="mb-3">
                                                        <label for="tglkegiatan" class="form-label">Tanggal Kegiatan</label>
                                                        <input type="date" class="form-control" id="tglkegiatan" aria-describedby="tglkegiatan">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="role" class="form-label">Role Kegiatan</label>
                                                        <input type="text" class="form-control" id="role" aria-describedby="role">
                                                    </div> -->
                                                    <div class="mb-3">
                                                        <label for="SKP" class="form-label">Jumlah SKP</label>
                                                        <input type="text" value="<?= $e['skp_point'] ?>" name="skp_point" class="form-control" id="SKP">
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="editKegiatan" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>

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

<?php
unset($_SESSION['error']);
unset($_SESSION['success']);
include 'layouts/bottom.php';
?>