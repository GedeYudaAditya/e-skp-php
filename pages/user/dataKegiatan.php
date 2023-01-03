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
        <div class="container-fluid isinya">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Kegiatan</h1>
            </div>

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

            <div id="pages">
                <table id="example" class="tabel table table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal Diajukan</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal Disetujui</th>
                            <th>points</th>
                            <th>bukti</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = [];
                        if (isset($user['events'])) {
                            foreach ($user['events'] as $key => $e) {
                                $events = new Event();
                                // var_dump($e['slug']);
                                // die;
                                $event = $events->getEvent(
                                    ['slug' => $e['slug']]
                                );

                                $data[$key] = [
                                    'id' => $event->_id,
                                    'tanggal' => $e->created_at,
                                    'nama_kegiatan' => $event->name,
                                    'tanggal_disetujui' => $e->updated_at,
                                    'bukti' => $e->bukti,
                                    'points' => $event->skp_point,
                                    'status' => $e['status']
                                ];
                            }
                        }
                        foreach ($data as $item) : ?>
                            <?php
                            // prase string to int
                            // $item['tanggal'] = getDateMongoDB($item['tanggal']); // yang benar
                            // $item['tanggal'] = $item['tanggal'];
                            // get milisecond from objec mongoDB\BSON\UTCDateTime

                            // var_dump($item['tanggal']);
                            ?>
                            <tr>
                                <td><?= $item['tanggal'] ?></td>
                                <td><?= $item['nama_kegiatan'] ?></td>
                                <td><?= $item['tanggal_disetujui'] ?></td>
                                <td><?= $item['points'] ?></td>
                                <td>
                                    <a href="<?= BASE_URL . '/uploads/' . $item['bukti'] ?>" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                                </td>
                                <td>
                                    <?php if ($item['status'] == 'pen') : ?>
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    <?php elseif ($item['status'] == 'acc') : ?>
                                        <span class="badge bg-success">Diterima</span>
                                    <?php elseif ($item['status'] == 'rej') : ?>
                                        <span class="badge bg-danger">Ditolak</span>
                                    <?php endif; ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>

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

<?php
unset($_SESSION['error']);
unset($_SESSION['success']);
include 'layouts/bottom.php';
?>