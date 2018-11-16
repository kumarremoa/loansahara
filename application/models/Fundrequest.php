<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fundrequest extends CI_Model {

	function showbank($id){

		$this->db->where('user_id', $id);
        $query = $this->db->get('loan_user_bank_details');   
        return $query->result_array();    
	}

}

/* End of file Fundrequest.php */
/* Location: ./application/models/Fundrequest.php */