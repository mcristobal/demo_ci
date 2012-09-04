$(function(){
	
	var options = {
	   flvPlayer:"/bin/player/flvplayer.swf",
	   players:     ['img', 'swf', 'flv', 'html', 'qt'], 
	   autoplayMovies:true
 	//displayNav:         false,
		//listenOverlay:       false,
		//enableKeys:true,
		//modal: true
	};
	
	Shadowbox.init(options);

	$('.archivoPopup').live('click',function(e){
		e.preventDefault();
		var contenido=$(this).attr('href');
		var clase=contenido.substring(contenido.length-3)
		clase=clase.toLowerCase();
		
		if(clase=='jpg' || clase=='gif' || clase=='png') player='img';
		else player=clase;
		
		Shadowbox.open({
			content:    contenido,
			player:     player,
			title:      'Admin'
		});
	})

})

