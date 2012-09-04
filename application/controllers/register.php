<?php
class register extends Controller
{
    private $__view_path = 'web/registro';

    public function register(){
        parent::Controller();
        $this->load->model("inscritos_model","obj_inscritos_hijo");
        $this->load->model("promociones_inscritos_model","obj_prociones_inscritos_hijo");
        $this->load->model("ubigeo_model","obj_ubigeo_hijo");
        $this->load->model("tbl_log_model","obj_log_hijo");
        $this->load->helper('functions');
    }

    public function index(){        
        $pk_departamento = '15';
        $pk_provincia = '1501';
        $var['departamento'] = $this->obj_ubigeo_hijo->departamento();
        $var['provincia']    = $this->obj_ubigeo_hijo->provincia($pk_departamento);
        $var['distrito']     = $this->obj_ubigeo_hijo->distrito($pk_provincia);
        
        if (isset($_SESSION['login_data']['dni'])){

            $var['dni']   =   $_SESSION['login_data']["dni"];
            $var['fecha'] =   $_SESSION['login_data']["fecha"];
        }
        //$this->load->view('web/registro/index.html', $var);
        header("Location: http://www.pilsencallao.com.pe");
    }

    public function validate(){                 
        
        $this->form_validation->set_rules('TxtDoc','Dni','required|trim|callback_search_dni[TxtDoc]');
        $this->form_validation->set_rules('TxtMail','email','required|trim|valid_email|callback_search_email[TxtMail]');
        $this->form_validation->set_message('required','Debe introducir el campo %s');        
        $this->form_validation->set_message('valid_email','dirección de eamil no es correcta en %s');
        
        if ($this->form_validation->run()== false){
            $cadena  = explode("</p>", validation_errors());
            $cadena2 = implode("<p>", $cadena);
            $cadena3 = explode("<p>", $cadena2);
            array_pop($cadena3);
            array_shift($cadena3);
            $dato['validacion']  =$cadena3[0];
            //echo json_encode($dato);
        }else{
             $dia = $this->input->post('TxtDia');
             $mes = $this->input->post('TxtMes');
             $anio  = $this->input->post('TxtAnio');
             if ($mes == '02' and $dia >= '30'){
                 $dato['validacion']  = "Error:  Fecha no válida";
             }else{
                 $fecha_nacimiento = $anio."-".$mes."-".$dia;

                 /* ======INSERTANDO EN LA TABLA INSCRITOS====== */
                  if ($this->input->post('TxtCelular')=='Celular'){
                      $celular = "";
                  } else{
                      $celular =$this->input->post('TxtCelular');
                  }
                 $data_inscrito = array(
                    'fecha_registro' => date("Y-m-d H:i:s"),
                    'num_doc'  =>  $this->input->post('TxtDoc'),
                    'tipo_doc' => $this->input->post('cboTipoDoc'),
                    'fec_nac' => $fecha_nacimiento,
                    'nombres' => $this->input->post('TxtNombre'),
                    'apellido_paterno' => $this->input->post('TxtApellidoPat'),
                    'apellido_materno' => $this->input->post('TxtApellidoMat'),
                    'sexo' => $this->input->post('Sexo'),
                    'email' => $this->input->post('TxtMail'),
                    'direccion' => $this->input->post('TxtDireccion'),

                    'telefono' => $this->input->post('TxtTelefonoCasa'),
                    'celular' => $celular,
                    'prov_celular' => $this->input->post('cboCelular'),
                    'telefono_otro' => $this->input->post('TxtTelefonoAdic'),
                    'int_tipo' => 1,
                    'ubigeo' => $this->input->post('cboDistrito')
                );
                $this->obj_inscritos->insert($data_inscrito);

                /* ======INSERTANDO EN LA TABLA PROMOCION INSCRITOS====== */

                $data_inscrito_promociones = array(
                    'dni'  => $this->input->post('TxtDoc'),
                    'edad' => get_edad($fecha_nacimiento),
                    'fecha_registro' =>date("Y-m-d H:i:s"),
                    'fecha_act_registro' =>date("Y-m-d H:i:s"),
                    'id_promo' => 15,
                    'nuevo' => '1' ///nuevo
                );
                $this->obj_prociones_inscritos->insert($data_inscrito_promociones);

                /* INICIANDO SESSION POR EL USUARIO */
                if (!session_id()){session_start();}
                $data_cuenta_session['dni'] =  $this->input->post('TxtDoc');
                $_SESSION['user_data'] = $data_cuenta_session;

                /*REGISTRANDO EN LOG */
                $data = array(
                    'int_dni' => $this->input->post('TxtDoc'),
                    'int_tipo' => 1,
                    'ip' => $this->getip(),
                    'date_registro' => date("Y-m-d H:i:s")
                );
                $this->obj_log->insert($data);
                $dato["validacion"] = "ok";
             }
        }

         echo json_encode($dato);
    }

    public function search_dni($num_dni){        
        $usuario = $this->obj_inscritos_hijo->search_dni($num_dni);        
        if(count($usuario) >= '1'){
            $this->form_validation->set_message('search_dni', 'Usuario ya registrado');
            return false;
        }else{
            return true;
        }
    }

    public function search_email($email){
        $usuario = $this->obj_inscritos_hijo->search_email($email);        
        if(count($usuario) >= '1'){
            $this->form_validation->set_message('search_email', 'email ya registrado');
            return false;
        }else{
            return true;
        }
    }

    public function getip(){
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
            $ip = getenv("HTTP_CLIENT_IP");
        else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
            $ip = getenv("REMOTE_ADDR");
        else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
            $ip = $_SERVER['REMOTE_ADDR'];
        else
            $ip = "IP desconocida";
        return($ip);
    }
   
}
?>