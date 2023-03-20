<?php
require_once "head.php";
require_once "../private/db.php";
session_start();
$q = $_GET['qn'];
$course_id = $_SESSION['course'];
$grade = $_SESSION['score'];
 $std = $_SESSION['id']; //student

$query = "INSERT into results (std_id, quiz_id , score)
       values('$std', '$q', '$grade')";
$conne->query($query) or die(mysqli_error());

?>

<header>
    <div class="container">
        <h1>QUIZZES</h1>
    </div>
</header>
<main>
    <div class="container">
        <h2>You’re Done!</h2>
        <p>Congrats!! You Have Completed The Test.</p>
        <p><b>Final Score: </b><?php echo $grade ?></p>
        <p>
        <form method="post" action="../public/student.php">
            <input type="hidden" name="grade" value="<?php echo $grade ?>">
            <input type="hidden" name="quiz" value="<?php echo $q ?>">
            <!--            <input type="hidden" name="course" value="--><?php //echo $course_id ?><!--">-->
            <input type="submit" name="submit"  value="Finish" class="finish">
        </form>
        </p>


    </div>
</main>
<footer>
    Copyright &copy 2022
</footer>
</body>
</html>