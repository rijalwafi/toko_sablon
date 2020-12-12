<?php 
	class Home extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			// $this->load->model('modelberanda');
		}

		public function p()
		{
			$data['product'] = $this->db->get('tb_product')->result_array();		
			$this->load->view('home/index',$data);
		}
		public function sukses($id_product){
			$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
			$data['product'] = $this->db->get_where('tb_product', ['id_product' => $id_product])->row_array();
			$this->load->view('home/suksesbeli',$data);
		}
		public function send_transaction(){
			$data=[
				'id_user' => $this->input->post('id_user'),
				'id_product' => $this->input->post('id_product'),
				'amount' => $this->input->post('total_harga'),
				'jumlah_beli' => $this->input->post('total_beli'),
				'sales_date' => date("Y-m-d"),
				
			];
			$this->db->insert('tb_sales', $data);
			redirect('home/p');
		}

	}
 ?>