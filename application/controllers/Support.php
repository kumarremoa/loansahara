<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Shubham Sahu
 */
class Support extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
        $this->load->model(array('Category_model','Support_model','Message_model'));
        $this->load->model('Customer_model');
        $this->load->helper('url');
        $this->load->library(array('upload'));

	}
	public function index()
	{
		$data = array();
        if(!$this->session->userdata('isUserLoggedIn')){
            redirect('login');
        }
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        $det['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        $data['name']=$det['user']['name']; 
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        $data['customers']=$this->Support_model->customerDetails();
        $data['admins']=$this->Support_model->adminDetails();
        $data['supports']=$this->Support_model->supportDetails();
        $data['agents']=$this->Support_model->agentDetails();
        $data['message']=$this->Support_model->message();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('customersupport/list', $data);
        $this->load->view('templates/footer', $data);
	}
    public function selectId()
    {
       $id=$this->input->post('customer_id');
       $chat=$this->input->post('chat_id');
       $data['id']= $this->Support_model->customerEdit($id);
       $data['details']= $this->Support_model->messageDetails($id,$chat);
       echo json_encode($data);
       //echo json_encode($data);

    }
    public function message()
    {
        $data=[
          'message'=> $this->input->post('message'),
          'send_name'=> $this->input->post('name'),
          'user_id'=> $this->input->post('user_id'),
          //'image'=> $image,
           ];
       $msg=$this->db->insert('loan_message',$data);
       if($msg)
       {
        echo 'Success';
       }
       else{
        echo 'invalid';
       }
    }
    public function response($ticket,$mobile)
    {
      $data = array();
        if(!$this->session->userdata('isUserLoggedIn')){
            redirect('login');
        }
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        $det['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        $data['name']=$det['user']['name']; 
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        $data['ticket']=$ticket;
        $data['message']=$this->Support_model->ticket($ticket);
        $data['customers']=$this->Support_model->customerDetail($mobile);
        //print_r($data['customers']); die;
        //$data['message']=$this->Support_model->message();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('customersupport/chat', $data);
        $this->load->view('templates/footer', $data);

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
    public function details()
    {
      $ticket=$this->input->post('param');
      $id=$this->input->post('id');
      $data=$this->Message_model->message_details($ticket);
      foreach($data as $value)
      {
        if($value->user_id==$id){
        echo '<div class="chat darker" style="color:red">
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
}