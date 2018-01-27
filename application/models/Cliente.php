<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Model {

	public function __construct()
	{
		parent::__construct();
			
	}

	public function add(array $cliente){
		$query = "CALL sp_add_cliente(?,?,?,?,?,?,?,?,?,?,?,?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$cliente);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;	
	}


	public function lista(){
		$query = "CALL sp_listar_clientes";
		$this->load->database();
		$clientes = $this->db->query($query);
		$this->db->close();
		return $clientes->result();
	}

	public function listaByDni(string $dni){
		$query = "CALL sp_listar_cliente_by_dni(?)";
		$this->load->database();
		$cliente = $this->db->query($query,$dni);
		$this->db->close();
		return $cliente->row();
	}
	

}

/* End of file Cliente.php */
/* Location: ./application/models/Cliente.php */