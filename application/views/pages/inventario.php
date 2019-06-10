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

					<form action="javascript:void(0);" id="controlador_new_medicinas">
					<label for="nombre" >Nombre de medicina</label>
					<input type="text" v-model="new_medicina.nombremedicina" class="form-control">
					<button class="btn btn-success" v-on:click="registrarmedicina()">Registrar</button>
					</form>



		<div id="controlador_inventario">

		<a v-bind:href="inventario">Inventario</a>
		<a v-bind:href="compras">Compras</a>
		<a v-bind:href="registro_tension" v-on:click="registroTension()" id="tension" >Registro de tensión</a>
		
			<table class="table">
				<tr>
					<th scope="col">Nombre medicina</th>
					<th scope="col">MG recetados</th>
					<th scope="col">Cantidad disponible</th>
					<th scope="col">MG disponibles</th>
					<th scope="col">dias de tratamiento restantes</th>
					<th scope="col">Fecha de compra</th>
					<th scope="col">Eliminar medicina</th>
				</tr>
				<tr v-for="med in medicinas">
					<td v-model="med.nombre" v-bind:value="med.nombre">{{med.nombre}}</td>
					<td v-model="med.nombre" v-bind:value="med.nombre">{{med.tratamiento_mg}}</td>
					<td v-model="med.nombre" v-bind:value="med.nombre">{{med.cantidad_pastillas}}</td>
					<td v-model="med.nombre" v-bind:value="med.nombre">{{med.mg_med}}</td>
					<td >{{med.dias_restantes}}</td>
					<td v-model="med.fecha" v-bind:value="med.fecha">{{med.fecha}}</td>
					<td>
		<button class="btn btn-danger"><a v-on:click="EliminarMedicina(med)" id="eliminar">Eliminar</a></button></td>
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
