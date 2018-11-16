<?php
defined("BASEPATH") or exit('No script direct access allowed!');
/**
 * Author:SHubham Sahu
 */
class Customercare extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		is_login();
        $this->load->library('form_validation');
        $this->load->model('user');
        $this->load->model('agent');       
        $this->load->model('listall');       
        $this->load->model('fund');
        $this->load->model('Customer_model');
         $this->load->model('User_model');
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
		$data['customers']= $this->User_model->cus_care();
		
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('customerscare/list', $data);
        $this->load->view('templates/footer', $data);
	}
}