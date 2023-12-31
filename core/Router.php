<?php
namespace app\core;
/**
 * Class Router
 *
 * @author  Adesh
 * @package app
 */

class Router
{   
    public Request $request;
    public Response $response;
    protected array $routes=[];
    /**
       * Router constructor
       *
       * @param  app/core/Request $request
       * @param app/core/Response $response
     */
    public function __construct(Request $request, Response $response){
            $this->request = $request;
            $this->response = $response;
    }
    public function get($path, $callback){       
        $this->routes['get'][$path] = $callback;
    }
    public function post($path, $callback){       
      $this->routes['post'][$path] = $callback;
  }
    public function getRoutes($method):array
    {
    return $this->routes[$method] ?? false;
    }
    public function getCallback(){
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
          // Trim slashes
           $path = trim($path, '/'); 
           // Get all routes for current request method
         $routes = $this->getRoutes($method);
    }
    public function resolve(){
      $path = $this->request->getPath();
      $method = $this->request->getMethod();  
      $callback = $this->routes[$method][$path]??false; 
    
    
      if($callback==false){      
       $this->response->setStatusCode(404);
           $this->renderView('_404');
            exit;
        // }
      }
      if(is_string($callback)){
        return $this->renderView($callback);
      }
   if(is_array($callback)){
    $controller = new $callback[0];
    $controller->action = $callback[1];
    Application::$app->controller = $controller;
    // $middlewares = $controller->getMiddlewares();
    // foreach ($middlewares as $middleware) {
    //     $middleware->execute();
    // }
    $callback[0] = $controller;
   }
       return call_user_func($callback);
    }
  public function renderView($view){
    $layoutContent = $this->layoutContent();
    $viewContent = $this->renderOnlyView($view);
    // include_once Application::$ROOT_DIR."/views/$view.php";
    return str_replace('{{content}}',$viewContent,$layoutContent);
  }
  protected function layoutContent(){
    ob_start();
    include_once Application::$ROOT_DIR."/views/layout/main.php";
    return ob_get_clean();
  }
  protected function renderOnlyView($view){
    ob_start();
    include_once Application::$ROOT_DIR."/views/$view.php";
    return ob_get_clean();
  }
}