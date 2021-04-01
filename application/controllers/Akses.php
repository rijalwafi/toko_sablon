<?php 
	class Akses extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('modelakses');
			$this->load->library('form_validation');
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
		// public function indexKonsumen()
		// {
		// 	$data['folder'] = "akses/";
		// 	$data['title'] = "Form Login";
		
		// 	$this->form_validation->set_rules('phone_number','phone','required');
		// 	$this->form_validation->set_rules('password','password','required');
		// 	if($this->form_validation->run() == false){
		// 		$this->load->view('akses/login_konsumen',$data);
				
		// 	}else {
		// 		$this->loginKonsumen();
		// 	}
		
			
		// }
		// public function loginKonsumen(){
		// 	$phone_number = $this->input->post('phone_number');
		// 	$password = base64_encode($this->input->post('password'));
		// 	$qr = $this->modelakses->qr($phone_number,$password);
		// 	$row = $qr->row_array();
		// 	if($row){
		// 		$data = [
		// 			'id_user' => $row['id_user'],
		// 			'username' => $row['username'],
		// 			'phone_number' => $row['phone_number'],
		// 			'level_user' => $row['level_user']
		// 		];
		// 		$this->session->set_userdata($data);
		// 		if($row['level_user'] == "konsumen"){
		// 			// echo "owner dan karyawan";
		// 			redirect('home/p');		
		// 		}
		// 	}else{
			
				
		// 		redirect(base_url('akses/indexKonsumen'));
		// 	}

		// }
		public function login()
		{
			$this->form_validation->set_rules('phone_number','nomer handphone','required');
		
			$this->form_validation->set_rules('password', 'password', 'required');
			$phone_number = $this->input->post('phone_number');
			$password = base64_encode($this->input->post('password'));
			$qr = $this->modelakses->qr($phone_number,$password);
			$data['user'] = $this->db->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
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
					redirect('beranda/p/',$data);		
				}else{
					redirect('home/p');
				}
				
			}else{
			
				
				redirect(base_url('akses/index'));
			}
			
		}
		public function indexRegister()
		{
			$data['folder'] = "akses/reg/";
			$data['title'] = "Form Pendaftaran";
			
			
			$this->form_validation->set_rules('username','user name','required');
			// $this->form_validation->set_rules('phone_number','phone','required');
			$this->form_validation->set_rules('password','password','trim|required');
			$this->form_validation->set_rules('address', 'alamat', 'required');
			
			if($this->form_validation->run() == false){
				$this->load->view('akses/register',$data);
			}else{
				$this->register();
			}
				
				
			
		}

		
		public function register(){
			$data=[
				'username' => $this->input->post('username'),
				'phone_number' => $this->input->post('phone_number'),
				'address' => $this->input->post('address'),
				// 'gender' => $this->input->post('gender'),
				'password' => base64_encode($this->input->post('password')),
				'level_user' => $this->input->post('level_user'),
			];
			$this->db->insert('tb_user', $data);
			redirect('akses/registerSukses');
		}
		public function registerSukses(){
			$data['folder'] = "akses/";
			$data['title'] = "Pendaftaran Berhasil";
			$this->load->view('home/template/header');
			$this->load->view('home/template/v_register_sukses',$data);
			$this->load->view('home/template/footer');
		}
		

		public function logout()
		{
			
			$data['product'] = $this->db->get('tb_product')->result_array();
			
			$this->session->sess_destroy();
			redirect('home/p',$data);
		}
	}
 ?>