<!DOCTYPE html>
<?=$headGNRL?>

<?php
	if(isset($_SESSION['idioma'])){
		$idioma = $_SESSION['idioma'];
	}else{
		$idioma = "es";
	}
	
		switch ($idioma) {
			case 'es':
				$titulo_slider =  "OPTIMIZANDO PROCESOS";
				$sub_slider = "A TRAVES DE LA CADENA DE VALOR Y SUMINISTRO ";
				$ver = "VER TODOS";
				$saber = "SABER MAS";
				break;
			case 'en':
				$titulo_slider =  "OPTIMIZING PROCESSES";
				$sub_slider = "THROUGH THE SUPPLY AND VALUE CHAIN";
				$ver = "SEE ALL";
				$saber = "KNOW MORE";
				break;
		}
?>


<body>



<?=$header?>
	<section class="inicio-seccion1">
		<div class="uk-position-relative uk-visible-toggle uk-light uk-visible@m" tabindex="-1" uk-slider="autoplay: true" autoplay-interval: 5000>

			<ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-1@s uk-child-width-1-4@m uk-child-width-1-4@xl carousel-container">
				
				<?php
				$cont= 0;
                $CONSULTA10 = $CONEXION -> query("SELECT * FROM galeriaspic WHERE producto = 5");
                while ($row_CONSULTA10 = $CONSULTA10 -> fetch_assoc()) {
                ?>
				<li class="uk-cover-container">
					<div class="uk-cover-container">    
						<img src="./img/contenido/galerias/<?=$row_CONSULTA10['imagen']?>" alt="" uk-cover>
					</div>
				</li>
				<?php } ?>
			</ul>
				
		</div>
		<div class="container-letrero uk-visible@m">
			<div>
				<h1><?=$titulo_slider?></h1>
			</div>
			<div>
			    <p><?=$sub_slider?></p>
			</div>
		</div>

		<div class="uk-position-relative uk-visible-toggle uk-light carousel-container-movil uk-hidden@m" tabindex="-1" uk-slideshow="ratio: 7:3; animation: push">

			<ul class="uk-slideshow-items" style="height: 15em;">
				<?php
				$cont= 0;
                $CONSULTA10 = $CONEXION -> query("SELECT * FROM galeriaspic WHERE producto = 5");
                while ($row_CONSULTA10 = $CONSULTA10 -> fetch_assoc()) {
					$cont++;
					if($cont > 5){
						$cont = 1;
						}
                ?>
				<li>
					<img src="./img/contenido/galerias/<?=$row_CONSULTA10['imagen']?>" alt="" uk-cover>
				</li>
				<?php } ?>
			</ul>

			<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
			<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
		</div>
		<div class="container-letrero-movil uk-hidden@m">
			<div>
				<h1><?=$titulo_slider?></h1>
			</div>
			<div>
			    <p><?=$sub_slider?></p>
			</div>
		</div>

	</section>

	<section class="inicio-seccion2">
		<div class="uk-text-center uk-margin-remove" uk-grid>
			<div class="uk-width-1-5@m uk-visible@m">
				<div class="uk-card uk-card-body"></div>
			</div>
			<div class="uk-width-3-5@m container-letrero"></div>
			<div class="uk-width-1-5@m uk-visible@m">
				<div class="uk-card uk-card-body"></div>
			</div>
		</div>
		<div class="uk-text-center uk-margin-remove" uk-grid>
			<div class="uk-width-1-5@m uk-visible@m">
				<div class="uk-card uk-card-body"></div>
			</div>
			<div class="uk-width-3-5@m container-carousel-opt">
				<div class="uk-card">
			
				<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="autoplay: true" autoplay-interval: 5000>
					<ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid container-carousel-items">
						<?php
						$cont= 0;
						$CONSULTA10 = $CONEXION -> query("SELECT * FROM galeriaspic WHERE producto = 9");
						while ($row_CONSULTA10 = $CONSULTA10 -> fetch_assoc()) {
							
						?>
						<li class="uk-flex uk-flex-center uk-padding-remove">
							<div class="uk-panel container-carousel-opt-card">
								<div style="padding: 0em">
									<img src="./img/contenido/galerias/<?=$row_CONSULTA10['imagen']?>" alt="">
									<p><?=$row_CONSULTA10['alt_'.$idioma]?></p>
								</div>	
							</div>
						</li>
						<?php } ?>
					</ul>

					</div>
				</div>
			</div>
			<div class="uk-width-1-5@m uk-visible@m">
				<div class="uk-card uk-card-body"></div>
			</div>
		</div>

		<div class="uk-text-center uk-margin-remove" uk-grid>
			<div class="uk-width-1-5@m uk-visible@m">
				<div class="uk-card uk-card-body"></div>
			</div>
			<div class="uk-width-3-5@m container-letrero">
				<?php 
					$CONSULTA11 = $CONEXION -> query("SELECT * FROM configuracion");
					$row_CONSULTA11 = $CONSULTA11 -> fetch_assoc();

					if ($idioma === 'es') {
						$sub_titulo = $row_CONSULTA11['tyc1'];
						$titulo_servicio = "SERVICIOS";
						$titulo_curso = "CENTRO DE ENTRENAMIENTO";
						$titulo_proyecto = "CASOS DE EXITO";
					}else{
						$sub_titulo = $row_CONSULTA11['tyc2'];
						$titulo_servicio = "SERVICE";
						$titulo_curso = "ENTERTAINMENT CENTER";
						$titulo_proyecto = "SUCCESS STORIES";
					}
				?>
			</div>
			<div class="uk-width-1-5@m uk-visible@m">
				<div class="uk-card uk-card-body"></div>
			</div>
		</div>

		<div class="uk-text-center uk-margin-remove container-pestana1" uk-grid>
			<div class="uk-width-expand@m">
				<div class=""></div>
			</div>
			<div class="uk-width-1-3@m container-pestana1-corta">
				<div class="">
					<p class="uk-align-left uk-margin-remove"><?=$titulo_servicio?></p>
				</div>
			</div>
		</div>
	</section>
	
	<section class="inicio-seccion3">
		<div class="uk-text-center" uk-grid>
			<div class="uk-width-auto@m uk-visible@m">
				<div class="uk-card uk-card-body"></div>
			</div>
			<div class="uk-width-expand@m container-3">
				<div uk-slider="sets: true">
					<div class="uk-position-relative" tabindex="-1">
						<div class="uk-slider-container uk-light">
				

							<ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-1@s uk-child-width-1-2@m">
								<?php
								$con = 0;
								$CONSULTA10 = $CONEXION -> query("SELECT * FROM servicios");
								while($row_CONSULTA10 = $CONSULTA10 -> fetch_assoc()){
								
								?>
								<li>
									<?=item($row_CONSULTA10['id'])?>
								</li>
								<?php } ?>
							</ul>
						
							<a class="uk-position-center-left-out uk-position-small" href="#" uk-slider-item="previous"><i class='fas fa-caret-square-left uk-visible@m previo-servicios-img'></i></a>
							<a class="uk-position-center-right-out uk-position-small" href="#" uk-slider-item="next"><i class='fas fa-caret-square-right uk-visible@m siguiente-servicios-img'></i></a>
						</div>
					</div>
				</div>

				<p class="uk-margin-remove">
					<a href="<?=$rutaServicios?>" class="uk-button uk-button-primary botongen"><?=$ver?></a>
				</p>
			</div>
			<div class="uk-width-auto@m uk-visible@m">
				<div class="uk-card uk-card-body"></div>
			</div>
		</div>
		<div class="grid-expandido" uk-grid>
			<div class="uk-width-1-3@m container-pestana1-3">
				<div>
					<p class="uk-margin-remove uk-flex uk-flex-right container-pestana-p"><?=$titulo_curso?></p>
				</div>
			</div>
			<div class="uk-width-expand@m ocultar-margin">
				<div class="uk-card"></div>
			</div>
		</div>
	</section>

    <section class="inicio-seccion5"  style="background-color: #e5e5e5;"> 
	  
		<div class="uk-text-center"  uk-grid>
				<div class="uk-width-1-6@m uk-visible@m">
					<div class="uk-card uk-card-body"></div>
				</div>
				<div class="uk-width-expand@m container-4-gen">
				
						<div uk-slider>
							<div class="uk-position-relative" tabindex="-1">
								<div class="uk-slider-container uk-light">
									<ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-3@m container-4">
										<?php
										$cont = 0;
										$CONSULTA3 = $CONEXION -> query("SELECT * FROM productos");  
										while($row_CONSULTA3 = $CONSULTA3 -> fetch_assoc()){
										
										?>
										<li class="container-carousel">
												<?=item_inicio4($row_CONSULTA3['id'])?>
										</li>
										<?php  } ?>
									</ul>

									<a class="uk-position-center-left-out uk-position-small" href="#" uk-slider-item="previous"><i class='fas fa-caret-square-left uk-visible@s previo-img' ></i></a>
									<a class="uk-position-center-right-out uk-position-small" href="#" uk-slider-item="next"><i class='fas fa-caret-square-right uk-visible@s siguiente-img'></i></a>
								</div>
							</div>
						</div>
						<p uk-margin>
							<a href="<?=$rutaServicios?>#boq" class="uk-button uk-button-primary botongen"><?=$ver?></a>
						</p>
				
				</div>
				<div class="uk-width-1-6@m uk-visible@m">
					<div class="uk-card uk-card-body"></div>
				</div>	
			</div>
			<div class="uk-text-center uk-margin-remove" style="background-color: #e5e5e5" uk-grid>
				<div class="uk-width-expand@m">
					<div class=""></div>
				</div>
				<div class="uk-width-1-3@m container-pestana4">
					<div class="container-pestana1-3">
						<p class="uk-align-left uk-margin-remove"><?=$titulo_proyecto?></p>
					</div>
				</div>
		</div>
	  
	</section>

	<section class="inicio-seccion5" style="background-color: white">
		<div class="uk-text-center" uk-grid>
			<div class="uk-width-1-6@m uk-visible@m" >
				<div class="uk-card uk-card-body"></div>
			</div>
			<div class="uk-width-expand@m container-general-5">
				<div uk-slider>
					<div class="uk-position-relative" tabindex="-1">
						<div class="uk-slider-container uk-light">

						<ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-3@m" >
						<?php
						$pro = $CONEXION -> query("SELECT * FROM proyectos");
						 while($row_pro = $pro -> fetch_assoc()){   
							 
						 ?>
							<li class="container-carousel">
								<?=item_inicio5($row_pro['id'])?>
							</li>
						<?php } ?>
						</ul>

						<a class="uk-position-center-left-out uk-position-small" href="#" uk-slider-item="previous"><i class='fas fa-caret-square-left uk-visible@m previo-img-serv'></i></a>
						<a class="uk-position-center-right-out uk-position-small" href="#" uk-slider-item="next"><i class='fas fa-caret-square-right uk-visible@m siguiente-img-serv'></i></a>
					</div>
					<p uk-margin>
						<a href="<?=$rutaProyectos?>" class="uk-button uk-button-primary botongen"><?=$ver?></a>
					</p>
					</div>
				</div>
			</div>
			<div class="uk-width-1-6@m uk-visible@m">
				<div class="uk-card uk-card-body"></div>
			</div>	
		</div>					
	</section>



<?=$footer?>

<?=$scriptGNRL?>



</body>
</html>

