<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
    <style>
        .upload-form {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .upload-form h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #555555;
        }

        .form-group input[type="text"],
        .form-group input[type="file"],
        .form-group input[type="email"],
        .form-group select {
            width: calc(100% - 10px);
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            font-size: 16px;
            color: #333333;
        }

        .form-group input[type="file"] {
            padding: 3px;
        }

        .form-group input[type="submit"] {
            background-color: #28a745;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-group input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <a href="index.php"><img src="https://brainscollege.edu.pk/assets/images/resources/logo-1.png" width="100" style="margin-top:10px;"></a>
        </div>

        <div class="right-links">

            <?php

            $id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT*FROM users WHERE Id=$id");

            while ($result = mysqli_fetch_assoc($query)) {
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Rollnum = $result['Rollnum'];
                $res_id = $result['Id'];
            }

            echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
            ?>

            <a href="../../index"> <button class="btn">Log Out</button> </a>

        </div>
    </div>
    <main>

        <div class="main-box top">
            <div class="top">
                <div class="box" style="text-align:center;">
                    <p>Hello <b><?php echo $res_Uname ?></b>, Welcome</p>
                </div>
                <div class="box" style="text-align:center;">
                    <p>Your email is <b><?php echo $res_Email ?></b></p>
                </div>
            </div>
            <div class="bottom">
                <div class="box" style="text-align:center;">
                    <p>Your Roll Number is : <b><?php echo $res_Rollnum ?></b></p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <div class="">
                        <h1 align="center">Upload Assignment</h1>
                        <form action="upload_assignment.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="course">Select Course:</label>
                                <select name="course" id="course" required>
                                    <option value="web">Web</option>
                                    <option value="it">IT</option>
                                    <option value="python">Python</option>
                                    <option value="graphics">Graphics</option>
                                    <option value="autocad">AutoCAD</option>
                                    <option value="3dsmax">3ds Max</option>
                                    <option value="shopify">Shopify</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Enter Your Email:</label>
                                <input type="email" name="Email" id="Email" required pattern="[a-zA-Z0-9._%+-]+@gmail\.com$" title="Please enter a valid Gmail address (e.g., example@gmail.com)">
                            </div>

                            <div class="form-group">
                                <label for="assignment">Upload Assignment:</label>
                                <input type="file" name="assignment" id="assignment" accept=".jpg, .jpeg, .png, .mp4" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="upload">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
</body>

</html>