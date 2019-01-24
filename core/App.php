<?php
/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 21.10.2018
 * Time: 17:32
 */

namespace App\Core;


class App
{
    protected static $registry = [];

    public static function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }

    public static function get($key)
    {
        if (array_key_exists($key, static::$registry))
        {
            return static::$registry[$key];
        } else {
            throw new \Exception("No {$key} found in the registry!");
        }

    }
}