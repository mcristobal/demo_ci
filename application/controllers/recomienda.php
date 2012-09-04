<?php

class recomienda extends Controller
{
    public function recomienda(){
        parent::Controller();
        $this->load->plugin('phpmailer');
	$this->load->library('email');
        $this->load->model("tbl_log_model","obj_log_hijo");
    }

    public function index(){
       $this->tmp_frontend->setLayout('web/layout_modal.html');
       $this->tmp_frontend->render('web/recomienda/index.html');
    }

    public function validate(){
       /*$nombre  = $this->input->post('nombre');
       $apellido  = $this->input->post('apellido');*/
       $email1 = $this->input->post('txtEmail_1');
       $email2 = $this->input->post('txtEmail_2');
       $email3 = $this->input->post('txtEmail_3');
       $email4 = $this->input->post('txtEmail_4');
              
       $html = '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>h</title>
</head>

<body style="margin:0px; background-color:#000000;">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000" height="100%">
  <tr>
    <td valign="top"><table width="828" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000">
  <tr bgcolor="#000000">
    <td style="text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:10px; color:#999999;"><table width="828" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="460"><img src="http://www.pilsencallao.com.pe/buscando-galvez/web/images/mail/galvez01.jpg" width="460" height="24" style="vertical-align:bottom;" /></td>
        <td width="10"><a href="http://www.pilsencallao.com.pe/buscando-galvez/mail/" target="_blank"><img src="http://www.pilsencallao.com.pe/buscando-galvez/web/images/mail/galvez02.jpg" width="82" height="24" border="0" style="vertical-align:bottom;" /></a></td>
        <td width="358"><img src="http://www.pilsencallao.com.pe/buscando-galvez/web/images/mail/galvez03.jpg" width="286" height="24" style="vertical-align:bottom;" /></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><a href="http://www.pilsencallao.com.pe/buscando-galvez" target="_blank"><img src="http://www.pilsencallao.com.pe/buscando-galvez/web/images/mail/galvez04.jpg" width="828" height="263" alt="Pilsen Callao" style="vertical-align:bottom;" border="0" /></a></td>
  </tr>
  <tr>
    <td><a href="http://www.pilsencallao.com.pe/buscando-galvez" target="_blank"><img src="http://www.pilsencallao.com.pe/buscando-galvez/web/images/mail/galvez05.jpg" width="828" height="309" style="vertical-align:bottom;" border="0" /></a></td>
  </tr>
  <tr>
    <td><a href="http://www.pilsencallao.com.pe/buscando-galvez" target="_blank"><img src="http://www.pilsencallao.com.pe/buscando-galvez/web/images/mail/galvez06.jpg" width="828" height="307" style="vertical-align:bottom;" border="0" /></a></td>
  </tr>
  <tr>
    <td><a href="http://www.pilsencallao.com.pe/buscando-galvez" target="_blank"><img src="http://www.pilsencallao.com.pe/buscando-galvez/web/images/mail/galvez07.jpg" width="828" height="222" style="vertical-align:bottom;" border="0" /></a></td>
  </tr>
  <tr bgcolor="#000000">
    <td style="text-align:justify;"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#999999"><br />
      <span style="font-family:Verdana, Arial, Helvetica, sans-serif; color:#999999;font-size:10px;">En concordancia con la Ley N&deg; 28493 y su reglamento, informamos que este correo publicitario ha sido enviado por  CERVECER&Iacute;AS PERUANAS BACKUS S.A.A. con domicilio en Av. Nicol&aacute;s Ayll&oacute;n 3986, Ate Vitarte - Lima; designando como correo electr&oacute;nico <a href="mailto:webmaster@pilsencallao.com.pe" style="color:#999999; font-weight:bold;">webmaster@pilsencallao.com.pe</a> y Nestor Escurra como persona de contacto, al cual puede enviar un mensaje para notificar su voluntad de no recibir m&aacute;s correos, o haciendo clic <a href="http://www.masterbase.com/pilsencallao/default.asp?email=#!email!#&amp;password=#!contrasena!#&amp;menu=anular" style="color:#999999; font-weight:bold;">aqu&iacute;</a>.</span><br />
      <br />
      </font></td>
  </tr>
    </table>
</td>
  </tr>
</table>
</body>
</html>';

if ($email1 != '' or $email2 != '' or $email3 != '' or $email4 != ''){
       if ($email1 != ''){
           $asunto = "Publicidad - Gálvez te premia con Pilsen Callao";           
           $envio = $this->enviar_mail($email1,$asunto,$html);
       }
       if ($email2 != ''){
           $asunto = "Publicidad - Gálvez te premia con Pilsen Callao";                  
           $envio = $this->enviar_mail($email2,$asunto,$html);
       }
       if ($email3 != ''){
           $asunto = "Publicidad - Gálvez te premia con Pilsen Callao";                  
           $envio = $this->enviar_mail($email3,$asunto,$html);
       }
       if ($email4 != ''){
           $asunto = "Publicidad - Gálvez te premia con Pilsen Callao";
           $envio = $this->enviar_mail($email4,$asunto,$html);
       }

       /*REGISTRANDO EN LOG */
       if (isset($_SESSION['user_data']["dni"])){
           $dni = $_SESSION['user_data']["dni"];
       }else{
           $dni = '00000000';
       }
     
          $data = array(
                'int_dni' => $dni,
                'int_tipo' => 2, //recomendar
                'ip' => $this->getip(),
                'date_registro' => date("Y-m-d H:i:s")
                );
          $this->obj_log->insert($data);


       if ($envio =='ok'){
           $dato["validacion"] = "Las recomendaciones fueron enviadas";
       }else{
           $dato["validacion"] = $envio;
       }
    
} else{
      $dato["validacion"] = "Mínino debe ingresar un correo";
}
    echo json_encode($dato);
}

    public function enviar_mail($correo,$asunto,$html){        
	    error_reporting(E_ERROR);
            $mail=new PHPMailer();

            $mail->IsSMTP();
            $mail->Mailer = "mail";
            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            //$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
            $mail->Host       = "mail.pilsencallao.com.pe";      // sets GMAIL as the SMTP server
            $mail->Port       = 25;                   // set the SMTP port

            $mail->Username   = "noreply@pilsencallao.com.pe";  // GMAIL username
            $mail->Password   = "tr1b4lp3ru";           // GMAIL password
            $mail->SMTPDebug = true;


            $mail->From       = "noreply@pilsencallao.com.pe";
            $mail->FromName   = "Buscando a Gálvez";
            $mail->Subject    = $asunto;
            $mail->Body       = $html;    //HTML Body

            //$mail->AltBody    = "This is the body when user views in plain text format"; //Text Body
            $mail->WordWrap   = 50; // set word wrap

            $mail->AddAddress($correo);

            $mail->IsHTML(true); // send as HTML

            if(!$mail->Send()) {
              $rpta = "Mailer Error: " . $mail->ErrorInfo;
            } else {
              $rpta = "ok";
            }
            return $rpta;
	}

        public function getip(){
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
            $ip = getenv("HTTP_CLIENT_IP");
        else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
            $ip = getenv("REMOTE_ADDR");
        else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
            $ip = $_SERVER['REMOTE_ADDR'];
        else
            $ip = "IP desconocida";
        return($ip);
    }
}
?>