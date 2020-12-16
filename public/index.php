<?php

use \Firebase\JWT\JWT;
use Clases\Usuario;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Exception\HttpNotFoundException;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Routing\RouteCollectorProxy;
use Slim\Middleware\ErrorMiddleware;

use App\Middlewares\JsonMiddleware;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\UserMiddleware;
use App\Controllers\UserController;
use App\Controllers\MascotaController;
use App\Controllers\TurnoController;
use App\Models\Mascota;
use Config\Database;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->setBasePath("/RSPProgramacion/public");
new Database;
// $app->addRoutingMiddleware();


$app->post('/users',UserController::class . ":add");
$app->post('/login',UserController::class . ":login");
$app->post('/mascota',MascotaController::class . ":add")->add(new AuthMiddleware);
$app->post('/turnos',TurnoController::class . ":add")->add(new AuthMiddleware);
$app->get('/turnos',TurnoController::class . ":getAll")->add(new AuthMiddleware);

$app->add(new JsonMiddleware);

$app->run();

