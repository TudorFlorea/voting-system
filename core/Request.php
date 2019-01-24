<?php

namespace App\Core;

class Request {

    public $uri;
    public $method;
    public $get;
    public $post;
    public $extras = [];

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $this->method = $_SERVER['REQUEST_METHOD'];
    }
}