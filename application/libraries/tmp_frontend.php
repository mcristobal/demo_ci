<?php
class tmp_frontend {
    
    protected $_ci = '';
    private $layout = 'web/layout.html';
    private $data = array();
    
    function __construct()
    {
        $this->_ci =& get_instance();
    }

    function setLayout($var)
    {
    	$this->layout = $var;
    }
    
    function getLayout()
    {
    	return $this->layout;
    }
    
    function set($name, $var)
    {
    	$this->data[$name]=$var;
    }
    
    function cleanData()
    {
    	$this->data=array();
    }
    
    function get_settings()
    {
        $this->settings['fron']='default';
        return $this->settings;
    }
    
    function render($tpl)
    {
    	$this->data['body']=$this->_ci->load->view($tpl, $this->data, true);
        $this->_ci->load->view($this->getLayout(),$this->data);
        $this->cleanData();
    }
}
?>