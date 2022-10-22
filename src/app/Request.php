<?php

declare(strict_types=1);

namespace App;

class Request{

    public function getPath(){
        $path = $_SERVER['REQUEST_URI'];

        return explode('?',$path)[0];
    }

    public function getMethod(){

        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}