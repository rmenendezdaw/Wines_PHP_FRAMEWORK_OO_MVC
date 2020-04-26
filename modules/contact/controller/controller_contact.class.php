<?php

class controller_contact {

    function construct() {
        $_SESSION['module'] = "contact";
    }
    
    function list_contact() {
        require("view/includes/header.php");
        require("view/includes/menu/menu.php");
        // loadView('modules/contact/view/','contact.html');
        require("view/includes/footer.html");
    }
}