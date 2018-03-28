<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campo extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function countContratos($user){
		$query = "CALL sp_contratos_dia(?)";
		$this->load->database();
		$count = $this->db->query($query,$user);
		$this->db->close();
		return $count->row();

	}
	

}

/* End of file Campo.php */
/* Location: ./application/models/Campo.php */