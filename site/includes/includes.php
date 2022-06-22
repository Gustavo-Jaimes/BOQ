<?php
/* %%%%%%%%%%%%%%%%%%%% MENSAJES               */
	if($mensaje!=''){
		$mensajes='
			<div class="uk-container">
				<div uk-grid>
					<div class="uk-width-1-1 margin-v-20">
						<div class="uk-alert-'.$mensajeClase.'" uk-alert>
							<a class="uk-alert-close" uk-close></a>
							'.$mensaje.'
						</div>					
					</div>
				</div>
			</div>';
	}

/* %%%%%%%%%%%%%%%%%%%% RUTAS AMIGABLES        */
		$rutaInicio 		=	$ruta;
		$rutaTienda 		=	$ruta.'0_0_0_tienda_wozial';
		$rutaPedido			=	$ruta.rand(1,999999999).'_revisar_orden';
		$rutaPedido2		=	$ruta.'revisar_datos_personales';
		$rutaServicios      =   $ruta.'servicios';
		$rutaMaterial       =   $ruta.'material';
		$rutaProyectos		=	$ruta.'proyectos';
		$rutaMaterial3		=	$ruta.'material3';
		$rutaNosotros		=	$ruta.'nosotros';
		$rutaContacto		=	$ruta.'contacto';
		$rutaFaq	     	=	$ruta.'faq';
		$rutaPrivacidad	    =	$ruta.'privacidad';
		$rutaAgenda		    =	$ruta.'agenda';
		$rutaArticulos		=	$ruta.'0_0_0_articulos';
		$rutaEspecificaciones		=	$ruta.'especificaciones';

