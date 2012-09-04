( function($) {
	
    $.fn.AG_popup = function(opciones){
				
				var porDefecto = {  
						contenedor:null,
						botonCerrar:'.AG_popupCerrar',
						transparenciaColor:'#000000',
						transparencia:0.7,
						ancho:100,
						alto:100,
						bloqueo:true,
						arrastrable:false,
						arrastrar:null,
						profundidad:10002
				};  
				
				var opc_extend = $.extend({},porDefecto, opciones );
				
        
        		var interval=0;
        	
				var opc = opc_extend;
      			
        		$popup = $(opc.contenedor);

        		/* Arrastrar */
						
						var Drag = {

								obj : null,
							
								init : function(o, oRoot, minX, maxX, minY, maxY, bSwapHorzRef, bSwapVertRef, fXMapper, fYMapper)
								{
									o.onmousedown	= Drag.start;
							
									o.hmode			= bSwapHorzRef ? false : true ;
									o.vmode			= bSwapVertRef ? false : true ;
							
									o.root = oRoot && oRoot != null ? oRoot : o ;
							
									if (o.hmode  && isNaN(parseInt(o.root.style.left  ))) o.root.style.left   = "0px";
									if (o.vmode  && isNaN(parseInt(o.root.style.top   ))) o.root.style.top    = "0px";
									if (!o.hmode && isNaN(parseInt(o.root.style.right ))) o.root.style.right  = "0px";
									if (!o.vmode && isNaN(parseInt(o.root.style.bottom))) o.root.style.bottom = "0px";
							
									o.minX	= typeof minX != 'undefined' ? minX : null;
									o.minY	= typeof minY != 'undefined' ? minY : null;
									o.maxX	= typeof maxX != 'undefined' ? maxX : null;
									o.maxY	= typeof maxY != 'undefined' ? maxY : null;
							
									o.xMapper = fXMapper ? fXMapper : null;
									o.yMapper = fYMapper ? fYMapper : null;
							
									o.root.onDragStart	= new Function();
									o.root.onDragEnd	= new Function();
									o.root.onDrag		= new Function();
								},
							
								start : function(e)
								{
									var o = Drag.obj = this;
									e = Drag.fixE(e);
									var y = parseInt(o.vmode ? o.root.style.top  : o.root.style.bottom);
									var x = parseInt(o.hmode ? o.root.style.left : o.root.style.right );
									o.root.onDragStart(x, y);
							
									o.lastMouseX	= e.clientX;
									o.lastMouseY	= e.clientY;
							
									if (o.hmode) {
										if (o.minX != null)	o.minMouseX	= e.clientX - x + o.minX;
										if (o.maxX != null)	o.maxMouseX	= o.minMouseX + o.maxX - o.minX;
									} else {
										if (o.minX != null) o.maxMouseX = -o.minX + e.clientX + x;
										if (o.maxX != null) o.minMouseX = -o.maxX + e.clientX + x;
									}
							
									if (o.vmode) {
										if (o.minY != null)	o.minMouseY	= e.clientY - y + o.minY;
										if (o.maxY != null)	o.maxMouseY	= o.minMouseY + o.maxY - o.minY;
									} else {
										if (o.minY != null) o.maxMouseY = -o.minY + e.clientY + y;
										if (o.maxY != null) o.minMouseY = -o.maxY + e.clientY + y;
									}
							
									document.onmousemove	= Drag.drag;
									document.onmouseup		= Drag.end;
							
									return false;
								},
							
								drag : function(e)
								{
									e = Drag.fixE(e);
									var o = Drag.obj;
							
									var ey	= e.clientY;
									var ex	= e.clientX;
									var y = parseInt(o.vmode ? o.root.style.top  : o.root.style.bottom);
									var x = parseInt(o.hmode ? o.root.style.left : o.root.style.right );
									var nx, ny;
							
									if (o.minX != null) ex = o.hmode ? Math.max(ex, o.minMouseX) : Math.min(ex, o.maxMouseX);
									if (o.maxX != null) ex = o.hmode ? Math.min(ex, o.maxMouseX) : Math.max(ex, o.minMouseX);
									if (o.minY != null) ey = o.vmode ? Math.max(ey, o.minMouseY) : Math.min(ey, o.maxMouseY);
									if (o.maxY != null) ey = o.vmode ? Math.min(ey, o.maxMouseY) : Math.max(ey, o.minMouseY);
							
									nx = x + ((ex - o.lastMouseX) * (o.hmode ? 1 : -1));
									ny = y + ((ey - o.lastMouseY) * (o.vmode ? 1 : -1));
							
									if (o.xMapper)		nx = o.xMapper(y)
									else if (o.yMapper)	ny = o.yMapper(x)
							
									Drag.obj.root.style[o.hmode ? "left" : "right"] = nx + "px";
									Drag.obj.root.style[o.vmode ? "top" : "bottom"] = ny + "px";
									Drag.obj.lastMouseX	= ex;
									Drag.obj.lastMouseY	= ey;
							
									Drag.obj.root.onDrag(nx, ny);
									return false;
								},
							
								end : function()
								{
									document.onmousemove = null;
									document.onmouseup   = null;
									Drag.obj.root.onDragEnd(	parseInt(Drag.obj.root.style[Drag.obj.hmode ? "left" : "right"]), 
																parseInt(Drag.obj.root.style[Drag.obj.vmode ? "top" : "bottom"]));
									Drag.obj = null;
								},
							
								fixE : function(e)
								{
									if (typeof e == 'undefined') e = window.event;
									if (typeof e.layerX == 'undefined') e.layerX = e.offsetX;
									if (typeof e.layerY == 'undefined') e.layerY = e.offsetY;
									return e;
								}
						};

						if(opc.arrastrable==true)	Drag.init(document.getElementById(opc.arrastrar), document.getElementById(opc.contenedor));
        		
						/* Popup */

      				if ($.browser.msie && $.browser.version.substr(0,1)<8) {
						if(opc.bloqueo==true) $('html,body').css({'overflow':'hidden'});
					}else {
						if(opc.bloqueo==true) $('body').css({'overflow':'hidden'});
					}
					

      			$('select').css({visibility:'hidden'});	
      			
						var altura=$(document).height();
						
						if(opc.bloqueo==true){
							 	var $bloqueo=$("body").prepend('<div class="AG_popupBloqueo"></div>');
							 	$('.AG_popupBloqueo').css({'background-color':opc.transparenciaColor,opacity:opc.transparencia,height:altura}).fadeIn('fast',moverPopup);
						}else{
								moverPopup();
						}
						
						function obtenerPosiciones(){
						    
						    var widthViewport,heightViewport,xScroll,yScroll,widthTotal,heightTotal;
						    
						    if (typeof window.innerWidth != 'undefined'){
						    	
						        widthViewport= window.innerWidth;
						        heightViewport= window.innerHeight;
						        
						    }else if(typeof document.documentElement != 'undefined' && typeof document.documentElement.clientWidth !='undefined' && document.documentElement.clientWidth != 0){
						        
						        widthViewport=document.documentElement.clientWidth;
						        heightViewport=document.documentElement.clientHeight;
						        
						    }else{
						    	
						        widthViewport= document.getElementsByTagName('body')[0].clientWidth;
						        heightViewport=document.getElementsByTagName('body')[0].clientHeight;
						        
						    }
						    
						    xScroll=self.pageXOffset || (document.documentElement.scrollLeft+document.body.scrollLeft);
						    yScroll=self.pageYOffset || (document.documentElement.scrollTop+document.body.scrollTop);
						    widthTotal=Math.max(document.documentElement.scrollWidth,document.body.scrollWidth,widthViewport);
						    heightTotal=Math.max(document.documentElement.scrollHeight,document.body.scrollHeight,heightViewport);
						    
						    return [widthViewport,heightViewport,xScroll,yScroll,widthTotal,heightTotal];
						    
						}

						
						function recalcular(){
							
								var posicion=obtenerPosiciones();
							
								var margenArriba="-"+parseInt(opc.alto/2)+"px";
								var margenIzquierda="-"+parseInt(opc.ancho/2)+"px";

								if(opc.arrastrable==true) $popup.css({'top':($(window).scrollTop()+parseInt(opc.alto/2)+(parseInt(posicion[1]/2)-parseInt(opc.alto/2))),'left':posicion[0]/2+posicion[2]-parseInt(opc.ancho/2),'margin-top':margenArriba,'zIndex':opc.profundidad});
								else $popup.css({'top':($(window).scrollTop()+parseInt(opc.alto/2)+(parseInt(posicion[1]/2)-parseInt(opc.alto/2))),'margin-left':margenIzquierda,'margin-top':margenArriba,'zIndex':opc.profundidad});

						}
						
						function moverPopup(){
								
								$popup.find('select').css({visibility:'visible'});
							
								recalcular();
								
								$popup.slideDown();
								
						}
						
						function cerrarPopup(){
								
								$('select').css({visibility:'visible'});
								
								if(opc.bloqueo==true) $('.AG_popupBloqueo').fadeOut('fast',function(){ $('.AG_popupBloqueo').remove() });
								
								if(opc.arrastrable==false) clearInterval(interval);

								if ($.browser.msie && $.browser.version.substr(0,1)<8) {
									if(opc.bloqueo==true) $('html,body').css({'overflow':'visible'});
								}else {
									if(opc.bloqueo==true) $('body').css({'overflow':'visible'});
								}
								
						}
												
						$popup.find(opc.botonCerrar).bind('click',function(e){
								e.preventDefault();
								$popup.slideUp('fast',cerrarPopup);
						})
						
						if(opc.arrastrable==false) interval=setInterval(recalcular,100);
						
    
       	
    };

    
})(jQuery);
