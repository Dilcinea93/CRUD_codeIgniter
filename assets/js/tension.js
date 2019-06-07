var controlador_tension = new Vue({
	el: '#controlador_tension',
	data:{
		tension: [],
		registro_actual: {
			id: '',
			fecha: '',
			hora: '',
			alta: '', baja:'',pulso:''
 		}
	},
	methods: {
		listaTension(){
			this.$http.get('../lista_tension').then(function(respuesta){
				this.tension = respuesta.body;
				;
			},function(){
			});
		},
		guardar(){
			this.$http.post('../guarda_registro_tension', this.registro_actual).then(function(){
				this.registro_actual.alta = '';
				this.registro_actual.baja = '';
				this.registro_actual.pulso = '';
			})
		},
		modificar(p_tension){
			console.log(p_tension);
			this.$http.post('../modificar_tension', p_tension).then(function(){
				this.recuperarTareas();
		 }, function(){
				alert('No se ha podido modificar el registro.');
		 });
		}
	},
	created: function(){
		 this.listaTension();
	}
})
