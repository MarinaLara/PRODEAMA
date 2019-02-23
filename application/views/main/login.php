<div class="container fondo">
	<div class="row">
		<div class="col-md-6" style="margin-top: 2%">
			<img src="<?=base_url()?>images/prode_logo.jpg">
		</div>
		<div class="col-md-6" style="margin-top: 10%">
			<form action="<?=base_url()?>index.php/Main/login" method="post">
				<div class="form-group">
					<label><b>Usuario:</b></label>
					<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Escriba su Usuario" maxlength="30" required>
				</div>
				<div class="form-group">
					<label><b>Contraseña:</b></label>
					<input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Escriba su Contraseña" maxlength="15" required>
				</div>
				<div class="form-group">
					<button class="btn btn-outline-success" type="submit">Enviar</button>
					<button class="btn btn-outline-danger" type="reset">Cancelar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<br>

