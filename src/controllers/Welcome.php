<?php

namespace App\controllers;

use App\models\LoggedInUser;

class Welcome extends AppController {
    public function render($f3) {
        
        // get the route parameter 'status' (e.g., 'updated')
        $status = $f3->get('PARAMS.status');
        // Based on the status, set a message
        if ($status === 'success') {
            $f3->set('message', 'Your account has been successfully updated!');
        }else{
            $f3->set('message', NULL);
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