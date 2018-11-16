<?php 
/*author: Shubham Sahu*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function listing()
	{
		$this->db->where('user_type', 4);
		return $this->db->get('loan_users')->result();
		  
	}
	public function profile_status($id)
	{
		
		return $this->db->get_where('loan_users',array('id'=>$id))->result();
		  
	}
	public function mobile($mob)
	{
		$this->db->where('mobile', $mob);
		return $this->db->get('loan_users')->result();
		  
	}
	public function agentList()
	{
		$this->db->where('user_type', 3);
		return $this->db->get('loan_users')->result();
	}
	public function agentUpdate($agent,$customer)
	{
		$this->db->where('id',$customer);
		$data=$this->db->update('loan_users',array('parent_id'=>$agent));
		if($data==1)
		{
			return true;
		}else{
			return false;
		}
	}
	public function customerDetails($value)
	{
		return $this->db->get_where('loan_users',array('id'=>$value))->result();
	}
	public function country($value)
	{
		 return $this->db->get_where('loan_country',array('id'=>$value))->result();

	}
	public function state($value)
	{
		return $this->db->get_where('loan_state',array('id'=>$value))->result();
	}
	public function city($value)
	{
		return $this->db->get_where('loan_city',array('id'=>$value))->result();
	}
	public function customerDelete($value)
	{
		$this->db->where('id',$value);
		$data= $this->db->delete('loan_users');
		if($data==1)
		{
			return true;
		}else{
			return false;
		}
	}
	public function sendMessage($value)
	{
		return $this->db->get_where('loan_message_query',array('user_id'=>$value))->result();
	}
	public function loaninformation()
	{
		return $this->db->get('loan_information')->result();
	}
	public function loanid($id)
	{
		return $this->db->get_where('loan_information',array('id'=>$id))->result();
	}
	public function loan($id)
	{
		$this->db->where('id', $id);

		$val= $this->db->update('loan_information', array('parent_id'=>1));

		if($val)
		{
			return true;
		}
		else{
			return false;
		}
	}
	
	public function agentpayment($agent,$customer)
	{
		$this->db->where('id',$customer);
		$data=$this->db->update('loan_information',array('parent_id'=>$agent));
		if($data==1)
		{
			return true;
		}else{
			return false;
		}
	
	}
	public function loaninformations($id)
	{
		return $this->db->get_where('loan_information',array('id'=>$id))->result();
	}
	public function cibilScore($value)
	{
		return $this->db->insert('cibilscore',$value);
	}

}
