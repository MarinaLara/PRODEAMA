
<?php
	if ($datos_folios != FALSE) 
	{
		foreach ($datos_folios->result() as $row) 
		{
			$id_folio = $row->id_folio;
			$A_registro = $row->A_registro;
			$Folio_adulto = $row->Folio_adulto;
			$Nombre_servicio = $row->Nombre_servicio;			
			$fecha_comienzo = $row->fecha_comienzo;
			$Nombre_Adulto = $row->Nombre_Adulto;

		}
	}
?>


<div style="margin-top: -70px" class="container">
	<br>
	
	<center>
		<h3><b>FOLIO:</b></h3>
	</center>
	
	<!--<a class="btn btn-outline-secondary btn-lg" style="float: right;" title="Estudio socio economico" href="<?=base_url()?>index.php/Folios/realizarESE" role="button">Realizar ESE</a>-->
	<center>
		<label style="color: rgb(199, 0, 57);">
			<h3><!--&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;--><?= $Folio_adulto?> - <?= $A_registro?></h3>
		</label>
	</center>
	

	<hr>

	<form>
		<div class="row">
			<div class="col">
				<label><b>Nombre del adulto mayor</b></label>
				<input type="text" disabled="" style="width:350px;height:40px" class="form-control" id="Nombre_Adulto" name="Nombre_Adulto" value="<?=$Nombre_Adulto?>">
			</div>
			<div class="col">
				<label><b>Tipo de servicio solicitado</b></label>
				<input type="text" disabled="" value="<?=$Nombre_servicio?>" class="form-control" id="Servicio_req" name="Servicio_req" >
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col">
				<label><b>Observaciones</b></label>
				<textarea class="form-control" id="Observacion" rows="4"></textarea>
			</div>
			<div class="col">
				<label><b>Asunto</b></label>
				<br>
				<select class="custom-select my-1 mr-sm-2" title="TAsunto" required="" id="select_Asunto"  name="select_Asunto">
					
				</select>
				<label><b>Turno</b></label>
				<br>
				<select class="custom-select my-1 mr-sm-2" title="Tipo de servicio solicitado" required="" id="select_tipo_servicio"  name="select_tipo_servicio">
					<option value=""> Seleccione el area a turnar</option>
					
				</select>
			</div>
		</div>
		<br>
		<button class="btn btn-outline-success" type="submit">Enviar</button>
		<button class="btn btn-outline-danger" type="reset" title="Borra todos los datos de esta ventana">Cancelar</button>
	</form>

</div>