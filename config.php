<?php
require 'vendor/autoload.php'; // include Composer's autoloader

// Konfigurasi Aplikasi
const APP_NAME = 'E-SKP';
const BASE_URL = 'http://localhost:8080/e-skp-php';

// Session
session_start();

// Model
require_once 'models/User.php';
