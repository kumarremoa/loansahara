<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addbanner extends CI_Controller {

	function __construct() {
        parent::__construct();
        is_login();
        $this->load->library('form_validation');
        $this->load->helper('utility_helper');
        $this->load->model('user');
        $this->load->model('Addbanner_model'); 
    }

    /*
     * Apiuser Users List
     */

    public function index(){   

        $data = array();
        $postData = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        // Validate User Auth.        
        /*if(!CheckPermission(AREA, "own_read")){
        $this->session->set_userdata('error_msg', 'You are not authorized to access the page..!');
        redirect('dashboard');
        }*/
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
        $this->load->view('advertisement/list', array());
        $this->load->view('templates/footer', $data);

    }   

    public function get_tables() {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

      /*  if ($this->session->userdata('userType') == '1'){
        	$rows = $this->Addbanner_model->getRow();  
        }else {
           $rows = $this->Addbanner_model->getRow($this->session->userdata('userId'), $this->session->userdata('userType'));  
        }*/

        $rows = $this->Addbanner_model->getRow(); 
        //$mem = array();  
        foreach($rows->result() as $r) {   
            /*if(CheckPermission(AREA, "own_update")){        
            $mman = '<a href="area-distributors-users/edit/'.$r->id.'" data-toggle="tooltip" title="Edit" class="glyphicon glyphicon-edit" style="padding-right:5px;"></a> ';
            }else {
             $mman = '';
            }
            if(CheckPermission(AREA, "own_delete")){    
            $mman1 = '<a href="area-distributors-users/delete/'.$r->id.'" data-toggle="tooltip" title="Delete"  class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete?\')" ></a>';
            }else {
             $mman1 = '';
            }*/
            $mman = '<a href="area-distributors-users/edit/'.$r->id.'" data-toggle="tooltip" title="Edit" class="glyphicon glyphicon-edit" style="padding-right:5px;"></a> ';
             $mman1 = '<a href="area-distributors-users/delete/'.$r->id.'" data-toggle="tooltip" title="Delete"  class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete?\')" ></a>';

           if ($r->image != "") {
              $images = base_url('assets/uploads/').$r->image;   
            }else{
                $images = base_url('assets/img/')."avatar5.png";
            }
            $images = '<img style="width:20px; height:20px;" src="'.$images.'" />';
           

               $mem[] = array(
                    $r->id,
                    $r->title,
                    $r->position,
                    $images,                    
                    $r->priority,
                    $r->created_date,
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


    /*
     * Whitelabel User Add
     */

     public function add(){
      
        $this->load->library('image_lib');
        $this->load->helper('file');



        $data = array();
        $postData = array(); 
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId'))); 

        // Validate User Auth.        
        /*if(!CheckPermission(AREA, "own_create")){
            $this->session->set_userdata('error_msg', 'You are not authorized to access the page..!');
            redirect('dashboard');
        }*/

        //get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }

        /*$data['statelist'] = $this->listall->getState(); 
        $data['countrylist'] = $this->listall->getCountry(); 
        $data['citylist'] = $this->listall->getCity();*/ 
        $data['positionlist']=$this->Addbanner_model->getaddpostion();
        //Add New User
        if($this->input->post('userSubmit')){            
            //form field validation rules
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('position', 'position', 'required');
            $this->form_validation->set_rules('priority', 'priority', 'required');
            $this->form_validation->set_rules('status', 'status', 'required');

            if($this->input->post('uid') == 3){
                $user_type = 6;
            }else{
                $user_type = 6;
            } 
            $userid=settingsuserid();
            $postData = array(
                'title' => $this->input->post('title'),
                'position' => $this->input->post('position'),               
                'image' => $this->input->post('image'),
                'priority' => $this->input->post('priority'),
                'status' => $this->input->post('status'),
                'created_date'=>date('Y-m-d H:i:s'),
                'userid'=>$userid
                 );

           // $postData['created_date'] =  date('Y-m-d H:i:s');
            //$postData['modified_date'] =  date('Y-m-d H:i:s');
           // $postData['isMobileVerified'] =  0;
           // $postData['isEmailVerified'] =  0;

            $config['upload_path']   = './assets/banners/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 2048;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload('image');
            $dataq = $this->upload->data();
            $postData['image'] =  $dataq['file_name'];

            //print_r($dataq);die;
                if($this->form_validation->run() == true){
                    $insert = $this->Addbanner_model->insert($postData);
                    //print_r($insert);die;
                    if($insert){
                        /*if(setting_all('sms_alerts') == '1'){
                            sendSMS('Congratulation for being an areadistributor, you will receive your login details on your registered email address. Thank You'.setting_all('company_name').'..!', $this->input->post('mobile'));
                        }*/
                        $this->session->set_userdata('success_msg', 'Banner has been added successfully.');
                        redirect('addbanner');
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
            $this->load->view('advertisement/add', $data);
            $this->load->view('templates/footer', $data);


    }

    /*
     * Whitelabel User Edit
     */

    public function edit($id){

        $this->load->library('form_validation');        
        $this->load->helper('file');

        $data = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        $postData = $this->areadistributor->getRows($id);

        $data['statelist'] = $this->listall->getState(); 
        $data['countrylist'] = $this->listall->getCountry(); 
        $data['citylist'] = $this->listall->getCity(); 
       
        
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

            if($this->input->post('aadhar_no') != $postData['aadhar_no']) {
                $this->form_validation->set_rules('aadhar_no', 'Aadhar', 'required|numeric|exact_length[12]');
                   $postData['aadhar_no'] = $this->input->post('aadhar_no');
            }

            if($this->input->post('address1') != $postData['address1']) {
                $this->form_validation->set_rules('address1', 'Address1', 'required');
                   $postData['address1'] = $this->input->post('address1');
            }

            if($this->input->post('address2') != $postData['address2']) {
                $this->form_validation->set_rules('address2', 'Address2', 'required');
                   $postData['address2'] = $this->input->post('address2');
            }

            if($this->input->post('city') != $postData['city']) {
                $this->form_validation->set_rules('city', 'City', 'required|numeric');
                   $postData['city'] = $this->input->post('city');
            }
            
            if($this->input->post('state') != $postData['state']) {
                $this->form_validation->set_rules('state', 'State', 'required|numeric');
                   $postData['state'] = $this->input->post('state');
            }
            
            if($this->input->post('country') != $postData['country']) {
                $this->form_validation->set_rules('country', 'Country', 'required|numeric');
                   $postData['country'] = $this->input->post('country');
            }

            if($this->input->post('pincode') != $postData['pincode']) {
                $this->form_validation->set_rules('pincode', 'Pincode', 'required');
                   $postData['pincode'] = $this->input->post('pincode');
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

                    $postData['profile_pic'] =  $dataq['file_name'];   
                }else {
                    $this->session->set_userdata('error_msg', ' Some problems occurred, please try again.');
                }
                             
            }
           // var_dump('$postData');
            if($this->form_validation->run() == true){

               $update = $this->areadistributor->update($postData, $id);

                    if($update){
                        if(setting_all('sms_alerts') == '1'){
                        sendSMS('Your profile has been updated successfully. Thank You'.setting_all('company_name').'..!', $this->input->post('mobile'));
                        }
                        $this->session->set_userdata('success_msg', 'Area Distributor has been updated successfully.');
                        redirect('area-distributors-users');
                    }else{
                        $this->session->set_userdata('error_msg', 'User has not been updated successfully, Some problems occurred, please try again.');
                        redirect('area-distributors-users');
                    }
                }
                
            }

        
        $data['post'] = $postData;
        
        //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/breadcrum', $data);
            $this->load->view('areadistributor/edit', $data);
            $this->load->view('templates/footer', $data);
    }

    /*
     * Whitelabel User View
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
            $dataa['member'] = $this->areadistributor->getRows($id);
            
            //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/breadcrum', $data);
            $this->load->view('areadistributor/view', $dataa);
            $this->load->view('templates/footer', $data);
        }else{
            redirect('area-distributors-users');
        }
    }


    /*
     * Whitelabel User Delete
     */

    public function delete($id){
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->areadistributor->deletes($id);            
            if($delete){
                $this->session->set_userdata('success_msg', 'User has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        redirect('area-distributors-users');
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