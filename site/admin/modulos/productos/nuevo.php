<?php
// BREADCRUMB
	if (isset($_GET['cat'])) {
		$CATEGORIAS = $CONEXION -> query("SELECT * FROM $modulocat WHERE id = $cat");
		$row_CATEGORIAS = $CATEGORIAS -> fetch_assoc();
		$catNAME=$row_CATEGORIAS['txt'];
		$parent=$row_CATEGORIAS['parent'];
		$CATPARENT = $CONEXION -> query("SELECT * FROM $modulocat WHERE id = $parent");
		$row_CATPARENT = $CATPARENT -> fetch_assoc();
		$parentName=$row_CATPARENT['txt'];
		echo '
		<div class="uk-width-1-1 margin-v-20 uk-text-left">
			<ul class="uk-breadcrumb uk-text-capitalize">
				<li><a href="index.php?rand='.rand(1,1000).'&modulo='.$modulo.'">Productos</a></li>
				<li><a href="index.php?rand='.rand(1,1000).'&modulo='.$modulo.'&archivo=categorias">Categorías</a></li>
				<li><a href="index.php?rand='.rand(1,1000).'&modulo='.$modulo.'&archivo=catdetalle&cat='.$parent.'">'.$parentName.'</a></li>
				<li><a href="index.php?rand='.rand(1,1000).'&modulo='.$modulo.'&archivo=items&cat='.$cat.'">'.$catNAME.'</a></li>
				<li><a href="index.php?rand='.rand(1,1000).'&modulo='.$modulo.'&archivo=nuevo&cat='.$cat.'" class="color-red">Nuevo</a></li>
			</ul>
		</div>';
	}else{
		echo '
		<div class="uk-width-1-1 margin-v-20 uk-text-left">
			<ul class="uk-breadcrumb uk-text-capitalize">
				<li><a href="index.php?rand='.rand(1,1000).'&modulo='.$modulo.'">Productos</a></li>
				<li><a href="index.php?rand='.rand(1,1000).'&modulo='.$modulo.'&archivo=nuevo" class="color-red">Nuevo</a></li>
			</ul>
		</div>';
	}

