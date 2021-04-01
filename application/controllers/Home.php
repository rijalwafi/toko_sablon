  <?php 
	class Home extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('modelpenjualan');
		}

		public function p()
		{
			$data['user'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
			// $data['product'] = $this->db->get('tb_product')->result_array();
			$data['product'] = $this->db->get('tb_product')->result_array();
			// $data['sales'] = $this->db->get_where('tb_sales', ['id_user' => $id_user])->row_array();
			$this->load->view('home/template/header',$data);
			$this->load->view('home/template/index',$data);
			$this->load->view('home/template/footer');		
			
		}
		public function sukses($id_product){
			$data['user'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
			$data['product'] = $this->db->get_where('tb_product', ['id_product' => $id_product])->row_array();
			$this->load->view('home/template/header');
			$this->load->view('home/suksesbeli',$data);
			$this->load->view('home/template/footer');
		}
		public function send_transaction(){
			$data['user'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
			$data['product'] = $this->db->get_where('tb_product')->result_array();
			$upload_image = $_FILES['design_sablon']['name'];

			if($upload_image){
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']		 = '2048';
				$config['upload_path']	 = './assets/image/design_sablon';
				$this->load->library('upload', $config);

				if($this->upload->do_upload('design_sablon')){
					$old_image = $data['user']['design_sablon'];
					if($old_image != 'default.jpg'){
						unlink(FCPATH . 'assets/image/design_sablon'.$old_image);
					}



					$new_image = $this->upload->data('file_name');
					$this->db->set('design_sablon', $new_image);

				}else {
					echo $this->upload->display_error();
				}
			}
			
			$data=[
				'id_user' => $this->input->post('id_user'),
				'id_product' => $this->input->post('id_product'),
				'amount' => $this->input->post('total_harga'),
				'size'=>$this->input->post('size'),
				'warna'=>$this->input->post('warna'),
				'jumlah_beli' => $this->input->post('total_beli'),
				
				'design_sablon'=> $new_image
				
			];
			$this->db->insert('tb_sales', $data);
			redirect('home/sukses_beli');
		}
		public function sukses_beli(){
			$data['user'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
			$data['product'] = $this->db->get_where('tb_product')->result_array();
			$this->load->view('home/template/header');
			$this->load->view('home/v_sukses_beli',$data);
			$this->load->view('home/template/footer');
		}
	
		public function kirim_pembayaran(){
			$data['user'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
			$data['product'] = $this->db->get_where('tb_product')->result_array();
			$data['sales']=$this->db->get_where('tb_sales')->result_array();
			$upload_image = $_FILES['bukti_bayar']['name'];
			if($upload_image){
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']		 = '2048';
				$config['upload_path']	 = './assets/image/bukti_bayar';
				$this->load->library('upload', $config);

				if($this->upload->do_upload('bukti_bayar')){
					$old_image = $data['user']['bukti_bayar'];
					if($old_image != 'default.jpg'){
						unlink(FCPATH . 'assets/image/bukti_bayar'.$old_image);
					}



					$new_image = $this->upload->data('file_name');
					$this->db->set('bukti_bayar', $new_image);

				}else {
					echo $this->upload->display_error();
				}
			}
		
		
			
			$data=[
				'id_user' => $this->input->post('id_user'),
				'id_product' => $this->input->post('id_product'),
				'id_sales' => $this->input->post('id_sales'),
				'nama_bank' => $this->input->post('nama_bank'),				
				'nama_ekspedisi' => $this->input->post('nama_ekspedisi'),
				'bukti_bayar'=> $new_image

			];
			$this->db->insert('tb_pembayaran', $data);
			redirect('home/p');

			;
		}
		public function pembayaran_berhasil(){
			$this->load->view('home/template/header');
			$this->load->view('home/');
			$this->load->view('home/template/footer');
		}
		

	}
 ?>