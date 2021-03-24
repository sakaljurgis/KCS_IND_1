<?php

require_once __DIR__.'/../vendor/autoload.php';

use KCS\Controller\VisitorController;
use KCS\DbConnect as DB;

try {
    $container = new DI\Container();

//    if (isset($_SERVER['APP_ENV'])) {
//        (new DotEnv(__DIR__.'/../.env'))->load();
//    }

    $log = new Monolog\Logger('name');
    $log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));
//
//    $config = new Config();

    /** @var DB $db */
    $controller = $container->get(VisitorController::class);
    $controller->store(['name'=>'Vardas', 'email' => 'aaaaa@123456']);

} catch (Exception $exception) {
    echo "Oi nutiko klaida: " . $exception->getMessage();
    $log->warning($exception->getMessage());
}