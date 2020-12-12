<?php 
	class ModelAkses extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function qr($phone_number,$password)
		{
			return $this->db->query("SELECT * FROM tb_user WHERE phone_number = '$phone_number' AND password = '$password' ");
		}
	}
 ?>