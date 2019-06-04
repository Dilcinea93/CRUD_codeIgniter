var controlador_medicinas = new Vue({
	el: '#controlador_inventario',
	data:{
		medicina: {
			nombre: '',
			dias:4,
		},
 		medicinas: []
	},
	methods: {
		descontar: function(){
			//Descuenta una tableta en las horas espeficadas en el tratamiento
		},
		listar: function(){
			this.$http.get('../p_inventario').then(function(respuesta){
				
						this.medicinas = respuesta.body;
						;
						/*COMO HAGO PARA capturar en el console log de abajo la propiedad mg_med para calcular los dias que quedan disponibles? */
				console.log("yoha "+this.medicinas );
         }, function(){
            alert('Falló en encontrar los nombres de las medicinas.');
						this.medicinas = respuesta.body;
						
         }); 
		},
		calculardias: function(){
				/* Calculo de dias restantes de tratamiento. */
		}
	},
   created: function(){
      this.listar();
   }
})

/**
 * Modal para crear registro de nueva medicina, 
 * modal para introducir tratamiento.
 * pagina para registrar la tension y las horas.
 */
