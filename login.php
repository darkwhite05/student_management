<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <body class="body_deg" background="images/black.jpg">
        <div id="navbar">
            <a href="index.php" class="logo">Canor University</a>
        </div>
    <center>
        
        <div class="form_deg">
            <center class="title_deg">Login Form
                <h4><?php 
                error_reporting(0); 
                session_start();
                session_destroy();
                echo $_SESSION['loginMessage'];
                ?></h4>
            </center>
            <form action="login_check.php" method="POST" class="login_form">
                <div>   
                    <label class="label_deg">Username</label>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div>   
                    <label class="label_deg">Password</label>
                    <input type="Password" name="password" placeholder="Password" required>
                </div>
                <div>   
                    <input class="btn btn-success" type="submit" name="submit" value="Login">
                </div>
            </form>
        </div>

    </center>
</body>
</html>