/* %%%%%%%%%%%%%%%%%%%% MENU                   */
	$menu='
		<li class="'.$nav1.'"><a class="" href="'.$rutaInicio.'"><b>INICIO > </b></a></li>
		<li class="'.$nav2.'"><a class="" href="'.$rutaServicios.'"><b>SERVICIOS</b></a></li>
		<li class="'.$nav3.'"><a class="" href="'.$rutaMaterial .'"><b>MATERIAL</b></a></li>
		<li class="'.$nav4.'"><a class="" href="'.$rutaProyectos.'"><b>MATERIAL2</b></a></li>
		<li class="'.$nav5.'"><a class="" href="'.$rutaMaterial3.'"><b>MATERIAL3</b></a></li>
		<li class="'.$nav6.'"><a class="" href="'.$rutaNosotros.'"><b>NOSOTROS</b></a></li>
		<li class="'.$nav7.'"><a class="" href="'.$rutaContacto.'"><b>CONTACTO</b></a></li>
		<li class="'.$nav8.'"><a class="" href="'.$rutaFaq.'"><b>FAQ</b></a></li>
		<li class="'.$nav9.'"><a class="" href="'.$rutaPrivacidad.'"><b>PRIVACIDAD</b></a></li>
		';

		if(isset($_SESSION['idioma'])){
			$idioma = $_SESSION['idioma'];
		}else{
			$idioma = "es";
		}
		
			switch ($idioma) {
				case 'es':
					$quien = "¿QUIENES SOMOS?";
					$mision="MISION Y VISION";
					$expertos="NUESTROS EXPERTOS";
					$consultoria ="CONSULTORIA";
					$centro="CENTRO DE ENTRENAMIENTO";
					$industrias= "INDUSTRIAS";
					$tecnologia ="TECNOLOGIA";
					$caso = "CASOS DE EXITO";
					$inicio = "INICIO";
					$servicios = "SERVICIOS";
					$nosotros = "NOSOTROS";
					$proyectos = "NUESTROS <br> CLIENTES";
					$contacto = "CONTACTO";
					$privacidad = "PRIVACIDAD";
					$footer = "2021 TODOS LOS DERECHOS RESERVADOS. DESARROLLADO POR";
					break;
	
				case 'en':
					$quien = "¿ABOUT US?";
					$mision="MISSION AND VISION";
					$expertos="OUR EXPERTS";
					$consultoria ="CONSULTANCY";
					$centro="ENTERTAINMENT CENTER";
					$industrias= "INDUSTRIES";
					$tecnologia ="TECHNOLOGY";
					$caso = "SUCCESSFUL CASES";
					$inicio = "BEGINNING";
					$servicios = "SERVICES";
					$nosotros = "US";
					$proyectos = "OUR CLIENTS";
					$contacto = "CONTACT";
					$inicio = "BEGINNING";
					$privacidad = "PRIVACY";
					$footer = "2021 ALL RIGHTS RESERVED. DEVELOPED BY";
					break;
			}
	$menuMovil='
		<nav style="margin-top: -15em">
			<ul>
				<li><a href="'.$rutaInicio.'">'.$inicio.'</a></li>
				<li class="submenu">
					<a href="#">'.$nosotros.'<i style="color: white" class="fas fa-caret-down"></i></a>
					<ul class="children" style="display: none">
						<li><a href="'.$rutaNosotros.'" style="background-color: #001121; margin-left: 1em;">'.$quien.'</a></li>
						<li><a href="'.$rutaNosotros.'#mision" style="background-color: #001121; margin-left: 1em;">'.$mision.'</a></li>
						<li><a href="'.$rutaNosotros.'#instructores" style="background-color: #001121; margin-left: 1em;">'.$expertos.'</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#">'.$servicios.'<i style="color: white" class="fas fa-caret-down"></i></a>
					<ul class="children" style="display: none">
						<li><a href="'.$rutaServicios.'" style="background-color: #001121; margin-left: 1em;">'.$consultoria.'</a></li>
						<li><a href="'.$rutaServicios.'#boq" style="background-color: #001121; margin-left: 1em;">'.$centro.'</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#">'.$proyectos.'<i style="color: white" class="fas fa-caret-down"></i></a>
					<ul class="children" style="display: none">
						<li><a href="'.$rutaServicios.'#industria" style="background-color: #001121; margin-left: 1em;">'.$industrias.'</a></li>
						<li><a href="'.$rutaServicios.'#tecnologia" style="background-color: #001121; margin-left: 1em;">'.$tecnologia.'</a></li>
						<li><a href="'.$rutaProyectos.'" style="background-color: #001121; margin-left: 1em;">'.$caso.'</a></li>
					</ul>
				</li>
				<li><a href="'.$rutaContacto.'">'.$contacto.'</a></li>
				<li style="cursor: pointer;">	
					<img class="idioma" data-idi="es" style="width: 2em;" src="./img/design/mexico.png" alt="">
					<img class="idioma" data-idi="en" style="width: 2em;" src="./img/design/usa.png" alt="">
				</li>
			</ul>
		</nav>
		';

/* %%%%%%%%%%%%%%%%%%%% HEADER                 */

