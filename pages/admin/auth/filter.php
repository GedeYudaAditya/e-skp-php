<?php
if (isset($_SESSION['login'])) {
    $user = new User();
    $user = $user->getUser([
        'username' => $_SESSION['username']
    ]);
    if ($user['role'] == 'user') {
        header('Location: ' . BASE_URL . '/');
    } else if ($user['role'] == 'bem') {
        header('Location: ' . BASE_URL . '/?page=bem');
    }
} else if (!isset($_SESSION['login'])) {
    header('Location: ' . BASE_URL . '/?page=login');
}
