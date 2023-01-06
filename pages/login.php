<?php
include 'layouts/auth/authhead.php';
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $user = new User();
  $user = $user->getUser([
    'email' => $email
  ]);
  if ($user) {
    if (password_verify($password, $user['password'])) {
      $_SESSION['login'] = true;
      $_SESSION['username'] = $user['username'];

      // check if user set remember me
      if (isset($_POST['remember'])) {
        // set redis store key with expired time
        $redis->setex('remember', 60 * 60 * 24 * 30, $user['username']);
      }

      if ($user['role'] == 'admin' && $user['status'] == 'active') {
        header('Location: ' . BASE_URL . '/?page=dashboard');
      } else if ($user['role'] == 'user' && $user['status'] == 'active') {
        header('Location: ' . BASE_URL . '/');
      } else if ($user['role'] == 'bem' && $user['status'] == 'active') {
        header('Location: ' . BASE_URL . '/?page=bem');
      } else {
        $error = 'Akun anda sedang tidak aktif, silahkan hubungi admin';
      }
    } else {
      $error = 'Pastikan email dan password benar';
    }
  } else {
    $error = 'Email tidak terdaftar';
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
  } else {
    $error = 'Akun anda sedang tidak aktif, silahkan hubungi admin';
  }
} else {
  // check if redis has key

  if ($redis->exists('remember')) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $redis->get('remember');


    $user = new User();
    $user = $user->getUser(
      [
        'username' => $_SESSION['username']
      ]
    );

    // var_dump($redis->get('remember'));
    // echo '<br>';
    // var_dump($user['status']);
    // die;

    if ($user['role'] == 'admin' && $user['status'] == 'active') {
      header('Location: ' . BASE_URL . '/?page=dashboard');
    } else if ($user['role'] == 'user' && $user['status'] == 'active') {
      header('Location: ' . BASE_URL . '/');
    } else if ($user['role'] == 'bem' && $user['status'] == 'active') {
      header('Location: ' . BASE_URL . '/?page=bem');
    } else {
      $error = 'Akun anda sedang tidak aktif, silahkan hubungi admin';
    }
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
      <input type="email" name="email" class="form-control login" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating">
      <input type="password" name="password" class="form-control login2" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="remember" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">Belum punya akun? <a href="<?= BASE_URL ?>/?page=register">Daftar</a></p>
    <p class="mt-1 mb-3 text-muted">&copy; 2017–2022</p>
  </form>
</main>

<?php
include 'layouts/auth/authfooter.php';
?>