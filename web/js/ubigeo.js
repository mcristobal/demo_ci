$(document).ready(function(){
    $("#cboDepartamento").change( function(){ jsUbigeoDep() } );
    $("#cboProvincia").change( function(){ jsUbigeoProv() } );

    function jsUbigeoDep(){       
       $.post(
           dominio+'ubigeo/provincia',{
               pk_departamento : $("#cboDepartamento").val()
                   
           },
           function(data){
                var object = JSON.parse(data);
                $("#cboProvincia").html("");
                $("#cboProvincia").append('<option value="">No seleccionados(*)</option>')
                for(var x=0; x<object.length; x++){
                    $("#cboProvincia").append("<option value='"+object[x].id+"'>"+object[x].name+"</option>")
                }
                
           }
       );
    }
    
    function jsUbigeoProv(){       
       $.post(
           dominio+'ubigeo/distrito',{
               pk_provincia : $("#cboProvincia").val()
                   
           },
           function(data){
                var object = JSON.parse(data);
                $("#cboDistrito").html("");
                $("#cboDistrito").append('<option value="">No seleccionados(*)</option>')
                for(var x=0; x<object.length; x++){
                    $("#cboDistrito").append("<option value='"+object[x].id+"'>"+object[x].name+"</option>")
                }
                
           }
       );
    }
    
});


