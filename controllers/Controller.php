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

    public function view($template, $vars = null)
    {
       if ($vars) {
           foreach ($vars as $name => $value) {
               $$name = $value;
           }
       }

       require_once(self::VIEW_PATH . $template . '.php');
    }
}