<?php
/*****
* Generator Models MC v.1.0
* DATE: 13/09/2010
* Phantasia tribal DDB.
* Proyecto
* V. 1.0   
* Iniciado: 04/11/2011
* Descripcion: Esta clase controla la tabla de la base de datos con su mismo nombre 
******/

/***
* @Clase auxiliar 
* Descripcion: Define las variables a ser utilizadas por la clase principal
* Creador: Marco Cristobal D.
* Fecha: 04/11/2011
****/
class ubigeo_model_atributos{
	// ********************************
	// @copyright MC
	// declarando variables del Modelo
	var $id='';
	var $name='';
	var $parent_id='';
	
	// ********************************
}

/***
* @Clase auxiliar 
* Descripcion: Define que se va a seleccionar de la tabla y su respectivo alias
* Creador: Marco Cristobal D.
* Fecha: 04/11/2011
****/
class ubigeo_model_seleccion{
	//crear alias a cada campo que se elija para realizar un proceso
	var $arr_campo_seleccionados=NULL;
	function seleccionar($campo, $alias=''){
		$this->arr_campo_seleccionados[]=$campo.' '.$alias;
	}
	function ninguno(){
		$this->arr_campo_seleccionados=NULL;
	}
}

/***
* @Clase auxiliar 
* Descripcion: Define que condiciones se aplicaran a las consultas
* Creador: Marco Cristobal D.
* Fecha: 04/11/2011
****/
class ubigeo_model_condiciones{
	// se agregan condiciones de busqueda a un arreglo
	var $arr_condiciones=NULL;

	function agregar_condicion($condicion){
		$this->arr_condiciones[]=$condicion;
	}
	function borrar_condiciones(){
		$this->arr_condiciones=NULL;
	}
}

/***
* @Clase auxiliar 
* Descripcion: Define que orden de consulta se aplicaran a las consultas
* Creador: Marco Cristobal D.
* Fecha: 04/11/2011
****/
class ubigeo_model_orden{
	// se agregan orden de busqueda a un arreglo
	var $arr_orden=NULL;

	function agregar_orden($campo, $dir=''){
		$this->arr_orden[]=$campo.' '.$dir;
	}
	function ninguno(){
		$this->arr_orden=NULL;
	}
}

/***
* @MODELO PRINCIPAL
* Descripcion: Define que condiciones se aplicaran a las consultas
* Creador: Marco Cristobal D.
* Fecha: 04/11/2011
****/	
class Base_ubigeo_model extends Model {
	
	// ***********************************
	// @copyright MC
	// declarando variables sobre la tabla
	var $tabla = 'ubigeo';
	var $alias_tabla = 'ubigeo';
	var $id_tabla = 'id';
	
        var $obj_campos;
        var $obj_campos_mostrar;
        var $obj_condiciones;
        var $obj_orden;
        var $txt_join_tabla;
        var $txt_join_condicion;
        var $txt_group_by;
        var $arr_join = array();
	// ***********************************
		
  /***
  * Parametro: int $id 
  * Retorna: void
  * Descripcion: Constructor y Selecciona la fila que tiene por llave primaria $id
  * Creador: Marco Cristobal D.
  * Fecha: 04/11/2011
  ****/

  function __construct(){
        parent::Model();
        $this->obj_campos = new ubigeo_model_atributos();
        $this->obj_campos_mostrar = new ubigeo_model_seleccion();
        $this->obj_condiciones = new ubigeo_model_condiciones();
        $this->obj_orden = new ubigeo_model_orden();
        $this->set_join();
        $this->set_group_by();
  }

  /***
  * Parametro: []
  * Retorna: [string]
  * Descripcion: Devuelven los valores de una manera segura GET
  * Creador: Marco Cristobal D.
  * Fecha: 04/11/2011
  ****/
  // **********************************************************
  // @copyright MC
  // crear un get por cada campo, y genera uno auxiliar get_pk()
  function get_pk(){
      $rpta = $this->obj_campos->id;
    if($rpta == "") $rpta = "";
    return $rpta;
  }
  function get_id(){
    return $this->obj_campos->id;
  }
  function get_name(){
    return $this->obj_campos->name;
  }
  function get_parent_id(){
    return $this->obj_campos->parent_id;
  }
      	
