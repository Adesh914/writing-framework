<?php
namespace app\core;
/**
 * Class Application
 *
 * @author  Adesh
 * @package app
 */
class Response
{
    public function setStatusCode(int $code){
        http_response_code($code);
    }
}