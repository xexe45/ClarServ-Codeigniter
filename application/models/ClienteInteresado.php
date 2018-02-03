<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClienteInteresado extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add(array $cliente){
		$query = "CALL sp_add_cliente_interesado(?,?,?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$cliente);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;	
	}

	public function update(array $cliente){
		$query = "CALL sp_update_cliente_interesado(?,?,?,?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$cliente);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;	
	}


	public function lista(){
		$query = "CALL sp_listar_clientes_interesados";
		$this->load->database();
		$clientes = $this->db->query($query);
		$this->db->close();
		return $clientes->result();
	}

	public function migrar(array $cliente){
		$query = "CALL sp_migrar_cliente(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$cliente);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;	
	}


}

/* End of file ClienteInteresado.php */
/* Location: ./application/models/ClienteInteresado.php */