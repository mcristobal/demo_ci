<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
   function corta_texto($texto, $num) { 
	 $txt = (strlen($texto) > $num) ? substr($texto,0,$num)."..." : $texto;
	 return $txt;
   }

   function encrypt($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}

function decrypt($string, $key) {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;

}

function get_edad($fecha){
   list($Y,$m,$d) = explode("-",$fecha);
   return  ( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}


function seconds_to_time($level5,$time_level){    
    $times = array($level5,$time_level);
    $seconds = 0;
    foreach ( $times as $time ){
        list( $g, $i, $s ) = explode( ':', $time );
        $seconds += $g * 3600;
        $seconds += $i * 60;
        $seconds += $s;
    }

    $hours = floor( $seconds / 3600 );
    $seconds -= $hours * 3600;
    $minutes = floor( $seconds / 60 );
    $seconds -= $minutes * 60;

    //echo "\n\r{$hours}:{$minutes}:{$seconds}\n\r";
    if (strlen($hours)==1){
        $hours = "0".$hours;
    }
    if (strlen($minutes)==1){
        $minutes = "0".$minutes;
    }
    if (strlen($seconds)==1){
        $seconds = "0".$seconds;
    }
    $n_hora = "{$hours}:{$minutes}:{$seconds}";
    return $n_hora;
}




?>