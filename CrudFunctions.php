<?php
require_once '../conexao.php';
function select($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
        $retorno = mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        $retorno = 0;
    }
    return $retorno;
}

function insert($query){
    global $conn;
    if(mysqli_query($conn,$query)){
        return true;
    }else{
        return false;
    }
}