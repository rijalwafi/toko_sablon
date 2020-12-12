<?php 
	class Laporan extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('modellaporan');
		}

		public function p()
		{
			// $data['sales'] = $this->db->get('tb_sales')->result_array();
			// $data['sales'] = $this->modelpenjualan->sales()->result_array();
			$p = $this->uri->segment(3);
			$data['title'] = "Aplikasi Depot Air";
			$data['judul'] = "Laporan Produk";
			$data['folder'] = "laporan";
			if (empty($p)) {
				$p = "index";
			}
			$data['p'] = $p;
			$this->load->view('beranda',$data);
		}

		public function laporan(){
			$data['bulan'] = $_POST['bulan'];
			$data['tahun'] = $_POST['tahun'];
			$data['val'] = $this->modellaporan->laporan($_POST['bulan'],$_POST['tahun'])->result_array();
			$data['dt'] = $this->modellaporan->total_transaksi($_POST['bulan'],$_POST['tahun'])->row_array();
			$this->load->view("laporan/tb_laporan",$data);
		}



	}
