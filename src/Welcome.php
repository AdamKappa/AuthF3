<?php

namespace App;

class Welcome extends AppController {
    function render($f3) {
        // Render the welcome page
        echo \Template::instance()->render('/pages/welcome/welcome.php');
    }
}
?>