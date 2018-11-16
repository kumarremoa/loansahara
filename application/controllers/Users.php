<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	
	function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user');        
        $this->load->model('listall');        
        $this->load->model('Report');        
        
    }

    /*
     * User account information
     */
    public function dashboard(){
            is_login(); 
            $data = array();
            $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
            $data['user']['getCustomer'] = $this->user->getCustomer();
            $data['user']['getWL'] = $this->user->getWL();

            //get messages from the session
            if($this->session->userdata('success_msg')){
                $data['success_msg'] = $this->session->userdata('success_msg');
                $this->session->unset_userdata('success_msg');
            }
            if($this->session->userdata('error_msg')){
                $data['error_msg'] = $this->session->userdata('error_msg');
                $this->session->unset_userdata('error_msg');
            }
            $data['agent']=$this->db->query("SELECT count(user_type) as agn FROM `loan_users` WHERE user_type='3'")->result();

             $data['customer']=$this->db->query("SELECT count(user_type) as cus FROM `loan_users` WHERE user_type='4'")->result();

             $data['pending']=$this->db->query("SELECT count(pending) as pend FROM `loan_appoved` WHERE `pending`= 0")->result();
             $data['complete']=$this->db->query("SELECT count(pending) as conf FROM `loan_appoved` WHERE `pending`= 1")->result();
            //print_r($data['agent']); die;
            $userid=$data['user']['id'];
         
            //load the view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/breadcrum', $data);
            $this->load->view('users/dashboard', $data);
            $this->load->view('templates/footer', $data);
       
    }
    
    /*
     * User login
     */
    public function login(){

        $data = array();
        if($this->session->userdata('isUserLoggedIn')){        	
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
        if($this->input->post('loginSubmit')){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'email'=>$this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'status' => '1',
                    'wl_id' =>settingsuserid()
                );
                $checkLogin = $this->user->getRows($con);
                $con2['returnType'] = 'single';
                $con2['conditions'] = array(
                    'id'=>$checkLogin['user_type']
                );                
                if($checkLogin){                    
                     $checktype = $this->user->getRowsUser($con2);
                     $ser['last_login_ip'] = $this->input->ip_address();
                     $ser['last_login_date'] = date('Y-m-d H:i:s');
                     $this->user->updateStatus($ser, $checkLogin['id']);
                    if($checktype['status'] != 0 || $checktype['userType'] != 8){

                        $this->session->set_userdata('isUserLoggedIn',TRUE);
                        $this->session->set_userdata('userType',$checkLogin['user_type']);
                        $this->session->set_userdata('userId',$checkLogin['id']);

                        $getloc = json_decode(file_get_contents("http://ipinfo.io/"));
                        if(setting_all('sms_alerts') == '1'){
                        sendSMS('Your account has been logged in at '. date('d M y h:i A.').' from IP: '.$this->input->ip_address().' and Location: '.$getloc->loc, $checkLogin['mobile']);
                        }
                        redirect('dashboard');
                    } else {
                        $data['error_msg'] = 'Sorry! we are down, Please try after some time.';
                    }
                }else{
                    $data['error_msg'] = 'Wrong email or password, please try again.';
                }
            }
        }
        //load the view
        $this->load->view('users/login', $data);
    }

    /*
     * User logout
     */
    public function logout(){
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->unset_userdata('userType');
        $this->session->sess_destroy();
        redirect('login');
    }

    
    public function reset(){
        
        if($this->input->post('forgetPassword')){

            $data = $this->user->getByEmail($this->input->post('email'));
           
            if(isset($data['id']) && $data['id'] != '') { 
                
                $setting = settings();

                $var_key = $this->getVarificationCode(); 
               
                $this->user->updateRow('loan_users', 'id', $data['id'], array('var_key' => $var_key));

                $sub = "Reset Password";
                $email = $this->input->post('email');
                if (isset($setting['svg']) &&  $setting['svg'] != ''){
                    $logo = $setting['svg'];
                } else {
                    $logo = '<img width="30%" src="'.base_url('assets/images/').$setting['logo'].'" alt="'.$setting['website'].'" title="'.$setting['website'].'" />';
                }   
                $data = array(
                    'user_name' => $data['name'],
                    'action_url' =>base_url(),
                    'image_url' =>base_url('assets/images/'),
                    'sender_name' => $setting['company_name'],
                    'logo' => $logo,
                    'website_name' => $setting['website'],
                    'varification_link' => base_url().'users/mail_varify?code='.$var_key,
                    'url_link' => base_url().'users/mail_varify?code='.$var_key,
                    );
                $body = $this->user->get_template('forgot_password');
                $body = $body->html;
                foreach ($data as $key => $value) {
                    $body = str_replace('{var_'.$key.'}', $value, $body);
                }
                //  print_r($body);die;
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
               //print_r($body);die;
                if($emm) {
                    $this->session->set_userdata('success_msg', 'To reset your password, link has been sent to your email');
                        redirect("login");
                }
            } else {    
                $this->session->set_userdata('error_msg', 'This email account does not exist.');
               redirect("login");
            }
        } 

        $this->load->view('users/forgetpassword'); 
    }

    public function mail_varify(){
        $return = $this->user->mail_varify();         
        
        if($return){          
            $data['email'] = $return;
            $this->load->view('users/setpassword', $data);        
        } else { 
            $data['email'] = 'allredyUsed';
            $this->load->view('users/setpassword', $data);
        } 
    }

    public function reset_password(){
        $return = $this->user->ResetPpassword();
        if($return){
            $data = $this->user->getByEmail($this->input->post('email'));
            $setting = settings();
            $sub = "Password Changed Successfully";
                $email = $this->input->post('email'); 
                if (isset($setting['svg']) &&  $setting['svg'] != ''){
                    $logo = $setting['svg'];
                } else {
                    $logo = base_url('assets/images/').$setting['logo'];
                }    
                $data = array(
                    'user_name' => $data['name'],
                    'action_url' =>base_url(),
                    'image_url' =>base_url('assets/images/'),
                    'sender_name' => $setting['company_name'],
                    'logo' => $logo,
                    'website_name' => $setting['website']
                    );
                $body = $this->user->get_template('password_changed');
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
                if($emm) {

                    $this->session->set_userdata('success_msg', 'Password Changed Successfully...');
                    redirect( base_url().'login', 'refresh');
                }else {    
                    $this->session->set_userdata('error_msg', 'Unable to update password, Please try again.');
                    redirect( base_url().'login', 'refresh');
                }

        } else {
            $this->session->set_userdata('error_msg', 'Unable to update password.');
            redirect( base_url().'login', 'refresh');
        }
    }


     /*
     * User account information
     */
    public function profile(){



            is_login(); 
            $data = array();
            $postData = array();
            $postDataa = array();
            $postDataKyc = array();
            $data['user'] = $this->user->getuserDetails($this->session->userdata('userId'));
            $postDataKyc = $postData = $this->user->getRowsa($this->session->userdata('userId'));
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
            
            //Update Profile Info
            if($this->input->post('updateInfo')){                

            if($this->input->post('name') != $postData['name']) {
                $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
                $postData['name'] = $this->input->post('name');
            }           

            if($this->input->post('mobile') != $postData['mobile']) {
                $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|exact_length[10]');
                   $postData['mobile'] = $this->input->post('mobile');
            }

            if($this->input->post('aadhar_no') != $postData['aadhar_no']) {
                $this->form_validation->set_rules('aadhar_no', 'Aadhar', 'required|numeric|exact_length[12]');
                   $postData['aadhar_no'] = $this->input->post('aadhar_no');
            }

            if($this->input->post('pan_no') != $postData['pan_no']) {
                $this->form_validation->set_rules('pan_no', 'PAN No', 'required|exact_length[10]');
                   $postData['pan_no'] = $this->input->post('pan_no');
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

            if($this->form_validation->run() == true){
                $update = $this->user->update($postData, $this->session->userdata('userId'));               
                if($update){
                if(setting_all('sms_alerts') == '1'){
                sendSMS('Your profile has been updated successfully. Thank You'.setting_all('company_name').'..!', $this->input->post('mobile'));
                }
                $this->session->set_userdata('success_msg', 'Profile has been updated successfully.');
                redirect('profile');
                }else{
                    $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
                    redirect('profile');
                }                
            }
                
            }


            //Change Password
            if($this->input->post('changePassword')){
            //form field validation rules
            $this->form_validation->set_rules('opassword', 'Old Password', 'required|min_length[6]');
            $this->form_validation->set_rules('npassword', 'New Password', 'required|min_length[6]');
            $this->form_validation->set_rules('rnpassword', 'Password Confirmation', 'required|matches[npassword]');
            $postDataa = array(
                'password' => md5($this->input->post('npassword'))
            );
            $postDataa['modified_date'] =  date('Y-m-d H:i:s');

            if($this->form_validation->run() == true){
                $update = $this->user->update($postDataa, $this->session->userdata('userId'));
                if ($data['user']['password'] == $postDataa['password']) {
                    if($update){
                    if(setting_all('sms_alerts') == '1'){
                    sendSMS('Your password has been updated successfully. Thank You'.setting_all('company_name').'..!', $this->input->post('mobile'));
                    }
                    $this->session->set_userdata('success_msg', 'Password has been changed successfully.');
                    redirect('profile');
                    }else{
                        $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
                        redirect('profile');
                    }
                }else{
                        $this->session->set_userdata('error_msg', 'Old Password does not match, Please try again.');
                        redirect('profile');
                }
                
            }
                
            }

            //Update KYC
            if($this->input->post('updateKyc')){              
            if($this->input->post('aadhar_no') != $postDataKyc['aadhar_no']) {
                $this->form_validation->set_rules('aadhar_no', 'Aadhar', 'required|numeric|exact_length[12]');
                   $postDataKyc['aadhar_no'] = $this->input->post('aadhar_no');
            }

            if($this->input->post('pan_no') != $postDataKyc['pan_no']) {
                $this->form_validation->set_rules('pan_no', 'PAN No', 'required|exact_length[10]');
                   $postDataKyc['pan_no'] = $this->input->post('pan_no');
            }

            $postDataKyc['modified_date'] =  date('Y-m-d H:i:s');
            $postDataKyc['kyc_status'] =  '1';

            if ($_FILES["aadharpic"]["name"] != '') {
               $this->form_validation->set_rules('aadharpic', '', 'callback_file_checka');
                $config['upload_path']   = './assets/uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = 2048;
                $config['encrypt_name'] = TRUE; 
                $this->load->library('upload', $config);
                $this->upload->do_upload('aadharpic');
                $dataq = $this->upload->data();
                if ($dataq) {
                    $postDataKyc['aadhar_pic'] =  $dataq['file_name'];   
                }else {
                    $this->session->set_userdata('error_msg', ' Some problems occurred, please try again.');
                }
                             
            }
            if ($_FILES["panpic"]["name"] != '') {
               $this->form_validation->set_rules('panpic', '', 'callback_file_checkp');
                $config['upload_path']   = './assets/uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = 2048;
                $config['encrypt_name'] = TRUE; 
                $this->load->library('upload', $config);
                $this->upload->do_upload('panpic');
                $dataq = $this->upload->data();
                if ($dataq) {
                    $postDataKyc['pan_pic'] =  $dataq['file_name'];   
                }else {
                    $this->session->set_userdata('error_msg', ' Some problems occurred, please try again.');
                }
                             
            }

           if($this->form_validation->run() == true){
                $update = $this->user->update($postDataKyc, $this->session->userdata('userId'));               
                if($update){
                $this->session->set_userdata('success_msg', 'Profile has been updated successfully.');
                redirect('profile');
                }else{
                    $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
                    redirect('profile');
                }                
            }
                
            }
                    
            $data['care'] = $postData;
            $data['kyc'] = $postDataKyc;
          
          

            //load the view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/breadcrum', $data);
            $this->load->view('users/profile', $data);
            $this->load->view('templates/footer', $data);

       
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
    public function file_checka($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['aadharpic']['name']);
        if(isset($_FILES['aadharpic']['name']) && $_FILES['aadharpic']['name']!=""){
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
    public function file_checkp($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['panpic']['name']);
        if(isset($_FILES['panpic']['name']) && $_FILES['panpic']['name']!=""){
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

    public function permission(){

        is_login(); 
        $data= array();
        $data['user'] = $this->user->getuserDetails($this->session->userdata('userId'));
        //get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }

        $data['permissionlist'] = $this->listall->getTypeJoin(); 

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('users/permission', $data);
        $this->load->view('templates/footer', $data);


    }

    public function permissionsave() {  
        $data =array();
        $data = $this->input->post('data');
       
        foreach($data as $key=>$value)
        {
            $key = str_replace('_SPACE_', ' ', $key);
            $arr = array();
            foreach ($value as $vkey => $vvalue) {
                $vkey = str_replace('_SPACE_', ' ', $vkey);
                $arr[$vkey] = $vvalue;
            }
            $this->user->updateRow('loan_permissions', 'user_type', $key, array('data'=>json_encode($arr)));
        }
        
        $this->session->set_userdata('success_msg', 'Your data updated Successfully..');
        redirect( base_url().'permission', 'refresh');
    }

    public function add_user_type() {
        echo $this->user->add_user_type();
        exit;
    }

     public function menu(){

            is_login(); 
            $data = array();
            $postData = array();
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

            if($this->input->post('btnSave')){  

            $this->form_validation->set_rules('menuval', 'Menu Data', 'required');
            $postData['value'] = $this->input->post('menuval');

            if($this->form_validation->run() == true){
                $update = $this->user->updateSettings($postData, 'menu');               
                if($update){
                    $this->session->set_userdata('success_msg', 'Menu has been updated successfully.');
                    redirect('admin-menu');
                }else{
                    $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
                    redirect('admin-menu');
                }                
            }}

            //load the view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/breadcrum', $data);
            $this->load->view('users/menu', $data);
            $this->load->view('templates/footer', $data);
       
    }


    function searchmenu()
    {
        
        
        $test = json_decode(setting_all('menu'), true); 
        $i=0;
        foreach ($test as $key=>$value) {
            $data[]='<li><a href="'.$value['href'].'"><i class="'.$value['icon'].'"></i>'. $value['text'].'</a></li>';
            if(isset($value['children'])){
                foreach ($value['children'] as $key=>$val) {
                    $data[]='<li><a href="'.$val['href'].'"><i class="'.$val['icon'].'"></i>'. $val['text'].'</a></li>';
                }
            }
        $i++;}



       // print_r($data);die;
        $searchval=trim(strtolower($this->input->post('serchval')));
        $uri_seg=$this->input->post('uri_seg');

        $input = preg_quote($searchval, '~'); 
        

        $result = preg_grep('~' . $input . '~', $data);
        if(strlen($searchval)==0)
        {
            print_r($this->fullmenu($uri_seg));            
        }else{            
            foreach ($result as $value) 
            {
                 print_r($value);
            }
        }

        //print_r(strlen($searchval));
        
        
    }

    function fullmenu($uri_seg)
    {


      $menudata = json_decode(setting_all('menu'), true);  
     // print_r($menudata);
      foreach ($menudata as $value) {
      //  print_r($value);
        $lim= '<li class="';
        $lim.= ($uri_seg==$value["href"])?'active':'';
      //  $lim.= (isset($value["href"]))?' treeview':'';
        $lim.= '">';
        $lim.= '<a href="'.base_url($value['href']).'"><i class="'.$value['icon'].'"></i> <span>'.$value['text'].'</span>';
        echo $lim;
        echo (isset($value['children']))?'<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>':'';
        echo '</a>';    
        if(isset($value['children'])){
          echo '<ul class="treeview-menu">';
          foreach ($value['children'] as $val) {

                $lim= '<li class="';
                $lim.= ($uri_seg==$val["href"])?'active':'';              
                $lim.= '">';
                $lim.= '<a href="'.base_url($val['href']).'"><i class="'.$val['icon'].'"></i> <span>'.$val['text'].'</span>';
                echo $lim;
                echo (isset($val['children']))?'<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>':'';
                echo '</a></li>';

              echo  "test^".  $uri_seg."^". $val["href"]."^test";
          }
          echo '</ul>';

        }      
       echo '</li>';
      }
      
  
    }

///------------- Generate Random Password -------------------------//

     public function getVarificationCode(){        
        $pw = $this->randomString();   
        return $varificat_key = md5($pw); 
    }


///------------- Generate Random String -------------------------//
    public function randomString(){
        $alpha = "abcdefghijklmnopqrstuvwxyz";
        $alpha_upper = strtoupper($alpha);
        $numeric = "0123456789";
        $special = ".-+=_,!@$#*%<>[]{}";
        $chars = $alpha . $alpha_upper . $numeric;            
        $pw = '';    
        $chars = str_shuffle($chars);
        $pw = substr($chars, 8,8);
        return $pw;
    }

    function closingreport()
    {
        $date=$this->input->post('date');
        $date=date('Y-m-d',strtotime($date));
        $userid=$this->session->userdata('userId');
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        

        $opening_date = strtotime ( '-1 day' , strtotime ( $date ) ) ;
        $opening_date = date ( 'Y-m-d' , $opening_date );

        $opening_balance_CR=$this->user->getClosingByOpeningDate($userid,$opening_date,'Credit');
        $opening_balance_DR=$this->user->getClosingByOpeningDate($userid,$opening_date,'Debit');

        $opening_balance=$opening_balance_CR[0]['sum']-$opening_balance_DR[0]['sum'];
        $paymentdata=$this->user->getCountPaymentSumAmtByDate($userid,$date);
        if(count($paymentdata)>0)
        {
            foreach ($paymentdata as $value) {
            $type=$value['trans_type'];
            $pay_type=$value['pay_type'];
           $payment[$type][$pay_type]=array("count"=>$value['count'],"amount"=>$value['sum']);
        }
        }else{
            $payment=array();
        }

        if(array_key_exists('Recharge', $payment))
        {
          $rechargeamt=$payment['Recharge']['Debit']['amount'];
          $rechargecount=$payment['Recharge']['Debit']['count'];
        }else{
          $rechargeamt=0;
          $rechargecount=0;
        }
        if(array_key_exists('Bill Payment', $payment))
        {
          $billamt=$payment['Bill Payment']['Debit']['amount'];
          $billcount=$payment['Bill Payment']['Debit']['count'];
        }else{
          $billamt=0;
          $billcount=0;
        }
        if(array_key_exists('Money Transfer', $payment))
        {
          $moneyamt=$payment['Money Transfer']['Debit']['amount'];
          $moneycount=$payment['Money Transfer']['Debit']['count'];
        }else{
          $moneyamt=0;
          $moneycount=0;
        }
        if(array_key_exists('Commission', $payment))
        {
          $commissionamt=$payment['Commission']['Credit']['amount'];
          $commissioncount=$payment['Commission']['Credit']['count'];
        }else{
          $commissionamt=0;
          $commissioncount=0;
        }
        if(array_key_exists('Surcharge', $payment))
        {
          $surchargeamt=$payment['Surcharge']['Debit']['amount'];
          $surchargecount=$payment['Surcharge']['Debit']['count'];
        }else{
          $surchargeamt=0;
          $surchargecount=0;
        }
        if(array_key_exists('Travel', $payment))
        {
          $travelamt=$payment['Travel']['Debit']['amount'];
          $travelcount=$payment['Travel']['Debit']['count'];
        }else{
          $travelamt=0;
          $travelcount=0;
        }
       
        if(array_key_exists('Fund Transfer', $payment))
        {
          $fundCreditAmt=$payment['Fund Transfer']['Credit']['amount'];
          $fundCreditcount=$payment['Fund Transfer']['Credit']['count'];
          if(isset($payment['Fund Transfer']['Debit']))
          {
            $fundDebitAmt=$payment['Fund Transfer']['Debit']['amount'];
            $fundDebitcount=$payment['Fund Transfer']['Debit']['count'];
          }else{
            $fundDebitAmt=0;
            $fundDebitcount=0;
          }
          
        }else{
          $fundCreditAmt=0;
          $fundCreditcount=0;
          $fundDebitAmt=0;
          $fundDebitcount=0;
        }

        $closing_balance=$opening_balance+$fundCreditAmt-$fundDebitAmt+$commissionamt-$rechargeamt-$surchargeamt-$moneyamt-$billamt-$travelamt;


        $detail='<table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>Report Type</th>
                <th>Amount (No of Count)</th>
              </tr>
            </thead>            
            <tbody>
              <tr>
                <th>Opening Balance</th>
                <td>'.inr($opening_balance).'</td>
              </tr>
             
              <tr>
                <th>Bill Payment</th>
                <td>'.inr($billamt).' ( '.$billcount.' )</td>
              </tr>
              <tr>
                <th>Travel Sale</th>
                <td>'.inr($travelamt).' ( '.$travelcount.' )</td>
              </tr>
              <tr>
                <th>DMT Sale</th>
                <td>'.inr($moneyamt).' ( '.$moneycount.' )</td>
              </tr>
              <tr>
                <th>Surcharge</th>
                <td>'.inr($surchargeamt).' ( '.$surchargecount.' )</td>
              </tr>
              <tr>
                <th>Recharge Sale</th>
                <td>'.inr($rechargeamt).' ( '.$rechargecount.' )</td>
              </tr>
              <tr>
                <th>Commission</th>
                <td>'.inr($commissionamt).' ( '.$commissioncount.' )</td>
              </tr>
              <tr>
                <th>Fund Transfer ( Credit )</th>
                <td>'.inr($fundCreditAmt).' ( '.$fundCreditcount.' )</td>
              </tr>
              <tr>
                <th>Fund Transfer ( Debit )</th>
                <td>'.inr($fundDebitAmt).' ( '.$fundDebitcount.' )</td>
              </tr>
              <tr>
                <th>Closing Balance</th>
                <td>'.inr($closing_balance).'</td>
              </tr>
            </tbody>
          </table>';

          echo $detail;
    }

        
    

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */