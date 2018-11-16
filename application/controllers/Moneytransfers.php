<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Moneytransfers extends CI_Controller {

	function __construct() {
        parent::__construct();

        is_login();
        $this->load->model('user');      
        $this->load->model('moneytransfer');      
        
    }

	public function index()
	{
		$data = array();
        $postData = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));

        // Validate User Auth.        
        if(!CheckPermission(MONEYTRANSFER, "own_read")){
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
		//$this->session->unset_userdata('senderRef');
        //load the list page view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('services/moneytransfer', $data);
        $this->load->view('templates/footer', $data);

	}

	public function newsender()
	{	

		$mobile=$this->input->post('mobile');
		$arr=json_encode(array("mobile"=>$mobile));
	    $url=api_url().'ezypaymoney/newsender';	    
	    $postfields=$arr;
	    $response=curl_function($postfields,$url);
	    $response = json_decode($response, true);

	    if( $response['statuscode'] == 400){

	    		$url=api_url().'ezypaymoney/getbeneficiarylist';
			    $response=curl_function($postfields,$url);			 
			    $response = json_decode($response, true);			   

			    $message =  '<div class="col-md-2"></div>  
		               	
		               	<div class="col-md-8 table-bordered" id="senderMobile">		               	
		               		<div class="callout callout-info" style="margin-top:5px;">
			               	 <h4>Available Balance For Transfer : '.inr($this->userbalance($mobile)).'</h4>
			              	</div>
			              	<div class="clearfix"></div>
			               		<div class="col-md-12">			               			
			               			<h3 class="pull-left">Beneficiary Details</h3>
			               			<input type="hidden" class="form-control" id="mobile" name="mobile" value="'.$mobile.'">
			               			<a onclick="return addBeni()" style="margin-top: 10px;" class="btn btn-danger btn-flat pull-right"  data-toggle="tooltip" data-placement="top" title="Add Beneficiary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Beneficiary</a>
			               		</div>
			               		<div class="clearfix"></div><hr>';
			    if($response['statuscode'] == '200'){
			         $message .= '<table class="table-bordered table-condensed table-striped col-lg-12">									
			               			<tr>	
			               				<td>Sl No.</td>
			               				<td>Name</td>
			               				<td>Bank</td>
			               				<td>A/C No</td>
			               				<td></td>
			               			</tr>';
			        $i = 1;       			
			        foreach ($response['data']['Beneficiary'] as $value) {
			        				
			        	$message .= '<tr><td>'. $i .'</td><td>'.$value['BeneficiaryName'].'</td><td>'.$value['Bankname'].'</td><td>'.$value['AccountNumber'].'</td><td><a type="button" onclick="return sendMoney(\''.$value['BeneficiaryCode'].'\',\''.$value['Bankname'].'\')" class="btn btn-info btn-flat">Send Money</a><a onclick="return removebeni(\''.$value['BeneficiaryCode'].'\',\''.$mobile.'\')" class="btn btn-danger btn-flat">Remove</a></td></tr>';
			        	$i++;
			       	}

			       	$message .= '</table></div><div class="col-md-2"></div>';
			      
	             }else {

	             	$message .= 'No Record Found</div><div class="col-md-2"></div>';	             	
	             	
	             }  
	             echo $message;		


			   	
	    }elseif($response['statuscode'] == 200) {

	    	echo '		<div class="col-md-4"></div>              
		               	<div class="col-md-4 table-bordered" id="senderMobile">	
		               	<h3 class="text-center">Enter OTP </h3><hr>
						<div class="form-group col-md-12">
		                    <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP here..." value="">
		                    <input type="hidden" class="form-control" id="ref" name="ref" value="'.$response['data']['ref_no'].'">
		                    <input type="hidden" class="form-control" id="mobile" name="mobile" value="'.$this->input->post('mobile').'">
		                </div>
		                <div class="form-group col-md-6">
		                    <input type="submit" name="resend" id="resend" onclick="return resendotp()" class="btn btn-danger btn-flat btn-block" value="Re-Send OTP"/> 
		                </div>
		                 <div class="form-group col-md-6">
		                    <input type="submit" name="verify" id="verify" onclick="return verifyotp()" class="btn btn-success btn-flat btn-block" value="Verify OTP"/> 
		                </div>
		                </div>              
		               	<div class="col-md-4"></div> 
		               	<div class="clearfix"></div> 
		                ';
	    }elseif($response['statuscode'] == 500) {
	    	echo '<div class="col-md-4"></div><div class="col-md-4">API Key Required</div><div class="col-md-4"></div>';
	    }
	    
	}

	function userbalance($mobile){

		$arr=json_encode(array("mobile"=>$mobile));
	    $url=api_url().'ezypaymoney/userbalance';	    
	    $postfields=$arr;
	    $response=curl_function($postfields,$url);
	    $response = json_decode($response, true);
	    return $response['data']['balance'];

	}

	public function resendotp()
	{	

		$mobile=$this->input->post('mobile');
		$ref=$this->input->post('ref');
		$arr=json_encode(array("ref_no"=>$ref, "mobile"=>$mobile));
	    $url=api_url().'ezypaymoney/resendotp';	    
	    $postfields=$arr;
	    $response=curl_function($postfields,$url);
	    $response = json_decode($response, true);

	    if( $response['statuscode'] == 200 && $response['data']['status'] == 'SUCCESS'){

	    	echo '		<div class="col-md-4"></div>              
		               	<div class="col-md-4 table-bordered" id="senderMobile">	
		               	<h3 class="text-center">Enter OTP </h3><hr>
						<div class="form-group col-md-12">
		                    <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP here..." value="">
		                    <input type="hidden" class="form-control" id="ref" name="ref" value="'.$this->input->post('ref').'">
		                    <input type="hidden" class="form-control" id="mobile" name="mobile" value="'.$this->input->post('mobile').'">
		                </div>
		                <div class="form-group col-md-6">
		                    <input type="submit" name="resend" id="resend" onclick="return resendotp()" class="btn btn-danger btn-flat btn-block" value="Re-Send OTP"/> 
		                </div>
		                 <div class="form-group col-md-6">
		                    <input type="submit" name="verify" id="verify" onclick="return verifyotp()" class="btn btn-success btn-flat btn-block" value="Verify OTP"/> 
		                </div>
		                </div>              
		               	<div class="col-md-4"></div> 
		               	<div class="clearfix"></div> 
		                ';
	    			
	    }else {

	    	echo 'dfghj';
	    	
	    }

	    
	}

	public function otpverification()
	{	

		$mobile=$this->input->post('mobile');
		$ref=$this->input->post('ref');
		$otp=$this->input->post('otp');
		$arr=json_encode(array("ref_no"=>$ref, "otp"=>$otp, "mobile"=>$mobile));
	    $url=api_url().'ezypaymoney/otpverification';	    
	    $postfields=$arr;
	    $response=curl_function($postfields,$url);
	    $response = json_decode($response, true);
	   // print_r($arr);die;
	    if( $response['statuscode'] == 200){

	    	$postfields=array("mobile"=>$mobile);
	    	$url=api_url().'ezypaymoney/getbeneficiarylist';
			    $response=curl_function($postfields,$url);
			  //  print_r($response);die;
			    $response = json_decode($response, true);

			    $message =  '<div class="col-md-3"></div>  
		               	<div class="col-md-6 table-bordered" id="senderMobile">

			               		<div class="col-md-12">			               		
			               			<h3 class="pull-left">Beneficiary Details</h3>
			               			<a onclick="return addBeni()" style="margin-top: 10px;" class="btn btn-danger btn-flat pull-right"  data-toggle="tooltip" data-placement="top" title="Add Beneficiary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Beneficiary</a>
			               		</div>
			               		<div class="clearfix"></div><hr>';
			    if($response['statuscode'] == '200'){
			         $message .= '<table class="table-bordered table-condensed table-striped col-lg-12">									
			               			<tr>	
			               				<td>Sl No.</td>
			               				<td>Name</td>
			               				<td>Bank</td>
			               				<td>A/C No</td>
			               				<td></td>
			               			</tr>';
			        $i = 1;       			
			        foreach ($response['data']['Beneficiary'] as $value) {
			        				
			        	$message .= '<tr><td>'. $i .'</td><td>'.$value['BeneficiaryName'].'</td><td>'.$value['Bankname'].'</td><td>'.$value['AccountNumber'].'</td><td><a type="button" onclick="return sendMoney(\''.$value['BeneficiaryCode'].'\',\''.$value['Bankname'].'\')" class="btn btn-info btn-flat">Send Money</a><a onclick="return removebeni(\''.$value['BeneficiaryCode'].'\',\''.$mobile.'\')" class="btn btn-danger btn-flat">Remove</a></td></tr>';
			        	$i++;
			       	}

			       	$message .= '</table></div><div class="col-md-3"></div>';
			      
	             }else {

	             	$message .= 'No Record Found</div><div class="col-md-3"></div>';	             	
	             	
	             }  
	             echo $message;	
	    			
	    }else {

	    		echo '	<div class="col-md-4"></div>              
		               	<div class="col-md-4 table-bordered" id="senderMobile">	
		               	<h3 class="text-center">Enter OTP </h3><hr>
						<div class="form-group col-md-12">
		                    <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP here..." value="">
		                    <input type="hidden" class="form-control" id="ref" name="ref" value="'.$this->input->post('ref').'">
		                    <input type="hidden" class="form-control" id="mobile" name="mobile" value="'.$this->input->post('mobile').'">
		                </div>
		                <div class="form-group col-md-6">
		                    <input type="submit" name="resend" id="resend" onclick="return resendotp()" class="btn btn-danger btn-flat btn-block" value="Re-Send OTP"/> 
		                </div>
		                 <div class="form-group col-md-6">
		                    <input type="submit" name="verify" id="verify" onclick="return verifyotp()" class="btn btn-success btn-flat btn-block" value="Verify OTP"/> 
		                </div>
		                </div>              
		               	<div class="col-md-4"></div> 
		               	<div class="clearfix"></div> 
		                ';
	    	
	    }

	    
	}

	public function addbeneficiary()
	{	
		$mobile=$this->input->post('mobile');
		$url=api_url().'ezypaymoney/banklist';
		$postfields ='';
	    $response=curl_function($postfields,$url);
	    $response = json_decode($response, true);
	 //   print_r($response);
	    $message =  '<div class="col-md-4"></div>  
		               	<div class="col-md-4 table-bordered" id="senderMobile">
			               		<div class="col-md-12">
			               			<h3 class="pull-left">Beneficiary Details</h3>
			               			<a onclick="return returnBeni()" style="margin-top: 10px;" class="btn btn-danger btn-flat pull-right"><i class="fa fa-reply" aria-hidden="true"></i> Back</a>
			               		</div><input type="hidden" class="form-control" id="mobile" name="mobile" value="'.$mobile.'">
			               		<div class="clearfix"></div><hr><div class="form-group col-md-12">
				                    <input type="text" class="form-control" id="account_no" name="account_no" placeholder="Enter A/c no..." value=""></div><div class="form-group col-md-12">
				                <select class="form-control select2" name="ifsc" id="ifsc" >';                                              
							      foreach($response['data'] as $data){							         
							       $message .= '<option value="'.$data['bank_code'].'">'.$data['bank_name'].'</option>';	
							      }
		$message .= '</select></div> <div class="form-group col-md-12"><input type="submit" name="beni" id="beni" onclick="return saveBeni()" class="btn btn-success btn-block btn-flat btn-block" value="SAVE"/></div> </div><div class="col-md-4"></div>';		                		

		echo $message;
	   

	    
	}

	public function viewbeneficiary()
	{	

		$mobile=$this->input->post('mobile');
		$arr=json_encode(array("mobile"=>$mobile));
	    $url=api_url().'ezypaymoney/getbeneficiarylist';	    
	    $postfields=$arr;
	    $response=curl_function($postfields,$url);
	    $response = json_decode($response, true);
	    
		  $message =  '<div class="col-md-2"></div>  
	               	<div class="col-md-8 table-bordered" id="senderMobile">
		               		<div class="col-md-12">
		               			<h3 class="pull-left">Beneficiary Details</h3><input type="hidden" class="form-control" id="mobile" name="mobile" value="'.$mobile.'">
		               			<a onclick="return addBeni()" style="margin-top: 10px;" class="btn btn-danger btn-flat pull-right"  data-toggle="tooltip" data-placement="top" title="Add Beneficiary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Beneficiary</a>
		               		</div>
		               		<div class="clearfix"></div><hr>';
		    if($response['statuscode'] == '200'){
		         $message .= '<table class="table-bordered table-condensed table-striped col-lg-12">									
		               			<tr>	
		               				<td>Sl No.</td>
		               				<td>Name</td>
		               				<td>Bank</td>
		               				<td>A/C No</td>
		               				<td></td>
		               			</tr>';
		        $i = 1;       			
		        foreach ($response['data']['Beneficiary'] as $value) {
		        				
		        	$message .= '<tr><td>'. $i .'</td><td>'.$value['BeneficiaryName'].'</td><td>'.$value['Bankname'].'</td><td>'.$value['AccountNumber'].'</td><td><a type="button" onclick="return sendMoney(\''.$value['BeneficiaryCode'].'\',\''.$value['Bankname'].'\')" class="btn btn-info btn-flat">Send Money</a><a onclick="return removebeni(\''.$value['BeneficiaryCode'].'\',\''.$mobile.'\')" class="btn btn-danger btn-flat">Remove</a></td></tr>';
		        	$i++;
		       	}

		       	$message .= '</table></div><div class="col-md-2"></div>';
		      
	         }else {

	         	$message .= 'No Record Found</div><div class="col-md-2"></div>';	             	
	         	
	         }  
	         echo $message;	
	    
	}

	public function removebeneficiary()
	{	

		$mobile=$this->input->post('mobile');
		$benecode=$this->input->post('benecode');
		$arr=json_encode(array("mobile"=>$mobile, "benecode"=>$benecode));
	    $url=api_url().'ezypaymoney/deletebeneficiary';	    
	    $postfields=$arr;	   
	    $response=curl_function($postfields,$url);
	    $response = json_decode($response, true);
	    if($response['statuscode'] == '200'){
			$message =  '<div class="col-md-4"></div>  
			               	<div class="col-md-4 table-bordered" >
		               		<div class="col-md-12">
		               			<h3 class="pull-left">Beneficiary Status</h3>
		               			<a onclick="return returnBeni()" style="margin-top: 10px;" class="btn btn-danger btn-flat pull-right"><i class="fa fa-reply" aria-hidden="true"></i> Back</a>
		               		</div><div class="clearfix"></div><hr><input type="hidden" class="form-control" id="mobile" name="mobile" value="'.$mobile.'">	

							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
							  <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
							  <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
							</svg>
							<p class="success">Beneficiary Removed Successfully</p>
		               		</div><div class="col-md-4"></div>';
		}else{

			$message =  '<div class="col-md-4"></div>  
			               	<div class="col-md-4 table-bordered" >
		               		<div class="col-md-12">
		               			<h3 class="pull-left">Beneficiary Status</h3>
		               			<a onclick="return returnBeni()" style="margin-top: 10px;" class="btn btn-danger btn-flat pull-right"><i class="fa fa-reply" aria-hidden="true"></i> Back</a>
		               		</div><div class="clearfix"></div><hr><input type="hidden" class="form-control" id="mobile" name="mobile" value="'.$mobile.'">	

							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
								  <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
								  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
								  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
								</svg>
							<p class="error">Beneficiary Removal Unsuccessful.</p>
		               		</div><div class="col-md-4"></div>';
		}
	    echo $message;	
	    
	}


	public function savebeneficiary()
	{	

		$mobile=$this->input->post('mobile');
		$account_no=$this->input->post('account_no');
		$ifsc=$this->input->post('ifsc');

		$query = $this->moneytransfer->checkAccountNo($account_no);
		
		if($query){
			$name = $query['name'];
			//----Deduct commission
		
		}else {			
			$arr=json_encode(array("mobile"=>$mobile, "account_no"=>$account_no, "bankcode"=>$ifsc));
		    $url=api_url().'ezypaymoney/accountvalidation';	    	   
		    $postfields=$arr;
		    $response=curl_function($postfields,$url);
		    $response = json_decode($response, true);
		  
		    if($response['statuscode'] == 200){
		    	$name = $response['data']['benename'];
		    	$postData = array(
                'name' => $name,
                'account' => $account_no,
                'bank' => $ifsc
                 );

		    	$query = $this->moneytransfer->addAccountNo($postData);

		    	if($query){
		    		//----Deduct commission		    		
		    	}else {
		    		return false;
		    	}
		    }	    

		}



		$arr=json_encode(array("mobile"=>$mobile, "benename"=>$name, "account_no"=>$account_no, "ifsc"=>$ifsc));


	    $url=api_url().'ezypaymoney/addbeneficiary';	    	   
	    $postfields=$arr;
	    $response=curl_function($postfields,$url);
	    $response = json_decode($response, true);
	  // print_r($response);die;


		
	   		$postfieldsa=json_encode(array("mobile"=>$mobile));
	   		//print_r($postfieldsa);die;
	    	$urla=api_url().'ezypaymoney/getbeneficiarylist';
			$responsea=curl_function($postfieldsa,$urla);
			  //  print_r($response);die;
			$responsea = json_decode($responsea, true);

			//print_r($responsea);die;
		  $message =  '<div class="col-md-3"></div>  
	               	<div class="col-md-6 table-bordered" id="senderMobile">';
	               	if($response['statuscode']==200){
	               			$message .= '<div class="alert alert-success" style="margin-top:5px;">'.$response['data']['message'].'</div>';
	               		} else {
	               			$message .= '<div class="alert alert-danger" style="margin-top:5px;">'.$response['data']['message'].'</div>';
	               		}	
		  $message .= '<div class="col-md-12">
		               			<h3 class="pull-left">Beneficiary Details</h3><input type="hidden" class="form-control" id="mobile" name="mobile" value="'.$mobile.'">
		               			<a onclick="return addBeni()" style="margin-top: 10px;" class="btn btn-danger btn-flat pull-right"  data-toggle="tooltip" data-placement="top" title="Add Beneficiary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Beneficiary</a>
		               		</div>
		               		<div class="clearfix"></div><hr>';
		    if($responsea['statuscode'] == '200'){
		         $message .= '<table class="table-bordered table-condensed table-striped col-lg-12">									
		               			<tr>	
		               				<td>Sl No.</td>
		               				<td>Name</td>
		               				<td>Bank</td>
		               				<td>A/C No</td>
		               				<td></td>
		               			</tr>';
		        $i = 1;       			
		        foreach ($responsea['data']['Beneficiary'] as $value) {
		        				
		        	$message .= '<tr><td>'. $i .'</td><td>'.$value['BeneficiaryName'].'</td><td>'.$value['Bankname'].'</td><td>'.$value['AccountNumber'].'</td><td><a type="button" onclick="return sendMoney(\''.$value['BeneficiaryCode'].'\',\''.$value['Bankname'].'\')" class="btn btn-info btn-flat">Send Money</a><a onclick="return removebeni()" class="btn btn-danger btn-flat">Remove</a></td></tr>';
		        	$i++;
		       	}

		       	$message .= '</table></div><div class="col-md-3"></div>';
		      
	         }else {

	         	$message .= 'No Record Found</div><div class="col-md-3"></div>';	             	
	         	
	         }  
	         echo $message;	

	}

	public function sendMoney(){
		$id=$this->input->post('id');
		$mobile=$this->input->post('mobile');
		$benecode=$this->input->post('code');
		$bank=$this->input->post('bank');		
		$query = $this->moneytransfer->bankDetails($bank);


		 $message =  '<div class="col-md-4"></div>  
		               	<div class="col-md-4 table-bordered" id="senderMobile" >
			               		<div class="col-md-12">
			               			<h3 class="pull-left">Send Money</h3>
			               			<a onclick="return returnBeni()" style="margin-top: 10px;" class="btn btn-danger btn-flat pull-right"><i class="fa fa-reply" aria-hidden="true"></i> Back</a>
			               		</div><input type="hidden" class="form-control" id="id" name="id" value="'.$id.'"><input type="hidden" class="form-control" id="mobile" name="mobile" value="'.$mobile.'">
			               		<input type="hidden" class="form-control" id="benecode" name="benecode" value="'.$benecode.'">
			               		<div class="clearfix"></div><hr>
			               		<div class="form-group col-md-12">
			               		<select class="form-control select2" name="transtype" id="transtype" >';

			               		if($query[0]['imps'] == 1){
			               			$message .= '<option value="imps" selected >IMPS</option>';
			               		}
			               		if($query[0]['neft'] == 1){
			               			$message .= '<option value="neft">NEFT</option>';
			               		}

		$message .= 	'</select>				                   
				                </div>
				                <div class="form-group col-md-12">
				                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount" value="">
				                </div>
				                 <div class="form-group col-md-12"><input type="submit" name="beni" id="beni" onclick="return makepayment()" class="btn btn-success btn-block btn-flat btn-block" value="Transfer Money"/></div> </div><div class="col-md-4"></div>';		                		

		echo $message;
	}

	public function transferMoney(){
		$userid=$this->input->post('id');
		$userBalance=$this->input->post('ubal');
		$mobile=$this->input->post('mobile');
		$benecode=$this->input->post('benecode');
		$transtype=$this->input->post('transtype');			
		$amount=$this->input->post('amount');
		$response = array();
		if($userBalance>$amount){
		$tid = "";
		$j = 1;
		if($amount > 5000){				
			$limit = 5000;
			for ($i = $limit; $i <= $amount ; $i++) {

				$arr=json_encode(array("mobile"=>$mobile, "benecode"=>$benecode, "transtype"=>$transtype, "amount"=>$limit));
			    $url=api_url().'ezypaymoney/moneytransfer';	    
			    $postfields=$arr;
			    $response=curl_function($postfields,$url);
			    $response = json_decode($response, true);		   
				$amount = $amount-$limit;				
				if( $response['statuscode'] == 200){
	    			$deduction = $this->moneytransfer->reduceFund($userid, $limit, $mobile);
	    			$tid = $tid.'<tr><td>Split Transaction ID for Amount '.inr($limit).'</td><td>'.$response['data']['beneficiary_id'].'</td></tr>';
					$j++;	    			
				}else {				
					
					break;
				}				
			}

			if(!$amount == 0) {	

				$arr=json_encode(array("mobile"=>$mobile, "benecode"=>$benecode, "transtype"=>$transtype, "amount"=>$amount));
			    $url=api_url().'ezypaymoney/moneytransfer';	    
			    $postfields=$arr;
			    $response=curl_function($postfields,$url);
			    $response = json_decode($response, true);	
				if( $response['statuscode'] == 200){
	    			$deduction = $this->moneytransfer->reduceFund($userid, $limit, $mobile);	
	    			$tid = $tid.'<tr><td>Split Transaction ID for Amount '.inr($amount).'</td><td>'.$response['data']['beneficiary_id'].'</td></tr>';  			
				}			
				
			}	
		}else{

			$arr=json_encode(array("mobile"=>$mobile, "benecode"=>$benecode, "transtype"=>$transtype, "amount"=>$amount));
		    $url=api_url().'ezypaymoney/moneytransfer';	    
		    $postfields=$arr;
		    $response=curl_function($postfields,$url);
		    $response = json_decode($response, true);
		    $tid = $tid.'<tr><td>Transaction ID for Amount '.inr($amount).'</td><td>'.$response['data']['beneficiary_id'].'</td></tr>';
		    if( $response['statuscode'] == 200){
	    			$deduction = $this->moneytransfer->reduceFund($userid, $limit, $mobile);	    			
			}
		}

	    if( $response['statuscode'] == 200){	    		
	    	if($deduction){
	    	 $message =  '<div class="col-md-3"></div>  
		               	<div class="col-md-6 table-bordered" >
			               		<div class="col-md-12">
			               			<h3 class="pull-left">Receipt</h3>
			               			<a onclick="return location.reload()" style="margin-top: 10px;" class="btn hidden-print btn-danger btn-flat pull-right"><i class="fa fa-reply" aria-hidden="true"></i> Back</a>
			               		</div><div class="clearfix"></div><hr><input type="hidden" class="form-control" id="mobile" name="mobile" value="'.$mobile.'">		               		

								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2" class="hidden-print">
								  <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
								  <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
								</svg>
								<p class="success">'.$response['data']['beneficiary_id'].'<br><table class="table table-striped"><tr><td>Total No of Transaction :</td><td>'.$j.'</td></tr>'. $tid .'<tr><td>Mobile No :</td><td>'.$mobile.'</td></tr><tr><td>Amount :</td><td>'.inr($this->input->post('amount')).'</td></tr></table></p>
			               		</div><div class="col-md-3"></div>';	    	
	    	}
	    }else {
	    	$response['message'] = "Insufficiant API Balance";
	    	$message =  '<div class="col-md-4"></div>  
		               	<div class="col-md-4 table-bordered" >
			               		<div class="col-md-12">
			               			<h3 class="pull-left">Receipt</h3>
			               			<a onclick="return location.reload()" style="margin-top: 10px;" class="btn hidden-print btn-danger btn-flat pull-right"><i class="fa fa-reply" aria-hidden="true"></i> Back</a>
			               		</div><div class="clearfix"></div><hr><input type="hidden" class="form-control" id="mobile" name="mobile" value="'.$mobile.'">			               		
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
								  <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
								  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
								  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
								</svg>
								<p class="error">'.$response['message'].'<br><table class="table table-striped"><tr><td>Mobile No :</td><td>'.$mobile.'</td></tr><tr><td>Amount :</td><td>'.inr($this->input->post('amount')).'</td></tr></tr></table></p>
			               		</div><div class="col-md-4"></div>';
	    }

	    echo $message;
	}else {
		$message =  '<div class="col-md-4"></div>  
		               	<div class="col-md-4 table-bordered" >
			               		<div class="col-md-12">
			               			<h3 class="pull-left">Receipt</h3>
			               			<a onclick="return location.reload()" style="margin-top: 10px;" class="btn hidden-print btn-danger btn-flat pull-right"><i class="fa fa-reply" aria-hidden="true"></i> Back</a>
			               		</div><div class="clearfix"></div><hr><input type="hidden" class="form-control" id="mobile" name="mobile" value="'.$mobile.'">			               		
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
								  <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
								  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
								  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
								</svg>
								<p class="error"> Insufficiant Balance <br><table class="table table-striped"><tr><td>Mobile No :</td><td>'.$mobile.'</td></tr><tr><td>Amount :</td><td>'.inr($this->input->post('amount')).'</td></tr></tr></table></p>
			               		</div><div class="col-md-4"></div>';
		echo $message;
	}
	
}}

/* End of file Moneytransfers.php */
/* Location: ./application/controllers/Moneytransfers.php */