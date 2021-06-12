<?php

//Autoloaders
function my_autoloadBD($pClassName) {

    $file = "../bd/$pClassName.php";
    if (file_exists($file)) {
        require_once($file);
    }
}

spl_autoload_register("my_autoloadBD");

function my_autoloadEntidades($pClassName) {

    $file = "../model/entidades/$pClassName.php";
    if (file_exists($file)) {
        require_once($file);
    }
}

spl_autoload_register("my_autoloadEntidades");

function my_autoloadModel($pClassName) {

    $file = "../model/$pClassName.php";
    if (file_exists($file)) {
        require_once($file);
    }
}

spl_autoload_register("my_autoloadModel");




// FrontController
if (!isset($_REQUEST['c'])) {
    require_once '../view/header.php';
    require_once '../view/indexview.php';
    require_once '../view/footer.php';
} else if ($_REQUEST['c'] == 'frontclases') {
    require_once '../view/header.php';
    require_once '../view/clases.php';
    require_once '../view/footer.php';
} else if ($_REQUEST['c'] == 'frontalquileres') {
    require_once '../view/header.php';
    require_once '../view/alquileres.php';
    require_once '../view/footer.php';
} else {
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

    // Instanciamos el controlador
    require_once "../controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama a la accion a realizar
    call_user_func(array($controller, $accion));
}