$header='
<div class="uk-offcanvas-content">

	<header style="width: 100%;">
		<div class="uk-margin-remove" style="background-color: black">
			<div uk-grid >

				<!-- Botón menú móviles -->
				<div class="uk-width-1-2 uk-hidden@m">
					<a href="#menu-movil" uk-toggle class="uk-button uk-button-default color-primary"><i class="fa fa-bars" aria-hidden="true"></i> &nbsp; MENÚ</a>
				</div>
			

				<!-- Menú escritorio -->
				<div class="uk-width-expand@m uk-visible@m header-container " style=" position:fixed; z-index: 4;top: 0em;left: 0%; width: 100%;height: 2em;">
					
			    	<nav class="uk-navbar-container navbar-container" uk-navbar style="background-color: #1e1e1e;">
						<div class="uk-navbar-left navbar-container-logo">
							<a class="uk-navbar-item uk-logo" href="'.$rutaInicio.'"><img src="./img/design/logo.png" alt=""></a>
						</div>


						<div class="uk-navbar-right container-items-header">
							<ul class="uk-navbar-nav items-opc">
								<li>
									<a href="'.$rutaNosotros.'">'.$nosotros.'</a>
									<div class="uk-navbar-dropdown navbar-sub-menu">
										<ul class="uk-nav uk-navbar-dropdown-nav">
											<li><a href="'.$rutaNosotros.'">'.$quien.'</a></li>
											<li><a href="'.$rutaNosotros.'#mision">'.$mision.'</a></li>
											<li><a href="'.$rutaNosotros.'#instructores">'.$expertos.'</a></li>
										</ul>
									</div>
								</li>
								<li>
									<a href="'.$rutaServicios.'">'.$servicios.'</a>
									<div class="uk-navbar-dropdown navbar-sub-menu">
										<ul class="uk-nav uk-navbar-dropdown-nav">
											<li><a href="'.$rutaServicios.'">'.$consultoria.'</a></li>
											<li><a href="'.$rutaServicios.'#boq">'.$centro.'</a></li>
										</ul>
									</div>
								</li>
								<li>
									<a href="'.$rutaProyectos.'">'.$proyectos.'</a>
									<div class="uk-navbar-dropdown navbar-sub-menu">
										<ul class="uk-nav uk-navbar-dropdown-nav">
											<li><a href="'.$rutaServicios.'#industria">'.$industrias.'</a></li>
											<li><a href="'.$rutaServicios.'#tecnologia">'.$tecnologia.'</a></li>
											<li><a href="'.$rutaProyectos.'">'.$caso.'</a></li>
										</ul>
									</div>
								</li>
								<li><a href="'.$rutaContacto.'">'.$contacto.'</a></li>
								<li>
									<a href=""><img src="./img/design/traductor-img.png" alt=""></a>
									<div class="uk-navbar-dropdown navbar-sub-menu uk-padding-remove">
										<ul class="uk-nav uk-navbar-dropdown-nav ">
											<li class="" style="cursor: pointer;">
												<img class="idioma" data-idi="es" src="./img/design/mexico.png" alt="">
												<img class="idioma" data-idi="en" src="./img/design/usa.png" alt="">
												<img src="./img/design/alemania.png" alt="">
											</li>
										</ul>
									</div>
								</li>
								<!-- <li><a href=""><img src="./img/design/carrito.png" alt=""></a></li>-->
							</ul>
						</div>
						</div>
					</nav>
				</div>
	</header>
			
	<!-- Menú móviles -->
	<div id="menu-movil" uk-offcanvas="mode: push;overlay: true">
		<div class="uk-offcanvas-bar uk-flex uk-flex-column">
			<button class="uk-offcanvas-close" type="button" uk-close></button>
			<ul class="uk-nav uk-nav-primary uk-nav-parent-icon uk-nav-center uk-margin-auto-vertical" uk-nav>
				'.$menuMovil.'
			</ul>
		</div>
	</div>
</div>';
		

