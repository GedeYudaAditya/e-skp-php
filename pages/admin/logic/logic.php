<?php
if (isset($_POST['updateMahasiswa'])) {
    // $id = $_POST['_id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    // $role = $_POST['role'];

    $user = new User();
    $result = $user->updateUser(
        $username,
        [
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            // 'role' => $role
        ]
    );
    // var_dump($result);
    // die;
    if ($result) {
        $_SESSION['success'] = 'Akun mahasiswa berhasil diupdate';
        header('Location: ' . BASE_URL . '/?page=admin/akunMahasiswa');
    } else {
        $_SESSION['error'] = 'Akun mahasiswa gagal diupdate';
        header('Location: ' . BASE_URL . '/?page=admin/akunMahasiswa');
    }
}

if (isset($_POST['deleteMahasiswa'])) {
    $username = $_POST['username'];
    $user = new User();
    $result = $user->deleteUser($username);
    if ($result) {
        $_SESSION['success'] = 'Admin berhasil dihapus';
        header('Location: ' . BASE_URL . '/?page=admin/akunMahasiswa');
    } else {
        $_SESSION['error'] = 'Admin gagal dihapus';
        header('Location: ' . BASE_URL . '/?page=admin/akunMahasiswa');
    }
}

if (isset($_POST['tambahAdmin'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password == $password2) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $user = new User();
        if ($user->getUser(['username' => $username])) {
            $_SESSION['error'] = 'Username sudah ada';
            header('Location: ' . BASE_URL . '/?page=admin/daftarAdmin');
            return;
        }
        $user->addUser([
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'role' => 'admin',
            'status' => 'active',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $_SESSION['success'] = 'Admin berhasil ditambahkan';
        header('Location: ' . BASE_URL . '/?page=admin/daftarAdmin');
    } else {
        echo "<script>alert('Password tidak sama')</script>";
    }
}

if (isset($_POST['updateAdmin'])) {
    // $id = $_POST['_id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $role = $_POST['role'];

    $user = new User();
    $result = $user->updateUser(
        $username,
        [
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'role' => $role,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]
    );
    // var_dump($result);
    // die;
    if ($result) {
        $_SESSION['success'] = 'Admin berhasil diupdate';
        header('Location: ' . BASE_URL . '/?page=admin/daftarAdmin');
    } else {
        $_SESSION['error'] = 'Admin gagal diupdate';
        header('Location: ' . BASE_URL . '/?page=admin/daftarAdmin');
    }
}

if (isset($_POST['deleteAdmin'])) {
    $username = $_POST['username'];
    $user = new User();
    $result = $user->deleteUser($username);
    if ($result) {
        $_SESSION['success'] = 'Admin berhasil dihapus';
        header('Location: ' . BASE_URL . '/?page=admin/daftarAdmin');
    } else {
        $_SESSION['error'] = 'Admin gagal dihapus';
        header('Location: ' . BASE_URL . '/?page=admin/daftarAdmin');
    }
}

if (isset($_POST['tambahBem'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password == $password2) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $user = new User();
        if ($user->getUser(['username' => $username])) {
            $_SESSION['error'] = 'Username sudah ada';
            header('Location: ' . BASE_URL . '/?page=admin/akunBem');
            return;
        }
        $user->addUser([
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'role' => 'bem',
            'status' => 'active',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $_SESSION['success'] = 'BEM berhasil ditambahkan';
        header('Location: ' . BASE_URL . '/?page=admin/akunBem');
    } else {
        echo "<script>alert('Password tidak sama')</script>";
    }
}

if (isset($_POST['updateBem'])) {
    // $id = $_POST['_id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    // $role = $_POST['role'];

    $user = new User();
    $result = $user->updateUser(
        $username,
        [
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            // 'role' => $role
        ]
    );
    // var_dump($result);
    // die;
    if ($result) {
        $_SESSION['success'] = 'BEM berhasil diupdate';
        header('Location: ' . BASE_URL . '/?page=admin/akunBem');
    } else {
        $_SESSION['error'] = 'BEM gagal diupdate';
        header('Location: ' . BASE_URL . '/?page=admin/akunBem');
    }
}

if (isset($_POST['deleteBem'])) {
    $username = $_POST['username'];
    $user = new User();
    $result = $user->deleteUser($username);
    if ($result) {
        $_SESSION['success'] = 'BEM berhasil dihapus';
        header('Location: ' . BASE_URL . '/?page=admin/akunBem');
    } else {
        $_SESSION['error'] = 'BEM gagal dihapus';
        header('Location: ' . BASE_URL . '/?page=admin/akunBem');
    }
}
