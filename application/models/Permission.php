<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends CI_Model {
	
	/*
     * Get Groups
     */
    function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('pro_permissions', array('id' => $id));
            return $query->row_array();
        }else{
            $query = $this->db->get('pro_permissions');
            return $query->result_array();
        }
    }

    function getRow(){
        return $this->db->get('pro_permissions');        
    }

    function getAllGroups() { 
        $query = $this->db->query('SELECT id,name FROM pro_user_group');
        return $query->result();
    }
    function getAllpType() { 
        $query = $this->db->query('SELECT id,name FROM pro_user_permission');
        return $query->result();
    }
    
    /*
     * Insert Group
     */
    public function insert($data = array()) {
        $insert = $this->db->insert('pro_permissions', $data);
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
            $update = $this->db->update('pro_permissions', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete Group
     */
    public function delete($id){
        $delete = $this->db->delete('pro_permissions',array('id'=>$id));
        return $delete?true:false;
    }

}

/* End of file Group.php */
/* Location: ./application/models/Group.php */