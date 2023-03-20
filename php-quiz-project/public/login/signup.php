<?php
require_once "../../private/head.php";
require_once "../../private/db.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $username = $_POST["username"];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    if ($password == $password2) {
        $sql = "INSERT INTO students (name,phone,username,password)
 VALUES ('$name', '$phone', '$username', '$password');";
        if (!mysqli_query($conne, $sql)) {
            echo "Error: " . $sql . "<br>" . $conne->error;
        } else {
            echo '<script>alert("Added Successfully")</script>';
        }
    } else {
        echo "Please check you entered the same password";
    }

}
?>


<!doctype html>
<html lang="en">
<head>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">

</head>
<body>
<header>
    <div class="container">
        <nav>
            <p>
                <a class="logo" href="../../index.php">Edumark</a>
            </p>
            <ul>
                <li><a href="../../index.php">HOME</a></li>
                <li><a href="login.php">LOGIN</a></li>
            </ul>
        </nav>
    </div>
</header>
<div class="home">
    <h6 class="main-title">Welcome to Sign up Page</h6>

    <div class="container">

        <form style="" class="form" method="post">
            <label> Name:</label>
            <input type="text" name="name" placeholder="your name" required><br>
            <label> Phone:</label>
            <input type="text" name="phone" placeholder="your phone" required><br>
            <label> username:</label>
            <input type="text" name="username" placeholder="your id num" required><br>
            <label> Password:</label>
            <input type="password" name="password" placeholder="password"><br>
            <label> Confirm Password:</label>
            <input type="password" name="password2" placeholder="confirm password"><br>
            <div class="submit">
                <button type="submit" name="submit">Sign Up</button>
            </div>

        </form>

        <div class="login-image">
            <img src="../../imges/right-img.png">
        </div>

    </div>

</div>

<footer>
    <!-- Start Footer -->
    <div class="footer">
        <div class="container">

            <p class="copyright">Copyright &copy; 2022 Made With &lt;3 By Edumark</p>
        </div>
        <!-- End Footer -->
</footer>
</body>
<script type="text/javascript" src="js/main.js"></script>
</html>




