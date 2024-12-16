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
        $path = trim(parse_url($this->server, PHP_URL_PATH), '/');
        return $path === '' ? 'index.php' : $path;
    }

    
    public function getMethod() {
        $parts = explode('/', $this->getPath());
        return isset($parts[1]) ? $parts[1] : '';
    }

    public function getParams() {
        $parts = explode('/', $this->getPath());
        return array_slice($parts, 2);
    }
}

?>