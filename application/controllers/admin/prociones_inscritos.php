<?php
/*****
* Generator Controlers MC v.1.0
* DATE: 13/09/2010
* Phantasia tribal DDB.
* Proyecto
* V. 1.0
* Iniciado: 04/11/2011
******/
class Ociones_inscritos extends Controller {
    function ociones_inscritos(){
        parent::Controller();
        $this->load->model("promociones_inscritos_model","obj_ociones_inscritos_hijo");

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
        $this->obj_ociones_inscritos->obj_campos_mostrar->seleccionar();
	$this->obj_ociones_inscritos->obj_orden->agregar_orden();
	$this->obj_ociones_inscritos->obj_condiciones->agregar_condicion();

        /* CONFIGURANDO LA PAGINACION*/
        $config["base_url"] = trim(site_url(), "/") . "/admin/ociones_inscritos/index/";
        $config["total_rows"] = $this->obj_ociones_inscritos->total_records();
        $config["per_page"] = "10";
        $config["uri_segment"] = 4;
        $config["num_links"] = 3;        
        $this->pagination->initialize($config);
        $data["pagination"] = $this->pagination->create_links();
	$data["ociones_inscritos"] = $this->obj_ociones_inscritos->search_data($config["per_page"],$this->uri->segment($config["uri_segment"], 0));

        /*LLAMANDO A LA VISTA*/

        if($this->session->userdata("nombre")) {
            $this->template->write_view("region_contenido", "admin/ociones_inscritos_list", $data, TRUE);
            $this->template->render();
        }else {
            redirect("admin/login");
        }

        
    }

    function load(){

        $data["ociones_inscritos"][0] = $this->obj_ociones_inscritos->obj_campos;        
        $arr_url = $this->uri->uri_to_assoc(2);
        $pk_ociones_inscritos = count($arr_url)==2?$arr_url["id"]:"";

        if ($pk_ociones_inscritos != ""){
            $this->obj_ociones_inscritos->obj_condiciones->agregar_condicion("pk_ociones_inscritos=");
            $data["ociones_inscritos"] = $this->obj_ociones_inscritos->search();
        }        
        if($this->session->userdata("nombre")) {
            $this->template->write_view("region_contenido", "admin/ociones_inscritos_list", $data, TRUE);
            $this->template->render();
        }else {
            redirect("admin/login");
        }
    }

    function validate(){
        $pk_ociones_inscritos = $this->input->post("pk_ociones_inscritos");

        $this->form_validation->set_rules('edad','','required|trim');
	$this->form_validation->set_rules('fecha_registro','','required|trim');
	$this->form_validation->set_rules('fecha_act_registro','','required|trim');
	$this->form_validation->set_rules('id_promo','','required|trim');
	$this->form_validation->set_rules('nuevo','','required|trim');
	$this->form_validation->set_rules('veces','','required|trim');
	$this->form_validation->set_rules('trivia_preg_correctas','','required|trim');
	$this->form_validation->set_rules('gano_caja','','required|trim');
	$this->form_validation->set_rules('fecha_gano','','required|trim');
	$this->form_validation->set_rules('jugo','','required|trim');
	$this->form_validation->set_rules('code','','required|trim');
	$this->form_validation->set_rules('use_code','','required|trim');
	
$this->form_validation->set_message('required','Debe introducir el campo %s');
            
        if ($this->form_validation->run()== FALSE){
            $data["ociones_inscritos"][0] = $this->obj_ociones_inscritos->obj_campos;
            $this->template->write_view("region_contenido", "admin/ociones_inscritos_form", $data, TRUE);
            $this->template->render();
        }else{
            $data = array(
                'edad' => $this->input->post('edad'),
	'fecha_registro' => $this->input->post('fecha_registro'),
	'fecha_act_registro' => $this->input->post('fecha_act_registro'),
	'id_promo' => $this->input->post('id_promo'),
	'nuevo' => $this->input->post('nuevo'),
	'veces' => $this->input->post('veces'),
	'trivia_preg_correctas' => $this->input->post('trivia_preg_correctas'),
	'gano_caja' => $this->input->post('gano_caja'),
	'fecha_gano' => $this->input->post('fecha_gano'),
	'jugo' => $this->input->post('jugo'),
	'code' => $this->input->post('code'),
	'use_code' => $this->input->post('use_code')
            );
            if ($pk_ociones_inscritos != ""){
                $this->obj_ociones_inscritos->update($pk_ociones_inscritos, $data);
            }else{
                $this->obj_ociones_inscritos->insert($data);                
            }
            $_POST=NULL;
            redirect("admin/home");
        }
    }

    function delete(){        
        $arr_url = $this->uri->uri_to_assoc(2);
        $pk_ociones_inscritos = count($arr_url)==2?$arr_url["id"]:"";

        if ($pk_ociones_inscritos != ""){
            $this->obj_ociones_inscritos->delete($pk_ociones_inscritos);
        }
        /*LLAMANDO A LA VISTA*/
        $this->index();
    }

    function delete_seleccionado(){
        $check =  $this->input->post("grupo_check");
        if (count($check)>= 0 and $check[0] != "" ){
            $this->obj_ociones_inscritos->delete_seleccionado($check);
            redirect("admin/home");
        }else{
            redirect("admin/home");
        }
    }


}
?>