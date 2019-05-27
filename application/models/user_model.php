<?php
class user_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function listar(){
		return $this->db->select('id_estado,nombre')->from('estados')->get()->result();
			// echo "Entroo aqui";
			// echo "</br></br>";print_r($this->db->last_query()); echo "</br></br>";
			// die();
	}
}
