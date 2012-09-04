// JavaScript Document
//Jorge Asalde activacion estado comentarios:

function ajax_estado(id)
{

    var div = "#idEstado"+id;
	jQuery.ajax({
		//type: "GET",
		url: urlProcess,
		data: "id="+id,
		success: function(datos)
				 {	jQuery(div).html(datos); }
	})
}