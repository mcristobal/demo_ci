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

class inscritos_model extends Model{
    public function __construct(){
        parent::Model();        
        $this->load->model("base/Base_inscritos_model","obj_inscritos");
    }

    public function login($dni,$fecha_nacimiento){
        $this->db_pilsen = $this->load->database('pilsen', TRUE);
        $this->db_pilsen->select('num_doc,fec_nac');
        $this->db_pilsen->where('num_doc', $dni);
        $this->db_pilsen->where('date(fec_nac)', $fecha_nacimiento);
        $this->db_pilsen->from('inscritos');
        $query = $this->db_pilsen->get();
        $dato = $query->result();        
        return $dato;
    }

    public function search_dni($dni){
        $this->db_pilsen = $this->load->database('pilsen', TRUE);        
        $this->db_pilsen->select('num_doc');
        $this->db_pilsen->where('num_doc',$dni);
        $this->db_pilsen->from('inscritos');
        $query = $this->db_pilsen->get();
        $dato = $query->result();
        return $dato;
    }
     public function search_email($email){
        $this->db_pilsen = $this->load->database('pilsen', TRUE);
        $this->db_pilsen->select('email');
        $this->db_pilsen->where('email',$email);
        $this->db_pilsen->from('inscritos');
        $query = $this->db_pilsen->get();
        $dato = $query->result();
        return $dato;
    }

    public function nuevos_registrados(){
        $this->db_pilsen = $this->load->database('pilsen', TRUE);
        $this->db_pilsen->select('count(dni) as tot_nuevos');
        $this->db_pilsen->where('id_promo = 15 and nuevo = 1');
        $this->db_pilsen->from('promociones_inscritos');
        $query = $this->db_pilsen->get();
        $dato = $query->result();
        return $dato;
    }

    public function antiguos_registrados(){
        $this->db_pilsen = $this->load->database('pilsen', TRUE);
        $this->db_pilsen->select('count(dni) as tot_antiguos');
        $this->db_pilsen->where('id_promo = 15 and nuevo = 0');
        $this->db_pilsen->from('promociones_inscritos');
        $query = $this->db_pilsen->get();
        $dato = $query->result();
        return $dato;
    }

    public function tot_nivel_terminado(){
        $this->db_galvez = $this->load->database('galvez', TRUE);
        $query = $this->db_galvez->query("
        select count(dni) as total
        from
        (select
            db_busca_galvez.tbl_juego.dni as dni
        from db_busca_galvez.tbl_juego
        inner join db_pilsencallao.inscritos on db_pilsencallao.inscritos.num_doc =  db_busca_galvez.tbl_juego.dni
        where db_busca_galvez.tbl_juego.int_nivel = 6 and db_busca_galvez.tbl_juego.int_estado = 1

        GROUP BY db_busca_galvez.tbl_juego.dni) tmp
                                  ");
        $dato = $query->result();
        return $dato;
    }

    public function dni_nivel_terminado(){
        $this->db_galvez = $this->load->database('galvez', TRUE);
        $query = $this->db_galvez->query("
        select
            db_busca_galvez.tbl_juego.dni as dni
        from db_busca_galvez.tbl_juego
        inner join db_pilsencallao.inscritos on db_pilsencallao.inscritos.num_doc =  db_busca_galvez.tbl_juego.dni
        where db_busca_galvez.tbl_juego.int_nivel = 6 and db_busca_galvez.tbl_juego.int_estado = 1

        GROUP BY db_busca_galvez.tbl_juego.dni
                                  ");
        $dato = $query->result();
        return $dato;
    }


    public function tot_nivel_terminado_sexo($sexo){
        $this->db_galvez = $this->load->database('galvez', TRUE);
        $query = $this->db_galvez->query("
        select count(dni) as total
        from
        (select
        db_pilsencallao.inscritos.num_doc,
        db_pilsencallao.inscritos.sexo,
        db_busca_galvez.tbl_juego.dni as dni
        from db_busca_galvez.tbl_juego
        inner join db_pilsencallao.inscritos on db_pilsencallao.inscritos.num_doc =  db_busca_galvez.tbl_juego.dni
        where db_busca_galvez.tbl_juego.int_nivel = 6 and db_busca_galvez.tbl_juego.int_estado = 1
        and db_pilsencallao.inscritos.sexo = '$sexo'

        GROUP BY db_busca_galvez.tbl_juego.dni) tmp
                                  ");
        $dato = $query->result();
        return $dato;
    }
    
    public function tot_nivel_terminado_edad($desde,$hasta,$sexo){
        $this->db_galvez = $this->load->database('galvez', TRUE);
        $query = $this->db_galvez->query("
        Select count(dni) as total
                from (
                select
                db_pilsencallao.inscritos.num_doc,
                db_pilsencallao.inscritos.sexo,
                db_pilsencallao.inscritos.fec_nac,
                db_busca_galvez.tbl_juego.dni as dni
                from db_busca_galvez.tbl_juego
                inner join db_pilsencallao.inscritos on db_pilsencallao.inscritos.num_doc =  db_busca_galvez.tbl_juego.dni
                where db_busca_galvez.tbl_juego.int_nivel = 6 and db_busca_galvez.tbl_juego.int_estado = 1
                and db_pilsencallao.inscritos.sexo = '$sexo'

                AND db_pilsencallao.inscritos.fec_nac >= '".$desde."-01-01'
                AND db_pilsencallao.inscritos.fec_nac <= '".$hasta."-12-31'

                GROUP BY db_busca_galvez.tbl_juego.dni
                )tmp
              ");
        $dato = $query->result();
        return $dato;
    }

   public function participantes_edad($desde,$hasta){
       $where  = "id_promo = 15 and inscritos.fec_nac >= '".$desde."-01-01' and inscritos.fec_nac <= '".$hasta."-12-31'";
       $this->db_pilsen = $this->load->database('pilsen', TRUE);
        $this->db_pilsen->select('count(dni) as dni ');
        $this->db_pilsen->where($where);
        $this->db_pilsen->from('promociones_inscritos');
        $this->db_pilsen->join('inscritos','inscritos.num_doc = promociones_inscritos.dni');

        $query = $this->db_pilsen->get();
        $dato = $query->result();
        return $dato;
   }

   public function participantes_sexo($sexo){
        $where  = "id_promo = 15 and inscritos.sexo = '$sexo'";
        $this->db_pilsen = $this->load->database('pilsen', TRUE);
        $this->db_pilsen->select('count(dni) as dni ');
        $this->db_pilsen->where($where);
        $this->db_pilsen->from('promociones_inscritos');
        $this->db_pilsen->join('inscritos','inscritos.num_doc = promociones_inscritos.dni');

        $query = $this->db_pilsen->get();
        $dato = $query->result();
        return $dato;
   }

   public function participante_departamento($id){       
        $where  = "id_promo = 15 and inscritos.ubigeo like '$id%'";
        $this->db_pilsen = $this->load->database('pilsen', TRUE);
        $this->db_pilsen->select('count(dni) as total ');
        $this->db_pilsen->where($where);
        $this->db_pilsen->from('inscritos');
        $this->db_pilsen->join('promociones_inscritos','promociones_inscritos.dni = inscritos.num_doc');
        $this->db_pilsen->join('ubigeo','ubigeo.id = inscritos.ubigeo');
        $query = $this->db_pilsen->get();       
        $dato = $query->result();
        return $dato;
   }
    	
} //FIN DEL MODELO EXTENDIDO
?>