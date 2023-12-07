<?php
namespace app\core;
/**
 * Class Application
 *
 * @author  Adesh
 * @package app
 */

 class Request
 {    
    public function getPath(){
        $path = $_SERVER['REQUEST_URI']??'/';
        $position = strpos($path,'?');
        if($position === false){
            // $path = substr($path,0,$position);
            return $path;
        }
        $path = substr($path,0,$position);
        // echo "<pre>";
        // var_dump($position);
        // echo "</pre>";
        // exit();
    }
    public function getMethod(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
 }