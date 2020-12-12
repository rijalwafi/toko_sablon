<?php 
	class ModelLaporan extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function laporan($bulan,$tahun)
		{
			$sql = $this->db->query("SELECT `tb_user`.`username`, `tb_product`.`name_product`, `tb_sales`.`sales_date`,`tb_sales`.`amount` FROM `tb_user` JOIN `tb_sales` ON `tb_user`.`id_user` = `tb_sales`.`id_user` JOIN `tb_product` ON `tb_sales`.`id_product` = `tb_product`.`id_product` 				
				WHERE month(`tb_sales`.`sales_date`) = '$bulan' AND year(`tb_sales`.`sales_date`) = '$tahun' ");
			return $sql;
		}
		public function laporan1($bulan,$tahun)
		{
			$sql = $this->db->query("SELECT id_transaksi,(tb_kasir.nama) as kasir, (tb_konsumen.nama) as konsumen, (tb_paket.nama) as paket, tgl_transaksi,jml_kilo,total
				FROM tb_transaksi
				INNER JOIN tb_kasir ON tb_transaksi.id_kasir=tb_kasir.id_kasir
				INNER JOIN tb_konsumen ON tb_transaksi.id_konsumen=tb_konsumen.id_konsumen
				INNER JOIN tb_paket ON tb_transaksi.id_paket=tb_paket.id_paket
				WHERE month(tgl_transaksi) = '$bulan' AND year(tgl_transaksi) = '$tahun' ");
			return $sql;
		}
		public function total_transaksi($bulan,$tahun)
		{
			return $this->db->query("SELECT sum(amount) as t_transaksi
			FROM tb_sales
			WHERE month(sales_date) = '$bulan' AND year(sales_date) = '$tahun' ");
		}
	}
 ?>