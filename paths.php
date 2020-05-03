<?php
    define('MAIN_FOLDER', '/Wines_PHP_FRAMEWORK_OO_MVC/');

//SITE_ROOT
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . MAIN_FOLDER);
//SITE_PATH
define('SITE_PATH', 'http://' . $_SERVER['HTTP_HOST'] . MAIN_FOLDER);

//CSS
define('CSS_PATH', SITE_PATH . 'view/assets/css/');
//LANG
define('LANG_PATH', SITE_PATH . 'lang/');
//VENDOR
define('VENDOR_PATH', SITE_PATH . 'view/assets/vendor/');
//IMG
define('IMG_PATH', SITE_PATH . 'view/img/');
//TOASTR
define('CSS_TOASTR', SITE_PATH . 'view/toastr/build/');
define('PATH_TOASTR', SITE_PATH . 'view/toastr/');

//JS
define('JS_PATH', SITE_PATH . 'view/js/');
define('INI_PATH_API', SITE_ROOT . 'view/js/api_keys/');
//MODEL
define('MODEL_PATH', SITE_ROOT . 'model/');

//UTILS
define('UTILS', SITE_ROOT . 'utils/');
//MODULES
define('MODULES_PATH', SITE_ROOT . 'modules/');
//VIEW
define('VIEW_PATH_INC', SITE_ROOT . 'view/includes/');


//MODULE CONTACT
define('JS_VIEW_CONTACT', SITE_PATH . 'modules/contact/view/js/');
//MODULE HOME
define('JS_VIEW_HOME', SITE_PATH . 'modules/home/view/js/');
define('MODEL_HOME', SITE_ROOT . 'modules/home/model/model/');
define('MODEL_PATH_HOME', SITE_ROOT . 'modules/home/model/');
define('DAO_HOME', SITE_ROOT . 'modules/home/model/DAO/');
define('BLL_HOME', SITE_ROOT . 'modules/home/model/BLL/');
//AMIGABLES
define('URL_AMIGABLES', TRUE);
