<?php

session_start();
$_SESSION['module'] = "";

function handlerRouter() {
    if (!empty($_GET['module'])) {
        $URI_MODULE = $_GET['module'];
    } else {
        $URI_MODULE = 'home';
    }
    if (!empty($_GET['function'])) {
        $URI_FUNCTION = $_GET['function'];
    } else {
        $URI_FUNCTION = 'list_home';
    }
        handlerModule($URI_MODULE, $URI_FUNCTION);
}

function handlerModule($URI_MODULE, $URI_FUNCTION) {

    $modules = simplexml_load_file('resources/modules.xml');
    $exist = false;

    foreach ($modules->module as $module) {

        if (($URI_MODULE === (String) $module->uri)) {
            $exist = true;
            $path = 'modules/' . $URI_MODULE . '/controller/controller_' 
            . $URI_MODULE . '.class.php';
            if (file_exists($path)) {
                require_once($path);
                $controllerClass = "controller_" . $URI_MODULE;
                $obj = new $controllerClass;
            } else {
                require_once("view/includes/header.html");
                require_once("view/includes/menu/menu.php");
                require_once("view/includes/404.html");
                require_once("view/includes/footer.html");
            }
            handlerFunction(((String) $module->name), $obj, $URI_FUNCTION);
            break;
        }
    }
    if (!$exist) {
        require_once("view/includes/header.html");
        require_once("view/includes/menu/menu.php");
        require_once("view/includes/404.html");
        require_once("view/includes/footer.html");
    }
}
function handlerFunction($module, $obj, $URI_FUNCTION) {
    $functions = simplexml_load_file("modules/" . $module . "/resources/function.xml");
    $exist = false;

    foreach ($functions->function as $function) {
        if (($URI_FUNCTION === (String) $function->uri)) {
            $exist = true;
            $event = (String) $function->name;
            break;
        }
    }
    if (!$exist) {
        require_once("view/includes/header.html");
        require_once("view/includes/menu/menu.php");
        require_once("view/includes/404.html");
        require_once("view/includes/footer.html");
    } else {
        call_user_func(array($obj, $event));
    }
}
handlerRouter();