<?php
defined('BASEPATH') or exit('No script direct access allowed!');
/**
 * Author::Shubham Sahu
 */
date_default_timezone_set("Asia/Kolkata");
class Login extends CI_Controller
{
    
    public function __construct()
    {
       parent::__construct();
       $this->load->library('session');
       $this->load->model('User_model');
       $this->load->helper('url','form'); 
    }

    public function index()
    {
    	   $mobile=$this->input->post('mobile');
    	   $password=md5($this->input->post('password')); 
         $key = $this->User_model->customer_login($mobile,$password);
        if(@$key[0]!='')
        {
          $insert=[
            "mobile_no"=>$key[0]->mobile,
            "ip_addr"=> $_SERVER['REMOTE_ADDR'],
            "date_time"=> date("Y-m-d H:i:s"),
          ];
          $this->User_model->ipInsert($insert);
            $data = array(
                    'id' => $key[0]->id,
                    'user_type' => '4',
                    'mobile' => $key[0]->mobile,
                    'login_in'=>true,
                   );
          
            $this->session->set_userdata($data); 
            redirect('customer-profile');       
        }
        else{
        redirect(base_url());
      
        }
    	  
		    
    }
    public function save()
    {
        $mobile=$this->input->post('mobile');
        $email=$this->input->post('email');
        $password= randPasswordGenerator();
         $name = array(
        'user_type'=> '4',
          'mobile' =>$mobile,
          'email'=>$email,
          'password'=>md5($password),
        );
         $user=$this->User_model->check_mobile($mobile);
         if($user==true){
          $this->session->set_flashdata('message', '<div class="alert alert-success">Mobile Number Is already Register. </div>');
            redirect('home','refresh');
          } else{
           $ret=$this->User_model->insert($name);
            if($ret)
            {
              $message='Loan Sahara Registration Successfull, Your Password : '.$password;
              sendSMS($message,$mobile);
              $this->session->set_flashdata('message', '<div class="alert alert-success">Registration Successfull,Loan Sahara Password send you email Id and mobile No</div>');
            redirect('home','refresh');
            }else{
              $this->session->set_flashdata('message', '<div class="alert alert-success">Registration is not successfull,Loan Sahara Password send you email Id and mobile No</div>');
            redirect('home','refresh');
            }
        }
   }



   public function facebook()
  {
    
    if($this->session->userdata('login') == true){
      redirect('front/dashboard');
    }
    
    
      if ($this->facebook->logged_in())
      {
        $user = $this->facebook->user();

        if ($user['code'] === 200)
        {
          $this->session->set_userdata('login',true);
          $this->session->set_userdata('user_profile',$user['data']);
          redirect('customer-profile');
        }

      }
    
       else {
    
        $contents['link'] = $this->facebook->login_url();
      
        $this->load->view('front/index',$contents);
      
    
      }
  }
  
 /* public function profile(){
    if($this->session->userdata('login') != true){
      redirect('');
    }
    $contents['user_profile'] = $this->session->userdata('user_profile');
    $this->load->view('profile',$contents);
    
  }*/
   public function logout()
   {
    $this->session->sess_destroy();
    //$this->googleplus->revokeToken();
    redirect('home','refresh');
   }

}
