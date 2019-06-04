
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>js/jquery-3.3.1.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


<script type="text/javascript">
//Datatable sencilla que permite encabezados con rowspan
     $(document).ready(function() {
         $('#Consulta_adU').DataTable({
             "dom": 'T<"clear">lfrtip',
             "tableTools": {
                 "sRowSelect": "multi",
                 "aButtons": [
                     {
                         "sExtends": "select_none",
                         "sButtonText": "Borrar selección"
                     }]
             },
             "pagingType": "simple_numbers",
//Actualizo las etiquetas de mi tabla para mostrarlas en español
             "language": {
                 "lengthMenu": "Mostrar _MENU_ registros por página.",
                 "zeroRecords": "No se encontró registro.",
                 "info": "  _START_ de _END_ (_TOTAL_ registros totales).",
                 "infoEmpty": "0 de 0 de 0 registros",
                 "infoFiltered": "(Encontrado de _MAX_ registros)",
                 "search": "Buscar: ",
                 "processing": "Procesando la información",
                 "paginate": {
                     "first": " |< ",
                     "previous": "Ant.",
                     "next": "Sig.",
                     "last": " >| "
                 }
             }
         });
     } );
</script>


<div style="margin-top: -80px" class="container">
	<br>
	
	<center><h1>BUSQUEDA ADULTOS</h1></center>
	<hr>
	
	<center>
		<div>
			<a class="btn btn-secondary" style=" width: 200px" title="Agregar adulto" href="<?=base_url()?>index.php/Recepcion" role="button">Nuevo</a>
		</div>
	</center>

	<div style="margin-top: -20px">
		<table id="Consulta_adU" name="Consulta_adU" style="width:100%" class="display table table-striped">
			<thead>
				<tr>
					<th>Número de control</th>
					<th>Nombre</th>
					<th>Teléfono</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if($datos_adultos  != FALSE)
					{
						foreach ($datos_adultos->result() as $row) {
							echo '<tr>';
								echo '<td >';
									echo $row->id_adulto;
									/*echo $row->Folio_adulto;
									echo "-";
									echo $row->A_registro;*/
								echo '</td>';
								echo "<td>";
									echo $row->Nombre_Adulto;
								echo '</td>';
								echo "<td>";
									echo $row->Telefono;
								echo '</td>';
								echo '<td>';
									 echo '<a href="'.base_url().'index.php/Recepcion/info_adultos/'.$row->id_adulto.'" title="Ver más información del Adulto" name="VerDetalles">Ver detalles</a>';
								echo '</td>';
							echo '</tr>';
						}
					}
				?>
			</tbody>
		</table>
	</div>

	

</div>

