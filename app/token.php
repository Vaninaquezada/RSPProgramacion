<?php


namespace Clases;
require_once("../vendor/autoload.php");


use \Firebase\JWT\JWT;

class Token{
    private static  $key = "primerparcial";


    public static function GenerarToken($user,$tipo){
      
        $payload = array(
          
                'user' => $user,
                'rol' => $tipo
            
        );

    $jwt = JWT::encode($payload, Token::$key);
    
    return $jwt;
    }

    
    public static function DecodeToken($token){

    
        try {
      // $token = $_SERVER['HTTP_TOKEN'];
         
         $decoded = JWT::decode($token,Token::$key, array('HS256'));
          
        return $decoded;
           
        } catch (\Throwable $e) {
            return 'Error';
        }
    

    }
 
}
?>