<?php
include_once 'RouteNotFoundException.php';
include_once 'Route.php';

class Router {

    private $base_path;
    private $path;
    public $routes = array();

    public function __construct($base_path = '') {
        $this->base_path = $base_path;
        $path = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $path = substr($path, strlen($base_path));
        $this->path = $path;
    }

    public function all($expr, $callback, $methods = null) {
        $this->routes[] = new Route($expr, $callback, $methods);
    }

    public function add($expr, $callback, $methods = null) {
        $this->all($expr, $callback, $methods);
    }

    public function get($expr, $callback) {
        $this->routes[] = new Route($expr, $callback, 'GET');
    }

    public function post($expr, $callback) {
        $this->routes[] = new Route($expr, $callback, 'POST');
    }

    public function head($expr, $callback) {
        $this->routes[] = new Route($expr, $callback, 'HEAD');
    }

    public function put($expr, $callback) {
        $this->routes[] = new Route($expr, $callback, 'PUT');
    }

    public function delete($expr, $callback) {
        $this->routes[] = new Route($expr, $callback, 'DELETE');
    }

    public function route() {
        foreach ($this->routes as $route) {
            if ($route->matches($this->path)) {
                return $route->exec();
            }
        }
        throw new RouteNotFoundException("No routes matching {$this->path}");
    }

    public function url($path = null) {
        if ($path === null) {
            $path = $this->path;
        }
        return $this->base_path . $path;
    }

    public function redirect($from_path, $to_path, $code = 302) {
        $this->all($from_path, function () use ($to_path, $code) {
            http_response_code($code);
            header("Location: {$to_path}");
        });
    }
}
