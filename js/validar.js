$(function(){
        
        $('#web_moduloContenido, #formulario').find('.validar').bind('click',function(e){
        
                e.preventDefault();
                
                var premensaje="Por favor ";
                var enviar=true;
                
                $('#web_moduloFormulario, #formulario').find('.requerido').each(function(){

                        if(this.tagName=="INPUT"){
    
                            if(this.type=="text"){
                                if($(this).val()==""){
                                    mensajeSoloError(premensaje+$(this).attr('title'));
                                    $(this).focus();
                                    enviar=false;
                                    return enviar;
                                }
                            }
                            
                            if(this.type=="file"){
                                if(($(this).val()=="")){
                                    if(!($(this).parent().find('a').hasClass('archivoPopup')) || ($(this).val()!="")){
                                        mensajeSoloError(premensaje+$(this).attr('title'));
                                        $(this).focus();
                                        enviar=false;
                                        return enviar;     
                                    }
                                }
                            }
                            
                            if(this.type=="password"){
                                
                                if($(this).val()==""){
                                    mensajeSoloError(premensaje+$(this).attr('title'));
                                    $(this).focus();
                                    enviar=false;
                                    return enviar;
                                }
                            }
                            
                        }
                        
                        if(this.tagName=="SELECT"){
                            
                                if($(this).val()==""){
                                    mensajeSoloError(premensaje+$(this).attr('title'));
                                    $(this).focus();
                                    enviar=false;
                                    return enviar;
                                }
                           
                        }
                        
                        if(this.tagName=="TEXTAREA"){
                            if($(this).val()==""){
                                mensajeSoloError(premensaje+$(this).attr('title'));
                                $(this).focus();
                                enviar=false;
                                return enviar;
                            }
                        }
                        
                        if($(this).hasClass('grupoCheck')){
                                
                                var cantidad = $('.grupoCheck input[type=checkbox]:checked').length;
                                
                                if (cantidad < $(this).attr('lang')) {
                                        mensajeSoloError(premensaje+$(this).attr('title'));
                                        enviar=false;
                                        return enviar;
                                } 
                               
                        }

                })
                
                var form=$(this);

                function respuesta(responseText,statusText){
                     
                        if(form.attr('href')=="#enviarLogin"){
                                if(statusText=="success"){
                                        
                                        $.unblockUI();
                                        var datos=['Correo invalido','Contraseña incorrecta','Código incorrecto'];
                                        
                                        //alert(responseText);
                                        
                                        if(responseText=="0") $('#txt_email').focus();
                                        else if(responseText=="1") $('#txt_password').focus(); 
                                        else if(responseText=="2") $('#captcha').focus();
                                        else document.location= responseText;
                                        mensajeSoloError(datos[parseFloat(responseText)]);
                                        
                                }
                        }else{
                                if(statusText=="success") document.location = $('#id_listado_url').val();
                        }
                }
             
                if(enviar==true) {
                        if(form.attr('href')=="#enviarLogin") bloqueo('Enviando...');
                        else bloqueo('Guardando...');

                        $('form').ajaxSubmit({
                                success: respuesta
                        });
                }  
                
                
                
        })
})