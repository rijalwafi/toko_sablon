<?php 
	class Produk extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			// $this->load->model('modeluser');
		}

		public function p()
		{
			$data['produk'] = $this->db->get('tb_product')->result_array();
			$p = $this->uri->segment(3);
			$data['title'] = "Aplikasi Depot Air";
			$data['judul'] = "Manajemen Produk";
			$data['folder'] = "produk";
			if (empty($p)) {
				$p = "index";
			}
			$data['p'] = $p;
			$this->load->view('beranda',$data);
		}

		public function add_produk(){
			$upload_image = $_FILES['image']['name'];

				if($upload_image){
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']		 = '2048';
					$config['upload_path']	 = './assets/image/';
					$this->load->library('upload', $config);

					if($this->upload->do_upload('image')){
						$old_image = $data['user']['image'];
						if($old_image != 'default.jpg'){
							unlink(FCPATH . 'assets/image/'.$old_image);
						}



						$new_image = $this->upload->data('file_name');
						$this->db->set('image', $new_image);

					}else {
						echo $this->upload->display_error();
					}
				}
			$data=[
				'name_product' => $this->input->post('name_product'),
				'purchase_price' => $this->input->post('purchase_price'),
				'selling_price' => $this->input->post('selling_price'),
				'stock_product' => $this->input->post('stock_product'),
				'image' => $new_image,
				
			];
			$this->db->insert('tb_product', $data);
			redirect('produk/p');
		}

		public function edit_produk(){

			$id_product = $this->input->post('id_product');
			//cek jika ada gambar
				$upload_image = $_FILES['image']['name'];

				if($upload_image){
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']		 = '2048';
					$config['upload_path']	 = './assets/image/';
					$this->load->library('upload', $config);

					if($this->upload->do_upload('image')){
						$old_image = $data['user']['image'];
						if($old_image != 'default.jpg'){
							unlink(FCPATH . 'assets/image/'.$old_image);
						}



						$new_image = $this->upload->data('file_name');
						$this->db->set('image', $new_image);

					}else {
						echo $this->upload->display_error();
					}
				}

				$new_image = $this->input->post('current_image');
			$data=[
				'name_product' => $this->input->post('name_product'),
				'purchase_price' => $this->input->post('purchase_price'),
				'selling_price' => $this->input->post('selling_price'),
				'stock_product' => $this->input->post('stock_product'),
				// 'image' => $new_image,
			];

			$this->db->where('id_product', $id_product);			
			$this->db->update('tb_product', $data);
			redirect('produk/p');
		}
	

		public function delete_produk(){

			$id_product = $this->input->post('id_product');
			$this->db->delete('tb_product',['id_product'=>$id_product]);
			redirect('produk/p');
		
		}

	}
