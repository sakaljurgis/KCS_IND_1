<?php


namespace KCS;
//use DI\Container;
use KCS\ClassLoader as Container;
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
        SimpleRouter::setCustomClassLoader($this->container);

        foreach ($this->routes as $route) {
            $path = $route['path'];
            $method = $route['method'];

            $callBack = function() use $route {

            }

            SimpleRouter::$method($path, [$route['class'], $route['action']]);
        }

        SimpleRouter::start();
        
        var_dump(SimpleRouter::response());
    }
}
