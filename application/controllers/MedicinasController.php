<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MedicinasController extends CI_Controller {
   private $request;
   private $restantes;
   private $quedan;
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
			
			foreach($tareas as $item){

				$mg_disponibles= $item->mg_med; //MG disponibles
            $cada_cuanto= $item->cada; //cada cuanto
				$mg_recetados= $item->tratamiento_mg; //MG recetados
            $quedan= $item->cantidad_pastillas; //MG recetados

            $item->disponibles_ahora=$item->cantidad_pastillas;
            $item->diarias= 24/$cada_cuanto;
            $for_diarias=$item->diarias;
				$dias_restantes= $item->disponibles_ahora/ $item->diarias;
				$item->dias_restantes=$dias_restantes;

            for($i=0;$i<$for_diarias;$i++){ 

            $Hora = Time() + (60 *60 * $cada_cuanto);//8 horas
             $hora_sugerida= date('H:i a',$Hora).""; 

            //    if($i!=0){
            //       $horas_siguientes=$cada_cuanto*$i;
            //       if($item->diarias!=1){
                     $hora_sugerida.="/(+)".$cada_cuanto."  :FIN";
                     $item->hora_s=$hora_sugerida;
//                     echo $item->hora_s;
            //          $hora1=$item->hora_s;
            //       }
            //       //$hora2= $hora1+$horas_siguientes;
            //       //$item->hora_s.=$hora2;
            //    }
            }

            $this->quedan= $dias_restantes;
            //$this->descontar_cantidad_medicinas($item->disponibles_ahora);
		  }
			echo json_encode($tareas);
   }
   
	public function eliminar_medicina(){
      $this->medicinas_model->eliminar(array(
         'id' => $this->request->id_med
		));
	}
	
	public function listaTension(){
      $tension = $this->medicinas_model->listaTension();
      echo json_encode($tension);
	}
	public function listamedicinas(){
		$this->benchmark->mark('dog');

// Some code happens here

$this->benchmark->mark('cat');

// More code happens here

$this->benchmark->mark('bird');

echo $this->benchmark->elapsed_time('dog', 'cat');
echo $this->benchmark->elapsed_time('cat', 'bird');
echo $this->benchmark->elapsed_time('dog', 'bird');


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
         //'id_med' => $this->request->id_med,
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

   public function descontar_cantidad_medicinas(){
      
   }
   public function actualizar_cantidad_medicinas(){
   }
}
?>
