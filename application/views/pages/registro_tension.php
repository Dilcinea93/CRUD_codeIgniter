<html>
	<head></head>
	<body>
			<h2>Reporte de tensión arterial</h2>
			<
      <form action="javascript:void(0);" id="controlador_tension">
				<table class="table bordered">
					<tr>
						<th>DIA</th>
						<th>FECHA</th>
						<th>HORA</th>
						<th>ALTA</th>
						<th>BAJA</th>
						<th>PULSO</th>
					</tr>
					<tr>
						<td>HOY</td>
						<td><input type="text" value="<?php echo date('y-m-d')?>"></td>
						<td><input type="text" value="<?php echo  date('H:i:s')?>"></td>
						<td><input type="text" id="alta" ></td>
						<td><input type="text" id="baja"></td>
						<td><input type="text" id="pulso" ></td>
						<td><button class="btn btn-success" @click="guardar">Guardar</button></td>
					</tr>

					<tr v-for="ten in tension">

					<td v-model="ten.nombre" v-bind:value="ten.nombre">{{ten.id}}</td>
						<td v-model="ten.nombre" v-bind:value="ten.nombre">{{ten.fecha}}</td>
					<td v-model="ten.hora" v-bind:value="ten.hora">{{ten.hora}}</td>
						<td v-model="ten.nombre" v-bind:value="ten.nombre">{{ten.alta}}</td>
						<td v-model="ten.nombre" v-bind:value="ten.nombre">{{ten.baja}}</td>
						<td v-model="ten.nombre" v-bind:value="ten.nombre">{{ten.pulso}}</td>
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
