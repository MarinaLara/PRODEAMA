<!--	THIS	-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script>


<script type="text/javascript" src="<?=base_url()?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
//Datatable sencilla que permite encabezados con rowspan
     $(document).ready(function() {
         $('#Consulta_archivos').DataTable({
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
<script type="text/javascript">
	
	//validacion campos domicilio
	$("#inpt_domicilio").mask('ZZ',{translation:  {'Z': {pattern: /[áéíóúñüàèa-zA-Z\s]/, recursive: true}}});
	$("#inpt_numdomicilio").mask('ZZ',{translation:  {'Z': {pattern: /[0-9\s]/, recursive: true}}});
	
	//muestra los campos a editar pero los deshabilita para seleccionar el que se desee modificar
	function hab() 
	{
		var requidNombre = document.getElementById('editNombre_Adulto');
		requidNombre.setAttribute('readonly', true);

		var requidTelefono = document.getElementById('editTelefono');
		requidTelefono.setAttribute('readonly', true);
		
		var requidEdad = document.getElementById('editEdad');
		requidEdad.setAttribute('readonly', true);
		
		var requidSexo = document.getElementById('editSexo');
		requidSexo.setAttribute('readonly', true);
	}

	//funcion para habilitar o deshabilitar el campo nombre dependiendo de si el cbx esta seleccionado o no
	function habNombre()
	{
		if (document.getElementById('cbxhabNombre').checked)
		{
			var d = document.getElementById("editNombre_Adulto"); 
			var d_align = d.getAttributeNode("readonly"); 
			d.removeAttributeNode(d_align);
		}
		else
		{
			var requidNombre = document.getElementById('editNombre_Adulto');
			requidNombre.setAttribute('readonly', true);
		}
	}

	//funcion para habilitar o deshabilitar el campo telefono dependiendo de si el cbx esta seleccionado o no
	function habTelefono() 
	{
		if (document.getElementById('cbxhabTelefono').checked)
		{
			var dT = document.getElementById("editTelefono"); 
			var d_alignT = dT.getAttributeNode("readonly"); 
			dT.removeAttributeNode(d_alignT);
		}
		else
		{
			var requidTelefono = document.getElementById('editTelefono');
			requidTelefono.setAttribute('readonly', true);
		}
	}

	//funcion para habilitar o deshabilitar el campo edad dependiendo de si el cbx esta seleccionado o no
	function habEdad()
	{
		if (document.getElementById('cbxhabEdad').checked)
		{
			var dE = document.getElementById("editEdad"); 
			var d_alignE = dE.getAttributeNode("readonly"); 
			dE.removeAttributeNode(d_alignE); 
		}
		else
		{
			var requidEdad = document.getElementById('editEdad');
			requidEdad.setAttribute('readonly', true);
		}	
	}
	
	//funcion para habilitar o deshabilitar el campo sexo dependiendo de si el cbx esta seleccionado o no
	function habSexo() 
	{
		if (document.getElementById('cbxhabSexo').checked)
		{
			var dS = document.getElementById("editSexo"); 
			var d_alignS = dS.getAttributeNode("readonly"); 
			dS.removeAttributeNode(d_alignS);
		}
		else
		{
			var requidNombre = document.getElementById('editSexo');
			requidNombre.setAttribute('readonly', true);
		}	
	}

	//funcion para abrir en otra pestaña la direccion en google maps
	function red() 
	{
		var dom = document.getElementById('inpt_domicilio').value;
		var num = document.getElementById('inpt_numdomicilio').value;
		
		var maps = "https://maps.google.es/maps?q=";

		window.open(maps+dom+' '+num);
	}

	//función para validar los campos de domicilio con el boton de buscar en google maps
	function conf() 
	{		
		if ((document.getElementById('inpt_domicilio').value == '') || (document.getElementById('inpt_numdomicilio').value == '')) 
		{
			return alert("Faltan datos");
		}
		else
		{			
			if (confirm('¿Buscar esta dirección?') == true) 
			{ 
				red();
				alert('¿Dirección correcta?                                                                       Esta es la direccion que buscó y que se guardará en el sistema:' + ' ' + document.getElementById('inpt_domicilio').value + ' ' + document.getElementById('inpt_numdomicilio').value + '                                                                              De no ser correcta favor de volver a ingresar los datos');
			}
			else 
			{
				return false;
			}
		}
	}

</script>

<?php
	if($datos_adultos != FALSE)
	{
		foreach ($datos_adultos->result() as $row) 
		{
			$id_adulto = $row->id_adulto;
			$Nombre_Adulto = $row->Nombre_Adulto;
			$Telefono = $row->Telefono;
			$Edad = $row->Edad;
			$Sexo = $row->Sexo;
			$Direccion = $row->Direccion;
			
		}
	}
	if ($datos_familia != FALSE) 
	{
		foreach ($datos_familia->result() as $row) 
		{
			$id_representante = $row->id_representante;
			$Nombre_representante = $row->Nombre_representante;
			$Telefono_repre = $row->Telefono_repre;
			$Nombre_categoria = $row->Nombre_categoria;

		}
	}
	if ($datos_folios != FALSE) 
	{
		foreach ($datos_folios->result() as $row) 
		{
			$id_folio = $row->id_folio;
			$A_registro = $row->A_registro;
			$Folio_adulto = $row->Folio_adulto;
			//$Nombre_servicio = $row->Nombre_servicio;			
			$fecha_comienzo = $row->fecha_comienzo;

		}
	}
?>


<div style="margin-top: -75px" class="container">
	<br>
	<center><h1>INFORMACIÓN DEL ADULTO</h1></center>
<!-- cabecera -->
		<div class="row">
			<div class="col">
				<button class="btn btn-secondary " style=" float: left; width: 200px" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">Contactos</button>
			</div>			
			<div class="col">
				<center>
					<label style="color: rgb(199, 0, 57);"><h3> EXPEDIENTE: <?=$Folio_adulto?>-<?=$A_registro?></h3></label>
				</center>
			</div>
			<div class="col">
				<?php 
					if($this->session->userdata('nivel_usuario') == 1)
					{
						echo '
						<button style="float: right;" onclick ="dis()" id="mostrar"  value="mostrar" data-toggle="modal" data-target="#modaleditaradulto"  type="button" class="btn btn-info">
							<span><b>Habilitar edición</b></span>
						</button>';
					}
				?>
			</div>		
		</div>
	<hr>

<!-- info adulto -->
	<div class="row">
		<div class="col">
			<label><b>Nombre del adulto mayor</b></label>
		</div>		
		<div class="col">
			<label><b>Teléfono del adulto mayor</b></label>
		</div>
		<div class="col">
			<label><b>Direccion del adulto mayor</b></label>
		</div>
		<div class="col">
			<div class="row">
				<div class="col"><label><b>Sexo</b></label></div>
				<div class="col"><label><b>Edad</b></label></div>
			</div>
		</div>
				
	</div>
	<div class="row">
		<div class="col">
			<input type="text" disabled="" style="width:200px;height:40px" required="" placeholder="Nombre completo del adulto mayor" class="form-control" id="Nombre_Adulto" name="Nombre_Adulto" value="<?=$Nombre_Adulto?>">	
		</div>		
		<div class="col">
			<input type="text" disabled="" style="width:200px;height:40px" required="" pattern="\([0-9]{3}\) [0-9]{3}[ -][0-9]{4}"  title="Un número de teléfono válido consiste en un área de código de 3 dígitos entre paréntesis, un espacio, los tres primeros dígitos del número, un espacio o guion (-) y cuatro dígitos más" placeholder="(Código de área) 000-0000" maxlength="14" class="form-control" id="Telefono" name="Telefono" value="<?=$Telefono?>">
		</div>
		<div class="col">
			<input type="text" disabled="" style="width:200px;height:40px" required=""  title="Una direccion valida consiste en un nombre de calle y un numero de casa" placeholder="Direccion del Adulto" maxlength="14" class="form-control" id="Telefono" name="Telefono" value="<?=$Direccion?>">
		</div>
		<div class="col">
			<div class="row">
				<div class="col">
					<input type="text" disabled="" value="<?=$Sexo?>" class="form-control" id="Sexo" name="Sexo" >
				</div>
				<div class="col">
					<input type="text" disabled="" value="<?=$Edad?>" required="" style="width:70px;height:40px" maxlength="3" class="form-control" id="Edad" name="Edad">
				</div>
			</div>
		</div>
	
	</div>
	<hr>	

	<div>
		<td>
			<button class="btn btn-secondary btn-lg" style="width: 200px" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Otros</button>
		</td>
			<td>&nbsp; &nbsp;</td>
		<td><button class="btn btn-success btn-lg" style="width: 250px" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">Archivos</button>
			
			
		</td>

	</div>
	<br>
<!-- info nueva por llenar -->
	<div class="collapse" id="collapseExample"> 
	  	<center><b>INFORMACIÓN EXTRA ADULTO</b></center>
		<hr>
		<form onsubmit="return confirm('¿Realmente seguro de que los datos están correctos?                          No se podrán editar tan fácil');" action="<?=base_url()?>index.php/folios/modificar_adulto/<?=$id_adulto?>/0" method="post">
			<div class="row">
				<div class="col"><label><h6>Domicilio</h6></label></div>
				<div class="col"><label><h6>Número</h6></label></div>
				<div class="col"></div>
				<div class="col">
					<!--<a style="float: right;" class="btn btn-outline-secondary btn-lg"  title="Estudio socio economico" href="<?=base_url()?>index.php/Folios/realizarESE/<?=$id_adulto?>" role="button">Realizar ESE</a>
					<a style="float: right;" class="btn btn-outline-secondary btn-lg"  title="Estudio socio economico" role="button">Realizar ESE</a>-->
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="col">
						<input type="text" placeholder="Nombre de la calle" class="form-control"  name="inpt_domicilio" id="inpt_domicilio">
					</div>
				</div>
				<div class="col">
					<input type="text" class="form-control" style="width: 150px" placeholder="Número casa" name="inpt_numdomicilio" id="inpt_numdomicilio">
				</div>
				<div class="col">
					<button type ="button" id="btn_dir" onclick="conf();" class="btn btn-outline-primary" style="width: 200px">Buscar con maps</button>
				</div>
				<div class="col"></div>
				
			</div>

			<br>
			<div class="row">
				<div class="col">
					<button  class="btn btn-outline-success" type="submit">Enviar</button>
				
					<button  class="btn btn-outline-danger" type="reset"  onclick="ocultar()">Cancelar</button>
				</div>
			</div>
		</form>
	</div>

<br>

	<div class="collapse" id="collapseExample2"> 
		<center><b>Archivos</b></center>
		<hr>
		<button type="button" style="float: right;" title="Agregar un nuevo folio" class="btn btn-outline-secondary" data-toggle="modal" data-target="#MODAL_FOLIOS" data-whatever="@mdo">Agregar +</button>

		<br></br>

		<table id="Consulta_archivos" name="Consulta_archivos" style="width:100%" class="display table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Fecha</th>
					<th>Subido por</th>
					<th>Archivo</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php if($datos_archivos != FALSE) {
					foreach ($datos_archivos->result() as $row) {
				?>
					<tr id="tr_<?= $row->id_archivo;?>" name="tr_<?= $row->id_archivo; ?>" >
						<td><?= $row->id_archivo;?></td>
						<td><?= $row->fecha;?></td>
						<td><?= $row->nombre?></td>
						<td>
							<a href="<?=base_url().$row->path?>" target="_blanck"><?= $row->nombre_archivo;?></a>
						</td>
						<td>
							<?php 
								if($this->session->userdata('nivel_usuario') == $row->nivel_usuario)
								{
									//echo '<a href="">Modificar</a>';
									
									//echo '<label> / </label>';
									
									echo '<a href="'.base_url().'index.php/Archivos/eliminar_archivo/'.$row->id_archivo.'/'.$id_adulto.'" title="Eliminar este archivo" name="Eliminar" onclick="return confirm(\'¿ Esta seguro de eliminar el archivo ?\')">Eliminar</a>';
								}
							?>
						</td>
					</tr>
				<?php
					}
				} ?>
			</tbody>
		</table>	
	</div>
<br><br>




<!-- MODAL PARA AGREGAR ARCHIVOS -->
	<div class="modal fade" id="MODAL_FOLIOS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo archivo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          	<div class="modal-body">
	            <div class="row">
					<div class="col-md-12" style="margin-top: 2%">
						
						<form action="<?=base_url()?>index.php/archivos/crear_archivo" onsubmit="return confirm('¿Realmente seguro de que los datos están correctos?                          No se podrán editar tan fácil');"  method="post" enctype="multipart/form-data">
							<div class="form-group">
								<input type="text" style="display: none;" value="<?=$id_adulto?>" name="id_adulto" id="id_adulto">
								<input readonly type="text" style="width: 250px; height:40px; display: none;" class="form-control" name="fecha_subida" id="fecha_subida" value="<?php date_default_timezone_set('America/Los_Angeles');
					$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
					echo date('d')."/".$meses[date('n')-1]. "/".date('Y') ;		 			 
					?>">

								<label><b>Nombre de archivo</b></label>
								<input type="text" id="nombre_archivo" name="nombre_archivo" class="form-control">
								<br>
								<label><b>Tipo de servicio solicitado</b></label><br>
								<select class="custom-select" title="Tipo de servicio solicitado" id="select_tipo_servicio" style="width:250px;height:40px" name="select_tipo_servicio">
									<option value=""> Seleccione el tipo de servicio</option>
									<?php
				                        if($tipos_servicios != FALSE)
				                        {
				                            foreach ($tipos_servicios->result() as $row) 
				                            {
				                                echo '<option value="'.$row->id_tipo_servicio.'">';
				                                    echo $row->Nombre_servicio;
				                                echo '</option>';
				                        
				                            } 
				                        }                                    
				                    ?>
								</select>
								<br><br>
								<label>Seleccionar Archivo</label>
				 				<input type="file" class="form-control" id="archivo" name="archivo" name="uploadedfile" required="true" >

								<br></br>
								<button class="btn btn-outline-success"  type="submit">Enviar</button>
								<button class="btn btn-outline-danger" title="Borra todos los datos de esta ventana" type="reset">Cancelar</button>
							</div>
						</form>

					</div>
				</div>
          	</div>
        </div>
      </div>
    </div>

<!-- MODAL PARA AGREGAR CONTACTO -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo contacto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          	<div class="modal-body">
	            <div class="row">
					<div class="col-md-12" style="margin-top: 2%">
						<form action="<?=base_url()?>index.php/Recepcion/fun_nuevo_repre/<?=$id_adulto?>" onsubmit="return confirm('¿Realmente seguro de que los datos están correctos?                          No se podrán editar tan fácil');"  method="post">
							<div class="form-group">
							
							<label><b>Nombre del usuario</b></label> 
								<input type="text"  placeholder="Nombre de familiar/representante/acompañante" class="form-control" id="Nombre_representante" name="Nombre_representante"> 
							<br>
							<label><b>Telefono usuario</b></label>
								<input type="text"  pattern="\([0-9]{3}\) [0-9]{3}[ -][0-9]{4}"  title="Un número de teléfono válido consiste en un área de código de 3 dígitos entre paréntesis, un espacio, los tres primeros dígitos del número, un espacio o guion (-) y cuatro dígitos más" placeholder="(Código de área) 000-0000" maxlength="14" class="form-control" id="Telefono_repre" name="Telefono_repre">
							<br>
								<label><b>Seleccione el tipo de acompañante</b></label>
								<br>
									<select class="custom-select" title="Tipo de acompañante/representante" id="select_tipo_representante" name="select_tipo_representante">
										<option value="">Tipo de acompañante</option>
										<?php
				                        if($categorias_repres != FALSE)
				                        {
				                            foreach ($categorias_repres->result() as $row) 
				                            {
				                                echo '<option value="'.$row->id_categoria_repres.'">';
				                                    echo $row->Nombre_categoria;
				                                echo '</option>';
				                        
				                            } 
				                        }                                    
				                    ?>
									</select>

							<br></br>
							<button class="btn btn-outline-success"  type="submit">Enviar</button>
							<button class="btn btn-outline-danger" title="Borra todos los datos de esta ventana" type="reset">Cancelar</button>
						</div>
						</form>
					</div>
				</div>
          	</div>
        </div>
      </div>
    </div>


<!-- MODAL PARA VER CONTACTOS-->
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">INFORMACIÓN CONTACTO(S)</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <!-- TABLA PARA INFO DE FAMILIAR -->
			<table id="Consulta_ad" name="Consulta_ad" class="table table-bordered">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Teléfono</th>
						<th>Tipo</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if($datos_familia  != FALSE)
						{
							foreach ($datos_familia->result() as $row) {
								echo '<tr>';
									echo "<td>";
										echo $row->Nombre_representante;
									echo '</td>';
									echo "<td>";
										echo $row->Telefono_repre;
									echo '</td>';
									echo "<td>";
										echo $row->Nombre_categoria;
									echo "</td>";
									echo '<td>';
										 echo '<a href="'.base_url().'index.php/Recepcion/modificar_repre/'.$row->id_representante.'" title="Modificar información" name="Modificar">Modificar</a>';
									echo '</td>';
								echo '</tr>';
							}
						}
					?>
				</tbody>
			</table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
	        <button type="button" data-dismiss="modal" style="float: right;" title="Agregar un nuevo usuario" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar +</button>
	      </div>
	    </div>
	  </div>
	</div>


<!-- MODAL PARA EDITAR DATOS ADULTO -->
	<div class="modal fade bd-example-modal-lg" id="modaleditaradulto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	        <div class="modal-header">
	            <h5 class="modal-title" id="exampleModalLongTitle">Datos adulto</h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>
	        <form onsubmit="return confirm('¿Realmente seguro de que los datos están correctos?                          No se podrán editar tan fácil');" action="<?=base_url()?>index.php/Folios/modificar_adulto/<?=$id_adulto?>/1" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<label><b>Nombre del adulto mayor</b></label>
						</div>
						<div class="col">
							<label><b>Sexo</b></label>
						</div>
					</div>				
					<div class="row">
						<div class="col">
							<input type="text" readonly style="width:200px;height:40px" required="" placeholder="Nombre completo del adulto mayor" class="form-control" id="editNombre_Adulto" name="editNombre_Adulto" value="<?=$Nombre_Adulto?>">	
						</div>
						<div class="col">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" onchange="habNombre()" class="custom-control-input" id="cbxhabNombre">
								<label class="custom-control-label" for="cbxhabNombre">Habilitar</label>
							</div>
						</div>
						<div class="col">
							<input type="text" style="width: 200px;" readonly="" value="<?=$Sexo?>" class="form-control" id="editSexo" name="editSexo" >
						</div>
						<div class="col">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" onchange="habSexo()" class="custom-control-input" id="cbxhabSexo">
								<label class="custom-control-label" for="cbxhabSexo">Habilitar</label>
							</div>
						</div>					
					</div>

					<br>
					<div class="row">
						<div class="col">
							<label><b>Teléfono del adulto mayor</b></label>
						</div>
						<div class="col">
							<label><b>Edad</b></label>
						</div>				
					</div>

					<div class="row">
						<div class="col">
							<input type="text" readonly="" style="width:200px;height:40px" required="" pattern="\([0-9]{3}\) [0-9]{3}[ -][0-9]{4}"  title="Un número de teléfono válido consiste en un área de código de 3 dígitos entre paréntesis, un espacio, los tres primeros dígitos del número, un espacio o guion (-) y cuatro dígitos más" placeholder="(Código de área) 000-0000" maxlength="14" class="form-control" id="editTelefono" name="editTelefono" value="<?=$Telefono?>">
						</div>
						<div class="col">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" onchange="habTelefono()" class="custom-control-input" id="cbxhabTelefono">
								<label class="custom-control-label" for="cbxhabTelefono">Habilitar</label>
							</div>
						</div>
						<div class="col">
							<input type="text" readonly="" value="<?=$Edad?>" required="" style="width:200px;" maxlength="3" class="form-control" id="editEdad" name="editEdad">
						</div>
						<div class="col">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" onchange="habEdad()" class="custom-control-input" id="cbxhabEdad">
								<label class="custom-control-label" for="cbxhabEdad">Habilitar</label>
							</div>
						</div>
					</div>							
				</div>

		        <div class="modal-footer">
		        	<button class="btn btn-outline-danger" onclick="hab()" type="reset" >Cancelar</button>
		        	<button class="btn btn-outline-success" type="submit">Enviar</button>
		        </div>
	        </form>
	    </div>
	  </div>
	</div>


<br>
</div>