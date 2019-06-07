var controlador_new_medicinas = new Vue({
	el: '#controlador_new_medicinas',
	data:{
		new_medicina:{
			nombremedicina: ''
		}
	},
	methods:{
		registrarmedicina: function(){
			console.log("PASO POR AQUI");
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

var controlador_medicinas = new Vue({
	el: '#controlador_inventario',
	data:{
		medicina: {
			nombre: '',
			dias:4
		},
		compras: 'compras',
		inventario: 'inventario',
		registro_tension: 'registro_tension',
		medicinas: [],
		dias_restantes: 'No captura los dias restantes...',
		message: '',

		computed: {
			now: function () {
			  return Date.now()
			}
		 }
	},
	methods: {
		descontar: function(){
			//Descuenta una tableta en las horas espeficadas en el tratamiento
		},
		listar: function(){
			this.$http.get('../p_inventario').then(function(respuesta){
			this.medicinas = respuesta.body;
			//var medicinas=this.medicinas;
			console.log(respuesta);
			// medicinas.forEach(function(v, i){ 
			// 			var mg_med= JSON.parse(JSON.stringify(medicinas[i].mg_med)); //ME SIRVIOOO });
			// 			var tratamiento_mg= JSON.parse(JSON.stringify(medicinas[i].tratamiento_mg));
			// 			var dias_restantes= mg_med/tratamiento_mg;
			// 			this.dias_restantes=dias_restantes;
			// })

			//this.dias_restantes(this.medicinas);
         }, function(){
            alert('Falló en encontrar los nombres de las medicinas.');
					//	this.medicinas = respuesta.body;
         }); 
		},
	},
   created: function(){
      this.listar();
   }
})

/**
 * Modal para crear registro de nueva medicina
 * reemplazar vue resource con axios
 * https://vuejs.org/v2/cookbook/adding-instance-properties.html#Real-World-Example-Replacing-Vue-Resource-with-Axios
 */
