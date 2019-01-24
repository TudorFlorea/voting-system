<?php
/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 21.10.2018
 * Time: 22:59
 */

require 'vendor/autoload.php';
require 'core/bootstrap.php';

use App\Core\Request;
use App\Core\Router;

//header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
//header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

Router::load('app/routes.php')
    ->direct(new Request());