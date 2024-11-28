<?php
session_start(); // Start the session to track login status

if(isset($_POST['submit'])){
    // Define your login credentials
    $username = "Admin";
    $password = "Kashif61245";

    // Check if the entered username and password match
    if (isset($_POST["username"]) && $_POST["username"] === $username) {
        if (isset($_POST["password"]) && $_POST["password"] === $password) {
            // Set session variable to indicate the user is logged in
            $_SESSION['loggedin'] = true;
            header("location: admin_review"); // Redirect to the assignment approval page
            exit;
        } else {
            echo "<script>alert('You entered wrong login details!'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('You entered wrong login details!'); window.location.href='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Admin Assigments Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Approval Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Username</label>
                    <input type="text" name="username" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
