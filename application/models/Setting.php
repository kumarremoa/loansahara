<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Model {
	
	public function get_setting() {

		return $this->db->get('loan_setting')->result();
    }

    public function get_settings($uid) {
    	
		$this->db->where('user_id', $uid);
		$query = $this->db->get('loan_setting');
		return $query->result();


		//return $uid;
    }

}

/* End of file Setting.php */
/* Location: ./application/models/Setting.php */