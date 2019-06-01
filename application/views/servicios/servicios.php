<div style="margin-top: -60px" class="container">
	<center><h1>SERVICIOS</h1></center>
	<hr>
	<button type="button" style="float: right;" class="btn btn-secondary" data-toggle="modal" title="Agregar servicio" data-target="#exampleModal" data-whatever="@mdo">Agregar +</button>

	
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Servicio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          	<div class="modal-body">
	            <div class="row">
					<div class="col-md-6" style="margin-top: 2%">
						<form onsubmit="return confirm('¿Realmente seguro de que los datos están correctos?                          No se podrán editar tan fácil');" action="<?=base_url()?>index.php/Servicios/agregar_tipos" method="post">
							<div class="form-group">
								<label><b>Nuevo servicio:</b></label>
								<input type="text" class="form-control" name="Nombre_servicio" id="Nombre_servicio" placeholder="Escriba el nuevo tipo" maxlength="50" required="" >
							<br>
								<label><b>Descripción del servicio:</b></label>
								<input type="text" class="form-control" name="Descripcion_servicio" id="Descripcion_servicio" placeholder="Describa el servicio" maxlength="50" required="" >
							<br></br>
							<button  class="btn btn-outline-success" type="submit">Enviar</button>
							<button class="btn btn-outline-danger" title="Borra todos los datos de esta ventana" type="reset">Cancelar</button>
						</div>
						</form>
					</div>
					<div class="col-md-6">
						<img src="<?=base_url()?>images/archivo.png">
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
				<th>Tipo de servicio</th>
				<th>Descripción</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if($tipos_servicios != FALSE)
				{
					foreach ($tipos_servicios->result() as $row) {
						echo '<tr>';
							echo '<td>';
								echo $row->Nombre_servicio;
							echo '</td>';
							echo "<td>";
								echo $row->Descripcion_servicio;
							echo '</td>';
							echo '<td>';
								 /*echo '<a href="'.base_url().'index.php/Servicios/eliminar_tipos/'.$row->id_tipo_servicio.'" title="Eliminar este tipo" name="Eliminar" onclick="return confirm(\'¿ Esta seguro de eliminar el tipo ?\')">Eliminar</a>';
								 echo "/";*/
								 echo '<a href="'.base_url().'index.php/Servicios/editar_tipos/'.$row->id_tipo_servicio.'" title="Modificar este tipo" name="Modificar">Modificar</a>';
							echo '</td>';
						echo '</tr>';
					}
				}
			?>
		</tbody>
	</table>
</div>
