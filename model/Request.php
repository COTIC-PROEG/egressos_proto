<?php

class Request{

    public static function getRequestMethod(){
        return $_SERVER['REQUEST_METHOD'];
    }
}

?>