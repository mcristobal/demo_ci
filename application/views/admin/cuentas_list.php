<div id="web_dinamico">
   <?php
        $atributos = array('name' => 'frm_list_cuentas', 'id' => 'frm_list_cuentas');
        echo form_open('admin/cuentas/index',$atributos);
   ?>
    <input type="hidden" value="<?php echo site_url()."admin/cuentas";?>" id="id_listado_url" />
    <input type="hidden" value="<?php echo site_url();?>admin/cuentas/delete_seleccionado" id="id_seleccionar_todos" />
    
        <div id="web_moduloInterno">
            <div id="web_moduloCabecera">
                <h3>cuentas</h3>
                <h4>LISTADO</h4>
            </div>
            <div id="web_moduloContenido">
                <div class="web_moduloBotones">
                    <a href="<?php echo site_url("admin/cuentas/exportar");?>" class="web_boton1 ">Exportar</a>
                </div>
                <div id="web_moduloFiltros">
                    <label class="label1">Filtrar por: </label>
                    <input type="text" id="txt_buscar" name="txt_buscar" class="inputText1" />
                    <a href="#buscar" class="web_boton1 id_buscar">BUSCAR</a>
                    <a href="<?php echo site_url("admin/cuentas");?>" onclick="this.href" class="web_boton1">TODOS</a>
                </div>
                <div id="web_moduloListadoRegistros">
                    <table cellspacing="0" summary="registros" class="web_tableRegistros" id="id_tabla_listado">
                        <tr class="web_trCabecera">
                            <th class="web_thColumna2">N° cuenta</th>
                            <th class="web_thColumna1">Apellido</th>
                            <th class="web_thColumna1">Nombre</th>                            
                            <th class="web_thColumna2">N° Tarjeta</th>
                            <th class="web_thColumna2">Tipo</th>
                            <th class="web_thColumna1">Estado</th>
                            <th class="web_thColumna1">Correo</th>
                            <th class="web_thColumna1">Est. de Cta</th>
                            <th class="web_thColumna5" >Opciones</th>
                            <th class="web_thColumna1">F-participación</th>
                        </tr>
                        <?php foreach($cuentas as $cuentas): ?>
                        <tr class="web_trFilaRegistros1">                            
                            <td><?php echo $cuentas->nro_cuenta;?></td>
                            <td><?php echo $cuentas->apellidos;?></td>
                            <td><?php echo $cuentas->nombres;?></td>                            
                            <td><?php echo $cuentas->nro_tarjeta;?></td>
                            <td><?php echo $cuentas->tipo_tarjeta;?></td>
                            <td><?php
                                if ($cuentas->estado == 1){
                                    echo 'SIN CONFIRMAR';
                                }else{
                                    echo 'CONFIRMADO';
                                }
                                ?></td>
                            <td><?php echo $cuentas->txt_email;?></td>
                            <td align="center"><?php if($cuentas->estado_correo== 1){
                                        echo 'ACEPTO';
                            }else{
                                        echo 'NO ACEPTO';
                            };?></td>
                            <td align="center"><?php echo $cuentas->int_opcion;?></td>
                            <td align="center"><?php echo $cuentas->fecha_p;?></td>
                        </tr>
                        <?php endforeach;?>

                    </table>
                </div>
                <div id="web_moduloPaginacion">
                    <p><?php if(isset($pagination)) echo $pagination; ?></p>
                </div>
                <div class="web_moduloBotones">
                    <a href="<?php echo site_url("admin/cuentas/exportar");?>" class="web_boton1 ">Exportar</a>
                </div>
                <br class="clearIzq" />
            </div>
      </div>
    <? echo form_close();?>
</div>

