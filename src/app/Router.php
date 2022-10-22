<?php

declare(strict_types=1);

namespace App;

use App\Exception\RouteNotFoundException;

class Router{

    public Request $request;
    protected array $routes;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function register(string $requestMethod,string $path,callable $action){
        $this->routes[$requestMethod][$path] = $action;
        return $this;
    }

    public function get(string $path, callable $action){
        return $this->register('get', $path, $action);
    }

    public function post(string $path, callable $action){
        return $this->register('post', $path, $action);
    }

    public function resolve(){
        // return $this->routes;
       $path= $this->request->getPath();
       $method= $this->request->getMethod();
       $action= $this->routes[$method][$path]??false;
       if(!is_callable($action))
       {
         throw new  RouteNotFoundException();
       }
       echo call_user_func($action);
    }

}