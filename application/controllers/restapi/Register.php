
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('utility_helper');
		$this->load->model('Api_model');
		date_default_timezone_set('Asia/Kolkata');
        
	}

	public function customer_register()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);

        if(isset($data->email) && isset($data->name) && isset($data->password) && isset($data->mobile) && $data->email!='' && $data->name!='' && $data->password!='' && $data->mobile!='')
        {
        	$type='3';

            $email=strtolower($data->email);
            $name=$data->name;
            $password=$data->password;
            $mobile=$data->mobile;

            $otp=rand('100000','1000000');

            $message="Dear ".$name."Your mobile verification otp is ".$otp;           
            
            $mobileverify=$this->Api_model->chkmobilebyusertype($mobile,$type);
            if(count($mobileverify)==0)
            {
            	
                $userid=$this->Api_model->registeruser($name,$email,$password,$mobile,$type,$otp);
                $sendopt=sendotp($mobile,$message);

                if($userid)
                {
                    $array=array('statusCode'=>200, "message" => "Your mobile no has been register successfully.");
                }else{
                    $array=array('statusCode'=>400, "message" => "Error occured while saving your details!!!");
                }


            }else{
                $array=array('statusCode'=>400, "message" => "Mobile no already exist!!!");
            }


        }else{
                $array=array('statusCode'=>400, "message" => "Please send valid parameters!!!");
        }

               

        $result=json_encode($array);
        print_r($result);
	}


    function profileupdate()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);

        if(isset($data->email) && isset($data->name) && isset($data->adhar) && isset($data->dob) && $data->email!='' && $data->name!='' && $data->adhar!='' && $data->dob!='' && isset($data->address1) && $data->address1!='' && isset($data->address2) && isset($data->state) && $data->state!='' && isset($data->city) && $data->city!='' && isset($data->pincode) && $data->pincode!='' && isset($data->userid) && $data->userid!='')
        {
            $name=$data->name;
            $email=$data->email;
            $adhar=$data->adhar;
            $dob=$data->dob;
            $address1=$data->address1;
            $address2=$data->address2;
            $state=$data->state;
            $city=$data->city;
            $pincode=$data->pincode;
            $userid=$data->userid;

             $profileupdate=$this->Api_model->profileupdate($name,$email,$adhar,$dob,$address1,$address2,$state,$city,$pincode,$userid);
                

                if($profileupdate)
                {
                    $array=array('statusCode'=>200, "message" => "Your profile has been update successfully.");
                }else{
                    $array=array('statusCode'=>400, "message" => "Error occured while updating your details!!!");
                }


        }else{
                $array=array('statusCode'=>400, "message" => "Please send valid parameters!!!");
        }

               

        $result=json_encode($array);
        print_r($result);
    }

    public function getbalance()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);

        if(isset($data->userid) && $data->userid!='')
        {
            $balance=$this->Api_model->getbalance($data->userid);

             if($balance)
                {
                    $array=array('statusCode'=>200, "message" => "Your updated balance has been get successfully.","balance"=>$balance);
                }else{
                    $array=array('statusCode'=>400, "message" => "Error occured while getting your balance!!!");
                }

        }else{
                $array=array('statusCode'=>400, "message" => "Please send valid parameters!!!");
        } 
        $result=json_encode($array);
        print_r($result);
    }

    public function hawker_register()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);

        if(isset($data->aadhar) && isset($data->dob) && isset($data->mobile) && $data->aadhar!='' && $data->dob!='' && $data->mobile!='')
        {
            $type='4';

            $aadhar=$data->aadhar;
            $dob=$data->dob;
            $mobile=$data->mobile;

            $otp=rand('100000','1000000');

            $message="Dear ".$name."Your mobile verification otp is ".$otp;           
            
            $mobileverify=$this->Api_model->chkmobilebyusertype($mobile,$type);
            if(count($mobileverify)==0)
            {
                
                $userid=$this->Api_model->registerhawker($aadhar,$dob,$mobile,$type,$otp);
                $sendopt=sendotp($mobile,$message);

                if($userid)
                {
                    $array=array('statusCode'=>200, "message" => "Your mobile no has been register successfully.");
                }else{
                    $array=array('statusCode'=>400, "message" => "Error occured while saving your details!!!");
                }


            }else{
                $array=array('statusCode'=>400, "message" => "Mobile no already exist!!!");
            }


        }else{
                $array=array('statusCode'=>400, "message" => "Please send valid parameters!!!");
        }

               

        $result=json_encode($array);
        print_r($result);
    }


}	