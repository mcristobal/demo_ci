<?php
class mail extends Controller
{
    public function mail(){
        parent::Controller();
    }

    public function index(){
        $this->load->view('web/mail/index.html');
    }

   
}
?>