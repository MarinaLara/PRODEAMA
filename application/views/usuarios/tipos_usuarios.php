<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script>

<script type="text/javascript">
	$("#tipo_usuario").mask('ZZ',{translation:  {'Z': {pattern: /[áéíóúñüàèa-zA-Z\s]/, recursive: true}}});
	$("#descripcion_tipo").mask('ZZ',{translation:  {'Z': {pattern: /[áéíóúñüàèa-zA-Z\s]/, recursive: true}}});
	$("#Nivel_usuario").mask('ZZ',{translation:  {'Z': {pattern: /[0-9\s]/, recursive: true}}});

</script>

<div style="margin-top: -50px" class="container">
	<center><h1>TIPOS DE USUARIOS</h1></center>
	<hr>

	<button type="button" style="float: right;" class="btn btn-secondary" data-toggle="modal" title="Agregar un nuevo tipo" data-target="#exampleModal" data-whatever="@mdo">Agregar +</button>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
      	<div class="modal-content">
      		<div class="modal-header">
            	<h5 class="modal-title" id="exampleModalLabel">Agregar Tipo de Usuario</h5>
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              	<span aria-hidden="true">&times;</span>
            	</button>
          	</div>
         	<div class="modal-body">
		      	<div class="row">
					<div class="col-md-5" style="margin-top: 5%">
						<form onsubmit="return confirm('¿Realmente seguro de que los datos están correctos?                          No se podrán editar tan fácil');" action="<?=base_url()?>index.php/Usuarios/agregar_tipo" method="post">
							<div class="form-group">
								<label><b>Nuevo tipo:</b></label>
								<input type="text" class="form-control" name="tipo_usuario" id="tipo_usuario" placeholder="Escriba el nuevo tipo" maxlength="50" required="" >
							<br>
								<label><b>Descripción tipo:</b></label>
								<input type="text" class="form-control" name="descripcion_tipo" id="descripcion_tipo" placeholder="Describa el tipo" maxlength="50" required="" >
							<br>
								<label><b>Nivel:</b></label>
								<input type="text" class="form-control" name="Nivel_usuario" id="Nivel_usuario" placeholder="Nivel que tendrá" title="Solo numeros" maxlength="1" required="" >
							<br>
								<button class="btn btn-outline-success" type="submit">Enviar</button>
								<button class="btn btn-outline-danger" title="Borra todos los datos de esta ventana" type="reset">Cancelar</button>
							</div>
						</form>
					</div>
					<div class="col-md-7" style="margin-top: 10%" >
						<img src="<?=base_url()?>images/tipos.png">
					</div>
				</div>
		      </div>
          	</div>
        </div>
      </div>

		
    
	<br></br>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Tipo de Usuarios</th>
				<th>Descripción</th>
				<th>Nivel</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if($usuarios != FALSE)
				{
					foreach ($usuarios->result() as $row) {
						echo '<tr>';
							echo '<td>';
								echo $row->tipo_usuario;
							echo '</td>';
							echo "<td>";
								echo $row->descripcion_tipo;
							echo '</td>';
							echo "<td>";
								echo $row->nivel_usuario;
							echo '</td>';
							echo '<td>';
								 echo '<a href="'.base_url().'index.php/Usuarios/eliminar_tipos/'.$row->id_tipo_usuario.'" title="Eliminar este tipo" name="Eliminar" onclick="return confirm(\'¿ Esta seguro de eliminar el tipo ?\')">Eliminar</a>';
								 echo "/";
								 echo '<a href="'.base_url().'index.php/Usuarios/editar_tipos/'.$row->id_tipo_usuario.'" title="Modificar este tipo" name="Modificar">Modificar</a>';
							echo '</td>';
						echo '</tr>';
					}
				}
			?>
		</tbody>
	</table>
</div>

<br>