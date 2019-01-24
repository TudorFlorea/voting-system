<?php
/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 21.10.2018
 * Time: 22:22
 */

namespace App\Core\Database;

use PDO;
use PDOException;

class Connection
{
    public static function connect($config)
    {
        try {
            return new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $e) {
            die('could not connect: ' . $e->getMessage());
        }
    }

}