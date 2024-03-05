<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class operator extends CI_Controller {
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
        $this->load->view('operator/menu');
        $this->load->view('operator/v_dashboard',$data);
        $this->load->view('footer');
	}
	public function warga(){
		$data['title'] = "Data Warga";
        $data['qwarga'] = $this->warga->get_allwarga();
        //$data['qpinjam'] = $this->member->get_idpeminjaman();
		$this->load->view('header');
		$this->load->view('operator/menu');
        $this->load->view('operator/tabelwarga',$data);
        $this->load->view('footer');
    }
    public function detail_warga(){
        $id = $this->uri->segment(3);
        $data['qwargad'] = $this->warga->get_detail_warga($id);
		$this->load->view('header');
		$this->load->view('operator/menu');
        $this->load->view('operator/detail_warga',$data);
        $this->load->view('footer');
    }
    public function jimpitan_perhari(){
		$data['title'] = "Data Warga";
        $data['qjimpitan'] = $this->mjimpitan->get_jimpitan_perhari();
        //$data['qpinjam'] = $this->member->get_idpeminjaman();
		$this->load->view('header');
		$this->load->view('operator/menu');
        $this->load->view('operator/tabel_jimpitan',$data);
        $this->load->view('footer');
    } 
    public function list_jimpitan(){
		$data['title'] = "Data Warga";
        $data['ljimpitan'] = $this->mjimpitan->get_list_jimpitan();
		$this->load->view('header');
		$this->load->view('operator/menu');
        $this->load->view('operator/list_jimpitan',$data);
        $this->load->view('footer');
    }
    public function detail_jimpitan($tanggal){
		$data['title'] = "Data Warga";
        $data['djimpitan'] = $this->mjimpitan->get_detailjimpitan($tanggal);
        //$data['qpinjam'] = $this->member->get_idpeminjaman();
		$this->load->view('header');
		$this->load->view('operator/menu');
        $this->load->view('operator/detail_jimpitan',$data);
        $this->load->view('footer');
    }
    public function jimpitan(){
		$data['title'] = "Data Warga";
        $data['jimpitan'] = $this->mjimpitan->jimpitan();
        //$data['sumjimpitan'] = $this->mjiimpitan->get_sum_jimpitan($tgl);
		$this->load->view('header');
		$this->load->view('operator/menu');
        $this->load->view('operator/jimpitan_saatini',$data);
        $this->load->view('footer');
    }
    public function formj() {
        $to = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        
        $id_list = addslashes($this->input->post('id_list'));
        $id_user = addslashes($this->input->post('id_user'));
        $tgl = addslashes($this->input->post('tanggal'));
        $nominal = addslashes($this->input->post('nominal'));
        
       
        $data['ljimpitan'] = $this->mjimpitan->get_allwarga();
        $dbtgldetail = $this->mjimpitan->get_jimpitan_perhari();
            foreach($dbtgldetail as $qj){
                $tgl_detail = $qj->tanggal;
            }
        if($to=="add") {
            $data['title'] = "Tambah Member";
            $data['act'] = "add_save";
			$this->load->view('header');
			$this->load->view('operator/menu');
            $this->load->view('operator/form_jimpitan',$data);
            $this->load->view('footer');
            
            
        }elseif ($to=="add_save") {
            $dbsum = $this->mjimpitan->get_sum_jimpitan($tgl);
                foreach ($dbsum as $dbs) {
                    # code...
                   
                    $tgl_trans = $dbs->tanggal;
                }
            if($tgl == $tgl_trans){
                $data1=array(
                    'id_list'=>$id_list,
                    'id_user'=>$id_user,
                    'tanggal'=>$tgl,
                    'nominal'=>$nominal
                );
                
                $this->mjimpitan->ins($data1);
                $dbsum = $this->mjimpitan->get_sum_jimpitan($tgl);
                foreach ($dbsum as $dbs) {
                    # code...
                    $jmlbgt = $dbs->jumlah_bgt;
                   
                }
                $data2=array(
                    
                    'tanggal'=>$tgl,
                    'jumlah'=>$jmlbgt
                );
                $this->mjimpitan->upDetail($tgl,$data2);
                redirect('operator/jimpitan');
            }
            
            if( $tgl != $tgl_detail || $tgl_detail == null){
                $data1=array(
                    'id_list'=>$id_list,
                    'id_user'=>$id_user,
                    'tanggal'=>$tgl,
                    'nominal'=>$nominal
                );
                
                $this->mjimpitan->ins($data1);
                $dbsum = $this->mjimpitan->get_sum_jimpitan($tgl);
                foreach ($dbsum as $dbs) {
                    # code...
                    $jmlbgt = $dbs->jumlah_bgt;
                    
                }
                $data2=array(
                    
                    'tanggal'=>$tgl,
                    'jumlah'=>$jmlbgt
                );
                $this->mjimpitan->insDetail($data2);
                redirect('operator/jimpitan');
            }
            
        
            
        }elseif ($to=="upd") {
            $data['title'] = "Ubah jimpitan";
            $data['act'] = "upd_save";
            $data['qdetjimpitan'] = $this->mjimpitan->get_byid($id);
            $this->load->view('header');
            $this->load->view('operator/menu');
            $this->load->view('operator/form_jimpitan',$data);
            $this->load->view('footer');
        }elseif ($to=="upd_save") {
            $dbsum = $this->mjimpitan->get_sum_jimpitan($tgl);
                foreach ($dbsum as $dbs) {
                    # code...
                   
                    $tgl_trans = $dbs->tanggal;
                }
            if($tgl == $tgl_trans){
                $data1=array(
                    'id_list'=>$id_list,
                    'id_user'=>$id_user,
                    'tanggal'=>$tgl,
                    'nominal'=>$nominal
                );
                $this->mjimpitan->upd($id,$data1);
                
                $dbsum = $this->mjimpitan->get_sum_jimpitan($tgl);
                foreach ($dbsum as $dbs) {
                    # code...
                    $jmlbgt = $dbs->jumlah_bgt;
                   
                }
                $data2=array(
                    
                    'tanggal'=>$tgl,
                    'jumlah'=>$jmlbgt
                );
                $this->mjimpitan->upDetail($tgl,$data2);
                redirect('operator/jimpitan');
            }
            
            if( $tgl != $tgl_detail || $tgl_detail == null){
                $data1=array(
                    'id_list'=>$id_list,
                    'id_user'=>$id_user,
                    'tanggal'=>$tgl,
                    'nominal'=>$nominal
                );
                $this->mjimpitan->upd($id,$data1);
               
                $dbsum = $this->mjimpitan->get_sum_jimpitan($tgl);
                foreach ($dbsum as $dbs) {
                    # code...
                    $jmlbgt = $dbs->jumlah_bgt;
                    
                }
                $data2=array(
                    
                    'tanggal'=>$tgl,
                    'jumlah'=>$jmlbgt
                );
                $this->mjimpitan->insDetail($data2);
                redirect('operator/jimpitan');
            }
            
        }
    }
    function deljh($id) {
        $this->mjimpitan->del($id);
        redirect('operator/jimpitan');
    }

    function delj($id) {
        $this->mjimpitan->del($id);
        redirect('operator/list_jimpitan');
    }

    function cetakj() {
        $data['qjimpitan'] = $this->mjimpitan->get_jimpitan_perhari();
        $this->load->view('vwarga_preview',$data);
        //$this->load->view('footer');
    }
    public function jadwal(){
		$data['title'] = "Data Warga";
        $data['qjadwal'] = $this->mjadwal->get_alljadwal();
		$this->load->view('header');
		$this->load->view('operator/menu');
        $this->load->view('operator/jadwal',$data);
        $this->load->view('footer');
}
public function djadwal($hari){
    $data['title'] = "Data Warga";
    $data['qdjadwal'] = $this->mjadwal->get_alldjadwal($hari);
    $this->load->view('header');
    $this->load->view('operator/menu');
    $this->load->view('operator/detail_jadwal',$data);
    $this->load->view('footer');
}
public function absensi(){
    $data['title'] = "Data Warga";
    $data['qabsensi'] = $this->mabsensi->get_allabsensi();
    $this->load->view('header');
    $this->load->view('operator/menu');
    $this->load->view('operator/absensi',$data);
    $this->load->view('footer');
}
public function absen($id) {
    $to = $this->uri->segment(3);
    $id = $this->uri->segment(4);
    $tanggal = date('Y-m-d');
    $waktu = date('H:i:s');
    $denda = 5000;
   if ($to=="checkin") {
    $data1 = $this->mabsensi->get_byid($id);
    foreach ($data1 as $absensi){
        $id_jadwal_detail = $absensi->id_jadwal_detail;
    }
        $data=array(
            'id_jadwal_detail'=>$id_jadwal_detail,
            'tanggal'=>$tanggal,
            'waktu_berangkat'=>$waktu,
            'Status'=>'Tidak Hadir',
            'denda'=>$denda
        );
        $this->mabsensi->ins($data);
        redirect('operator');
    }
    elseif ($to=="checkout"){
        
            $data=array(
                'waktu_pulang'=>$waktu,
                'Status'=>' Hadir',
                'denda'=>'0'
                
            );
            $this->mabsensi->upd($id,$data);
            redirect('operator');
    }
}

}

?>