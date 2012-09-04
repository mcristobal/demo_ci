<?php
/*****
* Generator Controlers MC v.1.0
* DATE: 13/09/2010
* Phantasia tribal DDB.
* Proyecto
* V. 1.0
* Iniciado: 04/11/2011
******/
class Log extends Controller {
    function log(){
        parent::Controller();
        $this->load->model("tbl_log_model","obj_log_hijo");

        $this->template->set_template("default");
        $this->template->add_js("js/DD_belatedPNG_0.0.8a-min.js");
        $this->template->add_js("js/jquery.js");
	$this->template->add_js("js/validar.js");
	$this->template->add_js("js/fx_archivos/shadowbox.js");
        $this->template->add_js("js/fx_archivos/fx_archivos.js");
	$this->template->add_css("js/fx_archivos/shadowbox.css");
	$this->template->add_js("js/jquery.blockUI.js");
	$this->template->add_js("js/jquery.form.js");
        $this->template->add_js("js/listado.js");
        $this->template->add_js("js/mas_datos.js");
	$this->template->add_js("js/bloqueo.js");
        $this->template->add_css("styles/maq.css");
        $this->template->add_css("styles/web.css");
        $this->template->write_view("region_usuario", "admin/home/layout_body_usuario", array(), TRUE);
        $this->template->write_view("region_modulo", "admin/home/layout_body_modulo", array(), TRUE);
        $this->load->library("session");
    }

    function index(){
        $data['obj_recomendaciones'] = $this->obj_log_hijo->tot_recomendaciones();

        if($this->session->userdata("nombre")) {
            $this->template->write_view("region_contenido", "admin/recomendaciones_tot", $data, TRUE);
            $this->template->render();
        }else {
            redirect("admin/login");
        }

        
    }
}
?>