<?php
class mapa extends Controller
{
    private $__view_path = 'web/mapa';

    public function mapa(){
        parent::Controller();        
        $this->load->model("tbl_juego_model","obj_juego_hijo");
        $this->load->helper('functions');
    }

    public function index(){        
        if (isset($_SESSION['user_data']["dni"])){            
                if ($this->level() == 0){
                     $obj_resultado = $this->obj_juego_hijo->search_resultado($_SESSION['user_data']["dni"]);

                     $data["reseultado"] = $obj_resultado[0]->time_resultado;
                     $data["level"]  = $this->level();
                }else{
                    $data["level"]  = $this->level();
                }
                $this->load->view('web/mapa/index.html',$data);            
        }else{
            redirect('home');
        }
    }

    public function juego(){
        if (isset($_SESSION['user_data']["dni"])){
            $juego = $this->obj_juego_hijo->search_level($_SESSION['user_data']["dni"]);
                      
            if (count($juego) > 0){               
                if ($juego[0]->int_estado != 0 and $this->level() > 1){                    
                    $data_juego = array(
                        'var_key' => $this->token(),
                        'dni' => $_SESSION['user_data']["dni"],
                        'int_nivel' => $this->level(),
                        'int_estado' => 0,
                        'txt_session' => $juego[0]->txt_session,
                        'date_registro' => date("Y-m-d H:i:s")
                    );
                    $this->obj_juego->insert($data_juego);                    
                }elseif($juego[0]->int_estado != 0 and $this->level() == 1){
                    $txt_session = base_convert(date("Y-m-d H:i:s"), 10, 36);                    
                    $data_juego = array(
                        'var_key' => $this->token(),
                        'dni' => $_SESSION['user_data']["dni"],
                        'int_nivel' => $this->level(),
                        'int_estado' => 0,
                        'txt_session' => $txt_session,
                        'date_registro' => date("Y-m-d H:i:s")
                    );
                    $this->obj_juego->insert($data_juego);
                }
            }else{
                $txt_session = base_convert(date("Y-m-d H:i:s"), 10, 36);                
                $data_juego = array(
                    'var_key' => $this->token(),
                    'dni' => $_SESSION['user_data']["dni"],
                    'int_nivel' => $this->level(),
                    'int_estado' => 0,
                    'txt_session' => $txt_session,
                    'date_registro' => date("Y-m-d H:i:s")
                );
                $this->obj_juego->insert($data_juego);                
            }            
             $dato['level'] = $this->level();
             $dato['token'] = $this->token();
             if ($this->token()==""){
                 redirec("home");
             }else{
                $this->load->view('web/mapa/juego.html',$dato);
             }
             
        }else{
            redirect('home');
        } 
    }

    public function juego_demo(){
		$this->load->view('web/mapa/juego-demo.html');
    }

    public function demo(){
        $time_level = '00:00:00';
        $time_final = $this->obj_juego_hijo->sum_time('44878691','74mx8pail');
        $time6 = seconds_to_time($time_final[0]->level5,$time_level);

        echo $time6;
    }

    public function update_juego(){        
        if (isset($_SESSION['user_data']["dni"])){
            $time_level = $this->input->post('tiempo');
            $token = $this->input->post('token');
            if ($time_level ==""){
                redirect('mapa');
            }else{
                $valid_token = $this->obj_juego_hijo->get_token($token,$this->level());
                if ($valid_token[0]->var_key == $token){
                    if ($time_level!= "00:00:00" && $time_level!= "00:00:01"){
                        $juego = $this->obj_juego_hijo->search_level($_SESSION['user_data']["dni"]);
                        $time_level = $this->input->post('tiempo');

                        if ($juego[0]->int_estado == 0 and $juego[0]->int_nivel == 6){
                            $time_final = $this->obj_juego_hijo->sum_time($_SESSION['user_data']["dni"],$juego[0]->txt_session);

                            $time6 = seconds_to_time($time_final[0]->level5,$time_level);

                            $update_juego = array(
                                'int_estado' => 1,
                                'time_juego' => $time_level,
                                'time_resultado' => $time6
                            );
                            $this->obj_juego->update($juego[0]->pk_juego, $update_juego);
                            $juego = $this->obj_juego_hijo->search_level($_SESSION['user_data']["dni"]);
                            $data_juego = array(
                                'int_estado' => 0,
                                'dni' => $_SESSION['user_data']["dni"],
                                'int_nivel' => 0,
                                'txt_session' => $juego[0]->txt_session,
                                'date_registro' => date("Y-m-d H:i:s")
                            );
                            $this->obj_juego->insert($data_juego);

                        }elseif($juego[0]->int_estado == 0 and $juego[0]->int_nivel < 6){
                            $update_juego = array(
                                'int_estado' => 1,
                                'time_juego' => $time_level
                                );
                            $this->obj_juego->update($juego[0]->pk_juego, $update_juego);
                        }
                        $dato["validacion"] = "ok";
                    }else{
                        $dato["validacion"] = "Tiempo no permitido";
                    }
                }else{
                    $dato["validacion"] = "Juego no permitido";
                }
                echo json_encode($dato);
            }
        }

    }

    public function level(){
        $dni = $_SESSION['user_data']["dni"];        
        $juego = $this->obj_juego_hijo->search_level($dni);        
        
        if (count($juego)> 0){
            if ($juego[0]->int_estado == '1' and $juego[0]->int_nivel < 6){
                $level  = $juego[0]->int_nivel + 1;
            }elseif ($juego[0]->int_estado == '0' and $juego[0]->int_nivel == 0){
                $level = 0  ;
            }elseif ($juego[0]->int_estado == '1' and $juego[0]->int_nivel == 0){
                $level = 1  ;
            }else{
                $level  = $juego[0]->int_nivel;
            }
        }else{
            $level = 1;
        }
        return $level;
    }

    public function reset(){
        if (isset($_SESSION['user_data']["dni"])){
            $juego = $this->obj_juego_hijo->search_level($_SESSION['user_data']["dni"]);
            if ($juego[0]->int_estado == 0 and $juego[0]->int_nivel == 0){
                $update_juego = array(
                    'int_estado' => 1
                );
                $this->obj_juego->update($juego[0]->pk_juego, $update_juego);
                redirect('mapa');
                /*$data["level"]  = $this->level();
                $this->load->view('web/mapa/index.html',$data);*/
            }
        }
        redirect('mapa');
    }

    public function acumulado_nivel(){
        if (isset($_SESSION['user_data']["dni"])){
             if ($this->level()==0){
                $juego = $this->obj_juego_hijo->search_resultado($_SESSION['user_data']["dni"]);
                echo json_encode($juego);
             }
        }
    }

    public function token(){
        $dni = $_SESSION['user_data']["dni"];
        $juego = $this->obj_juego_hijo->search_level($dni);
        if(count($juego)>0){
            if ($juego[0]->var_key!=""){
                $token = $juego[0]->var_key;
            }else{
                $token = md5($_SESSION['user_data']["dni"].date("H:i:s"));
            }
        }else{
            $token = md5($_SESSION['user_data']["dni"].date("H:i:s"));
        }
        return $token;
    }

}
?>