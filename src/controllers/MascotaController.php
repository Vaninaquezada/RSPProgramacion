<?php
namespace App\Controllers;

use App\Models\Mascota;
use App\Models\Precio;
use Clases\Token;

use Exception;
use PDOException;


class MascotaController{



 public function add($request, $response, $args) {
        $headerValueString = $request->getHeaderLine('token');
        $decodedToken = Token::DecodeToken($headerValueString);
      
        if($decodedToken->rol == "admin")
        {
            $mascota = new Mascota;

            try{
                $params = (array)$request->getParsedBody();
                $mascota->precio = $params['precio'];
                $mascota->mascota = $params['mascota'];
              
            if($mascota->mascota == "perro" || $mascota->mascota == "gato" ||$mascota->mascota == "huron"){
               $rta  = $mascota->save();
              //  var_dump($mascota->save());
            } else{
                $rta = false;
                $result = array("respuesta" => "Mascota invalida.");

            }
                            if($rta == true)
                            {
                                $result = array("respuesta" => "Mascota creada exitosamente.");
                            }else{
                                $result = array("respuesta" => "Datos inválidos. Reviselos e intentelo nuevamente.");
                            }
                        }catch(PDOException $e)
                        {
                            var_dump($e);
                            $result = array("respuesta" => "No se pudo crear la mascota.");
                        }
                    }else{
                        $result = array("respuesta" => "Solo permitido para admin.");
                        $response = $response->withStatus(401);
                    }
                    $response->getBody()->write(json_encode($result));
                    return $response;
        }


}