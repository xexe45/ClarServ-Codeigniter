<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServicioController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Servicio');
		$this->load->model('Modulo');
	}

	public function index()
	{
		$this->load->view('dashboard/templates/header');
		$this->load->view('dashboard/servicios');
	}

	public function add(){

		if(!$this->input->is_ajax_request()){ return; }

		if(!$this->input->post()){ return; }

		$responder = array();

		if($this->form_validation->run('add_servicio')){

			$plan = self::limpiador($this->input->post('plan'));
			$descripcion = self::limpiador($this->input->post('descripcion'));
			$precio_promo = self::limpiador($this->input->post('precio_promo'));
			$precio_normal = self::limpiador($this->input->post('precio_normal'));

			$data = array($plan,$descripcion,$precio_promo,$precio_normal);
			
			if($this->Servicio->add($data)){
				$responder["mensaje"] = "Servicio Agregado Correctamente";
				$responder["hecho"] = true;
			}else{
				$responder["mensaje"] = "Servicio no fue agregado, esto puede ser a que el servicio que intenta registrar ya se encuentra registrado";
				$responder["hecho"] = false;
			}
			
		}else{
			$responder["mensaje"] = validation_errors();
			$responder["hecho"] = false;
		}

		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($responder);
	}

	public function update(){

		if(!$this->input->is_ajax_request()){ return; }

		if(!$this->input->post('id_p')){ return; }

		$responder = array();

		if($this->form_validation->run('update_servicio')){

			$id = self::limpiador($this->input->post('id_p'));
			$plan = self::limpiador($this->input->post('plan_e'));
			$descripcion = self::limpiador($this->input->post('descripcion_e'));
			$precio_promo = self::limpiador($this->input->post('precio_promo_e'));
			$precio_normal = self::limpiador($this->input->post('precio_normal_e'));
			$estado = self::limpiador($this->input->post('estado_e'));

			$data = array($id,$plan,$descripcion,$precio_promo,$precio_normal,$estado);
			
			if($this->Servicio->update($data)){
				$responder["mensaje"] = "Servicio Editado Correctamente";
				$responder["hecho"] = true;
			}else{
				$responder["mensaje"] = "Servicio no fue editado, esto puede ser a que el servicio que intenta editar ya se encuentra registrado";
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
			$planes["data"] = $this->Servicio->lista();
			header('Content-Type: application/x-json; charset:utf-8');
			echo json_encode($planes);
		}else{
			show_404();
		}
	}

	private function limpiador($parametro){
		return $this->security->xss_clean(strip_tags($parametro));
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

}

/* End of file ServicioController.php */
/* Location: ./application/controllers/ServicioController.php */