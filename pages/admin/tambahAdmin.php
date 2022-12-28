<?php
include 'layouts/header.php';
include 'layouts/slidebar.php';

include 'pages/admin/auth/filter.php';

include 'pages/admin/logic/logic.php';

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
                <h1 class="h3 mb-0 text-gray-800">Tambah Admin Web E-KRS</h1>
                <!-- <a href="page/tambahAdmin.html" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sm text-white-50"></i>Tambahkan Admin</a> -->
            </div>

            <div class="container mb-5">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="Nama" class="form-label">Nama Admin</label>
                        <input type="text" name="name" class="form-control" id="Nama" aria-describedby="Nama">
                    </div>
                    <div class="mb-3">
                        <label for="Username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="Username" aria-describedby="Username">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="InputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="InputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="InputPassword2" class="form-label">Password</label>
                        <input type="password" name="password2" class="form-control" id="InputPassword2">
                    </div>
                    <br>
                    <button type="submit" name="tambahAdmin" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>

</div>

<?php
include 'layouts/bottom.php';
?>