<?php

$serverName = 'localhost';
$username = 'root';
$password = '';
$dbname = 'students';

$conn = mysqli_connect($serverName, $username, $password, $dbname);

if(!$conn){
    echo "connection died";
    exit;
}
