<?php 
$lifetime = 60 * 60 * 24 * 24; // 2 weeks in seconds, idiot
session_set_cookie_params($lifetime, '/'); // this junk does what it wants
session_start(); // start pls

// grab the database info suckas
require('model/database.php');
require('model/designer_login.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <title>The Designer</title>
        
        <!-- META DATA -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- CSS LIBRARIES -->
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
               
    </head>
    <body> 