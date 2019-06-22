
var controlador_new_medicinas = new Vue({
	el: '#controlador_new_medicinas',
	data:{
		new_medicina:{
			nombremedicina: ''
		}
	},
	methods:{
		registrarmedicina: function(){
			this.$http.post('../guarda_medicina', this.new_medicina).then(function(){
				this.new_medicina.nombremedicina = '';
			})
		}
	}
})

Vue.component('modal', {
  template: '#modal-template'
})

// start app
new Vue({
  el: '#app',
  data: {
    showModal: false
  }
})
var dt = { a: 7 }
var controlador_medicinas = new Vue({
	el: '#controlador_inventario',
	data:{
		medicina: {
			nombre: '',
			dias:4,
			polling:''
		},
		
		dt: dt,
		tomada:'',
		compras: 'compras',
		inventario: 'inventario',
		registro_tension: 'registro_tension',
		eliminar_medicina: 'eliminar_medicina',
		registro_tratamiento: 'tratamiento',
		estadisticas: 'estadisticas',
		medicinas: [],
		dias_restantes: '',
		message: '',

		computed: {
			now: function () {
			  return Date.now()
			}
		 }
	},
	methods: {
		
		descontar: function () {
			this.polling = setInterval(() => {
console.log("skjdhs")
			 this.$http.post('../actualizar_cantidad_medicinas').then(function(){

			 });
			//cont=0;
			// var t_disponible = document.getElementById("t_disponible");
			// cantidad_pastillas--;
			// t_disponible.value = dt;
			// }, 1000)
		}, 1000)
	},
		EliminarMedicina: function(med){
			this.$http.post('../eliminar_medicina', med).then(function(){
		 }, function(){
				alert('No se ha podido modificar el registro.');
		 });
		},
		listar: function(){
			this.$http.get('../p_inventario').then(function(respuesta){
				//setInterval(this.contador(), 3000);
			this.medicinas = respuesta.body;
			var medicinas=this.medicinas;
			console.log('tratamiento.js (58) '+respuesta);
			
			// medicinas.forEach(function(v, i){ 
			// 			var mg_med= JSON.parse(JSON.stringify(medicinas[i].mg_med)); //ME SIRVIOOO });
			// 			var tratamiento_mg= JSON.parse(JSON.stringify(medicinas[i].tratamiento_mg));
			// 			var cantidad_pastillas= JSON.parse(JSON.stringify(medicinas[i].cantidad_pastillas));
			// 			var dias_restantes= mg_med/tratamiento_mg;
			// 			var dias_restantes= this.dias_restantes=dias_restantes;
			// 			//console.log(dias_restantes);
						
			// })
			//this.dias_restantes(this.medicinas);
         }, function(){
            alert('Falló en encontrar los nombres de las medicinas.');
					//	this.medicinas = respuesta.body;
         }); 
		},
	},beforeDestroy () {
		clearInterval(this.polling)
	},
   created: function(){
			this.listar();
			// setInterval(() => {
			// 	this.$store.dispatch('RETRIEVE_DATA_FROM_BACKEND')
			// }, 3000)
			this.descontar();
			//var contador= this.contador();
		//	setInterval('this.contador()',1000);

   }
})
