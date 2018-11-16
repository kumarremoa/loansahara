
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Postrequest extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('utility_helper');
		$this->load->model('Api_model');
		date_default_timezone_set('Asia/Kolkata');
        
	}

	public function postrequest()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);

        if(isset($data->mobile) && $data->mobile!='' && isset($data->name) && $data->name!='' && isset($data->email) && $data->email!='' && isset($data->datetime) && $data->datetime!='' && isset($data->lat) && $data->lat!='' && isset($data->lng) && $data->lng!='' && isset($data->userid) && $data->userid!='' && isset($data->address) && $data->address!='')
        {
        	$mobile=$data->mobile;
        	$name=$data->name;
        	$email=$data->email;
        	$datetime=$data->datetime;
        	$lat=$data->lat;
        	$lng=$data->lng;
        	$userid=$data->userid;
        	$address=$data->address;

        	$request=$this->Api_model->postrequest($mobile,$name,$email,$datetime,$lat,$lng,$userid,$address);


        	if($request)
            {
                $array=array('statusCode'=>200, "message" => "Your request has been sent successfully.");
            }else{
                $array=array('statusCode'=>400, "message" => "Error occured while sending your request!!!");
            }


        }else{
                $array=array('statusCode'=>400, "message" => "Please send valid parameters!!!");
        }

        $result=json_encode($array);
        print_r($result);
	}

	public function requestaccept()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);

        if(isset($data->request_id) && $data->request_id!='' && isset($data->haw_id) && $data->haw_id!='')
        {
        	$request=$this->Api_model->requestaccept($data->request_id,$data->haw_id);

        	if($request)
            {
                $array=array('statusCode'=>200, "message" => "Request has been accept successfully.");
            }else{
                $array=array('statusCode'=>400, "message" => "Error occured while accepting request!!!");
            }


        }else{
                $array=array('statusCode'=>400, "message" => "Please send valid parameters!!!");
        }

        $result=json_encode($array);
        print_r($result);
	}
}