<?php
require_once "head.php";
require_once "../private/db.php";

$quiz_no = $_GET['qno'];

if (isset($_POST['submit'])) {
    $quesText = $_POST['question'];
    $ch1 = $_POST['choice1'];
    $ch2 = $_POST['choice2'];
    $ch3 = $_POST['choice3'];
    $ch4 = $_POST['choice4'];
    $correct = $_POST['correct_choice'];

    $qry = "INSERT INTO questions (text,quiz_id,choice1,choice2,choice3,choice4,correctCh)
 VALUES ('$quesText','$quiz_no','$ch1','$ch2','$ch3','$ch4','$correct')";
    $conne->query($qry) or die("error" . mysqli_error());
    echo '<script>alert("A Question Added Successfully")</script>';
}
?>

<header>
    <div class="container">
        <h1>QUIZZES</h1>
    </div>
</header>
<main>
    <div class="container">
        <h2>ADD A QUESTION:</h2>
        <form class="" method="post">
            <div class="">
                <label class="">Question:</label>
                <input type="text" name="question" class="" value="" required> <br>
                <p>
                    <label class="">Choice #1 :</label>
                    <input type="text" name="choice1"><br>
                </p>
                <p>
                    <label class="">Choice #2 :</label>
                    <input type="text" name="choice2"><br>
                </p>
                <p>
                    <label class="">Choice #3 :</label>
                    <input type="text" name="choice3"><br>
                </p>
                <p>
                    <label class="">Choice #4 :</label>
                    <input type="text" name="choice4"><br>

                </p>
                <p>
                    <label class="">Correct Answer:</label>
                    <input type="text" name="correct_choice"><br>

                </p>

                <button type="submit" name="submit" class="submit">ADD</button>
                <a href="quizzes.php" class="">Finish</a>
            </div>
        </form>
    </div>

</main>
<footer>
    Copyright &copy 2022
</footer>
</body>
</html>


