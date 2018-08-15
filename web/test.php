<?php

require_once __DIR__.'/vendor/autoload.php';

use Game\Play;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


$app = new Application();

// you might want to use this for a few things...
$request = Request::createFromGlobals();

$play = new Play();
$play->attack();


// example route
$app->get('/test', function () {
    $response = new Response('test route');
    return $app;
});


$app->run();