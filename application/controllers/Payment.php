<?php
/**
 * author:Shubham Sahu
 */
class Payment extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
        $this->load->model('Category_model');
        $this->load->helper('url');
        $this->load->model('Customer_model');
        $this->load->model('Payment_model');
	}
	public function index()
	{
		$data = array();
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
		$data['customers']= $this->Customer_model->loaninformation();
        $data['agents']=$this->Customer_model->agentlist();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('payment/list', $data);
        $this->load->view('templates/footer', $data);
	}
    public function transaction($id)
    {
        $data = array();
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
        $data['customers']= $this->Customer_model->loaninformations($id);

        $data['pending']= $this->Payment_model->pending($id);
        
        $data['agents']=$this->Customer_model->agentlist();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('payment/payment', $data);
        $this->load->view('templates/footer', $data);
    }
    public function approved($id)
    {
        $data = array();
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
        $data['customers']= $this->Customer_model->loanid($id);
        
        $data['agents']=$this->Customer_model->agentlist();
        //print_r($data['agents']); die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('payment/approved', $data);
        $this->load->view('templates/footer', $data);
    }
    public function loan()
    {
        $id=$this->input->post('parent_id');

        $data=$this->Customer_model->loan($id);
        if($data)
        {
            $details= $this->Customer_model->loanid($id);
            foreach($details as $detail)
            {
                   $today = date('Y-m-d'); 
                  for ($i=1; $i <= $detail->month_emi ; $i++) 
                  { 
                    $total=round(($detail->balance + ($detail->balance /$detail->month_emi))/$detail->month_emi);
                     $compound=$total * $detail->month_emi / 100 + $total;
                     $repeat = strtotime("+1 month",strtotime($today));
                    $today = date('Y-m-d',$repeat);
                    $this->db->query("INSERT INTO `loan_appoved`(`information_id`, `mobile_no`, `agent_id`, `emi_month`, `emi_intrest`, `balance`, `pending`, `extrapayment`, `payment_date`) VALUES ('$id','$detail->mobile','$detail->parent_id','$i++','$detail->intrest_rate','$compound','0','0','$today')");
                    }
            } 
            echo true;

        }
        else{
            echo false;
        }
    }
    public function agentSelect()
    {
         $agent=$this->input->post('agent_id');
         $customer=$this->input->post('customer_id');
         $data= $this->Customer_model->agentpayment($agent,$customer);
         if($data==true)
        {
           echo "Agent Selected Successfull";
        }else{
            echo "Please try again!";
        }
    }
    public function installment($id,$mobile)
    {
        $data = array();
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
        $data['customers']= $this->Customer_model->loaninformations($id);

        $data['pending']= $this->Payment_model->Approvid($id);
        $data['users']= $this->Customer_model->mobile($mobile);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('payment/online', $data);
        $this->load->view('templates/footer', $data);

    }
    public function online()
    {
        $rand='txt-'.str_shuffle($this->input->post('name')).'-'.rand(10000,99999);
       $data=[
        'payment_id'=> $this->input->post('id'),
        'name'=> $this->input->post('name'),
        'email'=> $this->input->post('email'),
        'mobile'=> $this->input->post('mobile'),
        'balance'=> $this->input->post('balance'),
        'installment'=> $this->input->post('installment'),
        'extrapayment'=> $this->input->post('extrapayment'),
        'last_date'=> $this->input->post('last_date'),
        'payment_date'=> $this->input->post('payment_date'),
        'payment_type'=> 'online',
        'txt_id'=> $rand,
       ];
       $success=$this->Payment_model->payment_online($data);
       if($success)
       {
            $this->Payment_model->updateApprovel($this->input->post('id'));
            $this->session->set_userdata('success_msg', 'Payment has been successfully.');
        }else{
            $this->session->set_userdata('error_msg', 'payment Some problems occurred, please try again.');
        }
       redirect('payment','refresh');
    }
    public function cash($id,$mobile)
    {
        $data = array();
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
        $data['customers']= $this->Customer_model->loaninformations($id);
        $data['pending']= $this->Payment_model->Approvid($id);
        $data['users']= $this->Customer_model->mobile($mobile);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('payment/cash', $data);
        $this->load->view('templates/footer', $data);

    }
    public function cashPayment()
    {
        $rand='txt-'.str_shuffle($this->input->post('name')).'-'.rand(10000,99999);
       $data=[
        'payment_id'=> $this->input->post('id'),
        'name'=> $this->input->post('name'),
        'email'=> $this->input->post('email'),
        'mobile'=> $this->input->post('mobile'),
        'balance'=> $this->input->post('balance'),
        'installment'=> $this->input->post('installment'),
        'extrapayment'=> $this->input->post('extrapayment'),
        'last_date'=> $this->input->post('last_date'),
        'payment_date'=> $this->input->post('payment_date'),
        'payment_type'=> 'cash',
        'txt_id'=> $rand,
       ];
      // print_r($data); die;
       
       $success=$this->Payment_model->payment_online($data);
       if($success)
       {
            $this->Payment_model->updateApprovel($this->input->post('id'));
            $this->session->set_userdata('success_msg', 'Payment has been successfully.');
        }else{
            $this->session->set_userdata('error_msg', 'payment Some problems occurred, please try again.');
        }
       redirect('payment','refresh');
    }
    public function getBalance()
    {
        $pointStart= $this->Payment_model->startDate();
        $enddate=$this->Payment_model->endDate();
        $data=$this->Payment_model->totalData();
        echo json_encode(
            array(
            'pointStart'=> strtotime($pointStart[0]->created_at),
            'pointInterval'=> strtotime($enddate[0]->created_at),
            'dataLength'=> 100000000,
            'data'=> $data[0]->balance,)
             );
    }

}