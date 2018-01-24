<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModulosController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Modulo');
	}

	public function index()
	{

		$this->load->view('dashboard/templates/header');
		$this->load->view('dashboard/sistema/modulos');
		
	}

	public function add(){

		if(!$this->input->is_ajax_request()){ return; }

		if(!$this->input->post()){ return; }

		$responder = array();

		if($this->form_validation->run('add_modulo')){

			$modulo = self::limpiador($this->input->post('modulo'));

			$data = array($modulo);
			
			if($this->Modulo->add($data)){
				$responder["mensaje"] = "Módulo Agregado Correctamente";
				$responder["hecho"] = true;
				$responder["modulo"] = $modulo;
			}else{
				$responder["mensaje"] = "Módulo no fue agregado, esto puede ser a que el módulo que intenta registrar ya se encuentra registrado";
				$responder["hecho"] = false;
			}
			
		}else{
			$responder["mensaje"] = validation_errors();
			$responder["hecho"] = false;
		}

		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($responder);
	}

	public function lista(){

		if($this->input->is_ajax_request()){
			$modulos["data"] = $this->Modulo->lista();
			header('Content-Type: application/x-json; charset:utf-8');
			echo json_encode($modulos);
		}else{
			show_404();
		}

	}

	public function modulos(){

		$carpeta_controllers = self::directory();
		$modulo_database = $this->Modulo->getModulos();
		$combo = [];
		$mis_modulos = [];

		if(count($modulo_database) > 0){

			foreach ($modulo_database as $value) {
				$mis_modulos[] = $value->modulo;
			}

			foreach ($carpeta_controllers as $value) {
				if(!in_array($value, $mis_modulos)){
					$combo[] = $value;
				}
			}
		}else{
			foreach ($carpeta_controllers as $controller) {
				$combo[] = $controller;
			}
		}

		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode(["data" => $combo]);
	}

	private function directory():array{

		$modulos = [];

		$dir = new DirectoryIterator(dirname(__FILE__));

		foreach ($dir as $fileinfo) {
			if(preg_match('/php/', $fileinfo)){
				//echo $fileinfo->getFilename() . "\n";
				$explode = explode(".", $fileinfo);
				if($explode[0] != "LoginController"){
					$modulos[] = $explode[0];
				}
				
			}
		}

		return $modulos;
	}

	

	private function limpiador($parametro){
		return $this->security->xss_clean(strip_tags($parametro));

	}

	public function myFunctions(){
		$no_ingresar = ["__construct","myFunctions","get_instance","limpiador","directory","modulos"];
		$functions = get_class_methods($this);
		$metodos = [];
		$retornar = array();
		$modulo = $this->Modulo->getMyId(get_class($this));

		foreach ($functions as $value) {
			if(!in_array($value, $no_ingresar)){
				$metodos[] = array(
					'modulo_id' => $modulo->id,
					'metodo' => $value
				);
			}
		}

		if($this->Modulo->insertar_metodos($metodos)){
			$retornar["valido"] = true;
		}else{
			$retornar["valido"] = false;
		}

		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($retornar);
	}

}

/* End of file ModulosController.php */
/* Location: ./application/controllers/ModulosController.php */