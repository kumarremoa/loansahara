<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recharges extends CI_Controller {

	function __construct() {
        parent::__construct();

        is_login();
        $this->load->model('user');      
        $this->load->model('recharge');      
        $this->load->model('fund');      
        
    }

	public function index()
	{
		$data = array();
        $postData = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));

        // Validate User Auth.        
        if(!CheckPermission(RECHARGE, "own_read")){
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
        $this->load->view('services/prepaid', $data);
        $this->load->view('templates/footer', $data);

	}

	function getOperator(){

		$postfields=json_encode(array("type_id"=>"1"));
		$url=api_url().'recharge/getallprepaidprovider';	  
	    $response=curl_function($postfields,$url);
	    $response = json_decode($response, true);

	    if( $response['statusCode'] == 200){

	    	$message = '<option value="">Select Operator</option>';
	    	foreach ($response['data'] as $value) {	
	    		if ($value['status'] == 1){				
				$message .= '<option value="'.$value['id'].'">'.$value['name'].'</option>'; 	    		
	    	}}
	    	echo $message;
	    }
	}

	function prepaidrecharge(){

		$userid=$this->input->post('id');
		$mobile=$this->input->post('mobile');
		$amount=$this->input->post('amount');
		$operator=$this->input->post('operator');
		$arr=json_encode(array("operator"=>$operator, "amount"=>$amount, "phone"=>$mobile));
		$postfields=$arr;
		
		$url=api_url().'recharge/prepaidrecharge';	  
	    $response=curl_function($postfields,$url);
	    $response = json_decode($response, true);

	   // print_r($response); die;

	    //Dummy Data For Testing
	   // $response = Array("statusCode" => "200", "message" => "Transaction Pending", "data" => Array("txnid" => "218778079", "request_id" => "123dcbedb125", "oper_id" => "4913047241308170139"));
	    //Dummy Data Ends*/

	    if( $response['statusCode'] == 200){

	    	$deduction = $this->recharge->reduceFund($userid, $amount, $mobile);

	    	//---------User info to get slab-----------//
	    	$sdata = $this->user->getRows(array('id'=>$userid));
	    	if($sdata['user_type'] == '2' || $sdata['user_type'] == '14'){
	    		$slab = $sdata['slab'];	
	    		$getAmount = $this->recharge->getcommissionAmount($slab , $sdata['parent_id'], $operator);
	    		if($getAmount['amt'] != 0){
					$this->recharge->commissionSetter($getAmount,$amount,$userid,$deduction,$response['data']['txnid']);
				}
	    	}elseif($sdata['user_type'] == '3'){
	    		$slab = $sdata['slab'];	
	    		$getAmount = $this->recharge->getcommissionAmount($slab , $sdata['parent_id'], $operator);
	    		if($getAmount['amt'] != 0){
					$this->recharge->commissionSetter($getAmount,$amount,$userid,$deduction,$response['data']['txnid']);
				}
				$adata = $this->user->getRows(array('id'=>$sdata['parent_id']));
				$slaba = $adata['slab'];	
	    		$getAmounta = $this->recharge->getcommissionAmount($slaba , $adata['parent_id'], $operator);
	    		if($getAmounta['amt'] != 0){
	    			$getAmounta['amt'] = $getAmounta['amt'] - $getAmount['amt'];	
					$this->recharge->commissionSetter($getAmounta,$amount,$sdata['parent_id'],$deduction,$response['data']['txnid']);
				}

	    	}elseif($sdata['user_type'] == '6'){
	    		$slab = $sdata['slab'];	
	    		$getAmount = $this->recharge->getcommissionAmount($slab , $sdata['parent_id'], $operator);
	    		if($getAmount['amt'] != 0){
					$this->recharge->commissionSetter($getAmount,$amount,$userid,$deduction,$response['data']['txnid']);
				}
				$adata = $this->user->getRows(array('id'=>$sdata['parent_id']));
				$slaba = $adata['slab'];	
	    		$getAmounta = $this->recharge->getcommissionAmount($slaba , $adata['parent_id'], $operator);
	    		if($getAmounta['amt'] != 0){
	    			$getAmountas['amt'] = $getAmounta['amt'] - $getAmount['amt'];	
	    			$getAmountas['type'] = $getAmounta['type'];	
	    			$getAmountas['deduction'] = $getAmounta['deduction'];	
					$this->recharge->commissionSetter($getAmountas,$amount,$sdata['parent_id'],$deduction,$response['data']['txnid']);
				}
				$zdata = $this->user->getRows(array('id'=>$adata['parent_id']));
				$slabz = $zdata['slab'];	
	    		$getAmountz = $this->recharge->getcommissionAmount($slabz , $zdata['parent_id'], $operator);
	    		if($getAmountz['amt'] != 0){
	    			$getAmountz['amt'] = $getAmountz['amt'] - $getAmounta['amt'];	
					$this->recharge->commissionSetter($getAmountz,$amount,$adata['parent_id'],$deduction,$response['data']['txnid']);
				}
	    	}elseif($sdata['user_type'] == '7'){
	    		$slab = $sdata['slab'];	
	    		$getAmount = $this->recharge->getcommissionAmount($slab , $sdata['parent_id'], $operator);
	    		if($getAmount['amt'] != 0){
					$this->recharge->commissionSetter($getAmount,$amount,$userid,$deduction,$response['data']['txnid']);
				}
				$adata = $this->user->getRows(array('id'=>$sdata['parent_id']));
				$slaba = $adata['slab'];	
	    		$getAmounta = $this->recharge->getcommissionAmount($slaba , $adata['parent_id'], $operator);
	    		if($getAmounta['amt'] != 0){
	    			$getAmountas['amt'] = $getAmounta['amt'] - $getAmount['amt'];	
	    			$getAmountas['type'] = $getAmounta['type'];	
	    			$getAmountas['deduction'] = $getAmounta['deduction'];	
					$this->recharge->commissionSetter($getAmountas,$amount,$sdata['parent_id'],$deduction,$response['data']['txnid']);
				}
				$zdata = $this->user->getRows(array('id'=>$adata['parent_id']));
				$slabz = $zdata['slab'];	
	    		$getAmountz = $this->recharge->getcommissionAmount($slabz , $zdata['parent_id'], $operator);
	    		if($getAmountz['amt'] != 0){
	    			$getAmountza['amt'] = $getAmountz['amt'] - $getAmounta['amt'];	
	    			$getAmountza['type'] = $getAmountz['type'];	
	    			$getAmountza['deduction'] = $getAmountz['deduction'];		
					$this->recharge->commissionSetter($getAmountza,$amount,$adata['parent_id'],$deduction,$response['data']['txnid']);
				}
				$qdata = $this->user->getRows(array('id'=>$zdata['parent_id']));
				$slabq = $qdata['slab'];	
	    		$getAmountq = $this->recharge->getcommissionAmount($slabq , $qdata['parent_id'], $operator);
	    		if($getAmountq['amt'] != 0){
	    			$getAmountq['amt'] = $getAmountq['amt'] - $getAmountz['amt'];	
					$this->recharge->commissionSetter($getAmountq,$amount,$zdata['parent_id'],$deduction,$response['data']['txnid']);
				}

	    	}

	    	
	    	if($deduction){
	    	 $message =  '<div class="col-md-4"></div>  
		               	<div class="col-md-4 table-bordered" >
			               		<div class="col-md-12">
			               			<h3 class="pull-left">Receipt</h3>
			               			<a onclick="return location.reload()" style="margin-top: 10px;" class="btn hidden-print btn-danger btn-flat pull-right"><i class="fa fa-reply" aria-hidden="true"></i> Back</a>
			               		</div><div class="clearfix"></div><hr><input type="hidden" class="form-control" id="mobile" name="mobile" value="'.$mobile.'">		               		

								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2" class="hidden-print">
								  <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
								  <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
								</svg>
								<p class="success">'.$response['message'].'<br><table class="table table-striped"><tr><td>Transaction ID :</td><td>'.$response['data']['txnid'].'</td></tr><tr><td>Mobile No :</td><td>'.$mobile.'</td></tr><tr><td>Amount :</td><td>'.inr($amount).'</td></tr><tr><td>Operator Reference No :</td><td>'.$response['data']['oper_id'].'</td></tr></table></p>
			               		</div><div class="col-md-4"></div>';	    	
	    	}
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
								<p class="error">'.$response['message'].'<br><table class="table table-striped"><tr><td>Mobile No :</td><td>'.$mobile.'</td></tr><tr><td>Amount :</td><td>'.inr($amount).'</td></tr></tr></table></p>
			               		</div><div class="col-md-4"></div>';
	    }

	    echo $message;
	}
}

/* End of file Recharges.php */
/* Location: ./application/controllers/Recharges.php */