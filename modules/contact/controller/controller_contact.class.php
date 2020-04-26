<?php

class controller_contact {

    // function construct() {
    //     $_SESSION['module'] = "contact";
    // }
    
    function list_contact() {
        require(VIEW_PATH_INC . "top_page.php");
        require(VIEW_PATH_INC . "header.html");
        require(VIEW_PATH_INC . "menu/menu.php");
        loadView('modules/contact/view/','contact_list.html');
        require(VIEW_PATH_INC . "footer.html");
    }
    function send_contact() {
        $data_mail = array();
        // print_r($_POST);

        // $data_mail = json_decode($_POST,true);
        $arrArgument = array(
            'type' => 'contact',
            'token' => '',
            'inputName' => $_POST['cname'],
            'inputEmail' => $_POST['cemail'],
            'inputSubject' => $_POST['matter'],
            'inputMessage' => $_POST['message']
        );
        // print_r($arrArgument);
        try{
            send_email($arrArgument);
            echo "success";
        } catch (Exception $e) { 
            echo "Error";
            echo "<div class='alert alert-error'>Server error. Try later...</div>";
        }
    }
}