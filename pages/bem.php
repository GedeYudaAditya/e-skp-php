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
    } else if ($user['role'] == 'admin') {
        header('Location: ' . BASE_URL . '/?page=dashboard');
    }
} else if (!isset($_SESSION['login'])) {
    header('Location: ' . BASE_URL . '/?page=login');
}
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



        </div>

    </div>

</div>

<?php
include 'layouts/bottom.php';
?>