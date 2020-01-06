$('#button_finalizarCadastro').click(function(){
    cadastrar();
});
$('#button_Login').click(function(){
    logar();
});

function logar() {
    let obj = {
        email:$('#input_emailLogin').val(),
        senha:$('#input_senhaLogin').val()
    };
    $.ajax({
        url:'classes/Autenticacao.php',
        type: 'post',data: {method:'logar',methodParam:obj},
        beforeSend: function () {   
        },
        success:function(r){
            if(r == 1){
                window.location.href = 'userHome.php';
            }else{
                mostrarAlertGeral('div_alertExisteUsuario','Esse usuário não existe')
            }
        },
        error:function(r){
            console.log(r);
        }
    });
}

function cadastrar() {
    let obj = {
        nome:$('#input_formCadastro_nome').val(),
        email:$('#input_formCadastro_email').val(),
        senha:$('#input_formCadastro_senha').val()
    };

    $.ajax({
        url:'classes/Autenticacao.php',
        type: 'post',data: {method:'cadastrar',methodParam:obj},
        beforeSend: function () {
            
        },
        success:function(r){
            if(r == 1){
                mostrarAlertGeral('alert_modal_cadastrar','Cadastrado com Sucesso');
                esconderModal('modal_cadastrar',1500)
            }else{
                mostrarAlertGeral('alert_modal_cadastrar',r);
            }
        },
        error:function(r){
            console.log(r);
        }
    });
}


