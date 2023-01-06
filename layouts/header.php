<!DOCTYPE html>
<html lang="en">

<?php
$user = new User();
$user = $user->getUser([
    'username' => $_SESSION['username']
]);
if (isset($_POST['logout'])) {
    // delete redis key
    $redis->del('remember');

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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link href="<?= BASE_URL ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= asset('/css/custom.css') ?>" rel="stylesheet">

    <!-- admin css -->
    <?php if ($user->role == 'admin') : ?>

    <?php endif; ?>

    <!-- bem css -->
    <?php if ($user->role == 'bem') : ?>

    <?php endif; ?>

    <!-- user css -->
    <?php if ($user->role == 'user') : ?>
        <link rel="stylesheet" href="<?= asset('css/user/styledash.css') ?>">
        <link rel="stylesheet" href="<?= asset('css/user/styledata.css') ?>">
        <link rel="stylesheet" href="<?= asset('css/user/styleform.css') ?>">
    <?php endif; ?>

    <!-- datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">