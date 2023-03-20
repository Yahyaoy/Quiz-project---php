<?php
require_once "../private/db.php";
require_once "head.php";
  $quiz_id = $_POST['qid'];

$qry = "select * from quizzes where id= $quiz_id";
$results = $conne->query($qry) or die(mysqli_error());
$quiz = $results->fetch_assoc();
?>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<header>
    <div class="container" style="padding: 20px">
        <h1>QUIZZES</h1>
    </div>
</header>
<main>
    <div class="container" style="width: 75%;">

        <table class="table table-hover">

            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $qry = "select * from questions where quiz_id = $quiz_id";
            $result = mysqli_query($conne, $qry);
            $i = 1;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $i++ . "</td>";
                    echo "<td>" . $row['text'] . "</td>";
                    ?>
                    <td>
                        <a href="update.php?id=<?php echo $row['question_no'] ?>"
                           class="btn btn-sm btn-outline-primary">Edit</a>
                        <form style="display: inline-block" method="post" action="../private/delete-question.php">
                            <input type="hidden" name="id" value="<?php echo $row['question_no'] ?>">
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                    <?php
                }
            }
            echo "</tr>";
            ?>
            </tbody>
        </table>

    </div>
</main>
<footer>
    Copyright &copy 2022
</footer>
</body>
</html>




