<?php
    require_once "model/jwt.php";

    function encode_token($name){
        $header = '{"typ":"JWT", "alg":"HS256"}';
        $secret = 'iwanttodance';
        $arrayPayload =array(
         'iat' => time(),
         'exp'=> time() + (5 * 60),
         'name'=> $name
        );
        $payload = json_encode($arrayPayload);
    
        $JWT = new JWT;
        return $JWT->encode($header, $payload, $secret);
    }
    function decode_token($token){
        $secret = 'iwanttodance';
        $JWT = new JWT;
        $json = $JWT->decode($token, $secret);
        return $json;
    }
?>