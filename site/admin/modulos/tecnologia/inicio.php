<?php 
echo '
<div class="uk-width-1-2 margin-top-20 uk-text-left">
	<ul class="uk-breadcrumb">
		<li><a href="index.php?rand='.rand(1,1000).'&modulo='.$modulo.'" class="color-red">'.$modulo.'</a></li>
	</ul>
</div>
';
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
				$consulta = $CONEXION -> query("SELECT * FROM $modulo ORDER BY orden");
				while ($rowConsulta = $consulta -> fetch_assoc()) {
					$id=$rowConsulta['id'];
					$titulo = $rowConsulta['titulo'];
					$descri = $rowConsulta['descripcion'];

					echo '
					<tr id="'.$id.'">
						<td>
							<input class="uk-input uk-form-small uk-form-blank editarajax" data-tabla="'.$modulo.'" data-campo="titulo" data-id="'.$rowConsulta['id'].'" placeholder="Título" value="'.$rowConsulta['titulo'].'" tabindex="2">
						</td>
						<td class="uk-text-nowrap">
							<a class="edit" href="#editar" data-id="'.$id.'" desc="'.$descri.'" titulo="'.$titulo.'" uk-toggle><i class="fas fa-pencil-alt"></i></a>

							<a href="javascript:eliminaCatalogo('.$rowConsulta['id'].')" class="color-red" uk-icon="icon:trash;"></a>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="index.php?rand='.rand(1,99999).'&modulo='.$modulo.'&archivo=detalle&id='.$id.'" class="uk-text-primary" uk-icon="search"></a>
						</td>
					</tr>';
				}
				?>

			</tbody>
		</table>
	</div>
</div>

<div id="editar" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
			<div class="uk-margin">
				<label for="titulo">Titulo</label>
				<input id="ti-e" class="uk-input editarajax" data-tabla="<?=$modulo?>" data-campo="titulo" data-id="" placeholder="Título" value="">
			</div>
			<div class="uk-margin">
				<label for="titulo">Descripcion</label>
				<textarea  id="de-e" class="uk-textarea editarajax" data-tabla="<?=$modulo?>" data-campo="descripcion" data-id="" placeholder="Descripcion" value=""></textarea>
			</div>
    </div>
</div>


<div id="add" uk-modal class="modal">
    <div class="uk-modal-dialog uk-modal-body">
		<h3>Nuevo catálogo</h3>
		<form action="index.php" method="post">
			<input type="hidden" name="modulo" value="<?=$modulo?>">
			<input type="hidden" name="nuevocatalogo" value="1">
			<div class="uk-margin">
				<label for="titulo">Título</label>
				<input class="uk-input" type="text" name="titulo" tabindex="19">
			</div>
			<div class="uk-margin">
				<label for="titulo">Descripcion</label>
				<textarea class="uk-textarea" type="text" name="descripcion" tabindex="19"></textarea>
			</div>
			<div class="uk-margin uk-text-center">
				<button class="uk-button uk-button-primary" tabindex="19">Guardar</button>
			</div>
		</form>
	</div>
</div>

<div id="upload" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
		<button class="uk-modal-close-outside" type="button" uk-close></button>
		<input type="hidden" id="itemid">
		<input type="hidden" id="itemcampo">
		<div id="fileuploader">
			Cargar
		</div>
    </div>
</div>
<script>
	$('.edit').click( function(){
		let tu = $(this).attr("titulo");
		let desc = $(this).attr("desc");
		let id = $(this).attr("data-id");

		console.log(tu)
		console.log(desc)
		console.log(id)

		$('#ti-e').attr("data-id", id);
		$('#ti-e').val( tu);

		$('#de-e').attr("data-id", id);
		$('#de-e').val( desc);


	})
</script>


<?php
$scripts='
	function eliminaCatalogo (id) {
		var statusConfirm = confirm("Realmente desea eliminar esto?"); 
		if (statusConfirm == true){
			$.ajax({
				method: "POST",
				url: "modulos/'.$modulo.'/acciones.php",
				data: { 
					borrararticulo: 1,
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
?>