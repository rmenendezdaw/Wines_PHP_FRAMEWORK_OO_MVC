<?php
    define('MAIN_FOLDER', '/Wines_PHP_FRAMEWORK_OO_MVC/');

//SITE_ROOT
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . MAIN_FOLDER);
//SITE_PATH
define('SITE_PATH', 'http://' . $_SERVER['HTTP_HOST'] . MAIN_FOLDER);

//CSS
define('CSS_PATH', SITE_PATH . 'view/assets/css/');
//VENDOR
define('CSS_PATH', SITE_PATH . 'view/assets/vendor/');
//IMG
define('IMG_PATH', SITE_PATH . 'view/img/');
//JS
define('JS_PATH', SITE_PATH . 'view/js/');
//UTILS
define('UTILS', SITE_ROOT . 'utils/');
//MODULES
define('MODULES_PATH', SITE_ROOT . 'modules/');
//VIEW
define('VIEW_PATH_INC', SITE_ROOT . 'view/includes/');


//MODEL CONTACT

define('JS_VIEW_CONTACT', SITE_PATH . 'modules/contact/view/js/');