<?php
defined('BASEPATH') or exit('No script direct access allowed!');
/**
 * Author::Shubham Sahu
 */
class Customer extends CI_Controller
{
    
    public function __construct()
    {
       parent::__construct();
       $this->load->library('session');
       $this->load->model(array('Listall','User_model','Customer_model','Category_model'));
       $this->load->helper('url','form');
       if($this->session->userdata('login_in') !=true)
	    {
	      redirect(base_url().'customer-logout');
	    } 
    }

    public function index()
    {
    	$id=$this->session->userdata('id');
    	$type=$this->session->userdata('user_type');
        $mobile=$this->session->userdata('mobile');
    	$data['profile']=$this->User_model->edit($id);
    	$data['countries']=$this->User_model->state();
        $data['loan_detail']=$this->User_model->information($mobile);
        $data['sendMessage']=$this->Customer_model->sendMessage($id);
        $data['cats']=$this->Category_model->catListing();
         $country=$data['loan_detail'][0]->country;
         $state=$data['loan_detail'][0]->state;
         $city=$data['loan_detail'][0]->city;
         $data['country']= $this->Customer_model->country($country);

         $data['state']= $this->Customer_model->state($state);
         $data['city']= $this->Customer_model->city($city);
         //print_r($data['city']); die;
        $data['title']='Customer | Dashboard';
    	$this->load->view('front/dashboard',$data);
    }
    /*public function update()
    {
    	$data=[
    	'name'=>$this->input->post('name'),
    	'mobile'=>$this->input->post('mobile'),
    	'address1'=>$this->input->post('address1'),
    	'address2'=>$this->input->post('address2'),
    	'country'=>'103',
    	'state'=>$this->input->post('state'),
    	'city'=>$this->input->post('city'),
    	'dob'=>$this->input->post('dob'),
    	];
    	$id=$this->session->userdata('id');
    	$val=$this->User_model->update($id,$data);
    	if($val==1){
    	redirect('customer-profile','refresh');
    	}else{
    		redirect('customer-profile','refresh');
    	}
    }*/
    public function change()
    {
    	$old=$this->input->post('oldpass');
    	$pass=$this->input->post('password');
    	$id=$this->session->userdata('id');
    	$val=$this->User_model->changePass($id,$data);
    	if($val==1){
    	redirect('customer-profile','refresh');
    	}else{
    		redirect('customer-profile','refresh');
    	}
    }
    public function country()
    {
    	$id= $this->input->post('param');
    	$data=$this->User_model->city($id);
    	echo '<label class="pad" for="email"><h4>City</h4></label>';
        echo '<select  class="form-control" name="city" id="city"  title="enter your city.">';
       foreach($data as $row){
        echo '<option value='.$row->id.'>'.$row->name.'</option>';
    	}
        echo '</select>';
    }
    public function loanPayment($value)
    {
        $data['details']=$this->User_model->totalkist($value);
        $this->load->view('front/loan-details',$data);
    }

