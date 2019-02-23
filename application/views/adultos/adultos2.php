<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script>


<script type="text/javascript">

	function dis() {
		document.getElementById('oculto').style.display = '';
		
		var d = document.getElementById("Nombre_Adulto"); 
		var d_align = d.getAttributeNode("disabled"); 
		d.removeAttributeNode(d_align); 

		var dT = document.getElementById("Telefono"); 
		var d_alignT = dT.getAttributeNode("disabled"); 
		dT.removeAttributeNode(d_alignT); 

		var dE = document.getElementById("Edad"); 
		var d_alignE = dE.getAttributeNode("disabled"); 
		dE.removeAttributeNode(d_alignE); 

		
	}
	
	function ocultar()
	{
		document.getElementById('oculto').style.display = 'none';
		//muestra el div
		var requidN2 = document.getElementById('Nombre_Adulto');
		requidN2.setAttribute('disabled', true)
		//le asigna un nuevo atributo
		var requidT2 = document.getElementById('Telefono');
		requidT2.setAttribute('disabled', true)

		var requidE = document.getElementById('Edad');
		requidE.setAttribute('disabled', true)
		
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
			$Nombre_servicio = $row->Nombre_servicio;			
			$fecha_comienzo = $row->fecha_comienzo;

		}
	}
?>

<div class="container">
	<br>
	<center><h1>INFORMACIÓN ADULTO</h1></center>

		<?php 
		if($this->session->userdata('nivel_usuario') == 1)
		{
			echo '
			<button style="float: right;" onclick ="dis()" id="mostrar"  value="mostrar"  type="button" class="btn btn-info">
				<span><b>Habilitar edición</b></span>
			</button>';
		}
		
		?>

		<a class="btn btn-outline-danger" style="float: left;" title="Agregar adulto" href="<?=base_url()?>index.php/Recepcion/Vconsulta_adultos" role="button">Regresar</a>
		<br>

		<!--<center>
			<label style="color: rgb(199, 0, 57);"><h3>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; FOLIO: <?=$Folio_adulto?>-<?=$A_registro?></h3></label>
		</center>-->
	
	<hr style="margin-top: 2%">


<div class="row col-md-12">		
		<div class="col-md-12">	
		<table>
			<td>
				<label><b>Nombre del Adulto mayor</b></label>
				<input type="text" disabled="" style="width:400px;height:40px" required="" placeholder="Nombre completo del adulto mayor" class="form-control" id="Nombre_Adulto" name="Nombre_Adulto" value="<?=$Nombre_Adulto?>">			
			</td>
			<td>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
			<td>
				<label><b>Telefono del adulto mayor</b></label>
				<input type="text" disabled="" required="" placeholder="Telefono del Adulto" maxlength="10" class="form-control" id="Telefono" name="Telefono" value="<?=$Telefono?>">
			</td>
			<td>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; </td>
			<td>
				<label><b>Sexo</b></label>							
			<br>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" <?php if (isset($customRadioInline1) && $customRadioInline1=="Hombre")
						echo "checked"; ?> value="Hombre" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
					<label class="custom-control-label" for="customRadioInline1">Hombre </label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" <?php if (isset($customRadioInline2) && $customRadioInline2=="Mujer")
						echo "checked"; ?> value="Mujer" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
					<label class="custom-control-label" for="customRadioInline2">Mujer.</label>
				</div>
				
			</td>
			<td>&nbsp; &nbsp;&nbsp; </td>
			<td>
				<label><b>Edad</b></label>
					<input type="text" disabled="" value="<?=$Edad?>" required="" style="width:70px;height:40px" maxlength="3" class="form-control" id="Edad" name="Edad">
			</td>

		</table>	
			
		<br>
			<div id='oculto' style="display: none;" >
				<div style="float: right;">
					<td>
						<button  class="btn btn-outline-success" type="submit">Enviar</button>
					</td>
						<td>&nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;</td>
					<td>
						<button  class="btn btn-outline-danger" type="close"  onclick="ocultar()">Cancelar</button>
					</td>
				</div>
			</div>				
		</div>
	</div>
	
	<hr><br>
	
	<div>
		<td>
			<button class="btn btn-secondary btn-lg" style="width: 200px" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Contactos</button>
		</td>
			<td>&nbsp; &nbsp;</td>
		<td><button class="btn btn-success btn-lg" style="width: 250px" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">Folios</button>
			
			
		</td>

	</div>
	
	<br>

	<div class="collapse" id="collapseExample"> 
	  	<center><b>INFORMACIÓN CONTACTO(S)</b></center>
		<hr>
		<button type="button" style="float: right;" title="Agregar un nuevo usuario" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar +</button>

		<br></br>
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

<br><br>

	<div class="collapse" id="collapseExample2"> 
		<center><b>FOLIO(S)</b></center>
		<hr>
		<button type="button" style="float: right;" title="Agregar un nuevo folio" class="btn btn-outline-secondary" data-toggle="modal" data-target="#MODAL_FOLIOS" data-whatever="@mdo">Agregar +</button>

		<br></br>
		<!-- TABLA PARA INFO DE FAMILIAR -->
		<table id="Consulta_expedientes" name="Consulta_expedientes" class="table table-bordered">
			<thead>
				<tr>
					<th>Folio</th>
					<th>Servicio requerido</th>
					<th>Fecha solicitud</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if($datos_folios  != FALSE)
					{
						foreach ($datos_folios->result() as $row) {
							echo '<tr>';
								echo "<td>";
									echo $row->Folio_adulto;
									echo "-";
									echo $row->A_registro;
								echo '</td>';
								echo "<td>";
									echo $row->Nombre_servicio;
								echo '</td>';
								echo "<td>";
									echo $row->fecha_comienzo;
								echo '</td>';
								echo '<td>';
									 echo '<a href="'.base_url().'index.php/Folios/folio/'.$row->id_folio.'" title="Ver más información del Adulto" name="VerDetalles">Ver detalles</a>';
									  
								echo '</td>';
							echo '</tr>';
						}
					}
				?>
			</tbody>
		</table>	
	</div>
<br><br>

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
								<input type="text"  placeholder="Telefono del acompañante" maxlength="10" class="form-control" id="Telefono_repre" name="Telefono_repre">
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

<!-- MODAL PARA AGREGAR FOLIOS -->
	<div class="modal fade" id="MODAL_FOLIOS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo folio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          	<div class="modal-body">
	            <div class="row">
					<div class="col-md-12" style="margin-top: 2%">
						<form action="<?=base_url()?>index.php/Folios/nuevo_folio/<?=$id_adulto?>" onsubmit="return confirm('¿Realmente seguro de que los datos están correctos?                          No se podrán editar tan fácil');"  method="post">
							<div class="form-group">
							<input style="display: none;" type="text" class="form-control" name="fecha_registro" id="fecha_registro" value="<?= $fecha_registro = date("j/F/Y h:i:s A");?>">
								<?php date_default_timezone_set('America/Los_Angeles'); ?>
							
							<label><b>Tipo de servicio solicitado</b></label>
							<select class="custom-select" title="Tipo de servicio solicitado" required="" id="select_tipo_servicio" style="width:250px;height:40px" name="select_tipo_servicio">
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

</div>