<?php 
	class Konsumen extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('modelkonsumen');
		}

		public function p()
		{
			$data['user'] = $this->modelkonsumen->konsumen()->result_array();
			$p = $this->uri->segment(3);
			$data['title'] = "Aplikasi Depot Air";
			$data['judul'] = "Manajemen Konsumen";
			$data['folder'] = "konsumen";
			if (empty($p)) {
				$p = "index";
			}
			$data['p'] = $p;

			$this->load->view('beranda',$data);
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

			$id_user = $this->input->post('id_user');
			$data=[
				'username' => $this->input->post('username'),
				'phone_number' => $this->input->post('phone_number'),
				'address' => $this->input->post('address'),
				'gender' => $this->input->post('gender'),
				'level_user' => $this->input->post('level_user'),
			];

			$this->db->where('id_user', $id_user);			
			$this->db->update('tb_user', $data);
			redirect('user/p');
		}

		public function delete_user(){

			$id_user = $this->input->post('id_user');
			$this->db->delete('tb_user',['id_user'=>$id_user]);
			redirect('user/p');
		
		}

	}
