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
		}
		public function actualizar($data){
				$this->db->where('id', $data['id']);
				return $this->db->update('tension',array(
					'fecha'=>$data['fecha'],
					'hora'=>$data['hora'],
					'alta'=>$data['alta'],
					'baja'=>$data['baja'],
					'pulso'=>$data['pulso']
			)
			);
		}
		public function listar(){
			 return $this->db->select('m.id_med, t.hora,m.nombre,c.id_med,c.fecha,c.mg_med,c.cantidad_pastillas,t.tratamiento_mg')
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
         ->where('id_med', $data['id'])
         ->delete('medicinas');
	 }
	 
	 public function listaTension(){
		return $this->db->select('t.id, t.fecha,t.hora,t.alta,t.baja,t.pulso')
		->from('tension t')
		->get()
		->result();
	 }
	 public function listaMedicinas(){
		return $this->db->select('m.nombre')
		->from('medicinas m')
		->get()
		->result();
	 }
	 public function listaCompras(){
		return $this->db->select('c.fecha,m.nombre,c.id_med,c.mg_med,c.cantidad_pastillas,c.precio,c.lugar')
		->from('compras c')
		->join('medicinas m','m.id_med=c.id_med')
		->get()
		->result();
		// echo "</br></br>";print_r($this->db->last_query()); echo "</br></br>";
			// die();
	 }
	 public function insertarmedicina($data){
		$this->db->insert('medicinas',array(
			'nombre'=>$data['nombre']
			)
		);
	 }

	 public function insertarcompra($data){
		$this->db->insert('compras',array(
			'fecha'=>$data['fecha'],
			//'id_med'=>$data['id_med'],
			'mg_med'=>$data['mg'],
			'cantidad_pastillas'=>$data['cantidad_tabletas'],
			'precio'=>$data['precio'],
			'lugar'=>$data['lugar']
			)
		);
	 }
	}
?>
