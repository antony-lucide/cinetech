<?php

class Root {
    private $server = ''; 
    
    public function __construct() {
        $this->server = $_SERVER['REQUEST_URI'];
    }

    public function getServer() {
        return $this->server;
    }

    public function getPath() {
        return explode('/', $this->server)[1];
    }

    public function getMethod() {
        return explode('/', $this->server)[2];
    }

}

?>