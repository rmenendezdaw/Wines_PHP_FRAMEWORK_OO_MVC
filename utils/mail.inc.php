<?php
    function send_email($arr) {
        $html = '';
        $subject = '';
        $body = '';
        $ruta = '';
        $return = '';
        // print_r($arr['type']);
        switch ($arr['type']) {
            case 'alta':
                $subject = 'Tu Alta en Wines RM';
                $ruta = "<a href='" . amigable("?module=login&function=active_user&token=" . $arr['token'], true) . "'>aqu&iacute;</a>";                $body = 'Gracias por unirte a nuestra aplicaci&oacute;n<br> Para finalizar el registro, pulsa ' . $ruta;
                $body = 'Gracias por unirte a nuestra aplicaci&oacute;n<br> Para finalizar el registro, pulsa ' . $ruta;
                break;
    
            case 'changepass':
                $subject = 'Tu Nuevo Password en Wines RM<br>';
                $ruta = "<a href='" . amigable("?module=login&function=changePass_list&token=" . $arr['token'], true) . "'>aqu&iacute;</a>";                $body = 'Gracias por unirte a nuestra aplicaci&oacute;n<br> Para finalizar el registro, pulsa ' . $ruta;
                $body = 'Para recordar tu password pulsa ' . $ruta;
                break;
                
            case 'contact':
                $subject = 'Tu Petici&oacute;n a Wines RM ha sido enviada<br>';
                $ruta = '<a href=http://localhost/Wines_PHP_FRAMEWORK_OO_MVC/>aqu&iacute;</a>';
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
	       $html .= "<p>Sent by Wines RM</p>";
		$html .= "</body>";
		$html .= "</html>";
        // print_r($arr['type']);
        //set_error_handler('ErrorHandler');
        try{
            if ($arr['type'] === 'admin'){
                $address = 'WinesRMC@gmail.com';
            } else{ 
                $address = $arr['inputEmail'];
            }
            $result = send_mailgun('WinesRMC@gmail.com', $address, $subject, $html); 
        } catch (Exception $e) {
			$return = 0;
		}
		//restore_error_handler();
        return $result;
    }
    function send_mailgun($from, $email, $subject, $html){
        $ini_key=parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/Wines_PHP_FRAMEWORK_OO_MVC/view/js/api_keys/api_key.ini');		
        $config = array();
        $ini_url=$ini_key['mail_URL'];
		$config['api_key'] = $ini_key['mail_API_KEY']; //API Key
    	$config['api_url'] = $ini_url; //API Base URL
    
       $message = array();
       $message['from'] = $from;
       $message['to'] =  $email;
       $message['h:Reply-To'] = "WinesRMCgmail.com";
       $message['subject'] = $subject;
       $message['html'] = $html;
    
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $config['api_url']);
       curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
       curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_POSTFIELDS,$message);
       $result = curl_exec($ch);
       curl_close($ch);
    //    print_r($result);
       return $result;
     }