<html>
	<head>
		<link rel="shortcat icon" href="../../../assets/img/Medicinas.png">
	</head>
	<body>
		<div style="padding: 30px">
			
			<form action="javascript:void(0);" id="controlador_new_medicinas">
					<label for="nombre" ><h4>Nombre de medicina</h4></label>
					<div class="row">
						<div class="col-s2">
							<input type="text" v-model="new_medicina.nombremedicina" class="form-control" style="width:400px;">	
						</div>
						<div class="col-s2 offset-1">
							<button class="btn btn-success" v-on:click="registrarmedicina()" style="width:200px;">Registrar</button>	
						</div>
					</div>
					</form>



					<div id="controlador_inventario">
						<!-- como hacer TABS de esto? -->
					<a v-bind:href="inventario">Inventario</a> 	|
					<a v-bind:href="compras">Compras</a>  |
					<a v-bind:href="registro_tension" >Registro de tensión</a> |
					<a v-bind:href="registro_tratamiento" v-on:click="resgistro_tratamiento()" id="tratamiento" >Tratamiento</a> |

					<a v-bind:href="estadisticas" id="estadisticas" >Estadisticas</a>
					
						<table class="table">
							<tr>
								
								<th scope="col">Cantidad disponible</th>
								<th scope="col">Nombre medicina</th>
								<th scope="col">Cada</th>
								<th scope="col">Tabletas diarias</th>
								<th scope="col">Horario</th>
								<th scope="col">MG recetados</th>
								<th scope="col">MG disponibles</th>
								<th scope="col">Dias de tratamiento restantes</th>
								<th scope="col">Fecha de compra</th>
								<th scope="col">Eliminar medicina</th>
							</tr>
							<tr v-for="med in medicinas">
								<td v-model="med.nombre" v-bind:value="med.nombre" >{{med.disponibles_ahora}}</td>
								<td v-model="med.nombre" v-bind:value="med.nombre">{{med.nombre}} </td>
								<td v-model="med.nombre" v-bind:value="med.nombre">{{med.cada}} horas</td>
								<td v-model="med.nombre" v-bind:value="med.nombre">{{med.diarias}} tabletas</td>
								<!-- trucar este valor a solo la parte entera, excepto en carvedilol que debe decir 0.5 -->

								<td v-model="med.nombre" v-bind:value="med.nombre"> {{med.hora_s}}</td>
								<!-- convertir esa hora a formato 12 horas con am y pm-->
								<td v-model="med.nombre" v-bind:value="med.nombre">{{med.tratamiento_mg}}</td>
								<td v-model="med.nombre" v-bind:value="med.nombre">{{med.mg_med}}</td>
								<td >{{med.dias_restantes}}</td>
								<td v-model="med.fecha" v-bind:value="med.fecha">{{med.fecha}}</td>
								<td>
					<button class="btn btn-danger"><a v-on:click="EliminarMedicina(med)" id="eliminar">Eliminar</a></button></td>
							</tr>
						</table>
					</div>
			<p>Pasos para listar el inventario:</p>
			<ol>
				<li>Registrar Medicina</li>
				<li>Registrar Recipe y asociar al correspondiente tratamiento</li>
				<li>Registrar compra</li>
			</ol>

			Uso total de memoria por la aplicacion {memory_usage}
			<?php

			// $this->load->library('calendar');
			// echo  $this->calendar->generar(2006,6);	//Muestra un calendario del mes de junio de 2006, pero no se ve, no se porque

			// $ data  =  array ( 						Hace links para los dias 3. 7 , 13, 26-----
			// 	3   =>  'http://example.com/news/article/2006/06/03/' , 
			// 	7   =>  'http://example.com/news/article/2006/06/07 / ' , 
			// 	13  =>  ' http://example.com/news/article/2006/06/13/ ' , 
			// 	26  =>  ' http://example.com/news/article/2006/06/26/ ' 
			// );
			?>

		</div>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue-resource.js"></script>
		
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/tratamiento.js"></script>
		<!-- INCLUDE AXIOS LIBRARY 
		< script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.js"></script > -->

	</body>
</html>
