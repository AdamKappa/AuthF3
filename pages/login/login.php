<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/pages/login/login.css"><!-- may I build this path programmatically -->
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <?php 
        if(!empty($login_message)){
            echo '<div class="alert alert-danger">' . $login_message . '</div>';
        }
        
        if(isset($_SESSION['SignUpMessage'])){
            echo '<div class="alert alert-success">' . $_SESSION['SignUpMessage'] . '</div>';
            unset($_SESSION['SignUpMessage']);
        }       
        ?>

        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Please enter Username" required>
            </div>    
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Please enter password" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="signup">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>