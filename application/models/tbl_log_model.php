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

class tbl_log_model extends Model{
    public function __construct(){
        parent::Model();
        
        $this->load->model("base/Base_tbl_log_model","obj_log");
        
    }

    public function tot_recomendaciones(){
        $this->db_galvez = $this->load->database('galvez', TRUE);
        $query = $this->db_galvez->query("
       select
           db_pilsencallao.inscritos.num_doc,
           db_pilsencallao.inscritos.nombres,
           db_pilsencallao.inscritos.apellido_paterno,
           db_pilsencallao.inscritos.apellido_materno,
           db_busca_galvez.tbl_log.int_dni,
           db_busca_galvez.tbl_log.int_tipo,
           count(db_busca_galvez.tbl_log.int_dni) as veces
         from db_busca_galvez.tbl_log
         inner join db_pilsencallao.inscritos on db_pilsencallao.inscritos.num_doc =  db_busca_galvez.tbl_log.int_dni
         where db_busca_galvez.tbl_log.int_tipo = 2
         GROUP BY db_busca_galvez.tbl_log.int_dni
                                  ");
        $dato = $query->result();
        return $dato;
    }

    
	
} //FIN DEL MODELO EXTENDIDO
?>