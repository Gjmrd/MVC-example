<?php
/**
 * Created by PhpStorm.
 * User: Gm
 * Date: 31.01.2019
 * Time: 8:39
 */

namespace Controllers;

class Controller
{
    const VIEW_PATH = ROOT . '/views/';

    function view($template, $vars = null)
    {
       if ($vars) {
           foreach ($vars as $name => $value) {
               $$name = $value;
           }
       }
       require_once(self::VIEW_PATH . $template . '.php');
    }


    function redirect($url, $statusCode = 303)
    {
        header('Location: ' .$url, true, $statusCode);
        die();
    }


    function checkForAdmin()
    {
        if (!isset($_SESSION['isAdmin'])) {
            $_SESSION['messages'] = ['you have to be admin to perform this action'];
            $this->redirect("/login");
        }
    }

}