<!-- THIS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script>


<script type="text/javascript" src="<?=base_url()?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
	
	//funcion para mostrar texto ayuda en el boton de + usuario
	$(function () 
	{
	  $('[data-toggle="tooltip"]').tooltip()
	})

	//validaciones para letras y numeros
	$("#Edad").mask('ZZ',{translation:  {'Z': {pattern: /[0-9\s]/, recursive: true}}});
	$("#Nombre_Adulto").mask('ZZ',{translation:  {'Z': {pattern: /[áéíóúñüàèa-zA-Z\s]/, recursive: true}}});
	$("#Nombre_representante").mask('ZZ',{translation:  {'Z': {pattern: /[áéíóúñüàèa-zA-Z\s]/, recursive: true}}});
	$("#Nombre_repre2").mask('ZZ',{translation:  {'Z': {pattern: /[áéíóúñüàèa-zA-Z\s]/, recursive: true}}});
	$("#Edad_Busqueda").mask('ZZ',{translation:  {'Z': {pattern: /[0-9\s]/, recursive: true}}});
	$("#Nombre_Adulto_Busqueda").mask('ZZ',{translation:  {'Z': {pattern: /[áéíóúñüàèa-zA-Z\s]/, recursive: true}}});


	//habilita o deshabilita el campo de telefono en el adulto
	function deshabilita ()
	{
	 	if (document.getElementById("customCheck1").checked){
			document.getElementById("Telefono").setAttribute('disabled', true);
		} else 
		{
			var d = document.getElementById("Telefono"); 
			var d_align = d.getAttributeNode("disabled"); 
			d.removeAttributeNode(d_align);
		}
	}
	function showdiv() {
		var get_id = document.getElementsByName('radiobusqueda');
		
		var id_adulto;
		
		for(var i = 0; i < get_id.length; i++){
		    if(get_id[i].checked){
		        id_adulto = get_id[i].value;
		    }
		}

        alert(id_adulto);

        document.getElementById('div_opciones_busqueda').style.display = '';
	}

	//Habilita o deshabilita parte de usuario en caso de que este seleccionado el cbx
	function hab()
	{
		if (document.getElementById('defaultCheck1').checked) 
		{
			//remueve el atributo disabled
			var d = document.getElementById("Nombre_representante"); 
			var d_align = d.getAttributeNode("disabled"); 
			d.removeAttributeNode(d_align);

			var da = document.getElementById("Telefono_repre"); 
			var d_alignn = da.getAttributeNode("disabled"); 
			da.removeAttributeNode(d_alignn); 

			var ds = document.getElementById("select_tipo_representante"); 
			var d_alignns = ds.getAttributeNode("disabled"); 
			ds.removeAttributeNode(d_alignns); 

			var dbmas = document.getElementById("btnmas"); 
			var d_alignbmas = dbmas.getAttributeNode("disabled"); 
			dbmas.removeAttributeNode(d_alignbmas); 

			//les asigna el atributo required
			d.setAttribute('required', true);
			da.setAttribute('required', true);
			ds.setAttribute('required', true);

		} 
		else
		{
			//al des seleccionar el cbx se vuelve a asignar los atributos disabled, se limpian los input y se manda a llamar a la funcion ocultar en el caso de que haya estado habilitado
			var requidN2 = document.getElementById('Nombre_representante');
			requidN2.setAttribute('disabled', true);
			requidN2.value = ''	//limpiar el input

			var requidT2 = document.getElementById('Telefono_repre');
			requidT2.setAttribute('disabled', true);
			requidT2.value = ''	//limpiar el input

			var requidT3 = document.getElementById('select_tipo_representante');
			requidT3.setAttribute('disabled', true);
			requidT3.value = ''	//limpiar el input

			var requidT4 = document.getElementById('btnmas');
			requidT4.setAttribute('disabled', true);
			requidT4.value = ''	//limpiar el input

			ocultar();			
		}
	}

	//funcion para deshabilitar/ ocultar el insertar informacion de un segundo usuario/representante
	function ocultar()
	{
		document.getElementById('oculto').style.display = 'none';
		//vuelve a ocultar el div
		
		var requidN2 = document.getElementById('Nombre_repre2');
		//toma el valor
		var requidT2 = document.getElementById('Telefono_repre2');
		
		var requidS2 = document.getElementById('select_tipo_representante2');
		
		requidN2.value = ''	//limpiar el input
		requidT2.value = ''
		requidS2.value = ''

		
		//remueve el atributo required
		var d_align_requidT2 = requidT2.getAttributeNode("required"); 
		requidT2.removeAttributeNode(d_align_requidT2); 

		var d_align_requidS2 = requidS2.getAttributeNode("required"); 
		requidS2.removeAttributeNode(d_align_requidS2);

		var d_align_requidN2 = requidN2.getAttributeNode("required"); 
		requidN2.removeAttributeNode(d_align_requidN2);			
	}

	//funcion que habilita los campos de un segundo usuario/representante
	function mostrar()
	{
		document.getElementById('oculto').style.display = '';
		//muestra el div

		var requidN2 = document.getElementById('Nombre_repre2');
		requidN2.setAttribute('required', true)
		//le asigna un nuevo atributo
		var requidT2 = document.getElementById('Telefono_repre2');
		requidT2.setAttribute('required', true)	

		var requidT2 = document.getElementById('select_tipo_representante2');
		requidT2.setAttribute('required', true)		
	}

	//funcion para mostrar, habilitar opciones/atributos dependiendo de quien presente la denuncia
	$(document).ready(function()
	{
		//Muestra el select de quien presenta la denuncia, esto es para que seleccione una opcion a fuerzas y poder desplegar o no
		//la opcion de busqueda en caso de que el adulto ya exista en el sistema
		$('#select_vez').change(function(){
			/*$("#select_vez option:selected").each(function()
			{
				document.getElementById("div_quien").style.display = '';
				document.getElementById("div_selquien").style.display = '';
			});*/

			if ($(this).val() == "SEG") 
			{
				//Despliega modal de busqueda
				$('#exampleModal').modal('show');
			}else
			{
				document.getElementById("div_quien").style.display = '';
				document.getElementById("div_selquien").style.display = '';
			}
		}); 

		//select_dequetipo		1
		$('#select_dequetipo').change(function(){
			$("#select_dequetipo option:selected").each(function()
			{
				document.getElementById("div_vez").style.display = '';
				document.getElementById("div_selvez").style.display = '';

				var vartipoTEL;

				if ($(this).val() == "Tel") 
				{
					vartipoTEL = 2;
					alert(vartipoTEL);
					//0 = POR ATENDER, PRESENCIAL
					//1 = ATENDIDO
					//2 = TELEFONICO, PRIORIDAD, POR ATENDER
				}else
				{
					vartipoTEL = 0;
				}
			});
		}); 

		$('#select_quienpresenta').change(function(){
	        if($(this).val() == "Otro")
	        {
	        	document.getElementById("div_presencial_primeravez").style.display = '';
	           	var d = document.getElementById("Nombre_representante"); 
				var d_align = d.getAttributeNode("disabled"); 
				d.removeAttributeNode(d_align);

				var da = document.getElementById("Telefono_repre"); 
				var d_alignn = da.getAttributeNode("disabled"); 
				da.removeAttributeNode(d_alignn); 

				var ds = document.getElementById("select_tipo_representante"); 
				var d_alignns = ds.getAttributeNode("disabled"); 
				ds.removeAttributeNode(d_alignns); 

				var dbmas = document.getElementById("btnmas"); 
				var d_alignbmas = dbmas.getAttributeNode("disabled"); 
				dbmas.removeAttributeNode(d_alignbmas); 

				d.setAttribute('required', true);
				da.setAttribute('required', true);
				ds.setAttribute('required', true);

				var cbx = document.getElementById("defaultCheck1");
				cbx.setAttribute('checked', true)
				cbx.setAttribute('disabled', true)

				//div_selvez
				document.getElementById("div_selvez").style.display = '';
				document.getElementById("div_vez").style.display = '';
	        }
	        else
	        {
	        	//div_selvez
				document.getElementById("div_selvez").style.display = '';
				document.getElementById("div_vez").style.display = '';

	        	prefun();
	        	
	        	
	        	var cbx = document.getElementById("defaultCheck1");
				var cbx_align = cbx.getAttributeNode("checked"); 
				var cbx_align2 = cbx.getAttributeNode("disabled"); 
				cbx.removeAttributeNode(cbx_align);
				cbx.removeAttributeNode(cbx_align2);

				var requidN2 = document.getElementById('Nombre_representante');
				requidN2.setAttribute('disabled', true);
				requidN2.value = ''	//limpiar el input

				var requidT2 = document.getElementById('Telefono_repre');
				requidT2.setAttribute('disabled', true);
				requidT2.value = ''	//limpiar el input

				var requidT3 = document.getElementById('select_tipo_representante');
				requidT3.setAttribute('disabled', true);
				requidT3.value = ''	//limpiar el input

				var requidT4 = document.getElementById('btnmas');
				requidT4.setAttribute('disabled', true)
	        }
	    });

	});


	//funcion que se manda a llamar desde el select del tipo de denuncia para mostrar el div presencial
	function prefun() 
	{
		document.getElementById("div_presencial_primeravez").style.display = '';
		//muestra el div
		
		document.getElementById("Nombre_Adulto").setAttribute('required', true);
		document.getElementById("Telefono").setAttribute('required', true);
		document.getElementById("customRadioInline1").setAttribute('required', true);
		document.getElementById("select_tipo_servicio").setAttribute('required', true);
		document.getElementById("Edad").setAttribute('required', true);
		//asigna required

		var Nom = document.getElementById("inpt_teltel"); 
		var Nom_rem = Nom.getAttributeNode("required"); 

		if (Nom_rem != null)  //pregunta si habia info en el otro div y la quita
		{
			document.getElementById("div_telefono").style.display = 'none';

			Nom.removeAttributeNode(Nom_rem);

			var Tel = document.getElementById("inpt_nombretel"); 
			var Tel_rem = Tel.getAttributeNode("required"); 
			Tel.removeAttributeNode(Tel_rem);
		}
	}


