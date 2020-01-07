<?php 
   
   
   
    //$aut = new Autenticacao();
    //if(isset($_POST['method'],$_POST['methodParam'])){    
   //     call_user_func(array($aut,$_POST['method']),$_POST['methodParam']);
   // }
   
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    <script src="js/JQuery.js" ></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js" ></script>
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class='container-fluid painelLogin'>
   
        <div class=''>
            <div class='row'>
                <div class='col-sm text-center mt-5'>
                    <a style='font-size: 20px'> Login </a>
                </div>
            </div>

            <div class='paddingsPainelLogin'>
                <div class="input-group mb-3 input-group-sm ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                </div>
                    <input type="email" id='input_emailLogin' class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3 input-group-sm ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2">Senha</span>
                </div>
                    <input type="password" id='input_senhaLogin' class="form-control" placeholder="Senha" aria-label="Username" aria-describedby="basic-addon2">
                </div>
            </div>
            <div id='div_alertExisteUsuario'></div>
            <div class='row paddingsPainelLogin'>
                <div class='col-sm text-left '>
                    <button type="button" class="btn btn-primary" data-toggle='modal' data-target='#modal_cadastrar'>Cadastrar</button>
                </div>
                
                <div class='col-sm text-right '>
                    <button type="button"  id='button_Login' class="btn btn-primary">Login</button>
                </div>
            </div>
        </div>
   </div>



    <!-- MODAL DE CADASTRO -->
    <div class="modal fade" id="modal_cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastre-se</h5>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nome</label>
                    <input type="text" class="form-control" id="input_formCadastro_nome">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Informe um Email válido</label>
                    <input type="email" class="form-control" id="input_formCadastro_email" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input type="password" class="form-control" id="input_formCadastro_senha">
                </div>
                <hr>
                <div id='alert_modal_cadastrar'></div>
                <div class='col-sm text-right'>
                    <button type="button"  id='button_finalizarCadastro' class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>


    <script src="js/scriptsGerais.js" ></script>
    <script src="js/scriptAutenticacao.js" ></script>

</body>
</html>