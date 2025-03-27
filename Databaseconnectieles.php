<?php

$host = "localhost";
$db = "winkel";
$user = 'root';
$pass = '';

try{
$pdo = new Pdo("mysql:host=$host;dbname=$db;", $user, $pass);
}catch(Exception $e){
    echo "Error: " . $e->getMessage() . "<br>";
}





?>