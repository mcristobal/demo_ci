<?php
/* 
 * ELABORACION DEL CODIGO CAPCHA EN IMAGEN
 
 */
class Crear_imagen extends Controller {
    function Crear_imagen(){
        parent::Controller();
        
    }

    function index(){
        $width=98;
        $height=24;
        $captcha_imagen = imagecreate($width,$height);

        $color_negro = imagecolorallocate ($captcha_imagen, 120, 120, 120); //color de fondo
        $color_blanco = imagecolorallocate ($captcha_imagen, 255, 255, 255); //color de los numeros
        $color_linea = imagecolorallocate ($captcha_imagen, 241, 240, 240); //blanco

        imagefill($captcha_imagen, 0, 0, $color_negro); //asigno el color de fondo a la imagen

        $captcha_texto = $this->session->userdata('captcha_texto_session');
        
        imagechar($captcha_imagen, 195, 5, 0, $captcha_texto[0] ,$color_blanco);//primer caracter
        imagechar($captcha_imagen, 195, 20, 8, $captcha_texto[1] ,$color_blanco);//segundo caracter
        imagechar($captcha_imagen, 195, 35, 0, $captcha_texto[2] ,$color_blanco);//tercero caracter
        imagechar($captcha_imagen, 195, 50, 8, $captcha_texto[3] ,$color_blanco);//cuarto caracter
        imagechar($captcha_imagen, 195, 65, 0, $captcha_texto[4] ,$color_blanco);//quinto caracter
        imagechar($captcha_imagen, 195, 80, 8, $captcha_texto[5] ,$color_blanco);//sexto caracter

        header("Content-type: image/jpeg"); 
        imagejpeg($captcha_imagen);         
    }
}
?>
