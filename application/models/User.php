<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add(array $rol){
		$query = "CALL sp_add_user(?,?,?,?,?,?,?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$rol);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;	
	}

	public function update(array $rol){
		$query = "CALL sp_update_user(?,?,?,?,?,?,?,?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$rol);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;	
	}

	public function lista(){
		$query = "CALL sp_listar_usuarios";
		$this->load->database();
		$usuarios = $this->db->query($query);
		$this->db->close();
		return $usuarios->result();
	}


}

/* End of file User.php */
/* Location: ./application/models/User.php */