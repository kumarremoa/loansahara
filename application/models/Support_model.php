<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function customerDetails()
	{
		return $this->db->get_where('loan_users',array('user_type'=>4))->result();
	}
	public function adminDetails()
	{
		return $this->db->get_where('loan_users',array('user_type'=>1))->result();
	}
	public function supportDetails()
	{
		return $this->db->get_where('loan_users',array('user_type'=>5))->result();
	}
	public function agentDetails()
	{
		return $this->db->get_where('loan_users',array('user_type'=>3))->result();
	}
	public function customerEdit($value)
	{
		return $this->db->get_where('loan_users',array('id'=>$value))->result();
	}
	public function messageDetails($id,$chat)
	{
		return $this->db->select('*')
     ->from('loan_users as t1')
     ->where('t1.id', $id)
     ->join('loan_message as t2', 't1.id = t2.user_id', 'LEFT')
     ->get();
		//$this->db->query('select * from loan_message where send_name="$chat" AND user_id="$id"')->result();
	}
	public function message()
	{
		$this->db->order_by('status','0');
		return $this->db->get('loan_message_query')->result();
	}
	public function ticket($value)
	{
		$this->db->where('tkt_id',$value);
		$this->db->update('loan_message_query',array('status'=>1));
		return $this->db->get_where('loan_message_query',array('tkt_id'=>$value))->result();
	}
	public function customerDetail($mobile)
	{
		return $this->db->get_where('loan_users',array('mobile'=>$mobile))->result();
	}
}
