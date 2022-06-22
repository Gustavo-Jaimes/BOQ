<?php
$modulo='secciones';
$modulodeta=$modulo.'Detalle';
$rutaFinal='../img/contenido/'.$modulo.'/';

//%%%%%%%%%%%%%%%%%%%%%%%%%%    Nuevo galería    %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	if(isset($_POST['nuevocatalogo']) AND isset($_POST['titulo'])){
		$titulo	= trim(htmlentities($_POST['titulo']));

		$sql = "INSERT INTO $modulo (titulo) VALUES ('$titulo')";
		if($insertar = $CONEXION->query($sql)){
			$id = $CONEXION->insert_id;
			header( 'Location: index.php?rand='.rand(1,9999).'&modulo='.$modulo.'&archivo='.$archivo.'&id='.$id.'&showsuccess=1');
		}else{
			$legendFail .= "<br>No se pudo borrar de la base de datos";
			$fallo='danger';  
		}
	}

//%%%%%%%%%%%%%%%%%%%%%%%%%%    Borrar galería     %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	if(isset($_POST['borrararticulo'])){
		include '../../../includes/connection.php';
		$rutaFinal='../../'.$rutaFinal;
		$id=$_POST['id'];

		if($borrar = $CONEXION->query("DELETE FROM $modulo WHERE id = $id")){
			$exito=1;
		}

		$CONSULTA = $CONEXION -> query("SELECT * FROM $modulodeta WHERE producto = $id");
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

			$borrar = $CONEXION->query("DELETE FROM $modulodeta WHERE id = $id");
		}

		if(isset($exito)){
			echo "<div class='bg-success color-blanco'><i uk-icon='icon: trash;ratio:2;'></i> &nbsp; Borrado</div>";
		}else{
			echo "<div class='bg-danger color-blanco'><i uk-icon='icon: warning;ratio:2;'></i> &nbsp; No se pudo borrar</div>";
		}
	}

//%%%%%%%%%%%%%%%%%%%%%%%%%%  subir campos de seccion %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	//    Artículo Nuevo                    
	if(isset($_POST['nuevodeta'])){ 
		// Actualizamos la base de datos
		if(!isset($fallo)){
			$sql = "INSERT INTO $modulodeta (estatus) VALUES (0)";
			if($insertar = $CONEXION->query($sql)){
				$exito=1;
				$legendSuccess .= "<br>Seccion guardada";
				$editarNuevo=1;
				$id=$CONEXION->insert_id;
				$archivo = 'detalle';
			}else{
				$fallo=1;  
				$legendFail .= "<br>No se pudo agregar a la base de datos - $cat";
			}
		}else{
			$legendFail .= "<br>La categoría o marca están vacíos.";
		}
	}

//    Artículo Editar                   
	if(isset($_POST['editardeta']) OR isset($editarNuevo)) {
		// Obtenemos los valores enviados
		$producto = $_POST['producto'];

		if (isset($_POST['editardeta'])) {
			$id = $_POST['idsec'];
		}

		$fallo=1;  
		$legendFail .= "<br>No se pudo modificar la base de datos";
		foreach ($_POST as $key => $value) {
			if ($key!='nuevodeta' || $key!='editardeta' || $key!='idsec' || $key != 'modulo') {
				if ($actualizar = $CONEXION->query("UPDATE $modulodeta SET $key = '$value' WHERE id = $id")) {
					$exito=1;
					if (isset($fallo)) {
						unset($fallo);
					}
				}
			}
		}

		if ($exito==1) {
			header('location: index.php?rand='.rand(1,9999).'&modulo='.$modulo.'&archivo='.$archivo.'&id='.$producto);
		}else{
			echo "error al actualizar";
		}
	}

//%%%%%%%%%%%%%%%%%%%%%%%%%%%% borrar detalle %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	if (isset($_POST['borrarDetalle'])) {
		$id=$_POST['id'];
		include '../../../includes/connection.php';
		

		if($borrar = $CONEXION->query("DELETE FROM $modulodeta WHERE id = $id")){
			$exito=1;
		}

		if(isset($exito)){
			echo "<div class='bg-success color-blanco'><i uk-icon='icon: trash;ratio:2;'></i> &nbsp; Borrado</div>";
		}else{
			echo "<div class='bg-danger color-blanco'><i uk-icon='icon: warning;ratio:2;'></i> &nbsp; No se pudo borrar</div>";
		}

	}







