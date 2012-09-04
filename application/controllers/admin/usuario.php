<?php
/*****
* Generator Controlers MC v.1.0
* DATE: 13/09/2010
* Phantasia tribal DDB.
* Proyecto
* V. 1.0
* Iniciado: 26/10/2010
******/
class Usuario extends Controller {
    function usuario(){
        parent::Controller();
        $this->load->model("tbl_usuario_model","obj_usuario_hijo");
		
		$this->template->set_template("default");
        $this->template->add_js("js/DD_belatedPNG_0.0.8a-min.js");
        $this->template->add_js("js/jquery.js");
        $this->template->add_js("js/menu.js");
        $this->template->add_js("js/mas_datos.js");
        $this->template->add_css("styles/maq.css");
        $this->template->add_css("styles/web.css");
        $this->template->write_view("region_usuario", "admin/home/layout_body_usuario", array(), TRUE);
        $this->template->write_view("region_modulo", "admin/home/layout_body_modulo", array(), TRUE);
		$this->load->library('session');
    }

    function index(){
        $txt_buscar = $this->input->post("txt_buscar");

        /* CREACION DE LA CONSULTA SQL*/
        $this->obj_usuario->obj_campos_mostrar->seleccionar("pk_usuario,txt_login,txt_correo");
		$this->obj_usuario->obj_orden->agregar_orden("txt_nombre ASC");
		$this->obj_usuario->obj_condiciones->agregar_condicion("txt_nombre like '%".$txt_buscar."%' or txt_correo like '%".$txt_buscar."%'");

        /* CONFIGURANDO LA PAGINACION*/
        $config["base_url"] = trim(site_url(), "/") . "/admin/usuario/index/";
        $config["total_rows"] = $this->obj_usuario->total_records();
        $config["per_page"] = "10";
        $config["uri_segment"] = 4;
        $config["num_links"] = 3;        
        $this->pagination->initialize($config);
        $data["pagination"] = $this->pagination->create_links();
	$data["usuario"] = $this->obj_usuario->search_data($config["per_page"],$this->uri->segment($config["uri_segment"], 0));

        /*LLAMANDO A LA VISTA*/
        //$this->load->view("admin/usuario_list", $data);
		
		if($this->session->userdata('nombre')) {
		$this->template->write_view("region_contenido", "admin/usuario_list", $data, TRUE);
		$this->template->render();
		}else {
		   redirect('admin/login');   
		   }
    }

    function load(){

        $data["usuario"][0] = $this->obj_usuario->obj_campos;        
        $arr_url = $this->uri->uri_to_assoc(2);
        $pk_usuario = count($arr_url)==2?$arr_url["id"]:"";

        if ($pk_usuario != ""){
            $this->obj_usuario->obj_condiciones->agregar_condicion("pk_usuario ='".$pk_usuario."'");
            $data["usuario"] = $this->obj_usuario->search();
        }
        //$this->load->view("admin/usuario_form",$data);
		if($this->session->userdata('nombre')) {
		$this->template->write_view("region_contenido", "admin/usuario_form", $data, TRUE);
		$this->template->render();
		}else {
		   redirect('admin/login');   
		   }
    }

    function validate(){
        $pk_usuario = $this->input->post("pk_usuario");

        $this->form_validation->set_rules('txt_nombre', 'required|trim');
		$this->form_validation->set_rules('txt_login', 'required|trim');
		$this->form_validation->set_rules('txt_pass', 'required|trim');
		$this->form_validation->set_rules('txt_estado', 'required|trim');
		$this->form_validation->set_rules('txt_correo', 'required|trim');
	
		$this->form_validation->set_message('required','Debe introducir el campo %s');
            
        if ($this->form_validation->run()== FALSE){
            //$this->load->view("admin/usuario_form",$data);
			if($this->session->userdata('nombre')) {
			$this->template->write_view("region_contenido", "admin/usuario_form", $data, TRUE);
            $this->template->render();
			}else {
		   redirect('admin/login');   
		   }
        }else{
            $data = array(
                'txt_nombre' => $this->input->post('txt_nombre'),
				'txt_login' => $this->input->post('txt_login'),
				'txt_pass' => $this->input->post('txt_pass'),
				//'txt_estado' => $this->input->post('txt_estado'),
				'txt_estado' => '1',
				'txt_correo' => $this->input->post('txt_correo')
						);
            if ($pk_usuario != ""){
                $this->obj_usuario->update($pk_usuario, $data);
            }else{
                $this->obj_usuario->insert($data);                
            }
           // $this->load->view("admin/usuario_exito");
		   
		   $this->index();
        }
    }

    function delete(){
       // $data["usuario"][0] = $this->obj_usuario->$obj_campos;
        $arr_url = $this->uri->uri_to_assoc(2);
        $pk_usuario = count($arr_url)==2?$arr_url["id"]:"";

        if ($pk_usuario != ""){
            $this->obj_usuario->delete($pk_usuario);
        }
		$this->index();
    }

    function delete_seleccionado(){
        $check =  $this->input->post('grupo_check');
        if (count($check)>= 0 and $check[0] != "" ){
            $this->obj_lineas->delete_seleccionado($check);
            $this->index();
        }else{
            echo "debe seleccionar mas de uno 1";
           /// $this->index();
        }
    }


}
?>