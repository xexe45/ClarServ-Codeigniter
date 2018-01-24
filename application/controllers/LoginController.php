<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('Bcrypt');
		$this->load->library('form_validation');
		$this->load->model('Login');
	}

	public function index()
	{
		if(!$this->session->userdata('id')){
			$this->load->view('auth/login');
		}else{
			$this->load->view('dashboard/templates/header');
			$this->load->view('dashboard/home');
		}
		
	}

	public function login(){

		if(!$this->input->is_ajax_request()){return;}

		if(!$this->input->post()){return;}

		$responder = array();

		if($this->form_validation->run('login')){

			$email = $this->security->xss_clean(strip_tags($this->input->post('correo')));
			$password = $this->security->xss_clean(strip_tags($this->input->post('pass')));

			$user = $this->Login->loginAdmin($email,$password);

				if(isset($user)){
						
					$login = array(
						'id' => $user->id,
						'user' => $user->nombre." ".$user->apellidos,
						'rol' => $user->rol_id
					);
						
					$this->session->set_userdata( $login );

					$responder["ejecutado"] = true;
						
				}else{
					$responder["ejecutado"] = false;
					$responder["mensaje"] = "Usuario y/o clave incorrecto";
				}

		}else{
			$responder["ejecutado"] = false;
			$responder["mensaje"] = validation_errors();
		}

		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($responder);

		
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

}

/* End of file LoginController.php */
/* Location: ./application/controllers/LoginController.php */