<?php
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=ganadores.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REPORTE POR MEDIOS</title>
</head>
<body>
                   <table cellspacing="0" summary="registros" class="web_tableRegistros" id="id_tabla_listado">
                        <tr class="web_trCabecera">
                            <th colspan="7">GANADORES </th>
                        </tr>
                        <tr class="web_trCabecera">
                            <th class="web_thColumna1">N°</th>
                            <th class="web_thColumna4">Nombre</th>
                            <th class="web_thColumna4">Apellidos</th>
                            <th class="web_thColumna1">DNI</th>
                            <th class="web_thColumna1">Correo</th>
                            <th class="web_thColumna1">Provincia</th>
                            <th class="web_thColumna1">Distrito</th>
                        </tr>
                        <?php
                            $x = 1;
                            foreach($obj_lima as $obj_lima):
                                if ($x <=20){
                            ?>
                        <tr class="web_trFilaRegistros1">
                            <td><?php echo $x;?></td>
                            <td><?php echo $obj_lima->nombres;?></td>
                            <td><?php echo $obj_lima->apellido_paterno." ".$obj_lima->apellido_materno;?></td>
                            <td><?php echo $obj_lima->num_doc;?></td>
                            <td><?php echo $obj_lima->email;?></td>
                            <td><?php echo "Lima";?></td>
                            <td><?php echo $obj_lima->name;?></td>
                        </tr>
                         <?php }
                            $x= $x + 1;
                            endforeach;
                         ?>
                        <?php
                            $x = 21;
                            foreach($obj_chiclayo as $obj_chiclayo):
                                if ($x <=27){
                            ?>
                        <tr class="web_trFilaRegistros1">
                            <td><?php echo $x;?></td>
                            <td><?php echo $obj_chiclayo->nombres;?></td>
                            <td><?php echo $obj_chiclayo->apellido_paterno." ".$obj_chiclayo->apellido_materno;?></td>
                            <td><?php echo $obj_chiclayo->num_doc;?></td>
                            <td><?php echo $obj_chiclayo->email;?></td>
                            <td><?php echo "Chiclayo";?></td>
                            <td><?php echo $obj_chiclayo->name;?></td>
                        </tr>
                         <?php }
                            $x= $x + 1;
                            endforeach;
                         ?>
                        <?php
                            $x = 28;
                            foreach($obj_piura as $obj_piura):
                                if ($x <=33){
                            ?>
                        <tr class="web_trFilaRegistros1">
                            <td><?php echo $x;?></td>
                            <td><?php echo $obj_piura->nombres;?></td>
                            <td><?php echo $obj_piura->apellido_paterno." ".$obj_piura->apellido_materno;?></td>
                            <td><?php echo $obj_piura->num_doc;?></td>
                            <td><?php echo $obj_piura->email;?></td>
                            <td><?php echo "Piura";?></td>
                            <td><?php echo $obj_piura->name;?></td>
                        </tr>
                         <?php }
                            $x= $x + 1;
                            endforeach;
                         ?>
                        <?php
                            $x = 34;
                            foreach($obj_chimbote as $obj_chimbote):
                                if ($x <=36){
                            ?>
                        <tr class="web_trFilaRegistros1">
                            <td><?php echo $x;?></td>
                            <td><?php echo $obj_chimbote->nombres;?></td>
                            <td><?php echo $obj_chimbote->apellido_paterno." ".$obj_chimbote->apellido_materno;?></td>
                            <td><?php echo $obj_chimbote->num_doc;?></td>
                            <td><?php echo $obj_chimbote->email;?></td>
                            <td><?php echo "Chimbote";?></td>
                            <td><?php echo $obj_chimbote->name;?></td>
                        </tr>
                         <?php }
                            $x= $x + 1;
                            endforeach;
                         ?>
                        <?php
                            $x = 37;
                            foreach($obj_iquitos as $obj_iquitos):
                                if ($x <=39){
                            ?>
                        <tr class="web_trFilaRegistros1">
                            <td><?php echo $x;?></td>
                            <td><?php echo $obj_iquitos->nombres;?></td>
                            <td><?php echo $obj_iquitos->apellido_paterno." ".$obj_iquitos->apellido_materno;?></td>
                            <td><?php echo $obj_iquitos->num_doc;?></td>
                            <td><?php echo $obj_iquitos->email;?></td>
                            <td><?php echo "Iquitos";?></td>
                            <td><?php echo $obj_iquitos->name;?></td>
                        </tr>
                         <?php }
                            $x= $x + 1;
                            endforeach;
                         ?>
                        <?php
                            $x = 40;
                            foreach($obj_pucallpa as $obj_pucallpa):
                                if ($x <=43){
                            ?>
                        <tr class="web_trFilaRegistros1">
                            <td><?php echo $x;?></td>
                            <td><?php echo $obj_pucallpa->nombres;?></td>
                            <td><?php echo $obj_pucallpa->apellido_paterno." ".$obj_pucallpa->apellido_materno;?></td>
                            <td><?php echo $obj_pucallpa->num_doc;?></td>
                            <td><?php echo $obj_pucallpa->email;?></td>
                            <td><?php echo "Pucalpa";?></td>
                            <td><?php echo $obj_pucallpa->name;?></td>
                        </tr>
                         <?php }
                            $x= $x + 1;
                            endforeach;
                         ?>
                        <?php
                            $x = 44;
                            foreach($obj_huancayo as $obj_huancayo):
                                if ($x <=47){
                            ?>
                        <tr class="web_trFilaRegistros1">
                            <td><?php echo $x;?></td>
                            <td><?php echo $obj_huancayo->nombres;?></td>
                            <td><?php echo $obj_huancayo->apellido_paterno." ".$obj_huancayo->apellido_materno;?></td>
                            <td><?php echo $obj_huancayo->num_doc;?></td>
                            <td><?php echo $obj_huancayo->email;?></td>
                            <td><?php echo "Huancayo";?></td>
                            <td><?php echo $obj_huancayo->name;?></td>
                        </tr>
                         <?php }
                            $x= $x + 1;
                            endforeach;
                         ?>
                        <?php
                            $x = 48;
                            foreach($obj_cusco as $obj_cusco):
                                if ($x <=50){
                            ?>
                        <tr class="web_trFilaRegistros1">
                            <td><?php echo $x;?></td>
                            <td><?php echo $obj_cusco->nombres;?></td>
                            <td><?php echo $obj_cusco->apellido_paterno." ".$obj_cusco->apellido_materno;?></td>
                            <td><?php echo $obj_cusco->num_doc;?></td>
                            <td><?php echo $obj_cusco->email;?></td>
                            <td><?php echo "Cusco";?></td>
                            <td><?php echo $obj_cusco->name;?></td>
                        </tr>
                         <?php }
                            $x= $x + 1;
                            endforeach;
                         ?>
                    </table>
                    <br><br><br>
                    <table cellspacing="0" summary="registros" class="web_tableRegistros" id="id_tabla_listado">
                        <tr class="web_trCabecera">
                            <th colspan="7">SUPLENTES </th>
                        </tr>
                        <tr class="web_trCabecera">
                            <th class="web_thColumna4">Nombre</th>
                            <th class="web_thColumna4">Apellidos</th>
                            <th class="web_thColumna1">DNI</th>
                            <th class="web_thColumna1">Correo</th>
                            <th class="web_thColumna1">Provincia</th>
                            <th class="web_thColumna1">Distrito</th>
                        </tr>
                        <?php foreach($obj_lima_suplente as $key => $obj_lima_suplentes):
                         if ($key >=21){
?>
                        <tr class="web_trFilaRegistros1">
                            <td><?php echo $obj_lima_suplentes->nombres;?></td>
                            <td><?php echo $obj_lima_suplentes->apellido_paterno." ".$obj_lima_suplentes->apellido_materno;?></td>
                            <td><?php echo $obj_lima_suplentes->num_doc;?></td>
                            <td><?php echo $obj_lima_suplentes->email;?></td>
                            <td><?php echo "Lima";?></td>
                            <td><?php echo $obj_lima_suplentes->name;?></td>
                        </tr>
                         <?php
                         }
                         endforeach;?>

                        <?php foreach($obj_chiclayo_suplente as $key => $obj_chiclayo_suplente):
                         if ($key >=8){
?>
                        <tr class="web_trFilaRegistros1">
                            <td><?php echo $obj_chiclayo_suplente->nombres;?></td>
                            <td><?php echo $obj_chiclayo_suplente->apellido_paterno." ".$obj_chiclayo_suplente->apellido_materno;?></td>
                            <td><?php echo $obj_chiclayo_suplente->num_doc;?></td>
                            <td><?php echo $obj_chiclayo_suplente->email;?></td>
                            <td><?php echo "Chiclayo";?></td>
                            <td><?php echo $obj_chiclayo_suplente->name;?></td>
                        </tr>
                         <?php
                         }
                         endforeach;?>

                        <?php foreach($obj_piura_suplente as $key => $obj_piura_suplente):
                         if ($key >=7){
?>
                        <tr class="web_trFilaRegistros1">
                            <td><?php echo $obj_piura_suplente->nombres;?></td>
                            <td><?php echo $obj_piura_suplente->apellido_paterno." ".$obj_piura_suplente->apellido_materno;?></td>
                            <td><?php echo $obj_piura_suplente->num_doc;?></td>
                            <td><?php echo $obj_piura_suplente->email;?></td>
                            <td><?php echo "Piura";?></td>
                            <td><?php echo $obj_piura_suplente->name;?></td>
                        </tr>
                         <?php
                         }
                         endforeach;?>

                        <?php foreach($obj_chimbote_suplente as $key => $obj_chimbote_suplente):
                         if ($key >=4){
?>
                        <tr class="web_trFilaRegistros1">
                            <td><?php echo $obj_chimbote_suplente->nombres;?></td>
                            <td><?php echo $obj_chimbote_suplente->apellido_paterno." ".$obj_chimbote_suplente->apellido_materno;?></td>
                            <td><?php echo $obj_chimbote_suplente->num_doc;?></td>
                            <td><?php echo $obj_chimbote_suplente->email;?></td>
                            <td><?php echo "Chimbote";?></td>
                            <td><?php echo $obj_chimbote_suplente->name;?></td>
                        </tr>
                         <?php
                         }
                         endforeach;?>

                        <?php foreach($obj_iquitos_suplente as $key => $obj_iquitos_suplente):
                         if ($key >=4){
?>
                        <tr class="web_trFilaRegistros1">
                            <td><?php echo $obj_iquitos_suplente->nombres;?></td>
                            <td><?php echo $obj_iquitos_suplente->apellido_paterno." ".$obj_iquitos_suplente->apellido_materno;?></td>
                            <td><?php echo $obj_iquitos_suplente->num_doc;?></td>
                            <td><?php echo $obj_iquitos_suplente->email;?></td>
                            <td><?php echo "Iquitos";?></td>
                            <td><?php echo $obj_iquitos_suplente->name;?></td>
                        </tr>
                         <?php
                         }
                         endforeach;?>

                        <?php foreach($obj_pucallpa_suplente as $key => $obj_pucallpa_suplente):
                         if ($key >=5){
?>
                        <tr class="web_trFilaRegistros1">
                            <td><?php echo $obj_pucallpa_suplente->nombres;?></td>
                            <td><?php echo $obj_pucallpa_suplente->apellido_paterno." ".$obj_pucallpa_suplente->apellido_materno;?></td>
                            <td><?php echo $obj_pucallpa_suplente->num_doc;?></td>
                            <td><?php echo $obj_pucallpa_suplente->email;?></td>
                            <td><?php echo "Pucallpa";?></td>
                            <td><?php echo $obj_pucallpa_suplente->name;?></td>
                        </tr>
                         <?php
                         }
                         endforeach;?>

                        <?php foreach($obj_huancayo_suplente as $key => $obj_huancayo_suplente):
                         if ($key >=5){
?>
                        <tr class="web_trFilaRegistros1">
                            <td><?php echo $obj_huancayo_suplente->nombres;?></td>
                            <td><?php echo $obj_huancayo_suplente->apellido_paterno." ".$obj_huancayo_suplente->apellido_materno;?></td>
                            <td><?php echo $obj_huancayo_suplente->num_doc;?></td>
                            <td><?php echo $obj_huancayo_suplente->email;?></td>
                            <td><?php echo "Huancayo";?></td>
                            <td><?php echo $obj_huancayo_suplente->name;?></td>
                        </tr>
                         <?php
                         }
                         endforeach;?>

                        <?php foreach($obj_cusco_suplente as $key => $obj_cusco_suplente):
                         if ($key >=4){
?>
                        <tr class="web_trFilaRegistros1">
                            <td><?php echo $obj_cusco_suplente->nombres;?></td>
                            <td><?php echo $obj_cusco_suplente->apellido_paterno." ".$obj_cusco_suplente->apellido_materno;?></td>
                            <td><?php echo $obj_cusco_suplente->num_doc;?></td>
                            <td><?php echo $obj_cusco_suplente->email;?></td>
                            <td><?php echo "Huancayo";?></td>
                            <td><?php echo $obj_cusco_suplente->name;?></td>
                        </tr>
                         <?php
                         }
                         endforeach;?>

                    </table>
</body>
</html>