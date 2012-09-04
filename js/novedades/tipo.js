/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
    $("#txt_tipo").change(function() {                
        switch(parseInt(this.value)){
            case 0:
                $("#video").hide("slow");
                $("#evento").hide("slow");
                $("#imagen").hide("slow");
            break;
            case 1:                                
                $("#imagen").show("slow");
                $("#video").hide("slow");
                $("#galeria").hide("slow");
                
            break;
            case 2:                
                $("#imagen").hide("slow");
                $("#video").show("slow");
                $("#galeria").hide("slow");
            break;
            case 3:                
                $("#imagen").hide("slow");
                $("#video").hide("slow");
                $("#galeria").show("slow");
            break;
			
			
            default:
                $("#web_moduloFormulario li").hide("slow");
        }
    });
	
	 /*$("#txt_tipo_video").change(function() {                
        switch(parseInt(this.value)){
			case 0:                
                $("#video_yt").hide("slow");
				$("#video_vm").hide("slow");
            break;
            case 1:                
                $("#video_yt").show("slow");
				$("#video_vm").hide("slow");
            break;
            case 2:                
                $("#video_vm").show("slow");
				$("#video_yt").hide("slow");
            break;
			
			
            default:
                $("#web_moduloFormulario li").hide("slow");
        }
    });*/
});