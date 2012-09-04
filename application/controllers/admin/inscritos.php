<?php
/*****
* Generator Controlers MC v.1.0
* DATE: 13/09/2010
* Phantasia tribal DDB.
* Proyecto
* V. 1.0
* Iniciado: 04/11/2011
******/
class inscritos extends Controller {
    function inscritos(){
        parent::Controller();
        $this->load->model("inscritos_model","obj_inscritos_hijo");

        $this->template->set_template("default");
        $this->template->add_js("js/DD_belatedPNG_0.0.8a-min.js");
        $this->template->add_js("js/jquery.js");
	$this->template->add_js("js/validar.js");
	$this->template->add_js("js/fx_archivos/shadowbox.js");
        $this->template->add_js("js/fx_archivos/fx_archivos.js");
	$this->template->add_css("js/fx_archivos/shadowbox.css");
	$this->template->add_js("js/jquery.blockUI.js");
	$this->template->add_js("js/jquery.form.js");
        $this->template->add_js("js/listado.js");
        $this->template->add_js("js/mas_datos.js");
	$this->template->add_js("js/bloqueo.js");
        $this->template->add_css("styles/maq.css");
        $this->template->add_css("styles/web.css");
        $this->template->write_view("region_usuario", "admin/home/layout_body_usuario", array(), TRUE);
        $this->template->write_view("region_modulo", "admin/home/layout_body_modulo", array(), TRUE);
        $this->load->library("session");
        //$this->output->enable_profiler(TRUE);
    }

    public function index(){
        $data['tot_nuevos'] = $this->obj_inscritos_hijo->nuevos_registrados();
        $data['tot_antiguos'] = $this->obj_inscritos_hijo->antiguos_registrados();

        $data['edades18_24'] = $this->obj_inscritos_hijo->participantes_edad(1987,2011);
        $data['edades25_34'] = $this->obj_inscritos_hijo->participantes_edad(1977,1986);
        $data['edades35_44'] = $this->obj_inscritos_hijo->participantes_edad(1967,1976);
        $data['edades45_54'] = $this->obj_inscritos_hijo->participantes_edad(1957,1966);
        $data['edades_55'] = $this->obj_inscritos_hijo->participantes_edad(0000,1956);

        $data['hombres'] = $this->obj_inscritos_hijo->participantes_sexo('M');
        $data['mujeres'] = $this->obj_inscritos_hijo->participantes_sexo('F');

        if($this->session->userdata("nombre")) {
            $this->template->write_view("region_contenido", "admin/inscritos_list", $data, TRUE);
            $this->template->render();
        }else {
            redirect("admin/login");
        }        
    }
    public function terminado(){
        $data['terminado_mf'] = $this->obj_inscritos_hijo->tot_nivel_terminado();

        $data['terminado_m']  = $this->obj_inscritos_hijo->tot_nivel_terminado_sexo('M');
        $data['terminado_f']  = $this->obj_inscritos_hijo->tot_nivel_terminado_sexo('F');

        $data['anio18_24_m']  = $this->obj_inscritos_hijo->tot_nivel_terminado_edad(1987,2011,'M');
        $data['anio25_34_m']  = $this->obj_inscritos_hijo->tot_nivel_terminado_edad(1977,1986,'M');
        $data['anio35_44_m']  = $this->obj_inscritos_hijo->tot_nivel_terminado_edad(1967,1976,'M');
        $data['anio45_54_m']  = $this->obj_inscritos_hijo->tot_nivel_terminado_edad(1957,1966,'M');
        $data['anio55_m']     = $this->obj_inscritos_hijo->tot_nivel_terminado_edad(0000,1956,'M');

        $data['anio18_24_f']  = $this->obj_inscritos_hijo->tot_nivel_terminado_edad(1987,2011,'F');
        $data['anio25_34_f']  = $this->obj_inscritos_hijo->tot_nivel_terminado_edad(1977,1986,'F');
        $data['anio35_44_f']  = $this->obj_inscritos_hijo->tot_nivel_terminado_edad(1967,1976,'F');
        $data['anio45_54_f']  = $this->obj_inscritos_hijo->tot_nivel_terminado_edad(1957,1966,'F');
        $data['anio55_f']     = $this->obj_inscritos_hijo->tot_nivel_terminado_edad(0000,1956,'F');

        if($this->session->userdata("nombre")) {
            $this->template->write_view("region_contenido", "admin/terminado_list", $data, TRUE);
            $this->template->render();
        }else {
            redirect("admin/login");
        }
        
    }

     public function particpantes_departamento(){
        
        $data['amazonas']   = $this->obj_inscritos_hijo->participante_departamento('01');
        $data['ancash']     = $this->obj_inscritos_hijo->participante_departamento('02');
        $data['apurimac']   = $this->obj_inscritos_hijo->participante_departamento('03');
        $data['arequipa']   = $this->obj_inscritos_hijo->participante_departamento('04');
        $data['ayacucho']   = $this->obj_inscritos_hijo->participante_departamento('05');
        $data['cajamarca']  = $this->obj_inscritos_hijo->participante_departamento('06');

        $data['callao']  = $this->obj_inscritos_hijo->participante_departamento('07');
        $data['cusco']  = $this->obj_inscritos_hijo->participante_departamento('08');
        $data['huancavelica']  = $this->obj_inscritos_hijo->participante_departamento('09');
        $data['huanuco']  = $this->obj_inscritos_hijo->participante_departamento('10');
        $data['ica']  = $this->obj_inscritos_hijo->participante_departamento('11');
        $data['junin']  = $this->obj_inscritos_hijo->participante_departamento('12');

        $data['libertad']  = $this->obj_inscritos_hijo->participante_departamento('13');
        $data['lambayeque']  = $this->obj_inscritos_hijo->participante_departamento('14');
        $data['lima']  = $this->obj_inscritos_hijo->participante_departamento('15');
        $data['loreto']  = $this->obj_inscritos_hijo->participante_departamento('16');
        $data['madre_dios']  = $this->obj_inscritos_hijo->participante_departamento('17');
        $data['moquegua']  = $this->obj_inscritos_hijo->participante_departamento('18');

        $data['pasco']  = $this->obj_inscritos_hijo->participante_departamento('19');
        $data['piura']  = $this->obj_inscritos_hijo->participante_departamento('20');
        $data['puno']  = $this->obj_inscritos_hijo->participante_departamento('21');
        $data['san_martin']  = $this->obj_inscritos_hijo->participante_departamento('22');
        $data['tacna']  = $this->obj_inscritos_hijo->participante_departamento('23');
        $data['tumbes']  = $this->obj_inscritos_hijo->participante_departamento('24');
        $data['ucayali']  = $this->obj_inscritos_hijo->participante_departamento('25');

        if($this->session->userdata("nombre")) {
            $this->template->write_view("region_contenido", "admin/particpantes_departamento", $data, TRUE);
            $this->template->render();
        }else {
            redirect("admin/login");
        }

     }


}
?>