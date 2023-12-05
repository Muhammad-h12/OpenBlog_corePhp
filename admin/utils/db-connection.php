<?php

$type = 'mysql';
$server = 'localhost';
$db_name = 'cmsphp_db';
$port = '3306';
$charSet = 'utf8mb4';

$username='root';
$password= '';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$dsn = "$type:host=$server;dbname=$db_name;port=$port;charset=$charSet";



try {
    $pdo = new PDO($dsn,$username,$password,$options);
}catch (PDOException $e){
//    throw new PDOException($e->getMessage(), $e->getCode());
    echo "Something went Wrong";
    die();
}