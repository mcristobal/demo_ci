$(function(){

        $('#web_moduloListado').filter(function(){

                $(this).find('.modulo').bind('mouseover mouseout',function(e){

                        if(e.type=='mouseover') $(this).addClass('modulo_on');
                        if(e.type=='mouseout') $(this).removeClass('modulo_on');

                })

                $(this).find('.botonDesplegar').bind('click',function(e){

                        var extras=$(this).parent().parent().find('.datos').find('.web_extras');

                        if(extras.is(':hidden')){
                                extras.show('fast');
                                $(this).find('.area2').css('visibility','visible');
                        }else{
                                extras.slideUp('fast');
                                $(this).find('.area2').css('visibility','hidden');
                        }

                })

        })

        $('#web_menu ul li ul li').filter(function(){

                $(this).children('a').bind('mouseover mouseout',function(e){

                        if(e.type=='mouseover') $(this).stop().animate({"left": "10px"}, "fast");
                        if(e.type=='mouseout') $(this).stop().animate({"left": "0px"}, "fast");

                })

        })

        $('.web_botonMasDatos .web_boton1').filter(function(f){

                $(this).bind('click', {i: f},function(e){

                        e.preventDefault();

                        $('.web_masDatos').css({'z-index':'0'});
                        $(this).parent().parent().css({'z-index':'1'});

                        if(e.data.i!=f) $('.web_masDatos').hide('fast'); $('.web_bloqueMasDatos').hide('fast'); $('.web_botonMasDatos .web_boton1').stop().animate({"left": "2px"}, "fast"); $('.web_botonMasDatos .web_boton1').text('Ver');

                        var masDatos=$(this).parent().next();
                        if(masDatos.is(':hidden')){
                                masDatos.show('fast');
                                $(this).stop().animate({"left": "240px"}, "fast");
                                $(this).text('Ocultar');
                        }else{
                                masDatos.hide('fast');
                                $(this).stop().animate({"left": "2px"}, "fast");
                                $(this).text('Ver');
                        }
                })
        })
		
		$('.web_botonMasDatos2 .web_boton1').filter(function(f){

                $(this).bind('click', {i: f},function(e){

                        e.preventDefault();

                        $('.web_masDatos2').css({'z-index':'0'});
                        $(this).parent().parent().css({'z-index':'1'});

                        if(e.data.i!=f) $('.web_masDatos2').hide('fast'); $('.web_bloqueMasDatos2').hide('fast'); $('.web_botonMasDatos2 .web_boton1').stop().animate({"left": "2px"}, "fast"); $('.web_botonMasDatos2 .web_boton1').text('Ver mas');

                        var masDatos=$(this).parent().next();
                        if(masDatos.is(':hidden')){
                                masDatos.show('fast');
                                $(this).stop().animate({"left": "240px"}, "fast");
                                $(this).text('Ocultar');
                        }else{
                                masDatos.hide('fast');
                                $(this).stop().animate({"left": "2px"}, "fast");
                                $(this).text('Ver mas');
                        }
                })
        })
})

