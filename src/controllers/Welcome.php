<?php

namespace App\controllers;

use App\models\LoggedInUser;





class Welcome extends AppController {
    public function render($f3) {
        // // get Unserialize LoggedInUser object
        // echo unserialize($f3->get("SESSION.LoggedInUser"));//->getUsername();
        // // Render the welcome page
        // echo \Template::instance()->render('/pages/welcome/welcome.php');
        //=============================================
        // Check if the class is available
 if (!class_exists('App\\models\\LoggedInUser')) {
     echo "Class not found!--on welcome renter()";
 } else {
     echo "Class found!--on welcome renter()";
 }
        // Get the serialized LoggedInUser object from the session
        $serializedUser = $f3->get("SESSION.LoggedInUser");
        // Debugging the session data
        echo "Serialized data: " . var_export($serializedUser, true);
        // Check if the session variable is set and is a valid string before unserializing
        if ($serializedUser) {
            // Unserialize the object
            if(is_string($serializedUser)){
                echo "i have a serialized User obj--on welcome renter()";
                $LoggedInUser = unserialize($serializedUser);
            
                // Check if it's a valid LoggedInUser object
                if ($LoggedInUser instanceof LoggedInUser) {
                    // Access the username
                    echo $LoggedInUser->getUsername();
                } else {
                    echo "Invalid user data.--on welcome renter()";
                }
            }else{
                echo "Serialized data is not a valid string.--on welcome renter()";
            }
        } else {
            echo "No logged-in user found.--on welcome renter()";
        }
    }
}
?>