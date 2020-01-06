<?php
session_start();
require_once '../CrudFunctions.php'; 
$User = new UserHome();
$User->setUsuarioRementente($_SESSION['codUsuario']);
if(isset($_POST['method'],$_POST['methodParam'])){
    $method = $_POST['method'];
    $methodParam = $_POST['methodParam'];
    call_user_func(array($User,$method),$methodParam);
}

class UserHome{
    private $codUsuarioRemetente;
    public function setUsuarioRementente($codUser){
        $this->codUsuarioRemetente = $codUser;
    }

    public function listarAmigos($obj){
        $codUsuario = $_SESSION['codUsuario'];
        $retorno = select("SELECT amigos.id,amigos.codAmigo,usuarios.nome FROM amigos
        INNER JOIN usuarios ON amigos.codAmigo = usuarios.codUsuario
        WHERE amigos.codUsuario = '$codUsuario'");
        if($retorno != 0){
            echo json_encode($retorno);
        }else{
            echo 'Nenhum amigo encontrado';
        }
    }

    public function listarMensagens($obj){
        $codUsuarioDestino = $obj['codAmigo'];
        $retorno = select("SELECT * FROM mensagens WHERE 
         mensagens.codUsuarioRemetente IN('$this->codUsuarioRemetente','$codUsuarioDestino') AND
         mensagens.codUsuarioDestino IN('$this->codUsuarioRemetente','$codUsuarioDestino')");

        if($retorno != 0){
            echo json_encode($retorno);
        }else{
            echo json_encode(0);
        }
    }

    public function listarUsuarios($obj){
        $retorno = select("SELECT nome, codUsuario FROM usuarios");
        if($retorno != 0){
            echo json_encode($retorno);
        }else{
            echo json_encode(0);
        }
    }

    public function sendMessage($obj){
        extract($obj);
        $success = insert("INSERT INTO mensagens (codUsuarioRemetente,codUsuarioDestino,
        msg) VALUES ('$this->codUsuarioRemetente','$codUsuarioDestino','$msg')");
        if($success){
            echo json_encode(1);
        }else{
            echo json_encode(0);
        }
    }

    public function confirmarNovaAmizade($codNovoAmigo){
        $success = insert("INSERT INTO amigos (codUsuario, codAmigo)
        VALUES ('$this->codUsuarioRemetente', '$codNovoAmigo')");
        if($success){
            echo json_encode(1);
        }else{
            echo json_encode(0);
        }
    }

}
