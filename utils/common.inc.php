<?php
    
function loadView($pathVi = '', $templateName = '', $arrPassValue = '') {
    $pathView = $pathVi . $templateName;
    $arrData = '';
    if (file_exists($pathView)) {
        if (isset($arrPassValue))
            $arrData = $arrPassValue;
        include_once($pathView);
    } else {
        // $result = response_code($pathVi);
        // $arrData = $result;
        require_once(VIEW_PATH_INC . "404.php");
        // die();
    }
}
function loadModel($model_path,$model_name, $function, $arrArgument = false){
    $model=$model_path . $model_name . '.class.singleton.php';
    if (file_exists($model)) {
        include_once($model);
        $modelClass = $model_name;

        if (!method_exists($modelClass, $function)) {
            throw new Exception();
        }

        $obj = $modelClass::getInstance();
        if ($arrArgument != false){
           return call_user_func(array($obj, $function),$arrArgument);
        }

        return call_user_func(array($obj, $function));
            
    } else {
        throw new Exception();
    }
}