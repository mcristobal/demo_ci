<?php
/*****
* Generator Controlers MC v.1.0
* DATE: 13/09/2010
* Phantasia tribal DDB.
* Proyecto
* V. 1.0
* Iniciado: 04/11/2011
******/
class Ociones extends Controller {
    function ociones(){
        parent::Controller();
        $this->load->model("promociones_model","obj_ociones_hijo");

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
        $this->obj_ociones->obj_campos_mostrar->seleccionar();
	$this->obj_ociones->obj_orden->agregar_orden();
	$this->obj_ociones->obj_condiciones->agregar_condicion();

        /* CONFIGURANDO LA PAGINACION*/
        $config["base_url"] = trim(site_url(), "/") . "/admin/ociones/index/";
        $config["total_rows"] = $this->obj_ociones->total_records();
        $config["per_page"] = "10";
        $config["uri_segment"] = 4;
        $config["num_links"] = 3;        
        $this->pagination->initialize($config);
        $data["pagination"] = $this->pagination->create_links();
	$data["ociones"] = $this->obj_ociones->search_data($config["per_page"],$this->uri->segment($config["uri_segment"], 0));

        /*LLAMANDO A LA VISTA*/

        if($this->session->userdata("nombre")) {
            $this->template->write_view("region_contenido", "admin/ociones_list", $data, TRUE);
            $this->template->render();
        }else {
            redirect("admin/login");
        }

        
    }

    function load(){

        $data["ociones"][0] = $this->obj_ociones->obj_campos;        
        $arr_url = $this->uri->uri_to_assoc(2);
        $pk_ociones = count($arr_url)==2?$arr_url["id"]:"";

        if ($pk_ociones != ""){
            $this->obj_ociones->obj_condiciones->agregar_condicion("pk_ociones=");
            $data["ociones"] = $this->obj_ociones->search();
        }        
        if($this->session->userdata("nombre")) {
            $this->template->write_view("region_contenido", "admin/ociones_list", $data, TRUE);
            $this->template->render();
        }else {
            redirect("admin/login");
        }
    }

    function validate(){
        $pk_ociones = $this->input->post("pk_ociones");

        $this->form_validation->set_rules('name','','required|trim');
	$this->form_validation->set_rules('fecha_inicio','','required|trim');
	$this->form_validation->set_rules('fecha_fin','','required|trim');
	
$this->form_validation->set_message('required','Debe introducir el campo %s');
            
        if ($this->form_validation->run()== FALSE){
            $data["ociones"][0] = $this->obj_ociones->obj_campos;
            $this->template->write_view("region_contenido", "admin/ociones_form", $data, TRUE);
            $this->template->render();
        }else{
            $data = array(
                'name' => $this->input->post('name'),
	'fecha_inicio' => $this->input->post('fecha_inicio'),
	'fecha_fin' => $this->input->post('fecha_fin')
            );
            if ($pk_ociones != ""){
                $this->obj_ociones->update($pk_ociones, $data);
            }else{
                $this->obj_ociones->insert($data);                
            }
            $_POST=NULL;
            redirect("admin/home");
        }
    }

    function delete(){        
        $arr_url = $this->uri->uri_to_assoc(2);
        $pk_ociones = count($arr_url)==2?$arr_url["id"]:"";

        if ($pk_ociones != ""){
            $this->obj_ociones->delete($pk_ociones);
        }
        /*LLAMANDO A LA VISTA*/
        $this->index();
    }

    function delete_seleccionado(){
        $check =  $this->input->post("grupo_check");
        if (count($check)>= 0 and $check[0] != "" ){
            $this->obj_ociones->delete_seleccionado($check);
            redirect("admin/home");
        }else{
            redirect("admin/home");
        }
    }


}
?>