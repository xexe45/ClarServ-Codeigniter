<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function loginAdmin(string $correo,string $hash){

		$this->load->database();

		$query = $this->db->select('*')
							->from('users')
							->where(['email' => $correo,'estado' => 'A'])
							->get();
		$this->db->close();
		if($query->num_rows() == 1){

			$user = $query->row();
			$pass = $user->password;

			
			if($this->bcrypt->check_password($hash, $pass)){
 				return $query->row();
 			}
 			
		}
	}
	

}

/* End of file Login.php */
/* Location: ./application/models/Login.php */