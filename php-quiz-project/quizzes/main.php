<?php
require_once "head.php";
require_once "../private/db.php";
session_start();
$quiz_id = $_GET['n'];

$sql = $conne->query("SELECT * FROM `results` where quiz_id = $quiz_id");
if ($sql->num_rows > 0) {
    while ($result = $sql->fetch_assoc()) {
        if ($result['std_id'] == $_SESSION['id'] && $result['quiz_id'] == $quiz_id) {
            header("location:../public/student.php");
            exit();
        }
    }
}
$teacher = $_GET['teacher'];
$_SESSION['course'] = $_GET['course'];
$course = $_SESSION['course'];

$sql = "SELECT * FROM questions where quiz_id = $quiz_id";
$results = $conne->query($sql) or die("Ana mott Hhh".mysqli_error());
$totalOfQuse = $results->num_rows; // user_id
?>

<header>
    <div class="container">
        <h1>QUIZZES</h1>
    </div>
</header>
<main>
    <div class="container">
        <h2>QUIZZES Title</h2>
        <p>This is a Multiple Choice Quiz </p>
        <ul class="exp">
            <li><b>Quiz Instructor is: </b> <?php echo $teacher ?></li>
            <li><b>Number Of Question is: </b><?php echo $totalOfQuse ?></li>
            <li><b>Estimated Time is: </b><span style="color: #f44425"> <?php echo $totalOfQuse ?> Minutes</span></li>
        </ul>
        <a href="find_quiz.php?quiz_id=<?php echo $quiz_id ?>& course ="<?php echo $course ?> class="start">Start
            Quiz</a>
    </div>
</main>
<footer>
    Copyright &copy 2022
</footer>
</body>
</html>