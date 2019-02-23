<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script>

<script type="text/javascript">
	$("#tipo_usuario").mask('ZZ',{translation:  {'Z': {pattern: /[áéíóúñüàèa-zA-Z\s]/, recursive: true}}});
	$("#descripcion_tipo").mask('ZZ',{translation:  {'Z': {pattern: /[áéíóúñüàèa-zA-Z\s]/, recursive: true}}});
	$("#Nivel_usuario").mask('ZZ',{translation:  {'Z': {pattern: /[0-9\s]/, recursive: true}}});

</script>


<?php
	if($DATA_TIPOS != FALSE)
	{
		foreach ($DATA_TIPOS->result() as $row) 
		{
			$id_tipo_usuario = $row->id_tipo_usuario;
			$tipo_usuario = $row->tipo_usuario;
			$descripcion_tipo = $row->descripcion_tipo;
			$nivel_usuario = $row->nivel_usuario;
		}
	}
?>
<div style="margin-top: -50px" class="container">
	<center><h1>Editar Tipo</h1></center>
	<hr>
	<center>
	<div class="card">
		<div class="card-header">
			Detalle del Tipo
	  	</div>
	  <ul class="list-group list-group-flush">
	    <li class="list-group-item">
	    	<div class="row">
	    	<div class="col-md-3"></div>
			<div class="col-md-6" style="margin-top: 5%">
				<form onsubmit="return confirm('¿Realmente seguro de que los datos están correctos?                          No se podrán editar tan fácil');" action="<?=base_url()?>index.php/usuarios/fun_editar_tipos/<?=$id_tipo_usuario?>" method="post">
					<div class="form-group">
						<label><b>Nuevo tipo:</b></label>
								<input type="text" class="form-control" name="tipo_usuario" id="tipo_usuario" placeholder="Escriba el nuevo tipo" maxlength="50" value="<?=$tipo_usuario?>" required="" >
							<br>
								<label><b>Descripción tipo:</b></label>
								<input type="text" class="form-control" name="descripcion_tipo" id="descripcion_tipo" placeholder="Describa el tipo" maxlength="50" value="<?=$descripcion_tipo?>" required="" >
							<br>
								<label><b>Nivel:</b></label>
								<input type="text" class="form-control" name="Nivel_usuario" id="Nivel_usuario" placeholder="Nivel que tendrá" title="Solo numeros" maxlength="1" required="" value="<?=$nivel_usuario?>">
					<br></br>
					<button class="btn btn-outline-success" type="submit" onclick="return confirm('¿ Esta seguro de modificar el tipo ?')">Enviar</button>
					<button type="button" onClick="window.location.href='<?=base_url()?>index.php/usuarios/tipos_usuarios'" class="btn btn-outline-danger" >Cancelar </button>
				</div>
				</form>
			</div>
			<div class="col-md-3"></div>
	    </li>
	  </ul>
	</div>
	
	</center>
</div>
</div>

<br>
