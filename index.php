<?php
// Start the session
session_start();

// Include Composer's autoloader
require_once("vendor/autoload.php");

//get an instance of F3 framework's Base class
$f3 = Base::instance();
$f3->set("DEBUG",3);
// Define routes (using the new App namespace, from composer.json)
$f3->route("GET /", "App\\Home->render");
$f3->route("GET /login", "App\\Login->render");
$f3->route("GET /signup", "App\\SignUp->render");
$f3->route("GET /welcome", "App\\Welcome->render");
$f3->route("GET /editpage", "App\\EditPage->render");

// Run F3 framework
$f3->run();
?>