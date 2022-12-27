<?php
include 'layouts/auth/authhead.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password == $password_confirm) {
        $user = new User();
        $user->addUser([
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => 'user',
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
        if ($user['role'] == 'admin') {
            header('Location: ' . BASE_URL . '/?page=dashboard');
        } else if ($user['role'] == 'user') {
            header('Location: ' . BASE_URL . '/');
        } else {
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
    if ($user['role'] == 'admin') {
        header('Location: ' . BASE_URL . '/?page=dashboard');
    } else if ($user['role'] == 'user') {
        header('Location: ' . BASE_URL . '/');
    } else {
        header('Location: ' . BASE_URL . '/?page=bem');
    }
}

?>

<main class="form-signin w-100 m-auto">
    <form action="" method="POST">
        <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <div class="form-floating">
            <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Massukan nama">
            <label for="floatingInput">Nama</label>
        </div>
        <div class="form-floating">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Massukan nama">
            <label for="floatingInput">Nama Pengguna</label>
        </div>
        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
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
include 'layouts/auth/authfooter.php';
?>