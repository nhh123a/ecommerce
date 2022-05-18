<?php
class Controller{

    public function model($model){
        require_once "./ecom/models/".$model.".php";
        return new $model;
    }

    public function view($view, $data=[]){
        require_once "./ecom/views/".$view.".php";
    }
}

?>