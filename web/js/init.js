// JavaScript Document

$(document).ready(function(){ 	
	//transparencia png
        //alert(dominio);
	var badBrowser = (/MSIE ((5\.5)|6)/.test(navigator.userAgent) && navigator.platform == "Win32");
	if (badBrowser) {
		$(document).pngFix();
	}
	
	// hover botones png
	$('.btn-demo-juega > a').mouseenter(function(){
		$(this).animate({
			top: "-121px"
			}, 0);
	});
	$('.btn-demo-recomienda > a, .btn-demo-premios > a, .btn-demo-ranking > a').mouseenter(function(){
		$(this).animate({
			top: "-79px"
			}, 0);
	});
	$('.btn-demo-juega > a, .btn-demo-recomienda > a, .btn-demo-premios > a, .btn-demo-ranking > a').mouseleave(function(){
		$(this).animate({
			top: "0"
		}, 0);
	});

	// colorbox
	$('.btn-nav-premios, .btn-demo-premios').click(function(){
		$("#cboxClose").addClass("cboxClosePopup");
		$.colorbox({iframe:true, href:dominio+"terminos/premios", innerWidth:516, innerHeight:528, overlayClose:false });
	});
	$('.btn-nav-ranking, .btn-demo-ranking, .btn-ver-ranking').click(function(){
		$("#cboxClose").addClass("cboxClosePopup");
		$.colorbox({iframe:true, href:dominio+"ranking", innerWidth:516, innerHeight:528, overlayClose:false });
	});
	$('.btn-nav-recomienda, .btn-demo-recomienda').click(function(){
		$.colorbox({iframe:true, href:dominio+"recomienda", innerWidth:732, innerHeight:569, overlayClose:false });
	});
	$('.btn-nav-instrucciones').click(function(){
		$.colorbox({iframe:true, href:dominio+"terminos/instrucciones", innerWidth:732, innerHeight:569, overlayClose:false });
	});
	$('.btn-nav-basespromocion').click(function(){
		$.colorbox({iframe:true, href:dominio+"terminos/bases", innerWidth:732, innerHeight:569, overlayClose:false });
	});
	$('.btnTerminos').click(function(){
		$.colorbox({iframe:true, href:dominio+"terminos", innerWidth:732, innerHeight:569, overlayClose:false });
	});
	$('.btn-empieza-juego').click(function(){
		$("#cboxClose").addClass("cboxCloseJuego");
		$.colorbox({iframe:true, href:dominio+"mapa/juego", innerWidth:941, innerHeight:519, overlayClose:false });
	});
	$('.btn-demo-juega a').click(function(){
		$("#cboxClose").addClass("cboxCloseJuego");
		$.colorbox({iframe:true, href:dominio+"mapa/juego_demo", innerWidth:941, innerHeight:519, overlayClose:false });
	});
	
	$('.btn-nav-cerrarsesion').click(function(){
		location = dominio+"home/user_logout";
	});
	
	$('.btn-mejora-tiempo').click(function(){
		location = dominio+"mapa/reset";
	});
	
	
	$(document).bind('cbox_closed', function(){
		$("#cboxClose").removeClass("cboxCloseJuego");
		$("#cboxClose").removeClass("cboxClosePopup");
	});
	
	
	// tabs ranking
	$('a.btnRankingTodos').click(function(){
		$("ul.list-ranking-tabs li").addClass("not-visible");
		$("#rankingTab_1").removeClass("not-visible");
	});
	$('a.btnRankingSemanal').click(function(){
		$("ul.list-ranking-tabs li").addClass("not-visible");
		$("#rankingTab_2").removeClass("not-visible");
	});
	$('a.btnRankingTiempos').click(function(){
		$("ul.list-ranking-tabs li").addClass("not-visible");
		$("#rankingTab_3").removeClass("not-visible");
	});
	
	
	
	
	// validaciones
	
		
	

});


function enviarLogin(){
	if($("#txtDia").val() > 31 || $("#txtDia").val() <= 0){
		$.prompt("Día ingresado es incorrecto");
	}else if($("#txtMes").val() > 12 || $("#txtMes").val() <= 0){
		$.prompt("Mes ingresado es incorrecto");
	}else if($("#txtAnio").val() > 2011 || $("#txtAnio").val() <= 0){
		$.prompt("Año ingresado es incorrecto");
	}else if($("#frmLogin").valid() == true){
		$.post(dominio+"home/validate",$("#frmLogin").serialize(),function(data){
			var msg = $.parseJSON(data);
			if(msg.validacion == "ok"){
				location = "mapa";
			}else if(msg.validacion == "registro"){
				location = "register";
			}else{
				$.prompt(msg.validacion);
			}
		})
	}
}

