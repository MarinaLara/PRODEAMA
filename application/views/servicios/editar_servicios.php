<?php
	if($DATA_TIPOS != FALSE)
	{
		foreach ($DATA_TIPOS->result() as $row) 
		{
			$id_tipo_servicio = $row->id_tipo_servicio;
			$Nombre_servicio = $row->Nombre_servicio;
			$Descripcion_servicio = $row->Descripcion_servicio;
		}
	}
?>

<div style="margin-top: -55px" class="container">
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
				<form  action="<?=base_url()?>index.php/Servicios/fun_editar_tipos/<?=$id_tipo_servicio?>" method="post">
					<div class="form-group">
						<label><b>Nuevo tipo:</b></label>
								<input type="text" class="form-control" name="Nombre_servicio" id="Nombre_servicio" placeholder="Escriba el nuevo tipo" maxlength="50" value="<?=$Nombre_servicio?>" required="" >
							<br>
								<label><b>Descripción tipo:</b></label>
								<input type="text" class="form-control" name="Descripcion_servicio" id="Descripcion_servicio" placeholder="Describa el tipo" maxlength="50" value="<?=$Descripcion_servicio?>" required="" >
							
					<br></br>
					<button class="btn btn-outline-success" type="submit" onclick="return confirm('¿ Esta seguro de modificar el tipo ?')">Enviar</button>
					<button type="button" onClick="window.location.href='<?=base_url()?>index.php/Servicios'" class="btn btn-outline-danger" >Cancelar </button>
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