/* %%%%%%%%%%%%%%%%%%%% FOOTER                 */
	$whatsIconClass=(isset($_SESSION['whatsappHiden']))?'':'uk-hidden';
	$stickerClass=($carroTotalProds==0 OR $identificador==500 OR $identificador==501 OR $identificador==502)?'uk-hidden':'';
	$footer='
	<footer>
		<div class="bg-footer" style="z-index: 0;">
			<div class="uk-container-expand uk-position-relative container-footer">

				<div class="uk-text-center" uk-grid>
					<div class="uk-width-1-6@m" style="background-color: #000000">
						<div class="uk-card uk-card-body" style="background-color: #000000; padding-top: 0em;"></div>
					</div>
					<div class="uk-width-1-5@m uk-flex uk-flex-middle uk-margin-remove footer-sucursal" style="background-color: #000000;padding: 0;">
						<div class="uk-text-center footer-card" uk-grid>
							<div class="uk-width-auto@m uk-flex uk-flex-middle">
								<div class="uk-flex-right "><img src="./img/design/mexico.png" class="paises" alt=""></div>
							</div>
							<div class="uk-width-expand@m uk-margin-remove footer-box-letter">
								<div class="footer-txt" >
									<p class="pais"><b>MEXICO</b></p>
									<p>33 3333 3333</p>
									<p>mex@boq-consulting.com</p>
								</div>
							</div>
						</div>
					</div>
					<div class="uk-width-1-5@m uk-flex uk-flex-middle uk-margin-remove footer-sucursal" style="background-color: #000000;padding: 1em 0;">
						<div class="uk-text-center footer-card" uk-grid>
							<div class="uk-width-auto@m uk-flex uk-flex-middle">
								<div class="uk-flex-right"><img src="./img/design/usa.png" class="paises" alt=""></div>
							</div>
							<div class="uk-width-expand@m" style="padding: 0; margin: 0;">
								<div class="uk-width-expand@m uk-margin-remove footer-box-letter"">
									<div class="footer-txt">
										<p class="pais"><b>USA</b></p>
										<p>33 3333 3333</p>
										<p>mex@boq-consulting.com</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="uk-width-1-5@m uk-flex uk-flex-middle uk-margin-remove footer-sucursal" style="padding: 0; background-color: #000000;">
						<div class="uk-text-center footer-card" uk-grid>
							<div class="uk-width-auto@m uk-flex uk-flex-middle">
								<div class="uk-flex-right"><img src="./img/design/alemania.png" class="paises" alt=""></div>
							</div>
							<div class="uk-width-expand@m uk-margin-remove footer-box-letter">
								<div class="footer-txt">
									<p class="pais"><b>ALEMANIA</b></p>
									<p>33 3333 3333</p>
									<p>mex@boq-consulting.com</p>
								</div>
							</div>
						</div>
					</div>
					<div class="uk-width-expand@m uk-margin-remove" style="background-color: black;">
						<div class="uk-card">
						</div>
					</div>
				</div>

				<div class="uk-text-center container-enlaces" uk-grid>
					<div class="uk-width-1-6@m">
						<div class="uk-card"></div>
					</div>
					<div class="uk-width-2-5@m container-enlaces2-5" style="padding: 1em 0;">
						<div class="container-enlaces-gen">
							<div class="uk-grid">
							<!-- <div class="items"><a href="'.$rutaInicio.'">INICIO</a></div>
								<div><a href="'.$rutaServicios.'">'.$servicios.'</a></div>
								<div><a href="'.$rutaProyectos.'">'.$proyectos.'</a></div> -->
								<div><a href="'.$rutaFaq.'">F.A.Q</a></div>
								<div><a href="'.$rutaPrivacidad.'">'.$privacidad.'</a></div>
								<div><a href="'.$rutaPrivacidad.'">TERMINOS Y CONDICIONES</a></div>
						<!--	<div><a href="'.$rutaContacto.'">'.$contacto.'</a></div> -->
							</div>
						</div>
					</div>
					<div class="uk-width-1-5@m footer-container-icon uk-margin-remove uk-flex uk-flex-middle" style="background-color: #1e1e1e;">
						<div class="">
							<a href="" class="uk-icon-button  uk-margin-small-right" style="background-color: #ff4f00;" uk-icon="facebook"></a>
							<a href="" class="uk-icon-button  uk-margin-small-right" style="background-color: white;"><img src="./img/design/inta.png" alt=""></a>
							<a href="" class="uk-icon-button" style="background-color: white;"><img src="./img/design/whats.png" alt=""></a>
						</div>
					</div>
					<div class="uk-width-expand@m" style="margin: 0">
						<div class="uk-card">
						</div>
					</div>
				</div>

				<div class="uk-width-1-1@m uk-text-center">
					<div class="padding-v-50 derechos-wozial">
				<!--'.date('Y').' '.$footer.' <a href="https://wozial.com/" target="_blank" class="color-blanco">WOZIAL MARKETING LOVERS</a> -->
					</div> 
				</div>
			</div>
		</div>
	</footer>

		<div id="cotizacion-fixed" class="uk-position-top uk-height-viewport '.$stickerClass.'">
			<div>
				<a class="" href="'.$rutaPedido.'"><img src="img/design/checkout.png" id="cotizacion-fixed-img"></a>
			</div>
		</div>

		'.$loginModal.'

	</div>

	<div id="spinnermodal" class="uk-modal-full" uk-modal>
		<div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle uk-height-viewport">
			<div>
				<div class="claro" uk-spinner="ratio: 5">
				</div>
			</div>
		</div>
   	</div>';

