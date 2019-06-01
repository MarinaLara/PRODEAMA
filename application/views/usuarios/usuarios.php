<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script>
<script type="text/javascript">
	$(function () {
	  $('[data-toggle="popover"]').popover()
	})

	//$("#usuario").mask('ZZ',{translation:  {'Z': {pattern: /[áéíóúñüàèa-zA-Z\s]/, recursive: true}}});
	$("#nombre").mask('ZZ',{translation:  {'Z': {pattern: /[áéíóúñüàèa-zA-Z\s]/, recursive: true}}});

</script>
<br>
<div style="margin-top: -50px" class="container">
	<center><h1>USUARIOS</h1></center>
	<hr>
	<button type="button" style="float: right;" title="Agregar un nuevo usuario" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar +</button>

	
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          	<div class="modal-body">
	            <div class="row">
					<div class="col-md-6" style="margin-top: 2%">
						<form onsubmit="return confirm('¿Realmente seguro de que los datos están correctos?                          No se podrán editar tan fácil');" action="<?=base_url()?>index.php/usuarios/agregar_usuarios" method="post">
							<div class="form-group">
								<label><b>Usuario:</b></label> 
									<button data-toggle="popover" style="float: right; margin-bottom: 3%" title="Información" data-content="Ingresar correo electronico con el que se ingresará al sistema, debe ser un correo valido." type="button" class="btn btn-outline-info">?</button>
								<input type="email" class="form-control" id=usuario name="usuario" placeholder="Correo electronico" maxlength="150" required="">
							<br>
								<label><b>Nombre:</b></label>
								<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Escriba su nombre y apellidos" maxlength="50" minlength="5" required="">
							<br>
								<label><b>Contraseña:</b></label>
								<input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Escriba su contraseña" maxlength="15" required="">
							<br>
								<label><b>Nivel de usuario:</b></label>
									<select required="" class="custom-select" name="nivel_usuario" id="nivel_usuario">
								    <option value="" selected>Seleccione tipo</option>
								    <?php
	                                    if($tipos != FALSE)
	                                    {
	                                        foreach ($tipos->result() as $row) 
	                                        {
	                                            echo '<option value="'.$row->id_tipo_usuario.'">';
	                                                echo $row->tipo_usuario;
	                                            echo '</option>';
	                                    
	                                        } 
	                                    }                                    
	                                ?>
								  </select>
							<br></br>
							<button class="btn btn-outline-success" type="submit">Enviar</button>
							<button class="btn btn-outline-danger" title="Borra todos los datos de esta ventana" type="reset">Cancelar</button>
						</div>
						</form>
					</div>
					<div class="col-md-6" style="margin-top: 17%" >
						<center><img src="<?=base_url()?>images/usuario.png"></center>
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

				<th>Usuario</th>
				<th>Nombre</th>
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
								echo $row->usuario;
							echo '</td>';
							echo '<td>';
								echo $row->nombre;
							echo '</td>';
							echo '<td>';
								echo $row->tipo_usuario;
							echo '</td>';
							echo '<td>';
								 echo '<a href="'.base_url().'index.php/Usuarios/eliminar_usuarios/'.$row->id_usuario.'" title="Eliminar este usuario" name="Eliminar" onclick="return confirm(\'¿ Esta seguro de eliminar al usuario ?\')">Eliminar</a>';
								 echo "/";
								 echo '<a href="'.base_url().'index.php/Usuarios/editar/'.$row->id_usuario.'"  title="Modificar este usuario" name="Modificar">Modificar</a>';
							echo '</td>';
						echo '</tr>';
					}
				}
			?>
		</tbody>
	</table>
	<br>
</div>

