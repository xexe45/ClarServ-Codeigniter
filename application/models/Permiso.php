<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permiso extends CI_Model {

	public function __construct()
	{
		parent::__construct();	
	}	

	public function add($data){
		$query = "CALL sp_add_permiso(?,?,@m,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$data);
		$res = $this->db->query('select @s as res');
		$mensaje = $this->db->query('select @m as msg');
		$this->db->trans_complete();
		$this->db->close();
		$respuestas = array($res->row()->res,$mensaje->row()->msg);
		return $respuestas;
	}

	public function permisos($id){
		$this->load->database();
		$query = $this->db->select('modulos.modulo')
								->from('permisos')
								->join('modulos','modulos.id = permisos.modulo_id')
								->where(array('rol_id' => $id))
								->get();
		$this->db->close();
		return $query->result_array();
	}

}

/* End of file Permiso.php */
/* Location: ./application/models/Permiso.php */