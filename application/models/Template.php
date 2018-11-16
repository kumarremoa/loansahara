<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Model {

    function getRows(){  
        return $this->db->get('loan_templates');      
    }

    function getRow($id = ""){
        if(!empty($id)){            
            $query = $this->db->get_where('loan_templates', array('id' => $id));
            return $query->row_array();        
        }
    }

    function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('loan_templates', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }    
}