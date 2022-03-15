<?php
require_once '../config/DataDatabase.php';
$connect = mysqli_connect($servername, $username, $password, $database);

if (!$connect) {
    die('Ошибка подключения к бд...');
}