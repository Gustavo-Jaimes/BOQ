<?php
$servicios = $CONEXION -> query("SELECT * FROM servicios WHERE id = $id");
$row_catalogo = $servicios -> fetch_assoc();

echo '
<div class="uk-width-auto@m margin-top-20">
	<ul class="uk-breadcrumb uk-text-capitalize">
		<li><a href="index.php?rand='.rand(1,1000).'&modulo='.$modulo.'">SERVICIOS</a></li>
		<li><a href="index.php?rand='.rand(1,1000).'&modulo='.$modulo.'&archivo='.$archivo.'&id='.$id.'" class="color-red">Editar servicios</a></li>
	</ul>
</div>

<div class="uk-width-1-1">
	<div class="uk-container uk-container-small">
		<div class="padding-v-20 uk-text-right">
			<a href="index.php?rand='.rand(1,99999).'&modulo='.$modulo.'&archivo=serviciosnuevo" id="add-button"></a>
		</div>
		<form action="index.php" method="post">
			<input type="hidden" name="editar" value="1">
			<input type="hidden" name="modulo" value="'.$modulo.'">
			<input type="hidden" name="archivo" value="'.$archivo.'">
			<input type="hidden" name="id" value="'.$id.'">

			<div class="uk-margin">
				<label for="titulo">Titulo</label>
				<input type="text" class="uk-input" name="titulo" value="'.$row_catalogo['titulo'].'" autofocus>
			</div>
			<div class="uk-margin">
				<label for="titulo_en">title</label>
				<input type="text" class="uk-input" name="titulo_en" value="'.$row_catalogo['titulo_en'].'" autofocus>
			</div>
			<div class="uk-margin">
				<label for="descripcion">Descripcion</label>
				<textarea type="text" class="uk-input" name="descripcion">'.$row_catalogo['descripcion'].'</textarea>
			</div>
			<div class="uk-margin">
				<label for="descripcion_en">Descripcion</label>
				<textarea type="text" class="uk-input" name="descripcion_en">'.$row_catalogo['descripcion_en'].'</textarea>
			</div>
			<div class="uk-margin">
				<label for="objetivo">Objetivo</label>
				<textarea class="editor" name="objetivo">'.$row_catalogo['objetivo'].'</textarea>
			</div>
			<div class="uk-margin">
				<label for="objetivo_en">Objective</label>
				<textarea class="editor" name="objetivo_en">'.$row_catalogo['objetivo_en'].'</textarea>
			</div>
			<div class="uk-margin">
				<label for="proceso">Acercamiento</label>
				<textarea class="editor" name="proceso">'.$row_catalogo['proceso'].'</textarea>
			</div>
			<div class="uk-margin">
				<label for="proceso">Close up</label>
				<textarea class="editor" name="proceso_en">'.$row_catalogo['proceso_en'].'</textarea>
			</div>
			<div class="uk-margin">
				<label for="resultado">Resultado</label>
				<textarea class="editor" name="curso">'.$row_catalogo['curso'].'</textarea>
			</div>
			<div class="uk-margin">
				<label for="resultado_en">Outcome</label>
				<textarea class="editor" name="curso_en">'.$row_catalogo['curso_en'].'</textarea>
			</div>
			<div class="uk-margin uk-text-center">
				<button name="send" class="uk-button uk-button-primary uk-button-large">Guardar</button>
			</div>

		</form>
	</div>
</div>';

