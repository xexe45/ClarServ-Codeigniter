<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add(array $rol){
		$query = "CALL sp_add_rol(?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$rol);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;	
	}

	public function update(array $rol){
		$query = "CALL sp_update_rol(?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$rol);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;	
	}

	public function lista(){
		$query = "CALL sp_listar_roles";
		$this->load->database();
		$roles = $this->db->query($query);
		$this->db->close();
		return $roles->result();
	}

	public function comboRoles(){
		$this->load->database();
		$query = $this->db->select('id as v1, rol as v2')
								->from('roles')
								->get();
		$this->db->close();
		return $query->result();
	}

	public function getMyModules($id){
		$this->load->database();
		$query = $this->db->select('permisos.modulo_id as v1, modulos.modulo as v2')
								->from('permisos')
								->join('modulos','modulos.id = permisos.modulo_id')
								->where(array('rol_id' => $id))
								->get();
		$this->db->close();
		return $query->result();
	}
	

}

/* End of file Rol.php */
/* Location: ./application/models/Rol.php */