/* %%%%%%%%%%%%%%%%%%%% HEAD GENERAL                */
	$headGNRL='
		<html lang="'.$languaje.'">
		<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">

			<meta charset="utf-8">
			<title>'.$title.'</title>
			<meta name="description" content="'.$description.'" />
			<meta property="fb:app_id" content="'.$appID.'" />
			<link rel="image_src" href="'.$ruta.$logoOg.'" />

			<meta property="og:type" content="website" />
			<meta property="og:title" content="'.$title.'" />
			<meta property="og:description" content="'.$description.'" />
			<meta property="og:url" content="'.$rutaEstaPagina.'" />
			<meta property="og:image" content="'.$ruta.$logoOg.'" />

			<meta itemprop="name" content="'.$title.'" />
			<meta itemprop="description" content="'.$description.'" />
			<meta itemprop="url" content="'.$rutaEstaPagina.'" />
			<meta itemprop="thumbnailUrl" content="'.$ruta.$logoOg.'" />
			<meta itemprop="image" content="'.$ruta.$logoOg.'" />

			<meta name="twitter:title" content="'.$title.'" />
			<meta name="twitter:description" content="'.$description.'" />
			<meta name="twitter:url" content="'.$rutaEstaPagina.'" />
			<meta name="twitter:image" content="'.$ruta.$logoOg.'" />
			<meta name="twitter:card" content="summary" />

			<meta name="viewport" content="width=device-width user-scalable=no"/>
	

			<link rel="icon"            href="'.$ruta.'img/design/favicon.ico" type="image/x-icon">
			<link rel="shortcut icon"   href="img/design/favicon.ico" type="image/x-icon">
			<link rel="stylesheet"      href="https://cdn.jsdelivr.net/npm/uikit@'.$uikitVersion.'/dist/css/uikit.min.css" />
			<link rel="stylesheet/less" href="css/general.less" >
			<link rel="stylesheet"      href="https://fonts.googleapis.com/css?family=Lato:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
			<link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Asap:wght@400;700&display=swap" rel="stylesheet">
			<link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">

			<!-- jQuery is required -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

			<!-- UIkit JS -->
			<script src="https://cdn.jsdelivr.net/npm/uikit@'.$uikitVersion.'/dist/js/uikit.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/uikit@'.$uikitVersion.'/dist/js/uikit-icons.min.js"></script>

			<!-- Font Awesome -->
			<script src="https://kit.fontawesome.com/910783a909.js" crossorigin="anonymous"></script>

			<!-- Less -->
			<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>
		</head>';

