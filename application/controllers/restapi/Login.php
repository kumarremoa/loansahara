<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('utility_helper');
		$this->load->model('Api_model');
		date_default_timezone_set('Asia/Kolkata');
        
	}

	public function login()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);



	}

	public function sendverifyotp()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);

        if(isset($data->mobile) && $data->mobile)
        {
        	$mobileverify=$this->Api_model->chkmobile($data->mobile);
        	$otp=rand('100000','1000000');

        	if(count($mobileverify)>0)
        	{
        		$update=$this->Api_model->updateotp($data->mobile,$otp);
        		$message='Dear Customer, Your OTP is '.$otp.".";
        		$sendotp=sendotp($data->mobile,$message);

        		 if($sendotp)
                {
                    $array=array('statusCode'=>200, "message" => "Your otp has been sent on mobile no.");
                }else{
                    $array=array('statusCode'=>400, "message" => "Error occured while sending otp!!!");
                }
        	}
        }else{
                $array=array('statusCode'=>400, "message" => "Please send valid parameters!!!");
        }

        $result=json_encode($array);
        print_r($result);
	}

	public function verifyotp()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);

        if(isset($data->mobile) && $data->mobile && isset($data->otp) && $data->otp!='')
        {
        	$verifyotp=$this->Api_model->chkmobileandotp($data->mobile,$data->otp);
        	

        	if(count($verifyotp)>0)
        	{
                $update=$this->Api_model->updateotp($data->mobile,'');
        		
        		if($update)
                {
                    $array=array('statusCode'=>200, "message" => "Your otp has been verifying successfully.","user_id"=>$verifyotp[0]->id);
                }else{
                    $array=array('statusCode'=>400, "message" => "Error occured while verifying otp!!!");
                }
        	}else{
        		$array=array('statusCode'=>400, "message" => "Error occured while verifying otp!!!");
        	}
        }else{
                $array=array('statusCode'=>400, "message" => "Please send valid parameters!!!");
        }

        $result=json_encode($array);
        print_r($result);
	}

	public function getdetailuserdetail()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);

        if(isset($data->mobile) && $data->mobile)
        {
        	$response=$this->Api_model->getdetailuserdetail($data->mobile);
        	if($response)
            {
                $array=array('statusCode'=>200, "message" => "User detail has been getting successfully.","data"=>$response);
            }else{
                $array=array('statusCode'=>400, "message" => "Error occured while verifying otp!!!");
            }

        }else{
                $array=array('statusCode'=>400, "message" => "Please send valid parameters!!!");
        }

        $result=json_encode($array);
        print_r($result);
	}
}