$sql="SELECT * FROM $modulo WHERE id = $id";
$CONSULTA0 = $CONEXION -> query($sql);
while ($rowCONSULTA0 = $CONSULTA0 -> fetch_assoc()) {


	echo '
		<div class="uk-width-1-2@s margin-v-20">
			<div>
				<div id="fileuploader">
					Cargar
				</div>
			</div>
		</div>';


	echo '
		<div class="uk-width-1-1 uk-text-center">
			<div uk-grid class="uk-grid-small uk-child-width-1-6@xl uk-child-width-1-4@m uk-child-width-1-2 uk-text-center uk-grid-match sortable" id="app" data-tabla="'.$modulopic.'">';

				$sql="SELECT * FROM $modulopic WHERE producto = $id ORDER BY orden";
				//echo $sql;
				$CONSULTA = $CONEXION -> query($sql);
				while ($rowCONSULTA = $CONSULTA -> fetch_assoc()) {
					$item=$rowCONSULTA['imagen'];

					$idpic=$rowCONSULTA['id'];

					$pic=$rutaFinal.$item;
					//$picHtml=(file_exists($pic))?$pic:'../'.$noPic;
					$picHtml = $pic;
					if($id == 9){
						$extra = " ";
					}else{
						$extra = "hidden";
					}
					if($id == 9){
						$extra1 = " ";
					}else{
						$extra1 = "hidden";
					}
					echo'
						<div id="'.$idpic.'">
							<div class="uk-card uk-card-default uk-card-body">
								<div class="uk-margin" uk-lightbox>
									<a href="'.$picHtml.'">
										<img data-src="'.$picHtml.'" uk-img>
									</a>
								</div>
						<!--    <div class="uk-margin">
									<input class="uk-input editarajax" data-tabla="'.$modulopic.'" data-campo="alt" data-id="'.$idpic.'" value="'.$rowCONSULTA['alt'].'" placeholder="Titulo">
								</div> -->
								<div class="uk-margin" '.$extra.'>
									<textarea class="uk-textarea editarajax" data-tabla="'.$modulopic.'" data-campo="detalle" data-id="'.$idpic.'" value="'.$rowCONSULTA['detalle'].'" placeholder="Descripción">'.$rowCONSULTA['detalle'].'</textarea>
								</div>
								<div class="uk-margin">
									<a href="javascript:borrarfoto(\''.$item.'\',\''.$idpic.'\')" class="uk-icon-button uk-button-danger" uk-icon="trash"></a>
								</div>
							</div>
						</div>';
						
				}

				echo '
			</div>
		</div>';
};

$scripts.='
	function borrarfoto (file,id) { 
		var statusConfirm = confirm("Realmente desea eliminar esto?"); 
		if (statusConfirm == true) { 
			$.ajax({
				method: "POST",
				url: "modulos/'.$modulo.'/acciones.php",
				data: { 
					borrarfoto: 1,
					file: file,
					id: id
				}
			})
			.done(function( msg ) {
				UIkit.notification.closeAll();
				UIkit.notification(msg);
				$("#"+id).addClass( "uk-invisible" );
			});
		}
	}


	$(document).ready(function() {
		$("#fileuploader").uploadFile({
			url:"modulos/'.$modulo.'/acciones.php?id='.$id.'",
			multiple: true,
			maxFileCount:1000,
			fileName:"uploadedfile",
			allowedTypes: "jpeg,jpg,png",
			maxFileSize: 6000000,
			showFileCounter: false,
			showDelete: "false",
			showPreview:false,
			showQueueDiv:true,
			returnType:"json",
			onSuccess:function(files,data,xhr){
				var id = Math.floor((Math.random() * 100000000) + 1);
				$("#app").prepend("';
					$scripts.='<div id=\'"+id+"\'>';
						$scripts.='<div class=\'uk-card uk-card-default uk-card-body\'>';
							$scripts.='<div class=\'uk-margin\' uk-lightbox>';
								$scripts.='<a href=\''.$rutaFinal.'"+data+"\'>';
									$scripts.='<img src=\''.$rutaFinal.'"+data+"\'>';
								$scripts.='</a>';
							$scripts.='</div>';
							$scripts.='<div class=\'uk-margin\'>';

								$scripts.='<input class=\'uk-input editarajax\' data-tabla=\''.$modulopic.'\' data-campo=\'alt\' data-id=\''.$idpic.'\' value=\'\' placeholder=\'Descripción\'>';

								// $scripts.='<input class=\'uk-input editarajax\' data-tabla=\''.$modulopic.'\' data-campo=\'alt\' data-id=\''.$idpic.'\' value=\''.$rowCONSULTA['alt'].'\' placeholder=\'Descripción\'>';

							$scripts.='</div>';
							$scripts.='<div>';
								$scripts.='<a href=\'javascript:borrarfoto(\""+data+"\",\""+id+"\")\' class=\'uk-icon-button uk-button-danger\' uk-icon=\'trash\'></a>';
							$scripts.='</div>';
						$scripts.='</div>';
					$scripts.='</div>';
				$scripts.='");';
				$scripts.='
			}
		});
	});
	';





