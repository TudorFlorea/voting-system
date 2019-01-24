<?php
/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 21.10.2018
 * Time: 22:46
 */

return [
    'database' => [
        'connection'    => 'mysql:host=localhost',
        'name'          => 'voting_system',
        'username'          => 'root',
        'password'      => 'mysql',
        'options'       => [
            PDO::ATTR_ERRMODE   => PDO::ERRMODE_EXCEPTION
        ]
    ]
];