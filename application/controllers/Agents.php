<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agents extends CI_Controller {

	function __construct() {
        parent::__construct();
        is_login();
        $this->load->library('form_validation');
        $this->load->model('user');
        $this->load->model(array('Account_model','agent'));       
        $this->load->model('listall');       
        $this->load->model('fund'); 
        $this->load->library('upload');      
        
    }

    /*
     * Apiuser Users List
     */

    public function index(){   

        $data = array();
        $postData = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        // Validate User Auth.        
        if(!CheckPermission(AGENTS, "own_read")){
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

        //load the list page view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('agent/list', array());
        $this->load->view('templates/footer', $data);

    }    
    
    public function get_tables() {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        //print_r($this->session->userdata('userType'));die;
        if ($this->session->userdata('userType') == '1'){
        $rows = $this->agent->getRow();  
        }else {
        $rows = $this->agent->getRowFilter($this->session->userdata('userId'), $this->session->userdata('userType'));    
        }
        $mem = array();  
        foreach($rows->result() as $r) {   
            if(CheckPermission(AGENTS, "own_update")){        
            $mman = '<a href="agents/edit/'.$r->id.'" data-toggle="tooltip" title="Edit" class="glyphicon glyphicon-edit" style="padding-right:5px;"></a> ';
            }else {
             $mman = '';
            }
            if(CheckPermission(AGENTS, "own_delete")){    
            $mman1 = '<a href="agents/delete/'.$r->id.'" data-toggle="tooltip" title="Delete"  class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete?\')" ></a>';
            }else {
             $mman1 = '';
            }

           if ($r->profile_pic != "") {
              $images = site_url('assets/uploads/').$r->profile_pic;   
            }else{
                $images = site_url('assets/img/')."avatar5.png";
            }
            $images = '<img style="width:20px; height:20px;"  src="'.$images.'" />';
            $balance = inr($r->balance);

               $mem[] = array(
                    $r->id,
                    $images,
                    $r->name,
                    $r->email,
                    $r->mobile,
                    $balance,
                    $r->city_name,
                    $r->kyc_status,
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
        if(!CheckPermission(AGENTS, "own_create")){
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

        $data['statelist'] = $this->listall->getState(); 
        $data['countrylist'] = $this->listall->getCountry(); 
        $data['citylist'] = $this->listall->getCity(); 
        //Add New User
        if($this->input->post('userSubmit')){            
            //form field validation rules
            $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[loan_users.email]');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|exact_length[10]');
            $this->form_validation->set_rules('aadhar_no', 'Aadhar', 'required|numeric|exact_length[12]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|matches[password]');
            $this->form_validation->set_rules('status', 'Status', 'required');   
            $this->form_validation->set_rules('state', 'State', 'required|numeric');
            $this->form_validation->set_rules('city', 'City', 'required|numeric');
            $this->form_validation->set_rules('country', 'Country', 'required|numeric');                   
            $this->form_validation->set_message('is_unique', 'Email Already Exists, Please use a different email address..!');

            if($this->input->post('uid') == 3){
                $user_type = 3;
            }else{
                $user_type = 3;
            } 


            $postData = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'mobile' => $this->input->post('mobile'),
                'aadhar_no' => $this->input->post('aadhar_no'),
                'address1' => $this->input->post('address1'),
                'address2' => $this->input->post('address2'),
                'country' => $this->input->post('country'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'pincode' => $this->input->post('pincode'),
                'parent_id' => $this->input->post('parent_id'),
                'wl_id' => $this->input->post('uid'),
                'user_type' => $user_type,
                'status' => $this->input->post('status'),
                'api_key' => md5(md5($this->input->post('mobile')))
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
            $postData['profile_pic'] =  $dataq['file_name'];
                if($this->form_validation->run() == true){
                    $account=array(
                        'account_contact' => $this->input->post('mobile'),
                        'account_email' => $this->input->post('email'),
                    );
                    $insert = $this->agent->insert($postData,$account);
                    if($insert){
                         if(setting_all('sms_alerts') == '1'){
                            sendSMS('Congratulation for being an agent, you will receive your login details on your registered email address. Thank You'.setting_all('company_name').'..!', $this->input->post('mobile'));
                        }
                        $this->session->set_userdata('success_msg', 'Agent has been added successfully.');
                        redirect('agents');
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
            $this->load->view('agent/add', $data);
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
        $postData = $this->agent->getRows($id);

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

               $update = $this->agent->update($postData, $id);

                    if($update){
                        if(setting_all('sms_alerts') == '1'){
                        sendSMS('Your profile has been updated successfully. Thank You'.setting_all('company_name').'..!', $this->input->post('mobile'));
                        }
                        $this->session->set_userdata('success_msg', 'Agent has been updated successfully.');
                        redirect('area-distributors-users');
                    }else{
                        $this->session->set_userdata('error_msg', 'User has not been updated successfully, Some problems occurred, please try again.');
                        redirect('area-distributors-users');
                    }
                }
                
            }

        
        $data['post'] = $postData;
         $email= $postData['email'];
         $data['accounts']=$this->Account_model->accountDetail($email);
         //print_r($data['accounts']); die;
        //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/breadcrum', $data);
            $this->load->view('agent/edit', $data);
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
            $dataa['member'] = $this->agent->getRows($id);
            
            //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/breadcrum', $data);
            $this->load->view('agent/view', $dataa);
            $this->load->view('templates/footer', $data);
        }else{
            redirect('agents');
        }
    }


    /*
     * Whitelabel User Delete
     */

    public function delete($id){
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->agent->deletes($id);            
            if($delete){                
                $this->session->set_userdata('success_msg', 'Agent has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        redirect('agents');
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


    public function fund(){   
        
        $data = array();
        $postData = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        $data['wllist'] = $this->agent->getwlUsers($this->session->userdata('userId')); 

        // Validate User Auth.        
        if(!CheckPermission(AGENTS, "own_read")){
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

        //Add New User
        if($this->input->post('fundTransfer')){
            $num  = str_replace("₹ ", "", $_POST['senderbalance']);
            $num = str_replace(",", "", $num);
            $int = (double)$num;
            $int2 = (double)$this->input->post('amount');
            $uid = $this->input->post('siditype');

            //form field validation rules            
            $this->form_validation->set_rules('senderId', 'SenderId', 'required');
            $this->form_validation->set_rules('senderbalance', 'Balance', 'required');
            $this->form_validation->set_rules('reciverId', 'Select User', 'required');
            $this->form_validation->set_rules('paymentType', 'Payment Type', 'required');  
            $this->form_validation->set_rules('amount', 'Amount', 'required|numeric');  
            
            $postData = array(
                'senderId' => $this->input->post('senderId'),
                'uid' => $this->input->post('siditype'),
                'senderbalance' => $int,
                'reciverId' => $this->input->post('reciverId'),
                'paymentType' => $this->input->post('paymentType'),
                'status' => 1,
                'amount' => sprintf("%.2f", $int2)
                 );

            $postData['created_date'] =  date('Y-m-d H:i:s');     
            if($this->form_validation->run() == true){ 

                if($uid != "1"){
                        if($postData['amount'] > $postData['senderbalance'] && $postData['paymentType'] == 'Credit'){
                            $this->session->set_userdata('error_msg', 'Transaction Declined, Transfer Amount is higher than your Current Balance.');
                            redirect('agents/fund');
                        }else {
                            if($postData['paymentType'] == 'Credit'){
                                $insert = $this->fund->fundAdd($postData);
                                if($insert) {
                                   $this->session->set_userdata('success_msg', 'Transaction successful, Fund has been transfred.');
                                   redirect('agents/fund');  
                                }
                            }else {
                                $insert = $this->fund->fundDeduct($postData);
                                if($insert) {
                                   $this->session->set_userdata('success_msg', 'Transaction successful, Fund has been pulled back.');
                                   redirect('agents/fund');  
                                }else {
                                     $this->session->set_userdata('error_msg', 'Transaction declined, Insufficient Fund');
                                   redirect('agents/fund'); 

                                }
                            }
                        }
                    }else {

                        if($postData['paymentType'] == 'Credit'){
                            $insert = $this->fund->fundAdd($postData);
                            if($insert) {
                               $this->session->set_userdata('success_msg', 'Transaction successful, Fund has been transfred.');
                               redirect('agents/fund');  
                            }
                        }else {
                                $insert = $this->fund->fundDeduct($postData);
                                if($insert) {
                                   $this->session->set_userdata('success_msg', 'Transaction successful, Fund has been pulled back.');
                                   redirect('agents/fund');  
                                }else {
                                     $this->session->set_userdata('error_msg', 'Transaction declined, Insufficient Fund');
                                   redirect('agents/fund'); 

                                }
                            }
                    }



            }else {
                $this->session->set_userdata('error_msg', 'Transaction Declined, Try Again.');
                redirect('agents/fund');
            }
        }
        $data['post'] = $postData;       

        //load the list page view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('agent/fund', $data);
        $this->load->view('templates/footer', $data);

    }  
    public function account()
    {
                $config['upload_path']   = './pancard/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = 5048;
                $config['encrypt_name'] = TRUE; 
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('userfile'))
                {
                    $pancard=$this->input->post('pancard_img');
                    //$error = array('error' => $this->upload->display_errors());
                    //print_r($error); die;
                }
                else
                {
                     $pancard =$this->upload->data('file_name'); ;
                }

                if ( ! $this->upload->do_upload('adhar_image'))
                {
                     $adhar=$this->input->post('adhar_img');
                    //$error = array('error' => $this->upload->display_errors());
                }
                else
                {
                    $adhar =$this->upload->data('file_name'); ;
                }
                
            $email=$this->input->post('email');
            $data=[
                'account_bank_name'=>$this->input->post('bank_name'),
                'account_no'=>$this->input->post('account_no'),
                'account_holder_name'=>$this->input->post('holder_name'),
                'account_branch'=>$this->input->post('branch_name'),
                'account_icfc'=>$this->input->post('icfc_code'),
                'account_contact'=>$this->input->post('personal_contact'),
                'account_pan_no'=>$this->input->post('pancard_no'),
                'account_adhar_no'=>$this->input->post('adhar_no'),
                'account_email'=>$this->input->post('email'),
                'account_pan_image'=>$pancard,
                'account_adhar_image'=>$adhar,
           ];
       // print_r($data); die;
        $insert=$this->Account_model->updateDetails($data,$email);
        if($insert) {
           $this->session->set_userdata('success_msg', 'Account Details filled Successfull.');
           redirect('agents');  
        }else {
             $this->session->set_userdata('error_msg', 'Account Details not filled Successfull !<br> Please Try Again!');
           redirect('agents'); 

        }
    }
    

}

/* End of file apiusers.php */
/* Location: ./application/controllers/apiuser.php */
