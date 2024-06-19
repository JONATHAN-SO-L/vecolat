jQuery(document).on('submit','#formlg',function(event){
 event.preventDefault();
jQuery.ajax({
    url:'index.php ',
    type:'POST',
    dataType:'json',
    data:$(this),serialize(),
    beforeSend:function(){
        $('.botonlg').val('validando..');
}
})
.done(function(respuesta){
    console.log(respuesta);
    if(!respuesta.error){
        if(respuesta.tipo=='gerente'){
          window.location.href='../gerente.php';
           }else if(respuesta.tipo=='coordinador'){
           location.href='../coordinador.php';
           }else if(respuesta.tipo=='auxiliar'){
           location.href='../auxiliar.php'; 
         }
    }else{
        
        $('.error').slideDown('slow');
    console.log("resp.responseText");
    setTimeout(function(){
        $('.error').slideUp('slow');
    },3000;
    $('.botonlg').val('GO!');
}
        
    })
     $('.botonlg').val('GO!');
    .fail(function(resp)){
    console.log(resp.responseText);
})
.always(function(){
    console.log("complete");
  });
});


$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		url:'buscar.php',
		type: 'POST',
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	})
}	
$(document).on('keyup'.'#caja_busqueda',function(){
	var valor = $(this).val();
	if(valor != "")[
	buscar_datos(valor);
}else{
	buscar_datos();
}
});