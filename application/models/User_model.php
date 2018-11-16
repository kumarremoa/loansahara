<?php
defined('BASEPATH') or exit('No script direct access allowed');
/**
 * Aythor::Shubham Sahu
 */
class User_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
    public function listing()
    {
    	return $this->db->get('loan_users')->result();
    }
   
    public function insert($value)
    {
    	return $this->db->insert('loan_users',$value);
    }
    public function update($id,$value)
    {
    	$this->db->where('id',$id);
    	return $this->db->update('loan_users',$value);
    }
    public function delete($id)
    {
    	$this->db->where('id',$id);
    	return $this->db->delete('loan_users');
    }
    public function edit($id)
    {
        $this->db->where('id',$id);
    	return $this->db->get('loan_users')->result();
    	 
    }
    public function check_mobile($mobile)
    {
       $data= $this->db->get_where('loan_users',array('mobile'=> $mobile,'user_type'=>4))->result();  
       
        if($data)
        {
            return true;
        }
        else{
            return false;
        } 
    }
    public function customer_login($mobile,$password)
    {
       $data= $this->db->get_where('loan_users',array('mobile'=> $mobile,'password'=>$password,'user_type'=>4))->result();  
       
        if($data)
        {
            return $data;
        }
        else{
            return false;
        } 
    }
    public function country()
    {
        return $this->db->get('loan_country')->result();
    }
    public function state()
    {
        return $this->db->get('loan_state')->result();
    }
    public function stateid($id)
    {
         $this->db->where('country_id',$id);
        return $this->db->get('loan_state')->result();
    }
    public function city($id)
    {
        $this->db->where('state_id',$id);
        return $this->db->get('loan_city')->result();
    }
    public function ipInsert($data)
    {
        return $this->db->insert('loan_user_login', $data);
    }
    public function information($data)
    {
         $this->db->order_by("id","desc");
        return $this->db->get_where('loan_information', array('mobile'=>$data,'user_type'=>4,))->result();
    }
    public function totalkist($data)
    {
         $this->db->order_by("id","desc");
        return $this->db->get_where('loan_information', array('id'=>$data,))->result();
    }
    public function profile_status($data)
    {
         return $this->db->query('select profile_status from loan_users where mobile="'.$data.'"')->result();
    }
    public function loanlist()
    {
        return $this->db->get('loan_information')->result();
    }
    public function loandetails($data)
    {
         //$this->db->order_by("id","desc");
        return $this->db->get_where('loan_information', array('id'=>$data,))->result();
    }
    public function cus_care()
    {
        return $this->db->get_where('loan_users',array('user_type'=>'2'))->result();
    }
    public function Emi($id)
    {
        return $this->db->get_where('loan_appoved',array('information_id'=>$id))->result();
    }
    public function get_forget($value)
    {
       return $this->db->get_where('loan_users',array('mobile'=>$value))->result(); 
    }
    public function forgetPassword($value,$password)
    {
        $this->db->where('mobile', $value);
       return $this->db->update('loan_users', $password); 
    }
}