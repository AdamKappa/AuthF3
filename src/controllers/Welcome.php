<?php

namespace App\controllers;

// Import LoggedInUser class
use App\models\LoggedInUser;

class Welcome extends Authorizer {
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
        
        //decode jsonLoggedInUser json
        $userData = json_decode($jsonLoggedInUser);
        
        //set template variables
        $f3->set("username", $userData->username);
        $f3->set("accessLevel", $userData->access_level);
        

        // Render the welcome page
        echo \Template::instance()->render('/src/pages/welcome/welcome.php');
    }
}
?>