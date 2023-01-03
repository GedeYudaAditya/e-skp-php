<?php
include 'layouts/header.php';
include 'layouts/slidebar.php';

include 'pages/bem/auth/filter.php';
include 'pages/bem/logic/logic.php';

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
                <h1 class="h3 mb-0 text-gray-800">Tambah Kegiatan</h1>
            </div>

            <div class="container-fluid">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="Nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" name="name" class="form-control" id="Nama" aria-describedby="Nama">
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
                        <input type="text" name="skp_point" class="form-control" id="SKP">
                    </div>
                    <br>
                    <button type="submit" name="tambahKegiatan" class="btn btn-primary">Tambah</button>
                </form>
            </div>

        </div>
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

<?php
include 'layouts/bottom.php';
?>