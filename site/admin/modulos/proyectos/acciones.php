<?php
$modulo='proyectos';
$modulopic=$modulo.'pic';
$rutaFinal='../img/contenido/'.$modulo.'/';

//%%%%%%%%%%%%%%%%%%%%%%%%%%    Nuevo galería    %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	if(isset($_POST['nuevocatalogo']) AND isset($_POST['titulo']) AND isset($_POST['descripcion'])){
		$titulo	= trim(htmlentities($_POST['titulo']));
		$titulo_en	= trim(htmlentities($_POST['titulo_en']));
		$desc = trim(htmlentities($_POST['descripcion']));
		$desc_en = trim(htmlentities($_POST['descripcion_en']));
		$objetivo = trim(htmlentities($_POST['objetivo']));
		$objetivo_en = trim(htmlentities($_POST['objetivo_en']));
		$proceso = trim(htmlentities($_POST['proceso']));
		$proceso_en = trim(htmlentities($_POST['proceso_en']));
		$resultado = trim(htmlentities($_POST['resultado']));
		$resultado_en = trim(htmlentities($_POST['resultado_en']));

		$sql = "INSERT INTO $modulo (titulo, titulo_en, descripcion, descripcion_en, objetivo, objetivo_en, proceso, proceso_en, resultado, resultado_en) VALUES ('$titulo', '$titulo_en', '$desc', '$desc_en', '$objetivo', '$objetivo_en', '$proceso', '$proceso_en', '$resultado','$resultado_en')";
		if($insertar = $CONEXION->query($sql)){
			$id = $CONEXION->insert_id;
			header( 'Location: index.php?rand='.rand(1,9999).'&modulo='.$modulo.'&archivo='.$archivo.'&id='.$id.'&showsuccess=1');
		}else{
			$legendFail .= "<br>No se pudo borrar de la base de datos de ".$desc."";
			$fallo='danger';  
		}
	}

//    Artículo Editar                   
if(isset($_REQUEST['editar']) OR isset($editarNuevo)) {
	// Obtenemos los valores enviados

	$fallo=1;  
	$legendFail .= "<br>No se pudo modificar la base de datos";
	foreach ($_POST as $key => $value) {
		if ($key=='titulo' || $key=='titulo_en' || $key == 'descripcion' || $key == 'descripcion_en' || $key == 'objetivo' || $key == 'objetivo_en' || $key == 'proceso' || $key == 'proceso_en' || $key=='resultados' || $key=='resultados_en') {
			$dato = trim(str_replace("'", "&#039;", $value));
		}else{
			$dato = trim(htmlentities($value, ENT_QUOTES));
		}
		if ($actualizar = $CONEXION->query("UPDATE $modulo SET $key = '$dato' WHERE id = $id")) {
			$exito=1;
			if (isset($fallo)) {
				unset($fallo);
			}
		}
	}

	if (isset($exito)) {
		header('location: index.php?rand='.rand(1,9999).'&modulo='.$modulo.'&archivo='.$archivo.'&id='.$id);
	}
}

//%%%%%%%%%%%%%%%%%%%%%%%%%%    Borrar galería     %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	if(isset($_GET['borrar'])){

		
		
		$rutaFinal='../../'.$rutaFinal;
		$id=$_GET['id'];

		if($borrar = $CONEXION->query("DELETE FROM $modulo WHERE id = $id")){
			$exito=1;
		}

		$CONSULTA = $CONEXION -> query("SELECT * FROM $modulopic WHERE producto = $id");
		while($row_CONSULTA = $CONSULTA -> fetch_assoc()){
			$id=$row_CONSULTA['id'];

			// Borramos el archivo de imagen
			$filehandle = opendir($rutaFinal); // Abrir archivos
			while ($file = readdir($filehandle)) {
				if ($file != "." && $file != "..") {
					// Id de la imagen
					if (strpos($file,'-')===false) {
						$imagenID = strstr($file,'.',TRUE);
					}else{
						$imagenID = strstr($file,'-',TRUE);
					}
					// Comprobamos que sean iguales
					if($imagenID==$id){
						$pic=$rutaFinal.$file;
						$exito=1;
						unlink($pic);
					}
				}
			}

			$borrar = $CONEXION->query("DELETE FROM $modulopic WHERE id = $id");
		}

		// if(isset($exito)){
		// 	echo "<div class='bg-success color-blanco'><i uk-icon='icon: trash;ratio:2;'></i> &nbsp; Borrado</div>";
		// }else{
		// 	echo "<div class='bg-danger color-blanco'><i uk-icon='icon: warning;ratio:2;'></i> &nbsp; No se pudo borrar</div>";
		// }
	}

