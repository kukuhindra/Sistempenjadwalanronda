<?php 
class Mdetail_warga extends CI_Model {
    var $tabel = 'user';
    function __construct() {
        parent:: __construct();
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