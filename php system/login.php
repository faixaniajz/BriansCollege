    <?php 
    session_start();
    ?>
    <html>
    <head>
        <link rel="stylesheet" href="style/style.css">
        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <div class="box form-box">
                <?php 
                $con = mysqli_connect("localhost","whxpykvf_brains1","brainskhan786","whxpykvf_assignment_management") or die("Couldn't connect");
               // include("php/config.php");
                if(isset($_POST['submit'])){
                    $email = mysqli_real_escape_string($con,$_POST['email']);
                    $password = mysqli_real_escape_string($con,$_POST['password']);

                    $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                    $row = mysqli_fetch_assoc($result);

                    if(is_array($row) && !empty($row)){
                        $_SESSION['valid'] = $row['Email'];
                        $_SESSION['username'] = $row['Username'];
                        $_SESSION['Rollnum'] = $row['Rollnum'];
                        $_SESSION['id'] = $row['Id'];
                    }else{
                        echo "<div class='message'>
                        <p>Wrong Username or Password</p>
                        </div> <br>";
                    echo "<a href='login.php'><button class='btn'>Go Back</button>";
            
                    }
                    if(isset($_SESSION['valid'])){
                       // header("location: home.php");
                      echo "<script>
                      window.location.href='home.php';
                      </script>";
                    }
                }else{

                
                ?>
                <header>Login</header>
                <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
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
                        Don't have account? <a href="register.php">Sign Up Now</a>
                    </div>
                </form>
            </div>
            <?php } ?>
        </div>
    </body>
    </html>