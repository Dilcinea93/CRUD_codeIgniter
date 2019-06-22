
var controlador_tratamiento= new Vue({
	el: '#controlador_tratamiento',
	data:{
		tratamiento: {
			id_med: '',
			tratamiento_mg: '',
			cada: '',
			horario: '',
			id_recetado:''
 		}
	},
	methods:{
		guardartratamiento: function(){
			this.$http.post('../guarda_tratamiento', this.tratamiento).then(function(){
				this.tratamiento.id_med = '';
				this.tratamiento.tratamiento_mg = '';
				this.tratamiento.cada = '';
				this.tratamiento.horario = '';
				this.tratamiento.id_recetado = '';
			})
		}
	}
})