<?php

require_once __DIR__.'/../vendor/autoload.php';

use Game\Play;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;


$app = new Application();

// Register the Twig service provider and let it know where to look for templates.
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
  ));

$app['debug'] = true;

$request = Request::createFromGlobals();

$session = new Session();

$app->get('/', function () use ($app, $session){
    $messages = $session->getFlashBag()->get('message', array());
    return $app['twig']->render('pages/home.html.twig', [
        'title' => 'Create a new game',
        'content' => 'Enter the name of the city you want to attack below',
        'messages' => $messages
    ]);
})->bind('home');

$app->post('/createGame', function (Request $request) use ($app, $session){
    $name = $request->request->get('gameName');
    $game = new Play($name);
    $session->set($name, $game);
    $session->getFlashBag()->add('message', 'Game created: ' . $name);
    $response = new RedirectResponse('/');
    return $response;
});

$app->get('/summary', function () use ($app, $session){
    $games = $session->all();
    return $app['twig']->render('pages/summary.html.twig', [
        'title' => 'Game Summary',
        'content' => 'List of Existing Games',
        'games' => $games,
    ]);
})->bind('summary');

$app->get('/game/{name}', function($name) use ($app, $session){
    $gameInfo = $session->get($name);
    $messages = $session->getFlashBag()->get('message', array());
    return $app['twig']->render('pages/game.html.twig', [
        'title' => $name,
        'content' => 'The game is won by destroying the castle.',
        'gameInfo' => $gameInfo,
        'messages' => $messages
    ]);
});

$app->post('/game/{name}/attack', function(Request $request) use ($app, $session)
{
    $name = $request->request->get('gameName');
    $game = $session->get($name);

    // perform attack and store result
    $message = $game->attack();
    // save new game state
    $session->set($name, $game);
    
    // add new attack result to flashbag
    $session->getFlashBag()->add('message', $message);
    
    $gameInfo = $session->get($name);
    $response = new RedirectResponse('/game/' . $name);
    return $response;
});


$app->run();