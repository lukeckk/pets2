<?php

//This is my controller

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require
require_once ('vendor/autoload.php');

//Instantiate the F3 Base Class
$f3 = Base::instance();
$con = new Controller($f3);

//Define a default route
//https://kcheng.greenriverdev.com/328/hello-fat-free/
$f3->route('GET /', function(){
    //echo below is used for testing before executing the template
//    echo '<h1>Hello Pets 2</h1>';

    //Render a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

    //Order Page
    $f3->route('GET|POST /order', function($f3){
        $GLOBALS['con']->roboticPet();
    });

    $f3->route('GET /summary', function(){
        //echo below is used for testing before executing the template
//    echo '<h1>Hello Pets 2</h1>';

        //Render a view page
        $view = new Template();
        echo $view->render('views/order-summary.html');
    });

//Run Fat-Free
$f3->run();