<?php
/*
Ean Daus
1/14/19
index.php
My Fave Foods
*/
//php error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload
require_once 'vendor/autoload.php';

//create an instance of the base class
$f3 = Base::instance();

//fat free error reporting
$f3->set('DEBUG', 3);

//define a default route
$f3->route('GET /', function(){
    //echo "<h1>My Fav Foods</h1>";
    $view = new View;
    echo $view->render('views/home.html');
});

//define a pancakes route
$f3->route('GET /breakfast/pancakes', function(){
    $view = new View();
    echo $view->render('views/pancakes.html');
});

//define a veg burger route
$f3->route('GET /dinner/vegburger', function(){
    $view = new View();
    echo $view->render('views/veg-burger.html');
});

//define a burrito route
$f3->route('GET /dinner/burrito', function(){
    $view = new View();
    echo $view->render('views/burrito.html');
});

//define a pizza route
$f3->route('GET /dinner/pizza', function(){
    $view = new View();
    echo $view->render('views/pizza.html');
});

//route with a parameter
$f3->route('GET /@meal', function($f3, $params){
    $view = new View();
    echo $view->render('views/' . $params['meal'] . '.html');
});

//define a route with multiple parameters
$f3->route('GET /@meal/@food', function($f3, $params){
    echo "<h3>I like {$params['food']} for {$params['meal']}.</h3>";
});

//run fat free
$f3->run();