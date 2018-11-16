<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addbanner_model extends CI_Model {


	 function getRow(){
	 
	    $this->db->select('*');
	    $this->db->from('loan_advertisement_banner');
	    return $this->db->get();
		      
		}
	 function getaddpostion()
	 {
	 	$this->db->select('*');
	    $this->db->from('loan_advertisement_postion');
	    $query= $this->db->get();
	    return $query->result_array();
	 }

	  function insert($data = array()) {
        $insert = $this->db->insert('loan_advertisement_banner', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }


}