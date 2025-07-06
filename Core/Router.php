<?php
namespace Core;

use Core\Middleware\Middleware;

class Router
{

    protected $routes = [];

    private function add($url,$contorller,$method = null)
    {
        $this->routes[] = [
            'url' => $url,
            'controller' => $contorller,
            'method' => strtoupper($method),
            'middleware' => null
        ];

        return $this;
    } 



    public function get($url,$contorller)
    {
        return $this->add($url,$contorller,'GET');
    }

    public function post($url,$contorller)
    {
        return $this->add($url,$contorller,'POST');
    }
    
      public function only($key){
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }
    public function route($url,$method)
    {
        foreach($this->routes as $route){
            if($route['url'] === $url && $route['method'] === $method){
                if($route['middleware']){
                    Middleware::resolve($route['middleware']);
                }
              
                require base_path('Http\controller'.$route['controller']);
                return;            }
        }
    }

}