  // **********************************************************
  
  
  /***
  * Parametro:  String [$value]
  * Retorna: void
  * Descripcion: Insertar los valores de una manera segura SET
  * Creador: Marco Cristobal D.
  * Fecha: 04/11/2011
  ****/
  // **********************************************************
  // @copyright MC
  // crear un set por cada campo, y genera uno auxiliar set_pk()
  function set_pk($value = ""){
    if($value!="")
      $this->obj_campos->id = $value;
  }
  function set_id($value = ""){
    if($value!="")
      $this->obj_campos->id = $value;
  }
  function set_name($value = ""){
    if($value!="")
      $this->obj_campos->name = $value;
  }
  function set_parent_id($value = ""){
    if($value!="")
      $this->obj_campos->parent_id = $value;
  }
      	
  // **********************************************************
  
  /***
  * Parametro: $test 
  * Retorna: void
  * Descripcion: Insertar los valores que estan en el objeto, a la base de datos.
  * $data: Objeto con los datos q se va insertar.
  * Creador: Marco Cristobal D.
  * Fecha: 04/11/2011
  ****/
  function insert($data){
      $this->db->insert($this->tabla, $data);
  }
		
  /***
  * Parametro: [bool $condicion $test] 
  * Retorna: void
  * Descripcion: si no existen condiciones se procede a actualizar el id correspondiente.
  * $pk: Pk de la tabla.
  * $data: Objeto con los datos q se va insertar.
  * Creador: Marco Cristobal D.
  * Fecha: 04/11/2011
  ****/
  function update($pk, $data){
        $this->db->where($this->id_tabla, $pk);
        $this->db->update($this->tabla, $data);
  }

  /***
  * Parametro: [bool $condicion $test] 
  * Retorna: void
  * Descripcion: si no existen condiciones se procede a eliminar el id correspondiente.
  * $pk: Pk de la tabla.
  * Creador: Marco Cristobal D.
  * Fecha: 04/11/2011
  ****/
  function delete($pk){
        $this->db->where($this->id_tabla, $pk);
        $this->db->delete($this->tabla);
  }

  /* Parametro: [bool $test]
  * Retorna: array
  * Descripcion: Cuenta el total de registros en la consulta.
  * Creador: Marco Cristobal D.
  * Fecha: 04/11/2011
  ****/	  
  function total_records(){

        $aux_campos=$this->obtener_campos();
        if ($aux_campos!=""){$this->db->select($aux_campos);}

        $criterios=$this->obtener_condiciones();
        if($criterios!=""){$this->db->where($criterios);}

        $this->db->from($this->tabla);

        $join=$this->get_join();
        if (count($join)>0){foreach ($join as $rowJoin){$this->db->join($rowJoin["txt_join_tabla"] , $rowJoin["txt_join_condicion"]);}}

        $orderby = $this->get_group_by();
        if ($orderby!=""){$this->db->group_by($orderby);}

        $count = $this->db->count_all_results();

        return $count;
  }
  
  /***
  * Parametro: [bool $test]
  * Retorna: array
  * Descripcion: Realiza un select deacuerdo a condiciones y devuelve un arreglo.
  * $inicio: Inicio del paginado.
  * $num_reg: Numero de registros.
  * Creador: Marco Cristobal D.
  * Fecha: 04/11/2011
  ****/	
  function search_data($inicio,$num_reg){
        $aux_campos=$this->obtener_campos();
        if ($aux_campos!=""){$this->db->select($aux_campos);}

        $criterios=$this->obtener_condiciones();
        if($criterios!=""){$this->db->where($criterios);}

        $this->db->from($this->tabla);

        $join=$this->get_join();
        if (count($join)>0){foreach ($join as $rowJoin){$this->db->join($rowJoin["txt_join_tabla"] , $rowJoin["txt_join_condicion"]);}}

        $orderby = $this->get_group_by();
        if ($orderby!=""){$this->db->group_by($orderby);}

        $query = $this->db->get("",$inicio,$num_reg);
        $dato = $query->result();

        return $dato;
  }

/***
  * Parametro: [bool $test]
  * Retorna: array
  * Descripcion: Realiza un select deacuerdo a condiciones y devuelve un arreglo.
  * Creador: Marco Cristobal D.
  * Fecha: 04/11/2011
  ****/

