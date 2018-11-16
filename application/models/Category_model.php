<?php
defined("BASEPATH") or exit("No script access records");

/**
 * Author: Shubham Sahu
 */
class Category_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function catListing()
	{
		return $this->db->get('loan_category')->result();
	}
	public function catAdd($value)
	{
		return $this->db->insert('loan_category',$value);
	}
	public function catEdit($value)
	{
		return $this->db->get_where('loan_category',array('id'=>$value))->result();
	}
	public function catUpdate($id,$value)
	{
		$this->db->where('id',$id);
		return $this->db->update('loan_category',$value);
	}
	public function catDelete($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('loan_category');
	}
}