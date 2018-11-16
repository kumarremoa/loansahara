<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends CI_Controller {

	function __construct() {
        parent::__construct();
        is_login();
        $this->load->library('form_validation');
        $this->load->model('user');
        $this->load->model('template');       
        $this->load->model('listall');   
        
    }

    public function index(){   

        $data = array();
        $postData = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
       
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
        $this->load->view('template/list', array());
        $this->load->view('templates/footer', $data);

    }    
    
    public function get_tables() {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $rows = $this->template->getRows();          
        $mem = array();  
        foreach($rows->result() as $r) {        
            $mman = '<a href="'.base_url().'template/edit/'.$r->id.'" data-toggle="tooltip" title="Edit" class="glyphicon glyphicon-edit" style="padding-right:5px;"></a> '; 
                
               $mem[] = array(
                    $r->id,
                    $r->module,
                    $r->code,
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
   
    public function edit($id){

        $data = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        $postData = $this->template->getRow($id);       
        
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
        if($this->input->post('etemplateSubmit')){

            if($this->input->post('module') != $postData['module']) {
                $this->form_validation->set_rules('module', 'Module Name', 'required|min_length[3]');
                $postData['module'] = $this->input->post('module');
            }

            if($this->input->post('code') != $postData['code']) {
                $this->form_validation->set_rules('code', 'Code', 'required|min_length[3]');
                $postData['code'] = $this->input->post('code');
            }

            if($this->input->post('html') != $postData['html']) {
                $this->form_validation->set_rules('html', 'HTML', 'required|min_length[3]');
                $postData['html'] = $this->input->post('html');
            }
            
          
            if($this->form_validation->run() == true){

               $update = $this->template->update($postData, $id);

                    if($update){                        
                        $this->session->set_userdata('success_msg', 'Template has been updated successfully.');
                        redirect('template');
                    }else{
                        $this->session->set_userdata('error_msg', 'Template hasnot been updated successfully, Some problems occurred, please try again.');
                        redirect('template');
                    }
                }
                
            }

        
        $data['post'] = $postData;
        
        //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/breadcrum', $data);
            $this->load->view('template/edit', $data);
            $this->load->view('templates/footer', $data);
    }
   
}