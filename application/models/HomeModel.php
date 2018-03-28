<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function countClientes(){
		$this->load->database();
		$query = "CALL sp_total_clientes";
		$total_clientes = $this->db->query($query);
		$this->db->close();
		return $total_clientes->row();
	}

	public function countAcuerdos(){
		$this->load->database();
		$query = "CALL sp_acuerdos_hoy";
		$total_acuerdos = $this->db->query($query);
		$this->db->close();
		return $total_acuerdos->row();
	}
	
	public function countClientesInteresados(){
		$this->load->database();
		$query = "CALL sp_count_interesados";
		$total_clientes_interesados = $this->db->query($query);
		$this->db->close();
		return $total_clientes_interesados->row();
	}

	public function countInstalaciones(){
		$this->load->database();
		$query = "CALL sp_instalaciones_hoy";
		$total_instalaciones = $this->db->query($query);
		$this->db->close();
		return $total_instalaciones->row();
	}
	
	

}

/* End of file HomeModel.php */
/* Location: ./application/models/HomeModel.php */