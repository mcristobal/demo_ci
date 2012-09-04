<?php
/*****
* Generator Controlers MC v.1.0
* DATE: 13/09/2010
* Phantasia tribal DDB.
* Proyecto
* V. 1.0
* Iniciado: 04/11/2011
******/
class Juego extends Controller {
    function juego(){
        parent::Controller();
        $this->load->model("tbl_juego_model","obj_juego_hijo");

        $this->template->set_template("default");
        $this->template->add_js("js/DD_belatedPNG_0.0.8a-min.js");
        $this->template->add_js("js/jquery.js");
        $this->template->add_js("js/menu.js");
        $this->template->add_js("js/mas_datos.js");
        $this->template->add_css("styles/maq.css");
        $this->template->add_css("styles/web.css");
        $this->template->write_view("region_usuario", "admin/home/layout_body_usuario", array(), TRUE);
        $this->template->write_view("region_modulo", "admin/home/layout_body_modulo", array(), TRUE);
        $this->load->library("session");
    }

    function index(){
        $txt_buscar = $this->input->post("txt_buscar");

        /* CREACION DE LA CONSULTA SQL*/
        $this->obj_juego->obj_campos_mostrar->seleccionar();
	$this->obj_juego->obj_orden->agregar_orden();
	$this->obj_juego->obj_condiciones->agregar_condicion();

        /* CONFIGURANDO LA PAGINACION*/
        $config["base_url"] = trim(site_url(), "/") . "/admin/juego/index/";
        $config["total_rows"] = $this->obj_juego->total_records();
        $config["per_page"] = "10";
        $config["uri_segment"] = 4;
        $config["num_links"] = 3;        
        $this->pagination->initialize($config);
        $data["pagination"] = $this->pagination->create_links();
	$data["juego"] = $this->obj_juego->search_data($config["per_page"],$this->uri->segment($config["uri_segment"], 0));

        /*LLAMANDO A LA VISTA*/

        if($this->session->userdata("nombre")) {
            $this->template->write_view("region_contenido", "admin/juego_list", $data, TRUE);
            $this->template->render();
        }else {
            redirect("admin/login");
        }

        
    }

    function load(){

        $data["juego"][0] = $this->obj_juego->obj_campos;        
        $arr_url = $this->uri->uri_to_assoc(2);
        $pk_juego = count($arr_url)==2?$arr_url["id"]:"";

        if ($pk_juego != ""){
            $this->obj_juego->obj_condiciones->agregar_condicion("pk_juego=");
            $data["juego"] = $this->obj_juego->search();
        }        
        if($this->session->userdata("nombre")) {
            $this->template->write_view("region_contenido", "admin/juego_list", $data, TRUE);
            $this->template->render();
        }else {
            redirect("admin/login");
        }
    }

    function validate(){
        $pk_juego = $this->input->post("pk_juego");

        $this->form_validation->set_rules('dni','','required|trim');
	$this->form_validation->set_rules('session','','required|trim');
	$this->form_validation->set_rules('int_nivel','','required|trim');
	$this->form_validation->set_rules('time_juego','','required|trim');
	$this->form_validation->set_rules('int_estado','','required|trim');
	$this->form_validation->set_rules('date_registro','','required|trim');
	
$this->form_validation->set_message('required','Debe introducir el campo %s');
            
        if ($this->form_validation->run()== FALSE){
            $data["juego"][0] = $this->obj_juego->obj_campos;
            $this->template->write_view("region_contenido", "admin/juego_form", $data, TRUE);
            $this->template->render();
        }else{
            $data = array(
                'dni' => $this->input->post('dni'),
	'session' => $this->input->post('session'),
	'int_nivel' => $this->input->post('int_nivel'),
	'time_juego' => $this->input->post('time_juego'),
	'int_estado' => $this->input->post('int_estado'),
	'date_registro' => $this->input->post('date_registro')
            );
            if ($pk_juego != ""){
                $this->obj_juego->update($pk_juego, $data);
            }else{
                $this->obj_juego->insert($data);                
            }
            $_POST=NULL;
            redirect("admin/home");
        }
    }

    function delete(){        
        $arr_url = $this->uri->uri_to_assoc(2);
        $pk_juego = count($arr_url)==2?$arr_url["id"]:"";

        if ($pk_juego != ""){
            $this->obj_juego->delete($pk_juego);
        }
        /*LLAMANDO A LA VISTA*/
        $this->index();
    }

    function delete_seleccionado(){
        $check =  $this->input->post("grupo_check");
        if (count($check)>= 0 and $check[0] != "" ){
            $this->obj_juego->delete_seleccionado($check);
            redirect("admin/home");
        }else{
            redirect("admin/home");
        }
    }


}
?>