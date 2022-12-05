<?php

$connect = include 'db.php';

$sql = "SELECT * FROM users";
if ($result = mysqli_query($connect, $sql)) {

    echo "<table><tr><th>Id</th><th>Name</th><th>Surname</th><th>Position</th>
<th>Action</th></tr>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["first_name"] . "</td>";
        echo "<td>" . $row["last_name"] . "</td>";
        echo "<td>" . $row["position"] . "</td>";
        echo "<td><button onclick=\"editRecord(" . $row["id"] . ")\">Edit</button></td>";
        echo "<td><button onclick=\"deleteRecord(" . $row["id"] . ")\">Delete</button></td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
} else {
    echo "Ошибка: " . mysqli_error($connect);
}
