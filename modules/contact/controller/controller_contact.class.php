<?php

class controller_contact {

    // function construct() {
    //     $_SESSION['module'] = "contact";
    // }
    
    function list_contact() {
        require(VIEW_PATH_INC . "header.html");
        require(VIEW_PATH_INC . "menu/menu.php");
        loadView('modules/contact/view/','contact.html');
        require(VIEW_PATH_INC . "footer.html");
    }
    function send_contact() {
        $data_mail = array();
        $data_mail = json_decode($_POST,true);
        print_r($data_mail);
        $arrArgument = array(
            'type' => 'contact',
            'token' => '',
            'inputName' => $data_mail['cname'],
            'inputEmail' => $data_mail['cemail'],
            'inputSubject' => $data_mail['matter'],
            'inputMessage' => $data_mail['message']
        );
    }
}