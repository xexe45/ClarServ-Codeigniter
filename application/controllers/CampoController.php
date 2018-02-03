<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CampoController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Servicio');
	}

	public function index()
	{
		$data["servicios"] = $this->Servicio->comboServicios();
		$this->load->view('dashboard/templates/header');
		$this->load->view('dashboard/campo',$data);

	}

}

/* End of file CampoController.php */
/* Location: ./application/controllers/CampoController.php */