<?php
require_once "head.php";
require_once "../private/db.php";
session_start();
$quiz_id = $_GET['quiz_id'];
$_SESSION['quiz_id'] = $quiz_id;

$qry = "SELECT * FROM questions WHERE quiz_id = $quiz_id";
$result = $conne->query($qry) or die("error");
$questions = $result->fetch_assoc();
 $_SESSION['total'] = $result->num_rows;
$question_id = $questions['question_no'];
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
            <li><b> اعاهد نفسي اني لن اغش </b><span style="color: #f44425"> <?php echo "" ?></span></li>
        </ul>
        <a href="question.php?n=<?php echo $question_id ?> " class="start">Start
            Quiz</a>
    </div>
</main>
<footer>
    Copyright &copy 2022
</footer>
</body>
</html>