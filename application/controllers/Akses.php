<?php 
	class Akses extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('modelakses');
		}
		public function index()
		{
			$data['folder'] = "akses/";
			$data['title'] = "Form Login";
			if (isset($this->session->userdata['level_user'])) {
				if($this->session->userdata['level_user']=="owner" || $this->session->userdata['level_user']=="karyawan"){
					// echo "owner dan karyawan";	
					redirect('beranda/p/');				
				}else{
					redirect('home/p/');				
				}
			}else{
				$this->load->view('akses/login',$data);
			}
		}
		public function login()
		{
			$phone_number = $this->input->post('phone_number');
			$password = base64_encode($this->input->post('password'));
			$qr = $this->modelakses->qr($phone_number,$password);
			$row = $qr->row_array();
			if($row){
				$data = [
					'id_user' => $row['id_user'],
					'username' => $row['username'],
					'phone_number' => $row['phone_number'],
					'level_user' => $row['level_user']
				];
				$this->session->set_userdata($data);
				if($row['level_user'] == "owner" || $row['level_user'] == "karyawan"){
					// echo "owner dan karyawan";
					redirect('beranda/p/');		
				}else {
					// echo "konsumen";
					redirect('home/p/');		
				}
			}else{
				redirect(base_url('akses/index'));
			}
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect(base_url('akses/'));
		}
	}
 ?>