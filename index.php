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

//define a breakfast route
$f3->route('GET /breakfast', function(){
    $view = new View();
    echo $view->render('views/breakfast.html');
});

//define a lunch route
$f3->route('GET /lunch', function(){
    $view = new View();
    echo $view->render('views/lunch.html');
});

//run fat free
$f3->run();