<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recharge extends CI_Model {

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
		$trans['narration'] = 'Mobile Recharge of ₹ '.$amount.' to Number '.$mobile;
		$trans['created_date'] = date('Y-m-d H:i:s');
		$trans['trans_type'] = 'Recharge';
		$trans['status'] = '1';
    	$insert = $this->db->insert('loan_transaction', $trans);

		$updatea = $this->db->update('loan_users', $balaw, array('id'=>$userid));
		if($updatea == 1){return $trans['trans_id'];}else{return false;}
	}

	function reduceFundElectric($userid, $amount, $cid, $tid){

		$this->db->select('*');
		$this->db->from('loan_users');
    	$this->db->where('id', $userid);
    	$query = $this->db->get();
    	$bala = $query->result_array();
    	$balaw['balance'] = $bala[0]['balance'] - $amount;    	
    	$balaw['modified_date'] = date('Y-m-d H:i:s');	
    	
    	$trans['user_id'] = $userid;
		$trans['trans_id'] = 'EBP-'.rand(10000,99999);
		$trans['amount'] = $amount;
		$trans['pay_type'] = 'Debit';
		$trans['narration'] = 'Bill Payment of Electricity Bill of ₹ '.$amount.' to BBPS Ref. No. '.$cid.' Transaction ID'.$tid;
		$trans['created_date'] = date('Y-m-d H:i:s');
		$trans['trans_type'] = 'Bill Payment';
		$trans['status'] = '1';
    	$insert = $this->db->insert('loan_transaction', $trans);

		$updatea = $this->db->update('loan_users', $balaw, array('id'=>$userid));
		if($updatea == 1){return true;}else{return false;}
	}

	function reduceFundGas($userid, $amount, $cid, $tid){

		$this->db->select('*');
		$this->db->from('loan_users');
    	$this->db->where('id', $userid);
    	$query = $this->db->get();
    	$bala = $query->result_array();
    	$balaw['balance'] = $bala[0]['balance'] - $amount;    	
    	$balaw['modified_date'] = date('Y-m-d H:i:s');	
    	
    	$trans['user_id'] = $userid;
		$trans['trans_id'] = 'GBP-'.rand(10000,99999);
		$trans['amount'] = $amount;
		$trans['pay_type'] = 'Debit';
		$trans['narration'] = 'Bill Payment of Gas Bill of ₹ '.$amount.' to BBPS Ref. No. '.$cid.' Transaction ID'.$tid;
		$trans['created_date'] = date('Y-m-d H:i:s');
		$trans['trans_type'] = 'Bill Payment';
		$trans['status'] = '1';
    	$insert = $this->db->insert('loan_transaction', $trans);

		$updatea = $this->db->update('loan_users', $balaw, array('id'=>$userid));
		if($updatea == 1){return true;}else{return false;}
	}

	function reduceFundWater($userid, $amount, $cid, $tid){

		$this->db->select('*');
		$this->db->from('loan_users');
    	$this->db->where('id', $userid);
    	$query = $this->db->get();
    	$bala = $query->result_array();
    	$balaw['balance'] = $bala[0]['balance'] - $amount;    	
    	$balaw['modified_date'] = date('Y-m-d H:i:s');	
    	
    	$trans['user_id'] = $userid;
		$trans['trans_id'] = 'WBP-'.rand(10000,99999);
		$trans['amount'] = $amount;
		$trans['pay_type'] = 'Debit';
		$trans['narration'] = 'Bill Payment of Water Bill of ₹ '.$amount.' to BBPS Ref. No. '.$cid.' Transaction ID'.$tid;
		$trans['created_date'] = date('Y-m-d H:i:s');
		$trans['trans_type'] = 'Bill Payment';
		$trans['status'] = '1';
    	$insert = $this->db->insert('loan_transaction', $trans);

		$updatea = $this->db->update('loan_users', $balaw, array('id'=>$userid));
		if($updatea == 1){return true;}else{return false;}
	}
	
	function reducepostFund($userid, $amount, $mobile){

		$this->db->select('*');
		$this->db->from('loan_users');
    	$this->db->where('id', $userid);
    	$query = $this->db->get();
    	$bala = $query->result_array();
    	$balaw['balance'] = $bala[0]['balance'] - $amount;    	
    	$balaw['modified_date'] = date('Y-m-d H:i:s');	
    	
    	$trans['user_id'] = $userid;
		$trans['trans_id'] = 'PR-'.rand(10000,99999);
		$trans['amount'] = $amount;
		$trans['pay_type'] = 'Debit';
		$trans['narration'] = 'Mobile Bill Payment of ₹ '.$amount.' to Number '.$mobile;
		$trans['created_date'] = date('Y-m-d H:i:s');
		$trans['trans_type'] = 'Bill Payment';
		$trans['status'] = '1';
    	$insert = $this->db->insert('loan_transaction', $trans);

		$updatea = $this->db->update('loan_users', $balaw, array('id'=>$userid));
		if($updatea == 1){return true;}else{return false;}
	}

	function reducedthFund($userid, $amount, $mobile){

		$this->db->select('*');
		$this->db->from('loan_users');
    	$this->db->where('id', $userid);
    	$query = $this->db->get();
    	$bala = $query->result_array();
    	$balaw['balance'] = $bala[0]['balance'] - $amount;    	
    	$balaw['modified_date'] = date('Y-m-d H:i:s');	
    	
    	$trans['user_id'] = $userid;
		$trans['trans_id'] = 'DT-'.rand(10000,99999);
		$trans['amount'] = $amount;
		$trans['pay_type'] = 'Debit';
		$trans['narration'] = 'DTH Recharge of ₹ '.$amount.' to Number '.$mobile;
		$trans['created_date'] = date('Y-m-d H:i:s');
		$trans['trans_type'] = 'Recharge';
		$trans['status'] = '1';
    	$insert = $this->db->insert('loan_transaction', $trans);

		$updatea = $this->db->update('loan_users', $balaw, array('id'=>$userid));
		if($updatea == 1){return true;}else{return false;}
	}

	function reducelandlineFund($userid, $amount, $landline_no){

		$this->db->select('*');
		$this->db->from('loan_users');
    	$this->db->where('id', $userid);
    	$query = $this->db->get();
    	$bala = $query->result_array();
    	$balaw['balance'] = $bala[0]['balance'] - $amount;    	
    	$balaw['modified_date'] = date('Y-m-d H:i:s');	
    	
    	$trans['user_id'] = $userid;
		$trans['trans_id'] = 'LL-'.rand(10000,99999);
		$trans['amount'] = $amount;
		$trans['pay_type'] = 'Debit';
		$trans['narration'] = 'Landline Bill Payment of ₹ '.$amount.' to Number '.$landline_no;
		$trans['created_date'] = date('Y-m-d H:i:s');
		$trans['trans_type'] = 'Bill Payment';
		$trans['status'] = '1';
    	$insert = $this->db->insert('loan_transaction', $trans);

		$updatea = $this->db->update('loan_users', $balaw, array('id'=>$userid));
		if($updatea == 1){return true;}else{return false;}
	}

	function getcommissionAmount($slab='', $uid='', $oid=''){

		$this->db->select('*');
		$this->db->from('loan_commissions');
    	$this->db->where('operator_id', $oid);
    	$this->db->where('user_id', $uid);
    	$this->db->where('status', "1");
    	$query = $this->db->get();
    	$count = $query->num_rows();
    	$bala = $query->result_array();    	
    	if($count == 0){
    		$dar['amt'] = '0';
	    	$dar['type'] = '0';
	    	$dar['deduction'] = '0';
    			
    	}else{   	 
	    	$dar['amt'] = $bala[0][$slab];
	    	$dar['type'] = $bala[0]['type'];
	    	$dar['deduction'] = $bala[0]['surcharge'];
	    	
    	} 
    	return $dar;   	
	}

	function commissionSetter($comm, $amt, $uid, $txnid, $ttd){
		$commission = $comm['deduction'];
		$rate = $comm['amt'];
		$type = $comm['type'];
		$this->db->select('*');
		$this->db->from('loan_users');
    	$this->db->where('id', $uid);
    	$query = $this->db->get();
    	$bala = $query->result_array();

		if($commission == 'commission'){
			if($type == 'flat'){
				
				$trans['user_id'] = $uid;
				$trans['trans_id'] = 'COM-'.rand(10000,99999);
				$trans['amount'] = $rate;
				$trans['created_date'] = date('Y-m-d H:i:s');
				$trans['trans_type'] = 'Commission';
				$trans['status'] = '1';

				if($amt < 0){
				$trans['pay_type'] = 'Debit';
				$trans['narration'] = 'Commisssion of ₹ '.$rate.' With Referance to Transaction ID: '.$txnid.' and TID:'.$ttd;
				}else {
				$trans['pay_type'] = 'Credit';
				$trans['narration'] = 'Commisssion of ₹ '.$rate.' With Referance to transaction ID: '.$txnid.' and TID:'.$ttd;
				}			
				
		    	$insert = $this->db->insert('loan_transaction', $trans);

		    	if($insert  && $amt < 0 ){
		    		
		    		$balaw['balance'] = $bala[0]['balance'] - $rate;    	
    				$balaw['modified_date'] = date('Y-m-d H:i:s');	
    				$updatea = $this->db->update('loan_users', $balaw, array('id'=>$uid));

		    	}else{
		    		
		    		$balaw['balance'] = $bala[0]['balance'] + $rate;    	
    				$balaw['modified_date'] = date('Y-m-d H:i:s');	
    				$updatea = $this->db->update('loan_users', $balaw, array('id'=>$uid));

		    	}

		    	return $updatea;
			}else{

				$income = ($rate / 100) * $amt;
				$trans['user_id'] = $uid;
				$trans['trans_id'] = 'COM-'.rand(10000,99999);
				$trans['amount'] = $income;
				$trans['created_date'] = date('Y-m-d H:i:s');
				$trans['trans_type'] = 'Commission';
				$trans['status'] = '1';

				if($amt < 0){
				$trans['pay_type'] = 'Debit';
				$trans['narration'] = 'Commisssion of ₹ '.$income.' With Referance to transaction ID: '.$txnid.' and TID:'.$ttd;
				}else {
				$trans['pay_type'] = 'Credit';
				$trans['narration'] = 'Commisssion of ₹ '.$income.' With Referance to transaction ID: '.$txnid.' and TID:'.$ttd;
				}			
				
		    	$insert = $this->db->insert('loan_transaction', $trans);

		    	if($insert  && $amt < 0 ){
		    		
		    		$balaw['balance'] = $bala[0]['balance'] - $income;    	
    				$balaw['modified_date'] = date('Y-m-d H:i:s');	
    				$updatea = $this->db->update('loan_users', $balaw, array('id'=>$uid));

		    	}else{
		    		
		    		$balaw['balance'] = $bala[0]['balance'] + $income;    	
    				$balaw['modified_date'] = date('Y-m-d H:i:s');	
    				$updatea = $this->db->update('loan_users', $balaw, array('id'=>$uid));

		    	}
		    	return $updatea;

			}
		}else{

			if($type == 'flat'){
				$trans['user_id'] = $uid;
				$trans['trans_id'] = 'SUR-'.rand(10000,99999);
				$trans['amount'] = $rate;
				$trans['created_date'] = date('Y-m-d H:i:s');
				$trans['trans_type'] = 'Surcharge';
				$trans['status'] = '1';

				$trans['pay_type'] = 'Debit';
				$trans['narration'] = 'Surcharge of ₹ '.$rate.' With Referance to transaction ID: '.$txnid.' and TID:'.$ttd;
						
				$insert = $this->db->insert('loan_transaction', $trans);

		    	if($insert){
		    		
		    		$balaw['balance'] = $bala[0]['balance'] - $rate;    	
    				$balaw['modified_date'] = date('Y-m-d H:i:s');	
    				$updatea = $this->db->update('loan_users', $balaw, array('id'=>$uid));

		    	}

		    	return $updatea;

			}else{

				$income = ($rate / 100) * $amt;
				$trans['user_id'] = $uid;
				$trans['trans_id'] = 'SUR-'.rand(10000,99999);
				$trans['amount'] = $income;
				$trans['created_date'] = date('Y-m-d H:i:s');
				$trans['trans_type'] = 'Surcharge';
				$trans['status'] = '1';

				$trans['pay_type'] = 'Debit';
				$trans['narration'] = 'Surcharge of ₹ '.$income.' With Referance to transaction ID: '.$txnid.' and TID:'.$ttd;
				
		    	$insert = $this->db->insert('loan_transaction', $trans);
	
	    		$balaw['balance'] = $bala[0]['balance'] - $income;    	
				$balaw['modified_date'] = date('Y-m-d H:i:s');	
				$updatea = $this->db->update('loan_users', $balaw, array('id'=>$uid));

				return $updatea;

			}

		}

	}

}

/* End of file Recharge.php */