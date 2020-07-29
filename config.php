<?php


$host       = "localhost";
$dbname     = "recipeBook"; 
$username   = "root";
$password   = "root";


$dsn        = "mysql:host=$host;dbname=$dbname"; 
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
            