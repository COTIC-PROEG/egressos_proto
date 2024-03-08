<?php

class ExeptionParameters extends RuntimeException{
    public function __construct($msg){
        parent::__construct($msg);
    }
}

?>