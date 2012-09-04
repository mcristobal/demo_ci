<?php
class home extends Controller
{
    public function home(){
        parent::Controller();
        $this->load->model("inscritos_model","obj_inscritos_hijo");
        $this->load->model("promociones_inscritos_model","obj_promociones_inscritos_hijo");
        $this->load->model("tbl_juego_model","obj_juego_hijo");
        $this->load->model("tbl_log_model","obj_log_hijo");
        $this->load->helper('functions');
    }
    
    public function index(){	
       $this->load->view('web/home/index.html');
    }

    public function validate(){
        $dni = $this->input->post('txtDni');
        $dia = $this->input->post('txtDia');
        $mes = $this->input->post('txtMes');
        $anio = $this->input->post('txtAnio');
        $fecha_nacimiento = $anio."-".$mes."-".$dia;        

        $obj_dni = $this->obj_inscritos_hijo->search_dni($dni);
        if(count($obj_dni)>0){
          $obj_usuario = $this->obj_inscritos_hijo->login($dni,$fecha_nacimiento);
          if (count($obj_usuario) > 0 ){
              $obj_promo_inscritos = $this->obj_promociones_inscritos_hijo->search_user_promo($dni);

              if (count($obj_promo_inscritos)==0){
                  $data_inscrito_promociones = array(
                    'dni'  => $dni,
                    'edad' => get_edad($fecha_nacimiento),
                    'fecha_registro' =>date("Y-m-d H:i:s"),
                    'fecha_act_registro' =>date("Y-m-d H:i:s"),
                    'id_promo' => 15,
                    'nuevo' => '0' /// antiguo
                );
                  $this->obj_prociones_inscritos->insert($data_inscrito_promociones);
              }
              if (!session_id()){session_start();}
              $data_cuenta_session['dni'] = $obj_usuario[0]->num_doc;
              $_SESSION['user_data'] = $data_cuenta_session;



                /*REGISTRANDO EN LOG */
              $data = array(
                    'int_dni' => $obj_usuario[0]->num_doc,
                    'int_tipo' => 1,
                    'ip' => $this->getip(),
                    'date_registro' => date("Y-m-d H:i:s")
                    );
              $this->obj_log->insert($data);

              $dato["validacion"] = "ok";
          }else{
               $dato["validacion"] = "La fecha de nacimiento es incorrecta";
          }           
        }else{            
            if (!session_id()){session_start();}
              $data_login_session['dni'] = $dni;
              $data_login_session['fecha'] = $fecha_nacimiento;
              $_SESSION['login_data'] = $data_login_session;

              $dato["validacion"] = "registro";
        }
        echo json_encode($dato);
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

    public function user_logout(){
         if (isset($_SESSION['user_data']["dni"])){
            $juego = $this->obj_juego_hijo->search_level($_SESSION['user_data']["dni"]);
            if (count($juego)>0){
                if ($juego[0]->int_estado == 0 and $juego[0]->int_nivel == 0){
                    $update_juego = array(
                        'int_estado' => 1
                    );
                    $this->obj_juego->update($juego[0]->pk_juego, $update_juego);
                }
            }
        }
      session_destroy();
      unset($_SESSION);
      redirect('home');
    }
}
?>