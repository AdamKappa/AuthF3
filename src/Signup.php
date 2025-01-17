<?php

namespace App;

class Signup extends AppController{
    function render($f3){
        //render Sign Up page
        echo \Template::instance()->render("/pages/signup/signup.php");
    }
}

?>