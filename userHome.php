<?php session_start();
if(!isset($_SESSION['codUsuario'])){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <script src="js/JQuery.js" ></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js" ></script>
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <input type='hidden' id='usuarioSession' value='<?=$_SESSION['codUsuario']?>'>


    <div class='container-fluid'>
        <h4>Olá, <?php echo $_SESSION['nomeUsuario']?>></h4>
        <ul id='ul_amigos'><!--RV - JS--></ul>
        <button type="button" id='button_novaAmizade col-sm' data-toggle='modal' data-target='#modal_novaAmizade' onclick='listarUsuarios();' class="btn btn-primary">Nova Amizade</button>
        <br><br>
        <a href='sair.php'><button type="button" class="btn btn-primary">Sair</button></a>

    </div>


     <!-- MODAL DE MENSAGENS -->
     <div class="modal fade" id="modal_mensagens" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_mensagensTitulo"><!--RV - JS--></h5>
            </div>
            <div class="modal-body">
                <input type="hidden" id='inputHidden_codUsuario_destino'>
                <div class='campoMensagens' style='list-style-type: none;' id='div_mensagens'><!--RV - JS--></div>
                <div class='row paddingsPainelLogin'>
                    <div class='col-sm-9'>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Msg</span>
                            </div>
                            <input type="text" class="form-control" id='input_mensagem' placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class='col-sm-2 text-right'>
                    <button type="button" id='button_enviarMensagem' class="btn btn-primary">Enviar</button>
                    </div>
                </div>
                
            </div>
            
            </div>
        </div>
    </div>

    <!-- MODAL DE NOVA AMIZADE -->
    <div class="modal fade" id="modal_novaAmizade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Fazer nova amizade</h5>
            </div>
            <div class="modal-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col" class='text-right'>#</th>
                        </tr>
                    </thead>
                    <tbody id='tbody_modal_novaAmizade'><!--RV - JS--></tbody>
                </table>
                    
            </div>
                
            </div>
        </div>
    </div>




    <script src="js/scriptsGerais.js" ></script>
    <script src="js/scriptUserHome.js"></script>
</body>
</html>