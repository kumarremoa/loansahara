<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applyloan extends CI_Controller {


	function __construct() {
	    parent::__construct();
	    $this->load->model('Enquairy');
	    $this->load->library('session');
      $this->load->library('email');
       $this->load->model('user');        
        $this->load->model('listall');        
        $this->load->model('Report'); 
  	}

  	public function index()
  	{
      //Array ( [loanamount] => 50,00,000 [loaninterest] => 10.5 [loantenure] => loanyear [loanterm] => 20 [emischeme] => [loanproduct] => home-loan [loanstartdate] => [loandata] => [calcversion] => 4.0 [mobile_no] => 3424234324 [email_id] => sadsad@sfdsf [name] => shubham324 [date_of_birth] => 234fsdfdsf [location] => Gurugram [property] => 1 [cibil] => Excellent [Property_detail] => 1 )
  	  $values=[
      "loan_type"=>$this->input->post('loanproduct'),
  		"intrest_rate"=>$this->input->post('loaninterest'),
      "balance"=> str_replace(',','', $this->input->post('loanamount')),
  		///"emi_amount"=>$this->input->post('loanterm'),
  		"tenure"=>$this->input->post('loantenure'),
  		"month_emi"=>$this->input->post('loanterm'),
  		"pancard"=>$this->input->post('pancard'),
      "adhar"=>$this->input->post('adhar'),
      "mobile"=>$this->input->post('mobile_no'),
      "email"=>$this->input->post('email_id'),
      "address1"=>$this->input->post('address1'),
      "location"=>$this->input->post('location'),
      "property"=>$this->input->post('property'),
      "cibil"=>$this->input->post('cibil'),
      "Property_detail"=>$this->input->post('Property_detail'),
      "user_type"=>4,
      "created_date"=> date("l jS \of F Y h:i:s A"),
  		];

     //print_r($values); die;
  		$enq=$this->Enquairy->apply($values);
      if($enq)
      {
        $email=$this->input->post('email');
        $name=$this->input->post('name');
        $mob=$this->input->post('mobile');
         $data = $this->user->getByEmail($this->input->post('email'));
         //print_r($data); die;
            $setting = settings();
            $sub = "Thanks for Loan Sahara Apply Form Send Success full";
            $message = "Thanks for Loan Sahara Apply Form Send Success full";
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
                    'email' => $email,
                    'website_name' => $setting['website']
                    );
                $body = $this->load->view('msg_temp/success',$data,TRUE);
                //$body = $body->html;
                /*foreach ($data as $key => $value) {
                    $body = str_replace('{var_'.$key.'}', $value, $body);
                }*/
               
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
        		 $this->session->set_flashdata('message', '<div class="alert alert-success" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Success! </strong> Thanks for Loan Sahara Apply Form Send Success full.</div>');
             redirect('apply-loan','refresh');
      }else{
         $this->session->set_flashdata('message', '<div class="alert alert-danger" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Unsuccess! </strong> Loan Sahara Apply Form Not Success <br> please try again!.</div>');
         redirect('apply-loan','refresh');
      }
  		

  	}
     public function htmlmail($email,$name){
        $config = Array(        
            'protocol' => 'sendmail',
            'smtp_host' => 'mail.loansahara.pw',
            'smtp_port' => 465,
            'smtp_user' => 'noreply@loansahara.pw',
            'smtp_pass' => 'jK5qC$w39$C-',
            'smtp_timeout' => '4',
            'mailtype'  => 'php', 
            'charset'   => 'iso-8859-1'
        );
        $subject="Loan Sahara";
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('noreply@loansahara.pw', 'Anil Labs');
        $data = array('name'=> $name,'email'=>$email);
        $this->email->to($email);  
        $this->email->subject($subject); 
        $body = $this->load->view('msg_temp/welcome.php',$data,TRUE);
        $this->email->message($body);   
        $this->email->send();
    }

}


