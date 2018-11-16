<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Shubham Sahu
 */
class Enquairy extends CI_Model
{
   	public $loan="loan_information";

    public function __construct()
    {
        parent::__construct();
    }
    public function apply($value)
    {
    	return $this->db->insert($this->loan,$value);
    }
    public function contact_us($value)
    {
    	return $this->db->insert('loan_contact',$value);
    }
    public function contact_total()
    {
        return count($this->db->get_where('loan_contact',array('comment_status'=>0))->result());
    }
    public function contact_title()
    {
        $this->db->order_by('id','DESC');
        return $this->db->get_where('loan_contact',array('comment_status'=>0))->result();
    }
    public function updateed()
    {
        return $this->db->update('loan_contact',array('comment_status'=>1));
    }
    public function contact_show()
    {
        $this->db->order_by('id','DESC');
        return $this->db->get_where('loan_contact',array('comment_status'=>1))->result();
    }
}
