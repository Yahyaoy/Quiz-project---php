<?php
require_once "db.php";
$id = $_POST['id'];
$sql = "DELETE FROM questions WHERE question_no = $id";
if (!mysqli_query($conne, $sql)) {
    echo "Error: " . $sql . "<br>" . $conne->error;
}
header('Location: ../quizzes/quizzes.php');
exit();
