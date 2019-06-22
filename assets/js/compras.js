var controlador_compras= new Vue({
	el: '#controlador_compras',
	data: {
		listamedicinas:[],
		compras:[],
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
				this.$http.post('../guarda_compra',this.nuevacompra).then(function(){
					this.nuevacompra.fecha='',
					this.nuevacompra.medicina= '',
					this.nuevacompra.mg= '',
					this.nuevacompra.cantidad_tabletas= '',
					this.nuevacompra.precio= '',
					this.nuevacompra.lugar= ''
				})
			},listaCompras(){
				this.$http.get('../listacompras').then(function(respuesta){
					this.compras = respuesta.body;
					var compras= this.compras;
					var compras= JSON.parse(JSON.stringify(compras));
				},function(){
				});
			},
			lista_medicinas: function(){
				this.$http.get('../listamedicinas').then(function(respuesta){
					 this.listamedicinas = respuesta.body;
					 console.log(respuesta);
					var listamedicinas= this.listamedicinas;
			});
		},
	},
	created: function(){
		this.lista_medicinas();
		this.listaCompras();
	}
});
