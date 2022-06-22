<?php
	$modulo='sucursales';
	$rutaFinal='../img/contenido/'.$modulo.'/';
//%%%%%%%%%%%%%%%%%%%%%%%%%%    Nuevo Artículo     %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	if(isset($_POST['nuevo'])){ 
		// Obtenemos los valores enviados
			$lat='20.667703809107746';
			$lon='-103.34699871873852';

		// Actualizamos la base de datos
		if(!isset($fallo)){
			$sql = "INSERT INTO $modulo (fecha, lat, lon)".
				"VALUES ('$hoy', '$lat', '$lon')";
			if($insertar = $CONEXION->query($sql)){
				$exito=1;
				$legendSuccess .= "<br>Nuevo";
				$editarNuevo=1;
				$id=$CONEXION->insert_id;
				$archivo='detalle';
			}else{
				$fallo=1;  
				$legendFail .= "<br>No se pudo agregar a la base de datos - $cat";
			}
		}else{
			$legendFail .= "<br>La categoría o marca están vacíos.";
		}
	}
//%%%%%%%%%%%%%%%%%%%%%%%%%%    Editar Artículo     %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	if(isset($_REQUEST['editar']) OR isset($editarNuevo)) {
		// Obtenemos los valores enviados

		$fallo=1;  
		$legendFail .= "<br>No se pudo modificar la base de datos";
		foreach ($_POST as $key => $value) {

				$dato = str_replace("'", "&#039;", $value);
			
			$actualizar = $CONEXION->query("UPDATE $modulo SET $key = '$dato' WHERE id = $id");
			$exito=1;
			unset($fallo);
		}
	}

//%%%%%%%%%%%%%%%%%%%%%%%%%%    Editar mapa   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	if (isset($_POST['editarmapa'])) {
		include '../../../includes/connection.php';

		$id    = $_POST['id'];
		$valor = $_POST['valor'];
		$valor = str_replace('(', '', $valor);
		$valor = str_replace(')', '', $valor);
		$array = explode(',', $valor);
		$lat   = trim($array[0]);
		$lon   = trim($array[1]);

		if ($actualizar = $CONEXION->query("UPDATE $modulo SET lat = '$lat', lon = '$lon' WHERE id = $id")) {
			$mensajeClase='success';
			$mensajeIcon='check';
			$mensaje='Guardado -'.$id;
		}else{
			$mensajeClase='danger';
			$mensajeIcon='ban';
			$mensaje='No se pudo guardar';
		}
		echo '<div class="uk-text-center color-white bg-'.$mensajeClase.' padding-10 text-lg"><i class="fa fa-'.$mensajeIcon.'"></i> &nbsp; '.$mensaje.'</div>';		
	}

//%%%%%%%%%%%%%%%%%%%%%%%%%%    Borrar Artículo     %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	if(isset($_REQUEST['borrarProd'])){
		if($borrar = $CONEXION->query("DELETE FROM $modulo WHERE id = $id")){
			$exito=1;
			$legendSuccess .= "<br>Producto eliminado";
		}else{
			$legendFail .= "<br>No se pudo borrar de la base de datos";
			$fallo=1;  
		}
	}

//%%%%%%%%%%%%%%%%%%%%%%%%%%    Borrar Foto     %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	if(isset($_REQUEST['borrarpic'])){
		$CONSULTA = $CONEXION -> query("SELECT * FROM $modulo WHERE id = $id");
		$row_CONSULTA = $CONSULTA -> fetch_assoc();
		if (strlen($row_CONSULTA['imagen'])>0) {
			unlink($rutaFinal.$row_CONSULTA['imagen']);
			$actualizar = $CONEXION->query("UPDATE $modulo SET imagen = '' WHERE id = $id");
			$exito=1;
			$legendSuccess.='<br>Foto eliminada';
		}else{
			$legendFail .= "<br>No se encontró la imagen en la base de datos";
			$fallo=1;
		}
	}

//%%%%%%%%%%%%%%%%%%%%%%%%%%    Subir Imágen     %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	if(isset($_REQUEST['imagen'])){
		$position='main';

		

		//Obtenemos la extensión de la imagen
		$rutaInicial="../library/upload-file/php/uploads/";
		$imagenName=$_REQUEST['imagen'];
		$i = strrpos($imagenName,'.');
		$l = strlen($imagenName) - $i;
		$ext = strtolower(substr($imagenName,$i+1,$l));


			// Guardar en la base de datos
		
		if(file_exists($rutaInicial.$imagenName)){
		
				$rutaFinal='../img/contenido/'.$modulo.'/';
				$imgFinal=rand(111111111,999999999).'.'.$ext;
				if(file_exists($rutaFinal.$imgFinal)){
					$imgFinal=rand(111111111,999999999).'.'.$ext;
				}

				$sql = "UPDATE $modulo SET imagen = '$imgFinal' WHERE id = $id";
				
				
				if($insertar = $CONEXION->query($sql)){
					copy($rutaInicial.$imagenName, $rutaFinal.$imgFinal);
					unlink($rutaInicial.$imagenName);
				}	
		}else{
			$fallo=1;
			$legendFail='<br>No se permite refrescar la página.';
		}

	


		// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		// Borramos las imágenes que estén remanentes en el directorio files
		// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		$filehandle = opendir($rutaInicial); // Abrir archivos
		while ($file = readdir($filehandle)) {
			if ($file != "." && $file != ".." && $file != ".gitignore" && $file != ".htaccess" && $file != "thumbnail") {
				if(file_exists($rutaInicial.$file)){
					//echo $ruta.$file.'<br>';
					unlink($rutaInicial.$file);
				}
			}
		} 
		closedir($filehandle); 
	}

