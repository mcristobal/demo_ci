<?php
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=reporte_cuentas.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REPORTE POR MEDIOS</title>
</head>
<body>
<table cellspacing="0" summary="registros" class="web_tableRegistros" id="id_tabla_listado" border="1">
    <tr class="web_trCabecera">

        <th class="web_thColumna2">Fec.Facturación</th>
        <th class="web_thColumna2">N° cuenta</th>
        <th class="web_thColumna1">Apellido</th>
        <th class="web_thColumna1">Nombre</th>
        <th class="web_thColumna2">N° Tarjeta</th>
        <th class="web_thColumna2">Tipo</th>
        <th class="web_thColumna1">Estado</th>
        <th class="web_thColumna1">T_A</th>
        <th class="web_thColumna1">Opciones</th>
        <th class="web_thColumna1">Correo</th>
        <th class="web_thColumna1">Tipo correo</th>
        <th class="web_thColumna1">Est. de Cta</th>
        <th class="web_thColumna1">F-participación</th>
    </tr>
     <?php foreach($cuentas as $cuentas): ?>
    <tr class="web_trFilaRegistros1">
        <td><?php echo $cuentas->fecha;?></td>
        <td><?php echo $cuentas->nro_cuenta;?></td>
        <td><?php echo $cuentas->apellidos;?></td>
        <td><?php echo $cuentas->nombres;?></td>
        <td style="mso-number-format:'@';"><?php echo $cuentas->nro_tarjeta;?></td>
        <td align="center"><?php echo $cuentas->tipo_tarjeta;?></td>
        <td><?php
            if ($cuentas->estado == 1){
                echo 'SIN CONFIRMAR';
            }else{
                echo 'CONFIRMADO';
            }
            ?></td>
        <td align="center"><?php echo $cuentas->t_a;?></td>
        <td align="center"><?php echo $cuentas->int_opcion;?></td>
        <td><?php echo $cuentas->txt_email;?></td>
        <td><?php echo $cuentas->txt_tipo_correo;?></td>
        <td><?php if($cuentas->estado_correo== 1){
                    echo 'ACEPTO';
        }else{
                    echo 'NO ACEPTO';
        };?></td>
        <td><?php echo $cuentas->fecha_p;?></td>
    </tr>
    <?php endforeach;?>
</table>
</body>
</html>