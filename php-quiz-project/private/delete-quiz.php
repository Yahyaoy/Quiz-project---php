<?php
require_once "db.php";
$id = $_POST['id'];
$sql = "DELETE FROM quizzes WHERE id = $id";
if (!mysqli_query($conne, $sql)) {
    echo "Error: " . $sql . "<br>" . $conne->error;
}
header('Location: ../public/quizzes.php');
exit();
