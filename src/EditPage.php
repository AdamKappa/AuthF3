<?php

namespace App;

class EditPage extends AppController{
    function render($f3){
        //render Edit page
        echo \Template::instance()->render("/pages/editpage/editpage.php");
    }
}

?>