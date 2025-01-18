<?php

namespace App\controllers;

class Home extends AppController{
    public function render($f3){
        // Check if the user is logged in
        if ($f3->exists('SESSION.loggedIn') && $f3->get('SESSION.loggedIn')) {
            // Redirect to the welcome page
            $f3->reroute('/welcome');
        } else {
            // Redirect to the signup page
            $f3->reroute('/login');
        }
    }
}

?>