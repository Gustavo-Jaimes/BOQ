<?php
$modulo='empresas';
$modulopic=$modulo.'pic';

//%%%%%%%%%%%%%%%%%%%%%%%%%%    Borrar Foto     %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	if(isset($_REQUEST['borrarPic'])){
		if($borrar = $CONEXION->query("DELETE FROM $modulo WHERE id = $id")){
			// Borramos el archivo de imagen
			$rutaIMG="../img/contenido/".$modulo."/";
			$filehandle = opendir($rutaIMG); // Abrir archivos
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
						$pic=$rutaIMG.$file;
						$exito=1;
						unlink($pic);
					}
				}
			}
		}
	}
	
//%%%%%%%%%%%%%%%%%%%%%%%%%%    Subir Imágen     %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

	if(isset($_REQUEST['imagen'])){


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

				$sql = "INSERT INTO $modulo (orden,imagen) VALUES (99,'$imgFinal')";
				
				
				if($insertar = $CONEXION->query($sql)){
					copy($rutaInicial.$imagenName, $rutaFinal.$imgFinal);
					unlink($rutaInicial.$imagenName);
				}	
		}else{
			$fallo=1;
			$legendFail='<br>No se permite refrescar la página.';
		}

	}



