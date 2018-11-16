<?php
defined("BASEPATH") or exit("script Not access allowed");

/**
 * Author: Shubham Sahu
 */
class Customer extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
        is_login();
        $this->load->library('form_validation');
        $this->load->model('user');
        $this->load->model('agent');       
        $this->load->model('listall');       
        $this->load->model('fund');
        $this->load->model('Customer_model');
        $this->load->model('Enquairy');
	}
	public function index()
	{
		 $data = array();
        $postData = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        // Validate User Auth.        
        if(!CheckPermission('CCUSERS', "own_read")){
        $this->session->set_userdata('error_msg', 'You are not authorized to access the page..!');
        redirect('dashboard');
        }
       //get messages from theprint_r($db); die; session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
		$data['customers']= $this->Customer_model->listing();
        $data['agents']= $this->Customer_model->agentList();
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('customers/list', $data);
        $this->load->view('templates/footer', $data);
	}
    public function agentSelect()
    {
         $agent=$this->input->post('agent_id');
         $customer=$this->input->post('customer_id');
         $data= $this->Customer_model->agentUpdate($agent,$customer);
         if($data==true)
        {
           echo "Agent Selected Successfull";
        }else{
            echo "Please try again!";
        }
    }
    public function customerDetail($id)
    {
         $data = array();
        $postData = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        // Validate User Auth.        
        if(!CheckPermission('CCUSERS', "own_read")){
        $this->session->set_userdata('error_msg', 'You are not authorized to access the page..!');
        redirect('dashboard');
        }
       //get messages from theprint_r($db); die; session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        $data['customers']= $this->Customer_model->customerDetails($id);
        $country=$data['customers'][0]->country;
        $state=$data['customers'][0]->state;
        $city=$data['customers'][0]->city;
        $data['country']= $this->Customer_model->country($country);
        $data['state']= $this->Customer_model->state($state);
        $data['city']= $this->Customer_model->city($city);
        //print_r($data['city']); die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('customers/details', $data);
        $this->load->view('templates/footer', $data);
    }
    public function Delete()
    {
         
         $customer=$this->input->post('customer_id');
         $data= $this->Customer_model->customerDelete($customer);
         if($data==true)
        {
           echo "Customer delete Successfull";
        }else{
            echo "Please try again!<br> Customer did not deleted!";
        }
    }
    public function message()
    {
       $data=$this->Enquairy->contact_total();
       $row=$this->Enquairy->contact_title();
       echo json_encode(array('row'=>$row,'total'=> $data ? $data:'0'));
    }
    public function notification()
    {
       
       $data = array();
        $postData = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        // Validate User Auth.        
        if(!CheckPermission('CCUSERS', "own_read")){
        $this->session->set_userdata('error_msg', 'You are not authorized to access the page..!');
        redirect('dashboard');
        }
       //get messages from theprint_r($db); die; session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        $data['message']=$this->Enquairy->contact_show();
        $this->Enquairy->updateed();
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('customers/notification', $data);
        $this->load->view('templates/footer', $data);
      
    }
    public function cibil()
    {
       
        $data=[
            'gender'=> $this->input->post('gender'),
            'full_name'=> $this->input->post('full_name'),
            'email_id'=> $this->input->post('email_id'),
            'dob'=> $this->input->post('dob'),
            'pan_no'=> $this->input->post('pan_no'),
            'mobile'=> $this->input->post('mobile'),
            'pincode'=> $this->input->post('pincode'),
            'cibil_score'=> $this->input->post('cibil_score'),
            'address'=> $this->input->post('address'),
        ];
        $insert=$this->Customer_model->cibilScore($data);
        if($insert){
            $this->session->set_flashdata('success_msg', 'Cibil Record Store');
             redirect('customer','refresh');
        }
       
        else{
            $this->session->set_flashdata('error_msg', 'Cibil Record is not Stored');
            redirect('customer','refresh');
        }
        
    }
    

}