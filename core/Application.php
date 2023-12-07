<?php
namespace app\core;
/**
 * Class Application
 *
 * @author  Adesh
 * @package app
 */
class Application
{   
    public Static String $ROOT_DIR;
    public Request $request;
    public Router $router;
    public Response $response;
    public static Application $app;
    public function __construct($rootPath){  
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;     
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);      
    }    
    public function run(){
      echo $this->router->resolve();        
    }
}

?>