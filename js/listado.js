$(function() {
//var formulario=$('#id_form').val();
	var classNames = {
		0 : 'web_trFilaRegistros1',
		1 : 'web_trFilaRegistros2'
	};

	$('table#id_tabla_listado tr').not('.web_trCabecera').each(function(index) {

		this.className = classNames[index % 2];

		$(this).hover(function() {
			$(this).addClass('web_trFilaRegistros4');
		},
		function() {
			$(this).removeClass('web_trFilaRegistros4');
		});

	});

	function verificarCheckbox() {

		var cantidad = $('#id_tabla_listado input[type=checkbox]:checked').not('#id_check_todos').length;

		if (cantidad > 0) {
			$('.id_eliminar').css({
				opacity: 1
			}).removeClass('web_boton1_on').removeClass('inactivo');
		} else {
			$('.id_eliminar').css({
				opacity: 0.9
			}).addClass('web_boton1_on').addClass('inactivo');
		}

	}

	$('#id_tabla_listado input[type=checkbox]').attr('checked', false);

	$('#id_tabla_listado input[type=checkbox]').bind('click',
	function() {
		verificarCheckbox();
	})

	$('.id_eliminar').css({
		opacity: 0.9
	}).addClass('web_boton1_on');

	$('#id_tabla_listado input[id^=check_]').bind('click',
	function() {

		if ($(this).is(':checked')) {
			$(this).parent().parent().addClass('web_trFilaRegistros3');
		} else {
			$('#id_check_todos').attr('checked', false);
			$(this).parent().parent().removeClass('web_trFilaRegistros3');
		}

	})

	$('#id_check_todos').bind('click',
	function() {

		var $dato = $("#id_tabla_listado input[type=checkbox]").not($(this));

		if ($(this).is(':checked')) {
			$dato.attr('checked', $('#id_check_todos').is(':checked'));
			$dato.parent().parent().addClass('web_trFilaRegistros3');
		} else {
			$dato.attr('checked', $('#id_check_todos').is(':checked'));
			$dato.parent().parent().removeClass('web_trFilaRegistros3');
		}

		verificarCheckbox();

	})

	$('#web_moduloContenido .id_eliminar').bind('click',
	function(e) {
		if (!$(this).hasClass('inactivo')) {
			$('#si').attr('rel', 'todo');
			mensajePregunta('#id_popup1');
		}
		e.preventDefault();
	})

	$('.eliminar').click(function(e) {
		$('#si').attr('rel', $(this).attr('href'));
		mensajePregunta('#id_popup1');
		e.preventDefault();
	});

	$('#web_moduloContenido .id_buscar').bind('click',
	function(e) {
		$('form').submit();
		e.preventDefault();
	})

	function eliminando() {
		
		/*$('form').submit(function() {
			alert("si");
			bloqueo('Eliminando...');
			
			var formdata = $(this).serialize();
			$.ajax({
			    url:    $('form').attr('action'),
			    data:   formdata,
			    success: function(){
				    $.unblockUI();
			    }
			});
			return false;
		});*/

		function respuesta( responseText, statusText ){
			if(statusText=="success") document.location = $('#id_listado_url').val();
		}

		
		$('form').ajaxSubmit({
			beforeSubmit: function() {
				bloqueo('Eliminando...');
			},
			success: respuesta
		});
		
		
	}

	$('#si').click(function(e) {

		if ($(this).attr('rel') == 'todo') {
			$('form').attr('action', $('#id_seleccionar_todos').val());
			eliminando();
		} else {
			document.location = $(this).attr('rel');
		}
		e.preventDefault();

	});

	$('#no').click(function(e) {
		$.unblockUI();
		e.preventDefault();
	});
	
	
	function cambiar_Estado() {
		
		function respuesta( responseText, statusText ){
			if(statusText=="success") document.location = $('#id_listado_url').val();
		}
		
		$('form').ajaxSubmit({
			success: respuesta
		});
	}
	
	$('.idEstado').click(function(e) {
		//alert($(this).attr('rel'))
		if ($(this).attr('rel') == 1 || $(this).attr('rel') == 0) {
			$('form').attr('action', $('#id_cambio_estado').val());
			cambiar_Estado();
			//alert($(this).attr('rel'))
		} else {
			document.location = $(this).attr('rel');
			//alert("hola")
		}
		e.preventDefault();

	});
	

})