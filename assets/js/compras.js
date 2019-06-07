var controlador_compras= new Vue({
	el: '#controlador_compras',
	data: {
		listamedicinas:[],
		nuevacompra:{
			fecha:'',
			medicina: '',
			mg: '',
			cantidad_tabletas: '',
			precio: '',
			lugar: ''
		}
	}, methods: {
		registrarcompra: function(){
			console.log("paso por aqui");
			this.$http.post('../guarda_compra',this.nuevacompra).then(function(){
				this.nuevacompra.fecha='',
				this.nuevacompra.medicina= '',
				this.nuevacompra.mg= '',
				this.nuevacompra.cantidad_tabletas= '',
				this.nuevacompra.precio= '',
				this.nuevacompra.lugar= ''
			})
		},
		lista_medicinas: function(){
			this.$http.get('../listamedicinas').then(function(respuesta){
				this.listamedicinas = respuesta.body;
				console.log(respuesta);
			});
		}
	},
	created: function(){
		this.lista_medicinas();
	}
})
