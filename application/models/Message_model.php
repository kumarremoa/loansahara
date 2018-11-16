<?php
defined("BASEPATH") OR exit("no direct script assecc allowed");
/**
 * Author:Shubham sahu
 */
class Message_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function listing($value)
	{
		return $this->db->get_where('loan_message_query',array('tkt_id'=>$value))->result();
	}
	public function agent_data($value)
	{
		return $this->db->get_where('loan_users',array('mobile'=>$value))->result();
	}
	public function message_details($value)
	{
		$this->db->order_by('date_time','ASC');
		return $this->db->get_where('loan_message',array('tkt_id'=>$value))->result();
	}
}