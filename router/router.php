<?php
require_once("paths.php");

include(UTILS . "utils.inc.php");
include(UTILS . "common.inc.php");
include(UTILS . "mail.inc.php");

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
            $path = MODULES_PATH . $URI_MODULE . '/controller/controller_' 
            . $URI_MODULE . '.class.php';
            if (file_exists($path)) {
                require_once($path);
                $controllerClass = "controller_" . $URI_MODULE;
                $obj = new $controllerClass;
            } else {
                require_once(VIEW_PATH_INC . "top_page.php");
                require_once(VIEW_PATH_INC . "header.html");
                require_once(VIEW_PATH_INC . "menu/menu.php");
                require_once(VIEW_PATH_INC . "404.html");
                require_once(VIEW_PATH_INC . "footer.html");
            }
            handlerFunction(((String) $module->name), $obj, $URI_FUNCTION);
            break;
        }
    }
    if (!$exist) {
        require_once(VIEW_PATH_INC . "top_page.php");
        require_once(VIEW_PATH_INC . "header.html");
        require_once(VIEW_PATH_INC . "menu/menu.php");
        require_once(VIEW_PATH_INC . "404.html");
        require_once(VIEW_PATH_INC . "footer.html");
    }
}
function handlerFunction($module, $obj, $URI_FUNCTION) {
    $functions = simplexml_load_file(MODULES_PATH . $module . "/resources/function.xml");
    $exist = false;

    foreach ($functions->function as $function) {
        if (($URI_FUNCTION === (String) $function->uri)) {
            $exist = true;
            $event = (String) $function->name;
            break;
        }
    }
    if (!$exist) {
        require_once(VIEW_PATH_INC . "top_page.php");
        require_once(VIEW_PATH_INC . "header.html");
        require_once(VIEW_PATH_INC . "menu/menu.php");
        require_once(VIEW_PATH_INC . "404.html");
        require_once(VIEW_PATH_INC . "footer.html");
    } else {
        call_user_func(array($obj, $event));
    }
}
handlerRouter();