<br><br>
<div id="web_dinamico">
   <?php
        $atributos = array('name' => 'frm_list_obj_recomendaciones', 'id' => 'frm_list_obj_recomendaciones');
        echo form_open('admin/obj_recomendaciones/index',$atributos);
   ?>
    <input type="hidden" value="<?php echo site_url()."admin/obj_recomendaciones";?>" id="id_listado_url" />
    <input type="hidden" value="<?php echo site_url();?>admin/obj_recomendaciones/delete_seleccionado" id="id_seleccionar_todos" />

        <div id="web_moduloInterno">
            <div id="web_moduloCabecera">
                <h3>Reporte de recomendaciones</h3>
                <h4>LISTADO</h4>
            </div>
            <div id="web_moduloContenido">
                <br><br>
                <div id="web_moduloListadoRegistros">
                    <table cellspacing="0" summary="registros" class="web_tableRegistros" id="id_tabla_listado" style="width: 400px !important;" align="center">
                        <tr class="web_trCabecera">
                            <th class="web_thColumna1">TOTAL DE PARTICPANTES</th>
                            <th class="web_thColumna4"><?php echo $tot_nuevos[0]->tot_nuevos + $tot_antiguos[0]->tot_antiguos;?></th>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>TOTAL USUARIOS ANTIGUOS</td>
                            <td><?php echo $tot_nuevos[0]->tot_nuevos?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>TOTAL USUARIOS NUEVOS</td>
                            <td><?php echo $tot_antiguos[0]->tot_antiguos;?></td>
                        </tr>
                    </table>
                    <br><br>
                    <div style="background: #E1E1E1;  border: 1px solid #D1D1D1;border-collapse: collapse;color: #7A7A78;
    font: bold 12px Tahoma;margin: 0;padding: 6px;">DETALLE POR SEXO</div>
                    <br>
                    <table cellspacing="0" summary="registros" class="web_tableRegistros" id="id_tabla_listado" style="width: 400px !important;" align="center">
                        <tr class="web_trCabecera">
                            <th class="web_thColumna1">TOTAL DE PARTICPANTES</th>
                            <th class="web_thColumna4"><?php echo $hombres[0]->dni + $mujeres[0]->dni;?></th>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Participantes hombres</td>
                            <td><?php echo $hombres[0]->dni?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Participantes mujeres</td>
                            <td><?php echo $mujeres[0]->dni?></td>
                        </tr>
                    </table>


                    <br><br>
                    <div style="background: #E1E1E1;  border: 1px solid #D1D1D1;border-collapse: collapse;color: #7A7A78;
    font: bold 12px Tahoma;margin: 0;padding: 6px;">DETALLE POR EDADES</div>
                    <br>
                    <table cellspacing="0" summary="registros" class="web_tableRegistros" id="id_tabla_listado" style="width: 400px !important;" align="center">
                        <tr class="web_trCabecera">
                            <th class="web_thColumna1">TOTAL DE PARTICPANTES</th>
                            <th class="web_thColumna4"><?php echo $edades18_24[0]->dni + $edades25_34[0]->dni + $edades35_44[0]->dni+$edades45_54[0]->dni + $edades_55[0]->dni;?></th>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Participantes de 18 a 24</td>
                            <td><?php echo $edades18_24[0]->dni?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Participantes de 25 a 34</td>
                            <td><?php echo $edades25_34[0]->dni;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Participantes de 35 a 44</td>
                            <td><?php echo $edades35_44[0]->dni;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Participantes de 45 a 54</td>
                            <td><?php echo $edades45_54[0]->dni;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Participantes de 55 a m&aacute;s</td>
                            <td><?php echo $edades_55[0]->dni;?></td>
                        </tr>
                    </table>                


                </div>
                <br class="clearIzq" />
            </div>
      </div>
    <!--</form>-->
    <? echo form_close();?>
</div>
