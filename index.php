<?php

//front controller


//enable displaying errors
ini_set("display_errors", 1);
error_reporting(E_ALL);



//starting session
session_start();


//enabling routing
define("ROOT", dirname(__FILE__));
require_once(ROOT."/components/Router.php");



//enabling autoload
require __DIR__ . '/vendor/autoload.php';






//calling Router
$router = new Router();
$router->run();

