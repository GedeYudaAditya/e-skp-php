<?php
include 'layouts/auth/authhead.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password == $password_confirm) {
        $user = new User();
        // check if email or username is already exist
        $user = $user->getUser([
            '$or' => [
                [
                    'username' => $username,
                ],
                [
                    'email' => $email,
                ],
            ]
        ]);

        // var_dump($user);
        // die;

        if ($user) {
            echo "<script>alert('Username atau Email sudah terdaftar!')</script>";
            $_SESSION['error'] = 'Username atau Email sudah terdaftar!';
            return header('Location: ' . BASE_URL . '/?page=register');
        } else {
            $user = new User();
            $user->addUser([
                'name' => $name,
                'username' => $username,
                'nim' => $nim,
                'jurusan' => $jurusan,
                'prodi' => $prodi,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role' => 'user',
                'events' => [],
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            $user = $user->getUser(
                [
                    'username' => $username
                ]
            );

            echo "<script>alert('Pendaftaran berhasil!')</script>";
            echo "<script>window.location.href = '" . BASE_URL . "/?page=login'</script>";
        }

        if ($user['role'] == 'admin' && $user['status'] == 'active') {
            header('Location: ' . BASE_URL . '/?page=dashboard');
        } else if ($user['role'] == 'user' && $user['status'] == 'active') {
            header('Location: ' . BASE_URL . '/');
        } else if ($user['role'] == 'bem' && $user['status'] == 'active') {
            header('Location: ' . BASE_URL . '/?page=bem');
        }
    } else {
        $error = 'Password tidak sama';
    }
}

if (isset($_SESSION['login'])) {
    $user = new User();
    $user = $user->getUser(
        [
            'username' => $_SESSION['username']
        ]
    );
    if ($user['role'] == 'admin' && $user['status'] == 'active') {
        header('Location: ' . BASE_URL . '/?page=dashboard');
    } else if ($user['role'] == 'user' && $user['status'] == 'active') {
        header('Location: ' . BASE_URL . '/');
    } else if ($user['role'] == 'bem' && $user['status'] == 'active') {
        header('Location: ' . BASE_URL . '/?page=bem');
    }
}

?>

<main class="form-signin w-100 m-auto">
    <form action="" method="POST">
        <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['error'] ?>
            </div>
        <?php endif; ?>

        <div class="form-floating">
            <input type="text" name="name" class="form-control" id="floatingInput1" placeholder="Massukan nama">
            <label for="floatingInput1">Nama</label>
        </div>
        <div class="form-floating">
            <input type="text" name="username" class="form-control" id="floatingInput2" placeholder="Massukan namapengguna">
            <label for="floatingInput2">Nama Pengguna</label>
        </div>
        <div class="form-floating">
            <input type="number" name="nim" class="form-control" id="floatingInput3" placeholder="Massukan nim">
            <label for="floatingInput3">NIM</label>
        </div>
        <div class="form-floating">
            <input type="text" name="jurusan" class="form-control" id="floatingInput4" placeholder="Massukan jurusan">
            <label for="floatingInput4">Jurusan</label>
        </div>
        <div class="form-floating">
            <input type="text" name="prodi" class="form-control" id="floatingInput5" placeholder="Massukan prodi">
            <label for="floatingInput5">Prodi</label>
        </div>
        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput6" placeholder="name@example.com">
            <label for="floatingInput6">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password_confirm" class="form-control" id="floatingPassword2" placeholder="Konfirmasi Password">
            <label for="floatingPassword2">Konfirmasi Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">Sudah punya akun? <a href="<?= BASE_URL ?>/?page=login">Login</a></p>
        <p class="mt-1 mb-3 text-muted">&copy; 2017–2022</p>
    </form>
</main>

<?php
unset($_SESSION['error']);
include 'layouts/auth/authfooter.php';
?>