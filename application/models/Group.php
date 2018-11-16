<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Model {
	
	/*
     * Get Groups
     */
    function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('pro_user_group', array('id' => $id));
            return $query->row_array();
        }else{
            $query = $this->db->get('pro_user_group');
            return $query->result_array();
        }
    }

    function getRow(){
        return $this->db->get('pro_user_group');        
    }
    
    /*
     * Insert Group
     */
    public function insert($data = array()) {
        $insert = $this->db->insert('pro_user_group', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    /*
     * Update Group
     */
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('pro_user_group', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete Group
     */
    public function delete($id){
        $delete = $this->db->delete('pro_user_group',array('id'=>$id));
        return $delete?true:false;
    }

}

/* End of file Group.php */
/* Location: ./application/models/Group.php */