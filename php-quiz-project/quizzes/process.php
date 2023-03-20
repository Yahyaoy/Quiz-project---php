<?php
require_once "../private/db.php";
session_start();

// check for score if isset
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}
if (isset($_POST['submit'])) {
    $_SESSION['counter']++;
    $total = $_POST['nonQ'];
    $counter = $_POST['counter'];
    $number = $_POST['number'];// the question number
    $selectedChoice = $_POST['choice'];
    $next = $number + 1;


    /*
     * get correct choice
     */
    $sql02 = "Select * FROM questions WHERE question_no  = '$number' ";

    /*
     * get result
     */
    $result = $conne->query($sql02) or die(mysqli_errno());
    /*
     * get row
     */
    $row = $result->fetch_assoc();

    /*
     * compare
     */
    if ($row['correctCh'] == $selectedChoice) {
        // answer is correct
        $_SESSION['score']++;
    }
    if ($counter == $total) {
        header("location:final.php?qn=" . $_SESSION['quiz_id'] . "& course=" . $_SESSION['course']);
        exit();
    } else {
        header("location:question.php?n=" . $next);
        exit();
    }
}
?>


<?php
//require_once "../private/db.php";
//session_start();
//
//
//if (isset($_POST['submit'])) {
//    $_SESSION['counter']++;
//    $total = $_POST['nonQ'];
//    $counter = $_POST['counter'];
//    $number = $_POST['number'];// the question number
//    $selectedChoice = $_POST['choice'];
//    $next = $number + 1;
//
//    /*
//     * get total question
//     */
////    $sql01 = "SELECT * FROM questions";
////    $results01 = $conne->query($sql01) or die("Ana mott Hhh");
////    $total = $results01->num_rows; // user_id
//    /*
//     * get correct choice
//     */
//
//    $sql02 = "Select * FROM questions WHERE question_no  = $number ";
//
//    /*
//     * get result
//     */
//    $result = $conne->query($sql02) or die(mysqli_error());
//    /*
//     * get row
//     */
//    $row = $result->fetch_assoc();
//    /*
//     * set correct choice
//     */
//    $correct_choice = $row['correctCh'];
//    /*
//     * compare
//     */
//    if ($correct_choice == $selectedChoice) {
//        // answer is correct
//        $_SESSION['score']++;
//    }
//    if ($counter == $total) {
//        header("location:final.php?qn=" . $_SESSION['quiz_id'] . "& course=" . $_SESSION['course']);
//        exit();
//    } else {
//        header("location:question.php?n=" . $next);
//        exit();
//    }
//}
