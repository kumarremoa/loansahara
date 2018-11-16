<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//date_default_timezone_set("Asia/Kolkata");


class Loancatagory extends CI_Controller {

	public function __construct() {
        parent::__construct();
       
        $this->load->model('user');
        $this->load->model('Category_model');
        $this->load->helper('url');
        $this->load->library(array('upload'));
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
        
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        $data['loancats']=$this->Category_model->catListing();
        //load the list page view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('category/list', $data);
        $this->load->view('templates/footer', $data);
    }    
    public function cat_add()
    {
        $data = array();
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
        //load the list page view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('category/add', $data);
        $this->load->view('templates/footer', $data);
    }
    public function cat_insert()
    {
        //print_r($this->input->post()); die;
       $config['upload_path']   = './categories/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 5048;
        $config['encrypt_name'] = TRUE; 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
        }
        else
        {
             $image =$this->upload->data('file_name'); ;
        }
        $data=[
            'name'=>$this->input->post('name'),
            'image'=> $image,
            'minimum_range'=> $this->input->post('price-min'),
            'maximum_range'=> $this->input->post('price-max'),
            'description'=>$this->input->post('description'),
            'day'=>$this->input->post('late_payment_value'),
            'month'=>$this->input->post('late_payment'),
        ];
        
       $insert=$this->Category_model->catAdd($data);
        if($insert) {
           $this->session->set_userdata('success_msg', 'Category Added Successfull.');
           redirect('loancatagory','refresh');  
        }else {
             $this->session->set_userdata('error_msg', 'Category not Created Successfull !<br> Please Try Again!');
           redirect('loancatagory','refresh'); 

        }
    }
    public function cat_edit($id)
    {
         $data = array();
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
        $data['cats']=$this->Category_model->catEdit($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('category/edit', $data);
        $this->load->view('templates/footer', $data);
    }
    public function cat_update($id)
    {
       $config['upload_path']   = './categories/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 5048;
        $config['encrypt_name'] = TRUE; 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('userfile'))
        {
           $image=$this->input->post('images');
            //$error = array('error' => $this->upload->display_errors());
            //print_r($error); die;
        }
        else
        {
             $image =$this->upload->data('file_name'); ;
        }
        $data=[
            'name'=>$this->input->post('name'),
            'image'=> $image,
            'description'=>$this->input->post('description'),
            'day'=>$this->input->post('late_payment_value'),
            'month'=>$this->input->post('late_payment'),
            'minimum_range'=> $this->input->post('price-min'),
            'maximum_range'=> $this->input->post('price-max'),
        ];
       
       $insert=$this->Category_model->catUpdate($id,$data);
        if($insert) {
           $this->session->set_userdata('success_msg', 'Category Update Successfull.');
           redirect('loancatagory','refresh');  
        }else {
             $this->session->set_userdata('error_msg', 'Category not Update Successfull !<br> Please Try Again!');
           redirect('loancatagory','refresh'); 

        }
    }
    public function cat_delete($value)
    {
       $insert=$this->Category_model->catDelete($value);
        if($insert) {
           $this->session->set_userdata('success_msg', 'Category Delete Successfull.');
           redirect('loancatagory','refresh');  
        }else {
             $this->session->set_userdata('error_msg', 'Category not Delete Successfull !<br> Please Try Again!');
           redirect('loancatagory','refresh'); 

        }
    }
    
}

/* End of file Members.php */
/* Location: ./application/controllers/Members.php */