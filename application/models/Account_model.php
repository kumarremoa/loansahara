<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function accountDetail($email)
	{
		return $this->db->get_where('loan_account_details',array('account_email'=>$email))->result();
	}
	public function updateDetails($value,$email)
	{
		$this->db->where('account_email',$email);
		return $this->db->update('loan_account_details',$value);
	}
}
