<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Whitelabels extends CI_Controller {

	function __construct() {
        parent::__construct();
        is_login();
        $this->load->library('form_validation');
        $this->load->model('user');
        $this->load->model('whitelabel');       
        $this->load->model('listall');       
        $this->load->model('fund');       
        
    }

    /*
     * Whitelabel Users List
     */

    public function index(){   
     
        $data = array();
        $postData = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        // Validate User Auth.        
        if(!CheckPermission(WHITELABEL, "own_read")){
        $this->session->set_userdata('error_msg', 'You are not authorized to access the page..!');
        redirect('dashboard');
        }
       
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
        $this->load->view('customers/list', array());
        $this->load->view('templates/footer', $data);

    }    
    
    public function get_tables() {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        if ($this->session->userdata('userType') == '1'){
        $rows = $this->whitelabel->getRow();  
        }else {
           $rows = $this->whitelabel->getRowFilter($this->session->userdata('userId'));  
        }
        $mem = array();  
        foreach($rows->result() as $r) {   
            if(CheckPermission(WHITELABEL, "own_update")){        
            $mman = '<a href="white-label-users/edit/'.$r->id.'" data-toggle="tooltip" title="Edit" class="glyphicon glyphicon-edit" style="padding-right:5px;"></a> ';
            }else {
             $mman = '';
            }
            if(CheckPermission(WHITELABEL, "own_delete")){    
            $mman1 = '<a href="whitelabels/delete/'.$r->id.'" data-toggle="tooltip" title="Delete"  class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete?\')" ></a>';
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
            if($r->user_type == "2"){
                $uid = 'MWL';
            }else {
                $uid = 'WL';
            }
               $mem[] = array(
                    $r->id,
                    $uid,
                    $images,
                    $r->name,
                    $r->email,
                    $r->mobile,
                    $r->slab,
                    $balance,
                    $r->city_name,
                    $r->kyc_status,
                    $r->parent_id,
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

    public function add(){
      
        $this->load->library('image_lib');
        $this->load->helper('file');

        $data = array();
        $postData = array(); 
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));       
               
        // Validate User Auth.        
        if(!CheckPermission(WHITELABEL, "own_create")){
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
            
            $rand = randPasswordGenerator();
            //form field validation rules
            $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
            $this->form_validation->set_rules('cname', 'Company Name', 'required|min_length[3]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[it_users.email]');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|exact_length[10]');
            $this->form_validation->set_rules('aadhar_no', 'Aadhar', 'required|numeric|exact_length[12]');
            $this->form_validation->set_rules('status', 'Status', 'required');   
            $this->form_validation->set_rules('web', 'Website URL', 'required');   
            $this->form_validation->set_rules('usertype', 'Selct User Type', 'required');   
            $this->form_validation->set_rules('state', 'State', 'required|numeric');
            $this->form_validation->set_rules('city', 'City', 'required|numeric');
            $this->form_validation->set_rules('country', 'Country', 'required|numeric');                   
            $this->form_validation->set_message('is_unique', 'Email Already Exists, Please use a different email address..!');           
            $postData = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => md5($rand),
                'mobile' => $this->input->post('mobile'),
                'aadhar_no' => $this->input->post('aadhar_no'),
                'address1' => $this->input->post('address1'),
                'address2' => $this->input->post('address2'),
                'country' => $this->input->post('country'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'pincode' => $this->input->post('pincode'),
                'parent_id' => $this->input->post('parent_id'),
                'wl_id' => $this->input->post('parent_id'),
                'user_type' => $this->input->post('usertype'),
                'status' => $this->input->post('status'),
                'slab' => $this->input->post('slab'),
                'api_key' => md5(md5($this->input->post('email')))
                 );

            $postData['created_date'] =  date('Y-m-d H:i:s');
            $postData['modified_date'] =  date('Y-m-d H:i:s');      

                if($this->form_validation->run() == true){
                    $insert = $this->whitelabel->insert($postData);
                    if($insert){
                        if(setting_all('sms_alerts') == '1'){
                            sendSMS('Congratulation for being a white label partner, you will receive your login details on your registered email address. Thank You'.setting_all('company_name').'..!', $this->input->post('mobile'));
                        }
                        $data = $this->user->getByEmail($this->input->post('email'));                       
                        if(isset($data['id']) && $data['id'] != '') {
                            $setting = settings(); 
                            $sub = "Welcome to ".$setting['company_name'];
                            $email = $this->input->post('email');

                            if (isset($setting['svg']) &&  $setting['svg'] != ''){
                                $logo = $setting['svg'];
                            } else {
                                $logo = '<img width="30%" src="'.base_url('assets/images/').$setting['logo'].'" alt="'.$setting['website'].'" title="'.$setting['website'].'" />';
                            }  

                            $data = array(
                                'user_name' => $data['name'],
                                'action_url' =>base_url(),
                                'sender_name' => $setting['company_name'],
                                'logo' => $logo,
                                'website_name' => $setting['website'],
                                'password' => $rand,
                                'user_email' => $this->input->post('email')
                                );
                            $body = $this->user->get_template('welcome_mail');
                            $body = $body->html;
                            foreach ($data as $key => $value) {
                                $body = str_replace('{var_'.$key.'}', $value, $body);
                            }
                           //  print_r($body);die;
                            /*if($setting['mail_setting'] == 'php_mailer') {
                                $this->load->library("send_mail");         
                                $emm = $this->send_mail->email($sub, $body, $email, $setting);

                            } else {
                                // content-type is required when sending HTML email
                                $headers = "MIME-Version: 1.0" . "\r\n";
                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                $headers .= 'From: '.$setting['EMAIL'] . "\r\n";
                                $emm = mail($email,$sub,$body,$headers);
                            }*/
                            $emm = '1';
                            if($emm) {

                                if($this->input->post('offline_mt')){ 
                                    $off = $this->input->post('offline_mt');
                                }else { 
                                    $off = '0';
                                }

                                $postDataq = array();
                                $userID = $insert;
                                $address = $this->input->post('address1').',<br>'.$this->input->post('address2');
                                $settingData = array(
                                'website' => $this->input->post('web'),
                                'company_name' => $this->input->post('cname'),
                                'menu' => $setting['menu'],
                                'virtual_fund' => $this->input->post('virtual_fund'),
                                'offline_mt' => $off,
                                'sms_alerts' => '0',
                                'mail_setting' => 'php_mailer',
                                'logo' => '',
                                'favicon' => '',
                                'SMTP_EMAIL' => '',
                                'HOST' => '',
                                'PORT' => '',
                                'SMTP_SECURE' => '',
                                'SMTP_PASSWORD' => '',
                                'preloader' => '',
                                'EMAIL' => $this->input->post('email'),
                                'version' => '',
                                'company_api_url' => '',
                                'api_key' => $postData['api_key'],
                                'title1' => $this->input->post('cname'),
                                'title2' => '',
                                'sms_api_key' => '',
                                'sms_sender_id' => '',
                                'svg' => '',
                                'address' => $address,
                                'contact_no' => '',
                                'toll_free_no' => '',
                                'facebook' => '',
                                'twitter' => '',
                                'linkedin' => '',
                                'instagram' => '',
                                'Corporate_website' => '',
                                'app_link' => '',
                                'pg_api' => '',
                                'pg_salt' => ''
                                );

                                foreach ($settingData as $key => $value)
                                {
                                    $postDataq['keys'] = $key;
                                    $postDataq['value'] = $value;
                                    $postDataq['user_id'] = $userID;
                                    $this->whitelabel->insertsettings($postDataq); 
                                } 

                                $this->session->set_userdata('success_msg', 'Customer has been added successfully.');
                                redirect('white-label-users');
                            }

                    }else{
                        $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
                    }
                }
            }  }              
        $data['post'] = $postData;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('customers/add', $data);
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
        $postData = $this->whitelabel->getRows($id);

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

             if($this->input->post('slab') != $postData['slab']) {
                $this->form_validation->set_rules('slab', 'Set Slab', 'required');
                $postData['slab'] = $this->input->post('slab');
            }

            $postData['modified_date'] =  date('Y-m-d H:i:s');

           /* if ($_FILES["pic"]["name"] != '') {
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
                             
            }*/
           // var_dump('$postData');
            if($this->form_validation->run() == true){

               $update = $this->whitelabel->update($postData, $id);

                    if($update){
                        if(setting_all('sms_alerts') == '1'){
                        sendSMS('Your profile has been updated successfully. Thank You'.setting_all('company_name').'..!', $this->input->post('mobile'));
                        }
                        $this->session->set_userdata('success_msg', 'User has been updated successfully.');
                        redirect('white-label-users');
                    }else{
                        $this->session->set_userdata('error_msg', 'User has not been updated successfully, Some problems occurred, please try again.');
                        redirect('white-label-users');
                    }
                }
                
            }

        
        $data['post'] = $postData;
        
        //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/breadcrum', $data);
            $this->load->view('customers/edit', $data);
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
            $dataa['member'] = $this->whitelabel->getRows($id);
            
            //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/breadcrum', $data);
            $this->load->view('customers/view', $dataa);
            $this->load->view('templates/footer', $data);
        }else{
            redirect('white-label-users');
        }
    }


    /*
     * Whitelabel User Delete
     */

    public function delete($id){
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->whitelabel->deletes($id);            
            if($delete){
                $this->session->set_userdata('success_msg', 'User has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        redirect('white-label-users');
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
        
        $data['wllist'] = $this->whitelabel->getwlUsers($this->session->userdata('userId')); 

        // Validate User Auth.        
        if(!CheckPermission(WHITELABEL, "own_read")){
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
                            redirect('white-label-users/fund');
                        }else {
                            if($postData['paymentType'] == 'Credit'){
                                $insert = $this->fund->fundAdd($postData);
                                if($insert) {
                                   $this->session->set_userdata('success_msg', 'Transaction successful, Fund has been transfred.');
                                   redirect('white-label-users/fund');  
                                }
                            }else {
                                $insert = $this->fund->fundDeduct($postData);
                                if($insert) {
                                   $this->session->set_userdata('success_msg', 'Transaction successful, Fund has been pulled back.');
                                   redirect('white-label-users/fund');  
                                }else {
                                     $this->session->set_userdata('error_msg', 'Transaction declined, Insufficient Fund');
                                   redirect('white-label-users/fund'); 

                                }
                            }
                        }
                    }else {

                        if($postData['paymentType'] == 'Credit'){
                            $insert = $this->fund->fundAdd($postData);
                            if($insert) {
                               $this->session->set_userdata('success_msg', 'Transaction successful, Fund has been transfred.');
                               redirect('white-label-users/fund');  
                            }
                        }else {
                                $insert = $this->fund->fundDeduct($postData);
                                if($insert) {
                                   $this->session->set_userdata('success_msg', 'Transaction successful, Fund has been pulled back.');
                                   redirect('white-label-users/fund');  
                                }else {
                                     $this->session->set_userdata('error_msg', 'Transaction declined, Insufficient Fund');
                                   redirect('white-label-users/fund'); 

                                }
                            }
                    }



            }else {
                $this->session->set_userdata('error_msg', 'Transaction Declined, Try Again.');
                redirect('white-label-users/fund');
            }
        }
        $data['post'] = $postData;       

        //load the list page view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('customers/fund', $data);
        $this->load->view('templates/footer', $data);

    }  

     public function setup(){

        $data = array();
        $postData = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        // Validate User Auth.        
        if(!CheckPermission(WHITELABEL, "own_read")){
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
        $this->load->view('customers/setup', $data);
        $this->load->view('templates/footer', $data);

     }


    public function finddomain(){

        $domainname=trim($this->input->post('domainname'));
        $domainname=str_replace(' ', '', $domainname);        
        $domainname=preg_replace('/\s+/', '', $domainname);      
        $tldList=$this->input->post('tldList');

        $url='https://domaincheck.httpapi.com/api/domains/available.json?auth-userid=736699&api-key=NDm2qlyBp7jyS8EPhEniXpLMMzoeVPoh&domain-name='.$domainname.'&tlds='.$tldList;
        $response=curls_function($url);
        $response = json_decode($response, true);
        $message = array_keys($response);
        $dom = $message[0];
       // print_r($response);
        $message = '';
        foreach ($response as $value) {

            if($value['status'] == 'available') {

                $message .= '<div class="callout callout-info" style="background-color: #2a464d !important;"><h4>'.$dom.'</h4> <p>Follow the steps to continue to payment & get this domain.<input type="hidden" id="domain" name="domain" value="'.$dom.'" ><input type="hidden" id="status" name="status" value="0" > <button class="pull-right btn btn-info btn-flat" style="margin-top: -20px;" onclick="return addCustomer()">Buy Now</button></p></div>';

            }else {
                $message .= '<div class="callout callout-danger"><h4>'.$dom.'</h4> <p>This domain is already booked.Please try something other...</p></div>';
            }
            
        }

        echo $message;
    }   

    public function addCustomer(){

        $dom = trim($this->input->post('dom'));
        $rstatus = trim($this->input->post('status'));
       

        $message = '<h3 class="text-center lead"><b>White Label Registration Process (Step: 2/4)</b></h3><hr>
                <p class="text-center lead">You are just a step away from being our white label partner, <br> Please provide informations about you:</p>
                    <div class="form-group ">
                    <label>Domain Name</label>                                       
                      <input type="text" readonly class="form-control" id="web" name="web" value="'.$dom.'"> 
                      <input type="hidden" id="web" name="status" value="'.$rstatus.'"> 
                    </div>                                   
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="">
                    </div>
                    <div class="form-group">
                        <label for="cname">Company Name</label>
                        <input type="text" class="form-control" name="cname" id="cname" placeholder="Enter Company Name" value="">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email"  placeholder="Enter Email" value="">
                    </div>                                                                    
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" class="form-control" name="mobile" id="mobile"placeholder="Enter Mobile Number" value="">
                    </div>
                     <div class="form-group">
                        <label for="usertype">User Type</label>
                        <select class="form-control select2" name="usertype" id="usertype" >
                            <option value="14">White Label User</option> 
                            <option value="2">Master White Label User</option> 
                        </select>
                    </div>                    
                    <div class="form-group">
                        <label for="aadhar_no">Aadhar Number</label>
                        <input type="text" class="form-control" name="aadhar_no"  id="aadhar_no" placeholder="Enter Aadhar Number" value="">
                    </div> 
                    <div class="form-group">
                        <label for="address1">Address line 1</label>
                        <input type="text" class="form-control" name="address1"  id="address1" placeholder="Enter Address (Flat No / Floor/ Unit No)" value="">
                    </div> 
                    <div class="form-group">
                        <label for="address2">Address line 2</label>
                        <input type="text" class="form-control" name="address2" id="address2" placeholder="Enter (Area/Land Mark/ Socity)" value="">
                    </div>                     
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" id="city" placeholder="Enter City" value="">                        
                    </div>                                      
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" class="form-control" name="state" id="state" placeholder="Enter State" value=""> 
                    </div> 
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" name="country" id="country" placeholder="Enter State" value=""> 
                    </div> 
                    <div class="form-group">
                        <label for="pincode">Pincode</label>
                        <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Enter Pincode" value="">                        
                    </div>                     
                    <div class="form-group">
                        <label for="virtual_fund">Virtual Balance</label>
                        <select class="form-control" name="virtual_fund" id="virtual_fund" >
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>                        
                    </div>                    
                    <div class="form-group">
                        <label for="offline_mt">Offline Money Transfer</label>
                        <select class="form-control" name="offline_mt" id="offline_mt" >
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>                        
                    </div>
                    <div class="form-group">
                        <label for="slab">Commission Slab</label>
                        <select class="form-control" name="slab" id="slab">
                          <option value="slab_a">SLAB A</option>
                          <option value="slab_b">SLAB B</option>
                          <option value="slab_c">SLAB C</option>
                          <option value="slab_d">SLAB D</option>
                          <option value="slab_e">SLAB E</option>
                        </select>                        
                    </div>
                </div>
                <div class="form-group ">                                     
                  <input type="button" class="btn btn-success btn-flat btn-block" onclick="return register()" id="register" name="register" value="Register"> 
                </div>
                ';

        echo $message;
    }  


    public function rdomain(){


        $data = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));

        $status = trim($this->input->post('status'));        
        $domainname = trim($this->input->post('domainname'));
        $rand = randPasswordGenerator();  

        $postData = array(                
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => md5($rand),
            'mobile' => $this->input->post('mobile'),
            'aadhar_no' => $this->input->post('aadhar_no'),
            'address1' => $this->input->post('address1'),
            'address2' => $this->input->post('address2'),
            'country' => $this->input->post('country'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'pincode' => $this->input->post('pincode'),
            'parent_id' => $this->input->post('parent_id'),
            'wl_id' => $this->input->post('parent_id'),
            'user_type' => $this->input->post('usertype'),
            'slab' => $this->input->post('slab'),
            'api_key' => md5(md5($this->input->post('email')))
         );

        $postData['created_date'] =  date('Y-m-d H:i:s');
        $postData['modified_date'] =  date('Y-m-d H:i:s'); 
        $postData['status'] =  $status;

        if($status == 0 ){
         if($data['user']['balance'] > 99){          
          $c =  $this->buyDomain($domainname);
          if($c['status'] == "Success"){

            $trans['user_id'] = $this->input->post('parent_id');
            $trans['trans_id'] = 'NEW-'.rand(10000,99999);
            $trans['amount'] = 99;
            $trans['pay_type'] = 'Debit';
            $trans['narration'] = 'Doamin Purchase for ₹ 99, domain name is'.$domainname;
            $trans['created_date'] = date('Y-m-d H:i:s');
            $trans['trans_type'] = 'Domain';
            $trans['status'] = '1';
            $insert = $this->db->insert('loan_transaction', $trans);

            $balaw['balance'] = $data['user']['balance'] - 99;      
            $balaw['modified_date'] = date('Y-m-d H:i:s');  
            $updatea = $this->db->update('loan_users', $balaw, array('id'=>$uid));
            
            if($updatea){
                $status = "1";
            }else {
               $status = "0"; 
            }
           }else{
               $status = "0"; 
           }
          }else{
               $status = "0"; 
           }
        }

        $insert = $this->whitelabel->insert($postData);

    if($insert){
        if(setting_all('sms_alerts') == '1'){

        sendSMS('Congratulation for being a white label partner, you will receive your login details on your registered email address. Thank You'.setting_all('company_name').'..!', $this->input->post('mobile'));
        }
    $data = $this->user->getByEmail($this->input->post('email'));  

    if(isset($data['id']) && $data['id'] != '') {
        $setting = settings(); 
        $sub = "Welcome to ".$setting['company_name'];
        $email = $this->input->post('email');

        if (isset($setting['svg']) &&  $setting['svg'] != ''){
            $logo = $setting['svg'];
        } else {
            $logo = '<img width="30%" src="'.base_url('assets/images/').$setting['logo'].'" alt="'.$setting['website'].'" title="'.$setting['website'].'" />';
        }  

        $data = array(
            'user_name' => $data['name'],
            'action_url' =>base_url(),
            'sender_name' => $setting['company_name'],
            'logo' => $logo,
            'website_name' => $setting['website'],
            'password' => $rand,
            'user_email' => $this->input->post('email')
            );
        $body = $this->user->get_template('welcome_mail');
        $body = $body->html;
        foreach ($data as $key => $value) {
            $body = str_replace('{var_'.$key.'}', $value, $body);
        }
        if($setting['mail_setting'] == 'php_mailer') {
            $this->load->library("send_mail");         
            $emm = $this->send_mail->email($sub, $body, $email, $setting);

        } else {
            // content-type is required when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: '.$setting['EMAIL'] . "\r\n";
            $emm = mail($email,$sub,$body,$headers);
        }
        //$emm = '1';
        if($emm) {

            if($this->input->post('offline_mt')){ 
                $off = $this->input->post('offline_mt');
            }else { 
                $off = '0';
            }

            $postDataq = array();
            $userID = $insert;
            $address = $this->input->post('address1').',<br>'.$this->input->post('address2');
            $settingData = array(
            'website' => $this->input->post('domainname'),
            'company_name' => $this->input->post('cname'),
            'menu' => $setting['menu'],
            'virtual_fund' => $this->input->post('virtual_fund'),
            'offline_mt' => $off,
            'sms_alerts' => '0',
            'mail_setting' => 'php_mailer',
            'logo' => '',
            'favicon' => '',
            'SMTP_EMAIL' => '',
            'HOST' => '',
            'PORT' => '',
            'SMTP_SECURE' => '',
            'SMTP_PASSWORD' => '',
            'preloader' => '',
            'EMAIL' => $this->input->post('email'),
            'version' => '',
            'company_api_url' => '',
            'api_key' => $postData['api_key'],
            'title1' => $this->input->post('cname'),
            'title2' => '',
            'sms_api_key' => '',
            'sms_sender_id' => '',
            'svg' => '',
            'address' => $address,
            'contact_no' => '',
            'toll_free_no' => '',
            'facebook' => '',
            'twitter' => '',
            'linkedin' => '',
            'instagram' => '',
            'Corporate_website' => '',
            'app_link' => '',
            'pg_api' => '',
            'pg_salt' => ''
            );

            foreach ($settingData as $key => $value)
            {
                $postDataq['keys'] = $key;
                $postDataq['value'] = $value;
                $postDataq['user_id'] = $userID;
                $this->whitelabel->insertsettings($postDataq); 
            } 
            if($status == '1'){
            $this->session->set_userdata('success_msg', 'Whitelabel User Added Successfully.');
            redirect('white-label-users');
        }else{
            $this->session->set_userdata('erroe_msg', 'Whitelabel User Added Successfully, but make a  payment of Rs 99 to activate.');
            redirect('white-label-users');

         }
        }
      }
    }
   
    } 
    
    public function enterdomain(){

        $message = '<h3 class="text-center lead"><b>Enter Your Domain (Step: 1/4)</b></h3><hr>
                <p class="text-center lead">To get a white label system you need to have a domain,<br> Point A Record to this IP : 13.127.79.121</p>
                <div class="form-group ">
                  <div class=" col-md-12">                    
                       <input type="text" class="form-control" id="domain" name="domain" placeholder="Enter Your Domain Name" value=""> 
                       <input type="hidden" id="status" name="status" value="1" >                     
                  </div>                  
                  </div> 
                  <div class="form-group col-lg-3 " style="margin-top: 20px;">
                    <input type="button" class="btn btn-success btn-flat btn-block" value="Get A Domain" onclick="return location.reload()" id="getdomain" name="getdomain">
                  </div>  
                  <div class="form-group col-lg-6 pull-right " style="margin-top: 20px;">
                     <input type="button" class="btn btn-info btn-flat btn-block" onclick="return addCustomer()" value="Next" id="nofind" name="nofind">
                  </div>            
                  
                  <div class="clearfix"></div>
                  <hr>
                  <div id="domainlist"></div>';



        echo $message;
    }


    function buyDomain($domainname){

        $url_create = 'https://test.httpapi.com/api/domains/register.json';
        $create_fields_string = '';
        $create_fields = array(
                'auth-userid'=>urlencode('736699'),
                'api-key'=>urlencode('NDm2qlyBp7jyS8EPhEniXpLMMzoeVPoh'),
                'domain-name'=>urlencode($domainname),
                'years'=>urlencode("1"),
                'ns'=>urlencode('ns1.domain.com'),
                'ns'=>urlencode('ns2.domain.com'),
                'customer-id'=>urlencode('18659767'),
                'reg-contact-id'=>urlencode('18659767'),
                'admin-contact-id'=>urlencode('18659767'),
                'tech-contact-id'=>urlencode('18659767'),
                'billing-contact-id'=>urlencode('18659767'),
                'invoice-option'=>urlencode('NoInvoice')
        );

        foreach($create_fields as $key=>$value) { $create_fields_string .= $key.'='.$value.'&'; }
        $create_fields_string = rtrim($create_fields_string,'&');
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url_create);
        curl_setopt($ch,CURLOPT_POST,count($create_fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS,$create_fields_string);
        $result = curl_exec($ch);
        print_r($result);

    }   

}

/* End of file whitelabels.php */