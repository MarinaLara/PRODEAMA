<link href="<?=base_url()?>css/eseStyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">
	//funcion para sumar los 16 inputs (egresos)
	function suma() {
		//obtiene los datos
		var var_alim = document.getElementById("inpt_alimentacion").value;
		var var_luz = document.getElementById("inpt_luz").value;
		var var_gas = document.getElementById("inpt_gas").value;
		var var_telefono = document.getElementById("inpt_telefono").value;
		var var_renta = document.getElementById("inpt_renta").value;
		var var_celular = document.getElementById("inpt_celular").value;
		var var_agua = document.getElementById("inpt_agua").value;
		var var_cable = document.getElementById("inpt_cable").value;
		var var_predial = document.getElementById("inpt_predial").value;
		var var_transporte = document.getElementById("inpt_transporte").value;
		var var_educacion = document.getElementById("inpt_educacion").value;
		var var_fondos = document.getElementById("inpt_fondos").value;
		var var_medicos = document.getElementById("inpt_medicos").value;
		var var_prestamos = document.getElementById("inpt_prestamos").value;
		var var_recreacion = document.getElementById("inpt_recreacion").value;
		var var_abonos = document.getElementById("inpt_abonos").value;
		
		//los convierte en numeros
		var var_parse_alim = parseInt(var_alim);
		var var_parse_luz  = parseInt(var_luz);
		var var_parse_gas  = parseInt(var_gas);
		var var_parse_telefono  = parseInt(var_telefono);
		var var_parse_renta  = parseInt(var_renta);
		var var_parse_celular  = parseInt(var_celular);
		var var_parse_agua  = parseInt(var_agua);
		var var_parse_cable  = parseInt(var_cable);
		var var_parse_predial  = parseInt(var_predial);
		var var_parse_transporte  = parseInt(var_transporte);
		var var_parse_educacion  = parseInt(var_educacion);
		var var_parse_fondos  = parseInt(var_fondos);
		var var_parse_medicos  = parseInt(var_medicos);
		var var_parse_prestamos  = parseInt(var_prestamos);
		var var_parse_recreacion  = parseInt(var_recreacion);
		var var_parse_abonos  = parseInt(var_abonos);

		var var_total =  var_parse_alim + var_parse_luz + var_parse_gas + var_parse_telefono + var_parse_renta + var_parse_celular + var_parse_agua + var_parse_cable + var_parse_predial + var_parse_transporte + var_parse_educacion + var_parse_fondos + var_parse_medicos + var_parse_prestamos + var_parse_recreacion + var_parse_abonos;

		document.getElementById("inpt_total").value = var_total;
	}	

	

	//funcion para el select del tipo de vivienda (A MODIFICAR)
	$(document).ready(function()
	{
	    $("#select_tipovivienda").change(function () { 
	        $("#select_tipovivienda option:selected").each(function () 
	        {
	            document.getElementById('tipootrovivienda').style.display = '';     
	            var requidotrovivienda = document.getElementById('inpt_otrosvivienda');
				requidotrovivienda.setAttribute('required', true)
       
	        });
	    })
	});

	function yesnoCheck() {
		if (document.getElementById('optradio3').checked)
		{
			document.getElementById('div_txtsalud').style.display = '';
			var requiddisc = document.getElementById('textsalud');
			requiddisc.setAttribute('required', true)
		}
		else
		{
			document.getElementById('div_txtsalud').style.display = 'none';
			var requiddisc = document.getElementById('textsalud');
			requiddisc.setAttribute('required', false)
		}
	}

	
	function algo() {
		if (document.getElementById('chk_IMSS').checked) 
		{
			var dis1 = document.getElementById('chk_ISSSTE');
			dis1.setAttribute('disabled', true);
			var dis2 = document.getElementById('chk_ISSSTESON');
			dis2.setAttribute('disabled', true);
		}else {
			var dis1 = document.getElementById('chk_ISSSTE');
			var dis11 = dis1.getAttributeNode("disabled");
			dis1.removeAttributeNode(dis11);

			var dis2 = document.getElementById('chk_ISSSTESON');
			var dis22 = dis2.getAttributeNode("disabled");
			dis2.removeAttributeNode(dis22);
		}
	}

	function algo1() {
		if (document.getElementById('chk_ISSSTE').checked) 
		{
			var dis3 = document.getElementById('chk_IMSS');
			dis3.setAttribute('disabled', true);
			var dis4 = document.getElementById('chk_ISSSTESON');
			dis4.setAttribute('disabled', true);
		}else {
			var dis3 = document.getElementById('chk_IMSS');
			var dis33 = dis3.getAttributeNode("disabled");
			dis3.removeAttributeNode(dis33);

			var dis4 = document.getElementById('chk_ISSSTESON');
			var dis44 = dis4.getAttributeNode("disabled");
			dis4.removeAttributeNode(dis44);
		}	
	}

	function algo2(){
		if (document.getElementById('chk_ISSSTESON').checked) 
		{
			var dis5 = document.getElementById('chk_IMSS');
			dis5.setAttribute('disabled', true);
			var dis6 = document.getElementById('chk_ISSSTE');
			dis6.setAttribute('disabled', true);
		}else {
			var dis5 = document.getElementById('chk_IMSS');
			var dis55 = dis5.getAttributeNode("disabled");
			dis5.removeAttributeNode(dis55);

			var dis6 = document.getElementById('chk_ISSSTE');
			var dis66 = dis6.getAttributeNode("disabled");
			dis6.removeAttributeNode(dis66);
		}
	}

	//funcion para habilitar el campo de disapacidad y agregar o quitar el atributo required
	function habdis()
	{
		if (document.getElementById('customRadioInline2').checked) //si
		{
			document.getElementById('tipo_disc').style.display = '';
			var requiddisc = document.getElementById('tipo_d');
			requiddisc.setAttribute('required', true)
			requiddisc.setAttribute('value', "")
		}
		else if (document.getElementById('customRadioInline1').checked) //no
		{
			//oculta el div del input
			document.getElementById('tipo_disc').style.display = 'none';
			//obtiene el input
			var requiddisc = document.getElementById('tipo_d');

									
			var d_alignns = requiddisc.getAttributeNode("required"); 
			if (d_alignns != null) 
			{
				
				//remueve el attr required
				requiddisc.removeAttributeNode(d_alignns); 
				
				//le asigna el valor " " para que en caso de no tener una discap pueda pasar
				requiddisc.setAttribute('value', ' ');
				
				//lo deshabilita
				requiddisc.setAttribute('disabled', true);
				
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
			
		}
	}
?>

<div class="container">
	
	<br>
	<center><h1>ESTUDIO SOCIOECONÓMICO</h1></center>
	<hr><br>

	<form>
		
		<div class="tab">

			<label><b>1.-DATOS GENERALES</b></label>
			<div class="row">
				<div class="col">
					<label><b>Nombre del Adulto mayor</b></label>
					<input type="text" readonly="" style="width:350px;height:40px" class="form-control" id="Nombre_Adulto" name="Nombre_Adulto" value="<?=$Nombre_Adulto?>">
				</div>
				<div class="col">
					<label><b>Sexo</b></label>
					<input type="text" readonly="" value="<?=$Sexo?>" class="form-control" id="Sexo" name="Sexo" >
				</div>
				<div class="col">
					<label><b>Edad</b></label>
					<input type="text" readonly="" value="<?=$Edad?>" class="form-control" id="Edad" name="Edad" >
				</div>
			</div>
				<br>
			<div class="row">
				<div class="col">
					<label><b>Fecha de nacimiento</b></label>
					<input type="date" required="" class="form-control" id="FechaNac" name="FechaNac" >
				</div>
				<div class="col">
					<label><b>Lugar y origen</b></label>
					<input type="text" value="" required="" class="form-control" id="LugyOrig" name="LugyOrig" >
				</div>
			</div>
				<br>
			<div class="row">
				<div class="col">
					<label><b>Estado civil</b></label>
					<input type="text" value="" required="" class="form-control" id="edocivil" name="edocivil" >
				</div>
				<div class="col">
					<label><b>Escolaridad</b></label>
					<input type="text" value="" required="" class="form-control" id="Escolaridad" name="Escolaridad" >
				</div>
				<div class="col">
					<label><b>Ocupación</b></label>
					<input type="text" value="" required="" class="form-control" id="Ocupacion" name="Ocupacion" >
				</div>
			</div>
				<br>
			<div class="row">
				<div class="col">
					<label><b>¿Presenta alguna discapacidad?</b></label>
						<br>
					<div class="custom-control custom-radio custom-control-inline">
						<input required="" onchange="habdis()" type="radio" <?php if (isset($customRadioInline1) && $customRadioInline1=="No")
							echo "checked"; ?> value="No" id="customRadioInline1" name="radio_discapacidad" class="custom-control-input">
						<label class="custom-control-label" for="customRadioInline1">No </label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input required="" onchange="habdis()" type="radio" <?php if (isset($customRadioInline2) && $customRadioInline2=="Si")
							echo "checked"; ?> value="Si" id="customRadioInline2" name="radio_discapacidad" class="custom-control-input">
						<label class="custom-control-label" for="customRadioInline2">Si</label>
					</div>
				</div>
				<div class="col" id="tipo_disc" style="display: none;">
					<label><b>¿De qué tipo?</b></label>
					<input type="text" class="form-control" value=" " id="tipo_d" name="tipo_d" >		
				</div>
			</div>
			<br>
		</div>

		<div class="tab">
			<label><b>2.-DATOS DE IDENTIFICACIÓN DOMICILIARIA</b></label>
			<div class="row">
				<div class="col">
					<label><b>Domicilio</b></label>
					<input type="text" class="form-control" name="domicilo" id="domicilo">
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label><b>Referencia</b></label>
					<input type="text" class="form-control" name="referencia" id="referencia">
				</div>
				<div class="col">
					<label><b>Telefono</b></label>
					<input type="text" disabled="" value="3434343" class="form-control" name="Telefono" id="Telefono">
				</div>
			</div>
			<br>
		</div>

		<div class="tab">
			<label><b>3.-INGRESOS Y EGRESOS DE LA FAMILIA</b></label>
			<div class="row">
				<div class="col">
					<label><b>INGRESO Mensual (registra quien, cuanto aporta y suma total)</b></label>
				</div>
			</div>
			<table  class="table table-bordered">
				<thead>
					<th>Nombre</th>
					<th>Cuanto aporta</th>
					<th>Opción</th>
				</thead>
				<tbody id="contenido">
					<label id="vacia"></label>
				</tbody>
			</table>
			
			<div class="row">
				<div class="col">
					<label><b>&nbsp; &nbsp; Total: &nbsp; &nbsp; </b></label>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">$</span>
						</div>
						<input type="text" class="form-control" name="inpt_total_aportes" value="0" id="inpt_total_aportes" readonly  aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>
				<div class="col"></div><div class="col"></div>
			</div>

			<hr>

			<br>

			<div class="row">
				<div class="col">
					<label>Nombre</label>		
				</div>
				<div class="col">
					<label>Cuanto aporta</label>
				</div>
				<div class="col"></div>
			</div>
			<div class="row">
				<div class="col">
					<input class="form-control" placeholder="Ingrese el nombre de la persona que aporta" type="text" name="inpt_Nombre" id="inpt_Nombre">
					<span style="color: red;display: none;" id="validacion_nombre"> Falta Nombre</span>
				</div>
				<div class="col">
					<input type="text" class="form-control" placeholder="$" name="inpt_cuanto" id="inpt_cuanto">
						<span style="color: red;display: none;" id="validacion_aporta"> Falta cantidad</span>
				</div>
				<div class="col">
					<button type="button"  class="btn btn-outline-success" onclick="agregarpersonas()"> Agregar </button>
				</div>
			</div>
			<hr>

			<script type="text/javascript">
				var vacia = document.getElementById('vacia');
				vacia.style.display = 'none';

				var personas = 
				[
					
				]


				var contenido = document.getElementById("contenido");

				function agregarpersonas() {
					var Nombre = document.getElementById('inpt_Nombre');
					var Aporta = document.getElementById('inpt_cuanto');

					if (Nombre.value == '') 
					{
						Nombre.style.borderColor = 'red';
						document.getElementById('validacion_nombre').style.display = 'block';
						alert('Campo Nombre vacio');
					} else if (Aporta.value == '') 
					{
						Aporta.style.borderColor = 'red';
						document.getElementById('validacion_aporta').style.display = 'block';
						alert('Campo aportación vacio');
					} else
					{
						personas.push(
						{
							Nombre: Nombre.value,
							Aporta: Aporta.value
						});
						cargartabla();
						Nombre.value = ''
						Aporta.value = ''
					}
				}

				function cargartabla()
				{
					contenido.innerHTML = '';
					var suma = 0; 
					for (var elemento in personas) {
						var tabla = '<tr>'+
										' <td>'+ 
											personas[elemento]["Nombre"] +
										' </td>'+
										' <td>'+ 
											personas[elemento]["Aporta"] +
										'</td> '+
										'<td>'+
											'<center><button class="btn btn-danger" onclick="borrar('+elemento+')"> Borrar </button></center>'+
										'</td>'+
									' </tr>'
						contenido.innerHTML += tabla

						var cont_total = personas[elemento]["Aporta"];

						var cont_totalparse = parseInt(cont_total);
						
						suma = suma + cont_totalparse;

						document.getElementById('inpt_total_aportes').value = suma;
					}

					
					if (personas.length == 0) 
					{
						vacia.style.display = 'block'
					}
				}

				function borrar(id) 
				{
					var res = confirm("Borrar elemento " + id)	;
					alert("Borrar elemento " + id)	;
					if (res) 
					{
						personas.splice(id, 1);
						cargartabla();
					}
				}

				cargartabla();
			</script>

			<br>
			<label><h5>Egreso mensual</h5></label>
			<div class="row">
				<div class="col">							
					<label><b>Tipos de gastos</b></label>
				</div>
				<div class="col">
					<label><b>Importe</b></label>				
				</div>
				<div class="col">
					<label><b>Tipos de gastos</b></label>
				</div>
				<div class="col">
					<label><b>Importe</b></label>
				</div>
			</div>
			<br>
			
			<div class="row">
				<div class="col">
					<label><b>Alimentación</b></label>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">$</span>
						</div>
						<input type="text" class="form-control" name="inpt_alimentacion" id="inpt_alimentacion" onchange="suma()" value="0" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>
				<div class="col">
					<label><b>Electricidad(Luz)</b></label>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">$</span>
						</div>
						<input type="text" class="form-control" name="inpt_luz" id="inpt_luz" onchange="suma()" value="0" aria-label="Username" aria-describedby="basic-addon1">
					</div>

				</div>
			</div>
			
			
			<br>
			<div class="row">
				<div class="col">
					<label><b>Gas o Combustible</b></label>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">$</span>
						</div>
						<input type="text" class="form-control" name="inpt_gas" id="inpt_gas" onchange="suma()" value="0" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>
				<div class="col">
					<label><b>Telefono</b></label>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">$</span>
						</div>
						<input type="text" class="form-control" name="inpt_telefono" id="inpt_telefono" onchange="suma()" value="0" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>
			</div>
			
			<br>
			<div class="row">
				<div class="col">
					<label><b>Renta</b></label>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">$</span>
						</div>
						<input type="text" class="form-control" name="inpt_renta" id="inpt_renta" onchange="suma()" value="0" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>
				<div class="col">
					<label><b>Telefono celular</b></label>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">$</span>
						</div>
						<input type="text" class="form-control" name="inpt_celular" id="inpt_celular" onchange="suma()" value="0" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>
			</div>
			
			<br>
			<div class="row">
				<div class="col">
					<label><b>Agua</b></label>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">$</span>
						</div>
						<input type="text" class="form-control" name="inpt_agua" id="inpt_agua" onchange="suma()" value="0" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>
				<div class="col">
					<label><b>Cable, Sky</b></label>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">$</span>
						</div>
						<input type="text" class="form-control" name="inpt_cable" id="inpt_cable" onchange="suma()" value="0" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>
			</div>
			
			<br>
			<div class="row">
				<div class="col">
					<label><b>Predial</b></label>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">$</span>
						</div>
						<input type="text" class="form-control" name="inpt_predial" id="inpt_predial" onchange="suma()" value="0" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>
				<div class="col">
					<label><b>Transporte</b></label>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">$</span>
						</div>
						<input type="text" class="form-control" name="inpt_transporte" id="inpt_transporte" onchange="suma()" value="0" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>
			</div>
			
			<br>
			<div class="row">
				<div class="col">
					<label><b>Educación</b></label>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">$</span>
						</div>
						<input type="text" class="form-control" name="inpt_educacion" id="inpt_educacion" onchange="suma()" value="0" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>
				<div class="col">
					<label><b>Fondos de ahorro</b></label>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">$</span>
						</div>
						<input type="text" class="form-control" name="inpt_fondos" id="inpt_fondos" onchange="suma()" value="0" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>
			</div>
			
			<br>
			<div class="row">
				<div class="col">
					<label><b>Gastos médicos</b></label>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">$</span>
						</div>
						<input type="text" class="form-control" name="inpt_medicos" id="inpt_medicos" onchange="suma()" value="0" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>
				<div class="col">
					<label><b>Prestamos</b></label>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">$</span>
						</div>
						<input type="text" class="form-control" name="inpt_prestamos" id="inpt_prestamos" onchange="suma()" value="0" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>
			</div>
			
			<br>
			<div class="row">
				<div class="col">
					<label><b>Recreación</b></label>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">$</span>
						</div>
						<input type="text" class="form-control" name="inpt_recreacion" id="inpt_recreacion" onchange="suma()" value="0" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>
				<div class="col">
					<label><b>Abonos o créditos</b></label>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">$</span>
						</div>
						<input type="text" class="form-control" name="inpt_abonos" id="inpt_abonos" onchange="suma()" value="0" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>
			</div>
			
			<br>
			<div class="row">
				<div class="col">
					<label><b>Total de egresos</b></label>
				</div>
				<div class="col">
					<input type="text" readonly="" style="width:210px;height:40px" placeholder="$" class="form-control" name="inpt_total" id="inpt_total">
				</div>
				<div class="col">
					
				</div>
				<div class="col">
					
				</div>			
			</div>
			
			<br>  
		</div>

		<div class="tab">
			<label><b>4.- BIENES INMUEBLES</b></label>
			<div class="row">
				<div class="col">
					<label><b>Situación de la vivienda (donde actualmente vive)</b></label>
					<br>
					<select class="custom-select"  required="" id="select_situacion_vivienda"  name="select_situacion_vivienda">
						<option value="">SELECCIONE UNA OPCIÓN</option>
						<option value="PROPIA">PROPIA</option>
						<option value="RENTADA">RENTADA</option>
						<option value="PRESTADA">PRESTADA</option>
						<option value="INVADIDA">INVADIDA</option>
					</select>
				</div>
				<div class="col">
					<label><b>Tipo de vivienda</b></label>
					<select class="custom-select" required="" id="select_tipovivienda" name="select_tipovivienda">
						<option value="">SELECCIONE UNA OPCIÓN</option>
						<option value="CASA">CASA</option>
						<option value="DEPARTAMENTO">DEPARTAMENTO</option>
						<option value="VECINDAD">VECINDAD</option>
						<option value="OTROS" >OTROS</option>
					</select>
				</div>
				<div class="col" style="display: none;" id="tipootrovivienda">
					<label><b>Especifique otros</b></label>
					<input type="text" class="form-control" placeholder="ocultar esto" name="inpt_otrosvivienda" id="inpt_otrosvivienda">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col">
					<label><b>Numero de dormitorios</b></label>
					<input type="text" style="width:100px;height:40px" class="form-control" name="" id="">
				</div>
				<div >
					<br>
					<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" class="custom-control-input" id="customCheck1">
						<label class="custom-control-label" for="customCheck1">Sala</label>
					</div>
					<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" class="custom-control-input" id="customCheck2">
						<label class="custom-control-label" for="customCheck2">Cocina</label>
					</div>
					<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" class="custom-control-input" id="customCheck3">
						<label class="custom-control-label" for="customCheck3">Comedor</label>
					</div>
					<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" class="custom-control-input" id="customCheck4">
						<label class="custom-control-label" for="customCheck4">Baño público</label>
					</div>
					<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" class="custom-control-input" id="customCheck5">
						<label class="custom-control-label" for="customCheck5">Baño privado</label>
					</div>				
				</div>
			</div>
			<br>
			<label><h6>Material predominante en la construcción de la vivienda</h6></label>
			<div class="row">
				<div class="col">			
					<label><b>Paredes</b></label>
				</div>
				<div class="col">
					<label><b>Techos</b></label>
				</div>
				<div class="col">
					<label><b>Pisos</b></label>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" class="custom-control-input" id="customCheck6">
						<label class="custom-control-label" for="customCheck6">Tabique</label>
					</div>
					<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" class="custom-control-input" id="customCheck7">
						<label class="custom-control-label" for="customCheck7">Madera</label>
					</div>	
					<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" class="custom-control-input" id="customCheck8">
						<label class="custom-control-label" for="customCheck8">Cartón</label>
					</div>
					<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" class="custom-control-input" id="customCheck9">
						<label class="custom-control-label" for="customCheck9">Otros materiales</label>
					</div>	
				</div>			
				<div class="col">
					<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" class="custom-control-input" id="customCheck10">
						<label class="custom-control-label" for="customCheck10">Concreto</label>
					</div>
					<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" class="custom-control-input" id="customCheck11">
						<label class="custom-control-label" for="customCheck11">Lámina Asbesto</label>
					</div>	
					<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" class="custom-control-input" id="customCheck12">
						<label class="custom-control-label" for="customCheck12">Cartón</label>
					</div>
					<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" class="custom-control-input" id="customCheck13">
						<label class="custom-control-label" for="customCheck13">Lámina Galvanizada </label>
					</div>	
				</div>
				<div class="col">
					<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" class="custom-control-input" id="customCheck14">
						<label class="custom-control-label" for="customCheck14">Mosaico</label>
					</div>
					<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" class="custom-control-input" id="customCheck15">
						<label class="custom-control-label" for="customCheck15">Loseta</label>
					</div>	
					<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" class="custom-control-input" id="customCheck16">
						<label class="custom-control-label" for="customCheck16">Firme</label>
					</div>
					<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" class="custom-control-input" id="customCheck17">
						<label class="custom-control-label" for="customCheck17">Tierra</label>
					</div>
					<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" class="custom-control-input" id="customCheck18">
						<label class="custom-control-label" for="customCheck18">Otro material</label>
					</div>	
				</div>			
			</div>
			
			<br>
		</div>

		<div class="tab">
		<label><b>5.-SALUD</b></label>	
		<div class="row">
			<div class="col">
					<div class="custom-control custom-checkbox custom-control-inline">
						<input onchange="algo()" type="checkbox" class="custom-control-input" id="chk_IMSS">
						<label class="custom-control-label" for="chk_IMSS">IMSS</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
						<input onchange="algo1()" type="checkbox" class="custom-control-input" id="chk_ISSSTE">
						<label class="custom-control-label" for="chk_ISSSTE">ISSSTE</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
						<input onchange="algo2()" type="checkbox" class="custom-control-input" id="chk_ISSSTESON">
						<label class="custom-control-label" for="chk_ISSSTESON">ISSSTESON</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
						<input type="checkbox" class="custom-control-input" id="customCheck21">
						<label class="custom-control-label" for="customCheck21">Médico privado</label>
						</div>

						
						<div class="custom-control custom-checkbox custom-control-inline">
						<input onclick="javascript:yesnoCheck();" type="checkbox" class="custom-control-input" id="optradio3">
						<label class="custom-control-label" for="optradio3">Otros</label>
						</div>	


						<div class="col" id="div_txtsalud" style="display: none" >
							<label><b>Especifique otros</b></label>
							<input  type="text" class="form-control" placeholder="" name="inpt_otrosalud" id="textsalud">
						</div>
				</div>			
				
			</div>
			<div class="row">
				<div class="col">
					<label><b>El servicio medico es proporcionado por :</b></label>
					<input type="text" class="form-control" name="domicilo" id="domicilo">
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label><b>Frecuencia con la que asiste al servicio medico:</b></label>
					<input type="text" class="form-control" name="domicilo" id="domicilo">
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label><b>Enfermedades frecuentes del adulto mayor:</b></label>
					<input type="text" class="form-control" name="domicilo" id="domicilo">
					<br>
				</div>
			</div>
		</div>

		<div class="tab">
			<label><b>6.- ESTRUCTURA FAMILIAR</b></label>
			<br>
			<button id="add_new" type="button" style="float: right;" class="btn btn-secondary" data-toggle="modal" title="Agregar servicio" data-target="#exampleModal" data-whatever="@mdo">Agregar +</button>
			<table class="table table-bordered">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nombre completo</th>
					<th>Edad</th>
					<th>Sexo</th>
					<th>Edo. civil</th>
					<th>Parentesco</th>
					<th>Vive con el AM</th>
					<th>Escolaridad</th>
					<th>Ocupación</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
			</table>
		</div>
		
		<br>

		<div style="overflow:auto;">
	  		<div style="float:right;">
		   		<button class="btn btn-outline-success" type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
	    		<button class="btn btn-outline-success" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
	  		</div>
		</div>

		<!-- Circles which indicates the steps of the form: -->
		<div style="text-align:center;margin-top:40px;">
	  		<span class="step"></span>
	  		<span class="step"></span>
	  		<span class="step"></span>
	  		<span class="step"></span>
	  		<span class="step"></span>
	  		<span class="step"></span>
		</div>
	</form>
</div>


