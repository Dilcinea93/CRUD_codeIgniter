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
	
	public function listaTension(){
      $tension = $this->medicinas_model->listaTension();
      echo json_encode($tension);
	}
	public function listamedicinas(){
      $medicinas = $this->medicinas_model->listaMedicinas();
		echo json_encode($medicinas);
		
	}

	public function listacompras(){
      $compras = $this->medicinas_model->listaCompras();
		echo json_encode($compras);
	}
	public function newmedicina(){
      $this->medicinas_model->insertarmedicina(array(
         'nombre' => $this->request->nombremedicina,  //el atributo corresponde al atributo del modelo en el JS
      ));
	}
	public function guardacompra(){
      $this->medicinas_model->insertarcompra(array(
         'fecha' => $this->request->fecha,
         //'nombre' => $this->request->nombre,
         'mg' => $this->request->mg,
         'cantidad_tabletas' => $this->request->cantidad_tabletas,
         'precio' => $this->request->precio,
         'lugar' => $this->request->lugar
      ));
   }
	public function saveregistroTension(){
		/* VALIDA IF IS NOT NULL */
		
		$this->medicinas_model->insertar(array(
         'fecha' => $this->request->fecha,
         'hora' => $this->request->hora,
         'alta' => $this->request->alta,
         'baja' => $this->request->baja,
         'pulso' => $this->request->pulso
		));
		
		//$this->listaTension()
	}
	public function modificarregistroTension(){
      $this->medicinas_model->actualizar(array(
			
         'id' => $this->request->id,
         'fecha' => $this->request->fecha,
         'hora' => $this->request->hora,
         'alta' => $this->request->alta,
         'baja' => $this->request->baja,
         'pulso' => $this->request->pulso
      ));
   }
}
?>
