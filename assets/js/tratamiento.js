// let app = new Vue({
// 	el : '#app',
// 	methods : {
// 		addText () {
// 			const text = app.$refs.text.value
// 			const textField = app.$refs.textField
// 			textField.innerHTML = textField.innerHTML + '<br />' + text
// 		},
// 		deleteText () {
// 			const textField = app.$refs.textField
// 			textField.innerHTML = ''
// 		}
// 	}
// })

// var vm = new Vue({		//este HTML muestra new MessageYoha          <td id="dias">{{ message }}</td>
// 	el: '#dias',
// 	data: {
// 	  message: '123'
// 	}
//  })
//  vm.message = 'new messageYOHA' // cambia los datos
//  vm.$el.textContent === 'new messageasd' // falso
//  Vue.nextTick(function () {
// 	vm.$el.textContent === 'new messageREAL' // verdadero
//  })

// register modal component
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
		inventario: 'inventario',
		registro_tension: 'registro_tension',
		medicinas: [],
		dias_restantes: 'No captura los dias restantes...',

		computed: {
			now: function () {
			  return Date.now()
			}
		 }//Como no la inicialicé, me decia "dias_restantes is not defined", asi que le puse '', para im string... Para almacenar el valor retornado por una funcion, hay que 
	},
	// computed: {
	// 	dias_restantes: function () {
	// 		// `this` apunta a la instancia de vm
	// 		medicinas.forEach(function(v, i){ 
	// 		var mg_med =JSON.parse(JSON.stringify(this.medicinas[i].mg_med));
	// 		});
	// 		//return mg_med
	// 	 }
		// dias_restantes: function (medicinas) {
		// 	medicinas.forEach(function(v, i){ 
		// 		var mg_med= JSON.parse(JSON.stringify(medicinas[i].mg_med)); //ME SIRVIOOO });
		// 		var tratamiento_mg= JSON.parse(JSON.stringify(medicinas[i].tratamiento_mg));
		// 		var dias_restantes= mg_med/tratamiento_mg;
		// 	  this.dias_restantes=dias_restantes;
		// 	  return dias_restantes
		// 	})
		// }
	//dataType: 'json',
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
