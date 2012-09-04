<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Login extends Controller {
    function Login(){
        parent::Controller();
        $this->load->model('tbl_usuario_model','obj_usuario_hijo');
        $this->load->helper('captcha');
        $this->template->set_template('default');
		$this->load->library('Session');
		
    }

    function index(){        
        $captcha_texto = ini_captcha();        
        $newdata = array('captcha_texto_session' => $captcha_texto);
        $this->session->set_userdata($newdata);        
        $this->load->view('admin/index');	
    }

    function proc_login(){
        $txt_buscar = $this->input->post("txt_buscar");        
        $txt_email = $this->input->post('txt_email');
        $txt_password  = $this->input->post('txt_password');
        $txt_seguridad = $this->input->post('txt_seguridad');
        $captcha_texto = $this->session->userdata('captcha_texto_session');        
        
	
		$txt_email = $this->obj_usuario_hijo->verificar_email($txt_email);
        if ($txt_email){
            $pass = $this->obj_usuario_hijo->verificar_password($txt_password);
            if($pass){
                if($txt_seguridad == $captcha_texto){
                    $nombre = $txt_email = $this->input->post('txt_email');
					$usuario = $pass[0]->txt_nombre;
					$this->session->set_userdata('nombre', $usuario);
                    echo "home";
					//redirect('admin/home', 'refresh');
                    
                }else{
                    echo 2;
                }
            }else{
                echo 1;
            }
        }else{
            echo 0;
        }
        
        
    }
    
    public function logout(){
       // $this->session->sess_destroy();
	    $this->session->unset_userdata('nombre');
		$this->session->destroy();
        redirect('admin/login'); 
    }
}
?>
