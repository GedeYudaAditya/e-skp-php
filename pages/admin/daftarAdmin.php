<?php
include 'layouts/header.php';
include 'layouts/slidebar.php';

if (isset($_SESSION['login'])) {
    $user = new User();
    $user = $user->getUser([
        'username' => $_SESSION['username']
    ]);
    if ($user['role'] == 'user') {
        header('Location: ' . BASE_URL . '/');
    } else if ($user['role'] == 'bem') {
        header('Location: ' . BASE_URL . '/?page=bem');
    }
} else if (!isset($_SESSION['login'])) {
    header('Location: ' . BASE_URL . '/?page=login');
}
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <?php
    include 'layouts/topbar.php';
    ?>
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Daftar Admin Web E-KRS</h1>
                <a href="page/tambahAdmin.html" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sm text-white-50"></i>Tambahkan Admin</a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <!-- <th scope="col">Password</th> -->
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $user = new User();
                    $data = $user->getUserWhere(
                        [
                            'role' => 'admin'
                        ]
                    );
                    // var_dump($data);
                    foreach ($data as $key => $value) :
                    ?>
                        <tr>
                            <th scope="row">
                                <?= $key + 1 ?>
                            </th>
                            <td>
                                <?= $value['name'] ?>
                            </td>
                            <td>
                                <?= $value['username'] ?>
                            </td>
                            <td>
                                <?= $value['email'] ?>
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary me-1">Edit</a>
                                <a href="#" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php
include 'layouts/bottom.php';
?>