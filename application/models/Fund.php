<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fund extends CI_Model {

	function fundAdd($data=array()){

		if($data['uid'] != 1){

		$id = $data['senderId'];
		$amount['balance'] = $data['senderbalance'] - $data['amount'];		
		$amount['modified_date'] = date('Y-m-d H:i:s');		
		$updatea = $this->db->update('loan_users', $amount, array('id'=>$id));
		$trans['user_id'] = $id;
		$trans['trans_id'] = 'FT-'.rand(10000,99999);
		$trans['amount'] = $data['amount'];
		$trans['pay_type'] = 'Debit';
		$trans['narration'] = 'Fund Transfer of '.inr($data['amount']).' to User ID'.$data['reciverId'];
		$trans['created_date'] = date('Y-m-d H:i:s');
		$trans['trans_type'] = 'Fund Transfer';
		$trans['status'] = '1';
		$insert = $this->db->insert('loan_transaction', $trans);
		
		}else {

		if ($data['senderbalance'] < $data['amount'] ){
		$xbalance = $data['amount'] - $data['senderbalance'];
		$id = $data['senderId'];
		$amount['balance'] = 0;		
		$amount['modified_date'] = date('Y-m-d H:i:s');		
		$updatea = $this->db->update('loan_users', $amount, array('id'=>$id));
		$id = $data['senderId'];
		$trans['trans_id'] = 'ADMIN-'.rand(10000,99999);
		$trans['amount'] = $xbalance;
		$trans['pay_type'] = 'Debit';
		$trans['narration'] = 'Admin Added Fund of '.inr($data['amount']).' to User ID'.$data['reciverId'];
		$trans['created_date'] = date('Y-m-d H:i:s');
		$trans['trans_type'] = 'Admin Fund';
		$trans['status'] = '1';
		$insert = $this->db->insert('loan_transaction', $trans);
		}else {
			$id = $data['senderId'];
			$amount['balance'] =  $data['senderbalance'] - $data['amount'];		
			$amount['modified_date'] = date('Y-m-d H:i:s');		
			$updatea = $this->db->update('loan_users', $amount, array('id'=>$id));
			$id = $data['senderId'];
			$trans['trans_id'] = 'ADMIN-'.rand(10000,99999);
			$trans['amount'] = $data['amount'];	
			$trans['pay_type'] = 'Debit';
			$trans['narration'] = 'Admin Transfred Fund of '.inr($data['amount']).' to User ID'.$data['reciverId'];
			$trans['created_date'] = date('Y-m-d H:i:s');
			$trans['trans_type'] = 'Admin Fund';
			$trans['status'] = '1';
			$insert = $this->db->insert('loan_transaction', $trans);
		}

		
		
		}

		$trans1['user_id'] = $data['reciverId'];
		$trans1['trans_id'] = "A-".$trans['trans_id'];
		$trans1['amount'] = $data['amount'];
		$trans1['pay_type'] = 'Credit';
		$trans1['narration'] = 'Fund Recived of ₹ '.$data['amount'].' from Admin';
		$trans1['created_date'] = date('Y-m-d H:i:s');
		$trans1['trans_type'] = 'Fund Transfer';
		$trans1['status'] = '1';
		$insert = $this->db->insert('loan_transaction', $trans1);
		$this->db->select('*');
		$this->db->from('loan_users');
    	$this->db->where('id', $trans1['user_id']);
    	$query = $this->db->get();
    	$bala = $query->result_array();
    	//print_r($bala[0]['balance']);die;
		$balaw['balance'] = $bala[0]['balance'] + $data['amount'];	
		$balaw['modified_date'] = date('Y-m-d H:i:s');	
		$updateb = $this->db->update('loan_users', $balaw, array('id'=>$trans1['user_id']));
		if($updatea == 1 && $updateb ==1){return true;}else{return false;}
	}

	function fundDeduct($data){
		$id = $data['senderId'];
		$amount['balance'] = $data['senderbalance'] + $data['amount'];		
		
		$trans['user_id'] = $id;
		$trans['trans_id'] = 'FT-'.rand(10000,99999);
		$trans['amount'] = $data['amount'];
		$trans['pay_type'] = 'Credit';
		$trans['narration'] = 'Fund Recived of '.inr($data['amount']).' to User ID'.$data['reciverId'];
		$trans['created_date'] = date('Y-m-d H:i:s');
		$trans['trans_type'] = 'Fund Transfer';
		$trans['status'] = '1';
		

		$trans1['user_id'] = $data['reciverId'];
		$trans1['trans_id'] = "R-".$trans['trans_id'];
		$trans1['amount'] = $data['amount'];
		$trans1['pay_type'] = 'Debit';
		$trans1['narration'] = 'Fund Pulled Back of '.inr($data['amount']).' from User ID'.$id;
		$trans1['created_date'] = date('Y-m-d H:i:s');
		$trans1['trans_type'] = 'Fund Transfer';
		$trans1['status'] = '1';
		
		$this->db->select('*');
		$this->db->from('loan_users');
    	$this->db->where('id', $trans1['user_id']);
    	$query = $this->db->get();
    	$bala = $query->result_array();
    	//print_r($bala[0]['balance']);die;
    	if($bala[0]['balance'] != 0 && $bala[0]['balance'] >= $data['amount'] ){
    	$updatea = $this->db->update('loan_users', $amount, array('id'=>$id));
    	$insert = $this->db->insert('loan_transaction', $trans1);
    	$insert = $this->db->insert('loan_transaction', $trans);
		$balaw['balance'] = $bala[0]['balance'] - $data['amount'];		
		$updateb = $this->db->update('loan_users', $balaw, array('id'=>$trans1['user_id']));
		if($updatea == 1 || $updateb ==1){return true;}else{return false;}}else {
		return false;
		}
	}

}

/* End of file Fund.php */
/* Location: ./application/models/Fund.php */