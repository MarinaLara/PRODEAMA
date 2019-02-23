<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script>
<script type="text/javascript">
	$("#usuario").mask('ZZ',{translation:  {'Z': {pattern: /[áéíóúñüàèa-zA-Z\s]/, recursive: true}}});
	$("#nombre").mask('ZZ',{translation:  {'Z': {pattern: /[áéíóúñüàèa-zA-Z\s]/, recursive: true}}});

</script>


<?php
	if($DATA_USUARIO != FALSE)
	{
		foreach ($DATA_USUARIO->result() as $row) 
		{
			$id_usuario = $row->id_usuario;
			$usuario = $row->usuario;
			$nombre = $row->nombre;
			$contraseña = $row->contraseña;
			$nivel_usuario = $row->nivel_usuario;
		}
	}
?>
<div style="margin-top: -60px" class="container">
	<center><h1>EDITAR USUARIO</h1></center>
	<hr>
	<center>
	<div class="card">
		<div class="card-header">
			Detalle del usuario
	  	</div>
	  <ul class="list-group list-group-flush">
	    <li class="list-group-item">
	    	<div class="row">
	    	<div class="col-md-3"></div>
			<div class="col-md-6" style="margin-top: 5%">
				<form onsubmit="return confirm('¿Realmente seguro de que los datos están correctos?                          No se podrán editar tan fácil');" action="<?=base_url()?>index.php/usuarios/editar_usuario/<?=$id_usuario?>" method="post">
					<div class="form-group">
						<label><b>Usuario:</b></label>
						<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Escriba su Usuario" maxlength="15" required="" value="<?=$usuario?>">
					<br>
						<label><b>Nombre:</b></label>
						<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Escriba su Nombre" maxlength="50" required="" value="<?=$nombre?>">
					<br>
						<label><b>Contraseña:</b></label>
						<input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Escriba su Contraseña" maxlength="15" required="" value="<?=$contraseña?>">
					<br>
						<label><b>Nivel de usuario:</b></label>
							<select class="custom-select" name="id_tipo_usuario" id="id_tipo_usuario">
						    <option>Seleccione tipo</option>
						    	<?php
	                                if($DATA_TIPOS != FALSE)
		                            {		                                
		                                foreach ($DATA_TIPOS->result() as $row)
		                                {
		                                    echo '<option value="'.$row->id_tipo_usuario.'"';
		                                    if($row->id_tipo_usuario == $nivel_usuario)
		                                    {
		                                        echo ' selected';
		                                    }
		                                    echo '>';
		                                        echo $row->tipo_usuario;
		                                    echo '</option>';                                
		                                }
		                            
		                            }                                      
	                            ?>
						  </select>
					<br></br>
					<button class="btn btn-outline-success" type="submit" onclick="return confirm('¿ Esta seguro de modificar al usuario ?')">Enviar</button>
					<button type="button" onClick="window.location.href='<?=base_url()?>index.php/usuarios'" class="btn btn-outline-danger" >Cancelar </button>
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

