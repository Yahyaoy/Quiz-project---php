<?php
require_once "head.php";

$question_id = $_GET['id'];
$sql = "SELECT * FROM questions where question_no = $question_id";
$results = $conne->query($sql) or die("error");
$question = $results->fetch_assoc();

if (isset($_POST['submit'])) {
    $quesText = $_POST['question'];
    $ch1 = $_POST['choice1'];
    $ch2 = $_POST['choice2'];
    $ch3 = $_POST['choice3'];
    $ch4 = $_POST['choice4'];
    $correct = $_POST['correct_ch'];

    $qry = "UPDATE  questions SET  `text` ='$quesText',
                        `choice1` ='$ch1',
                        `choice2` ='$ch2',
                        `choice3` ='$ch3',
                        `choice4` ='$ch4',
                        `correctCh` ='$correct'
                      where question_no='$question_id' ";
    $conne->query($qry) or die("error" . mysqli_error());
    header("location:quizzes.php");
}

?>

<header>
    <div class="container">
        <h1>QUIZZES</h1>
    </div>
</header>
<main>
    <div class="container">
        <h2>UPDATE QUIZ:</h2>
        <form class="" method="post">
            <div class="">
                <label class="">Question:</label>
                <input type="text" name="question" class="" value="<?php echo $question['text'] . " "; ?>"
                       required> <br>
                <p>
                    <label class="">Choice #1 :</label>
                    <input type="text" name="choice1" value="<?php echo $question['choice1']; ?> "><br>
                </p>
                <p>
                    <label class="">Choice #2 :</label>
                    <input type="text" name="choice2" value="<?php echo $question['choice2']; ?> "><br>
                </p>
                <p>
                    <label class="">Choice #3 :</label>
                    <input type="text" name="choice3" value="<?php echo $question['choice3']; ?> "><br>
                </p>
                <p>
                    <label class="">Choice #4 :</label>
                    <input type="text" name="choice4" value="<?php echo $question['choice4']; ?> "><br>

                </p>
                <p>
                    <label class="">Correct Answer:</label>
                    <input type="text" name="correct_ch" value="<?php echo $question['correctCh']; ?> "><br>

                </p>

                <button type="submit" name="submit" class="submit">UPDATE</button>
            </div>
        </form>
    </div>

</main>
<footer>
    Copyright &copy 2022
</footer>
</body>
</html>


