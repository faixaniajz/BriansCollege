<?php

$username = "Admin";
$password = "Kashif61245";

if (isset($_POST["username"]) && $_POST["username"] === $username) {
    if (isset($_POST["password"]) && $_POST["password"] === $password) {
        header("location:admin_review.php");
    } else {
        echo "<script>alert('You entered wrong login details!'); window.location.href='adminform.php';</script>";
    }
} else {
    echo "<script>alert('You entered wrong login details!'); window.location.href='../approval.php';</script>";
}

?>
