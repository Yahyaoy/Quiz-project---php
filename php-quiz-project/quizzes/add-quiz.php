<?php
require_once "head.php";
session_start();
if (isset($_POST['submit'])) {
    $quizName = $_POST['title'];
    $teacher_id = $_SESSION['id'];
    $qry = "INSERT INTO quizzes (title,teacher_id) VALUES ('$quizName','$teacher_id')";
    $excute = $conne->query($qry) or die(mysqli_error());
    header("location:quizzes.php");
    exit();
}
?>

<header>
    <div class="container">
        <h1>QUIZZES</h1>
    </div>
</header>
<main>
    <div class="container">
        <h2>Create A Quiz</h2>
        <form class="" method="post">
            <div class="">
                <p>
                    <label class=""> Quiz Title:</label>
                    <input type="text" name="title" value="">
                </p>
                <button type="submit" name="submit" class="submit">ADD</button>
            </div>
        </form>
    </div>

</main>
<footer>
    Copyright &copy 2022
</footer>
</body>
</html>


