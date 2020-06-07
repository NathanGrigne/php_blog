<?php
    // Session
    session_start();

    if($_SERVER['HTTP_HOST'] === 'localhost:8888'){
        // Errors
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Database
        define('DB_HOST', 'localhost');
        define('DB_PORT', '8889');
        define('DB_NAME', 'php_blog');
        define('DB_USER', 'root');
        define('DB_PASS', 'root');
    }

    $pdo = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);