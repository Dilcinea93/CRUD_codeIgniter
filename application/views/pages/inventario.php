<html>
	<head></head>
	<body>

		<?php
			// echo anchor('name_of_controller_file/function_name_if_any', 'Sign Out', array('class' => '', 'id' => ''));
		?>

<!-- <div id="app">
	<h1>Accediendo a Elementos del DOM utilizando vm.$refs</h1>
	<h2>Añade texto a la página</h2>
	<input type="text" ref="text" value="3423">
	<br>
	<br>
	<button type="button" @click="addText">Guardar</button>
	<button type="button" @click="deleteText">Borrar</button>
	<p ref="textField"></p>
</div> -->

		<div id="controlador_inventario">

		
		<button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar medicinas</button>
		<button class="btn btn-success"><a v-bind:href="inventario">Inventario</a></button>
		<button class="btn btn-success"><a v-bind:href="registro_tension" v-on:click="registroTension()" id="tension" >Registro de tensión</a></button>
	
			<table class="table">
				<tr>
					<th scope="col">Nombre medicina</th>
					<th scope="col">MG recetados</th>
					<th scope="col">Cantidad disponible</th>
					<th scope="col">MG disponibles</th>
					<th scope="col">dias de tratamiento restantes</th>
					<th scope="col">Fecha de compra</th>
				</tr>
				<tr v-for="med in medicinas">
					<td v-model="med.nombre" v-bind:value="med.nombre">{{med.nombre}}</td>
					<td v-model="med.nombre" v-bind:value="med.nombre">{{med.tratamiento_mg}}</td>
					<td v-model="med.nombre" v-bind:value="med.nombre">{{med.cantidad_pastillas}}</td>
					<td v-model="med.nombre" v-bind:value="med.nombre">{{med.mg_med}}</td>
					<td>{{dias_restantes}}</td>
					<td v-model="med.fecha" v-bind:value="med.fecha">{{med.fecha}}</td>
				</tr>
			</table>
		</div>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue-resource.js"></script>
		
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/tratamiento.js"></script>
		<!-- INCLUDE AXIOS LIBRARY 
		< script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.js"></script > -->

	</body>
</html>
