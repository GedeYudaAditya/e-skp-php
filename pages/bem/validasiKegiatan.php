<?php
include 'layouts/header.php';
include 'layouts/slidebar.php';

include 'pages/bem/auth/filter.php';
include 'pages/bem/logic/logic.php';

// get all user mahasiswa that not have events with status acc
$usersbaru = new User();
$userbarus = $usersbaru->getUserWhere([
    'role' => 'user'
]);

// $events = new Event();
// $allEvents = $events->all();
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
                <h1 class="h3 mb-0 text-gray-800">Validasi Kegiatan</h1>
            </div>

            <h3>Data Mahasiswa</h3>
            <div class="container bg-white p-3 shadow rounded">
                <table id="example" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">Nim</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($userbarus as $key => $value) : ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $value['name'] ?></td>
                                <td><?= $value['nim'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $value['username'] ?>">
                                        Lihat Kegiatan
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php
        $userlain = new User();
        $userslain = $userlain->getUserWhere([
            'role' => 'user'
        ]);
        foreach ($userslain as $key => $value) : ?>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal<?= $value['username'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $value['username'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title fs-5" id="exampleModalLabel<?= $value['username'] ?>">Data Kegiatan yang di ikuti</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table id="example<?= $value['username'] ?>" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Kegiatan</th>
                                        <th scope="col">Sebagai</th>
                                        <th scope="col">Tanggal Kegiatan</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Bukti</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $s = 0;
                                    if (isset($value['events'])) : ?>
                                        <?php foreach ($value['events'] as $e) : ?>
                                            <?php if ($e['status'] != 'acc') : ?>
                                                <?php
                                                // search event with status pen
                                                $event = new Event();
                                                $event = $event->getEventWhere([
                                                    'slug' => $e['slug'],
                                                ]);

                                                $event = $event->toArray();

                                                // var_dump($event[0]['name']);

                                                ?>
                                                <tr>
                                                    <th scope="row"><?= $s + 1 ?></th>
                                                    <td><?= $event[0]['name'] ?></td>
                                                    <td><?= $e['jabatan'] ?></td>
                                                    <td><?= getDateMongoDB($event[0]['created_at']) ?></td>
                                                    <td>
                                                        <?php if ($e['status'] == 'pen') : ?>
                                                            <span class="badge bg-warning text-dark">Pending</span>
                                                        <?php elseif ($e['status'] == 'tol') : ?>
                                                            <span class="badge bg-danger">Tolak</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= BASE_URL . '/uploads/' . $e['bukti'] ?>" target="_blank" class="btn btn-primary btn-sm">Lihat Bukti</a>
                                                    </td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="username" value="<?= $value['username'] ?>">
                                                            <input type="hidden" name="slug" value="<?= $e['slug'] ?>">
                                                            <input type="hidden" name="jabatan" value="<?= $e['jabatan'] ?>">
                                                            <button type="submit" name="acc" class="btn btn-success">Acc</button>
                                                            <button type="submit" name="reject" class="btn btn-danger">Reject</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php $s++ ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#example<?= $value['username'] ?>').DataTable();
                });
            </script>
        <?php endforeach; ?>
        <!-- End Page Content -->
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
</div>

<!-- <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script> -->
<?php
include 'layouts/bottom.php';
?>