<?php


namespace KCS;
use DI\Container;
use Pecee\SimpleRouter\SimpleRouter;

class Router
{
    
    private array $routes = [];
    private Container $container;
            
    public function __construct(Config $config, Container $container)
    {
        $this->routes = $config->get('routes');
        $this->container = $container;
    }


    public function start()
    {

        foreach ($this->routes as $path => $route) {
            
            $method = $route['method'];
            $container = $this->container;
            
            SimpleRouter::$method($path, function () use ($container, $route) {
                $controller = $container->get($route['class']);
                $action = $route['action'];
                $controller->$action();
            });
            
        }

        SimpleRouter::start();
        
    }
}
