<html>
<head>
   <meta charset="utf-8" />
	 <title> Lista de tareas </title>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vuex.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue-resource.js"></script>
</head>

<body>

<div id="app">
		
	<movie-card v-for="movie in movies"
		:title="movie.title"
		:image="movie.image"></movie-card>
				
</div>


<div id="controlador_computado">

</div>

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vuex-practica.js"></script>
</body>
</html>
