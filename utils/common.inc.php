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
        require_once(VIEW_PATH_INC . "404.html");
        // die();
    }
}