<?php
/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 21.10.2018
 * Time: 18:18
 */

namespace App\Core;


class Router
{
    public $routes = [
        'GET'   => [],
        'POST'  => []
    ];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET']['voting-system' . $uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST']['voting-system' . $uri] = $controller;
    }

    public function direct($request)
    {
        $uri = $request->uri;
        $requestType = $request->method;
        if (array_key_exists($uri, $this->routes[$requestType])) {
            $explodedAction = explode('@', $this->routes[$requestType][$uri]);
            return $this->action($explodedAction[0], $explodedAction[1], $request);
        } else {
            echo "gere";
            foreach ($this->routes[$requestType] as $key => $val) {
                $pattern = preg_replace('#\(/\)#', '/?', $key);
                var_dump($pattern);
                $pattern = "@^" . preg_replace('/{([a-zA-Z0-9\_\-]+)}/', '(?<$1>[a-zA-Z0-9\_\-]+)', $pattern) . "$@D";
                var_dump($pattern);
                $matches = [];
                preg_match($pattern, $uri, $matches);
                array_shift($matches);
                if ($matches) {
                    $getAction = explode('@', $val);
                    var_dump($matches);
                    $extra_name = array_keys($matches)[0];
                    $request->extras[$extra_name] = $matches[$extra_name];
                    var_dump($request);
                    return $this->action($getAction[0], $getAction[1], $request);
                }
            }
        }
    }

    protected function action($controller, $action, $request)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if (method_exists($controller, $action)) {
            return $controller->$action($request);
        } else {
            throw new \Exception("Method {$action} does not exist in {$controller}");
        }

    }

}