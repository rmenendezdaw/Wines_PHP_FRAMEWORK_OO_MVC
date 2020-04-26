<?php
function regenerate_session(){
	    session_start();
    	$id_sesion_old = session_id();
    	session_regenerate_id();
    	$id_sesion_new = session_id();
    }
?>