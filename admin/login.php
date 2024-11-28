<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Assignments Login | Brains College Portal</title>
    <meta name="title" content="Assignments Login | Brains College Portal">
    <meta name="description" content="Secure login to the Brains College admin portal. Manage courses, student records, and administrative tasks with ease.">
    <meta name="keywords" content="Brains College admin login, admin portal, course management, Brains College login, secure login, educational admin panel">
    <meta name="robots" content="index, follow">
    <link rel="icon" href="https://brainscollege.edu.pk/assets/images/favicons/apple-touch-icon.png">
    <link rel="canonical" href="https://brainscollege.edu.pk/admin/login" />

</head>

<body>
    <div class="container">
        <div class="box form-box">
            <?php

            include("php/config.php");
            if (isset($_POST['submit'])) {
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);

                $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if (is_array($row) && !empty($row)) {
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['Rollnum'] = $row['Rollnum'];
                    $_SESSION['id'] = $row['Id'];
                } else {
                    echo "<div class='message'>
                        <p>Wrong Username or Password</p>
                        </div> <br>";
                    echo "<a href='login'><button class='btn'>Go Back</button></a>";
                }
                if (isset($_SESSION['valid'])) {
                    header("Location: index");
                }
            } else {


            ?>
                <header>Login</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <div class="field">

                        <input type="submit" class="btn" name="submit" value="Login" required>
                    </div>
                    <div class="links">
                        Don't have account? <a href="register">Sign Up Now</a>
                    </div>
                </form>
        </div>
    <?php } ?>
    </div>
</body>

</html>