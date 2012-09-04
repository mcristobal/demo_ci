<?php
class ubigeo extends Controller
{    

    public function ubigeo(){
        parent::Controller();        
        $this->load->model("ubigeo_model","obj_ubigeo_hijo");
        
    }
    
    public function provincia(){
        $pk_departamento = $this->input->post('pk_departamento');
        $provincia = $this->obj_ubigeo_hijo->provincia($pk_departamento);        
        echo json_encode($provincia);
    }

    public function distrito(){
        $pk_provincia = $this->input->post('pk_provincia');
        $distrito = $this->obj_ubigeo_hijo->distrito($pk_provincia);
        echo json_encode($distrito);
    }
    
}
?>