<?php

//front controller


//enable displaying errors

ini_set("display_errors", 1);
error_reporting(E_ALL);


//enabling routing

define("ROOT", dirname(__FILE__));
require_once(ROOT."/components/Router.php");


require __DIR__ . '/vendor/autoload.php';


//enabling db



//calling Router

$router = new Router();
$router->run();

