<?php 
if (isset($_SESSION['login'])) {
    $user = new User();
    $user = $user->getUser([
        'username' => $_SESSION['username']
    ]);
    if ($user['role'] == 'admin') {
        header('Location: ' . BASE_URL . '/?page=dashboard');
    } else if ($user['role'] == 'bem') {
        header('Location: ' . BASE_URL . '/?page=bem');
    }
} else {
    header('Location: ' . BASE_URL . '/?page=login');
}
