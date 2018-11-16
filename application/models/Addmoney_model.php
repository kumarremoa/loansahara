<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Addmoney_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
 	}

 	public function addtransaction($data)
 	{
 		$this->db->insert('loan_transaction',$data);
		$data=$this->db->insert_id();
		return $data;
 	}

 	public function updatebalance($user_id,$amount)
 	{
    	$query = $this->db->query("update loan_users set balance=balance+$amount where id='$user_id'");		
		return $query;	
 	}

 	public function updatebalancededuct($user_id,$amount)
 	{
    	$query = $this->db->query("update loan_users set balance=balance-$amount where id='$user_id'");		
		return $query;	
 	}

 	public function updatetransaction($pay_type,$trans_id,$user_id,$status,$narration)
 	{
 		$this->db->where('user_id', $user_id);
 		$this->db->where('trans_id', $trans_id);

 		$data=array(
 			"pay_type"=>$pay_type,
 			"status"=>$status,
 			"narration"=>$narration
 			);
    	$data=$this->db->update("loan_transaction", $data);
    	return $data;	
 	}

 	public function getproviderdetailbyid($id)
 	{
 		$this->db->select('name');
		$this->db->from('loan_operator_names');
		$this->db->where('id', $id);
		$query = $this->db->get(); 
		$data=$query->result();

		return $data;
 	}

 	public function electricitystate($id)
 	{
 		$this->db->select('*');
		$this->db->from('loan_operator_city');
		$this->db->where('opertor_id', $id);
		$query = $this->db->get(); 
		$data=$query->result();

		return $data;
 	}

 	public function electricityvalidator($state)
 	{
 		$this->db->select('*');
		$this->db->from('loan_operator_city');
		$this->db->where('id', $state);
		$query = $this->db->get(); 
		$data=$query->result();

		return $data;
 	}

}