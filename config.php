<?php
require 'vendor/autoload.php'; // include Composer's autoloader

// Konfigurasi Aplikasi
const APP_NAME = 'E-SKP';
const BASE_URL = 'http://localhost:8080/e-skp-php';

// Asset Url function
function asset($path = '')
{
    return BASE_URL . '/assets/' . $path;
}


// Session
session_start();

// Model
require_once 'models/User.php';
require_once 'models/Event.php';

// $utcdatetime = new \MongoDB\BSON\UTCDateTime();

function getDateMongoDB($date)
{
    $date = new \MongoDB\BSON\UTCDateTime(strtotime($date) * 1000);
    return $date->toDateTime()->format('d F Y | G : i');;
}