/* %%%%%%%%%%%%%%%%%%%% SCRIPTS                */
	$scriptGNRL='
		<script src="js/general.js"></script>

	<!--	<script src="//code.jivosite.com/widget.js" data-jv-id="R4ZWEOn0XH" async></script> -->
		
		';

	// Script login Facebook
	$scriptGNRL.=(!isset($_SESSION['uid']) AND $dominio != 'localhost' AND isset($facebookLogin))?'
		<script>
			// Esta es la llamada a facebook FB.getLoginStatus()
			function statusChangeCallback(response) {
				if (response.status === "connected") {
					procesarLogin();
				} else {
					console.log("No se pudo identificar");
				}
			}

			// Verificar el estatus del login
			function checkLoginState() {
				FB.getLoginStatus(function(response) {
					statusChangeCallback(response);
				});
			}

			// Definir características de nuestra app
			window.fbAsyncInit = function() {
				FB.init({
					appId      : "'.$appID.'",
					xfbml      : true,
					version    : "v'.$appVersion.'"
				});
				FB.AppEvents.logPageView();
			};

			// Ejecutar el script
			(function(d, s, id){
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/es_LA/sdk.js";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, \'script\', \'facebook-jssdk\'));
			
			// Procesar Login
			function procesarLogin() {
				FB.api(\'/me?fields=id,name,email\', function(response) {
					console.log(response);
					$.ajax({
						method: "POST",
						url: "includes/acciones.php",
						data: { 
							facebooklogin: 1,
							nombre: response.name,
							email: response.email,
							id: response.id
						}
					})
					.done(function( response ) {
						console.log( response );
						datos = JSON.parse( response );
						UIkit.notification.closeAll();
						UIkit.notification(datos.msj);
						if(datos.estatus==0){
							location.reload();
						}
					});
				});
			}
		</script>

		':'';


// Reportar actividad
	$scriptGNRL.=(!isset($_SESSION['uid']))?'':'
		<script>
			var w;
			function startWorker() {
			  if(typeof(Worker) !== "undefined") {
			    if(typeof(w) == "undefined") {
			      w = new Worker("js/activityClientFront.js");
			    }
			    w.onmessage = function(event) {
					//console.log(event.data);
			    };
			  } else {
			    document.getElementById("result").innerHTML = "Por favor, utiliza un navegador moderno";
			  }
			}
			startWorker();
		</script>
		';
// %%%%%%%%%%%%%%%% LENGUAJE


/* %%%%%%%%%%%%%%%%%%%% BUSQUEDA               */
	$scriptGNRL.='
		<script>
			$(document).ready(function(){
				$(".search").keyup(function(e){
					if(e.which==13){
						var consulta=$(this).val();
						var l = consulta.length;
						if(l>2){
							window.location = ("'.$ruta.'"+consulta+"_gdl");
						}else{
							UIkit.notification.closeAll();
							UIkit.notification("<div class=\'bg-danger color-blanco\'>Se requiren al menos 3 caracteres</div>");
						}
					}
				});
				$(".search-button").click(function(){
					var consulta=$(".search-bar-input").val();
					var l = consulta.length;
					if(l>2){
						window.location = ("'.$ruta.'"+consulta+"_gdl");
					}else{
						UIkit.notification.closeAll();
						UIkit.notification("<div class=\'bg-danger color-blanco\'>Se requiren al menos 3 caracteres</div>");
					}
				});
			});
		</script>';

		//ESTE SCRIPT HACE EL CAMBIO DE IDIOMA
		
		$scriptGNRL.='
		<script>
			$(".idioma").click(function(){
				let lenguaje = $(this).attr("data-idi");
				let pagina_actual = "'.$_SERVER["REQUEST_URI"].'"
				$.ajax({
				method: "POST",
				url: "includes/acciones.php",
				data: {
					cambioIdioma: 1,
					idioma: lenguaje,
				}
				}).done(function() {
					location.reload();
					});
			});	
		</script>';

		$scriptGNRL.='
		<script>
			$(document).ready(main);

			var contador = 1;
			
			function main () {
				$(".menu_bar").click(function(){
					if (contador == 1) {
						$("nav").animate({
							left: "0"
						});
						contador = 0;
					} else {
						contador = 1;
						$("nav").animate({
							left: "-100%"
						});
					}
				});
			
				// Mostramos y ocultamos submenus
				$(".submenu").click(function(){
					$(this).children(".children").slideToggle();
				});
			}
		
		</script>';




/* %%%%%%%%%%%%%%%%%%%% WHATSAPP PLUGIN               
	$scriptGNRL.=(isset($_SESSION['whatsappHiden']))?'':'
		<script>
			setTimeout(function(){
				$("#whatsapp-plugin").addClass("uk-animation-slide-bottom-small");
				$("#whatsapp-plugin").removeClass("uk-hidden");
			},1000);
			setTimeout(function(){
				$("#whats-body-1").addClass("uk-hidden");
				$("#whats-body-2").removeClass("uk-hidden");
			},6000);
		</script>
			'; */
