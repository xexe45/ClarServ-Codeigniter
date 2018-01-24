<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RolController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Rol');
		$this->load->model('Modulo');
	}

	public function index()
	{
		$this->load->view('dashboard/templates/header');
		$this->load->view('dashboard/roles');
	}

	public function add(){

		if(!$this->input->is_ajax_request()){ return; }

		if(!$this->input->post()){ return; }

		$responder = array();

		if($this->form_validation->run('add_rol')){

			$rol = self::limpiador($this->input->post('rol'));
			$descripcion = self::limpiador($this->input->post('descripcion'));

			$data = array($rol,$descripcion);
			
			if($this->Rol->add($data)){
				$responder["mensaje"] = "Rol Agregado Correctamente";
				$responder["hecho"] = true;
			}else{
				$responder["mensaje"] = "Rol no fue agregado, esto puede ser a que el rol que intenta registrar ya se encuentra registrado";
				$responder["hecho"] = false;
			}
			
		}else{
			$responder["mensaje"] = validation_errors();
			$responder["hecho"] = false;
		}

		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($responder);
	}

	public function update(int $id){
		if($this->input->is_ajax_request()){
			
			if($this->input->post()){

				$responder = array();

				if($this->form_validation->run('add_rol')){

					$rol = self::limpiador($this->input->post('rol'));
					$descripcion = self::limpiador($this->input->post('descripcion'));

					$data = array($id,$rol,$descripcion);

					if($this->Rol->update($data)){
						$responder["mensaje"] = "Rol Editado Correctamente";
						$responder["hecho"] = true;
					}else{
						$responder["mensaje"] = "Rol no fue editado";
						$responder["hecho"] = false;
					}


				}else{
					$responder["mensaje"] = validation_errors();
					$responder["hecho"] = false;
				}

				header('Content-Type: application/x-json; charset:utf-8');
				echo json_encode($responder);
			}
		}
	}

	public function lista(){

		if($this->input->is_ajax_request()){
			$roles["data"] = $this->Rol->lista();
			header('Content-Type: application/x-json; charset:utf-8');
			echo json_encode($roles);
		}else{
			show_404();
		}
	}

	public function myFunctions(){
		$no_ingresar = ["__construct","myFunctions","get_instance","limpiador"];
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


	private function limpiador($parametro){
		return $this->security->xss_clean(strip_tags($parametro));
	}


}

/* End of file RolController.php */
/* Location: ./application/controllers/RolController.php */