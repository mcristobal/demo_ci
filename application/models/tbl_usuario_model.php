<?php
/*****
* Generator Class MC v.1.55
* Phantasia tribal DDB.
* Proyecto
* V. 1.0
* Iniciado: 26/10/2010
* Descripcion: Este Modelo controla la tabla de la base de datos con su mismo nombre
******/    

/***
* @EXTIENDE EL MODELO
* Descripcion: se utilizara para nuevas funciones
* Creador: Marco Cristobal D.
* Fecha: 26/10/2010
****/	

class tbl_usuario_model extends Model{
	function __construct(){
        parent::Model();
        $this->load->model("base/Base_tbl_usuario_model","obj_usuario");
        $this->load->library('session');
    }

    function verificar_email($txt_email){
        $this->db_galvez = $this->load->database('galvez', TRUE);
        $this->db_galvez->where('txt_correo',$txt_email);
        $query = $this->db_galvez->get('tbl_usuario');
        if ($query->num_rows > 0){
            foreach($query->result() as $fila){
                $usuario = $fila->pk_usuario;
            }
        }else{
            $usuario = false;
        }
        return $usuario;
    }

    function verificar_password($txt_usuario){
        $this->db_galvez = $this->load->database('galvez', TRUE);
        $this->db_galvez->where('txt_pass',$txt_usuario);
        $query = $this->db_galvez->get('tbl_usuario');
		$usuario = $query->result();
        
		if ( count($usuario) > 0){
        	return $usuario;
        }else{
            $usuario = false;
        }
		
        return $usuario;
    }
	
} //FIN DEL MODELO EXTENDIDO
?>