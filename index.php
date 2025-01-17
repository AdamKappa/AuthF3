<?php

require_once("vendor/autoload.php");

//get a instance of framework's Base class
$f3 = Base::instance();

// //set a global variable
// $f3->set("message","hello again");
// //set a system global variable, 
// $f3->set("DEBUG",3);//default 0, avaiable values 1,2,3

// //add root route
// $f3->route("GET /", function(){
//     echo "hello Word";
// });
// //and maybe another route
// $f3->route("GET /tutorial", function(){
//     echo "hello Tutorial";
// });

// $f3->route("GET /inbox", function($f3){
//     echo $f3->get("message");
// });


// // $f3->config("config.ini");

// // $f3->route("GET /inbox2", function($f3){
// //     echo $f3->get("messageHi");
// // });

// //and run it 
// $f3->run();





//======================================


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

class Home extends AppController{
    function render($f3){
        //echo "hello Main";
        $f3->set('name','world');
        echo \Template::instance()->render('pages/login/login.html');
    }

    function goodbye(){
        echo "goodbye Main";
    }
}

class AboutPage extends AppController{
    function render(){
        echo " About page";
    }
}

$f3->route("GET /", "Home->render");
$f3->route("GET /goodbye", "Main->goodbye");
$f3->route("GET /about", "AboutPage->render");

$f3->run();
?>