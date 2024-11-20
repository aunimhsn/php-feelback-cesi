
<?php

$env = parse_ini_file('.env');

$host = 'localhost';
$database = 'feelback_db';
$username = $env['DB_USERNAME'];
$password = $env['DB_PASSWORD'];

$dsn = "mysql:host=$host;dbname=$database;charset=UTF8";
$pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);