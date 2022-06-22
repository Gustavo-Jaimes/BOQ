// Precarga Entrada
	$(document).ready(function() {
		$("#preloader").fadeOut();
	});
// fecha de menu navbar -menu
	$("#menu-nav").click(function(){
		if($("#icon-menu").hasClass("fas fa-angle-down")){
			$("#icon-menu").removeClass("fas fa-angle-down");
			$("#icon-menu").addClass("fas fa-chevron-up");
		}else{
			$("#icon-menu").removeClass("fas fa-chevron-up");
			$("#icon-menu").addClass("fas fa-angle-down");
		}
	});
// fecha de menu navbar -bikes
	$("#bikes-nav").click(function(){
       if($("#icon-bikes").hasClass("fas fa-chevron-up")){
		   $("#icon-bikes").removeClass("fas fa-chevron-up");
		   $("#icon-bikes").addClass("fas fa-angle-down");
	   }else{
		   $("#icon-bikes").removeClass("fas fa-angle-down");
		   $("#icon-bikes").addClass("fas fa-chevron-up");
	   }
	});
// Precarga Salida
	$(".spinnershot").click(function(){
		UIkit.modal("#spinnermodal").show();
	});

// Remover autocompletar
	$("input").attr("autocomplete","off");

// Campos numéricos
	$(".input-number").keypress("keypress", function (e) {
		var keyCode = e.which ? e.which : e.keyCode
		if (!(keyCode >= 48 && keyCode <= 57)) {
			if (keyCode!=46) {
				e.preventDefault();
			}
		}
	});	

// Posicion de los botones flotantes
	var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0)-100;
	$( "#totop" ).css( "top", h);
	$( window ).scroll(function() {
		var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0)-100;
		$( "#totop" ).css( "top", h);
	});
	$( window ).resize(function() {
		var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0)-100;
		$( "#totop" ).css( "top", h);
	});

	$pantalla = $(window);
	$('#arrow-button').addClass("claro");
	$pantalla.scroll(function() {
		if ($pantalla.scrollTop()>300) {
			$('#arrow-button').removeClass("oscuro");
			$('#arrow-button').addClass("claro");
		}else{
			$('#arrow-button').removeClass("claro");
			$('#arrow-button').addClass("oscuro");
		}
	});

// Regresar a la página anterior
	$(".goback").click(function() {
		window.history.go(-1);
	});

// Reductor de tamaño de fuente
	$("#fontsmaller").click(function(){
		var size = $("body").css("font-size");
		var sizeNew = (size.substring(0, 2)*1)-2;
		if (sizeNew<10) {sizeNew=10};
		$("body").css("font-size",sizeNew);
	});
	$("#fontbigger").click(function(){
		var size = $("body").css("font-size");
		var sizeNew = (size.substring(0, 2)*1)+2;
		$("body").css("font-size",sizeNew);
		console.log(sizeNew);
	});

// Enfocar el campo de la ventana modal
	$('.modal').on('shown', function () {
		$('.modal  input:text:visible:first').focus();
	});

// Enfocar el campo de la ventana modal
	$('.modal-login').on('shown', function () {
		$('#login-email').focus();
	});

// Alto de fotos cuadradas
	$(document).ready(function() {
		$(document).ready(function() {
		var alto=$(".pic-sq").width();
		$(".pic-sq").height(alto);
	});
	$( window ).resize(function() {
		var alto=$(".pic-sq").width();
		$(".pic-sq").height(alto);
		});
	})

// Envío de correo
	$(document).ready(function() {
		$("#footersend").click(function(){
			var nombre = $("#footernombre").val();
			var empresa = $("#footerempresa").val();
			var ciudad = $("#footerciudad").val();
			var email = $("#footeremail").val();
			var telefono = $("#footertelefono").val();
			var mensaje = $("#footermensaje").val();
			var fallo = 0;
			var alerta = "";
			
			
			$("input").removeClass("uk-form-danger");
			
			if (mensaje=="") { fallo=1; alerta="Falta mensaje"; id="footermensaje"; }
			if (telefono=="") { fallo=1; alerta="Falta telefono"; id="footertelefono"; }
			if (ciudad=="") { fallo=1; alerta="Falta ciudad"; id="footerciudad"; }
			if (empresa=="") { fallo=1; alerta="Falta empresa"; id="footerempresa"; }

			if (email=="") {fallo=1; alerta="Falta email"; id="footeremail";
			}else{
				var n = email.indexOf("@");
				var l = email.indexOf(".");
				if ((n*l)<2) { 
					fallo=1; alerta="Proporcione un email válido"; id="footeremail";
				} 
			}

			if (nombre=="") { fallo=1; alerta="Falta nombre"; id="footernombre"; }

			
			var parametros = {
				"contacto" : 1,
				"nombre" : nombre,
				"empresa": empresa,
				"ciudad": ciudad,
				"email" : email,
				"telefono" : telefono,
				"mensaje" : mensaje
			};
			if (fallo == 0) {
				$.ajax({
					data:  parametros,
					url:   "includes/acciones.php",
					type:  "post",
					beforeSend: function () {
						$("#footersend").html("<div uk-spinner></div>");
						$("#footersend").prop("disabled",true);
						$("#footersend").disabled = true;
						UIkit.notification.closeAll();
						UIkit.notification('<div class="uk-text-center color-blanco bg-blue padding-10 text-lg"><i  uk-spinner></i> Espere...</div>');
					},
					success:  function (msj) {
						$("#footersend").html("Enviar");
						$("#footersend").disabled = false;
						$("#footersend").prop("disabled",false);
						$("#footernombre").val("");
						$("#footerempresa").val("");
						$("#footerciudad").val("");
						$("#footeremail").val("");
						$("#footertelefono").val("");
						$("#footermensaje").val("");
						
						$(".labelhidden").addClass("alpha0");
						console.log(msj);
						datos = JSON.parse(msj);
						UIkit.notification.closeAll();
						UIkit.notification(datos.msj);
					}
				})
			}else{
				UIkit.notification.closeAll();
				UIkit.notification('<div class="uk-text-center color-blanco bg-danger padding-10 text-lg"><i uk-icon="icon:warning;ratio:2;"></i> &nbsp; '+alerta+'</div>');
				$("#"+id).focus();
				$("#"+id).addClass("uk-form-danger");
			}
		})
	})

