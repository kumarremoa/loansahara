<?php
defined("BASEPATH") OR exit('no direct script allowed access');
/**
 * Author: Shubham Sahu
 */
class Response extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
       $this->load->library('session');
       $this->load->model(array('Listall','User_model','Customer_model'));
       $this->load->helper('url','form');
       $this->load->model('Message_model');
       if($this->session->userdata('login_in') !=true)
	    {
	      redirect(base_url().'customer-logout');
	    }
	}
	public function listing($ticket,$id)
	{
		$data['ticket']=$ticket;
		
		$getVal=$this->Message_model->agent_data($id);
		$data['agent']=$getVal[0]->id;
		$data['response']=$this->Message_model->listing($ticket);
		$this->load->view('front/response-query',$data);
	}
	public function details()
	{
		$ticket=$this->input->post('param');
		$data=$this->Message_model->message_details($ticket);
		foreach($data as $value)
		{
			if($value->user_id==$this->session->userdata('id')){
			echo '<div class="chat darker">
            <img src="'.base_url().'fronts/images/avatar-05.png" alt="Avatar" class="right" style="width:10%;">
            <p>'.$value->message.'</p>
            <span class="time-left">'.$value->date_time.'</span>
          	</div>'; 
          	}else{
          	echo '<div class="chat">
                <img src="'.base_url().'fronts/images/avatar-05.png" alt="Avatar" style="width:10%;">
                <p>'.$value->message.'</p>
                <span class="time-right">'.$value->date_time.'</span>
              </div>';
          }
		}

	}
	public function sendData()
	{
		$data=[
			'user_id'=>$this->input->post('user_id'),
			'message'=>$this->input->post('editor'),
			'tkt_id'=>$this->input->post('ticket_id'),
		];
		$send=$this->db->insert('loan_message',$data);
		if($send){
			echo "Message Send SuccessFull!";
		}
		else{
			echo "Message did not Send! please try again";
		}
	}
}