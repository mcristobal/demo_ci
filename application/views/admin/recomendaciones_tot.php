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
                    <table cellspacing="0" summary="registros" class="web_tableRegistros" id="id_tabla_listado">
                        <tr class="web_trCabecera">                            
                            <th class="web_thColumna4">DNI</th>
                            <th class="web_thColumna1">Nombre</th>
                            <th class="web_thColumna1">Apellido</th>
                            <th class="web_thColumna1">Veces</th>                            
                        </tr>
                        <?php 
                        $sum_tot = 0;
                        foreach($obj_recomendaciones as $obj_recomendaciones):
                                $sum_tot = $obj_recomendaciones->veces + $sum_tot ;
                            ?>
                        <tr class="web_trFilaRegistros1">
                            <td class="web_tdCheck1"><?php echo $obj_recomendaciones->int_dni;?></td>
                            <td><?php echo $obj_recomendaciones->nombres;?></td>
                            <td><?php echo $obj_recomendaciones->apellido_paterno." ".$obj_recomendaciones->apellido_materno;?></td>
                            <td><?php echo $obj_recomendaciones->veces;?></td>                            
                        </tr>
                        <?php endforeach;?>
                        <tr class="web_trCabecera">
                            <th class="web_total_recomendaciones" colspan="3">TOTAL RECOMENDACIONES</th>
                            <th class="web_thColumna1" ><?php echo $sum_tot?></th>
                        </tr>
                    </table>
                </div>                                
                <br class="clearIzq" />
            </div>
      </div>
    <!--</form>-->
    <? echo form_close();?>
</div>
