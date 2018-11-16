<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");

class Permissiontypes extends CI_Controller {

	function __construct() {
        parent::__construct();
       
        $this->load->model('user');
        $this->load->model('permissiontype');
    }

    /*
     * Member List
     */

    public function index(){
        $data = array();
        if(!$this->session->userdata('isUserLoggedIn')){
            redirect('login');
        }
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        
        //get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        
        //load the list page view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('permissiontypes/list', array());
        $this->load->view('templates/footer', $data);
    }    
    
    public function get_tables() {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $rows = $this->permissiontype->getRow();  
        
        $mem = array();        
        foreach($rows->result() as $r) {           
           $mman = '<a href="permissiontypes/edit/'.$r->id.'" class="glyphicon glyphicon-edit" style="padding-right:5px;"></a> ';
           $mman .= '<a href="permissiontypes/delete/'.$r->id.'" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete?\')" ></a>';
               $mem[] = array(
                    $r->id,
                    $r->name,
                    $r->status,
                    $mman
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

    /*
     * Member Add
     */

     public function add(){
        
        $this->load->library('form_validation');
        $data = array();
        $postData = array();        
        if(!$this->session->userdata('isUserLoggedIn')){
            redirect('login');
        }
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));

        //get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }


        //if add request is submitted
        if($this->input->post('permissiontypeSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
            $this->form_validation->set_rules('status', 'Status', 'required'); 
            $postData = array(
                'name' => $this->input->post('name'),
                'status' => $this->input->post('status')
                 );

            $postData['created_date'] =  date('Y-m-d H:i:s');
            $postData['modified_date'] =  date('Y-m-d H:i:s');
                
                if($this->form_validation->run() == true){
                    $insert = $this->permissiontype->insert($postData);
                    if($insert){
                        $this->session->set_userdata('success_msg', 'Permission Type has been added successfully.');
                        redirect('permissiontypes');
                    }else{
                        $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
                    }
                }
                
            }
                
        $dataa['post'] = $postData;
        
        //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/breadcrum', $data);
            $this->load->view('permissiontypes/add', $dataa);
            $this->load->view('templates/footer', $data);


    }

    /*
     * Member Edit
     */

    public function edit($id){

        $data = array();
        $postData = $this->permissiontype->getRows($id); 

        if(!$this->session->userdata('isUserLoggedIn')){
            redirect('login');
        }

        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));

        //get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }

        //if edit request is submitted
        if($this->input->post('epermissiontypeSubmit')){

            if($this->input->post('name') != $postData['name']) {
                $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
                $postData['name'] = $this->input->post('name');
            }
            if($this->input->post('status') != $postData['status']) {
                $this->form_validation->set_rules('status', 'Status', 'required');
                $postData['status'] = $this->input->post('status');
            }

            $postData['modified_date'] =  date('Y-m-d H:i:s');
                
            if($this->form_validation->run() == true){

                    $update = $this->permissiontype->update($postData, $id);

                    if($update){
                        $this->session->set_userdata('success_msg', 'Permission Type has been updated successfully.');
                        redirect('permissiontypes');
                    }else{
                        $this->session->set_userdata('error_msg', 'Permission Type has not been updated successfully, Some problems occurred, please try again.');
                        redirect('permissiontypes/edit');
                    }
                }
                
            }

        
        $data['post'] = $postData;
        
        //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/breadcrum', $data);
            $this->load->view('permissiontypes/edit', $data);
            $this->load->view('templates/footer', $data);
    }


    /*
     * Group Delete
     */

    public function delete($id){
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->permissiontype->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Permission Type has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        redirect('permissiontypes');
    }   

}

/* End of file Groups */
/* Location: ./application/controllers/Groups */