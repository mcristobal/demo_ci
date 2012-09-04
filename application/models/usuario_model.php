<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.   
 */
class Usuario_model extends Model{
    function __construct(){
        parent::__construct();        
    }

    function verificar_login($txt_usuario){
        $this->db->where('txt_login',$txt_usuario);        
        $query = $this->db->get('tbl_usuario');
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
        $this->db->where('txt_pass',$txt_usuario);
        $query = $this->db->get('tbl_usuario');
        
        if ($query->num_rows > 0){
            foreach($query->result() as $fila){
                $usuario = $fila->pk_usuario;
            }
        }else{    
            $usuario = false;
        }
        return $usuario;
    }
}
?>
