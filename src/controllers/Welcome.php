<?php

namespace App\controllers;

// Import LoggedInUser class
use App\models\LoggedInUser;

class Welcome extends AppController {
    public function render($f3) {
        
        //initialize template variable message
        $f3->set('message', NULL);
        // get the route parameter 'status'
        $status = $f3->get('PARAMS.status');
        // Based on the status, set a message
        if ($status === 'success-update') {
            $f3->set('message', 'Your account has been successfully updated!');
        }
        else if($status === 'already-loggedin'){
            $f3->set('message', 'Already Connected!');
        }
        
        // get the route parameters 'rows' and 'updated_success'
        // *****Remember, on routes Fat-Free automatically converts hyphens to underscores, 
        // *****so always access such params using underscores.
        if(($f3->exists('PARAMS.rows')) && ($f3->exists('PARAMS.updated_success'))){
            $rows_effected = $f3->get('PARAMS.rows');
            $f3->set('message', $rows_effected.' account(s) has been successfully updated!');
        }

        // Get the json LoggedInUser from the session
        $jsonLoggedInUser = $f3->get("SESSION.LoggedInUser");
        //echo $jsonLoggedInUser;
        if ($jsonLoggedInUser) {
            //decode jsonLoggedInUser json
            $userData = json_decode($jsonLoggedInUser);
            //echo var_dump($userData);
            //set template variables
            $f3->set("username",$userData->username);
            if($userData->access_level === "0") {
                $f3->set("accessLevel","Administrator");
            } 
            else if($userData->access_level === "1"){
                $f3->set("accessLevel","Simple User");
            }
        } else {
            echo "No logged-in user found.";
        }

        // Render the welcome page
        echo \Template::instance()->render('/pages/welcome/welcome.php');
    }
}
?>