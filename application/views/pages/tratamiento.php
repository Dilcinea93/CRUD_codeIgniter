<!DOCTYPE html>
<html>
<head>
	<title>Tratamientos</title>
</head>
<body>
	<a id="back" href="javascript:history.back(-1)">Volver</a>
	<h2>Registro de tratamientos</h2>
	<form action="javascript:void(0);" id="controlador_tratamiento">
		<table class="bordered">
			<tr>
				<td>Medicina recetada </td>
				<td>
					<select name="medicina" v-model="tratamiento.id_med">
						<option track-by="$index" value="2">Aspirina</option>
						<option track-by="$index" value="1">Valsartan</option>
						<option track-by="$index" value="3">carvedilol</option>
						<option track-by="$index" value="7">Nifedipino</option>
						<option track-by="$index" value="5">Omeprazol</option>
					</select>
				</td>
				<td>Miligramos recetados</td>
				<td><input type="text" name="" class="form-control" style="width:100px;" placeholder="12.5" v-model="tratamiento.tratamiento_mg"></td>
			</tr>
			<tr>
				<td>Cada cuantas horas?</td>
				<td>
					<select v-model="tratamiento.cada">
						<?php
							for($i=0;$i<100;$i++){
								?>
									<option><?php echo $i; ?></option>
								<?php
							}
						?>
					</select>
				</td>
				<td>
					Horario sugerido
				</td>
				<td> <input type="" name="" v-model="tratamiento.horario"></td>
			</tr>
			<tr>
				<td>Tratamiento numero</td>
				<td colspan="4"> <input type="number" name="" value="1" v-model="tratamiento.id_recetado"></td>
			</tr>
		</table>
		<button class="btn btn-success" v-on:click="guardartratamiento()">GUARDAR TRATAMIENTO</button>
	</form>

		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue-resource.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/controlador_tratamiento.js"></script>
</body>
</html>