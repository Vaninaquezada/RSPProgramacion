<?php

namespace App\Middlewares;

use Clases\Token;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;

class AuthMiddleware {

    public function __invoke ($request,$handler) {
      $token=  $request->getHeader('token');
        $jwt = Token::DecodeToken($token[0]);

        if ($jwt == "Error") {
            $response = new Response();

            $rta = array("rta" => "Prohibido pasar");

            $response->getBody()->write(json_encode($rta));

            return $response->withStatus(401);
        } else {
            $response = $handler->handle($request);
            $existingContent = (string) $response->getBody();

            $resp = new Response();
            $resp->getBody()->write($existingContent);

            return $resp;
        }

    }
}