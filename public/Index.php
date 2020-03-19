<?php

use Klein\Klein;
use Step\App;

include_once "../vendor/autoload.php";
//region Router
//$router = new Klein();
//
//$router->get('/',function (){
//   return 'INDEX PAGE';
//});
//
//$router->dispatch();
//<controller>/<action>
//uri -> /blog -> BlogController -> all
//uri ->blog/create ->Blog
//endregion

new App();

