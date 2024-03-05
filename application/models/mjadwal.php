<?php 
class Mjadwal extends CI_Model {
    var $tabel = 'jadwal';
    var $tabeld = 'jadwal_detail';
    function __construct() {
        parent:: __construct();
    }

    function get_alljadwal() {
        $this->db->from($this->tabel);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }
    }
    function get_allwargaJadwal() {
        $this->db->select('*');
        $this->db->from('jadwal_detail');
     
        $query = $this->db->get();
        $arr = array();
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
               $arr[] = $row['id_user'];
            }
           
        }
        return $arr;
       
    }
    function get_alldjadwal($hari) {
        $this->db->select('*');
        $this->db->from($this->tabeld);
        $this->db->join('jadwal', 'jadwal.id_jadwal = jadwal_detail.id_jadwal');
        $this->db->join('user', 'user.id_user = jadwal_detail.id_user');
        $this->db->where('hari',$hari);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }
    }
    function get_user($id) {
        $this->db->select('*');
        $this->db->from($this->tabeld);
        $this->db->join('jadwal', 'jadwal.id_jadwal = jadwal_detail.id_jadwal');
        $this->db->join('user', 'user.id_user = jadwal_detail.id_user');
        $this->db->where('id_jadwal',$id);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }
    }
     function ins($data) {
        $this->db->insert($this->tabeld,$data);
        return TRUE;
    }

    function upd($id,$data) {
        $this->db->where('id_jadwal',$id);
        $this->db->update($this->tabel,$data);

        return TRUE;
    }

    function del($id) {
        $this->db->where('id_user',$id);
        $this->db->delete($this->tabeld);

        if($this->db->affected_rows() == 1) {
            return TRUE;   
        }
        return FALSE;
        
    }

    function get_byid($id) {
        $this->db->from($this->tabel);
        $this->db->where('id_jadwal',$id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
}
?>