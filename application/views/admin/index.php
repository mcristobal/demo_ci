<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:::.. Administrador de Contenidos..:::</title>
<link rel="stylesheet" type="text/css" href="<?php echo site_url()?>styles/maq.css" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url()?>styles/web.css" />
</head>
<body>
    
<div id="maq_alineacion" class="login">
    	<div id="maq_cabecera"><h3>Administrador</h3></div>
<div id="maq_principal">
        	<div id="web_login">
            	<div id="empresa">
                 <!--<p>LOGO DE LA EMPRESA</p>-->
                <img src="<?php echo site_url()?>images/logo.png" width="122"   alt="" />
                </div>
                <div id="formulario">
<?php
    $atributos = array('name' => 'login', 'id' => 'login');
    echo form_open('admin/login/proc_login', $atributos);
?>
                    	<fieldset>
                        	<ul>
                            	<li>
                                	<label class="label1">Correo</label>
                                    <input type="text" id="txt_email" name="txt_email" class="inputText1 requerido" title="coloque su correo"/>
                                </li>
                                <li>
                                	<label class="label1">Contraseña</label>
                                        <input type="password" id="txt_password" name="txt_password" class="inputText1 requerido" title="coloque su password"/>
                                </li>
                                <li>
                               	  <div id="web_captcha">
                                 
                                  <img src="<?php echo site_url()?>admin/crear_imagen/index" width="98" height="26" />
                                  </div>
                                  <input type="text" id="captcha" name="txt_seguridad" maxlength="6" class="inputText1 requerido" title="digite el captcha generado"/>
                                    <div class="clearIzq"></div>
                                </li>
                            </ul>
                          <div class="clearIzq"></div>
                            <div id="web_botones">
                            	<!--<a href="javascript:enviar();" onclick="this.href" class="web_boton1">ENVIAR</a>-->
                                <a href="#enviarLogin" class="web_boton1 validar">ENVIAR</a>
                            </div>
            </fieldset>
                  <? echo form_close();?>
                </div>
                <br />
</div>
  </div>
    <div id="maq_pie">
   		  <div id="web_logo_cms"><span>Powered by:</span><img src="<?php echo site_url()?>/images/imagen_logo_cms.gif" width="92" height="35" alt="" /></div>
    </div>

</div>
<script type="text/javascript" src="<?php echo site_url()?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>js/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>js/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>js/bloqueo.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>js/validar.js"></script>
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript">

    DD_belatedPNG.fix('#maq_cabecera, #maq_pie');

</script>
<![endif]-->
</body>
    <!--<script type="text/javascript" >
        function enviar(){            
            document.forms["login"].submit();
        }
    </script>-->
</html>
