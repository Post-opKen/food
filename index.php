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
    $validMeals = ["breakfast", "lunch", "dinner"];

    //check validity
    if(!in_array($params['meal'], $validMeals))
    {
        echo "<h3>We don't serve {$params['meal']}.</h3>";
    }else{
        $time = '';
        switch ($params['meal']){
            case 'breakfast':
                $time = " in the morning"; break;
            case 'lunch':
                $time = " at noon"; break;
            case 'dinner':
                $time = " in the evening"; break;
        }
        echo "<h3>I like {$params['food']} for {$params['meal']}$time.</h3>";
    }
});

//define a route to display the order form
$f3->route('GET /order', function(){
    $view = new View();
    echo $view->render('views/form1.html');
});

//define a route to process orders
$f3->route('POST /order-process', function(){
    print_r($_POST);
    echo "Processing Order";
});

//define a route for desserts
$f3->route('GET /dessert/@dessert', function($f3, $params){
    $desserts = ["cake", "cookies", "brownies"];
    if($params['dessert'] == 'pie')
    {
        $view = new View();
        echo $view->render('views/pie.html');
    }
    elseif (in_array($params['dessert'], $desserts))
    {
        echo "I like {$params['dessert']} for dessert.";
    }else{
        $f3->error(404);
    }
});

//run fat free
$f3->run();