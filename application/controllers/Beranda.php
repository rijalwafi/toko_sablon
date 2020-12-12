<?php 
	class Beranda extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('modelberanda');
		}
		public function p()
		{
			$p = $this->uri->segment(3);
			$data['title'] = "Aplikasi Depot Air";
			$data['folder'] = "beranda";
			if (empty($p)) {
				$p = "index";
			}
			$data['p'] = $p;
			$tanggal = date('d');
			$data['member'] = $this->modelberanda->member()->num_rows();
			$data['order'] = $this->modelberanda->order()->num_rows();
			$data['income'] = $this->modelberanda->income($tanggal)->result_array();
			// $data['transaksi'] = $this->modelberanda->transaksi()->num_rows();
			$this->load->view('beranda',$data);
		}
	}
 ?>