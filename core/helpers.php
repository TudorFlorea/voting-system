<?php
/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 21.10.2018
 * Time: 17:29
 */

function redirect($location) {
    header("Location: " . $location);
    die();
}

function check_int($input) {
    is_numeric($input) ? true : false;
}

function json_response($body, $status = 200) {

    $response = new \App\Core\Response(json_encode($body), $status);
    $response->withHeaders([
        'Access-Control-Allow-Origin: *',
        //'Content-Type: application/json'
    ]);

    echo $response->toString();
}

function view($template, $params = []) {
    extract($params);
    return require "app/views/{$template}.view.php";
}