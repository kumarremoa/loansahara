<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterdistributor extends CI_Model {

	/*
     * Get Masterdistributor Users
     */
    function getRows($id = "", $parent){
        if(!empty($id)){                   
            $query = $this->db->get_where('loan_users', array('id' => $id,'user_type' => 3,'parent_id' =>$parent));
            return $query->row_array();
        }else{
            $this->db->where('user_type', 3);
            $query = $this->db->get('loan_users');
            return $query->result_array();
        }
    }

     function getRowsa($id = ""){
        if(!empty($id)){                   
            $query = $this->db->get_where('loan_users', array('id' => $id,'user_type' => 3));
            return $query->row_array();
        }else{
            $this->db->where('user_type', 3);
            $query = $this->db->get('loan_users');
            return $query->result_array();
        }
    }

    function getRow(){
     
        $this->db->where('user_type', 3);
        $this->db->where('is_deleted', 1);
        $this->db->select('loan_users.*,loan_city.name as city_name');
        $this->db->from('loan_users');
        $this->db->join('loan_city', 'loan_city.id = loan_users.city', 'left');
        return $this->db->get();
          
    }

    function getRowFilter($id){
         
            $this->db->where('parent_id', $id);
            $this->db->where('user_type', 3);
            $this->db->where('is_deleted', 1);
            $this->db->select('loan_users.*,loan_city.name as city_name');
            $this->db->from('loan_users');
            $this->db->join('loan_city', 'loan_city.id = loan_users.city', 'left');
            return $this->db->get();
              
        }

    function getwlUsers($id) {
        
        $wllist = array();
        $this->db->where('parent_id', $id);
        $this->db->where('user_type', 3);
        $this->db->where('is_deleted', 1);
        $query =  $this->db->get('loan_users');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $wllist[] = $row;
            }
        }
        return $wllist;     
    }
    
    /*
     * Insert Masterdistributor User
     */
    public function insert($data = array()) {
        $insert = $this->db->insert('loan_users', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    /*
     * Update Masterdistributor User
     */
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('loan_users', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete Whitelabel User
     */
    public function delete($id){
        $delete = $this->db->delete('loan_users',array('id'=>$id));
        return $delete?true:false;
    }

      /*
     * Delete Whitelabel User (not from table)
     */

    public function deletes($id){
        $data['is_deleted'] = '1';
        $data['status'] = '0';
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('loan_users', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

    function getCity() {
        $citylist = array();
        $query =  $this->db->get('loan_city');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $citylist[] = $row;
            }
        }
        return $citylist;     
    }

    function getState() {
        $citylist = array();
        $query =  $this->db->get('loan_state');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $citylist[] = $row;
            }
        }
        return $citylist;     
    }
    function getCountry() {
        $citylist = array();
        $query =  $this->db->get('loan_country');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $citylist[] = $row;
            }
        }
        return $citylist;     
    }
}

/* End of file masterdistributor.php */
/* Location: ./application/models/masterdistributor.php */