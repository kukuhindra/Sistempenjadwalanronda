<?php 
class Mabsensi extends CI_Model {
    var $tabel = 'absensi';
    function __construct() {
        parent:: __construct();
    }

    function get_allabsensi() {
        $this->db->select('*');
        $this->db->from($this->tabel);
        $this->db->join('jadwal_detail', 'jadwal_detail.id_jadwal_detail = absensi.id_jadwal_detail');
        $this->db->join('jadwal', 'jadwal.id_jadwal = jadwal_detail.id_jadwal');
        $this->db->join('user', 'user.id_user = jadwal_detail.id_user');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }
    }
    function get_alldjadwal() {
         switch (date('D')) {
            case 'Sun':
                $hari = 'Minggu';
                break;
            case 'Mon': 
                $hari = 'Senin';
                break;
            case 'Tue':
                $hari = 'Selasa';
                break;
            case 'Wed':
                $hari = 'Rabu';
                break;
            case 'Thu':
                $hari = 'Kamis';
                break;
            case 'Fri':
                $hari = 'Jumat';
                break;
            case 'Sat':
                $hari = 'Sabtu';
                break;
            default:
                # code...
                break;
            }
        $this->db->select('*');
        $this->db->from('jadwal_detail');
        $this->db->join('jadwal', 'jadwal.id_jadwal = jadwal_detail.id_jadwal');
        $this->db->join('user', 'user.id_user = jadwal_detail.id_user');
       $this->db->where('hari', $hari);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }
    }
    function ins($data) {
        $this->db->insert($this->tabel,$data);
        return TRUE;
    }
    function upd($id,$data) {
        $this->db->where('id_jadwal_detail',$id);
        $this->db->update($this->tabel,$data);
    }
    function get_byid($id) {
        $this->db->from('jadwal_detail');
        $this->db->where('id_jadwal_detail',$id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
    function del($id) {
        $this->db->where('id_absensi',$id);
        $this->db->delete($this->tabel);

        if($this->db->affected_rows() == 1) {
            return TRUE;   
        }
        return FALSE;
        
    }
}
