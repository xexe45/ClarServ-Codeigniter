<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientesController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Servicio');
		$this->load->model('Cliente');
	}

	public function index()
	{
		$data["servicios"] = $this->Servicio->comboServicios();
		$this->load->view('dashboard/templates/header');
		$this->load->view('dashboard/clientes',$data);
	}

	public function comboServicios($id){

		if(!$this->input->is_ajax_request()){ return; }

		if(!$id){ return; }

		$servicios = $this->Servicio->combo($id);
		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($servicios);
	}

	public function add(){

		if(!$this->input->is_ajax_request()){ return; }

		if(!$this->input->post()){ return; }

		$responder = array();

		if($this->form_validation->run('add_cliente')){
			$user_id = $this->session->userdata('id');
			$nombres = self::limpiador($this->input->post('nombres'));
			$apellidos = self::limpiador($this->input->post('apellidos'));
			$dni = self::limpiador($this->input->post('dni'));
			$telefono = self::limpiador($this->input->post('telefono'));
			$telefono_opcional = self::limpiador($this->input->post('telefono_opcional'));
			$direccion = self::limpiador($this->input->post('direccion'));
			$correo = self::limpiador($this->input->post('correo'));
			$codigo = self::limpiador($this->input->post('codigo'));
			$servicio = self::limpiador($this->input->post('servicio'));
			$precio_promo = self::limpiador($this->input->post('precio_promo'));
			$precio_normal = self::limpiador($this->input->post('precio_normal'));
			$instalacion = self::limpiador($this->input->post('instalacion'));
			$observaciones = self::limpiador($this->input->post('observaciones'));
			
			$data = array($nombres,$apellidos,$dni,$telefono,$telefono_opcional,$direccion,$correo,$codigo,$servicio,$precio_promo,$precio_normal,$user_id,$instalacion,$observaciones);
			
			if($this->Cliente->add($data)){
				$responder["mensaje"] = "Cliente y Contrato Agregado Correctamente";
				$responder["hecho"] = true;
			}else{
				$responder["mensaje"] = "Cliente no fue agregado, esto puede ser a que el cliente que intenta registrar ya se encuentra registrado";
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
			$clientes["data"] = $this->Cliente->lista();
			header('Content-Type: application/x-json; charset:utf-8');
			echo json_encode($clientes);
		}else{
			show_404();
		}

	}

	public function listaByDni(){

		if($this->input->is_ajax_request()){
			if($this->input->post('dni')){
				$dni = self::limpiador($this->input->post('dni'));
				$cliente = $this->Cliente->listaByDni($dni);
				header('Content-Type: application/x-json; charset:utf-8');
				echo json_encode($cliente);
			}
			
		}else{
			show_404();
		}

	}

	private function limpiador($parametro){
		return $this->security->xss_clean(strip_tags($parametro));
	}

}

/* End of file ClientesController.php */
/* Location: ./application/controllers/ClientesController.php */