<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>js/jquery-3.3.1.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


<script type="text/javascript">
//Datatable sencilla que permite encabezados con rowspan
     $(document).ready(function() {
         $('#Consulta_turnos').DataTable({
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

<div class="container">
	<br>
	<center><h1> TURNOS </h1></center>
	<hr><br>

	<table id="Consulta_turnos" name="Consulta_turnos" class="table table-bordered">
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
                                    echo $row->id_adulto;
                                echo '</td>';
                                echo '<td>';
                                     echo '<a href="'.base_url().'index.php/Recepcion/info_adultos/'.$row->id_adulto.'" title="Atender" name="atender">Atender</a>';
                                      
                                echo '</td>';
                            echo '</tr>';
                        }
                    }
                ?>
			</tbody>
		</table>

</div>