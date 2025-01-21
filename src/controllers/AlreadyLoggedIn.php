<?php

namespace App\controllers;

class AlreadyLoggedIn{
    // Before route
    public function beforeroute($f3){
        //if user is already logged in redirect to welcome page with a respective message
        if ($f3->exists('SESSION.loggedIn') && $f3->get('SESSION.loggedIn')) {
            // Redirect to the welcome page
            $f3->reroute('/welcome/already-loggedin/');
        }
    }
}

?>