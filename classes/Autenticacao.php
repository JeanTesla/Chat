<?php
/*
Essa classe Obtem os métodos necessários para autenticação.
Para ações de cadastro, login, exclusão, alteração de senha e outras coisas.
*/
    session_start();
    require_once '../CrudFunctions.php'; 
    $aut = new Autenticacao();
    if(isset($_POST['method'],$_POST['methodParam'])){
        $method = $_POST['method'];
        $methodParam = $_POST['methodParam'];
        call_user_func(array($aut,$method),$methodParam);
    }


    class Autenticacao{
        public function cadastrar($obj){
            extract($obj);
            if(!$this->existeUsuario($email)){
                //echo 'Esse email pode ser cadastrado';
                $sucess = insert("INSERT INTO usuarios (nome, email, senha)
                 VALUES ('$nome','$email','$senha')");
                 if($sucess == true) echo 1;
            }else{
                echo 'Esse usuário já existe';
            }
        }
        public function logar($obj){
            extract($obj);
            $retorno = select("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");
            if($retorno != 0){
                $_SESSION['nomeUsuario'] = $retorno[0]['nome'];
                $_SESSION['emailUsuraio'] = $retorno[0]['email'];
                $_SESSION['codUsuario'] = $retorno[0]['codUsuario'];
                echo 1;
            }else{
                echo 0;
            }
        }

        private function existeUsuario($email){
            if(select("SELECT * FROM usuarios WHERE email = '$email'") == 0){
                return false;
            }else{
                return true;
            }
        }
    }