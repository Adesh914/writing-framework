<?php 
/**
 * Author: Adesh
 
 */
require_once __DIR__ .'/../vendor/autoload.php';
use app\core\Application;

$app = new Application(dirname(__DIR__));
$app->router->get('/','home');
$app->router->get('/contact-us','contact');
$app->router->get('/about-us','about');
$app->run();
?>