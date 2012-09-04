function mensajePregunta(div_msg) {

	$.blockUI({
		message: $(div_msg),
		overlayCSS: {
			backgroundColor: '#7a7a78',
			opacity: '0.9'
		},
		forceIframe: true,
		css: {
			cursor: 'wait',
			padding: '10px 5px',
			border: '1px solid #7a7a78',
			color: '#7a7a78',
			font: 'bold 22px Tahoma'
		}
	});

}

function mensajeSoloError(msg_error) {

	$.blockUI({
		message: msg_error,
		overlayCSS: {
			backgroundColor: '#7a7a78',
			opacity: '0.9'
		},
		forceIframe: true,
		css: {
			cursor: 'wait',
			padding: '10px 5px',
			border: '1px solid #7a7a78',
			color: '#7a7a78',
			font: 'bold 14px Tahoma'
		}
	});
	setTimeout(function() {
		$.unblockUI();
	},
	2000);
}

function bloqueo(msg) {

	$.blockUI({
		message: msg,
		overlayCSS: {
			backgroundColor: '#7a7a78',
			opacity: '0.9'
		},
		forceIframe: true,
		css: {
			cursor: 'wait',
			padding: '10px 5px',
			border: '1px solid #7a7a78',
			color: '#7a7a78',
			font: 'bold 14px Tahoma'
		}
	})
}