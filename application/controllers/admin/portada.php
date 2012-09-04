<?php
/*****
* Generator Controlers MC v.1.0
* DATE: 13/09/2010
* Phantasia tribal DDB.
* Proyecto
* V. 1.0
* Iniciado: 04/11/2010
******/
class Portada extends Controller {
    function portada(){
        parent::Controller();
        $this->load->model("tbl_portada_model","obj_portada_hijo");

        $this->template->set_template("default");
        $this->template->add_js("js/DD_belatedPNG_0.0.8a-min.js");
        $this->template->add_js("js/jquery.js");
        $this->template->add_js("js/menu.js");
        $this->template->add_js("js/mas_datos.js");
        $this->template->add_css("styles/maq.css");
        $this->template->add_css("styles/web.css");
        $this->template->write_view("region_usuario", "admin/home/layout_body_usuario", array(), TRUE);
        $this->template->write_view("region_modulo", "admin/home/layout_body_modulo", array(), TRUE);
    }

    function index(){
        $txt_buscar = $this->input->post("txt_buscar");

        /* CREACION DE LA CONSULTA SQL*/
       /* $this->obj_portada->obj_campos_mostrar->seleccionar();
	$this->obj_portada->obj_orden->agregar_orden();
	$this->obj_portada->obj_condiciones->agregar_condicion();*/

        /* CONFIGURANDO LA PAGINACION*/
        $config["base_url"] = trim(site_url(), "/") . "/admin/portada/index/";
        $config["total_rows"] = $this->obj_portada->total_records();
        $config["per_page"] = "10";
        $config["uri_segment"] = 4;
        $config["num_links"] = 3;        
        $this->pagination->initialize($config);
        $data["pagination"] = $this->pagination->create_links();
	$data["portada"] = $this->obj_portada->search_data($config["per_page"],$this->uri->segment($config["uri_segment"], 0));

        /*LLAMANDO A LA VISTA*/
        $this->template->write_view("region_contenido", "admin/portada_list", $data, TRUE);
	$this->template->render();
    }

    function load(){

        $data["portada"][0] = $this->obj_portada->obj_campos;        
        $arr_url = $this->uri->uri_to_assoc(2);
        $pk_portada = count($arr_url)==2?$arr_url["id"]:"";

        if ($pk_portada != ""){
            $this->obj_portada->obj_condiciones->agregar_condicion("pk_portada ='".$pk_portada."'");
            $data["portada"] = $this->obj_portada->search();
        }        
        $this->template->write_view("region_contenido", "admin/portada_form", $data, TRUE);
	$this->template->render();
    }

    function validate(){
        $pk_portada = $this->input->post("pk_portada");

        /*$this->form_validation->set_rules('txt_foto','','required|trim');
	
        $this->form_validation->set_message('required','Debe introducir el campo %s');
       
        if ($this->form_validation->run()== FALSE){
            $data["portada"][0] = $this->obj_portada->obj_campos;
            $this->template->write_view("region_contenido", "admin/portada_form", $data, TRUE);
            $this->template->render();
        }else{*/
           
            $config['upload_path'] = './uploads/portada/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '200';
            $config['max_width']  = '960';
            $config['max_height']  = '505';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('txt_foto')){
               $foto = array('upload_data' => $this->upload->data());
               $foto_nombre =  $foto['upload_data']['file_name'];
            }else{
               $foto_nombre =  $this->input->post('txt_foto');
            }

            $data = array(
                'txt_foto' => $foto_nombre
            );
            if ($pk_portada != ""){
                $this->obj_portada->update($pk_portada, $data);
            }else{
                $this->obj_portada->insert($data);                
            }
            $this->index();
        //}
    }

    function delete(){        
        $arr_url = $this->uri->uri_to_assoc(2);
        $pk_portada = count($arr_url)==2?$arr_url["id"]:"";

        if ($pk_portada != ""){
            $this->obj_portada->delete($pk_portada);
        }
        /*LLAMANDO A LA VISTA*/
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