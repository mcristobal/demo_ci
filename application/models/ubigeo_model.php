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

class ubigeo_model extends Model{
    public function __construct(){
        parent::Model();
        $this->load->model("base/Base_ubigeo_model","obj_eo");
    }
    
    public function departamento(){
        $this->db_pilsen = $this->load->database('pilsen', TRUE);
        $this->db_pilsen->from('ubigeo');
        $this->db_pilsen->where('parent_id');        
        $query = $this->db_pilsen->get();
        $dato = $query->result();
        return $dato;
    }
    
    public function provincia($pk_departamento){
        $this->db_pilsen = $this->load->database('pilsen', TRUE);
        $this->db_pilsen->from('ubigeo');
        $this->db_pilsen->where('parent_id', $pk_departamento);        
        $query = $this->db_pilsen->get();
        $dato = $query->result();
        return $dato;
    }

    public function distrito($pk_provincia){
        $this->db_pilsen = $this->load->database('pilsen', TRUE);
        $this->db_pilsen->from('ubigeo');
        $this->db_pilsen->where('parent_id', $pk_provincia);
        $query = $this->db_pilsen->get();
        $dato = $query->result();
        return $dato;
    }
	
} //FIN DEL MODELO EXTENDIDO
?>