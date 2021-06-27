<?php

class App {

    protected $controller = 'login';
    protected $method = 'index';
    protected $params = [];
    // create constructor
    public function __construct()
    {
        $url = $this->parseURL();

        //controller
        if(isset($url[0])){
            if(file_exists('../app/controller/' . $url[0] . '.php')){
                $this->controller = $url[0];
                unset($url[0]);
            }
        }

        require_once '../app/controller/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //method
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        //params
        if(!empty($url)){
            $this->params = array_values($url);

        }

        //run method and controller if exist, and send paramaters if exist
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    // splitting url into array
    public function parseURL() {
        if (isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}