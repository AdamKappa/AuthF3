<?php

namespace App\controllers;

// Import the Database and LoggedInUser class
use App\models\Database;
use App\models\LoggedInUser;

class Login {

    //this method auto-called before route on login page 
    public function beforeroute($f3){
        //Authorize if user is already logged in 
        if ($f3->get('SESSION.loggedIn')) {
            // if so, redirect to the welcome page with appropriate message
            $f3->reroute('/welcome/already-loggedin/');
        }
    }
    public function render($f3){

        //initialize template variable loginMessage
        $f3->set("loginMessage", NULL);
        // get the route parameter 'error' 
        $error = $f3->get("PARAMS.error");
        if($error === "invalid-credentials"){
            // set template variable $loginMessage 
            $f3->set("loginMessage","Invalid credentials. Please try again.");
        }
        else if($error === "not-loggedIn"){
            // set template variable $loginMessage 
            $f3->set("loginMessage","Please login first.");
        }
        // Render login page template
        echo \Template::instance()->render("/src/pages/login/login.php");
    }

    public function handleLogin($f3) {
        // get username and password from form
        $username = $f3->get('POST.username');
        $password = base64_encode($f3->get('POST.password'));
        
        // Authenticate user
        $LoggedInUser = $this->authenticate($username, $password);
        if ($LoggedInUser) {
            //set necessary session variables
            $f3->set('SESSION.loggedIn', true);
            // convert LoggedInUser obj to JSON to bypass serialize/unserialize issues
            $jsonLoggedInUser = json_encode([
                'id' => $LoggedInUser->getID(),
                'username' => $LoggedInUser->getUsername(),
                'access_level' => $LoggedInUser->getAccessLevel()
            ]);
            $f3->set('SESSION.LoggedInUser', $jsonLoggedInUser); 
            // Redirect to the welcome page after successful login
            $f3->reroute('/welcome');
        } else {
            // Set an error message in session
            $f3->set('SESSION.error', 'Invalid credentials. Please try again.');
            // Redirect back to the login page
            $f3->reroute('/login/invalid-credentials');
        }
    }

    // Authenticate the user by checking credentials in the database
    public function authenticate($username, $password) {
        try {
          
            // set database connection
            $db = new Database();
            // Get database connection
            $conn = $db->connect();
            
            // Query the database to check user credentials [use parameterized method.. like prepare statement]
            $user = $conn->exec("SELECT id,username,access_level FROM users WHERE username = ? AND password = ?", [$username, $password]);

            // Check if user exists
            if ($user) {
                //success
                //create a LoggedInUser object, disconnect from $db and return LoggedInUser object
                $LoggedInUser = new LoggedInUser($user[0]["id"], $user[0]["username"], $user[0]["access_level"]);
                $db->disconnect();
                return $LoggedInUser;
                //return true; // Success
            }
            return false; // Failure
            
        }
        catch (\DB\SQL $e) {
            echo "DB Error: " . $e->getMessage();
            return false;
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

?>