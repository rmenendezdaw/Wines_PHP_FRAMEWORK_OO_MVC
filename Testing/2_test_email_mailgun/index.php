<?php
    //https://github.com/mailgun/mailgun-php
    //Authorized Recipients -> afegir a 'yomogan@gmail.com'
    //
    function send_mailgun($email){
		$ini_key=parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/Wines_PHP_FRAMEWORK_OO_MVC/Testing/API_KEY/api_key.ini');		
		$config = array();
		$ini_url=$ini_key['mail_URL'];
		$config['api_key'] = $ini_key['mail_API_KEY']; //API Key
    	$config['api_url'] = $ini_url; //API Base URL

    	$message = array();
    	$message['from'] = "iestacion@gmail.com";
    	$message['to'] = $email;
    	$message['h:Reply-To'] = "iestacion@gmail.com";
    	$message['subject'] = "Hello, this is a test";
    	$message['html'] = 'Hello ' . $email . ',</br></br> This is a test';
     
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
    	return $result;
	}
	
    $json = send_mailgun('rmenendeziestacio@gmail.com');
    print_r($json);
