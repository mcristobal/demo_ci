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
                            <th class="web_thColumna4"><?php echo $terminado_mf[0]->total;?></th>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Hombres terminaron el juego</td>
                            <td><?php echo $terminado_m[0]->total?></td>
                        </tr>
                        <tr>
                            <td>
                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                    <tr>
                                        <td>Hombres 18 a 24 </td>
                                        <td><?php echo $anio18_24_m[0]->total;?></td>
                                    </tr>
                                    <tr>
                                        <td>Hombres 25 a 34 </td>
                                        <td><?php echo $anio25_34_m[0]->total;?></td>
                                    </tr>
                                    <tr>
                                        <td>Hombres 35 a 44 </td>
                                        <td><?php echo $anio35_44_m[0]->total;?></td>
                                    </tr>
                                    <tr>
                                        <td>Hombres 45 a 54 </td>
                                        <td><?php echo $anio45_54_m[0]->total;?></td>
                                    </tr>
                                    <tr>
                                        <td>Hombres 55 a m&aacute;s </td>
                                        <td><?php echo $anio55_m[0]->total;?></td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL </td>
                                        <td><?php echo $anio18_24_m[0]->total+$anio25_34_m[0]->total+$anio35_44_m[0]->total+$anio45_54_m[0]->total+$anio55_m[0]->total;?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Mujeres terminaron el juego</td>
                            <td><?php echo $terminado_f[0]->total;?></td>
                        </tr>
                        <tr>
                            <td>
                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                    <tr>
                                        <td>Mujeres 18 a 24 </td>
                                        <td><?php echo $anio18_24_f[0]->total;?></td>
                                    </tr>
                                    <tr>
                                        <td>Mujeres 25 a 34 </td>
                                        <td><?php echo $anio25_34_f[0]->total;?></td>
                                    </tr>
                                    <tr>
                                        <td>Mujeres 35 a 44 </td>
                                        <td><?php echo $anio35_44_f[0]->total;?></td>
                                    </tr>
                                    <tr>
                                        <td>Mujeres 45 a 54 </td>
                                        <td><?php echo $anio45_54_f[0]->total;?></td>
                                    </tr>
                                    <tr>
                                        <td>Mujeres 55 a m&aacute;s </td>
                                        <td><?php echo $anio55_f[0]->total;?></td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL </td>
                                        <td><?php echo $anio18_24_f[0]->total+$anio25_34_f[0]->total+$anio35_44_f[0]->total+$anio45_54_f[0]->total+$anio55_f[0]->total;?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
                <br class="clearIzq" />
            </div>
      </div>
    <!--</form>-->
    <? echo form_close();?>
</div>
