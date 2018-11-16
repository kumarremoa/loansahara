<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

	/*
     * Get product
     */
    function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('pro_product', array('id' => $id));
            return $query->row_array();
        }else{
            $query = $this->db->get('pro_product');
            return $query->result_array();
        }
    }

    function getRow(){
       // $this->db->where('user_group', 5);
        return $this->db->get('pro_product');        
    }

    /*
     * product insert
     */

    public function insert($data = array()) {
        $insert = $this->db->insert('pro_product', $data);
        print_r($insert);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    /*
     * product update
     */
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('pro_product', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * product Members
     */
    public function delete($id){
        $delete = $this->db->delete('pro_product',array('id'=>$id));
        return $delete?true:false;
    }

}

/* End of file product.php */
/* Location: ./application/models/product.php */