<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('mabsensi');
        $this->load->model('mjadwal');
        $this->load->model('warga');
        $this->load->model('mhome');
        $this->load->model('mjimpitan');
		$this->load->helper('form','url');  
	}
	public function index(){
        $data['total_warga'] = $this->mhome->hitung_warga();
        $data['total_hari'] = $this->mhome->hitung_hari();
        $data['jumlah_bgt'] = $this->mhome->hitung_jimpitan_masuk();
        $data['qabsen'] = $this->mabsensi->get_alldjadwal();
        $this->load->view('header');
        $this->load->view('admin/menu');
        $this->load->view('v_dashboard',$data);
        $this->load->view('footer');
	}
	public function warga(){
		$data['title'] = "Data Warga";
        $data['qwarga'] = $this->warga->get_allwarga();
        //$data['qpinjam'] = $this->member->get_idpeminjaman();
		$this->load->view('header');
		$this->load->view('admin/menu');
        $this->load->view('admin/tabelwarga',$data);
        $this->load->view('footer');
    }
    public function detail_warga(){
        $id = $this->uri->segment(3);
        $data['qwargad'] = $this->warga->get_detail_warga($id);
		$this->load->view('header');
		$this->load->view('admin/menu');
        $this->load->view('admin/detail_warga',$data);
        $this->load->view('footer');
    }
	public function form() {
        $to = $this->uri->segment(3);
        $id = $this->uri->segment(4);

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
			$this->load->view('header');
			$this->load->view('admin/menu');
            $this->load->view('admin/form_warga',$data);
            $this->load->view('footer');
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
            redirect('admin/warga');
        }
        elseif ($to=="upd") {
            $data['title'] = "Ubah Warga";
            $data['act'] = "upd_save";
            $data['qdetwarga'] = $this->warga->get_byid($id);
            $this->load->view('header');
            $this->load->view('admin/menu');
            $this->load->view('admin/form_warga',$data);
            $this->load->view('footer');

        }
        elseif ($to=="upd_save") {
            $data=array(
                
                'nama'=>$nama,
                'no_rmh'=>$no_rmh,
                'username'=>$username,
                'password'=>$password,
                'telepon'=>$telepon,
                'level'=>$level
            );

            $this->warga->upd($id,$data);
            redirect('admin/warga');
        }
    }

    function del($id) {
        $this->warga->del($id);
        redirect('admin/warga');
    }

    function cetak() {
        $data['qwarga'] = $this->warga->get_allwarga();
        $this->load->view('vwarga_preview',$data);
        //$this->load->view('footer');
    }
   
    public function jimpitan_perhari(){
		$data['title'] = "Data Warga";
        $data['qjimpitan'] = $this->mjimpitan->get_jimpitan_perhari();
        //$data['qpinjam'] = $this->member->get_idpeminjaman();
		$this->load->view('header');
		$this->load->view('admin/menu');
        $this->load->view('admin/tabel_jimpitan',$data);
        $this->load->view('footer');
    } 
    public function jimpitan(){
		$data['title'] = "Data Warga";
        $data['jimpitan'] = $this->mjimpitan->jimpitan();
        //$data['sumjimpitan'] = $this->mjiimpitan->get_sum_jimpitan($tgl);
		$this->load->view('header');
		$this->load->view('admin/menu');
        $this->load->view('admin/jimpitan_saatini',$data);
        $this->load->view('footer');
    }
    public function list_jimpitan(){
		$data['title'] = "Data Warga";
        $data['ljimpitan'] = $this->mjimpitan->get_list_jimpitan();
        //$data['sumjimpitan'] = $this->mjiimpitan->get_sum_jimpitan($tgl);
		$this->load->view('header');
		$this->load->view('admin/menu');
        $this->load->view('admin/list_jimpitan',$data);
        $this->load->view('footer');
    }
    public function detail_jimpitan($tanggal){
		$data['title'] = "Data Warga";
        $data['djimpitan'] = $this->mjimpitan->get_detailjimpitan($tanggal);
        //$data['qpinjam'] = $this->member->get_idpeminjaman();
		$this->load->view('header');
		$this->load->view('admin/menu');
        $this->load->view('admin/detail_jimpitan',$data);
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
			$this->load->view('admin/menu');
            $this->load->view('admin/form_jimpitan',$data);
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
                redirect('admin/jimpitan');
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
                redirect('admin/jimpitan');
            }
            
        
            
        }elseif ($to=="upd") {
            $data['title'] = "Ubah jimpitan";
            $data['act'] = "upd_save";
            $data['qdetjimpitan'] = $this->mjimpitan->get_byid($id);
            $this->load->view('header');
            $this->load->view('admin/menu');
            $this->load->view('admin/form_jimpitan',$data);
            $this->load->view('footer');
        }elseif ($to=="upd_save") {
            $dbsum = $this->mjimpitan->get_sum_jimpitan($tgl);
                foreach ($dbsum as $dbs) {
                    # code...
                   
                    $tgl_trans = $dbs->tanggal;
                }
            if($tgl == $tgl_trans){
                $data1=array(
                
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
                redirect('admin/jimpitan');
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
                redirect('admin/jimpitan');
            }
            
        }
    }

    function delj($id) {
        $this->mjimpitan->upd;
        $this->mjimpitan->del($id);
        redirect('admin/list_jimpitan');
    }
    function deljp($id) {
        $this->mjimpitan->delj($id);
        redirect('admin/jimpitan_perhari');
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
		$this->load->view('admin/menu');
        $this->load->view('admin/jadwal',$data);
        $this->load->view('footer');
}
public function djadwal($hari){
    $data['title'] = "Data Warga";
    $data['qdjadwal'] = $this->mjadwal->get_alldjadwal($hari);
    $this->load->view('header');
    $this->load->view('admin/menu');
    $this->load->view('admin/detail_jadwal',$data);
    $this->load->view('footer');
}
public function formja($id) {
    $to = $this->uri->segment(3);
    $id = $this->uri->segment(4);
   
    $id_jadwal = addslashes($this->input->post('id_jadwal'));
    $id_user = addslashes($this->input->post('id_user'));
    $data['ljimpitan'] = $this->mjimpitan->get_jadwalwarga($this->mjadwal->get_allwargaJadwal());
    
    if($to=="add") {
        $data['title'] = "Tambah Member";
        $data['qjadwal'] = $this->mjadwal->get_byid($id);
        $data['act'] = "add_save";
        $this->load->view('header');
        $this->load->view('admin/menu');    
        $this->load->view('admin/form_jadwal',$data);
        $this->load->view('footer');
    }elseif ($to=="add_save") {

            $data=array(
                'id_jadwal'=>$id_jadwal,
                'id_user'=>$id_user
            );
            
            $this->mjadwal->ins($data);
            redirect('admin/jadwal');
}
    
      
    elseif ($to=="upd") {
        $data['title'] = "Ubah jimpitan";
        $data['act'] = "upd_save";
        $data['qdetjadwal'] = $this->mjadwal->get_byid($id);
        $this->load->view('header');
        $this->load->view('admin/menu');
        $this->load->view('admin/form_jadwal',$data);
        $this->load->view('footer');
    }elseif ($to=="upd_save") {
        $data=array(
            'id_jadwal'=>$id_jadwal,
            'id_user'=>$id_user
        );
        $this->mjadwal->upd($id,$data);
        redirect('admin/detail_jadwal');
    }
}

function delja($id) {
    $this->mjadwal->del($id);
    redirect('admin/jadwal');
}

function cetakja() {
    $data['qjimpitan'] = $this->mjadwal->get_alljadwal();
    $this->load->view('vwarga_preview',$data);
    //$this->load->view('footer');
}
public function absensi(){
    $data['title'] = "Data Warga";
    $data['qabsensi'] = $this->mabsensi->get_allabsensi();
    $this->load->view('header');
    $this->load->view('admin/menu');
    $this->load->view('admin/absensi',$data);
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
            'Status'=>'Tidak Hadir'
        );
        $this->mabsensi->ins($data);
        redirect('admin');
    }
    elseif ($to=="checkout"){
        
            $data=array(
                'waktu_pulang'=>$waktu,
                'Status'=>'Hadir',
                'denda'=>$denda
		
            );
            $this->mabsensi->upd($id,$data);
            redirect('admin');
    }
}
function delab($id) {
    $this->mabsensi->del($id);
    redirect('admin/absensi');
}
}

?>
