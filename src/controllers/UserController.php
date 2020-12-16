<?php
namespace App\Controllers;


use Clases\Token;
use App\Models\User;
use Exception;
use PDOException;


class UserController {

    public function add($request, $response, $args)
    {

        $user = new User;
        $params = $request->getParsedBody();
    
//   var_dump($$rta);

     try{
        $user->email =  $params['email'];
        $user->nombre =  $params['nombre'];
        $user->tipo =  $params['tipo'];
        $user->clave =  $params['clave'];

   
        if(strpos($user->nombre, ' ') == false && strlen($user->clave) > 4 &&
          ($user->tipo == "cliente" || $user->tipo == "admin"))
        {
        
            $rta = $user->save();
           // var_dump($rta);
        }else{
            $result =  array("code"=>"Error","mensaje"=>"Error al crear usuario");
            $response = $response->withStatus(400);
        }    

        if($rta = true)
        {
           
            $result = array("code"=>"Ok","mensaje"=>"Usuario crado correctamente");
        }else{
            $result =  array("code"=>"Error","mensaje"=>"Datos invalidos");
            $response = $response->withStatus(400);
        }
    }catch(PDOException $e)
    {
        $result = array("code"=>"Error","mensaje"=>"Datos inválidos o usuario ya registrado.");
    }

    $response->getBody()->write(json_encode($result));
    return $response;
          
    }


    public function login($request, $response, $args)
    {
        $params = (array)$request->getParsedBody();
        $user = User::where('email', '=', $params['email'])
                    ->orwhere('nombre', '=', $params['email'])->first();

        if($user != null && $user->clave == $params['clave'])
        {
            $token = Token::GenerarToken($user->email,$user->tipo);
            
        }else{
            $token =array("code"=>"Error","mensaje"=>"Usuario o contraseña invalidos");
            $response = $response->withStatus(401);
        }
        $result = array("code"=>"ok","token"=>$token );
        $response->getBody()->write(json_encode(  $result ));
        return $response;
    }
    
 
    public function getAll ($request, $response, $args) {
        // $rta = User::get();
        // $rta = User::find(1);
        $rta = User::where('id', '>',  0)
        // ->where('campo', 'operador', 'valor')        
        ->get();

        $response->getBody()->write(json_encode($rta));
        return $response;
    }

    public function getOne($request, $response, $args) {
        $rta = User::find($args['id']);
        //$rta = User::where(campo, operador, valor a buscar)
        //$rta = User::where('id', '=', $args['id'])->first(); //Trae el primero        
        $newResponse = $response->withHeader('Content-type', 'application/json');
        $newResponse->getBody()->write(json_encode($rta));
        return $newResponse;
    }

}