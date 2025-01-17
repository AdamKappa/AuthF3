<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/pages/signup/signup.css">
    <script>
        function checkPasswords() {
            const password = document.getElementById("password").value;
            const re_password = document.getElementById("confirm_password").value;
            const password_feedback = document.getElementById("password_feedback");
            const submitBtn = document.getElementById("submitBtn");
            
            if(password === "" || re_password === ""){
                password_feedback.textContent = "";
                password_feedback.className = "display-no";
                submitBtn.disabled = true;
            }
            else if(password === re_password) {
                password_feedback.textContent = "Passwords match!";
                password_feedback.className = "alert alert-success match";
                submitBtn.disabled = false;
                console.log("password same");
            } else { 
                password_feedback.textContent = "Passwords do not match!";
                password_feedback.className = "alert alert-warning no-match";
                submitBtn.disabled = true;
                console.log("password not same");
            }
        }
    </script>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Please enter a username" required> 
            </div>    
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Please enter a password" oninput="checkPasswords()" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Please re-enter the password" oninput="checkPasswords()" required>
                <div class="alert alert-warning display-no" role="alert" id="password_feedback"></div>
            </div>
            <div class="form-group">
                <div>
                    <label>User Type </label>
                </div>
                <label for="simple_user">Simple User</label>
                <input type="radio" name="user_type" id="simple_user" class="form-check-input" value="1" checked>
                <label for="admin">Admin</label>
                <input type="radio" name="user_type" id="admin" class="form-check-input" value="0">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" id="submitBtn" value="Sign Up" disabled>
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="/login">Login here</a>.</p>
        </form>
        <!-- Display sign up error message here -->
        <div class="alert alert-danger"></div>
    </div>
</body>
</html>