//%%%%%%%%%%%%%%%%%%%%%%%%%%    Borrar Imagen     %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	if(isset($_POST['borrarfoto'])){
		include '../../../includes/connection.php';
		$rutaFinal='../../'.$rutaFinal;
		$mensajeClase  = 'danger';
		$mensajeIcon   = 'ban';
		$mensaje       = 'No se pudo borrar';

		$file = $_POST['file'];
		$id = $_POST['id'];


		unlink($rutaFinal.$file);

		if (!file_exists($rutaFinal.$file)) {
			if($borrar = $CONEXION->query("DELETE FROM $modulopic WHERE id = $id")){
				$legendSuccess.= "<br>foto eliminado";
				$exito='success';
				$mensajeClase = 'success';
					$mensajeIcon  = 'check';
					$mensaje      = 'Borrado';
			}else{
				$legendFail .= "<br>No se pudo borrar de la base de datos";
				$fallo='danger';  
			}
		}
		
		// Borramos de la base de datos

		
			unlink($rutaFinal.$file);
		if(!file_exists($rutaFinal.$file)){
			if($borrar = $CONEXION->query("DELETE FROM $modulopic WHERE id = $id")){
				$legendSuccess.= "<br>Imagen Eliminada";
				$exito='success';
				$mensajeClase = 'success';
				$mensajeIcon  = 'check';
				$mensaje      = 'Borrado';
			}else{
				$legendFail .= "<br>No se pudo borrar de la base de datos";
				$fallo='danger';  
			}
		}

		// Borramos de la base de datos
		

		// Borramos el archivo de imagen
		/*$filehandle = opendir($rutaFinal); // Abrir archivos
		while ($file = readdir($filehandle)) {
			if ($file != "." && $file != "..") {
				// Id de la imagen
				if (strpos($file,'-')===false) {
					$imagenID = strstr($file,'.',TRUE);
				}else{
					$imagenID = strstr($file,'-',TRUE);
				}
				// Comprobamos que sean iguales
				if($imagenID==$id){
					$pic=$rutaFinal.$file;
					unlink($pic);
					$mensajeClase = 'success';
					$mensajeIcon  = 'check';
					$mensaje      = 'Borrado';
				}
			}
		}
		closedir($filehandle);*/
		echo '<div class="uk-text-center color-white bg-'.$mensajeClase.' padding-10 text-lg"><i class="fa fa-'.$mensajeIcon.'"></i> &nbsp; '.$mensaje.'</div>';		
	}

//%%%%%%%%%%%%%%%%%%%%%%%%%%    Subir foto     %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	if(isset($_FILES["uploadedfile"])){
		include '../../../includes/connection.php';
		$rutaFinal = '../../../img/contenido/'.$modulo.'/';
		$id=$_GET['id'];

		$item=$_FILES["uploadedfile"]["name"];


		$ret = array();
		
		$error =$_FILES["uploadedfile"]["error"];
		//You need to handle  both cases
		//If Any browser does not support serializing of multiple files using FormData() 
		if(!is_array($_FILES["uploadedfile"]["name"])) //single file
		{
	 	 	$archivoInicial = $_FILES["uploadedfile"]["name"];
			$i = strrpos($archivoInicial,'.');
			$l = strlen($archivoInicial) - $i;
			$ext = strtolower(substr($archivoInicial,$i+1,$l));


						$imagen = rand(111,999).'.'.$ext;
							if (file_exists($rutaFinal.$imagen)){
								$imagen = rand(111,999).'.'.$ext;
							}
							$sql = "INSERT INTO $modulopic (producto,imagen) VALUES ('$id','$imagen')";
							if($insertar = $CONEXION->query($sql)){
						 	 	$archivoFinal = $imagen;

						 		move_uploaded_file($_FILES["uploadedfile"]["tmp_name"],$rutaFinal.$archivoFinal);
						    	$ret[]= $archivoFinal;

								$mensajeClase = 'success';
								$mensajeIcon  = 'check';
								$mensaje      = 'guardado';
						    }
						
				
					/*else  //Multiple files, file[]
		{
			$fileCount = count($_FILES["uploadedfile"]["name"]);
			for($i=0; $i < $fileCount; $i++){
				$archivoInicial = $_FILES["uploadedfile"]["name"][$i];
				$i = strrpos($archivoInicial,'.');
				$l = strlen($archivoInicial) - $i;
				$ext = strtolower(substr($archivoInicial,$i+1,$l));

				if ($ext=='jpg' OR $ext=='jpeg') {
					$sql = "INSERT INTO $modulopic (producto) VALUES ('$id')";
					if($insertar = $CONEXION->query($sql)){
						$idPic = $CONEXION->insert_id;
						$archivoFinal = $idPic.'.'.$ext;
						move_uploaded_file($_FILES["uploadedfile"]["tmp_name"][$i],$rutaFinal.$archivoFinal);
						$ret[]= $archivoFinal;
					}
				}
			}
		}*/

		echo '<div class="uk-text-center color-white bg-'.$mensajeClase.' padding-10 text-lg"><i class="fa fa-'.$mensajeIcon.'"></i> &nbsp; '.$mensaje.'</div>';		

	    echo json_encode($ret);
	}

}







