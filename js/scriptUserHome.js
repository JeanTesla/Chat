$(document).ready(function(){
    let obj = {
        email:1,
        senha:2
    };
    $.ajax({
        url:'classes/UserHome.php',
        type: 'post',dataType:'json',data: {method:'listarAmigos',methodParam:obj},
        beforeSend: function () {   
        },
        success:function(r){
            let stringHTML='<hr>';
            $(r).each(function(i,valor){
                    stringHTML +=`
                    <li class='li' onclick=verConversa(${JSON.stringify(valor)});>${valor.nome}</li><hr>
                `;
            });
            $('#ul_amigos').html(stringHTML);
        },
        error:function(r){
            console.log(r);
        }
    });
});





function verConversa(infoAmigo){
        $('#modal_mensagens').modal('show');
        let myInterval = setInterval(() => {
                $('#inputHidden_codUsuario_destino').val(infoAmigo.codAmigo);
                let obj = infoAmigo;
                $.ajax({
                    url:'classes/UserHome.php',
                    type: 'post',dataType:'json',data: {method:'listarMensagens',methodParam:obj},
                    beforeSend: function () {   
                    },
                    success:function(r){
                        let usuarioSessao = $('#usuarioSession').val();
                        let stringHTML=(r != 0)?'':'Nenhuma Mensagem Encontrada';
                        $(r).each(function(i,valor){
                            let position = (usuarioSessao == valor.codUsuarioRemetente)?'text-right enviadas':'text-left recebidas';
                            stringHTML +=`
                                <li class='${position} mt-2'>${valor.msg}</li>
                            `;
                        });
                        if($('#div_mensagens').html() != stringHTML){
                            $('#div_mensagens').html(stringHTML);
                            rolar('div_mensagens');
                        }
                        
                    },
                    error:function(r){
                        console.log(r);
                    }
                });
                $('#modal_mensagensTitulo').html(infoAmigo.nome);
                $('#modal_mensagens').on('hidden.bs.modal', function () {
                    clearInterval(myInterval);
                });
        }, 1500);
    }
    






$('#button_enviarMensagem').click(function(){
    if($('#inputHidden_codUsuario_destino').val() != '') sendMessage();
});

function sendMessage(){
    let obj = {
        codUsuarioDestino:$('#inputHidden_codUsuario_destino').val(),
        msg:$('#input_mensagem').val()
    };
    
    $.ajax({
        url:'classes/UserHome.php',
        type: 'post',dataType:'json',data: {method:'sendMessage',methodParam:obj},
        beforeSend: function () {   
        },
        success:function(r){
            if(r == 1){
                $('#div_mensagens').append(`<li class='mt-2 text-right enviadas li2'>${obj.msg}</li>`);
                $('#input_mensagem').val('');
            }
        },
        error:function(r){
            console.log(r);
        }
    });
}



function listarUsuarios(){
    $.ajax({
        url:'classes/UserHome.php',
        type: 'post',dataType:'json',data: {method:'listarUsuarios',methodParam:''},
        beforeSend: function () {   
        },
        success:function(r){
            stringHTML = '';
            $(r).each(function(i,valor){
                if(valor.codUsuario != $('#usuarioSession').val()){
                    stringHTML+=`
                        <tr>
                            <td>${valor.nome}</td>
                            <td class='text-right' onclick='confirmarNovaAmizade(${JSON.stringify(valor.codUsuario)});'><img class='img' src='imagens/adicao.png'></td>
                        </tr>
                    `;
                }
            });
            $('#tbody_modal_novaAmizade').html(stringHTML);
        },
        error:function(r){
            console.log(r);
        }
    });
}

function confirmarNovaAmizade(obj){
    $.ajax({
        url:'classes/UserHome.php',
        type: 'post',dataType:'json',data: {method:'confirmarNovaAmizade',methodParam:obj},
        beforeSend: function () {   
        },
        success:function(r){
            console.log(r);
            $('#modal_novaAmizade').modal('hide');
        },
        error:function(r){
            console.log(r);
        }
    });
}







function rolar(id){
        $('#'+id).animate({ scrollTop: 2000 }, 3000);
}
