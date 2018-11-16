<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addbalance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');	
		$this->load->helper('utility_helper');
		$this->load->model('Addmoney_model');
        
	}

	function hashCalculate($salt,$input){
			unset($input['hash']);
			ksort($input);
			$hash_data = $salt;
			foreach ($input as $key=>$value) {
				if (strlen($value) > 0) {
					$hash_data .= '|' . $value;
				}
			}
			$hash = null;
			if (strlen($hash_data) > 0) {
				$hash = strtoupper(hash("sha512", $hash_data));
			}
			return $hash;
		}

	public function loadmoney()
	{
		$order_id=strtoupper(substr(uniqid(sha1(time())),10,14));
		$_POST['return_url']=base_url().'addbalance/addmoneyreturn';
		$_POST['mode']='LIVE';
		$_POST['order_id']=$order_id;
		$_POST['amount']=$this->input->post('addmoney_amount');
		$_POST['currency']='INR';
		$_POST['description']='Add Money';
		$_POST['name']=$this->session->userdata('name');
		$_POST['email']=$this->session->userdata('useremail');
		$_POST['phone']=$this->session->userdata('mobile');
		$_POST['address_line_1']='NA';
		$_POST['address_line_2']='NA';
		$_POST['city']='Gurugram';
		$_POST['state']='Haryana';
		$_POST['zip_code']='122002';
		$_POST['country']='India';
		$_POST['udf1']=$this->session->userdata('user_id');
		$_POST['udf2']=base64_encode($this->input->post('udf2')); ///   Redirect url after updation
		$_POST['udf3']=$this->session->userdata('wl_id');
		$_POST['udf4']='NA';
		$_POST['udf5']='NA';

		$pay_type='NA';

		$date=date('Y-m-d h:i:s');
			$data=array(
				'user_id'=>$this->session->userdata('user_id'),
				//'order_id'=>$order_id,
				'amount'=>$_POST['amount'],
				'pay_type'=>'NA',
				"created_date"=>$date,
				"trans_type"=>'Money Transfer',
				"status"=>"0"
				);

		$this->Addmoney_model->addtransaction($data);
		$this->load->view('loadmoney');
	}

	public function addmoneyreturn()
	{
		if(isset($_POST)){
			$response = $_POST;
			$salt = "1fc3ffd2230c56f4804a9ecbea5ad0bad6b4fd1b"; 
			if(isset($salt) && !empty($salt)){
				$response['calculated_hash']=$this->hashCalculate($salt, $response);
				$response['valid_hash'] = ($response['hash']==$response['calculated_hash'])?'Yes':'No';
			} else {
				$response['valid_hash']=$response['response_code'];
			}
		}

		//print_r($response);die;
		
		$trans_id=$response['transaction_id'];
		$pay_type='Credit';
		$order_id=$response['order_id'];
		$return_url=base64_decode($response['udf2']);
		$user_id=$response['udf1'];
		$narration='Add money with transaction id '.$trans_id;
		$amount=$response['amount'];
		$wl_id=$response['udf3'];
		

		if($response['response_code']=='0')
		{
			$status=1;
			$this->Addmoney_model->updatebalance($user_id,$amount);
			$curr_bal=$this->session->userdata('balance')+$amount;
			$this->session->unset_userdata('balance');
			$this->session->set_userdata('balance',$curr_bal);
		}else{
			$status=2;
		}
		

		$this->Addmoney_model->updatetransaction($pay_type,$trans_id,$user_id,$status,$narration);

		$date=date('Y-m-d h:i:s');
		$pay_type='Debit';
		$narration='Fund transfer of &#8377; '.$amount.' to UserId'.$user_id;
			$data=array(
				'user_id'=>$wl_id,
				'order_id'=>'R-'.$order_id,
				'amount'=>$amount,
				'pay_type'=>$pay_type,
				"created_date"=>$date,
				"trans_type"=>'Fund Transfer',
				"status"=>"1",
				"narration"=>$narration
				);
			//print_r($data);die;
		$this->Addmoney_model->addtransaction($data);
		$this->Addmoney_model->updatebalance($wl_id,$amount);

		  if($response['response_code']==0){
         	$this->session->set_flashdata('success','Your payment was successfull.');
           
	        }else{
	        	$this->session->set_flashdata('error','Error occured while doing payment');
	        	
	              
	        }

		redirect($return_url);
	}

	
}
