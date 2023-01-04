<?php


//get route from the global variable
$path = $_SERVER[ "REQUEST_URI" ];

//remoe beginning & ending slash
$path = trim( $path , '/' );

//remove all the URL parameters that starts with ?
$path = parse_url( $path , PHP_URL_PATH );

// var_dump( $path );

switch( $path ) {
    case 'login':
        require "pages/login.php";
        break;
    case 'signup':
        require "pages/signup.php";
        break;
    case 'cart':
        require "pages/cart.php";
    break;
    case 'orders':
        require "pages/orders.php";
        break;
    case 'logout':
        require "pages/logout.php";
        break;
    default:
        require "pages/home.php";
        break;
}