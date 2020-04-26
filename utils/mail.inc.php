<?php
    function enviar_email($arr) {
        $html = '';
        $subject = '';
        $body = '';
        $ruta = '';
        $return = '';
        
        switch ($arr['type']) {
            case 'alta':
                $subject = 'Tu Alta en Wines RM';
                $ruta = "<a href=?module=home&function=active_user&param=" . $arr['token'] . ">aqu&iacute;</a>";
                $body = 'Gracias por unirte a nuestra aplicaci&oacute;n<br> Para finalizar el registro, pulsa ' . $ruta;
                break;
    
            case 'changepass':
                $subject = 'Tu Nuevo Password en Wines RM<br>';
                $ruta = "<a href=?module=login&function=changepass&aux=" . $arr['token'] . ">aqu&iacute;</a>";
                $body = 'Para recordar tu password pulsa ' . $ruta;
                break;
                
            case 'contact':
                $subject = 'Tu Petici&oacute;n a Wines RM ha sido enviada<br>';
                $ruta = '<a href=' . 'http://localhost/Wines_FRAMEWORK_OO_MVC/'. '>aqu&iacute;</a>';
                $body = 'Para visitar nuestra web, pulsa ' . $ruta;
                break;
    
            case 'admin':
                $subject = $arr['inputSubject'];
                $body = 'inputName: ' . $arr['inputName']. '<br>' .
                'inputEmail: ' . $arr['inputEmail']. '<br>' .
                'inputSubject: ' . $arr['inputSubject']. '<br>' .
                'inputMessage: ' . $arr['inputMessage'];
                break;
        }
        
        $html .= "<html>";
        $html .= "<body>";
            $html .= "Asunto:";
            $html .= "<br><br>";
	       $html .= "<h4>". $subject ."</h4>";
           $html .= "<br><br>";
           $html .= "Mensaje:";
           $html .= "<br><br>";
           $html .= $arr['inputMessage'];
           $html .= "<br><br>";
	       $html .= $body;
	       $html .= "<br><br>";
	       $html .= "<p>Sent by OHANA_DOGS</p>";
		$html .= "</body>";
		$html .= "</html>";

        //set_error_handler('ErrorHandler');
        try{
            if ($arr['type'] === 'admin')
                $address = 'WinesRM@gmail.com';
            else
                $address = $arr['inputEmail'];
            $result = send_mailgun('WinesRM@gmail.com', $address, $subject, $html);    
        } catch (Exception $e) {
			$return = 0;
		}
		//restore_error_handler();
        return $result;
    }