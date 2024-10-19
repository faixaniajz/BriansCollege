<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login For Enteries</title>
    <link rel="stylesheet" href="php system/style/style.css">
</head>
<body>

<div class="container">
            <div class="box form-box">
                <header>Login For Enteries</header>
                <form action="doadminform.php" method="post">
                    <div class="field input">
                        <label for="email">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <div class="field">
                        
                        <input type="submit" class="btn" name="submit" value="Login" required>
                    </div>
                    
                </form>
            </div>
        </div>

</body>
</html>