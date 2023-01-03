<?php
if (isset($_SESSION['login'])) {
    $user = new User();
    $user = $user->getUser([
        'username' => $_SESSION['username']
    ]);
    if ($user['role'] == 'user' && $user['status'] == 'active') {
        header('Location: ' . BASE_URL . '/');
    } else if ($user['role'] == 'bem' && $user['status'] == 'active') {
        header('Location: ' . BASE_URL . '/?page=bem');
    }
} else if (!isset($_SESSION['login'])) {
    header('Location: ' . BASE_URL . '/?page=login');
}
