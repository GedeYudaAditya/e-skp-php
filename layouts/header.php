<!DOCTYPE html>
<html lang="en">

<?php
$user = new User();
$user = $user->getUser([
    'username' => $_SESSION['username']
]);
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: ' . BASE_URL . '/?page=login');
}

// if (isset($_SESSION['login'])) {
//     $user = new User();
//     $user = $user->getUser([
//         'username' => $_SESSION['username']
//     ]);
//     if ($user['role'] == 'admin') {
//         header('Location: ' . BASE_URL . '/?page=dashboard');
//     } else if ($user['role'] == 'bem') {
//         header('Location: ' . BASE_URL . '/?page=bem');
//     } else if ($user['role'] == 'user') {
//         header('Location: ' . BASE_URL . '/');
//     }
// } else if (!isset($_SESSION['login'])) {
//     header('Location: ' . BASE_URL . '/?page=login');
// }
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= APP_NAME ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= BASE_URL ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= BASE_URL ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">