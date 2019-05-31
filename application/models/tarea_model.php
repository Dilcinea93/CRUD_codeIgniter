<?php
	class tarea_model extends CI_Model{

		/*
		TAREA: Validar datos que se van a guardar
		Verificar si el ID ya existe.
		*/
		public function insertar($data){
			$this->db->insert('tareas',array(
				'titulo'=>$data['titulo'],
				'descripcion'=>$data['descripcion'],
				'id_estado'=>1,
				'fecha_alta'=>date('Y-m-d H:i:s'),
				'fecha_modificacion'=>date('Y-m-d H:i:s'),
				'fecha_baja'=>null
				)
			);
		}

		public function actualizar($data){    //PARA VER QUE USA
				$this->db->where('id_tarea', $data['id_tarea']);
				return $this->db->update('tareas',array(
				'titulo'=>$data['titulo'],
				'descripcion'=>$data['descripcion'],
				'id_estado'=>$data['id_estado'],
				'fecha_alta'=>date('Y-m-d H:i:s'),
				'fecha_modificacion'=>date('Y-m-d H:i:s')
			)
			);

			
			echo "</br></br>";print_r($this->db->last_query()); echo "</br></br>";
		}

		public function listar(){
			return $this->db->select('t.id_tarea, t.titulo, t.descripcion, e.id_estado, e.nombre nombre_estado')
			->from('tareas t')
			->join('estados e','e.id_estado=t.id_estado')
			->where('fecha_baja',NULL)
			->order_by('e.id_estado')
			->get()
			->result();
//TAREA: Agregar mas clausulas WHERE. Se puede hacer como en laravel solo anexando otra clausula where?
//Existe esta funcion or_where(‘id >’, $id);
			// echo "Entroo aqui";
			// echo "</br></br>";print_r($this->db->last_query()); echo "</br></br>";
			// die();
			// Para imprimir el ULTIMO QUERY realizado en este punto, me sirve este print_r, pero aqui, tal como esta la funcion (con el return al principio) no va a funcionar, ya que si retorna un valor, ya se acaba la funcion... No hace nada mas..
			/*Asi que solo elimina el return y ya */

			/*
				Esta vez no me sirve.. le coloco un echo y un die y no hace nada. Es que estaba en el modelo equivocado xD
				pero me di cuenta que SIN el return, me muestra el select de los estados... y CON el return, no me los muestra
			*/
		}

		public function eliminar($data){
      $this->db
         ->where('id_tarea', $data['id_tarea'])
         ->update('tareas', array(
         'fecha_baja' => date('Y-m-d H:i:s')
      ));
   }
	}
?>
