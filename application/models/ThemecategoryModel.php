<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ThemecategoryModel extends CI_Model {

	 function getCategoryRow(){
	 
	    $this->db->select('*');
	    $this->db->from('loan_theme_category');
	    return $this->db->get();
		      
		}
	 function getCategoryRowById($id){
	 
	    $this->db->select('*');
	    $this->db->from('loan_theme_category');
	    $this->db->where('id',$id);
	    $query=$this->db->get();
		return $query->result_array();      
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