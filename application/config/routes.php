<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'LoginController';
$route['login']['post'] = 'LoginController/login';
$route['logout']['get'] = 'LoginController/logout';
$route['home']['get'] = 'HomeController';
$route['roles']['get'] = 'RolController';
$route['roles']['post'] = 'RolController/add';
$route['getRoles']['get'] = 'RolController/lista';
$route['updateRol/(:num)']['post'] = 'RolController/update/$1';
$route['usuarios']['get'] = 'UserController';
$route['usuarios']['post'] = 'UserController/add';
$route['getUsers']['get'] = 'UserController/lista';
$route['editar-usuario']['post'] = 'UserController/update';
$route['servicios']['get'] = 'ServicioController';
$route['servicios']['post'] = 'ServicioController/add';
$route['getPlanes']['get'] = 'ServicioController/lista';
$route['editar-plan']['post'] = 'ServicioController/update';
$route['sistema']['get'] = 'ModulosController';
$route['modulos']['get'] = 'ModulosController/modulos';
$route['modulos']['post'] = 'ModulosController/add';
$route['getModulos']['get'] = 'ModulosController/lista';
$route['clientes-interesados']['get'] = 'ClientesInteresadosController';
$route['clientes-interesados']['post'] = 'ClientesInteresadosController/add';
$route['getInteresados']['get'] = 'ClientesInteresadosController/lista';
$route['editar-cliente-interesado']['post'] = 'ClientesInteresadosController/update';
$route['clientes']['get'] = 'ClientesController';
$route['clientes']['post'] = 'ClientesController/add';
$route['combo-servicios/(:num)']['get'] = 'ClientesController/comboServicios/$1';
$route['getClientes']['get'] = 'ClientesController/lista';
$route['getByDni']['post'] = 'ClientesController/listaByDni';
$route['migrar-cliente']['post'] = 'ClientesInteresadosController/migrar';
$route['campo']['get'] = 'CampoController';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
