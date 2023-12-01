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
    private Request $request;
    public Router $router;
    public function __construct(){
       
        $this->request = new Request();
        $this->router = new Router($this->request);
    }
    public function run(){
        $this->router->resolve();        
    }
}
// 4386 2805 3045 5884
?>