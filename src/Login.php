<?php

namespace App;

class Login extends AppController {
    function render($f3){
        // Render login page
        echo \Template::instance()->render("/pages/login/login.php");
    }

    function handleLogin($f3) {
        // get username and password from the form
        $username = $f3->get('POST.username');
        $password = $f3->get('POST.password');

        // Authenticate user (Replace with your real authentication logic)
        if ($this->authenticate($username, $password)) {
            // Set a session variable to track the user is logged in
            $f3->set('SESSION.loggedIn', true);
            $f3->set('SESSION.username', $username); // You can store the username or other user data

            // Redirect to the welcome page after successful login
            $f3->reroute('/welcome');
        } else {
            // Set an error message in session
            $f3->set('SESSION.error', 'Invalid credentials. Please try again.');

            // Redirect back to the login page
            $f3->reroute('/login');
        }
    }
}

?>