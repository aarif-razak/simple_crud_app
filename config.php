<?php

require "../simple_crud_app/credentials.php";
$host       = "sql9.freemysqlhosting.net";
$dbname     = "sql9357482"; 

$dsn        = "mysql:host=$host;dbname=$dbname"; 
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );