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
            $nombremedicina= $item->nombre; //MG disponibles
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
         'id_med' => $this->request->medicina,
         'mg' => $this->request->mg,
         'cantidad_tabletas' => $this->request->cantidad_tabletas,
         'precio' => $this->request->precio,
         'lugar' => $this->request->lugar
      ));
   }

   public function guarda_tratamiento(){

      $this->medicinas_model->insertartratamiento(array(
         
         'id_med' => $this->request->id_med,
         'tratamiento_mg' => $this->request->tratamiento_mg,
         'cada' => $this->request->cada,
         'horario' => $this->request->horario,
         'id_recetado'=>$this->request->id_recetado
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
   public function form_validation()
        { 
         $config = array(        //Esta es la segunda forma de poner reglas de validacion... Un array y despues se le pasa este array al metodo set_rules
        array(
                'field' => 'username',
                'label' => 'Username',
                // 'rules'=>'trim|required|min_length[5]|max_length[12]|is_unique[users.username]',

                // 'rules'=>'trim|required|min_length[5]|max_length[12]',
                //  array(
                //          'required'      => 'You have not provided %s.',
                //          'is_unique'     => 'This %s already exists.'
                //  )

                'rules' => array(
                  'required',
                      // array($this->medicinas_model, 'valid_username')
                      //  )   //Esta es la quinta forma de poner reglas de validacion. llamar no a un callback del controlador, sino a un metodo definido en el modelo, que en este caso es valid_username
                      /*
                        Sexta forma, tambien en vez de un array, le puedes pasar una funcion anonima.asi:

                            array(
                                     'required',
                                     function($value)
                                     {
                                             // Check $value
                                     }
                             )
                      */
        ),
        array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required',
                'errors' => array(
                        'required' => 'You must provide a %s.',
                ),
        ),
        array(
                'field' => 'passconf',
                'label' => 'Password Confirmation',
                'rules' => 'trim|required|matches[password]'
        ),
        array(
                'field' => 'email',
                'label' => 'Email',
                // 'rules' => 'trim|required|valid_email|is_unique[users.email]'
        )
        ,
        array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'callback_address_check' /*Esta es la cuarta forma de poner una regla de validacion. Llamar a un callback (una funcion) que definas en el mismo controlador, para ajustar mas la validacion a tus necesidades, pero no me funciono... No se porque... sera la version del framework?*/
        )
);
         $this->load->library('form_validation');
         // $this->form_validation->set_rules('username', 'Username', 'required');            Escribe asi:
         //Param 1: Nombre del campo a validar.
         /*
            Param 2: Nombre que tu le quieras dar al campo.... 
            Param 3: regla de validacion
            para 4: opcional. Mensajes de error personalizados.
         */
         // $this->form_validation->set_rules('password', 'PCassword', 'required',array('required' => 'You must provide a %s.'));
         // $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
         // $this->form_validation->set_rules('email', 'Email', 'required');   Esta es la primera forma de poner reglas de validacion.

            //$this->form_validation->set_rules('username', 'Username', array('required', 'min_length[5]'));
            //Esta es la tercera forma de poner reglas de validacion. Pasando un array como tercer parametro a set_rules... no es muy diferente de la primera forma..

         $this->form_validation->set_rules($config);

         /*******************************************/
          $this->load->helper(array('form', 'url'));
                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('pages/myform');
                        /*rECIBE COMO PARAMETRO LA RUTA DE LA VISTA EN LA CARPETA VIEWS*/
                }
                else
                {
                        $this->load->view('pages/formsucess');
                }
        }

        public function address_check($str)
        {
                if ($str == 'test')
                {
                        $this->form_validation->set_message('address_check', 'The {field} field can not be the word "test"');
                        /*el primer parametro el es mismo nombre de la funcion.. El segundo parametro es un mensaje de error personalizado..

                        Yo no lo habia puesto el mismo nombre del campo y me salio un error ique unable to find error message for your field (address_check) algo asi... lo arregle con eso, pasandole como primer parametro el nombre de la funcion*/
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
        }
}
?>
