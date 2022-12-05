<?php
$data = json_decode(file_get_contents('php://input'), true);

$connect = include 'db.php';

if (isset($data['first_name']) && isset($data['last_name']) && isset($data['position'])) {
    if (isset($data['id']) && $data['id']) {
        $sql = mysqli_query($connect, "UPDATE users SET `first_name` = '{$data['first_name']}', `last_name` = '{$data['last_name']}', `position` = '{$data['position']}' WHERE `id` = '{$data['id']}'");
    } else {
        $sql = mysqli_query($connect, "INSERT INTO users (`first_name`, `last_name`, `position`) VALUES ('{$data['first_name']}', '{$data['last_name']}', '{$data['position']}')");
    }
    if ($sql) {
        $data['success'] = true;
    } else {
        $data['success'] = false;
        $data['error'] = mysqli_error($connect);
    }
}
header("Content-type: application/json; charset=utf-8");
echo json_encode($data);
