<?php
require_once "head.php";
require_once "../private/db.php";

session_start();
$question_no = $_GET['n'];
$total = $_SESSION['total'];
$query = "SELECT * FROM questions WHERE question_no = $question_no ";
$result = $conne->query($query) or die("error my dear".mysqli_error());
$question = $result->fetch_assoc();
$quesNo = $question['question_no'];
$_SESSION['counter'] = $_SESSION['counter'] ?? 1;



?>

<header>
    <div class="container">
        <h1>QUIZZES</h1>
    </div>
</header>
<main>
    <div class="container">
        <div class="current">Question <?php echo $_SESSION['counter'] ?> of <?php echo $total ?></div>
        <p class="question"><?php echo $question['text'] ?></p>
        <!--        <p class="question">What is PHP?</p>-->
        <form method="post" action="process.php">
            <ul>
                <?php ?>
                <li><input type="radio" id="choice1" name="choice"
                           value="<?php echo $question['choice1']; ?>"/><label
                            for="choice1"> <?php echo $question['choice1'] ?></label>
                </li>
                <li><input type="radio" id="choice2" name="choice"
                           value="<?php echo $question['choice2']; ?>"/><label
                            for="choice2"> <?php echo $question['choice2'] ?></label>
                </li>
                <li><input type="radio" id="choice3" name="choice"
                           value="<?php echo $question['choice3']; ?>"/><label
                            for="choice3"> <?php echo $question['choice3'] ?></label>
                </li>
                <li><input type="radio" id="choice4" name="choice"
                           value="<?php echo $question['choice4']; ?>"/><label
                            for="choice4"> <?php echo $question['choice4'] ?></label>
                </li>
            </ul>

            <input name="submit" class="submit" type="submit" value="Submit">
            <input name="number" type="hidden" value="<?php echo $quesNo ?>">
            <input name="nonQ" type="hidden" value="<?php echo $total ?>">
            <input name="counter" type="hidden" value="<?php echo $_SESSION['counter'] ?>">

        </form>
    </div>
</main>
<footer>
    Copyright &copy 2022
</footer>
</body>
</html>

