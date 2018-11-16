<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");


class Products extends CI_Controller {

	function __construct() {
        parent::__construct();
       
        $this->load->model('user');
        $this->load->model('product');
    }

    /*
     * Query List
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
        $this->load->view('products/list', array());
        $this->load->view('templates/footer', $data);
    }    
    
    public function get_tables() {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $rows = $this->product->getRow();  
        
        $mem = array();   
        foreach($rows->result() as $r) {           
           $mman = '<a href="products/edit/'.$r->id.'" class="glyphicon glyphicon-edit" style="padding-right:5px;"></a> ';
           $mman .= '<a href="products/delete/'.$r->id.'" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete?\')" ></a>';
          
           if($r->status == 0){
            $status = 'InActive';
           }else {
            $status = 'Active';
           }          

            $mem[] = array(
                    $r->id,
                    $r->name,
                    '₹ '.$r->customerPrice,
                    '₹ '.$r->hawkerPrice,
                    '₹ '.$r->kabariwalaPrice,
                    '₹ '.$r->centerPrice,
                    $status,
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
     * Query Add
     */

     public function add(){
        
        $this->load->library('form_validation');
        $data = array();
        $postData = array();        
        if(!$this->session->userdata('isUserLoggedIn')){
            redirect('login');
        }
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));

        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }

        if($this->input->post('querySubmit')){
            //form field validation rules
            $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
            $this->form_validation->set_rules('customerPrice', 'Customer Price', 'required');
            $this->form_validation->set_rules('hawkerPrice', 'Hawker Price', 'required');
            $this->form_validation->set_rules('kabariwalaPrice', 'Kabariwala Price', 'required');
            $this->form_validation->set_rules('centerPrice', 'Colllection Center Price', 'required');
            

            $postData = array(
                'name' => $this->input->post('name'),
                'customerPrice' => $this->input->post('customerPrice'),
                'hawkerPrice' => $this->input->post('hawkerPrice'),
                'kabariwalaPrice' => $this->input->post('kabariwalaPrice'),
                'centerPrice' => $this->input->post('centerPrice'),
                'status' => $this->input->post('status')
            );

            if($this->form_validation->run() == true){                   
                    $insert = $this->product->insert($postData);                  
                    
                    if($insert){
                        $this->session->set_userdata('success_msg', 'Product has been added successfully.');
                        redirect('products');
                    }else{
                        $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
                    }
                }
                
            }                
        $data['post'] = $postData;        
        //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/breadcrum', $data);
            $this->load->view('products/add', $data);
            $this->load->view('templates/footer', $data);
    }

    /*
     * Query Edit
     */

    public function edit($id){

        $this->load->library('form_validation');   
        $data = array();
        $postData = $this->product->getRows($id); 
        
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
        if($this->input->post('equerySubmit')){

            if($this->input->post('name') != $postData['name']) {
                $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
                $postData['name'] = $this->input->post('name');
            }
            
            if($this->input->post('customerPrice') != $postData['customerPrice']) {
                $this->form_validation->set_rules('customerPrice', 'Custome Price', 'required|numeric');
                   $postData['customerPrice'] = $this->input->post('customerPrice');
            }
            if($this->input->post('hawkerPrice') != $postData['hawkerPrice']) {
                $this->form_validation->set_rules('hawkerPrice', 'Hawker Price', 'required|numeric');
                   $postData['hawkerPrice'] = $this->input->post('hawkerPrice');
            }
            if($this->input->post('kabariwalaPrice') != $postData['kabariwalaPrice']) {
                $this->form_validation->set_rules('kabariwalaPrice', 'Kabariwala Price', 'required|numeric');
                   $postData['kabariwalaPrice'] = $this->input->post('kabariwalaPrice');
            }
            if($this->input->post('centerPrice') != $postData['centerPrice']) {
                $this->form_validation->set_rules('centerPrice', 'Collection Center Price', 'required|numeric');
                   $postData['centerPrice'] = $this->input->post('centerPrice');
            }

                
            if($this->form_validation->run() == true){

                    $update = $this->product->update($postData, $id);

                    if($update){
                        $this->session->set_userdata('success_msg', 'Product has been updated successfully.');
                        redirect('products');
                    }else{
                        $this->session->set_userdata('error_msg', 'Product has not been updated successfully, Some problems occurred, please try again.');
                        redirect('products/edit');
                    }
                }
                
            }

        
        $data['post'] = $postData;
        
        //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/breadcrum', $data);
            $this->load->view('products/edit', $data);
            $this->load->view('templates/footer', $data);
    }

    /*
     * Query Delete
     */

    public function delete($id){
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->product->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Product has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }

        redirect('products');
    }

}

/* End of file querys.php */
/* Location: ./application/controllers/querys.php */