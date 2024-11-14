<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $Rollnum = $_POST['Rollnum'];
            $password = $_POST['password'];

            // Validate email domain to allow only @gmail.com
            if (!preg_match("/^[a-zA-Z0-9._%+-]+@gmail\.com$/", $email)) {
                echo "<div class='message'>
                          <p>Please use a valid Gmail address (e.g., example@gmail.com).</p>
                      </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                exit; // Stop further execution if the email is invalid
            }

            // Check if the email already exists in the database
            $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

            if(mysqli_num_rows($verify_query) != 0 ){
                echo "<div class='message'>
                          <p>This email is already used, try another one!</p>
                      </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            }
            else{
                // Insert new user into the database
                mysqli_query($con,"INSERT INTO users(Username, Email, Rollnum, Password) VALUES('$username', '$email', '$Rollnum', '$password')") or die("Error Occurred");

                echo "<div class='message'>
                          <p>Registration successful!</p>
                      </div> <br>";
                echo "<a href='login.php'><button class='btn'>Login Now</button>";
            }
         } else {
         
        ?>

            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="Rollnum">Rollnum</label>
                    <input type="text" name="Rollnum" id="Rollnum" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="login.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>
