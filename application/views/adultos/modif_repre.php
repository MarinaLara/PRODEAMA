<?php
	if($datos_repre != FALSE)
	{
		foreach ($datos_repre->result() as $row) 
		{
			$id_representante = $row->id_representante;
			$Nombre_representante = $row->Nombre_representante;
			$Telefono_repre = $row->Telefono_repre;
			$id_categoria_repres = $row->id_categoria_repres;
			$id_adulto = $row->id_adulto;
		}
	}
?>

<div class="container">
	<br>
	<center><h1>MODIFICAR CONTACTO</h1></center>
	<hr>

	<br></br>

	<div class="card">
		<div class="card-header">
			Detalle del usuario
	  	</div>
	  <ul class="list-group list-group-flush">
	    <li class="list-group-item">
	    	<div class="row">
		    	<div class="col-md-3"></div>
					<div class="col-md-6" style="margin-top: 5%">
						<form onsubmit="return confirm('¿Realmente seguro de que los datos están correctos?                          No se podrán editar tan fácil');" action="<?=base_url()?>index.php/Recepcion/update_repre/<?=$id_representante?>/<?=$id_adulto?>" method="post">
							<div class="form-group">
								<input type="text" style="display: none;" name="id_adulto" id="id_adulto" value="<?=$id_adulto?>">
								<label><b>Nombre del usuario</b></label> 
									<input value="<?=$Nombre_representante?>" type="text"  placeholder="Nombre de familiar/representante/acompañante" class="form-control" id="Nombre_representante" name="Nombre_representante"> 
								<br>
								<label><b>Teléfono usuario</b></label>
									<input value="<?=$Telefono_repre?>" type="text"  pattern="\([0-9]{3}\) [0-9]{3}[ -][0-9]{4}"  title="Un número de teléfono válido consiste en un área de código de 3 dígitos entre paréntesis, un espacio, los tres primeros dígitos del número, un espacio o guion (-) y cuatro dígitos más" placeholder="(Código de área) 000-0000" maxlength="14" class="form-control" id="Telefono_repre" name="Telefono_repre">
								<br>
								<label><b>Seleccione el tipo de usuario</b></label>
									<select class="custom-select" title="Tipo de acompañante/representante" id="select_tipo_representante" name="select_tipo_representante">
										<?php
				                        if($categorias_repres != FALSE)
				                        {
				                            foreach ($categorias_repres->result() as $row) 
				                            {
				                                echo '<option value="'.$row->id_categoria_repres.'"';
				                                    if ($row->id_categoria_repres == $id_categoria_repres) {
				                                    	echo ' selected';
				                                    }
				                                    echo '>';
				                                    echo $row->Nombre_categoria;
				                                echo '</option>';


				                        
				                            } 
				                        }                                    
				                    ?>
									</select>
								<br></br>
								<button class="btn btn-outline-success" type="submit" onclick="return confirm('¿ Esta seguro de modificar al usuario ?')">Enviar</button>
								<button type="button" onClick="window.location.href='<?=base_url()?>index.php/Recepcion/info_adultos/<?=$id_adulto?>'" class="btn btn-outline-danger" >Cancelar </button>
							</div>
						</form>
					</div>
				</div>
			<div class="col-md-3"></div>
	    </li>
	  </ul>
	</div>

</div>