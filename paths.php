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
//MODULE SHOP
define('JS_VIEW_SHOP', SITE_PATH . 'modules/shop/view/js/');
define('MODEL_SHOP', SITE_ROOT . 'modules/shop/model/model/');
define('MODEL_PATH_SHOP', SITE_ROOT . 'modules/shop/model/');
define('DAO_SHOP', SITE_ROOT . 'modules/shop/model/DAO/');
define('BLL_SHOP', SITE_ROOT . 'modules/shop/model/BLL/');
//MODULE LOGIN
define('JS_VIEW_LOGIN', SITE_PATH . 'modules/login/view/js/');
define('MODEL_LOGIN', SITE_ROOT . 'modules/login/model/model/');
define('MODEL_PATH_LOGIN', SITE_ROOT . 'modules/login/model/');
define('DAO_LOGIN', SITE_ROOT . 'modules/login/model/DAO/');
define('BLL_LOGIN', SITE_ROOT . 'modules/login/model/BLL/');
//MODULE FAVORITES
define('JS_VIEW_FAVORITES', SITE_PATH . 'modules/favorites/view/js/');
define('MODEL_FAVORITES', SITE_ROOT . 'modules/favorites/model/model/');
define('MODEL_PATH_FAVORITES', SITE_ROOT . 'modules/favorites/model/');
define('DAO_FAVORITES', SITE_ROOT . 'modules/favorites/model/DAO/');
define('BLL_FAVORITES', SITE_ROOT . 'modules/favorites/model/BLL/');
//AMIGABLES
define('URL_AMIGABLES', TRUE);
