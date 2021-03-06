<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['recuperar_estados']['get'] = 'tareaController/recuperar_estados';
//El primer problema era que no ubicaba a recuperar_estados porque la ruta con este patron
/*  $route['(:any)'] = 'pages/view/$1';   estaba tomando prioridad sobre $route['recuperar_estados']['get'] 
por lo tanto caia en pages/view/$1, la cual esperaba un argumento que corresponde al nombre de una vista, y recuperar_estados no es una vista... por eso decia que no se localizaba...
al colocarlo asi, si me funciona... Recuerda que el orden de las rutas importa... 

TAREA: Arregla esto con una expresion regular.. Para que puedas poner $route['(:any)'] = 'pages/view/$1';  donde estaba y no la tengas que declarar abajo.
*/
$route['recuperar_tareas']['get'] = 'tareaController/recuperar_tareas';
/*Ahora recuperar_tareas es la que no me funciona... 
primero, no habi registros en la base de datos.. Agregue uno pero no era eso...
este caso era porque habia un problema en el modelo. Es que el query no se estaba generando correctamente.
No se como pero yo escribi manualmente otra vez la ruta y ahora si me mostraba el error de PHP, no un error de consola...  
el error me mostraba el query generado, lo copie y lo corri en phpmyadmin y es que en la clausula ON del inner join,  un campo era ambiguo. Solo hacia falta un punto (.) para unir esto:  e.id_estado    ESTABA ASI    e id_estado
join('estados e','e.id_estado=t.id_estado')
*/
 $route['crear_tarea']['post'] = 'tareaController/crear_tarea';
$route['modificar_tarea']['post'] = 'tareaController/modificar_tarea';
$route['eliminar_tarea']['post'] = 'tareaController/eliminar_tarea';

/************************************ TAREAS **********************************/
//$route['recuperar_estados']['get'] = 'tareaController/recuperar_estados';


$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

