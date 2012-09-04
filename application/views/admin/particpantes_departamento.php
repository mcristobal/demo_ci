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
                            <th class="web_thColumna1">TOTAL DE PARTICPANTES X DEPARTAMENTO</th>
                            <th class="web_thColumna4"><?php echo 
                            $amazonas[0]->total + $ancash[0]->total+$apurimac[0]->total+$arequipa[0]->total+$ayacucho[0]->total+$cajamarca[0]->total+$callao[0]->total+
                            $cusco[0]->total + $huancavelica[0]->total + $huanuco[0]->total + $ica[0]->total + $junin[0]->total + $libertad[0]->total + $lambayeque[0]->total +
                            $lima[0]->total + $loreto[0]->total + $madre_dios[0]->total + $moquegua[0]->total + $pasco[0]->total + $piura[0]->total + $puno[0]->total +
                            $san_martin[0]->total + $tacna[0]->total+$tumbes[0]->total + $ucayali[0]->total
                            ?></th>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Amazonas</td>
                            <td><?php echo $amazonas[0]->total?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Ancash</td>
                            <td><?php echo $ancash[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Apurimac</td>
                            <td><?php echo $apurimac[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Arequipa</td>
                            <td><?php echo $arequipa[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Ayacucho</td>
                            <td><?php echo $ayacucho[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Cajamarca</td>
                            <td><?php echo $cajamarca[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Callao</td>
                            <td><?php echo $callao[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Cusco</td>
                            <td><?php echo $cusco[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Huancavelica</td>
                            <td><?php echo $huancavelica[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Huanuco</td>
                            <td><?php echo $huanuco[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Ica</td>
                            <td><?php echo $ica[0]->total;?></td>
                        </tr>                        
                        <tr class="web_trFilaRegistros1">
                            <td>Junin</td>
                            <td><?php echo $junin[0]->total;?></td>
                        </tr>
                        <!--- ------------------ -->
                        <tr class="web_trFilaRegistros1">
                            <td>La Libertad</td>
                            <td><?php echo $libertad[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Lambayeque</td>
                            <td><?php echo $lambayeque[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Lima</td>
                            <td><?php echo $lima[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Loreto</td>
                            <td><?php echo $loreto[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Madre De Dios</td>
                            <td><?php echo $madre_dios[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Moquegua</td>
                            <td><?php echo $moquegua[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Pasco</td>
                            <td><?php echo $pasco[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Piura</td>
                            <td><?php echo $piura[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>$puno</td>
                            <td><?php echo $puno[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>San Martin</td>
                            <td><?php echo $san_martin[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Tacna</td>
                            <td><?php echo $tacna[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Tumbes</td>
                            <td><?php echo $tumbes[0]->total;?></td>
                        </tr>
                        <tr class="web_trFilaRegistros1">
                            <td>Ucayali</td>
                            <td><?php echo $ucayali[0]->total;?></td>
                        </tr>
                    </table>
                    


                </div>
                <br class="clearIzq" />
            </div>
      </div>
    <!--</form>-->
    <? echo form_close();?>
</div>