</script>

<?php  
	if($datos_usuario != FALSE)
	{
		foreach ($datos_usuario->result() as $row) 
		{
			$id_usuario = $row->id_usuario;
			$nombre = $row->nombre;
		}
	}
?>

<div style="margin-top: -80px" class="container">
	<br>

	<!--	FORM QUE AGREGA ADULTO	-->
	<center><h1>RECEPCIÓN</h1></center>
	<hr>
	<form onsubmit="return confirm('¿Realmente seguro de que los datos están correctos?                          No se podrán editar tan fácil');" action="<?=base_url()?>index.php/Recepcion/agregar_adulto" method="post">
		<div class="row">
			<div class="col">
				<label style="width:250px;"><h6>Fecha y hora entrada</h6></label>		
			</div>
			<div id="div_quien" class="col" style="display: none;">
				<label id="lbl_quien" style="width:250px;"><h6>¿Quién presenta la denuncia?</h6></label>
			</div>
			<div class="col" style="display: none;" id="div_vez">
				<label style="width:250px;"><h6>Tipo de registro</h6></label>
			</div>
			<div class="col" id="div_tipodenuncia1">
				<label id="lbl_tipodenuncia1" style="width:250px;"><h6>Tipo de denuncia</h6></label>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<input readonly type="text" style="width: 250px; height:40px; " class="form-control" name="fecha_registro" id="fecha_registro" value="<?php date_default_timezone_set('America/Los_Angeles');
					$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
					echo date('d')."/".$meses[date('n')-1]. "/".date('Y h:i:s A') ;		 			 
					?>">
			</div>
			<div id="div_selquien" class="col" style="display: none;">
				<select style="width:250px;" name="select_quienpresenta" id="select_quienpresenta" class="form-control">
					<option value="">Seleccione una opción</option>
					<option value="AM">Adulto mayor</option>
					<option value="Otro">Otro</option>
				</select>
			</div>
			<div class="col" id="div_selvez" style="display: none;">
				<select class="form-control" id="select_vez" style="width: 250px;">
					<option value="">Seleccione una opción</option>
					<option value="PRIM">Primera vez</option>
					<option value="SEG">Ya existente</option>
				</select>
			</div>
			<div class="col" id="div_dequetipo">
				<select style="width:250px;"  name="select_dequetipo" id="select_dequetipo" class="form-control">
					<option value="Sel">Seleccione una opción</option>
					<option value="Pre">Presencial</option>
					<option value="Tel">Telefónica</option>
				</select>
			</div>
		</div>
		<hr>

		<!-- CAPTURA DE INFORMACIÓN PRESENCIAL -->

		<div id="div_presencial_primeravez" style="display: none;">
			<div class="row">
				<div class="col">
					<label><b>INFORMACIÓN DEL ADULTO</b></label>
					<hr>
					<div class="row">
						<div class="col">
							<label><b>Nombre del adulto mayor</b></label>
							<input type="text" placeholder="Nombre completo del adulto mayor" class="form-control" id="Nombre_Adulto" name="Nombre_Adulto">	
						</div>
					</div>

					<br>
					<div class="row">
						<div class="col">
							<label><b>Teléfono del adulto mayor</b></label>
								<input type="text" pattern="\([0-9]{3}\) [0-9]{3}[ -][0-9]{4}" style="width:215px;height:40px" title="Un número de teléfono válido consiste en un área de código de 3 dígitos entre paréntesis, un espacio, los tres primeros dígitos del número, un espacio o guion (-) y cuatro dígitos más" placeholder="(Código de área) 000-0000" maxlength="14" class="form-control" id="Telefono" name="Telefono">
						</div>
						<div class="col">
							<div style="margin-top: 30%" class="custom-control custom-checkbox">
								<input type="checkbox" onchange="deshabilita()" class="custom-control-input" id="customCheck1">
								<label class="custom-control-label" for="customCheck1">No tiene</label>
							</div>
						</div>
						<div class="col">
							<label><b>Sexo</b></label>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" <?php if (isset($customRadioInline1) && $customRadioInline1=="Hombre")
									echo "checked"; ?> value="Hombre" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
								<label class="custom-control-label" for="customRadioInline1">Hombre </label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" <?php if (isset($customRadioInline2) && $customRadioInline2=="Mujer")
									echo "checked"; ?> value="Mujer" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
								<label class="custom-control-label" for="customRadioInline2">Mujer</label>
							</div>
						</div>
					</div>

					<br>
					<div class="row">
						<div class="col">
							<label><b>Tipo de servicio solicitado</b></label>
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
						</div>
						<div class="col">
							<label><b>Edad</b></label>
							<input type="text" style="width:70px;height:40px" maxlength="3" class="form-control" id="Edad" name="Edad">
						</div>
					</div>

					<br>
					<div class="row">
						<div class="col">
							<label><h6>Observaciones</h6></label>
							<input type="text" class="form-control" id="txt_obs" name="txt_obs" rows="3">
						</div>
					</div>
					<br>
				</div>

				<div class="col">
					<div class="row">
						<div class="col">
							<label><b>INFORMACIÓN DEL USUARIO</b></label>
						</div>
						<div class="col">
							<table>
								<td>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" onchange="hab()" class="custom-control-input" id="defaultCheck1">
										<label class="custom-control-label" for="defaultCheck1">Habilitar</label>
									</div>
								</td>
								<td>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</td>
								<td>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</td>
								<td>
									<button  disabled  style="margin-top: -10px" onclick="mostrar()"  value="mostrar" data-toggle="tooltip" data-placement="top" id="btnmas" title="Agregar otro representante" type="button" class="btn btn-info">+</button>
								</td>
							</table>
						</div>
					</div>
					<hr>
					<!-- CAPTURA DE INFORMACIÓN -->
					<div class="row">
						<div class="col">
							<label><b>Nombre del usuario</b></label> 
								<input type="text" disabled="" placeholder="Nombre de familiar/representante/acompañante" class="form-control" id="Nombre_representante" name="Nombre_representante"> 
						</div>
					</div>

					<br>
					<div class="row">
						<div class="col">
							<label><b>Teléfono usuario</b></label>
								<input type="text" disabled=""  pattern="\([0-9]{3}\) [0-9]{3}[ -][0-9]{4}" style="width:215px;height:40px" title="Un número de teléfono válido consiste en un área de código de 3 dígitos entre paréntesis, un espacio, los tres primeros dígitos del número, un espacio o guion (-) y cuatro dígitos más" placeholder="(Código de área) 000-0000" maxlength="14" class="form-control" id="Telefono_repre" name="Telefono_repre">	
						</div>
						<div class="col">
							<label><b>Seleccione el tipo de usuario</b></label>
							<select disabled="" style="width:200px;height:40px" class="custom-select" title="Tipo de acompañante/representante" id="select_tipo_representante" name="select_tipo_representante">
								<option value="">Tipo de usuario</option>
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
						</div>
					</div>

					<br>
					<div id="oculto" style="display: none;">
						<div class="row">
							<div class="col">
								<button type="button"  class="close" id="limpiar" name="limpiar" onclick="ocultar()" >
									<span aria-hidden="true">&times;</span>
					            </button>
							</div>
						</div>

						<div class="row">
							<div class="col">
								<label><b>Nombre del usuario</b></label> 
									<input type="text" placeholder="Nombre de familiar/representante/acompañante" class="form-control" id="Nombre_repre2" name="Nombre_repre2"> 
							</div>
						</div>

						<br>
						<div class="row">
							<div class="col">
								<label><b>Teléfono usuario</b></label>
									<input type="text"  pattern="\([0-9]{3}\) [0-9]{3}[ -][0-9]{4}" style="width:215px;height:40px" title="Un número de teléfono válido consiste en un área de código de 3 dígitos entre paréntesis, un espacio, los tres primeros dígitos del número, un espacio o guion (-) y cuatro dígitos más" placeholder="(Código de área) 000-0000" maxlength="14" class="form-control" id="Telefono_repre2" name="Telefono_repre2">
							</div>
							<div class="col">
								<label><b>Seleccione el tipo de usuario</b></label>
								<select style="width:200px;height:40px" class="custom-select" title="Tipo de acompañante/representante" id="select_tipo_representante2" name="select_tipo_representante2">
									<option value="">Tipo de usuario</option>
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
							</div>
						</div>
					</div>
					<br><br><br>
				</div>

			</div>
			<!--BOTONES ENVIAR -->
			<br><br>
			<div class="row">
				<div class="col"></div>
				<div class="col" style="margin-top: -110px">
					<button class="btn btn-outline-success" type="submit">Enviar</button>
					<button id="cancelar_envio" name="cancelar_envio" class="btn btn-outline-danger" type="reset" title="Borra todos los datos de esta ventana" onclick="otro()" >Cancelar</button>
				</div>
			</div>
		</div>
	</form>



