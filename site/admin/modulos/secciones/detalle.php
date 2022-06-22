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
}

?>
<div class="uk-width-expand margin-top-20 uk-text-right">
	<a href="#add" uk-toggle class="uk-button uk-button-success"><i uk-icon="icon: plus;ratio:1.4"></i> &nbsp; Nuevo</a>
</div>


<div class="uk-width-1-1 margin-top-20">
	<div class="uk-container uk-container-xsmall">
		<table class="uk-table uk-table-striped uk-table-hover uk-table-small uk-table-middle uk-table-responsive" id="ordenar">
			<thead>
				<tr>
					<th onclick="sortTable(0)">Título</th>
					<th width="80px"></th>
				</tr>
			</thead>
			<tbody class="sortable" data-tabla="<?=$modulo?>">

				<?php 
				$consulta = $CONEXION -> query("SELECT * FROM $modulodeta WHERE producto = $id ORDER BY orden");
				while ($rowConsulta = $consulta -> fetch_assoc()) {
					$iddeta=$rowConsulta['id'];

					echo '
					<tr id="'.$iddeta.'">
						<td>
							<input class="uk-input uk-form-small uk-form-blank editarajax" data-tabla="'.$modulodeta.'" data-campo="titulo" data-id="'.$rowConsulta['id'].'" placeholder="Título" value="'.$rowConsulta['titulo'].'" tabindex="2">
						</td>
						<td class="uk-text-nowrap">
							<a href="javascript:eliminaDetalle('.$iddeta.')" class="color-red" uk-icon="icon:trash;" ></a>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="#edit" uk-toggle class="uk-text-primary edit-icon" uk-icon="pencil" data-titulo="'.$rowConsulta['titulo'].' data" data-txt="'.$rowConsulta['txt'].'"></a>
						</td>
					</tr>';
				}
				?>

			</tbody>
		</table>
	</div>
</div>



<div id="add" uk-modal class="modal">
    <div class="uk-modal-dialog uk-modal-body">
		<h3>Nueva seccion</h3>
		<form action="index.php" method="post">
			<input type="hidden" name="modulo" value="<?=$modulo?>">
			<input type="hidden" name="nuevodeta" value="1">
			<input type="hidden" name="producto" value="<?=$id?>">
			<div class="uk-margin">
				<label for="titulo">Título</label>
				<input class="uk-input" type="text" name="titulo" tabindex="19">
			</div>
			<div class="uk-margin">
				<label for="titulo">Parrafo</label>
				<textarea class="uk-textarea" type="text" name="txt" tabindex="19" style="height: 10em"></textarea>
			</div>
			<div class="uk-margin">
				<label for="Url">Link</label>
				<input class="uk-input" type="text" name="url" tabindex="19">
			</div>
			<div class="uk-margin uk-text-center">
				<button class="uk-button uk-button-primary" tabindex="19">Guardar</button>
			</div>
		</form>
	</div>
</div>


<div id="edit" uk-modal class="modal">
    <div class="uk-modal-dialog uk-modal-body">
		<h3>Editar seccion</h3>
		<form action="index.php" method="post">
			<input type="hidden" name="modulo" value="<?=$modulo?>">
			<input type="hidden" name="nuevodeta" value="1">
			<input type="hidden" name="producto" value="<?=$id?>">
			<div class="uk-margin">
				<label for="titulo">Título</label>
				<input class="uk-input" type="text" name="titulo" id="ed-titulo" tabindex="19" value="">
			</div>
			<div class="uk-margin">
				<label for="titulo">Parrafo</label>
				<textarea class="uk-textarea" type="text" name="txt" id="ed-txt" tabindex="19" style="height: 10em"></textarea>
			</div>
			<div class="uk-margin">
				<label for="titulo">URL</label>
				<input class="uk-input" type="text" name="url" id="ed-url" tabindex="19">
			</div>
			<div class="uk-margin uk-text-center">
				<button class="uk-button uk-button-primary" tabindex="19">Guardar</button>
			</div>
		</form>
	</div>
</div>


	
<script type="text/javascript">
	$('.edit-icon').click(function(){
		var titulo = $(this).attr("data-titulo");
		var txt = $(this).attr("data-txt");

		$("#ed-titulo").val(titulo);
		$("#ed-txt").val(txt)
	})

</script>

<?php

$scripts.='

	function eliminaDetalle (id) {
		var statusConfirm = confirm("Realmente desea eliminar esto?"); 
		if (statusConfirm == true){
			$.ajax({
				method: "POST",
				url: "modulos/'.$modulo.'/acciones.php",
				data: { 
					borrarDetalle: 1,
					id: id
				}
			})
			.done(function( response ) {
				console.log( response )
				UIkit.notification.closeAll();
				UIkit.notification( response );
				$("#"+id).addClass( "uk-invisible" );
			});
		}
	};

	';





