<link href="<?=base_url()?>css/eseStyle2.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
	$("#inpt_cuanto").mask('ZZ',{translation:  {'Z': {pattern: /[0-9\s]/, recursive: true}}});
	$("#inpt_Nombre").mask('ZZ',{translation:  {'Z': {pattern: /[áéíóúñüàèa-zA-Z\s]/, recursive: true}}});
</script>

<div class="container">
<br>

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
					<input type="text" class="form-control" name="inpt_total_aportes" value=" " id="inpt_total_aportes" readonly  aria-label="Username" aria-describedby="basic-addon1">
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
				<input class="form-control" value=" " placeholder="Ingrese el nombre de la persona que aporta" type="text" name="inpt_Nombre" id="inpt_Nombre">
				<span style="color: red;display: none;" id="validacion_nombre"> Falta Nombre</span>
			</div>
			<div class="col">
				<input type="text" value=" " class="form-control" placeholder="$" name="inpt_cuanto" id="inpt_cuanto">
					<span style="color: red;display: none;" id="validacion_aporta"> Falta cantidad</span>
			</div>
			<div class="col">
				<button type="button"  class="btn btn-outline-success" onclick="agregarpersonas()"> Agregar </button>
			</div>
		</div>
		<hr>

</div>

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