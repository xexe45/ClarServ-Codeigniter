<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientesInteresadosController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('ClienteInteresado');
		$this->load->model('Servicio');
	}

	public function index()
	{
		$data["servicios"] = $this->Servicio->comboServicios();
		$this->load->view('dashboard/templates/header');
		$this->load->view('dashboard/clientes_interesados',$data);
	}

	public function add(){

		if(!$this->input->is_ajax_request()){ return; }

		if(!$this->input->post()){ return; }

		$responder = array();

		if($this->form_validation->run('add_cliente_interesado')){

			$nombres = self::limpiador($this->input->post('nombres'));
			$apellidos = self::limpiador($this->input->post('apellidos'));
			$telefono = self::limpiador($this->input->post('telefono'));
			$direccion = self::limpiador($this->input->post('direccion'));
			$descripcion = self::limpiador($this->input->post('descripcion'));
			
			$data = array($nombres,$apellidos,$telefono,$direccion,$descripcion);
			
			if($this->ClienteInteresado->add($data)){
				$responder["mensaje"] = "Cliente Agregado Correctamente";
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

	public function migrar(){

		if(!$this->input->is_ajax_request()){ return; }

		if(!$this->input->post('id_co')){ return; }

		$responder = array();

		if($this->form_validation->run('migrar_cliente')){

			$id = self::limpiador($this->input->post('id_co'));
			$user_id = $this->session->userdata('id');
			$nombres = self::limpiador($this->input->post('nombres_c'));
			$apellidos = self::limpiador($this->input->post('apellidos_c'));
			$dni = self::limpiador($this->input->post('dni_c'));
			$telefono = self::limpiador($this->input->post('telefono_c'));
			$telefono_opcional = self::limpiador($this->input->post('telefono_opcional_c'));
			$direccion = self::limpiador($this->input->post('direccion_c'));
			$correo = self::limpiador($this->input->post('correo_c'));
			$codigo = self::limpiador($this->input->post('codigo_c'));
			$servicio = self::limpiador($this->input->post('servicio_c'));
			$precio_promo = self::limpiador($this->input->post('precio_promo_c'));
			$precio_normal = self::limpiador($this->input->post('precio_normal_c'));
			$instalacion = self::limpiador($this->input->post('instalacion_c'));
			$observaciones = self::limpiador($this->input->post('observaciones_c'));
			
			$data = array($id,$nombres,$apellidos,$dni,$telefono,$telefono_opcional,$direccion,$correo,$codigo,$servicio,$precio_promo,$precio_normal,$user_id,$instalacion,$observaciones);
			
			if($this->ClienteInteresado->migrar($data)){
				$responder["mensaje"] = "Cliente Migrado Correctamente";
				$responder["hecho"] = true;
			}else{
				$responder["mensaje"] = "Cliente no fue migrado, esto puede ser a que el cliente que intenta registrar ya se encuentra registrado";
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

		if(!$this->input->post('id_c')){ return; }

		$responder = array();

		if($this->form_validation->run('update_cliente_interesado')){

			$id = self::limpiador($this->input->post('id_c'));
			$nombres = self::limpiador($this->input->post('nombres_e'));
			$apellidos = self::limpiador($this->input->post('apellidos_e'));
			$telefono = self::limpiador($this->input->post('telefono_e'));
			$direccion = self::limpiador($this->input->post('direccion_e'));
			$descripcion = self::limpiador($this->input->post('descripcion_e'));
			
			$data = array($id,$nombres,$apellidos,$telefono,$direccion,$descripcion);
			
			if($this->ClienteInteresado->update($data)){
				$responder["mensaje"] = "Cliente Editado Correctamente";
				$responder["hecho"] = true;
			}else{
				$responder["mensaje"] = "Cliente no fue editado";
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
			$clientes["data"] = $this->ClienteInteresado->lista();
			header('Content-Type: application/x-json; charset:utf-8');
			echo json_encode($clientes);
		}else{
			show_404();
		}
	}

	private function limpiador($parametro){
		return $this->security->xss_clean(strip_tags($parametro));
	}

}

/* End of file ClientesInteresados.php */
/* Location: ./application/controllers/ClientesInteresados.php */