<?php

class Home extends Controller {

	function Home()
	{
		parent::Controller();
                //parent::MY_Controller();
		$this->template->set_template('default');
		$this->template->add_js('js/DD_belatedPNG_0.0.8a-min.js');
		$this->template->add_js('js/jquery.js');
		$this->template->add_css('styles/maq.css');
		$this->template->add_css('styles/web.css');
		$this->template->write_view('region_usuario', 'admin/home/layout_body_usuario', array(), TRUE);
		$this->template->write_view('region_modulo', 'admin/home/layout_body_modulo', array(), TRUE);
		$this->load->library('session');
	}

	function index(){
            $this->db_galvez = $this->load->database('galvez', TRUE);
            $count_usuarios = $this->db_galvez->count_all_results("tbl_usuario");
            $data["tbl_usuario"] = $count_usuarios;
            if($this->session->userdata('nombre')) {
                $this->template->write_view('region_contenido', 'admin/home', $data, TRUE);
                $this->template->render();
            }else {
                   redirect('admin/login');
            }
	}
}