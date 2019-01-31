<?php
/**
 * Created by PhpStorm.
 * User: Gm
 * Date: 31.01.2019
 * Time: 8:10
 */

namespace Repository;

use Components\Database;

class TestRepository
{
    private $db;

    public function __construct()
    {
        $this->db = DataBase::getConnection();
    }

    public static function getById($id)
    {

    }

}