<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MedicinasController extends CI_Controller {
   private $request;
   public function __construct(){
      parent::__construct();
      $this->load->model('medicinas_model');
      $this->load->model('tarea_model');
      $this->request = json_decode(file_get_contents('php://input'));
   }
   public function recuperar_estados(){
	
      $estados = $this->user_model->listar();
      echo json_encode($estados);
   }
   public function recuperar_medicinas(){
			$tareas = $this->medicinas_model->listar();

			// foreach($tareas as $item){
			// 	echo " MG item: ".$item->mg_med;
			// me trae el mg_med
		  // }
			echo json_encode($tareas);
   }
   public function crear_tarea(){
      $this->tarea_model->insertar(array(
         'titulo' => $this->request->titulo,
         'descripcion' => $this->request->descripcion
      ));
   }
   public function modificar_tarea(){
      $this->tarea_model->actualizar(array(
         'id_tarea' => $this->request->id_tarea,
         'titulo' => $this->request->titulo,
         'descripcion' => $this->request->descripcion,
         'id_estado' => $this->request->id_estado
      ));
   }
   public function eliminar_tarea(){
      $this->tarea_model->eliminar(array(
         'id_tarea' => $this->request->id_tarea
      ));
   }
}
?>
