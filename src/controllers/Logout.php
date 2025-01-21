<?php

namespace App\controllers;

class Logout {
    public function logout($f3){
        // Destroy the session
        $f3->clear('SESSION');
        // Redirect to the login or home page
        $f3->reroute("/");
    }
}

?>