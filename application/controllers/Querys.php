<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");


class Querys extends CI_Controller {

	function __construct() {
        parent::__construct();
       
        $this->load->model('user');
        $this->load->model('query');
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
        $this->load->view('querys/list', array());
        $this->load->view('templates/footer', $data);
    }    
    
    public function get_tables() {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $rows = $this->query->getRow();  
        
        $mem = array();   
        foreach($rows->result() as $r) {           
           $mman = '<a href="querys/edit/'.$r->id.'" class="glyphicon glyphicon-edit" style="padding-right:5px;"></a> ';
           $mman .= '<a href="querys/delete/'.$r->id.'" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete?\')" ></a>';
           if($r->status == 0){
            $status = 'Completed';
           }elseif($r->status == 1){
            $status = 'Requested';
           }else {
            $status = 'Accepted';
           }

           $loca = $r->lat.', '.$r->lng;

            $mem[] = array(
                    $r->id,
                    $r->name,
                    $r->email,
                    $r->mobile,
                    $loca,
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
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|exact_length[10]');   

            $postData = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'lat' => $this->input->post('lat'),
                'lng' => $this->input->post('lng'),
                'status' => $this->input->post('status')
            );
            $dsd = strtotime($this->input->post('dt'));
            $postData['dt'] =  date('Y-m-d H:i:s', $dsd);
            $postData['created_date'] =  date('Y-m-d H:i:s');
            $postData['modified_date'] =  date('Y-m-d H:i:s');

            if($this->form_validation->run() == true){                   
                    $insert = $this->query->insert($postData);                  
                    if($insert){
                        $this->session->set_userdata('success_msg', 'Query has been added successfully.');
                        redirect('querys');
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
            $this->load->view('querys/add', $data);
            $this->load->view('templates/footer', $data);
    }

    /*
     * Query Edit
     */

    public function edit($id){

        $this->load->library('form_validation');   
        $data = array();
        $postData = $this->query->getRows($id); 
        
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

        $data['hawkers'] = $this->query->gethawkerlist();

        //if edit request is submitted
        if($this->input->post('ememberSubmit')){

            if($this->input->post('hawker_id') != '') {               
                $postData['status'] = '2';
                $postData['hawker_id'] = $this->input->post('hawker_id') ;
            }

            $postData['modified_date'] =  date('Y-m-d H:i:s');
           
           //print_r($postData); die;
            
               $update = $this->query->update($postData, $id);
//print_r($update); die;
            
                    if($update){
                        $this->session->set_userdata('success_msg', 'Query has been updated successfully.');
                        redirect('querys');
                    }else{
                        $this->session->set_userdata('error_msg', 'Query has not been updated successfully, Some problems occurred, please try again.');
                        redirect('querys/edit');
                    }
             
                
            }
        
        $data['post'] = $postData;
        
        //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/breadcrum', $data);
            $this->load->view('querys/edit', $data);
            $this->load->view('templates/footer', $data);
    }

    /*
     * Query View
     */
    public function view($id){       
        $data = array();
        $dataa = array();
        if(!$this->session->userdata('isUserLoggedIn')){
            redirect('login');
        }
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        //check whether post id is not empty
        if(!empty($id)){
            $dataa['member'] = $this->query->getRows($id);
            
            //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/breadcrum', $data);
            $this->load->view('querys/view', $dataa);
            $this->load->view('templates/footer', $data);
        }else{
            redirect('querys');
        }
    }


    /*
     * Query Delete
     */

    public function delete($id){
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->query->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Query has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }

        redirect('querys');
    }

}

/* End of file querys.php */
/* Location: ./application/controllers/querys.php */