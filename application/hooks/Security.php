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
	}

	public function verificar()
	{
		$controlador = $this->instancia->router->class;
		$metodo = $this->instancia->router->method;
		$s = $this->instancia->session->userdata('id');

		$noValidados = array('LoginController');


		if(!in_array($controlador, $noValidados)){
			if(empty($s)){
				redirect(base_url());
			}
		}
		
	}
}