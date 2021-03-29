<?php
//var_dump($_SERVER);die();
require_once __DIR__.'/../vendor/autoload.php';

use KCS\Router;
use KCS\Config;

try {

    $log = new Monolog\Logger('name');
    $log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));

    $config = new Config();
    
    $container = new DI\Container();
    
    $router = new Router($config, $container);
    
    $router->start();
    
    
    
    //$controller->store(['name'=>'Vardas', 'email' => 'aaaaa@123456']);
    //$controller->index();

} catch (Exception $exception) {
    echo "Oi nutiko klaida: " . $exception->getMessage();
    $log->warning($exception->getMessage());
}