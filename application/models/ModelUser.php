<?php 
	class ModelUser extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function selainkonsumen()
		{
			$sql = $this->db->query("SELECT * FROM `tb_user` 				
				WHERE `tb_user`.`level_user` != 'konsumen'  ");
			return $sql;
		}
		
	}
 ?>