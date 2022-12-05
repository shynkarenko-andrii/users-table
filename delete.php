<?php
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data["id"])) {

    $connect = include 'db.php';

    $id = $connect->real_escape_string($data["id"]);
    $sql = "DELETE FROM Users WHERE id = '$id'";
    if ($connect->query($sql)) {
        $data['success'] = true;
    } else {
        $data['success'] = false;
        $data['error'] = $connect->error;
    }
    $connect->close();
}
header("Content-type: application/json; charset=utf-8");
echo json_encode($data);