function enviarRegistro(){
	if($("#TxtDia").val() > 31 || $("#TxtDia").val() <= 0){
		$.prompt("Día ingresado es incorrecto");
	}else if($("#TxtMes").val() > 12 || $("#TxtMes").val() <= 0){
		$.prompt("Mes ingresado es incorrecto");
	}else if($("#TxtAnio").val() > 2011 || $("#TxtAnio").val() <= 0){
		$.prompt("Año ingresado es incorrecto");
	}else if($("#frmRegistro").valid() == true){
		if($('#Txt_terminos').attr('checked') == true){
			$.post(dominio+"register/validate",$("#frmRegistro").serialize(),function(data){
				var msg = $.parseJSON(data);
				if(msg.validacion == "ok"){
					$.prompt("Registrado satisfactoriamente", { callback:function(){
						location = "mapa";
					}});
				}else{
					$.prompt(msg.validacion);
				}
			})
		}else{
			$.prompt("Debe marcar Términos y Condiciones");
		}
	}
}

function enviarRecomienda(){
	if($("#frmRecomienda").valid() == true){
		$.post(dominio+"recomienda/validate",$("#frmRecomienda").serialize(),function(data){
			var msg = $.parseJSON(data);
			$.prompt(msg.validacion, { callback:function(){
				cleanForm();
			}});
		})
	}
}


function cleanForm(){
	$('input:text, select').val('');
	$('input:checkbox').attr('checked', false);
}


/* facebook */

function loginFacebook(){
	FB.login(function(response) {
	  if (response.session) {
		if (response.perms) {
			shareFacebook();
		  // user is logged in and granted some permissions.
		  // perms is a comma separated list of granted permissions
		} else {
		  // user is logged in, but did not grant any permissions
		}
	  } else {
		// user is not logged in
	  }
	//}, {perms:'read_stream,publish_stream,user_birthday,email'});;
	}, {perms:'read_stream,publish_stream'});;
}

function shareFacebook(){
	FB.ui({
		method: 'feed',
		name: 'Buscando a Gálvez',
		link: 'http://www.pilsencallao.com.pe/buscando-galvez/',
		picture: 'http://www.pilsencallao.com.pe/buscando-galvez/web/images/comparte_galvez.jpg',
		description: 'El Capitán Gálvez te reta a encontrarlo para ganar un año de Pilsen Callao ¿Estás listo?'
		},function(response) {
	});
}

/* ************************************************************************************** */

function loginFacebook2(nivel,tiempo){
	
	/*FB.login(function(response) {
	  if (response.session) {
		if (response.perms) {
			shareFacebookLevel(nivel,tiempo);
		  // user is logged in and granted some permissions.
		  // perms is a comma separated list of granted permissions
		} else {
		  // user is logged in, but did not grant any permissions
		}
	  } else {
		// user is not logged in
	  }
	}, {perms:'read_stream,publish_stream'});*/
	shareFacebookLevel(nivel,tiempo);
}

function shareFacebookLevel(nivel,tiempo){
	//alert(nivel+" / "+tiempo);
	var array_share = new Array(
		[dominio+"web/images/comparte_lima.jpg","En Lima me tomó "," segundos encontrarlo, ahora estoy más cerca de ganar un año de Pilsen Callao. ¿Tú que esperas para buscarlo?"],
		[dominio+"web/images/comparte_cusco.jpg","En Cusco me tomó "," segundos encontrarlo. Te apuesto que tú no lo haces en menos tiempo."],
		[dominio+"web/images/comparte_pucallpa.jpg","En Pucallpa me tomó "," segundos encontrarlo. Poco a poco saboreo mis Pilsen Callao. ¿Tú qué estás esperando?"],
		[dominio+"web/images/comparte_iquitos.jpg","En Iquitos me tomó "," segundos descubrir donde estaba. Es imposible que superes mi tiempo, porque todavía sigues sin buscarlo."],
		[dominio+"web/images/comparte_chiclayo.jpg","Chiclayo, fue sencillo, lo encontré en "," segundos. Sólo una ciudad más y las Pilsen Callao son mías. ¿Serás capaz de pasarme?"],
		[dominio+"web/images/comparte_callao.jpg","Gálvez, en la ciudad del Callao, no pudo con mi habilidad. ¡Cumplí el reto en "," segundos! ¿Podrás superar mi tiempo?"]
	);
	
	//alert(tiempo.substr(3,5))
	
	FB.ui({
		method: 'feed',
		name: 'Buscando a Gálvez',
		link: 'http://www.pilsencallao.com.pe/buscando-galvez/',
		picture: array_share[nivel][0],
		description: array_share[nivel][1] + tiempo.substr(3,5) + array_share[nivel][2]
		},function(response){
			if(response){
				window.parent.location.reload();
			}else{
				window.parent.location.reload();
			}
			//window.parent.location.reload();
	});
	
	/*FB.api('/me/feed', 'post', { message:'', name:'',
		link: 'http://www.pilsencallao.com.pe/buscando-galvez/',
		picture: array_share[nivel][0],
		description: array_share[nivel][1] + tiempo.substr(3,5) + array_share[nivel][2]
	},function(response){
		if(response.id){
			window.parent.location.reload();
		}else{
			window.parent.location.reload();
		}
	});*/
}

/* ************************************************************************************** */

function inputFocus(box_1,box_2,num){
	//alert($("#"+val_1).val().length);
	if($("#"+box_1).val().length == num){
		$("#"+box_2).focus();
	}
}



/* GA */
<!--<script type="text/javascript">-->

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-8761516-18']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

<!--<\/script>-->

