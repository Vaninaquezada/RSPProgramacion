<?php
namespace App\Controllers;

use App\Models\Turno;
use Clases\Token;

use Exception;
use PDOException;


class TurnoController{



 public function add($request, $response, $args) {
        $headerValueString = $request->getHeaderLine('token');
        $decodedToken = Token::DecodeToken($headerValueString);
      
        if($decodedToken->rol == "cliente")
        {
            $mascota = new Turno;

            try{
                $params = (array)$request->getParsedBody();

                $mascota->tipoMascota = $params['tipoMascota'];
              
            if($mascota->tipoMascota == "perro" || $mascota->tipoMascota == "gato" ||$mascota->tipoMascota == "huron"){
               $rta  = $mascota->save();
              //  var_dump($mascota->save());
            } else{
                $rta = false;
                $result = array("respuesta" => "Mascota invalida.");

            }
                            if($rta == true)
                            {
                                $result = array("respuesta" => "turno creado exitosamente.");
                            }else{
                                $result = array("respuesta" => "Datos inválidos. Reviselos e intentelo nuevamente.");
                            }
                        }catch(PDOException $e)
                        {
                            var_dump($e);
                            $result = array("respuesta" => "No se pudo crear el turno.");
                        }
                    }else{
                        $result = array("respuesta" => "Solo permitido para cliente.");
                        $response = $response->withStatus(401);
                    }
                    $response->getBody()->write(json_encode($result));
                    return $response;
        }

        public function getAll($request, $response, $args) {
            try{
                $headerValueString = $request->getHeaderLine('token');
                $decodedToken = Token::DecodeToken($headerValueString);
                $materia = new Turno;
                $materia = Turno::get();
          
        if($decodedToken->rol == "admin")
        {
                $result = $materia;
        }
            }catch(PDOException $e)
            {
                $result = array("respuesta" => "No se pudo obtener turnos");
            }
    
            $response->getBody()->write(json_encode($result));
            return $response;
        }
    }