<!--	MODAL DE BUSQUEDA DE ADULTO	-->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
    	<div class="modal-content">
		    <div class="modal-header">
		    	<h5 class="modal-title" id="myLargeModalLabel">Buscar</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		    </div>
		    <form method="post" id="form_ex" name="form_ex">
		      	<div class="modal-body">        
			        <div class="form-group">
			            <div class="row">
			            	<div class="col-md-8">
				            	<label><b>Nombre del adulto mayor</b></label>
								<input type="text" required placeholder="Nombre completo del adulto mayor" class="form-control" id="Nombre_Adulto_Busqueda" name="Nombre_Adulto_Busqueda">	
				            </div>
				            <div class="col-md-2">
				            	<label><b>Edad</b></label>
								<input type="text" required style="width:70px;height:40px" maxlength="3" class="form-control" id="Edad_Busqueda" name="Edad_Busqueda">
				            </div>
				            <div class="col-md-2">
				            	<button type="submit" class="btn btn-primary" id="buscar-btn" name="buscar-btn" style="width: 100px; margin-top: 33%;">Buscar</button>
				            </div>
			            </div>
			            <br>
			            <div class="row" id="div_opciones_busqueda" style="display: none;">
							<div class="col">
								<label><b>¿Quién presenta la denuncia?</b></label>
								<br>
								<select style="width:250px;" name="select_quienpresenta_busqueda" id="select_quienpresenta_busqueda" class="form-control">
									<option value="">Seleccione una opción</option>
									<option value="AM">Adulto mayor</option>
									<option value="Otro">Otro</option>
								</select>
							</div>
							<div class="col">
								<button class="btn btn-outline-success" style="margin-top: 8%; width: 250px;" type="submit">Enviar</button>
							</div>
						</div>

			        </div>
		          	<br>
		        	<div id="central" name="central">
		          	
		        	</div>
		        </div>
		    </form>

		    <div class="modal-footer">
		        <button id="cancelar" name="cancelar" type="button" class="btn btn-danger" style="width: 150px;" data-dismiss="modal">Cerrar</button>
		    </div>
		</div>
    </div>
</div>
  
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#buscar-btn').on('click', function() {
				var nombreAdulto = $('#Nombre_Adulto_Busqueda').val();
				var edad = $('#Edad_Busqueda').val();
		        
		        $("#central").load('<?=base_url()?>index.php/Recepcion/busqueda_existente/' + nombreAdulto + '/' + edad);
		        return false;
		    });

		    $('#cancelar').on('click', function() {
				$('#Nombre_Adulto_Busqueda').val('');
				$('#Edad_Busqueda').val('');
				document.getElementById('central').style.display = 'none';
		    });

		    
		    
		});
	</script>
</div>

</div>

