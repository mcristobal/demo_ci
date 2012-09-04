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

class promociones_inscritos_model extends Model{
    function __construct(){
        parent::Model();
        $this->load->model("base/Base_promociones_inscritos_model","obj_prociones_inscritos");
    }

    public function search_user_promo($dni){        
        $this->db_pilsen = $this->load->database('pilsen', TRUE);
        $this->db_pilsen->select('dni, id_promo');
        $this->db_pilsen->where('dni',$dni);
        $this->db_pilsen->where('id_promo','15');
        $this->db_pilsen->from('promociones_inscritos');
        $query = $this->db_pilsen->get();
        $dato = $query->result();
        return $dato;
    }
	
} //FIN DEL MODELO EXTENDIDO
?>