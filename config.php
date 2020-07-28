<?php

require "../simple_crud_app/credentials.php";

$dsn        = "mysql:host=$host;dbname=$dbname"; 
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );