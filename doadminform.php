<?php

$username = "Kashif";
$password = "Kashif61245";

if (isset($_POST["username"]) && $_POST["username"] === $username) {
    
    if (isset($_POST["password"]) && $_POST["password"] === $password) {
        header("location:showstudents.php");
    } else {
        echo "<font color='red'>You entered wrong login details!</font> <a href='adminform.php'>Login Again</a>";
    }
} else {
    echo "<font color='red'>You entered wrong login details!</font> <a href='adminform.php'>Login Again</a>";
}
?>