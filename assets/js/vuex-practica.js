
const store = new Vuex.Store({				//define estados y mutaciones...
state: {
	count: 8,
	nombre: 'YOHANNA',
},
mutations: {
	mensaje (state) {
		alert(state.count)
	}
}
})
/*********************************************************** */
	/**CREACION DE COMPONENTES  */

/*1- */const Counter = {
template: `<div class="col-s3" style="background:lightblue;padding:3px;">{{ count }}</div>`,
computed: {
	count () {
		//return store.state.count
		return this.$store.state.count   //accediendo al store cacheado como propiedad en la instancia principal de la aplicacion	
	}
}
}
// let's create a Counter component
/*2- */ 
const Nombre = {
template: `<div class="col-s3" style="background:pink;padding:3px;">ESTE ES EL COMPONENTE DE NOMBRE: {{ anio }}</div>`,
computed: {
	anio (){
		return this.$store.state.nombre  
	}
}
}

/******************************************************* */
/** Componente e instancia. ("Objeto y clase") */
Vue.component('movie-card', {
  props: ['image', 'title'],
  template: `
		<h1>Componente de imagen</h1>
		<img width="100" v-bind:src="image" v-bind:alt="title"/>
				<h2>{{ title }}</h2> 
  `,
})

new Vue({
  el: '#app',
  data: {
    movies: [
      { title: 'Regreso al Futuro', image: 'http://es.web.img3.acsta.net/pictures/14/04/03/13/45/034916.jpg' },
      { title: 'Matrix', image: 'http://t0.gstatic.com/images?q=tbn:ANd9GcQq3pIz-aKgkmYX1dJ-EL-AlHSPcOO7wdqRIJ5gJy9qNinXpmle' },
      { title: 'Interestellar', image: 'http://t1.gstatic.com/images?q=tbn:ANd9GcRf61mker2o4KH3CbVE7Zw5B1-VogMH8LfZHEaq3UdCMLxARZAB' }
    ]
  }
})


/******************************************************* */
var controlador_computado = new Vue({
el: '#controlador_computado',
data: {
	message: 'Hello',
	firstName: 'Foo',
	lastName: 'Bar',
	anioactual:'2019',
	condicion: false,
	seen: true, 
	isActive: false,
	ok: true,
	activeClass: 'active',
  errorClass: 'text-danger',
	// classObject: {
  //   active: false,
  //   'text-danger': false
	// },
	styleObject:{
		color:'white',
		backgroundColor:'#555',
    fontSize: '13px'
	}
},
store,	//accede al store creado con VUEX
components: { Counter,Nombre },		//Usa el componente creado mas arriba
// template: `			
// 	<div class="app">
// 		<counter></counter>
// 		<nombre></nombre>
// 		<p>Computed reversed message: {{reversed}}</p>
// 		<button @click="show_content">Mostrar contenido</button>
// <div class="conf" v-if="condicion" style="background:pink;">
// 	Este es un contenido
// </div>
// <h1 v-else>No</h1>
// 	</div>
// `,		//Define template que sera renderizado en el elemento seleccionado aqui.. #controlador_computado. Es una forma
methods:{
	toggle_content: function(){
		this.condicion=true;
	}
},
computed: {
	classObject: function () {
    return {
      active: this.isActive && !this.error,
      'text-danger': this.error && this.error.type === 'fatal',
    }
  },
	reversed: function () {
		// `this` apunta a la instancia de vm
		return this.firstName.split('').reverse().join('')				//Accede a firstName y devuelve el nombre a la inversa
	},
	edad: function () {
			return  'Estamos en el año '+this.anioactual 
		},
	fullName: {					//Otra forma de definir la propiedad computada. El getter se define por defecto.
		// getter
		get: function () {
			return this.firstName + ' ' + this.lastName
		},
		// setter
		set: function (newValue) {					//setter para la propiedad fullName
			var names = newValue.split(' ')
			this.firstName = names[0]
			this.lastName = names[names.length - 1]
		}
	}
}
})


/******************COMPONENTE ******************** */


Vue.component('todo-item', {
  template: '\
    <li>\
      {{ title }}\
      <button v-on:click="$emit(\'remove\')">X</button>\
    </li>\
  ',
  props: ['title']
})
new Vue({
  el: '#todo-list-example',
  data: {numbers: [ 1, 2, 3, 4, 5 ],
    newTodoText: '',
    todos: [
      'Do the dishes',
      'Take out the trash',
      'Mow the lawn'
    ]
	},
	computed:{
		evenNumbers: function(){
			return this.numbers.filter(function(number){
				return number%2===0
			})
		}
	},
  methods: {
		even:function(numbers){
			return numbers.filter(function(number){
				return number %2 ===0
			})
		},
    addNewTodo: function () {
      this.todos.push(this.newTodoText)
      this.newTodoText = ''
    }
  }
})
//store.commit('increment');  ejecuta la mutacion (cambio de estado de la app, incremento de una variable)
console.log(store.state.count) // -> 1
