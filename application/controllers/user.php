<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
    function __construct(){
        parent::__construct();
		$this->load->model('warga');
		$this->load->model('mhome');
        $this->load->model('mjimpitan');
        $this->load->model('mjadwal');
        $this->load->model('mabsensi');
		$this->load->helper('form','url');  
	}

    public function index(){
        $data['total_warga'] = $this->mhome->hitung_warga();
        $data['total_hari'] = $this->mhome->hitung_hari();
        $data['jumlah_bgt'] = $this->mhome->hitung_jimpitan_masuk();
        $data['qabsen'] = $this->mabsensi->get_alldjadwal();
        $this->load->view('header');
        $this->load->view('user/menu');
        $this->load->view('user/v_dashboard',$data);
        $this->load->view('footer');
	}
	public function warga(){
		$data['title'] = "Data Warga";
        $data['qwarga'] = $this->warga->get_allwarga();
        //$data['qpinjam'] = $this->member->get_idpeminjaman();
		$this->load->view('header');
		$this->load->view('user/menu');
        $this->load->view('user/tabelwarga',$data);
        $this->load->view('footer');
    }
    public function detail_warga(){
        $id = $this->uri->segment(3);
        $data['qwargad'] = $this->warga->get_detail_warga($id);
		$this->load->view('header');
		$this->load->view('user/menu');
        $this->load->view('user/detail_warga',$data);
        $this->load->view('footer');
    }
    public function jimpitan(){
		$data['title'] = "Data Warga";
        $data['jimpitan'] = $this->mjimpitan->jimpitan();
        //$data['sumjimpitan'] = $this->mjiimpitan->get_sum_jimpitan($tgl);
		$this->load->view('header');
		$this->load->view('user/menu');
        $this->load->view('user/jimpitan_saatini',$data);
        $this->load->view('footer');
    }
    public function jimpitan_perhari(){
		$data['title'] = "Data Warga";
        $data['qjimpitan'] = $this->mjimpitan->get_jimpitan_perhari();
        //$data['qpinjam'] = $this->member->get_idpeminjaman();
		$this->load->view('header');
		$this->load->view('user/menu');
        $this->load->view('user/tabel_jimpitan',$data);
        $this->load->view('footer');
    } 
    public function list_jimpitan(){
		$data['title'] = "Data Warga";
        $data['ljimpitan'] = $this->mjimpitan->get_list_jimpitan();
		$this->load->view('header');
		$this->load->view('user/menu');
        $this->load->view('user/list_jimpitan',$data);
        $this->load->view('footer');
    }
    public function detail_jimpitan($tanggal){
		$data['title'] = "Data Warga";
        $data['djimpitan'] = $this->mjimpitan->get_detailjimpitan($tanggal);
        //$data['qpinjam'] = $this->member->get_idpeminjaman();
		$this->load->view('header');
		$this->load->view('user/menu');
        $this->load->view('user/detail_jimpitan',$data);
        $this->load->view('footer');
    }
    public function jadwal(){
		$data['title'] = "Data Warga";
        $data['qjadwal'] = $this->mjadwal->get_alljadwal();
		$this->load->view('header');
		$this->load->view('user/menu');
        $this->load->view('user/jadwal',$data);
        $this->load->view('footer');
}
public function djadwal($hari){
    $data['title'] = "Data Warga";
    $data['qdjadwal'] = $this->mjadwal->get_alldjadwal($hari);
    $this->load->view('header');
    $this->load->view('user/menu');
    $this->load->view('user/detail_jadwal',$data);
    $this->load->view('footer');
}
public function absensi(){
    $data['title'] = "Data Warga";
    $data['qabsensi'] = $this->mabsensi->get_allabsensi();
    $this->load->view('header');
    $this->load->view('user/menu');
    $this->load->view('user/absensi',$data);
    $this->load->view('footer');
}
}