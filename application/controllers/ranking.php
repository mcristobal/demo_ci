<?php
class ranking extends Controller
{
    private $__fecha_desde = '2011-11-21';
    private $__fecha_hasta = '2011-11-27';

    public function ranking(){
        parent::Controller();
        $this->load->model("tbl_juego_model","obj_juego_hijo");
    }

    public function index(){
      
       $obj_ranking = $this->obj_juego_hijo->ranking();
       
       $this->tmp_frontend->setLayout('web/layout_modal.html');
       $this->tmp_frontend->set('ranking', $obj_ranking);
       $this->tmp_frontend->render('web/ranking/index.html');
    }

    public function ranking_semanal(){
        $obj_ranking = $this->obj_juego_hijo->ranking_semana($this->__fecha_desde, $this->__fecha_hasta);
        $this->tmp_frontend->setLayout('web/layout_modal.html');
        $this->tmp_frontend->set('ranking', $obj_ranking);
        $this->tmp_frontend->render('web/ranking/ranking_semanal.html');
    }

    public function mejores_tiempo(){
        $obj_ranking = $this->obj_juego_hijo->mejores_tiempo();        
        $this->tmp_frontend->setLayout('web/layout_modal.html');
        $this->tmp_frontend->set('ranking', $obj_ranking);
        $this->tmp_frontend->render('web/ranking/mejores_tiempo.html');
    }

}
?>