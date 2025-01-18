<?php

namespace App\controllers;

class Signup extends AppController{
    public function render($f3){
        //render Sign Up page
        echo \Template::instance()->render("/pages/signup/signup.php");
    }
}

?>