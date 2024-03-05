<?php 

class mforget_pass extends CI_Model {

	function __construct() {
        parent:: __construct();
    }

    function validate($username){

        $this->db->where('username',$username);
        $result = $this->db->get('user',1);
        return $result;
    }
}

?>