<?php
include 'config.php';
ob_start();
// include 'layouts/header.php';
// include 'layouts/slidebar.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'index';
$file = "pages/$page.php";
if (file_exists($file)) {
    include $file;
} else {
    include 'pages/error/404.php';
}
// include 'layouts/bottom.php';
