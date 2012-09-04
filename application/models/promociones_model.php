<?php
/*****
* Generator Class MC v.1.55
* Phantasia tribal DDB.
* Proyecto
* V. 1.0
* Iniciado: 04/11/2011
* Descripcion: Este Modelo controla la tabla de la base de datos con su mismo nombre
******/

/***
* @EXTIENDE EL MODELO
* Descripcion: se utilizara para nuevas funciones
* Creador: Marco Cristobal D.   
* Fecha: 04/11/2011
****/	

class promociones_model extends Model{
	function __construct(){
        parent::Model();
        $this->load->model("base/Base_promociones_model","obj_ociones");
    }
	
} //FIN DEL MODELO EXTENDIDO
?>