<?php
/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 21.10.2018
 * Time: 22:09
 */

$router->get('', "PollController@all");
$router->get('/poll/{id}', "PollController@index");
$router->get('/votes/{candidate}/{poll}', "PollController@index");
$router->post('', "PollController@create");
$router->get('/about', "PollController@about");
$router->get('/us', "PollController@us");