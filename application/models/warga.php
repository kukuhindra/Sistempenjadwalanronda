<?php 
class Warga extends CI_Model {
    var $tabel = 'user';
    function __construct() {
        parent:: __construct();
    }

    function get_allwarga() {
        $this->db->from($this->tabel);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }
    }
    function get_detail_warga($id) {
        $this->db->select('*');
        $this->db->from('jadwal_detail');
        $this->db->join('jadwal', 'jadwal.id_jadwal = jadwal_detail.id_jadwal');
        $this->db->join('user', 'user.id_user = jadwal_detail.id_user');
        $this->db->where('jadwal_detail.id_user',$id);
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
        $this->db->where('id_user',$id);
        $this->db->update($this->tabel,$data);
        return TRUE;
    }

    function del($id) {
        $this->db->where('id_user',$id);
        $this->db->delete($this->tabel);

        if($this->db->affected_rows() == 1) {
            return TRUE;   
        }
        return FALSE;
        
    }

    function get_byid($id) {
        $this->db->from($this->tabel);
        $this->db->where('id_user',$id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
}
?>