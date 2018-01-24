<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicio extends CI_Model {

	public function __construct()
	{
		parent::__construct();
			
	}

	public function add(array $rol){
		$query = "CALL sp_add_servicio(?,?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$rol);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;	
	}

	public function update(array $rol){
		$query = "CALL sp_update_servicio(?,?,?,?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$rol);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;	
	}

	public function lista(){
		$query = "CALL sp_listar_servicios";
		$this->load->database();
		$planes = $this->db->query($query);
		$this->db->close();
		return $planes->result();
	}

	public function combo($id){
		$this->load->database();
		$query = $this->db->select('precio_mes_oferta as v1,precio_normal as v2')
							->from('planes')
							->where("id",$id)
							->get();
		$this->db->close();
		return $query->row();
	}

	public function comboServicios(){
		$this->load->database();
		$query = $this->db->select('id as v1, nombre as v2')
							->from('planes')
							->where("estado",'A')
							->get();
		$this->db->close();
		return $query->result();
	}		

}

/* End of file Servicio.php */
/* Location: ./application/models/Servicio.php */