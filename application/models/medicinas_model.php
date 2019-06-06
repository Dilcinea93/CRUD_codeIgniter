<?php
	class medicinas_model extends CI_Model{

		/*
		TAREA: Validar datos que se van a guardar
		Verificar si el ID ya existe.
		*/
		public function insertar($data){
			$this->db->insert('tension',array(
				'fecha'=>$data['fecha'],
				'hora'=>$data['hora'],
				'alta'=>$data['alta'],
				'baja'=>$data['baja'],
				'pulso'=>$data['pulso']
				)
			);

			echo "</br></br>";print_r($data);
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
			 return $this->db->select('m.id_med, m.nombre,c.id_med,c.fecha,c.mg_med,c.cantidad_pastillas,t.tratamiento_mg')
			->from('medicinas m')
			->join('compras c','c.id_med=m.id_med')
			->join('tratamiento t','t.id_med=m.id_med')
			->get()
			->result();
//No se porque esta consulta no me esta trayendo registros.. deberia traer de las tres tablas, almenos el registro numero 1 nadamas.... pero no.... Cuando le agrego la tercera tabla deja de funcionar.. Era porque la tercera tabla no tenia registros xD 
			// echo "</br></br>";print_r($this->db->last_query()); echo "</br></br>";
			// die();
		}

		public function eliminar($data){
      $this->db
         ->where('id_tarea', $data['id_tarea'])
         ->update('tareas', array(
         'fecha_baja' => date('Y-m-d H:i:s')
      ));
	 }
	 
	 public function listaTension(){
		return $this->db->select('t.id, t.fecha,t.hora,t.alta,t.baja,t.pulso')
		->from('tension t')
		->get()
		->result();
	 }
	}
?>
