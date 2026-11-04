<?php 

namespace CmdApi\Router;

class Router
{
    private array $routes;

    public function register(string $path, callable|array $action)
    {
        $this->routes[$path] = $action;
    }
    

    public function resolve(string $uri): mixed
    {
        
        $pathExplode = explode("?",$uri);
        $path = $pathExplode[0];

        $params = [];
        if(count($pathExplode)>=2) {
            // $param = explode("?",$uri)[1];
            // $valueId = explode("=",$param)[1];
            // $nameParam = explode("=",$param)[0];
            // $params = [$nameParam,$valueId];
            // var_dump($params);

            $queryString = $pathExplode[1];
            parse_str($queryString, $params);
            
        }

        $action = $this->routes[$path] ?? null;

        if(is_callable($action)) {
            return $action;
        } 
        
        if(is_array($action)) {
            [$className, $methodName] = $action;
            
            if(class_exists($className) && method_exists($className, $methodName)) {
                $instance = new $className();
                
                return call_user_func_array(array($instance, "$methodName"), [$params]);
            }
        }

        throw new \Exception("Erreur dans le routeur");
    }
}