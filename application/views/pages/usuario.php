<html>
<head>
   <meta charset="utf-8" />
	 <title> Lista de tareas </title>
</head>
<body>
   <div class="container">
      <h1> Lista de tareas </h1>
      <form action="javascript:void(0);" id="controlador_tareas">
         <div v-if="cargando_tareas">
            Cargando lista de tareas...
         </div>
         <table class="table" v-if="!cargando_tareas">
            <thead>
               <tr>
                  <th> Título </th>
                  <th> Descripción </th>
                  <th> Estado </th>
                  <th> </th>
               </tr>
            </thead>
            <tbody>
               <!-- Fila para modificar una tarea. -->
               <tr v-for="tar in tareas">  
						<!-- Parece que es buena practica poner este track-by="$index" al lado del v-for.... Por una cuestion ahi ique de valores duplicados... Cuando te salga ese error, puedes probar poniendo esto. Aun no se que hace exactamente.-->
                  <td>
                     <input type="text" v-model="tar.titulo" />
                  </td>
                  <td>
                     <textarea v-model="tar.descripcion"></textarea>
                  </td>
                  <td>
                     <select v-model="tar.id_estado" v-bind:class="colorEstado(tar)">
                        <option v-for="est in estados" v-bind:value="est.id_estado"> {{ est.nombre }} </option>
                     </select>
                  </td>
                  <td>
                     <button class="btn btn-success" v-on:click="modificarTarea(tar)"> Guardar </button>
                     <button class="btn btn-danger" v-on:click="eliminarTarea(tar)"> Eliminar </button>
                  </td>
               </tr>
               <!-- Fin Fila para modificar una tarea. -->
               <!-- Fila para guardar una nueva tarea. -->
               <tr>
                  <td>
                     <input type="text" v-model="tarea_nueva.titulo" />
                  </td>
                  <td>
                     <textarea v-model="tarea_nueva.descripcion"></textarea>
                  </td>
                  <td>
                     &nbsp;
                  </td>
                  <td>
                     <button class="btn btn-success" v-on:click="crearTarea()"> Guardar </button>
                  </td>
               </tr>
               <!-- Fin Fila para guardar una nueva tarea. -->
            </tbody>
         </table>
      </form>
   </div>
</body>
</html>
