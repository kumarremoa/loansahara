<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Themecategory extends CI_Controller {

	function __construct() {
        parent::__construct();

        is_login();
        $this->load->model('ThemecategoryModel');      
        $this->load->model('user');      
        $this->load->model('fund');      
        
    }

	public function category()
	{
		$data = array();
        $postData = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        
        if(!CheckPermission(THEMECAT, "own_read")){
	        $this->session->set_userdata('error_msg', 'You are not authorized to access the page..!');
	        redirect('dashboard');
        }

       //get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('themecategory/category', array());
        $this->load->view('templates/footer', $data);
	}

	function get_cat_tables()
	{
		$draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        
        $rows = $this->ThemecategoryModel->getCategoryRow();  
        
        $mem = array();  
        foreach($rows->result() as $r) {   
		        if(CheckPermission(THEMECAT, "own_update")){        
		        $mman = '<a href="themecategory/cat_add/'.$r->id.'" data-toggle="tooltip" title="Edit" class="glyphicon glyphicon-edit" style="padding-right:5px;"></a> ';
		        }else {
		         $mman = '';
		        }
		        if(CheckPermission(THEMECAT, "own_delete")){    
		        $mman1 = '<a href="themecategory/delete/'.$r->id.'" data-toggle="tooltip" title="Delete"  class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete?\')" ></a>';
		        }else {
		         $mman1 = '';
		        }
		 $mem[] = array(
                    $r->id,
                    $r->cat_name,
                    $r->status,
                    $mman . $mman1
               );     
        }

           

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $rows->num_rows(),
            "recordsFiltered" => $rows->num_rows(),
            "data" => $mem
        );

        echo json_encode($output);
        exit();
	}

	public function cat_add()
	{

		$data = array();
        $postData = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        // Validate User Auth.        
        if(!CheckPermission(THEMECAT, "own_create")){
	        $this->session->set_userdata('error_msg', 'You are not authorized to access the page..!');
	        redirect('dashboard');
        }
       //get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }

        $cat_id=$this->uri->segment('3');
        //print_r($cat_id);die;

        $cat_req=$this->ThemecategoryModel->getCategoryRowById($cat_id);

        $data['post']=$cat_req[0];

        

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('themecategory/addcategory', array());
        $this->load->view('templates/footer', $data);
	}
}