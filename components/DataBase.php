<?php
/**
 * Created by PhpStorm.
 * User: Gm
 * Date: 31.01.2019
 * Time: 8:14
 */

namespace Components;

class DataBase
{
    const PARAMS_PATH = ROOT . '/config/db.php';

    public static function getConnection()
    {
        $params = include(self::PARAMS_PATH);

        $dsn = "mysql:host={$params['host']}; dbname={$params['dbname']}";

        $connection = new PDO($dsn, $params['user'], $params['password']);

        return $connection;
    }
}