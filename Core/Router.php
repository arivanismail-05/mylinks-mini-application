<?php
namespace Core;

class Router
{

    protected $routes = [];

    private function add($url,$contorller,$method = null)
    {
        $this->routes[] = [
            'url' => $url,
            'controller' => $contorller,
            'method' => strtoupper($method)
        ];

        return $this;
    } 



    public function get($url,$contorller)
    {
        return $this->add($url,$contorller,'GET');
    }

    public function route($url,$method)
    {
        foreach($this->routes as $route){
            if($route['url'] === $url && $route['method'] === $method){
                require base_path('Http/Controller'.$route['controller']);
            }
        }
    }

}