    public function aboutus()
    {
        $status=$this->User_model->profile_status($id); 
         $profile=$status[0]->profile_status;
        $data=[
        'name'=>$this->input->post('name'),
        'mobile'=>$this->input->post('mobile'),
        'marital'=>$this->input->post('marital'),
        'dob'=>$this->input->post('dob'),
        'qualification'=>$this->input->post('Qualification'),
        'nationality'=>$this->input->post('nationality'),
        'gender'=>$this->input->post('gender'),
        'profile_status'=> $profile + 30,
        ];
        $id=$this->session->userdata('id');
         
        $val=$this->User_model->update($id,$data);
        if($val==1){
            $this->session->set_flashdata('message', '<div class="alert alert-success" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Success! </strong> Profile Update Successfull.</div>');
        redirect('customer-profile','refresh');
        }else{
             $this->session->set_flashdata('message', '<div class="alert alert-danger" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Unsuccess! </strong> Profile Not Updated! <br> please try again!.</div>');
            redirect('customer-profile','refresh');
        }
    }
    public function contactInformation()
    {
    $status=$this->User_model->profile_status($id); 
         $profile=$status[0]->profile_status;
       $data=[
        'address1'=>$this->input->post('address1'),
        'address2'=>$this->input->post('address2'),
        'country'=>$this->input->post('country'),
        'state'=>$this->input->post('state'),
        'city'=>$this->input->post('city'),
        'profile_status'=> $profile + 20,
        ];
        $id=$this->session->userdata('id');
        $val=$this->User_model->update($id,$data);
        if($val==1){
            $this->session->set_flashdata('message', '<div class="alert alert-success" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Success! </strong> Profile Update Successfull.</div>');
        redirect('customer-profile','refresh');
        }else{
             $this->session->set_flashdata('message', '<div class="alert alert-danger" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Unsuccess! </strong> Profile Not Updated! <br> please try again!.</div>');
            redirect('customer-profile','refresh');
        }
    }
    public function employmentInformation()
    {
        $status=$this->User_model->profile_status($id); 
         $profile=$status[0]->profile_status;
        $data=[
        'emp_type'=>$this->input->post('emp_type'),
        'bank_name'=>$this->input->post('bank_name'),
        'emp_occupation'=>$this->input->post('emp_occupation'),
        'bank_address'=>$this->input->post('bank_address'),
        'salary'=>$this->input->post('salary'),
        'profile_status'=> $profile + 20,
        ];
        $id=$this->session->userdata('id');
        $val=$this->User_model->update($id,$data);
        if($val==1){
            $this->session->set_flashdata('message', '<div class="alert alert-success" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Success! </strong> Profile Update Successfull.</div>');
        redirect('customer-profile','refresh');
        }else{
             $this->session->set_flashdata('message', '<div class="alert alert-danger" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Unsuccess! </strong> Profile Not Updated! <br> please try again!.</div>');
            redirect('customer-profile','refresh');
        }
    }
    public function digitalKYC()
    {
                $config['upload_path']   = './pancard/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = 5048;
                $config['encrypt_name'] = TRUE; 
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('pan_image'))
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
        $status=$this->User_model->profile_status($id); 
         $profile=$status[0]->profile_status;
        $data=[
        'aadhar_no'=>$this->input->post('adhar_no'),
        'pan_no'=>$this->input->post('pan_no'),
        'aadhar_pic'=>$adhar,
        'pan_pic'=>$pancard,
        'profile_status'=> $profile + 10,
        ];
        $id=$this->session->userdata('id');
        $val=$this->User_model->update($id,$data);
        if($val==1){
            $this->session->set_flashdata('message', '<div class="alert alert-success" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Success! </strong> Profile Update Successfull.</div>');
        redirect('customer-profile','refresh');
        }else{
             $this->session->set_flashdata('message', '<div class="alert alert-danger" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Unsuccess! </strong> Profile Not Updated! <br> please try again!.</div>');
            redirect('customer-profile','refresh');
        }
    }
    public function applyLoan()
    {
        $values=[
      "loan_type"=>$this->input->post('loan_cat'),
        "emi_type_payment"=>$this->input->post('emi_type_payment'),
        "intrest_rate"=>$this->input->post('intrest_rate'),
        "emi_amount"=>$this->input->post('emi_amount'),
        "salary"=>$this->input->post('g_salary'),
        "balance"=>$this->input->post('loan_amount'),
        "month_emi"=>$this->input->post('month_emi'),
        "salary"=>$this->input->post('month_salary'),
        "name"=>$this->input->post('name'),
        "dob"=>$this->input->post('date_of_birth'),
      "job_year"=>$this->input->post('job_year'),
      "country"=>$this->input->post('country'),
      "mobile"=>$this->input->post('mobile_no'),
      "email"=>$this->input->post('email_id'),
      "city"=>$this->input->post('city'),
      "state"=>$this->input->post('state'),
      "address1"=>$this->input->post('address'),
      "tenure"=>$this->input->post('tenure'),
      "location"=>$this->input->post('location'),
      "property"=>$this->input->post('property'),
      "cibil"=>$this->input->post('cibil'),
      "Property_detail"=>$this->input->post('Property_detail'),
      "user_type"=>4,
      "created_date"=> date("l jS \of F Y h:i:s A"),
        ];

      //print_r($_REQUEST); die;
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
                    'website_name' => $setting['website']
                    );
                $body = $this->load->view('msg_temp/welcome.php',$data,TRUE);
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
                sendSMS($message,$mob);
                 $this->session->set_flashdata('message', '<div class="alert alert-success" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Success! </strong> Enquairy Send Successfull.</div>');
             redirect('customer-profile','refresh');
      }else{
         $this->session->set_flashdata('message', '<div class="alert alert-danger" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Unsuccess! </strong> Enquairy Not Send <br> please try again!.</div>');
         redirect('customer-profile','refresh');
      }
    }
    public function message()
    {
         $val=str_shuffle($this->input->post('name'));
         $ticket='tkt-'.$val.'-'.mt_rand(10000,99999); 
        $data=[
        'tkt_id'=>$ticket,
        'name'=>$this->input->post('name'),
        'mobile'=>$this->input->post('mobile'),
        'agent'=>$this->input->post('agent'),
        'agent_mobile'=>$this->input->post('agent_mobile'),
        'message'=>$this->input->post('client_message'),
        'user_id'=>$this->session->userdata('id')
        ];
        $val=$this->db->insert('loan_message_query',$data);
        if($val==1){
            $this->session->set_flashdata('message', '<div class="alert alert-success" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Success! </strong> Enquairy Send Successfull.</div>');
        redirect('customer-profile','refresh');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button> <strong>Unsuccess! </strong> Enquairy Not Send <br> please try again!.</div>');
            redirect('customer-profile','refresh');
        }
    }

}
