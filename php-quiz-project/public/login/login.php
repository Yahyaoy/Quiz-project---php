<?php
require_once "../../private/db.php";
require_once "../../private/header.php";

session_start();
if (isset($_SESSION['username'])) {
    if ($_SESSION['login_type'] == 1) {
        header('location:../admin.php');
        exit();
    } else if ($_SESSION['login_type'] == 2) {
        header('location:../student.php');
        exit();
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if (strpos($user, '@') !== false) {
        $sql = "SELECT * FROM instructors WHERE username = '$user' AND password = '$pass'";
        $result = $conne->query($sql) or die("error");
        $_SESSION['login_type'] = 1;
        $teacher = mysqli_fetch_array($result);
        if (is_array($teacher)) {
            $_SESSION['username'] = $teacher['username'];
            $_SESSION['id'] = $teacher['teacher_id'];
            $_SESSION['name'] = $teacher['name'];
        } else {
            echo "<h6 style='margin-left: 151px;
    color: red;
    position: relative;
    bottom: -567px;
    font-size: 15px;
    z-index: 10;'>
    Check your Input , then Try Again</h6>";
        }
    } else {
        $sql = "SELECT * FROM students WHERE username = '$user' AND password = '$pass'";
        $result = $conne->query($sql) or die("error");
        $_SESSION['login_type'] = 2;
        $std = mysqli_fetch_array($result);
        if (is_array($std)) {
            $_SESSION['username'] = $std['username'];
            $_SESSION['id'] = $std['student_id'];
            $_SESSION['name'] = $std['name'];
        } else {
            echo "<h6 style='margin-left: 151px;
    color: red;
    position: relative;
    bottom: -567px;
    font-size: 15px;
    z-index: 10;'>
    Check your Input , then Try Again</h6>";
        }
    }
    if (isset($_SESSION['name'])) {
        if ($_SESSION['login_type'] == 1) {
            header('location:../admin.php');
            exit();
        } else if ($_SESSION['login_type'] == 2) {
            header('location:../student.php');
            exit();
        }
    }

}


?>


<link rel="stylesheet" type="text/css" href="../../css/style.css">
<header>
    <div class="container">
        <nav>
            <p>
                <a class="logo" href="../../index.php">Edumark</a>
            </p>
            <ul>
                <li><a href="../../index.php">HOME</a></li>
                <li><a href="signup.php">SIGNUP</a></li>
            </ul>
        </nav>
    </div>
</header>
<div class="home">

    <h6 class="main-title">Welcome to Login Page</h6>

    <div class="container">

        <form style="" class="form" method="post">
            <div>
                <p style="font-size: 18px; text-align: center; margin-bottom:15px; color:#0d8cf1;"> please enter your
                    username & password </p>
            </div>
            <label> username:</label>
            <input type="text" name="username" placeholder="your id num" required><br>
            <label> Password:</label>
            <input type="password" name="password" placeholder="password" required><br>
            <div class="submit">
                <p style="color: red ; display: none" class="validate">wrong username or password</p>

                <button type="submit" name="submit">LOGIN</button>
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
</html>




