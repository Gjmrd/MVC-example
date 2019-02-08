<?php

namespace Controllers;

/**
 * base controller class
 * @NOTE: if action doesnt end with redirect or die it must return true
 */
abstract class Controller
{

    const VIEW_PATH = ROOT . '/views/';


    /**
     * calls view and creates variables
     * @template: path to view
     * @vars: list of variables
    */
    function view($template, $vars = null)
    {
       if ($vars) {
           foreach ($vars as $name => $value) {
               $$name = $value;
           }
       }
       require_once(self::VIEW_PATH . $template . '.php');
    }


    /**
     * redirects user to @url with @statuscode
    */
    function redirect($url, $statusCode = 303)
    {
        header('Location: ' .$url, true, $statusCode);
        die();
    }


    /**
     * if current user is not admin he will be redirected to auth page
    */
    function checkForAdmin()
    {
        if (!isset($_SESSION['isAdmin'])) {
            $_SESSION['messages'] = ['you have to be admin to perform this action'];
            $this->redirect("/login");
        }
    }

}