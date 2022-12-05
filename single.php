<?php
$id = $_GET['id'];

$connect = include 'db.php';

$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($connect, $sql);

header("Content-type: application/json; charset=utf-8");
echo json_encode($result->fetch_assoc());
