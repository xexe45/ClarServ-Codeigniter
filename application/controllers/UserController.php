<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Rol');
		$this->load->model('User');
		$this->load->model('Modulo');
		$this->load->library('bcrypt');
	}

	public function index()
	{
		$data["roles"] = $this->Rol->lista();
		$this->load->view('dashboard/templates/header');
		$this->load->view('dashboard/usuarios',$data);
	}

	public function add(){
		if($this->input->is_ajax_request()){
			if($this->input->post()){
				$reponder = array();

				if($this->form_validation->run('add_usuario')){

					$nombres = self::limpiador($this->input->post('nombres'));
					$apellidos = self::limpiador($this->input->post('apellidos'));
					$dni = self::limpiador($this->input->post('dni'));
					$telefono = self::limpiador($this->input->post('telefono'));
					$opcional = self::limpiador($this->input->post('opcional'));
					$direccion = self::limpiador($this->input->post('direccion'));
					$rol = self::limpiador($this->input->post('rol'));
					$email = self::limpiador($this->input->post('email'));
					$password = self::limpiador($this->input->post('password'));

					$data = array($nombres,$apellidos,$dni,$telefono,$opcional,$direccion,$rol,$email,$this->bcrypt->hash_password($password));

					if($this->User->add($data)){
						$responder["mensaje"] = "Usuario Agregado Correctamente";
						$responder["hecho"] = true;
					}else{
						$responder["mensaje"] = "Usuario no se pudo agregar, esto puede ocurrir cuando el usuario que intenta registrar ya existe";
						$responder["hecho"] = false;
					}


				}else{
					$responder["mensaje"] = validation_errors();
					$responder["hecho"] = false;
				}
				header('Content-Type: application/x-json; charset:utf-8');
				echo json_encode($responder);
			}
		}else{
			show_404();
		}
	}

	public function update(){
		if($this->input->is_ajax_request()){
			if($this->input->post('id_e')){
				$reponder = array();

				if($this->form_validation->run('update_usuario')){

					$id = self::limpiador($this->input->post('id_e'));
					$nombres = self::limpiador($this->input->post('nombres_e'));
					$apellidos = self::limpiador($this->input->post('apellidos_e'));
					$dni = self::limpiador($this->input->post('dni_e'));
					$telefono = self::limpiador($this->input->post('telefono_e'));
					$opcional = self::limpiador($this->input->post('opcional_e'));
					$direccion = self::limpiador($this->input->post('direccion_e'));
					$rol = self::limpiador($this->input->post('rol_e'));
					$email = self::limpiador($this->input->post('email_e'));
					$estado = self::limpiador($this->input->post('estado_e'));

					$data = array($id,$nombres,$apellidos,$dni,$telefono,$opcional,$direccion,$rol,$email,$estado);

					if($this->User->update($data)){
						$responder["mensaje"] = "Usuario Editado Correctamente";
						$responder["hecho"] = true;
					}else{
						$responder["mensaje"] = "Usuario no se pudo editar";
						$responder["hecho"] = false;
					}

				}else{
					$responder["mensaje"] = validation_errors();
					$responder["hecho"] = false;
				}
				header('Content-Type: application/x-json; charset:utf-8');
				echo json_encode($responder);
			}
		}else{
			show_404();
		}
	}


	public function lista(){

		if($this->input->is_ajax_request()){
			$usuarios["data"] = $this->User->lista();
			header('Content-Type: application/x-json; charset:utf-8');
			echo json_encode($usuarios);
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

/* End of file UserController.php */
/* Location: ./application/controllers/UserController.php */