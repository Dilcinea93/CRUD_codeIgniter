var controlador_tension = new Vue({
	el: '#controlador_tension',
	data:{
		tension: [],
		registro_actual: {				//Viene siendo un modelo, por lo tanto se puede referenciar con v-model, asi v-model="tarea_nueva.titulo"
		fecha: '',
		hora: '',
		alta: '', baja:'',pulso:'',
		descripcion: ''
 }
	},
	methods: {
		registroTension(){
			this.$http.get('../registro_tension').then(function(respuesta){
				this.tension = respuesta.body;
				;
				console.log(respuesta);
			},function(){
			});
		},
		guardar(){

			this.$http.post('../lista_tension', this.registro_actual).then(function(){

			})
		},
		modificar(){

		}
	},
	created: function(){
		 this.registroTension();
	}
})
