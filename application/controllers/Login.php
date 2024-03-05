<?php 

class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('warga');
		$this->load->helper('form','url');  
		$this->load->model('Login_model');
	}
	
	function index(){
		$this->load->view('v_login');
	}
	  function auth(){
		$username    = $this->input->post('username',TRUE);
		$password = md5($this->input->post('password',TRUE));
		$validate = $this->Login_model->validate($username, $password);
		if($validate->num_rows() > 0){
			$data  = $validate->row_array();
			$name  = $data['nama'];
			$username = $data['username'];
			$level = $data['level'];
			$sesdata = array(
				'nama'  	=> $name,
				'username'  => $username,
				'level'     => $level,
				'logged_in' => TRUE,
				'status'=>'login'
			);
			$this->session->set_userdata($sesdata);
			// access login for admin
			if($level === '1'){
				redirect(base_url("page"));
			}
			elseif($level === '2'){
				redirect(base_url("page/staff"));
			}
			else{
				redirect(base_url("page/author"));
			}
		}
		else{
			echo $this->session->set_flashdata('msg','<div class="alert alert-danger" style="margin-top: 3px">
			<div class="header"><b><i class="fa fa-exclamation-circle"></i></b> Password Salah</div></div>');
			redirect('Login');
		}
	  }
	
	  function logout(){
		  $this->session->sess_destroy();
		  redirect(base_url("Login"));
	  }
	
}