  function search(){
        $aux_campos=$this->obtener_campos();
        if ($aux_campos!=""){$this->db->select($aux_campos);}

        $criterios=$this->obtener_condiciones();
        if($criterios!=""){$this->db->where($criterios);}

        $this->db->from($this->tabla);

        $join=$this->get_join();
        if (count($join)>0){foreach ($join as $rowJoin){$this->db->join($rowJoin["txt_join_tabla"] , $rowJoin["txt_join_condicion"]);}}

        $orderby = $this->get_group_by();
        if ($orderby!=""){$this->db->group_by($orderby);}

        $query = $this->db->get();
        $dato = $query->result();

        return $dato;
    }
  /***
  * Parametro: ninguno
  * Retorna: string
  * Descripcion: Elimina más de un registro
  * Creador: Marco Cristobal D.
  * Fecha: 04/11/2011
  ****/
  function delete_seleccionado($check){
    $ncheck=count($check);
    for ($i=0; $i < $ncheck; $i++){
        $this->db->where($this->id_tabla, $check[$i]);
        $this->db->delete($this->tabla);
    }
  }

  /***
  * Parametro: ninguno 
  * Retorna: string
  * Descripcion: Realiza una busqueda de los campos seleccionados para la consulta y devuelve una cadena formada
  * Creador: Marco Cristobal D.
  * Fecha: 04/11/2011
  ****/	
  function obtener_campos(){
        $str_campos="";
        if(count($this->obj_campos_mostrar->arr_campo_seleccionados)>0){
            $str_campos= implode(",",$this->obj_campos_mostrar->arr_campo_seleccionados);
        }
        return $str_campos;
  }

  /***
  * Parametro: ninguno 
  * Retorna: string
  * Descripcion: Realiza una busqueda de las condiciones ingresadas para la consulta y devuelve una cadena formada
  * Creador: Marco Cristobal D.
  * Fecha: 04/11/2011
  ****/	
  function obtener_condiciones(){
        $str_condiciones="";
        if(count($this->obj_condiciones->arr_condiciones)>0){
                $str_condiciones=implode(" and ",$this->obj_condiciones->arr_condiciones);
        }
        return $str_condiciones;
  }
  
  
  /***
  * Parametro: ninguno 
  * Retorna: string
  * Descripcion: Realiza una busqueda de los orden ingresados para la consulta y devuelve una cadena formada
  * Creador: Marco Cristobal D.
  * Fecha: 04/11/2011
  ****/	
  function obtener_orden(){
        $str_orden="";
        if(count($this->obj_orden->arr_orden)>0){
                $str_orden=implode(",",$this->obj_orden->arr_orden);
        }
        return $str_orden;
  }
	
  /***
  * Parametro: String [$value] 
  * Retorna: string
  * Descripcion: Metodos para insertar o recuperar una agrupacion
  * Creador: Marco Cristobal D.
  * Fecha: 04/11/2011
  ****/	
  function set_group_by($value=""){
  	$this->txt_group_by=$value;
  }
  
  function get_group_by(){
	return $this->txt_group_by;
  }

  /***
  * Parametro: String [$value] 
  * Retorna: string
  * Descripcion: Metodos para insertar o recuperar un JOIN
  * Creador: Marco Cristobal D.
  * Fecha: 04/11/2011
  ****/	
  function set_join($tabla="", $condicion=""){
        if ($tabla!="" && $condicion!="" ){
             $this->arr_join[] = array("txt_join_tabla"=>$tabla, "txt_join_condicion"=>$condicion );
        }
  }
  
  function get_join(){
	return $this->arr_join;
  }
	
} //FIN DE LA CLASE PRINCIPAL
?>