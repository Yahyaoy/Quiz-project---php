<?php
require_once "db.php";
$id = $_POST['sid'];
$sql = "DELETE FROM students WHERE student_id = $id";
if (!mysqli_query($conne, $sql)) {
    echo "Error: " . $sql . "<br>" . $conne->error;
}
header('Location: ../public/users.php');
exit();
