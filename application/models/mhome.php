<?php 

class Mhome extends CI_Model {

	function __construct() {
        parent:: __construct();
    }

    public function hitung_warga() {
        $query = $this->db->get('user');

        if($query->num_rows() > 0) {
            return $query->num_rows();
        }else {
            return 0;
        }
    }
    public function hitung_jimpitan_masuk() {
        $this->db->select('SUM(jumlah) AS jumlah_bgt');
        $query = $this->db->get('transaksi');
        if($query->num_rows() > 0) {
            return $query->result();
        }
    }
    public function hitung_hari() {
        $query = $this->db->get('transaksi');

        if($query->num_rows() > 0) {
            return $query->num_rows();
        }else {
            return 0;
        }
    }
}

?>