<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Model {

	function getRow(){

        return $this->db->get('loan_transaction');          
    }

    function getRowMy($uid){
    	
    	$this->db->where('user_id', $uid);
    	$this->db->order_by("created_date", "desc");
        return $this->db->get('loan_transaction');          
    }

    function dashboardtransaction($uid){
    	
    	$this->db->where('user_id', $uid);
    	$this->db->order_by("created_date", "desc");
    	$this->db->limit(5); 
        $query=$this->db->get('loan_transaction'); 
        return $query->result_array();         
    }
    
}

/* End of file Report.php */
/* Location: ./application/models/Report.php */