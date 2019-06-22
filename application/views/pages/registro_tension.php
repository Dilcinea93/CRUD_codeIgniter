<html>
	<head></head>
	<body>
	<h2>Reporte de tensión arterial</h2>
	<a id="back" href="javascript:history.back(-1)">Volver</a>
      <form action="javascript:void(0);" id="controlador_tension">
				<table class="table bordered">
					<tr>
						<th>DIA</th>
						<th>FECHA (AAAA/MM/DD)</th>
						<th>HORA</th>
						<th>ALTA</th>
						<th>BAJA</th>
						<th>PULSO</th>
					</tr>
					<tr>
						<td>HOY</td>
						<td><input  class="form-control" type="text" value="<?php echo date('Y-m-d')?>" v-model="registro_actual.fecha"></td>
						<td><input  class="form-control" type="text" value="<?php echo  date('H:i:s')?>" v-model="registro_actual.hora"></td>
						<td><input  class="form-control" type="text" id="alta"  v-model="registro_actual.alta"> </td>
						<td><input  class="form-control" type="text" id="baja" v-model="registro_actual.baja"></td>
						<td><input  class="form-control" type="text" id="pulso"  v-model="registro_actual.pulso"></td>
						<td><button class="btn btn-success" v-on:click="guardar()">Guardar</button></td>
					</tr>

					<tr v-for="ten in tension">

					<td><input  class="form-control" type="text" v-model="ten.id" v-bind:value="ten.id" value={{ten.id}} "></td>
						<td><input  class="form-control" type="text" v-model="ten.fecha" v-bind:value="ten.fecha" value="{{ten.fecha}}"></td>
					<td><input  class="form-control" type="text" v-model="ten.hora" v-bind:value="ten.hora" value="{{ten.hora}}"></td>
						<td><input  class="form-control" type="text" v-model="ten.alta" v-bind:value="ten.alta" value="{{ten.alta}}"></td>
						<td><input  class="form-control" type="text" v-model="ten.baja" v-bind:value="ten.baja" value={{ten.baja}} "></td>
						<td><input  class="form-control" type="text" v-model="ten.pulso" v-bind:value="ten.pulso" value="{{ten.pulso}}"></td>
						<td><button class="btn btn-warning" @click="modificar(ten)">Modificar</button></td>
					</tr>
				</table>
			</form>
			</div>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue-resource.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/tension.js"></script>
	</body>
</html>
