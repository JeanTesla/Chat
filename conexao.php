<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'chat';

try{
    $conn = mysqli_connect($host,$user,$pass,$db_name);
}catch(Exception $e){
    echo 'Erro na conexão com o banco: '.$e->getMessage();
}