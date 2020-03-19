<?php

use Klein\Request;
use Klein\Response;
use Step\Core\RenderEngine;

function action($name,Request $request = null, Response $response = null){
    $name = explode('@',$name);
    $controller = "Step\Controllers\\" . $name[0] . "Controller";
    $action = $name[1];

    $class = new $controller();
    return call_user_func([$class,$action], $request, $response);
}

function path($path){
    $base = getcwd(); //get current working directory
    $base = dirname($base);
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
    $path = str_replace('/', DIRECTORY_SEPARATOR, $path);
    $path = trim($path, DIRECTORY_SEPARATOR);
    return $base . DIRECTORY_SEPARATOR . $path;

}

function config($name){
    $name = explode('.',$name);
    $file = array_shift($name);
    $file = path("config/{$file}.php");
    if(!file_exists($file) or !is_file($file))
        return null;
    $res = include $file;
    foreach ($name as $key){
        $res = $res[$key] ?? null;
    }
    return $res;
}
function view($name, array $variables=[]){
    $name = str_replace('.', DIRECTORY_SEPARATOR, $name);
    //index.tpl
    $ext = config('app.template_extension');
    $name = "{$name}.{$ext}";
    $engine= RenderEngine::instance();
    foreach ($variables as $key => $value){
        $engine->assign($key,$value);
        // assign('name','John')
        //{$name} -> John
    }

    return $engine->fetch($name);
}

//view('admin.pages.dashboard');
//config('app.name')
//path('routes/web/php'); // OSPanel\domains\mvc.loc\routes\web.php