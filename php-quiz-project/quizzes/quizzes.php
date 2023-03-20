<?php

//require_once "head.php";
require_once "../private/head.php";
require_once "../private/db.php";
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
<body>
<header>
    <div class="container">
        <nav>
            <p>
                <a class="logo" href="../index.php">Edumark</a>
            </p>
            <ul>
                <li><a href="../index.php">HOME</a></li>
                <li><a href="quizzes.php">QUIZ LIST</a></li>
                <li><a href="../public/users.php">USERS</a></li>
                <li><a style="color: #f55d42" href="../public/login/logout.php">LOGOUT</a></li>
            </ul>
        </nav>
    </div>
</header>
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row mb-4 mt-4">
        </div>
        <div class="row">
            <div class="col-md-12" style="padding:20px 100px;">
                <h2><a class="btn btn-success" href="add-quiz.php">+ADD A Quiz</a></h2>
<!--                <input type="button" id="btnShowMsg" value="Click Me!" onClick="showMessage()" />-->

                <div class="card" style="text-align: center">
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Course</th>
                                <th>Teacher</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = $conne->query("SELECT * from quizzes q where q.teacher_id = " . $_SESSION['id'] . " ");
                            $i = 1;
                            if ($sql->num_rows > 0):
                                $qry = "SELECT * from instructors where teacher_id = " . $_SESSION['id'] . " ";
                                $result = $conne->query($qry);
                                $row1 = $result->fetch_assoc();
                                $co_no = $row1['course_id'];
                                while ($row = $sql->fetch_assoc()):
                                    $qry2 = "SELECT * from course where course_id = " . $co_no . " ";
                                    $result2 = $conne->query($qry2);
                                    $course = $result2->fetch_assoc();

                                    ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $row['title'] ?></td>
                                        <td><?php echo $course['name'] ?></td>
                                        <td><?php echo $_SESSION['name'] ?></td>
                                        <td class="table-center">
                                            <a href="add-question.php?qno=<?php echo $row['id'] ?>" class="btn btn-sm btn-outline-secondary " type="button">Add Question
                                            </a>
                                            <form style="display: inline-block" method="post" action="update-quiz.php">
                                                <input type="hidden" name="qid" value="<?php echo $row['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-outline-primary">Edit</button>
                                            </form>
                                            <form style="display: inline-block" method="post" action="../private/delete-quiz.php">
                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Table Panel -->
        </div>
    </div>

</div>
<style>

    td {
        vertical-align: middle !important;
    }

    td p {
        margin: unset
    }

    img {
        max-width: 100px;
        max-height:: 150px;
    }
</style>
</body>
<script type="text/javascript">
    function showMessage() {
        alert("Hello friends, this is message.");
    }
</script>
</html>
<?php

?>

