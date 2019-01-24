<?php
/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 21.10.2018
 * Time: 19:37
 */

use App\Core\App;
use App\Core\Database\Connection;
use App\Core\Database\Handler;

App::bind('config', require 'config.php');

App::bind('database', new Handler(
   Connection::connect(App::get('config')['database'])
));

