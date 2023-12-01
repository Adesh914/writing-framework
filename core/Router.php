<?php
namespace app\core;
/**
 * Class Application
 *
 * @author  Adesh
 * @package app
 */

class Router
{   
    private Request $request;
    protected array $routes=[];
    public function __construct(Request $request){
            $this->request = $request;
    }
    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;
    }
    public function resolve(){
    //    $this->reques
    }
}