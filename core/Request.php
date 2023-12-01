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
        if($position !== false){
            $path = substr($path,0,$position);
        }
        return $path;
        // echo "<pre>";
        // var_dump($position);
        // echo "</pre>";
    }
    public function getMethod(){
        
    }
 }