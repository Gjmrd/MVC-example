<?php
/**
 * Created by PhpStorm.
 * User: Gm
 * Date: 31.01.2019
 * Time: 7:54
 */

namespace Controllers;

use Repository\TestRepository;

class TestController extends Controller
{
    public function index() {

        $item = TestRepository::getById(1);
        $this->view("index", ['key' => 'pidor']);

        return true;
    }
}