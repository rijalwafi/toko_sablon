<?php 
	class ModelBeranda extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function member()
		{
			return $this->db->query("SELECT * FROM tb_user WHERE level_user = 'konsumen' ");
		}
		public function order()
		{
			return $this->db->query("SELECT * FROM tb_sales WHERE status = '' ");
		}
		public function income($tanggal)
		{
			return $this->db->query(" SELECT SUM(amount) AS total FROM tb_sales WHERE sales_date = curdate()  ");
		}
		public function transaksi()
		{
			return $this->db->query("SELECT * FROM tb_transaksi");
		}
	}
 ?>