<html>
	<head></head>
	<body>
		<div >
      <form action="javascript:void(0);" id="controlador_compras">

			<label for="fecha">Fecha</label>
			<input type="text" value="<?php echo date('d-m-y')?>" v-model="nuevacompra.fecha">
<label for="">Compra de: </label>
		<select v-model="listamedicinas">
			<option v-for="list in listamedicinas" v-bind:value="list.nombre">{{list.nombre}}</option>
		</select>
		<!-- Como hacer que el nombre seleccionado aqui llegue al modelo  nuevacompra.medicina ?-->

		<label for="">Cantidad de tabletas</label>
		<input type="number" width="50px" v-model="nuevacompra.cantidad_tabletas">
		
		<label for="">Miligramos</label>
		<input type="number" width="50px" v-model="nuevacompra.mg">

		<label for="">Precio</label>
		<input type="number" width="50px" v-model="nuevacompra.precio">

		
		<label for="">Lugar</label>
		<input type="text" width="50px" v-model="nuevacompra.lugar">
		
		<button class="btn btn-info" v-on:click="registrarcompra()"> guardar</button>
		
<table>
	<tr v-for="compra in compras">
		<td v-model="compra.fecha" v-bind:value="compra.fecha" value={{compra.fecha}}>{{compra.fecha}}</td>
	</tr>
</table>
			</form>
			


		</div>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue-resource.js"></script>
		
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/compras.js"></script>
	</body>
</html>
