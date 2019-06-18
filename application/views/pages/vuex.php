<html>
<head>
	<style>
	.info{
			border-radius:5px;
			padding:20px;
			margin-top:30px;
		}
	</style>
   <meta charset="utf-8" />
	 <title> Lista de tareas </title>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vuex.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue-resource.js"></script>
</head>

<body>

<div id="app" >
	<movie-card v-for="movie in movies"
		:title="movie.title"
		:image="movie.image"></movie-card>
				
</div>

<!-- UTILIZANDO STYLEOBJECT -->
<div id="controlador_computado" v-bind:style="styleObject">
	<!-- UTILIZANDO PROPIEDAD COMPUTADA CLASSOBJECT  -->
	<div class="col-s2" v-bind:class="classObject">	
		<button v-on:click="seen = !seen">Mostrar contenido</button>
		<div class="info" v-if="seen">
			Este es un contenido
		</div>
		<h1 v-else>No</h1>
	</div>

	<!-- UTILIZANDO OTRA INSTANCIA, DOS COMPONENTES Y UNA PROPIEDAD COMPUTADA -->
	<div class="app">
			<counter></counter>
			<nombre></nombre>
			<p>Computed reversed message: {{reversed}}</p>
	</div>

	<!-- ATANDO CLASES DE ESTILOS -->
	<div class="info" v-bind:class="[activeClass]">
		Este es usando v-bind:class y pasandole un arreglo. Agarra propiedades del objeto data.
	</div>

	<div class="info" v-bind:class="[isActive ? errorClass : '', activeClass]">
		Este es pasandole un operador ternario a la clase v-bind, pero no se renderiza en HTML
	</div>
	
	<!-- ATANDO CLASES DE ESTILOS /******************************* -->

	<!-- UTILIZANDO DIRECTIVAS CONDICIOALES -->

	<h1 v-if="ok">Yes</h1>
<h1 v-else>No</h1>

<template v-if="ok">
  <h1>Title</h1>
  <p>Paragraph 1</p>
  <p>Paragraph 2</p>
</template>


<div v-if="type === 'A'">
  A
</div>
<!-- <div v-else-if="type === 'B'">		no me sirve en esta version. Vue va ppor la 2.6.10 creo y esta es la 1.0.28 -->
  B
</div>
<!-- <div v-else-if="type === 'C'"> no me sirve en esta version. Vue va ppor la 2.6.10 creo y esta es la 1.0.28 -->
  C
</div>
<div v-else>
  Not A/B/C
</div>

<template v-if="loginType === 'username'">
  <label>Username</label>
  <input placeholder="Enter your username">
</template>
<template v-else>
  <label>Email</label>
  <input placeholder="Enter your email address">
</template>
<h1 v-show="ok">Hello!</h1>   
<!-- v-show es casi igual que v-if con la diferencia de que v-show no borra el elemento del DOM, solo alterna lapropiedad display del elemenyo. -->


<!-- /************************************** -->
</div>
	

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vuex-practica.js"></script>
</body>
</html>
