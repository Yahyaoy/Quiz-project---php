<?php
require_once "../private/head.php";
require_once "../private/db.php";

?>


<!doctype html>
<html lang="en">
<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

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
                <li><a href="../quizzes/quizzes.php">QUIZ LIST</a></li>
                <li><a href="users.php">USERS</a></li>
                <li><a style="color: #f55d42" href="login/logout.php">LOGOUT</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="container-fluid">

    <div class="col-lg-12">
        <div class="row mb-4 mt-4">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row">
            <!-- FORM Panel -->

            <!-- Table Panel -->
            <div class="col-md-12" style="padding:20px 100px;">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $qry = $conne->query("SELECT *  from students;");
                            $i = 1;
                                while ($row = $qry->fetch_assoc()):?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['phone'] ?></td>
                                        <td class="text-center">

                                            <form style="display: inline-block" method="post" action="../private/delete-std.php">
                                                <input type="hidden" name="sid" value="<?php echo $row['student_id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Table Panel -->
        </div>
    </div>

</div>