// DATOS
	echo '
	<div class="uk-width-1-1 margin-top-20 uk-form">
		<div class="uk-container">
			<form action="index.php" method="post" enctype="multipart/form-data" name="datos" onsubmit="return checkForm(this);">
				<input type="hidden" name="nuevo" value="1">
				<input type="hidden" name="modulo" value="'.$modulo.'">
				<input type="hidden" name="archivo" value="'.$archivo.'">
				<div uk-grid class="uk-grid-small uk-child-width-1-3@s">
					<div>
						<label for="sku">SKU</label>
						<input type="text" class="uk-input" name="sku" autofocus required>
					</div>
					<div>
						<label for="titulo">Nombre</label>
						<input type="text" class="uk-input" name="titulo" required>
					</div>
					<div>
						<label for="titulo_en">Name</label>
						<input type="text" class="uk-input" name="titulo_en" required>
					</div>
					<div>
						<label for="ciudad">Ciudad</label>
						<input type="text" class="uk-input" name="ciudad" required>
					</div>
					<div hidden>
						<label for="material">Material</label>
						<input type="text" class="uk-input" name="material" >
					</div>

					<div>
						<label for="categoria">Categoría y subcategoría</label>
						<div>
							<select name="categoria" data-placeholder="Seleccione una" class="chosen-select uk-select" required>
								<option value=""></option>';
									$CONSULTA = $CONEXION -> query("SELECT * FROM productoscat WHERE parent = 0 ORDER BY txt");
									$numCats=$CONSULTA->num_rows;
									if ($numCats==0) {
										// Si no hay categorías, entonces lo mandamos a que haga una
										$scripts='window.location = ("index.php?rand='.rand(1,1000).'&modulo='.$modulo.'&archivo=categorias");';
									}
									while ($row_CONSULTA = $CONSULTA -> fetch_assoc()) {
										$parentId=$row_CONSULTA['id'];
										$parentTxt=$row_CONSULTA['txt'];
										echo '
											<optgroup label="'.$parentTxt.'">';
										$CONSULTA1 = $CONEXION -> query("SELECT * FROM productoscat WHERE parent = $parentId ORDER BY txt");
										$numCats=$CONSULTA1->num_rows;
										if ($numCats==0) {
											// Si no hay subcategorías, entonces lo mandamos a que haga una
											// $scripts='window.location = ("index.php?rand='.rand(1,1000).'&modulo='.$modulo.'&archivo=categorias");';
										}
										while ($row_CONSULTA1 = $CONSULTA1 -> fetch_assoc()) {
											if (isset($cat) AND $cat==$row_CONSULTA1['id']) {
												$estatus='selected';
											}else{
												$estatus='';
											}
											echo '
											<option value="'.$row_CONSULTA1['id'].'" '.$estatus.'>'.$row_CONSULTA1['txt'].'</option>';
										}
										echo '
											</optgroup>';
									}
									echo '
							</select>
						</div>
					</div>

					<div hidden>
						<label for="marca">Marca</label>
						<div>
							<select name="marca" data-placeholder="Seleccione una" class="chosen-select uk-select">
								<option value="3" selected></option>';
								$CONSULTA1 = $CONEXION -> query("SELECT * FROM productosmarcas ORDER BY txt");
								while ($row_CONSULTA1 = $CONSULTA1 -> fetch_assoc()) {
									if (isset($cat) AND $cat==$row_CONSULTA1['id']) {
										$estatus='selected';
									}else{
										$estatus='';
									}
									echo '
									<option value="'.$row_CONSULTA1['id'].'" '.$estatus.'>'.$row_CONSULTA1['txt'].'</option>';
								}
								echo '
							</select>
						</div>
					</div>

				<!--<div>
						<label for="guia">Tipo de guia</label>
						<div>
							<select name="guia" data-placeholder="Seleccione una" class="chosen-select uk-select">
								<option value="" selected></option>';
								$CONSULTA1 = $CONEXION -> query("SELECT * FROM guias ORDER BY orden");
								while ($row_CONSULTA1 = $CONSULTA1 -> fetch_assoc()) {
									echo '
									<option value="'.$row_CONSULTA1['id'].'">'.$row_CONSULTA1['titulo'].'</option>';
								}
								echo '
							</select>
						</div>
					</div> -->
					
					<div>
						<label for="tipotalla">Fecha Relacionadas</label>
						<div>
							<select name="tipotalla" data-placeholder="Seleccione una" class="chosen-select uk-select" required>

								<option value="3" selected></option>';

								$CONSULTA1 = $CONEXION -> query("SELECT * FROM productostallaclasif ORDER BY txt");
								$numTallas=$CONSULTA1->num_rows;
								if ($numTallas==0) {
									// Si no hay subcategorías, entonces lo mandamos a que haga una
									$scripts='window.location = ("index.php?rand='.rand(1,1000).'&modulo='.$modulo.'&archivo=categorias");';
								}
								while ($row_CONSULTA1 = $CONSULTA1 -> fetch_assoc()) {
									echo '
									<option value="'.$row_CONSULTA1['id'].'" '.$estatus.'>'.$row_CONSULTA1['txt'].'</option>';
								}
								echo '
							</select>
						</div>
					</div>
					
					<div >
						<label for="precio">Precio de lista</label>

						<input type="text" class="uk-input input-number" name="precio" min="0" value="0" required>

					</div>
					<div class="uk-margin">
						<label for="fecha">Fecha</label>
						<input type="date" class="uk-textarea" name="Fecha"></input>
					</div>
					<div >
						<label for="descuento">Descuento</label>
						<input type="text" class="uk-input input-number descuento" name="descuento" value="0" min="0" required>
					</div>
				</div>
				
				<label for="palabras_clave">Productos relacionados: <span id="claves_txt"> </span></label>
				<input type="hidden" class="uk-input" name="relacionados" id="relacionados" value="">

					<div class="uk-card uk-card-default uk-padding">
						<div class="uk-child-width-1-6" uk-grid>
						';
						$CONSULTAF = $CONEXION -> query("SELECT * FROM productos ORDER BY txt");
								while ($row_CONSULTAF = $CONSULTAF -> fetch_assoc()){
						echo '<div>
								<input class="uk-checkbox check-clave" type="checkbox" value="'.$row_CONSULTAF['id'].'"> '.$row_CONSULTAF['titulo'].'
							</div> ';
								}
						echo'
						</div>
					</div>

				<div class="uk-margin">
					<label for="txt">Descripción</label>
					<textarea class="editor" name="txt" id="txt"></textarea>
				</div>
				<div class="uk-margin">
					<label for="txt">Description</label>
					<textarea class="editor" name="txt_en" id="txt"></textarea>
				</div>
				<div class="uk-margin">
					<label for="txt">Objetivo</label>
					<textarea class="editor" name="objetivo" id="objetivo"></textarea>
				</div>
				<div class="uk-margin">
					<label for="txt">Objective</label>
					<textarea class="editor" name="objetivo_en" id="objetivo"></textarea>
				</div>
				<div class="uk-margin">
					<label for="txt">Dirigido a:</label>
					<textarea class="editor" name="dirigido" id="dirigido"></textarea>
				</div>
				<div class="uk-margin">
					<label for="txt">Addressed to:</label>
					<textarea class="editor" name="dirigido_en" id="dirigido"></textarea>
				</div>
				<div class="uk-margin">
					<label for="txt">Plan del curso</label>
					<textarea class="editor" name="especificaciones" id="especificaciones"></textarea>
				</div>
				<div class="uk-margin">
					<label for="txt">Course plan</label>
					<textarea class="editor" name="especificaciones_en" id="especificaciones"></textarea>
				</div>
				<div class="uk-margin">
					<label for="txt">Reserva tu lugar:</label>
					<textarea class="editor" name="reserva" id="reserva"></textarea>
				</div>
				<div class="uk-margin">
					<label for="txt">Reserve your place:</label>
					<textarea class="editor" name="reserva_en" id="reserva"></textarea>
				</div>

				<div class="uk-margin">
					<label for="title">Título google</label>
					<input type="text" class="uk-input" name="title">
				</div>
				<div class="uk-margin">
					<label for="metadescription">Descripción google</label>
					<textarea class="uk-textarea" name="metadescription"></textarea>
				</div>
				<div class="uk-margin uk-text-center">
					<a href="index.php?rand='.rand(1,1000).'&modulo='.$modulo.'" class="uk-button uk-button-default uk-button-large" tabindex="10">Cancelar</a>
					<button name="send" class="uk-button uk-button-primary uk-button-large">Guardar</button>
				</div>

			</form>
		</div>
	</div>
	';

	$scripts='
	var claves = [];

	$(".check-clave").change( function(){
		
			if($(this).prop( "checked" )) {
					var cla = $(this).val()
					claves.push(cla)
		            $("#claves_txt").html(claves.toString())
		    }else{
		    		var cla = $(this).val()
		    		claves = claves.filter(function(item){
						  return item !== cla;
						});
		    		 $("#claves_txt").html(claves.toString())
		    }

		 $("#relacionados").val(claves);
	})
	';