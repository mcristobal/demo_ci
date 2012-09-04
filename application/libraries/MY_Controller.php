<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class MY_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();        
        if (!$this->session->userdata('loggedin'))
        {
            header('Location: admin/login');
        }
    }
}

?>
