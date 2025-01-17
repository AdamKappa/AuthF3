<?php

namespace App;

class AppController{
    function beforeroute(){
        echo "Before routing -- ";
        //connect to the db?
    }

    function afterroute(){
        echo " -- After routing";
        //disconnect from the db?
    }
}

?>