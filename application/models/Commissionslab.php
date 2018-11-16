<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commissionslab extends CI_Model {

	function getRow($id=''){
       
        $this->db->select('loan_operator_names.name as operator_name,loan_operator_type.name as operator_type,loan_operator.id as operator_ids,loan_commissions.*');
        $this->db->from('loan_operator_names');
        $this->db->join('loan_operator', 'loan_operator.operator_name_id = loan_operator_names.id', 'left');     
        $this->db->join('loan_operator_type', 'loan_operator_type.id = loan_operator.type_id', 'left');     
        $this->db->join('loan_commissions', 'loan_commissions.operator_id = loan_operator_names.id AND loan_commissions.user_id = '.$id.'', 'left');  
  
        return $this->db->get();
          
    }

    function update($data, $id) {

        if(!empty($data) && !empty($id)){

            $update = $this->db->update('loan_commissions', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

    function insert($data = array()) {
        $insert = $this->db->insert('loan_commissions', $data);

        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    function getRows($oid,$uid){          
        $query = $this->db->get_where('loan_commissions', array('operator_id' => $oid, 'user_id' => $uid));
        return $query->num_rows();       
       
    }


}

/* End of file Commission.php */
/* Location: ./application/models/Commission.php */