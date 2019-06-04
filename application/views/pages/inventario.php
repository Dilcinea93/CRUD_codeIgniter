<html>
	<head></head>
	<body>
		<button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar medicinas</button>
		<button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar nuevo tratamiento</button>
		<div  id="controlador_inventario">
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
					<td v-bind:value="dias">{{dias}}</td>
					<td v-model="med.fecha" v-bind:value="med.fecha">{{med.fecha}}</td>
				</tr>
			</table>
		</div>
	</body>
</html>
