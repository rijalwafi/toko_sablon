<?php 
	class Penjualan extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('modelpenjualan');
		}

		public function p()
		{
			// $data['sales'] = $this->db->get('tb_sales')->result_array();
			$data['sales'] = $this->modelpenjualan->sales()->result_array();
			$p = $this->uri->segment(3);
			$data['title'] = "Aplikasi Depot Air";
			$data['judul'] = "Penjualan Produk";
			$data['folder'] = "penjualan";
			if (empty($p)) {
				$p = "index";
			}
			$data['p'] = $p;
			$this->load->view('beranda',$data);
		}

		

		public function update_status(){

			$id_sales = $this->input->post('id_sales');
			$id_product = $this->input->post('id_product');

			$data['product'] = $this->db->get('tb_product')->result_array();

			$data=[
				'status' => $this->input->post('status'),
			];

			

			if($this->input->post('status') == "kirim"){
				$this->db->query("UPDATE tb_product SET stock_product=(stock_product - 1) WHERE id_product='$id_product'");
				
			}

			$this->db->where('id_sales', $id_sales);			
			$this->db->update('tb_sales', $data);
			redirect('penjualan/p');
		}


	}
