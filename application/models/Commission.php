<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commission extends CI_Model {

	function getRow(){
     
        $this->db->select('loan_operator.*,loan_apis_list.apis_provider_name as api_name,loan_operator_names.name as operator_name,loan_operator_type.name as type_name');
        $this->db->from('loan_operator');
        $this->db->join('loan_apis_list', 'loan_apis_list.id = loan_operator.api_id', 'left');
        $this->db->join('loan_operator_names', 'loan_operator_names.id = loan_operator.operator_name_id', 'left');
        $this->db->join('loan_operator_type', 'loan_operator_type.id = loan_operator.type_id', 'left');
        return $this->db->get();
          
    }

    function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('loan_operator', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

}

/* End of file Commission.php */
/* Location: ./application/models/Commission.php */