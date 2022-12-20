<?php 


function connectToDB()
{
    return new PDO(
        'mysql:host=devkinsta_db;dbname=simple_store',
        'root',
        '4JqGyoVdUoAAEJxU'
    );
}

function isLoggedIn()
{
    // if the user is logged in, it will return true
    // if the user is not logged in,it will return false
    return isset( $_SESSION['user'] );
}

function logout ()
{
    //delete the session data so that the user can logout
    unset( $_SESSION['user'] );
}