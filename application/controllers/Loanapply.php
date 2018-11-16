<?php
defined("BASEPATH") or exit('No script direct access allowed');
/**
 * author:Shubham Sahu
 */
class Loanapply extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->model(array('user','agent','listall','fund','Customer_model','Support_model','User_model','Enquairy'));
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
        $data['customers']= $this->User_model->loanlist();
        $data['agents']= $this->Customer_model->agentList();
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('loanlist/list', $data);
        $this->load->view('templates/footer', $data);

	}
	public function loanDetail($id)
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
        $data['customers']= $this->User_model->loandetails($id);
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
        $this->load->view('loanlist/details', $data);
        $this->load->view('templates/footer', $data);
	}
	public function emiCheck($id)
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
        $data['customers']= $this->User_model->loandetails($id);
        $data['loan']=$this->User_model->Emi($id);
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
        $this->load->view('loanlist/loan-emi', $data);
        $this->load->view('templates/footer', $data);
	}

}