<?php
/*****
* Generator Controlers MC v.1.0
* DATE: 13/09/2010
* Phantasia tribal DDB.
* Proyecto
* V. 1.0
* Iniciado: 04/11/2011
******/
class Sorteo extends Controller {
   public function sorteo(){
        parent::Controller();
        $this->load->model("tbl_juego_model","obj_juego_hijo");

        $this->template->set_template("default");        
        $this->template->add_js("js/jquery.js");
		
        $this->template->add_js("js/listado.js");
	
        $this->template->add_css("styles/maq.css");
        $this->template->add_css("styles/web.css");
        $this->template->write_view("region_usuario", "admin/home/layout_body_usuario", array(), TRUE);
        $this->template->write_view("region_modulo", "admin/home/layout_body_modulo", array(), TRUE);
        $this->load->library("session");
    }

   public function index(){
        $data['obj_lima'] = $this->obj_juego_hijo->sorteo_lima();
        $data['obj_lima_suplente'] = $this->obj_juego_hijo->sorteo_lima();

        $data['obj_chiclayo'] = $this->obj_juego_hijo->sorteo_chiclayo();
        $data['obj_chiclayo_suplente'] = $this->obj_juego_hijo->sorteo_chiclayo();

        $data['obj_piura'] = $this->obj_juego_hijo->sorteo_piura();
        $data['obj_piura_suplente'] = $this->obj_juego_hijo->sorteo_piura();

        $data['obj_chimbote'] = $this->obj_juego_hijo->sorteo_chimbote();
        $data['obj_chimbote_suplente'] = $this->obj_juego_hijo->sorteo_chimbote();

        $data['obj_iquitos'] = $this->obj_juego_hijo->sorteo_iquitos();
        $data['obj_iquitos_suplente'] = $this->obj_juego_hijo->sorteo_iquitos();

        $data['obj_pucallpa'] = $this->obj_juego_hijo->sorteo_pucallpa();
        $data['obj_pucallpa_suplente'] = $this->obj_juego_hijo->sorteo_pucallpa();

        $data['obj_huancayo'] = $this->obj_juego_hijo->sorteo_huancayo();
        $data['obj_huancayo_suplente'] = $this->obj_juego_hijo->sorteo_huancayo();

        $data['obj_cusco'] = $this->obj_juego_hijo->sorteo_cusco();
        $data['obj_cusco_suplente'] = $this->obj_juego_hijo->sorteo_cusco();

        
        
        if($this->session->userdata("nombre")) {            
            $this->template->write_view("region_contenido", "admin/sorteo_list", $data, TRUE);
            $this->template->render();
        }else {
            redirect("admin/login");
        }
    }

    public function exportar($data){       
        $this->load->view("admin/exportar",$data);
    }

    public function demo(){
        header('Content-type: text/html; charset=utf-8');
        header("Content-Type: application/vnd.ms-excel; name='excel'");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=ganadores.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo utf8_decode($this->input->post('datos_a_enviar'));
             
    }
}
?>