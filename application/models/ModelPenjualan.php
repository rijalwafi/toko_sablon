<?php 
	class ModelPenjualan extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function sales()
		{
			return $this->db->query("SELECT`tb_user`.`username`,`tb_user`.`address`,`tb_user`.`phone_number`, `tb_product`.`name_product`,`tb_product`.`size`, `tb_sales`.`amount`, `tb_sales`.`sales_date`, `tb_sales`.`status`, `tb_sales`.`id_sales`, `tb_sales`.`id_product` , `tb_sales`.`jumlah_beli`,`tb_sales`.`design_sablon`,`tb_sales`.`warna`
			FROM `tb_user` JOIN `tb_sales` 
			ON `tb_user`.`id_user` = `tb_sales`.`id_user` JOIN `tb_product` 
			ON `tb_sales`.`id_product` = `tb_product`.`id_product` 
			
			ORDER BY `tb_sales`.`sales_date` DESC ");
		}
		public function status_pesanan($id_user){
			$sql=$this->db->query("SELECT  `tb_user`.`username`,`tb_user`.`address`, `tb_product`.`name_product`, `tb_sales`.`amount`, `tb_sales`.`design_sablon`,`tb_sales`.`warna`,`tb_sales`.`sales_date`, `tb_sales`.`status`, `tb_sales`.`id_sales`, `tb_sales`.`id_product` , `tb_sales`.`jumlah_beli`,`tb_product`.`size`
			FROM `tb_user` JOIN `tb_sales`
			ON `tb_user`.`id_user` = `tb_sales`.`id_user`JOIN `tb_product` 
			ON `tb_sales`.`id_product` = `tb_product`.`id_product` 
		
			where `tb_user`.`id_user`=$id_user.  order by `tb_sales`.`sales_date` desc  ");
			return $sql;
		}
		// public function pembayaran($id_user){
		// 	$sql=$this->db->query("SELECT `tb_user`.`username`,`tb_user`.`address`, `tb_product`.`name_product`, `tb_sales`.`amount`, `tb_sales`.`design_sablon`,`tb_sales`.`warna`,`tb_sales`.`sales_date`, `tb_sales`.`status`, `tb_sales`.`id_sales`, `tb_sales`.`id_product` , `tb_sales`.`jumlah_beli`,`tb_sales`.`bukti_bayar`,`tb_product`.`size`
		// 	FROM `tb_user` left JOIN `tb_sales`
		// 	ON `tb_user`.`id_user` = `tb_sales`.`id_user`left JOIN `tb_product` 
		// 	ON `tb_sales`.`id_product` = `tb_product`.`id_product`
		// 	where `tb_user`.`id_user`=$id_user.  order by `tb_sales`.`sales_date` desc  ");
		// 	return $sql;
		// }
		public function no()
		{
			return $this->db->query("SELECT max(id_pembayaran) AS kode FROM tb_pembayaran");
		}
		// public function statu($id_user){
		// 	$this->db->select('*');
		// 	$this->db->from('tb_user','tb_sales','tb_product');
		// 	$this->db->join('tb_sales','tb_user.id_user=tb_sales.id_user','left');
		// 	$this->db->join('')
		// }
	}
 ?>