// Envío de correo para agendar
$(document).ready(function() {
	$("#agendarsend").click(function(){
		var nombre = $("#agendarnombre").val();
		var empresa = $("#agendarcorreo").val();
		var ciudad = $("#agendarwhatsapp").val();
		var mensaje = $("#agendarmensaje").val();
		var mensaje = $("#agendarfecha").val();
		var mensaje = $("#agendarhora").val();
		var fallo = 0;
		var alerta = "";
		
		
		$("input").removeClass("uk-form-danger");
		
		if (mensaje=="") { fallo=1; alerta="Falta fecha"; id="agendarfecha"; }
		if (mensaje=="") { fallo=1; alerta="Falta hora"; id="agendarhora"; }
		if (telefono=="") { fallo=1; alerta="Falta mensaje"; id="agendarmensaje"; }
		if (ciudad=="") { fallo=1; alerta="Falta whatsapp"; id="agendartelefono"; }

		if (email=="") {fallo=1; alerta="Falta email"; id="agendaremail";
		}else{
			var n = email.indexOf("@");
			var l = email.indexOf(".");
			if ((n*l)<2) { 
				fallo=1; alerta="Proporcione un email válido"; id="agendaremail";
			} 
		}

		if (nombre=="") { fallo=1; alerta="Falta nombre"; id="agendarnombre"; }

		
		var parametros = {
			"contacto" : 1,
			"nombre" : nombre,
			"email" : email,
			"telefono" : telefono,
			"mensaje" : mensaje
		};
		if (fallo == 0) {
			$.ajax({
				data:  parametros,
				url:   "includes/acciones.php",
				type:  "post",
				beforeSend: function () {
					$("#agendarsend").html("<div uk-spinner></div>");
					$("#agendarsend").prop("disabled",true);
					$("#agendarsend").disabled = true;
					UIkit.notification.closeAll();
					UIkit.notification('<div class="uk-text-center color-blanco bg-blue padding-10 text-lg"><i  uk-spinner></i> Espere...</div>');
				},
				success:  function (msj) {
					$("#agendarsend").html("Enviar");
					$("#agendarsend").disabled = false;
					$("#agendarsend").prop("disabled",false);
					$("#agendarnombre").val("");
					$("#footerempresa").val("");
					$("#footerciudad").val("");
					$("#agendaremail").val("");
					$("#agendartelefono").val("");
					$("#agendarmensaje").val("");
					
					$(".labelhidden").addClass("alpha0");
					console.log(msj);
					datos = JSON.parse(msj);
					UIkit.notification.closeAll();
					UIkit.notification(datos.msj);
				}
			})
		}else{
			UIkit.notification.closeAll();
			UIkit.notification('<div class="uk-text-center color-blanco bg-danger padding-10 text-lg"><i uk-icon="icon:warning;ratio:2;"></i> &nbsp; '+alerta+'</div>');
			$("#"+id).focus();
			$("#"+id).addClass("uk-form-danger");
		}
	})
})	

	// equalheight
		equalheight = function(container){
			var altoMax = 0,
			    alto;
				$(container).each(function() {
				  alto=$(this).height();
				  if (alto>altoMax) { altoMax=alto; };
				});
				$(container).height(altoMax);
			}

			setTimeout(function(){
				equalheight('.equal');
			},1000);
			setTimeout(function(){
				equalheight('.equal');
			},5000);

// Animación del botón fijo
	function cotizacionfixedanimate(){
		setTimeout(function(){
			$("#cotizacion-fixed-img").removeClass("uk-animation-shake");
		},2000);
		setTimeout(function(){
			$("#cotizacion-fixed-img").addClass("uk-animation-shake");
		},3000);
		setTimeout(function(){
			cotizacionfixedanimate();
		},5000);
	}
	cotizacionfixedanimate();
