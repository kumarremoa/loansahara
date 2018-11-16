<?php
defined('BASEPATH') or exit('No script direct access allowed!');
/**
 * Author::Shubham Sahu
 */
class Home extends CI_Controller
{
    public function __construct()
    {
       parent::__construct();
       $this->load->library('session');
       $this->load->helper('url','form');
       $this->load->library(array('facebook','Google')); 
       //$this->load->library(array('Google'));
       $this->load->model(array('Enquairy','Category_model','User_model'));

    }
    public function index()
    {
      $data['title']='Home';
      $data['active']='current';
      $data['link'] = $this->facebook->login_url();
      $data['login_url'] = $this->google->get_login_url();
      $this->load->view('front/index',$data);
      
    }
    public function about()
    {
      $data['title']='About us';
      $data['active']='current';
      $data['link'] = $this->facebook->login_url();
      $data['login_url'] = $this->google->get_login_url();
      $this->load->view('front/about',$data);
      
    }
    public function work()
    {
      $data['title']='How It Works';
      $data['active']='current';
      $data['link'] = $this->facebook->login_url();
      $data['login_url'] = $this->google->get_login_url();
      $this->load->view('front/how-it-works',$data);
      
    }
   /* public function loan()
    {
      $data['title']='Loan In 48 Hours';
      $this->load->view('front/shop-loan-gurgaon');
      
    }*/
    public function loan_hours()
    {
      $data['title']='Loan In 48 Hours';
      $data['active']='current';
      $data['login_url'] = $this->google->get_login_url();
      $data['link'] = $this->facebook->login_url();
      $this->load->view('front/loan-in-48-hours',$data);
      
    }
    public function shop_loan_gurgaon()
    {
      $data['title']='Shop Loan';
      $this->load->view('front/shop-loan-gurgaon',$data);
      
    }
    public function other_loan()
    {
      $data['title']='Others Loan';
      $this->load->view('front/others-loan',$data);
      
    }
    public function hotel_loan()
    {
      $data['title']='Hotel Loan';
      $this->load->view('front/hotel-loan-gurgaon',$data);
      
    }
    public function factory_loan()
    {
      $data['title']='Factory Loan';
      $this->load->view('front/factory-loan-gurgaon',$data);
      
    }
    public function business()
    {
      $data['title']='Business loan';
      $this->load->view('front/business-loan',$data);
      
    }
    public function sahara()
    {
      $data['title']='Why Loan Sahara';
      $data['active']='current';
      $data['login_url'] = $this->google->get_login_url();
      $data['link'] = $this->facebook->login_url();
      $this->load->view('front/why-loan-sahara',$data);
      
    }
    public function contact()
    {
      $data['title']='Contact Us';
      $data['active']='current';
      $data['login_url'] = $this->google->get_login_url();
      $data['link'] = $this->facebook->login_url();
      $this->load->view('front/contact',$data);
      
    }
  
    public function applyloan()
    {
      $data['title']='Apply Loan';
      $data['active']='current';
      $data['login_url'] = $this->google->get_login_url();
      $data['link'] = $this->facebook->login_url();
      $data['country']=$this->User_model->country();
      $data['cats']=$this->Category_model->catListing();
      $this->load->view('front/applyloan',$data);
    }
    public function privacy()
    {
      $data['title']='Privacy policy';
      $data['active']='current';
      $data['login_url'] = $this->google->get_login_url();
      $data['link'] = $this->facebook->login_url();
      $this->load->view('front/privacy',$data);
    }
    public function applycontact()
    {
      $data1=$this->Enquairy->contact_us($this->input->post());
      if($data1)
      {
        $email=$this->input->post('email');
        $name=$this->input->post('name');
        $mob=$this->input->post('mobile');
         //print_r($data); die;
            $setting = settings();
            $sub = "Thanks for Loan Sahara Apply Form Send Success full";
            $message = "Thanks for Loan Sahara Query Send Success full";
                $data['email'] = $this->input->post('email'); 
                $data['name'] = $this->input->post('name');
                if (isset($setting['svg']) &&  $setting['svg'] != ''){
                    $logo = $setting['svg'];
                } else {
                    $logo = base_url('assets/images/').$setting['logo'];
                }    
                $data = array(
                    'user_name' => $name,
                    'action_url' =>base_url(),
                    'image_url' =>base_url('assets/images/'),
                    'sender_name' => $setting['company_name'],
                    'logo' => $logo,
                    'website_name' => $setting['website']
                    );
                $body = $this->load->view('msg_temp/contact.php',$data,TRUE);
                //$body = $body->html;
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
                sendSMS($message,$mob);
             $this->session->set_flashdata('message', '<div class="alert alert-success" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Success! </strong> Enquairy Send Successfull.</div>');
             redirect('contact','refresh');
      }else{
         $this->session->set_flashdata('message', '<div class="alert alert-danger" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Unsuccess! </strong> Enquairy Not Send <br> please try again!.</div>');
         redirect('contact','refresh');
      }
    }
    public function selectState()
    {
        $state=$this->input->post('state');
       $data=$this->User_model->stateid($state);
       echo '<label for="State">Enter State</label>';
       echo '<select class="form-control" id="state" name="state" onchange="selectCity(this.value);">';
        foreach ($data as $key => $value) {
          echo ' <option value='.$value->id.'>'.$value->name.'</option>';
        }
        echo '</select>';

    }
    public function selectCity()
    {
      $city= $this->input->post('city');
      $data=$this->User_model->city($city);
      echo '<label for="City">Enter City</label>';
       echo '<select class="form-control" id="city" name="city">';
        foreach ($data as $key => $value) {
          echo ' <option value='.$value->id.'>'.$value->name.'</option>';
        }
        echo '</select>';
    }
    public function success()
    {

      $this->load->view('front/temp/mail');
    }
    public function forget()
    {
      $mobile=$this->input->post('mobile');
      $pass=$this->User_model->get_forget($mobile);
      $val=$pass[0]->mobile;
      $password= randPasswordGenerator();
      $p=[
        'password'=> md5($password),
      ];
      $ret=$this->User_model->forgetPassword($val,$p);
      if($ret)
      {
        $message='Loan Sahara Send Password Successfull, New Password Is: '.$password;
        sendSMS($message,$mobile);
        $this->session->set_flashdata('message', '<div class="alert alert-success">New Password Send your Mobile No Successfully Loan Sahara </div>');
      redirect('home','refresh');
      }else{
        $this->session->set_flashdata('message', '<div class="alert alert-success">Mobile Did Not Match Loan Sahara</div>');
      redirect('home','refresh');
      }
    }
}