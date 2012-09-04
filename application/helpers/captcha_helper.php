<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function ini_captcha(){    
    $captcha_texto = "";
    for ($i = 1; $i <= 6; $i++) {
        $captcha_texto .= caracter_aleatorio(); 
    }
    return $captcha_texto;    
}

function caracter_aleatorio() { 
    mt_srand((double)microtime()*1000000);
    $valor_aleatorio = mt_rand(48,57); /// 1 y 3 serian aleatorio alfanumerico 48, 57 solo numero segun el codigo ASCII
    switch ($valor_aleatorio) {
        case 1:
            $valor_aleatorio = mt_rand(97, 122); 
            break;
        case 2:
            $valor_aleatorio = mt_rand(48, 57); 
            break;
        case 3:
            $valor_aleatorio = mt_rand(65, 90); 
            break;
    }
    return chr($valor_aleatorio);
}
function formato_fecha($p_fecha,$p_idioma='null')
{
	$timestamp=strtotime($p_fecha);

	$meses_esp = array(1=>"Enero",2=>"Febrero",3=>"Marzo",4=>"Abril",5=>"Mayo",6=>"Junio",7=>"Julio",8=>"Agosto",9=>"Septiembre",10=>"Octubre",11=>"Noviembre",12=>"Diciembre");
   	$dias_esp  = array(0=>"Domingo",1=>"Lunes",2=>"Martes",3=>"Mi&eacute;rcoles",4=>"Jueves",5=>"Viernes",6=>"Sabado");

	$meses_eng = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
   	$dias_eng  = array(0=>"Sunday",1=>"Monday",2=>"Tuesday",3=>"Wednesday",4=>"Thursday",5=>"Friday",6=>"Saturday");

	if ($p_idioma=='eng')		{	$meses = $meses_eng;
									$dias = $dias_eng;	}
	else						{	$meses = $meses_esp;
									$dias = $dias_esp;	}

	$dia_semana=$dias[date('w',$timestamp)];
	$mes=$meses[date('n',$timestamp)];
	$dia  =	date('d',$timestamp);
	$anio = date('Y',$timestamp);
	$ampm = date('a',$timestamp);
	$hora = date('h',$timestamp);
	$min  =	date('i',$timestamp);
	$seg  =	date('s',$timestamp);
   	$fecha = $dia." de ".$mes." del ".$anio;
 return $fecha;
}


function inc_invertir_fecha($fecha,$caso)
{
	if($caso==1)
	{   //tipo 2005-04-10
		$fecha_invertida = substr($fecha,6,4) ."-". substr($fecha,3,2) ."-".substr($fecha,0,2);
	}elseif($caso==2)
	{  //tipo 10-04--2005
		$fecha_invertida = substr($fecha,8,2) ."-". substr($fecha,5,2) ."-".substr($fecha,0,4);
	}

	if($fecha_invertida=="--"){ $fecha_invertida=""; }
	return $fecha_invertida;

}

?>
