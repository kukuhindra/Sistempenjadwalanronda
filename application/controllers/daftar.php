<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('warga');
		$this->load->helper('form','url');  
	}

	public function index()
	{
		//$this->load->view('v_daftar');
    }
    public function form() {
        $to = $this->uri->segment(3);

        $id_user = addslashes($this->input->post('id_user'));
        $nama = addslashes($this->input->post('nama'));
        $no_rmh = addslashes($this->input->post('no_rmh'));
        $username = addslashes($this->input->post('username'));
        $pass = addslashes($this->input->post('password'));
        $password = hash('md5',$pass);
        $telepon = addslashes($this->input->post('telepon'));
        $level = addslashes($this->input->post('level'));
        
        if($to=="add") {
            $data['title'] = "Tambah Member";
            $data['act'] = "add_save";
            $this->load->view('v_daftar',$data);
        }elseif ($to=="add_save") {  
            $data=array(
                'id_user'=>$id_user,
                'nama'=>$nama,
                'no_rmh'=>$no_rmh,
                'username'=>$username,
                'password'=>$password,
                'telepon'=>$telepon,
                'level'=>$level
            );
            $this->warga->ins($data);
            redirect('Login');
        }
    }

}
