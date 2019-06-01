<?php
	if ($datos_turno != FALSE) 
	{
		foreach ($datos_turno->result() as $row) 
		{
			$id_turno = $row->id_turno;
			$turno = $row->id_turno;
			$nombre = $row->nombre;			
		}
	}
?>

<div class="container">
	<br>
	<center><h1> TURNOS </h1></center>
	<hr>

	<br><br>

	<table id="Consulta_expedientes" name="Consulta_expedientes" class="table table-bordered">
			<thead>
				<tr>
					<th>Turno</th>
					<th>Nombre</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if($datos_turno  != FALSE)
					{
						foreach ($datos_turno->result() as $row) {
							echo '<tr>';
								echo "<td>";
									echo $row->turno;
								echo '</td>';
								echo "<td>";
									echo $row->nombre;
								echo '</td>';
								echo '<td>';
									 echo '<a href="'.base_url().'index.php/Folios/folio/'.$row->id_turno.'" title="Ver más información del Adulto" name="VerDetalles">Atender</a>';
									  
								echo '</td>';
							echo '</tr>';
						}
					}
				?>
			</tbody>
		</table>

</div>