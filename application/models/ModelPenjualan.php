<?php 
	class ModelPenjualan extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function sales()
		{
			return $this->db->query("SELECT `tb_user`.`username`,`tb_user`.`address`, `tb_product`.`name_product`, `tb_sales`.`amount`, `tb_sales`.`sales_date`, `tb_sales`.`status`, `tb_sales`.`id_sales`, `tb_sales`.`id_product` , `tb_sales`.`jumlah_beli` FROM `tb_user` JOIN `tb_sales` ON `tb_user`.`id_user` = `tb_sales`.`id_user` JOIN `tb_product` ON `tb_sales`.`id_product` = `tb_product`.`id_product` ORDER BY `tb_sales`.`sales_date` DESC ");
		}
	}
 ?>