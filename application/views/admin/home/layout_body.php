<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:::.. Administrador de Contenidos..:::</title>
<?php echo $_scripts ;?>
<?php echo $_styles ;?>
<script type="text/javascript">
function fechaEspanol(){
	mesarray=new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	diaarray=new Array( "Domingo","Lunes", "Martes", "Mi&eacute;rcoles", "Jueves", "Viernes", "S&oacute;bado");
	hoy = new Date();
	dias = hoy.getDate();
	dia = hoy.getDay();
	mes = hoy.getMonth();
	mes=mesarray[mes];
	dia =diaarray[dia];
	anno = hoy.getYear();
	if (anno <200)
	     anno = anno+1900;

	return (dia+" "+dias+" de "+mes+" del "+anno);
}
</script>
</head>
<body>
<div id="maq_alineacion" class="general">
	<div id="maq_cabecera">
		<?php echo $region_usuario; ?>
    </div>
    <div id="maq_principal">
      <div id="web_general">
        	<div id="web_general_f1_c1"></div>
            <div id="web_general_f2_c1">
            	<div id="web_menu">
                     <?php echo $region_modulo; ?>
                </div>
                <div id="web_interna">
                    <div id="web_cabecera">
                        <div id="empresa"><img src="<?php echo site_url() ?>/images/logo.png" width="122"  alt="" /></div>
                        <div id="datos">
                            <h3 id="nivel"><strong>Nivel:</strong> Administrador</h3>
                            <h3 id="modificacion">
			    <?php
				function fecha($fecha)
				{
				    if ($fecha)
				   {
				      $f=explode("-",$fecha);
				      $nummes=(int)$f[1];
				      $semana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S�bado");
				      $dia=$semana[$f[3]];
				      $mes1="0-Enero-Febre-Marzo-Abril-Mayo-Junio-Julio-Agosto-Septiembre-Octubre-Noviembre-Diciembre";
				      $mes1=explode("-",$mes1);
				      $desfecha="$dia $f[0] de $mes1[$nummes] del $f[2]";
				      return $desfecha;
				   } 
				}		
			    
			    
			    echo fecha(date('j-n-Y-w')); ?></h3>
                        </div>
                        <div class="clearAmb"></div>
                    </div>
                    <div id="web_dinamico">
                		<?php echo $region_contenido; ?>
                    </div>
                </div>
                <br class="clearIzq" />
            </div>
            <div id="web_general_f3_c1"></div>
        </div>
    </div>
    <div id="maq_pie">
      	<div id="web_logo_cms"><span>Powered by:</span><img src="<?php echo site_url() ?>/images/imagen_logo_cms.gif" width="92" height="35" alt="" /></div>
    </div>
</div>
<!--<script type="text/javascript" src="js/jquery.js"></script>-->
<script type="text/javascript">

	$(function(){
			   
		$('#web_moduloListado').filter(function(){
												
			$(this).find('.modulo').bind('mouseover mouseout',function(e){
																	   
				if(e.type=='mouseover') $(this).addClass('modulo_on');	
				if(e.type=='mouseout') $(this).removeClass('modulo_on');		
																	   
			})
																		
			$(this).find('.botonDesplegar').bind('click',function(e){

				var extras=$(this).parent().parent().find('.datos').find('.web_extras');
		  
				if(extras.is(':hidden')){
					extras.show('fast');
					$(this).find('.area2').css('visibility','visible');
				}else{
					extras.slideUp('fast');
					$(this).find('.area2').css('visibility','hidden');
				}
				
			})	
			
		})	
		
		$('#web_menu ul li ul li').filter(function(){
												   
			$(this).children('a').bind('mouseover mouseout',function(e){
																	 
				if(e.type=='mouseover') $(this).stop().animate({"left": "10px"}, "fast");
				if(e.type=='mouseout') $(this).stop().animate({"left": "0px"}, "fast");
				
			})
		
		}) 
	})
	
</script>


<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript">

     DD_belatedPNG.fix('#maq_cabecera, #maq_pie , .arriba , .abajo ');
     
</script>
<![endif]-->
</body>
</html>
