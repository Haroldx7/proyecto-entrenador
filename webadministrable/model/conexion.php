<?php


class Conexion {
    public $model;
    
    public function __construct(){
        $this->model = new mysqli('localhost', 'root', '', 'proyecto');
    }
}