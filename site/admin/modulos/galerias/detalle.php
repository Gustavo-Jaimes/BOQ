<?php
$sql="SELECT * FROM $modulo WHERE id = $id";
$CONSULTA0 = $CONEXION -> query($sql);
while ($rowCONSULTA0 = $CONSULTA0 -> fetch_assoc()) {

	echo '
		<div class="uk-width-1-2@s margin-v-20">
			<ul class="uk-breadcrumb uk-text-capitalize">
				<li><a href="index.php?rand='.rand(1,1000).'&modulo='.$modulo.'">'.$modulo.'</a></li>
				<li><a href="index.php?rand='.rand(1,1000).'&modulo='.$modulo.'&archivo='.$archivo.'&id='.$id.'" class="color-red">'.$rowCONSULTA0['titulo'].'</a></li>
			</ul>
		</div>';

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
					$picHtml=(file_exists($pic))?$pic:'../'.$noPic;
					if($id == 7 or $id == 8){
						$extra = " ";
					}else{
						$extra = "hidden";
					}
					echo'
						<div id="'.$idpic.'">
							<div class="uk-card uk-card-default uk-card-body">
								<div class="uk-margin" uk-lightbox>
									<a href="'.$picHtml.'">
										<img data-src="'.$picHtml.'" uk-img>
									</a>
								</div>
							    <div class="uk-margin">
									<label>Texto en español</label>
									<input class="uk-input editarajax" data-tabla="'.$modulopic.'" data-campo="alt_es" data-id="'.$idpic.'" value="'.$rowCONSULTA['alt_es'].'" placeholder="Texto en español">
								</div>
								<div class="uk-margin">
									<label>Text in english</label>
									<input class="uk-input editarajax" data-tabla="'.$modulopic.'" data-campo="alt_en" data-id="'.$idpic.'" value="'.$rowCONSULTA['alt_en'].'" placeholder="Text in english">
								</div>
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




}
