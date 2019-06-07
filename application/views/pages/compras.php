<html>
	<head></head>
	<body>
		<div >
      <form action="javascript:void(0);" id="controlador_compras">

		<select>
			<option v-for="list in listamedicinas" v-bind:value="list.nombre"></option>
		</select>

		<button class="btn btn-info" v-on:click="registrarcompra()"> guardar</button>
      </form>
		</div>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue-resource.js"></script>
		
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/compras.js"></script>
	</body>
</html>
