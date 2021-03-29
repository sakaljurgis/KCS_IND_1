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
            $controller = $container->get($route['class']);
            
            $action = $controller->$route['action'];
            
            SimpleRouter::$method($path, $action);
            
        }

        SimpleRouter::start();
        
    }
}
