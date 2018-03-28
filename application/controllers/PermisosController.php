<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermisosController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Permiso');
		$this->load->library('form_validation');
	}

	public function index()
	{
		

	}

	public function add(){
		if(!$this->input->is_ajax_request()){ return; }

		if(!$this->input->post()){ return; }

		$responder = array();

		if($this->form_validation->run('add_permiso')){

			$rol = self::limpiador($this->input->post('rol_id'));
			$modulo = self::limpiador($this->input->post('modulo_id'));

			$data = array($rol,$modulo);
			$respuesta = $this->Permiso->add($data);

			if($respuesta[0]){
				$responder["mensaje"] = $respuesta[1];
				$responder["hecho"] = true;
			}else{
				$responder["mensaje"] = $respuesta[1];
				$responder["hecho"] = false;
			}
			
		}else{
			$responder["mensaje"] = validation_errors();
			$responder["hecho"] = false;
		}

		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($responder);

	}

	private function limpiador($parametro){
		return $this->security->xss_clean(strip_tags($parametro));
	}

}

/* End of file PermisosController.php */
/* Location: ./application/controllers/PermisosController.php */