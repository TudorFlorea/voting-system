<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Tudor
 * Date: 7/22/17
 * Time: 1:06 PM
 * To change this template use File | Settings | File Templates.
 */

function render($template, $params = []) {
    extract($params);
    //var_dump($params);
    include($template);
}

function redirect($location) {
    header("Location: " . $location);
    die();
}

function check_int($input) {
    is_numeric($input) ? true : false;
}