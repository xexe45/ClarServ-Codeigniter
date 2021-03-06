<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Security extends CI_Hooks
{
	private $instancia;
	
	public function __construct()
	{
		parent::__construct();
		$this->instancia =& get_instance();
		$this->instancia->load->helper('url');
		$this->instancia->load->library('session');
		$this->instancia->load->model('Permiso');
	}

	public function verificar()
	{
		$controlador = $this->instancia->router->class;
		$metodo = $this->instancia->router->method;
		$s = $this->instancia->session->userdata('id');
		$rol = $this->instancia->session->userdata('rol');

		$noValidados = array('LoginController');
		
		$r = array();

		$permisos = $this->instancia->Permiso->permisos($rol);
		
		foreach ($permisos as $indice => $modulo) {
			foreach($modulo as $m){
				$r[] = $m;
			}
		}


		if(!in_array($controlador, $noValidados)){
			if(empty($s)){
				redirect(base_url());
			}
		}

		if(!in_array($controlador, $noValidados) and !in_array($controlador, $r)){
				$this->instancia->session->set_flashdata('css', 'warning');
				$this->instancia->session->set_flashdata('message', 'No tiene permisos para acceder a la página deseada...Consulte con el administrador');
				redirect(base_url()."home");
		}
		
	}
}