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
            $container = $this->container->getContainer();

            $callBack = function() use ($route, $container) {

                $controller = $container->get($route['class']);
                $action = $route['action'];
                $result = $controller->$action();
                $render = $container->get(Render::class);

                $render->responseType('html');
                return $render->render($result);
            };

            SimpleRouter::$method($path, $callBack);
        }

        SimpleRouter::start();
    }
}
