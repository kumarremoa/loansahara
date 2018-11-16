<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Model {

	/*
     * Get Members
     */
    function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('pro_user', array('id' => $id));
            return $query->row_array();
        }else{
            $query = $this->db->get('pro_user');
            return $query->result_array();
        }
    }

    function getRow(){
        return $this->db->get('pro_user');        
    }
    
    /*
     * Insert Members
     */
    public function insert($data = array()) {
        $insert = $this->db->insert('pro_user', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    /*
     * Update Members
     */
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('pro_user', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete Members
     */
    public function delete($id){
        $delete = $this->db->delete('pro_user',array('id'=>$id));
        return $delete?true:false;
    }

}

/* End of file Member.php */
/* Location: ./application/models/Member.php */