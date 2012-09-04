<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="estilos.css" rel="stylesheet" type="text/css" />
<style type="text/css">input.error {border:1px solid #FF0000;}</style>
</head>
<script type="text/javascript" src="<?php echo site_url();?>web/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo site_url();?>web/js/validate.js"></script>

<body>
    <form name="register" action="<?php echo site_url();?>register/validate" method="post">
<li>dni</li>
<li><input type="text" name="TxtDoc"/></li>
<li>correo</li>
<li><input type="text" name="TxtMail"/></li>

		<li>* DEPARTAMENTO</li>
      <li>
			<select id="cboDepartamento" name="cboDepartamento"  class="inputSelect ui-selectmenu" >
                            <option value="">No seleccionado(*)</option>
                            <?php foreach($departamento as $departamento):
                                    $select  = $departamento->id == '15'?'selected':'';
                             ?>
                            <option value="<?php echo $departamento->id;?>" <?php echo $select;?>><?php echo $departamento->name;?></option>
                            <?php endforeach;?>

			</select>


			</li>
      <li>* PROVINCIA</li>
      <li>
        <select id="cboProvincia" name="cboProvincia" class="inputSelect ui-selectmenu">
        <option value="">No seleccionado(*)</option>
            <?php
                foreach($provincia as $provincia):
                    $select  = $provincia->id == '1501'?'selected':'';
                ?>
        <option value="<?php echo $provincia->id;?>" <?php echo $select;?>><?php echo $provincia->name;?></option>
            <?php endforeach;?>
        </select>

      </li>

      <li>* DISTRITO</li>
      <li>
        <select id="cboDistrito" name="cboDistrito" class="inputSelect ui-selectmenu">
            <option value="">No seleccionado(*)</option>
                 <?php foreach($distrito as $distrito):
                        $select  = $distrito->id == '150101'?'selected':'';
                 ?>
            <option value="<?php echo $distrito->id;?>" <?php echo $select;?>><?php echo $distrito->name;?></option>
            <?php endforeach;?>
        </select>

      </li>
      <input type="submit" name="enviar"></input>
</form>
</body>
<script type="text/javascript">
    var dominio = '<?php echo site_url();?>'
</script>
</html>
