<?php

namespace App\controllers;

use App\models\Database;

class EditPage extends AppController{
    public function render($f3, $params){
        //diffenrent implement of url params - here using function's parameters
        if(isset($params["error"]) && $params["error"] === "error"){
            $f3->set("message", "Failed to update your account. Please try again.");
        }
        else{
            $f3->set("message", NULL);
        }
        
        // Get the json LoggedInUser from the SESSION
        $jsonLoggedInUser = $f3->get("SESSION.LoggedInUser");
        $UserData = json_decode($jsonLoggedInUser);
        $f3->set("UserData", $UserData);
        // $f3->set("UserID",$UserData->id);
        // $f3->set("UserName",$UserData->username);
        // $f3->set("UserAccess",$UserData->access_level);
        
        // Fetch all users from the database (for admin view)
        $db = new Database();
        $connection = $db->connect();
        $usersResults = $connection->exec("SELECT ID, username FROM users");
        // Pass the users data(its an array of arrays) to the template as template variable
        $Users = $f3->set("Users", $usersResults);  
        
        //render Edit page
        echo \Template::instance()->render("/pages/editpage/editpage.php");
    }

    public function submitNewDataSimpleUser($f3){
        // Get form data
        $newUsername = $f3->get('POST.username');
        $newPassword = base64_encode($f3->get('POST.password'));
        $userID = $f3->get("SESSION.LoggedInUser") ? json_decode($f3->get("SESSION.LoggedInUser"))->id : null;

        // Use the Database model to get the connection
        $db = new Database();
        $connection = $db->connect();

        // Update DB with user's data using prepared statements
        $result = $connection->exec("UPDATE users SET username = ?, password = ? WHERE ID = ?", [$newUsername, $newPassword, $userID]
        );

        // Disconnect from $db
        $db->disconnect();

        if ($result) {
            $f3->reroute('/welcome/success');
        } else {
            $f3->reroute('/editpage/error');
        }
    }

    public function submitNewDataAdminUser($f3){
        




        // Disconnect from $db
        $db->disconnect();

        if ($result) {
            $f3->reroute('/welcome/success');
        } else {
            $f3->reroute('/editpage/error');
        }
    }
}

?>