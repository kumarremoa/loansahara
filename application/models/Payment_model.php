<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Payment_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
 	}


 	public function paymentgateway()
 	{
 		$this->db->select('*');
		$this->db->from('loan_payment_gateway');
		$this->db->order_by("created_on", "desc");
		$query = $this->db->get(); 
		//$data=$query->result();

		return $query;
 	}
 	public function paymentgatewayFilter($id)
 	{
 		$this->db->select('*');
		$this->db->from('loan_payment_gateway');
		$this->db->where('wl_id', $id);
		$this->db->order_by("created_on", "desc");
		$query = $this->db->get(); 
		//$data=$query->result();

		return $query;
 	}

 	public function paymentgatewaydetailbyid($id)
 	{
 		$this->db->select('*');
		$this->db->from('loan_payment_gateway');
		$this->db->where('id', $id);
		$query = $this->db->get(); 
		//$data=$query->result();

		return $query;
 	}
 	
 	public function pending($id)
 	{
 		
		$this->db->where(array('information_id'=> $id,));
		$query = $this->db->get('loan_appoved'); 
		return $data=$query->result();
 	}
 	public function Approvid($id)
 	{
		$this->db->where(array('id'=> $id,));
		$query = $this->db->get('loan_appoved'); 
		return $data=$query->result();
 	}
 	public function payment_online($data)
 	{ 
		return $this->db->insert('online_payment',$data);
 	}
 	public function updateApprovel($id)
 	{ 
 		$this->db->where('id',$id);
		return $this->db->update('loan_appoved',array('pending'=>'1'));
 	}
 	public function startDate()
 	{ 
		return $this->db->query('SELECT created_at FROM `online_payment` ORDER BY `online_payment`.`created_at` ASC LIMIT 1')->result();
 	}
 	public function endDate()
 	{ 
		return $this->db->query('SELECT created_at FROM `online_payment` ORDER BY `online_payment`.`created_at` DESC LIMIT 1')->result();
 	}
 	public function totalData()
 	{ 
		return $this->db->query('SELECT balance FROM `online_payment` ORDER BY `online_payment`.`created_at` ASC')->result();
 	}
 	
 }