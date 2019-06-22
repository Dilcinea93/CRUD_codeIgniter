<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['recuperar_estados']['get'] = 'tareaController/recuperar_estados';
 $route['crear_tarea']['post'] = 'tareaController/crear_tarea';
$route['modificar_tarea']['post'] = 'tareaController/modificar_tarea';
$route['eliminar_tarea']['post'] = 'tareaController/eliminar_tarea';
 $route['medicinas/(:any)']['get'] = 'pages/view/$1';
 $route['p_inventario']['get']= 'medicinasController/recuperar_medicinas';
 $route['lista_tension']['get']= 'medicinasController/listaTension';
$route['p_tension']['get']= 'medicinasController/registroTension';
$route['guarda_registro_tension']['post']= 'medicinasController/saveregistroTension';
$route['guarda_medicina']['post']= 'medicinasController/newmedicina';
$route['guarda_compra']['post']= 'medicinasController/guardacompra';
$route['guarda_tratamiento']['post']= 'medicinasController/guarda_tratamiento';
$route['modificar_tension']['post']= 'medicinasController/modificarregistroTension';
$route['listamedicinas']['get']= 'medicinasController/listamedicinas';
$route['eliminar_medicina']['post']= 'medicinasController/eliminar_medicina';
$route['listacompras']['get']= 'medicinasController/listacompras';
$route['descontar_cantidad_medicinas']['get']= 'medicinasController/descontar_cantidad_medicinas';
$route['actualizar_cantidad_medicinas']['post']= 'medicinasController/actualizar_cantidad_medicinas';


$route['form']['post']= 'medicinasController/form_validation';


 //index
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

