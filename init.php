<?php
    define('DB_HOST', '');
    define('DB_USER', '');
    define('DB_PASS', '');
    define('DB_TABLE', 'discos');
    define('DB_NAME', 'album');

    ini_set('display_errors', true);
    error_reporting(E_ALL);

    require_once "DiscoModel.php";
    require_once 'functions.php';
