<?php
include 'layouts/header.php';
include 'layouts/slidebar.php';

include 'pages/admin/auth/filter.php';

include 'pages/admin/logic/logic.php';
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
                <h1 class="h3 mb-0 text-gray-800">Daftar Mahasiswa Web E-SKP</h1>
                <button data-bs-toggle="modal" data-bs-target="#exampleModaltambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sm text-white-50"></i>Tambahkan Akun Bem</button>
            </div>

            <div class="container bg-white p-3 shadow rounded">
                <table id="example" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $user = new User();
                        $data = $user->getUserWhere(
                            [
                                'role' => 'bem'
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
                                    <?php if ($value['status'] == 'active') : ?>
                                        <span class="badge bg-success">Active</span>
                                    <?php else : ?>
                                        <span class="badge bg-danger">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <!-- <a href="#" class="btn btn-primary me-1">Edit</a> -->
                                    <form action="" method="post" onsubmit="return confirm('Do you really want to submit the form?');">
                                        <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $value['_id'] ?>">
                                            Edit
                                        </button>
                                        <input type="hidden" name="username" value="<?= $value['username'] ?>">
                                        <button type="submit" name="deleteBem" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
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
$datas = $user->getUserWhere(
    [
        'role' => 'bem'
    ]
);
foreach ($datas as $isi) : ?>
    <div class="modal fade" id="exampleModal<?= $isi['_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Admin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <!-- <input type="hidden" name="_id" value=""> -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $isi['name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $isi['username'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $isi['email'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">status</label>
                            <select class="form-select" aria-label="Pilih status akun" name="status" id="status">
                                <option value="active" <?= $isi['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                                <option value="inactive" <?= $isi['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                            </select>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" aria-label="Default select example" name="role" id="role">
                                <option value="admin" selected>Admin</option>
                                <option value="bem">BEM</option>
                                <option value="user">User</option>
                            </select>
                        </div> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="updateBem" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
endforeach; ?>

<div class="modal fade" id="exampleModaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Akun BEM</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <!-- <input type="hidden" name="_id" value=""> -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="">
                    </div>
                    <div class="mb-3">
                        <label for="password2" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password2" name="password2" value="">
                    </div>
                    <!-- <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" aria-label="Default select example" name="role" id="role">
                                <option value="admin" selected>Admin</option>
                                <option value="bem">BEM</option>
                                <option value="user">User</option>
                            </select>
                        </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="tambahBem" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
unset($_SESSION['error']);
unset($_SESSION['success']);
include 'layouts/bottom.php';
?>