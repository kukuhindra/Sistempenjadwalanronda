<?php

class mjimpitan extends CI_Model {
    var $tabel = 'transaksi';
    var $tabeld = 'transaksi_list';
    var $tabelu = 'user';
    function __construct() {
        parent:: __construct();
    }
    function get_allwarga() {
        $this->db->from($this->tabelu);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }
    }
    function get_jadwalwarga($id) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where_not_in('id_user',$id);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }
    }
    function get_jimpitan_perhari() {
        $this->db->from($this->tabel);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_list_jimpitan() {
        $this->db->select('*');
        $this->db->from($this->tabeld);
        $this->db->join('user', 'user.id_user = transaksi_list.id_user');
        //$this->db->where('tanggal',$tanggal);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }
    }
    
    function get_sum_jimpitan($tgl) {
        $this->db->select('tanggal, SUM(nominal) AS jumlah_bgt', FALSE);
        $this->db->where('tanggal',$tgl);
        $query = $this->db->get('transaksi_list');
        if($query->num_rows() > 0) {
            return $query->result();
        }
    }
    
    function jimpitan() {
        $this->db->select('*');
        $this->db->from($this->tabeld);
        $this->db->join('user', 'user.id_user = transaksi_list.id_user');
        $this->db->where('tanggal',date('Y-m-d'));
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }
    }
    function get_detailjimpitan($tanggal) {
        $this->db->select('*');
        $this->db->from($this->tabeld);
        $this->db->join('user', 'user.id_user = transaksi_list.id_user');
        $this->db->where('tanggal',$tanggal);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        }
    }
    function ins($data) {
        $this->db->insert($this->tabeld,$data);
        return TRUE;
    }
    function insDetail($data2) {
        $this->db->insert($this->tabel,$data2);
        return TRUE;
    }
    function upd($id,$data) {
        $this->db->where('id_list',$id);
        $this->db->update($this->tabeld,$data);

        return TRUE;
    }
    function upDetail($tgl,$data2) {
        $this->db->where('tanggal',$tgl);
        $this->db->update($this->tabel,$data2);

        return TRUE;
    }

    function del($id) {
        $this->db->where('id_list',$id);
        $this->db->delete($this->tabeld);

        if($this->db->affected_rows() == 1) {
            return TRUE;   
        }
        return FALSE;
        
    }
    function delj($id) {
        $this->db->where('id_transaksi',$id);
        $this->db->delete($this->tabel);

        if($this->db->affected_rows() == 1) {
            return TRUE;   
        }
        return FALSE;
        
    }
    function get_byid($id) {
        $this->db->from($this->tabeld);
        $this->db->where('id_list',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
}