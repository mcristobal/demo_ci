<?php
class terminos extends Controller
{
    public function terminos(){
        parent::Controller();
    }

    public function index(){
       $this->tmp_frontend->setLayout('web/layout_modal.html');
       $this->tmp_frontend->render('web/terminos/index.html');
    }

    public function instrucciones(){
       $this->tmp_frontend->setLayout('web/layout_modal.html');
       $this->tmp_frontend->render('web/terminos/instrucciones.html');
    }

    public function bases(){
       $this->tmp_frontend->setLayout('web/layout_modal.html');
       $this->tmp_frontend->render('web/terminos/bases.html');
    }

    public function premios(){
       $this->tmp_frontend->setLayout('web/layout_modal.html');
       $this->tmp_frontend->render('web/premios/index.html');
    }

    public function mail(){
        $this->load->view('web/mail/index.html');
    }

}
?>