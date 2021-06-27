<?php

class Controller {
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model){
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    // public function login($login){
    //     require_once '../app/login/' . $login . '.php';
    //     return new $login;
    // }
}

