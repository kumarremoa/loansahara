<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Query extends CI_Model {

	/*
     * Get query
     */
    function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('pro_query', array('id' => $id));
            return $query->row_array();
        }else{
            $query = $this->db->get('pro_query');
            return $query->result_array();
        }
    }

    function getRow(){
       // $this->db->where('user_group', 5);
        return $this->db->get('pro_query');        
    }

    function gethawkerlist() {
    $this->db->where('user_group =', 4);
     $query = $this->db->get('pro_user'); 
    return $query->result_array();    
}
    
    /*
     * query Members
     */
    public function insert($data = array()) {
        $insert = $this->db->insert('pro_query', $data);
        print_r($insert);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    /*
     * query Members
     */
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('pro_query', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * query Members
     */
    public function delete($id){
        $delete = $this->db->delete('pro_query',array('id'=>$id));
        return $delete?true:false;
    }

}

/* End of file query.php */
/* Location: ./application/models/query.php */