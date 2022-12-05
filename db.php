<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dataBaseName = "users_telenorma";

$connect = mysqli_connect($hostname, $username, $password, $dataBaseName);

if (!$connect) {
    die('Ошибка соединения: ' . mysql_error());
}

return $connect;
