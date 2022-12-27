<?php
include 'config.php';
// include 'layouts/header.php';
// include 'layouts/slidebar.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'index';
include "pages/$page.php";

// include 'layouts/bottom.php';
