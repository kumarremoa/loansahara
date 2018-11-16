<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
 	}

 	public function chkmobilebyusertype($mobile,$type)
 	{
 		$this->db->select('*');
		$this->db->from('pro_user');
		$this->db->where('mobile', $mobile);
		$this->db->where('user_group', $type);
		$query = $this->db->get();
		$data=$query->result();

		return $data;
 	}

 	public function chkmobile($mobile)
 	{
 		$this->db->select('*');
		$this->db->from('pro_user');
		$this->db->where('mobile', $mobile);
		$query = $this->db->get();
		$data=$query->result();

		return $data;
 	}

 	public function registeruser($name,$email,$password,$mobile,$user_type,$otp)
	{
		$date=date('Y-m-d h:i:s');
			$data=array(
				'name'=>$name,
				'email'=>$email,
				'password'=>md5($password),
				'mobile'=>$mobile,
				"user_group"=>$user_type,
				"created_date"=>$date,
				"otp"=>$otp
				);
			$this->db->insert('pro_user',$data);
			$data=$this->db->insert_id();
			return $data;
	}

	public function updateotp($mobile,$otp)
	{
		$this->db->set('otp', $otp);
		$this->db->where('mobile', $mobile);
		$data=$this->db->update('pro_user');

 		return $data;
	}

 	public function chkmobileandotp($mobile,$otp)
 	{
 		$this->db->select('*');
		$this->db->from('pro_user');
		$this->db->where('mobile', $mobile);
		$this->db->where('otp', $otp);
		$query = $this->db->get();
		$data=$query->result();

		return $data;
 	}

 	public function getdetailuserdetail($mobile)
 	{
 		$this->db->select('*');
		$this->db->from('pro_user');
		$this->db->where('mobile', $mobile);
		$query = $this->db->get();
		$data=$query->result();

		return $data;
 	}

 	public function postrequest($mobile,$name,$email,$datetime,$lat,$lng,$userid,$address)
 	{
 		$date=date('Y-m-d h:i:s');
			$data=array(
				'name'=>$name,
				'email'=>$email,
				'address'=>$address,
				'mobile'=>$mobile,
				"lat"=>$lat,
				"lng"=>$lng,
				"created_date"=>$date,
				"dt"=>$datetime,
				"customer_id"=>$userid,
				"status"=>"1"
				);
		$this->db->insert('pro_query',$data);
		$data=$this->db->insert_id();
		return $data;

		
 	}

 	public function requestaccept($request_id,$haw_id)
 	{
 		$date=date('Y-m-d h:i:s');
 		$this->db->set('hawker_id', $haw_id);
 		$this->db->set('status',"2");
 		$this->db->set('modified_date',$date);
		$this->db->where('id', $request_id);
		$data=$this->db->update('pro_query');

 		return $data;
 	}

 	public function profileupdate($name,$email,$adhar,$dob,$address1,$address2,$state,$city,$pincode,$userid)
 	{
 		$this->db->set('name', $name);
 		$this->db->set('email',$email);
 		$this->db->set('aadhar',$adhar);
 		$this->db->set('dob',$dob);
 		$this->db->set('address',$address1);
 		$this->db->set('address1',$address2);
 		$this->db->set('state',$state);
 		$this->db->set('city',$city);
 		$this->db->set('pincode',$pincode);
		$this->db->where('id', $userid);
		$data=$this->db->update('pro_user');

 		return $data;
 	}

 	public function getbalance($id)
 	{
 		$this->db->select('balance');
		$this->db->from('pro_user');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$data=$query->result();

		return $data;
 	}

 	/*

 	public function registeruser($name,$email,$password,$mobile,$user_type,$otp)
	{
		$date=date('Y-m-d h:i:s');
			$data=array(
				'name'=>$name,
				'email'=>$email,
				'password'=>md5($password),
				'mobile'=>$mobile,
				"user_group"=>$user_type,
				"created_date"=>$date,
				"otp"=>$otp
				);
			$this->db->insert('pro_user',$data);
			$data=$this->db->insert_id();
			return $data;
	}*/
}