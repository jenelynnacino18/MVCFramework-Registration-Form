<?php
class Url {
    private $controller = 'register';
    private $method = 'index';
    private $params = [];
    function __construct() {
        $url = $this->getUrl();
        if(!empty($url)) {
            if(file_exists('../app/controllers/'.strtolower($url[0]).'.php')) {
                $this->controller = strtolower($url[0]);
                unset($url[0]);
                require_once '../app/controllers/'.$this->controller.'.php';
                $this->controller = new $this->controller;
            } else {
                die('contorller not exist');
            }
            if(isset($url[1])) {
                if(method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                } else {
                    die('method no exist');
                }
            } 
            $this->params = $url ? array_values($url) : [];
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else {
            die('empty controller');
        }
    }
    function getUrl() {
        if(isset($_GET['url'])) {
            $url =$_GET ['url'];
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        } else {
            die('empty url');
        }
    }
}