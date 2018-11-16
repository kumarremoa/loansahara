<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");

class Groups extends CI_Controller {

	function __construct() {
        parent::__construct();
       
        $this->load->model('user');
        $this->load->model('group');
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
        $this->load->view('groups/list', array());
        $this->load->view('templates/footer', $data);
    }    
    
    public function get_tables() {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $rows = $this->group->getRow();  
        
        $mem = array();        
        foreach($rows->result() as $r) {           
           $mman = '<a href="groups/edit/'.$r->id.'" class="glyphicon glyphicon-edit" style="padding-right:5px;"></a> ';
           $mman .= '<a href="groups/delete/'.$r->id.'" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete?\')" ></a>';
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
        if($this->input->post('groupSubmit')){
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
                    $insert = $this->group->insert($postData);
                    if($insert){
                        $this->session->set_userdata('success_msg', 'Group has been added successfully.');
                        redirect('groups');
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
            $this->load->view('groups/add', $dataa);
            $this->load->view('templates/footer', $data);


    }

    /*
     * Member Edit
     */

    public function edit($id){

        $data = array();
        $postData = $this->group->getRows($id); 

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
        if($this->input->post('egroupSubmit')){

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

                    $update = $this->group->update($postData, $id);

                    if($update){
                        $this->session->set_userdata('success_msg', 'Group has been updated successfully.');
                        redirect('groups');
                    }else{
                        $this->session->set_userdata('error_msg', 'Group has not been updated successfully, Some problems occurred, please try again.');
                        redirect('groups/edit');
                    }
                }
                
            }

        
        $data['post'] = $postData;
        
        //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/breadcrum', $data);
            $this->load->view('groups/edit', $data);
            $this->load->view('templates/footer', $data);
    }


    /*
     * Group Delete
     */

    public function delete($id){
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->group->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Group has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        redirect('groups');
    }   

}

/* End of file Groups */
/* Location: ./application/controllers/Groups */