<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Modulo');
		$this->load->model('HomeModel');
	}

	public function index()
	{
		$total_clientes = $this->HomeModel->countClientes();
		$total_acuerdos = $this->HomeModel->countAcuerdos();
		$total_clientes_interesados = $this->HomeModel->countClientesInteresados();
		$total_instalaciones = $this->HomeModel->countInstalaciones();

		$data['clientes'] = $total_clientes->total;
		$data['acuerdos'] = $total_acuerdos->total;
		$data['interesados'] = $total_clientes_interesados->total;
		$data['instalaciones'] = $total_instalaciones->total;

		$this->load->view('dashboard/templates/header');
		$this->load->view('dashboard/home', $data);
	}

	public function myFunctions(){
		$no_ingresar = ["__construct","myFunctions","get_instance"];
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

/* End of file HomeController.php */
/* Location: ./application/controllers/HomeController.php */