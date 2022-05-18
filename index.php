<?php
    session_start();

    spl_autoload_register(function($className){
        include_once 'core/' . $className . '.php';
    });
    require_once 'ecom/models/Model.php';
    $App = new App();

?>