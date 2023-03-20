<?php
require_once "../private/db.php";
session_start();
if (isset($_POST['submit'])) {
    $grade = $_POST['grade'];
    $quiz = $_POST['quiz'];
    $std = $_SESSION['id']; //student
    $course_id = $_SESSION['course'];
    $_SESSION['quiz_id'] = 0;
    $_SESSION['total'] = 0;
    $_SESSION['score'] = 0;
    $_SESSION['counter'] = 1;
}
?>



<!doctype html>
<html lang="en">
<head>
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
                <li><a style="color: #f55d42" href="login/logout.php">LOGOUT</a></li>
            </ul>
        </nav>
    </div>
</header>


<div class="" style="padding:60px  200px 0 200px;">
    <table class="table table-bordered table-hover">
        <thead>
        <tr class="table-primary">
            <th scope="col">#</th>
            <th scope="col">Quiz.ID</th>
            <th scope="col">Quiz Name</th>
            <th scope="col">Grade</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sid = $_SESSION['id'];
        $qry = $conne->query("SELECT * FROM `results` where std_id = $sid ");
        $i = 1;
        if ($qry->num_rows > 0):
            while ($row = $qry->fetch_assoc()):
                $quiz_id = $row['quiz_id'];
                $quiz = $conne->query("SELECT * from quizzes where id =$quiz_id  ;")->fetch_assoc();
                ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row['quiz_id'] ?></td>
                    <td><?php echo $quiz['title'] ?></td>
                    <td><?php echo $row['score'] ?></td>
                    <td><?php echo 'Action' ?></td>
                </tr>

            <?php endwhile; ?>
        <?php endif; ?>
        </tbody>

    </table>


</div>

<!-- Table Panel -->

<div class="col-md-12" style="padding:30px 200px;">
    <table class="table table-bordered table-hover">
        <thead>
                    <?php echo '<h6 style=" width: 27%; padding:5px ;border: 1px dotted #0d8cf1; color: #f02f0d" >You Have just one try for Any quiz</h6>'; ?>

        <tr class="table-danger">
            <th>#</th>
            <th>Title</th>
            <th>Instructor</th>
            <th>Course</th>
            <th>Action</th>

        </tr>

        </thead>
        <tbody>
        <?php
        $qry = $conne->query("SELECT *  from quizzes  ");
        $i = 1;
        if ($qry->num_rows > 0):
            while ($row = $qry->fetch_assoc()):
                $items = $conne->query("SELECT  * from instructors where teacher_id = '" . $row['teacher_id'] . "' ")->fetch_array();
                $course = $conne->query("SELECT name from course where course_id = '" . $items['course_id'] . "' ")->fetch_array();

                ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $items['name'] ?></td>
                    <td><?php echo $items['course_id'] . ", " . $course['name'] ?></td>

                    <td class="text-center">
                        <a class="btn btn-sm btn-outline-primary edit_quiz"
                           href="../quizzes/main.php?n=<?php echo $row['id'] ?>& teacher=<?php echo $items['name'] ?>& course=<?php echo $items['course_id'] ?>">START </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php endif; ?>
        </tbody>
    </table>
    <!-- Table Panel -->

</div>

