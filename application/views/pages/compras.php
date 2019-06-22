<html>
	<head></head>
	<body>
		<div >
	<a id="back" href="javascript:history.back(-1)">Volver</a>
      <form action="javascript:void(0);" id="controlador_compras">

			<label for="fecha">Fecha</label>
			<input type="text" value="<?php echo date('y-m-d')?>" v-model="nuevacompra.fecha">
<label for="">Compra de: </label>
		<select v-model="nuevacompra.medicina" >
			<!-- <option v-for="list in listamedicinas" track-by="$index" value="1">{{list.nombre}}</option> -->
			<option track-by="$index" value="2" >Aspirina</option>
			<option track-by="$index" value="1">Valsartan</option>
			<option track-by="$index" value="3">carvedilol</option>
			<option track-by="$index" value="7">Nifedipino</option>
			<option track-by="$index" value="5">Omeprazol</option>
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
		
<table style="width:100%;">
<tr>
	<th>Fecha</th>
	<th>Nombre</th>
	<th>MG</th>
	<th># Tabletas</th>
	<th>Precio</th>
	<th>Lugar</th>
</tr>
	<tr v-for="compra in compras">
		<td v-model="compra.fecha" v-bind:value="compra.fecha" value={{compra.fecha}}>{{compra.fecha}}</td>
		<td v-model="compra.id_med" v-bind:value="compra.id_med" value={{compra.id_med}}>{{compra.nombre}}</td>
		<td v-model="compra.mg_med" v-bind:value="compra.mg_med" value={{compra.mg_med}}>{{compra.mg_med}}</td>
		<td v-model="compra.cantidad_pastillas" v-bind:value="compra.cantidad_pastillas" value={{compra.cantidad_pastillas}}>{{compra.cantidad_pastillas}}</td>
		<td v-model="compra.precio" v-bind:value="compra.precio" value={{compra.precio}}>{{compra.precio}}</td>
		<td v-model="compra.lugar" v-bind:value="compra.lugar" value={{compra.lugar}}>{{compra.lugar}}</td>
	</tr>
</table>
			</form>
			
		</div>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue-resource.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/compras.js"></script>
	</body>
</html>
