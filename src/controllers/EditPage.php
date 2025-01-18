<?php

namespace App\controllers;

class EditPage extends AppController{
    public function render($f3){
        //render Edit page
        echo \Template::instance()->render("/pages/editpage/editpage.php");
    }
}

?>