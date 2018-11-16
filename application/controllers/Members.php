<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");


class Members extends CI_Controller {

	function __construct() {
        parent::__construct();
       
        $this->load->model('user');
        $this->load->model('member');
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
        $this->load->view('members/list', array());
        $this->load->view('templates/footer', $data);
    }    
    
    public function get_tables() {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $rows = $this->member->getRow();  
        
        $mem = array();        

        /*foreach( $rows->result() as $row ) {              
               
           $eachMember = array(); 

           $eachMember['id'] = $row->id;
           $eachMember['name'] = $row->name;
           $eachMember['email'] = $row->email;
           $eachMember['phone'] = $row->phone;
         
           $mem [] = $eachMember;

        }
*/
        foreach($rows->result() as $r) {
           $mman  = '<a href="members/view/'.$r->id.'" class="glyphicon glyphicon-eye-open" style="padding-right:5px;"></a> ';
           $mman .= '<a href="members/edit/'.$r->id.'" class="glyphicon glyphicon-edit" style="padding-right:5px;"></a> ';
           $mman .= '<a href="members/delete/'.$r->id.'" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete?\')" ></a>';

           if ($r->pic != "") {
              $images = site_url('assets/uploads/').$r->pic;   
            }else{
                $images = site_url('assets/img/')."avatar5.png";
            }
            $images = '<img style="width:20px; height:20px;"  src="'.$images.'" />';


               $mem[] = array(
                    '#'.$r->id,
                    $images,
                    $r->name,
                    $r->email,
                    $r->mobile,
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
        $this->load->library('image_lib');
        $this->load->helper('file');
        $data = array();
        $dataa = array();
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
        if($this->input->post('memberSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[pro_user.email]');
            $this->form_validation->set_rules('phone', 'Mobile', 'required|numeric|exact_length[10]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|matches[password]');
            $this->form_validation->set_rules('type', 'User Type', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');          
            $this->form_validation->set_message('is_unique', 'Email Already Exists, Please use a different email address..!');
            $postData = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'mobile' => $this->input->post('phone'),
                'user_group' => $this->input->post('type'),
                'status' => $this->input->post('status')
                 );

            $postData['created_date'] =  date('Y-m-d H:i:s');
            $postData['modified_date'] =  date('Y-m-d H:i:s');
           // $postData['isMobileVerified'] =  0;
           // $postData['isEmailVerified'] =  0;


            $config['upload_path']   = './assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 2048;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload('pic');
            $dataq = $this->upload->data();
            $postData['pic'] =  $dataq['file_name'];
                if($this->form_validation->run() == true){
                    $insert = $this->member->insert($postData);
                    if($insert){
                        $this->session->set_userdata('success_msg', 'Member has been added successfully.');
                        redirect('members');
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
            $this->load->view('members/add', $dataa);
            $this->load->view('templates/footer', $data);


    }

    /*
     * Member Edit
     */

    public function edit($id){

        $this->load->library('form_validation');        
        $this->load->helper('file');
        $data = array();
        $dataa = array();
        $postData = $this->member->getRows($id); 

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
        if($this->input->post('ememberSubmit')){

            if($this->input->post('name') != $postData['name']) {
                $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
                $postData['name'] = $this->input->post('name');
            }

            if( $this->input->post('password') != '' ) {
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
                $this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|matches[password]');
                $postData['password'] = md5($this->input->post('password'));
            }

            if($this->input->post('mobile') != $postData['mobile']) {
                $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|exact_length[10]');
                   $postData['mobile'] = $this->input->post('mobile');
            }

            if($this->input->post('user_group') != $postData['user_group']) {
                $this->form_validation->set_rules('user_group', 'User Type', 'required');
                $postData['user_group'] = $this->input->post('user_group');
            }

            if($this->input->post('status') != $postData['status']) {
                $this->form_validation->set_rules('status', 'Status', 'required');
                $postData['status'] = $this->input->post('status');
            }

            $postData['modified_date'] =  date('Y-m-d H:i:s');

            if ($_FILES["pic"]["name"] != '') {
               $this->form_validation->set_rules('pic', '', 'callback_file_check');
                $config['upload_path']   = './assets/uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = 2048;
                $config['encrypt_name'] = TRUE; 
                $this->load->library('upload', $config);
                $this->upload->do_upload('pic');
                $dataq = $this->upload->data();

                if ($dataq) {

                    $postData['pic'] =  $dataq['file_name'];   
                }else {
                    $this->session->set_userdata('error_msg', ' Some problems occurred, please try again.');
                        //redirect('members/edit');
                }
/*
                $configq['source_image']   = './assets/uploads/'.$dataq['file_name'];
                $configq['new_image']   = './assets/uploads/'.$dataq['file_name'];
                $configq['image_library']   = 'gd2';
                $configq['maintain_ratio'] = TRUE;
                $configq['width'] = 120;
                $configq['height'] = 120;
                $configq['quality'] = '60%';
                $this->load->library('image_lib', $configq);
                $this->image_lib->resize();*/

                             
            }
               //echo var_dump($postData);
                
            if($this->form_validation->run() == true){

                    $update = $this->member->update($postData, $id);

                    if($update){
                        $this->session->set_userdata('success_msg', 'Member has been updated successfully.');
                        redirect('members');
                    }else{
                        $this->session->set_userdata('error_msg', 'Member has not been updated successfully, Some problems occurred, please try again.');
                        redirect('members/edit');
                    }
                }
                
            }

        
        $dataa['post'] = $postData;
        
        //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/breadcrum', $data);
            $this->load->view('members/edit', $dataa);
            $this->load->view('templates/footer', $data);
    }

    /*
     * Member View
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
            $dataa['member'] = $this->member->getRows($id);
            
            //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/breadcrum', $data);
            $this->load->view('members/view', $dataa);
            $this->load->view('templates/footer', $data);
        }else{
            redirect('member');
        }
    }


    /*
     * Member Delete
     */

    public function delete($id){
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->member->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Member has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }

        redirect('members');
    }

    /*
     * file value and type check during validation
     */

    public function file_check($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['pic']['name']);
        if(isset($_FILES['pic']['name']) && $_FILES['pic']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only pdf/gif/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }
    

}

/* End of file Members.php */
/* Location: ./application/controllers/Members.php */