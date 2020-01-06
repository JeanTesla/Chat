function mostrarAlertGeral(id,message,time){
    $('#'+id).html("<div style='background-color: #FF0000'>"+message+"</div>")
    //setTimeout(function(){
      //  $('#'+id).html('')
    //},time);
}

function esconderModal(id,time){
    setTimeout(function(){$('#'+id).modal('hide')},time);
}
