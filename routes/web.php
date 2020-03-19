<?php
/**
 * -----------
 * WEB ROUTES
 * -----------
 * @var Klein $router
 */
use Klein\Klein;
use Klein\Request;
use Klein\Response;


$router->get('/', function (Request $request, Response $response){
    //throw new Exception('This is exception', 600);
    return action('Site@index', $request,$response);
});

//$router->get('/test',function (){
//   return 'this is test';
//});

//GET POST PUT/PATCH DELETE HEAD OPTIONS