
	var tot=0;
    var arrIdsImgs = new Array();
	
	
	$(function(){            
		var btnUpload=$('#upload');
		var status=$('#status');
		//var id = 0;
		new AjaxUpload(btnUpload, {
					  
			action: base_url+'admin/galeria/cargar_galeria2',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg)$/.test(ext))){ 
                    // extension is not allowed 
					status.text('Se acepta solo fotos con extensi\u00f3n JPG');
					return false;
				}
				status.text('Uploading...');
			},
			 
			onComplete: function(file, response){
				//On completion clear the status
				status.text('');
				//Add uploaded file to list
				
				if(response==="success"){
					
				var file1 = file.replace(/\s/g,"_");
				var ncadena = file.replace(".jpg","");
				var cadena = ncadena.replace(/\s/g,"_");
				var file_final= cadena+".jpg";
				
				arrIdsImgs[tot++] = file_final;

				var pass = arrIdsImgs.join(',');
				

				document.getElementById("h_ids").value = pass;
		
					$('<li id="id_imagen_'+cadena+'"></li>').appendTo('#files').html('\
                                            <div class="contenedor_img success">\n\
                                                <img src='+base_url+'uploads/modulo_fotos/'+file_final+' alt="" />\n\
                                                <div class="del">\n\
                                                    <a href="#borrar" id="'+cadena+'" class="eliminar" style="text-decoration:none;">\n\
                                                        <div class="del_icon"></div>\n\
                                                    </a>\n\
                                                </div>\n\
                                            </div>');

				} else{
					//$('<li></li>').appendTo('#files').text(file).addClass('error');
					
					if(response==="error2"){
					alert("La imagen ingresada es mayor a 2mb");
					}else{
						//alert("Se ha producido un error con la imagen, vuelva a intentarlo");
						alert("La imagen ingresada es mayor a 2mb");
						}
				}
				
				$('.eliminar').click(function(e) {                                        
						if ($(this)) {										
							getDataServer(base_url+'admin/galeria/eliminar_foto/'+this.id+'.jpg');
							var elemento = this.id+".jpg";
                                                        var lista = "id_imagen_"+this.id;
                                                        $('#'+lista).remove();

                                                        /*alert(lista);
							removeByElement(arrIdsImgs,elemento);*/
							
						} else {
							document.location = $(this);
						}
						e.preventDefault();
				
					});
				
			}
		});
		
	});
	
function removeByElement(arrayName,arrayElement)
 {
    for(var i=0; i<arrayName.length;i++ )
     { 
        if(arrayName[i]==arrayElement)
            arrayName.splice(i,1); 
			//document.getElementById("h_ids2").value = arrayName;	
      } 
  
	var pass2 = arrayName.join(',');
	document.getElementById("h_ids").value = pass2;
  }	