<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modulo extends CI_Model {

	public function __construct()
	{
		parent::__construct();
			
	}

	public function add(array $modulo){
		$query = "CALL sp_add_modulo(?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$modulo);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;	
	}


	public function getModulos(){
		$this->load->database();
		$query = $this->db->select('modulo')
							->from('modulos')
							->get();
		$this->db->close();
		return $query->result();
	}

	public function lista(){
		$query = "CALL sp_listar_modulos";
		$this->load->database();
		$roles = $this->db->query($query);
		$this->db->close();
		return $roles->result();
	}

	public function getMyId(string $modulo){
		$this->load->database();
		$modulo = $this->db->select('id,modulo')
							->from('modulos')
							->where("modulo",$modulo)
							->get();
		$this->db->close();
		return $modulo->row();

	}	

	public function insertar_metodos(array $data){
		$this->load->database();
		$this->db->trans_start();
		$this->db->insert_batch('metodos', $data);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			
        	return false;

		}else{
			
			return true;
		}
	}	


}

/* End of file Modulo.php */
/* Location: ./application/models/Modulo.php */