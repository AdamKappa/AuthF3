<?php


// Include Composer's autoloader
require_once("vendor/autoload.php");

//get an instance of F3 framework's Base class
$f3 = Base::instance();
$f3->set("DEBUG",3);
// Define routes (using the new App namespace, from composer.json)
$f3->route("GET /", "App\\controllers\\Home->render");
$f3->route("GET /login", "App\\controllers\\Login->render");
$f3->route("GET /signup", "App\\controllers\\SignUp->render");
$f3->route("GET /welcome", "App\\controllers\\Welcome->render");
$f3->route("GET /editpage", "App\\controllers\\EditPage->render");
$f3->route("POST /login/authenticate", "App\\controllers\\Login->handleLogin");
$f3->route("POST /logout", "App\\controllers\\Logout->logout");
$f3->route("POST /signup", "App\\controllers\\SignUp->handleSignup");
$f3->route("POST /submitSimpleEditpage", "App\\controllers\\Editpage->submitNewDataSimpleUser");
$f3->route("POST /submitAdminEditpage", "App\\controllers\\Editpage->submitNewDataAdminUser");
//routes with params
$f3->route("GET /welcome/@status", "App\\controllers\\Welcome->render");
// in Fat-Free Framework, hyphens (-) are treated as underscores (_) when accessing parameters
// Fat-Free automatically converts underscores to hyphens in url 
// so in controller, always access such params using underscores and navigate(route, reroute using hyphens - )
$f3->route("GET /welcome/@rows/@updated_success", "App\\controllers\\Welcome->render");
$f3->route("GET /login/@error", "App\\controllers\\Login->render");
$f3->route("GET /editpage/@error", "App\\controllers\\EditPage->render");
$f3->route("GET /signup/@message", "App\\controllers\\Signup->render");
// Run F3 framework
$f3->run();
?>