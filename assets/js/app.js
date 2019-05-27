var controlador_tareas = new Vue({
   el: '#controlador_tareas',
   data: {
      cargando_tareas: true,
      tarea_nueva: {				//Viene siendo un modelo, por lo tanto se puede referenciar con v-model, asi v-model="tarea_nueva.titulo"
         titulo: '',
         descripcion: ''
      },
      estados: [],
      tareas: []
   },
   methods: {
      recuperarEstados: function(){
         this.$http.get('recuperar_estados').then(function(respuesta){
					// respuesta= respuesta.toString();
					 console.log("respuesta: "+respuesta);  //Como hago que me devuelva un objeto y no  respuesta: [object Object]
					 //alert(JSON.stringify(respuesta));   //te lo dejo aqui para que sepas como se hace el stringify. 
					 //JSON stringify es como hacer un json decode, pero es una alternativa diferente a json_encode (que no sirve en VUE.js)
					 //A modo de aclaración, [object Object] es la representación a string que tienen por defecto los objetos en JavaScript.
            this.estados = respuesta.body;
         }, function(){
            alert('No se han podido recuperar los estados.');
         });
      },
      recuperarTareas: function(){
			console.log("Estas son las tareas: "+this.tareas);
         this.cargando_tareas = true;
         this.$http.get('recuperar_tareas').then(function(respuesta){
				console.log(respuesta);
            this.tareas = respuesta.body;
            this.cargando_tareas = false;
         }, function(){
            alert('No se han podido recuperar los estados.');
            this.cargando_tareas = false;
         }); 
      },
      crearTarea: function(){
         this.$http.post('crear_tarea', this.tarea_nueva).then(function(){
            this.tarea_nueva.titulo = '';
            this.tarea_nueva.descripcion = '';
            this.recuperarTareas();
         }, function(){
            alert('No se ha podido crear la tarea.');
         });
      },
      modificarTarea: function(p_tarea){
         this.$http.post('modificar_tarea', p_tarea).then(function(){
            this.recuperarTareas();
         }, function(){
            alert('No se ha podido modificar la tarea.');
         });
      },
      eliminarTarea: function(p_tarea){
         this.$http.post('eliminar_tarea', p_tarea).then(function(){
            this.recuperarTareas();
         }, function(){
            alert('No se ha podido eliminar la tarea.');
         });
      },
      colorEstado: function(p_tarea){
         var estilo;
         switch(p_tarea.id_estado){
            case '1':
               estilo = 'text text-error';
               break;
            case '2':
               estilo = 'text text-warning';
               break;
            case '3':
               estilo = 'text text-success';
               break;
            default:
               estilo = 'text text-info';
         }
         return estilo;
      }
   },
   created: function(){
      this.recuperarEstados();
      this.recuperarTareas();
   }
});
