<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Moneytransfer extends CI_Model {

	function checkAccountNo($accountno){

        if(!empty($accountno)){
            $query = $this->db->get_where('loan_beneficiary', array('account' => $accountno));
            return $query->row_array();        
   		 }else{
            return false;
        }
   	}

    function addAccountNo($data = array()){    	
    	         
            $insert = $this->db->insert('loan_beneficiary', $data);	        
	        if($insert){
	            return $this->db->insert_id();
	        }else{
	            return false;
	        }
	        
	}
    function bankDetails($bank){
        
        $this->db->like('bank_name', $bank);
        $query = $this->db->get('loan_bank_list');
        return $query->result_array();
        
    }

    function reduceFund($userid, $amount, $mobile){

        $this->db->select('*');
        $this->db->from('loan_users');
        $this->db->where('id', $userid);
        $query = $this->db->get();
        $bala = $query->result_array();
        $balaw['balance'] = $bala[0]['balance'] - $amount;      
        $balaw['modified_date'] = date('Y-m-d H:i:s');  
        
        $trans['user_id'] = $userid;
        $trans['trans_id'] = 'MR-'.rand(10000,99999);
        $trans['amount'] = $amount;
        $trans['pay_type'] = 'Debit';
        $trans['narration'] = 'Money Transfer of ₹ '.$amount.' to Number '.$mobile;
        $trans['created_date'] = date('Y-m-d H:i:s');
        $trans['trans_type'] = 'Money Transfer';
        $trans['status'] = '1';
        $insert = $this->db->insert('loan_transaction', $trans);

        $updatea = $this->db->update('loan_users', $balaw, array('id'=>$userid));
        if($updatea == 1){return true;}else{return false;}
    }
    


}

/* End of file Moneytransfer.php */
/* Location: ./application/models/Moneytransfer.php */