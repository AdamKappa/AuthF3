<?php

namespace App\controllers;

class Authorizer{

    public function beforeroute($f3){
        //authorize here. Check if is not loggedin and has the right to be there
        if (!$f3->get('SESSION.loggedIn')) {
            // if user not loggedin, redirect to the home page with appropriate message
            $f3->reroute("/login/not-loggedIn");
        }
        
    }
}

?>