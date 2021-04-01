<?php 
	class Konsumen extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('modelkonsumen');
			$this->load->model('modelpenjualan');
		}

		public function p()
		{
			$data['user'] = $this->modelkonsumen->konsumen()->result_array();
			$p = $this->uri->segment(3);
			$data['title'] = "Aplikasi Eclooth";
			$data['judul'] = "Manajemen Customer";
			$data['folder'] = "konsumen";
			if (empty($p)) {
				$p = "index";
			}
			$data['p'] = $p;

			$this->load->view('beranda',$data);
		}
		public function status_pesanan($id_user){
			$data['judul']="Status Pesanan";
			$data['title']="Eclooth";
			$data['payment']=$this->db->get('tb_pembayaran')->row_array();
			$data['user'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
			// $data['sales']=$this->db->get_where('tb_sales',['id_user'=>'id_user'])->result_array();
			$data['sales'] = $this->modelpenjualan->status_pesanan($id_user)->result_array();
			
			$this->load->view('home/template/header',$data);
			$this->load->view('home/v_status_pembelian',$data);
			$this->load->view('home/template/footer');
		}
		public function profil_konsumen()
		{
			$data['user'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
			// $p = $this->uri->segment(3);
			$data['title'] = "Eclooth";
			$data['judul'] = "Edit Data Customer";
			$data['folder'] = "konsumen";
			// if (empty($p)) {
			// 	$p = "index";
			// }
			// $data['p'] = $p;

			$this->load->view('home/template/header');
			$this->load->view('home/v_profil_konsumen',$data);
			$this->load->view('home/template/footer');
		}

		public function add_user(){
			$data=[
				'username' => $this->input->post('username'),
				'phone_number' => $this->input->post('phone_number'),
				'address' => $this->input->post('address'),
				'gender' => $this->input->post('gender'),
				'password' => base64_encode($this->input->post('password')),
				'level_user' => $this->input->post('level_user'),
			];
			$this->db->insert('tb_user', $data);
			redirect('user/p');
		}

		public function edit_user(){
			$data['title']="Edit Data";
			$data['judul']="Edit Data Profil";
			$id_user = $this->input->post('id_user');
			$password_sekarang=$this->input->post('password');
			if($password_sekarang==""){
			$data=[
				'username' => $this->input->post('username'),
				'phone_number' => $this->input->post('phone_number'),
				'address' => $this->input->post('address'),
				'gender' => $this->input->post('gender'),
				'level_user' => $this->input->post('level_user'),
			];
		}else{
			$data=[
				'username' => $this->input->post('username'),
				'phone_number' => $this->input->post('phone_number'),
				'address' => $this->input->post('address'),
				'gender' => $this->input->post('gender'),
				'level_user' => $this->input->post('level_user'),
				'password' => base64_encode($this->input->post('password'))

			];
		}
		$this->db->where('id_user', $id_user);			
			$this->db->update('tb_user', $data);
			redirect('konsumen/profil_konsumen');
		}
			
		public function delete_user(){

			$id_user = $this->input->post('id_user');
			$this->db->delete('tb_user',['id_user'=>$id_user]);
			redirect('user/p');
		
		}

	}