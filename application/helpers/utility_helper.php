<?php
 date_default_timezone_set("Asia/Kolkata");
 define('DASHBOARD', 'dashboard');
 define('WHITELABEL', 'whitelabel');
 define('APIUSER', 'apiuser');
 define('MASTER', 'masterdistributors');
 define('AREA', 'areadistributors');
 define('AGENTS', 'agents');
 define('REPORTS', 'reports');
 define('MONEYTRANSFER', 'moneytransfer');
 define('ADMINCOMMISION', 'admincomm');
 define('BUS', 'busbooking');
 define('RECHARGE', 'recharge');
 define('POSTPAID', 'postpaid');
 define('DTH', 'dth');
 define('LANDLINE', 'landline');
 define('HOTELS', 'hotels');
 define('ElECTRICITY', 'electricity');
 define('GAS', 'gas');
 define('WATER', 'water');
 define('BROADBAND', 'broadband');
 define('TEMPLATE', 'template');
 define('COMMISSIONSLAB', 'commissionslab');
 define('ADMINCOMMISSION', 'admincommission');
 define('PGS', 'paymenygateway');
 define('THEMECAT', 'themecategory');
 define('LOANCAT', 'loancategory');
 define('LOANAPPLY', 'loanApply');
  define('LOANPAYMENT', 'loanpayment');

 function is_login(){ 
      if(isset($_SESSION['isUserLoggedIn'])){
          return true;
      }else{
         redirect( base_url().'login', 'refresh');
      }
  }


function sendSMS($message,$mob)
    {
        $url = "http://phonepaysms.com/api/send_http.php";
        $authKey = setting_all('sms_api_key');
        $senderId = setting_all('sms_sender_id');
        $route = "B";
        $postData = array(
              'authkey' => $authKey,
              'mobiles' => $mob,
              'message' => $message,
              'sender' => $senderId,
              'route' => $route
          );
       $ch = curl_init();
         curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $postData
                    ));
       return $output = curl_exec($ch);
}




/*------------Calls All Settings To Display Site------------------------*/
function setting_all($keys='')
	{  
		$CI = get_instance();
		$url = $_SERVER['HTTP_HOST'];

		$CI->db->select('user_id');
		$CI->db->from('loan_setting');
		$CI->db->where('value' , $url);
		$querya = $CI->db->get();
		$resulta = $querya->row_array();		
		$userid = $resulta['user_id'];
		
		if(!empty($keys)){
			$CI->db->select('*');
			$CI->db->from('loan_setting');
			$CI->db->where('keys' , $keys);
			$CI->db->where('user_id' , $userid);
			$query = $CI->db->get();
			$result = $query->row();
			if(!empty($result)){
				 $result = $result->value;
				return $result;
			}
			else
			{
				return false;
			}
		}
		else{
			$CI->load->model('setting');
			$setting= $CI->setting->get_setting();
			return $setting;
		}
		
	}

	function settings() {
		$CI = get_instance();
		$url = $_SERVER['HTTP_HOST'];

		$CI->db->select('user_id');
		$CI->db->from('loan_setting');
		$CI->db->where('value' , $url);
		$querya = $CI->db->get();
		$resulta = $querya->row_array();		
		$userid = $resulta['user_id'];

		$CI->load->model('setting');
		$setting= $CI->setting->get_settings($userid);
		$result = []; 		
		foreach ($setting as $key => $value) {
			$result[$value->keys] = $value->value;
		}
		return $result;
	}

/*------------Upload Anu File------------------------*/
	function fileUpload()
	{	
		$CI =& get_instance();
     	$CI->load->library('email');
		foreach($_FILES as $name => $fileInfo)
		{
			$filename=$_FILES[$name]['name'];
			$tmpname=$_FILES[$name]['tmp_name']; 
			$exp=explode('.', $filename);
			$ext=end($exp);
			$newname=  $exp[0].'_'.time().".".$ext; 
			$config['upload_path'] = 'assets/images/';
			$config['upload_url'] =  base_url().'assets/images/';
			$config['allowed_types'] = "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp";
			$config['max_size'] = '2000000'; 
			$config['file_name'] = $newname;
			$CI->load->library('upload', $config);
			move_uploaded_file($tmpname,"assets/images/".$newname);
			return $newname;
		}
	}
/*
function settings() {
	$CI = get_instance();
	$CI->load->model('setting');
	$setting= $CI->setting->get_setting();
	$result = []; 
	foreach ($setting as $key => $value) {
		$result[$value->keys] = $value->value;
	}
	return $result;
}
*/

	function settingsuserid()
	{ 
		$CI = get_instance();
		$url = $_SERVER['HTTP_HOST'];

		$CI->db->select('user_id');
		$CI->db->from('loan_setting');
		$CI->db->where('value' , $url);

		$querya = $CI->db->get();
		$resulta = $querya->row_array(); 
		return $userid = $resulta['user_id'];
	} 

function inr($number)
{
    if(setlocale(LC_MONETARY, 'en_IN'))
      return money_format('%.0n', $number);
    else {
      $explrestunits = "" ;
      $number = explode('.', $number);
      $num = $number[0];
      if(strlen($num)>3){
          $lastthree = substr($num, strlen($num)-3, strlen($num));
          $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
          $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
          $expunit = str_split($restunits, 2);
          for($i=0; $i<sizeof($expunit); $i++){
              // creates each of the 2's group and adds a comma to the end
              if($i==0)
              {
                  $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
              }else{
                  $explrestunits .= $expunit[$i].",";
              }
          }
          $thecash = $explrestunits.$lastthree;
      } else {
          $thecash = $num;
      }
      if(!empty($number[1])) {
      	if(strlen($number[1]) == 1) {
      		return '₹ ' .$thecash . '.' . $number[1] . '0';
      	} else if(strlen($number[1]) == 2){
      		return '₹ ' .$thecash . '.' . $number[1];
      	} else {
            return 'cannot handle decimal values more than two digits...';
        }
      } else {
      	return '₹ ' .$thecash.'.00';
      }
    }
}

function CheckPermission($moduleName="", $method=""){
	$CI = get_instance();
	$moduleName = strtolower(str_replace(' ', '_', $moduleName));
    $permission = $CI->session->userdata('userType');
  
    if(isset($permission) && $permission != "" ) 
	{
		
        /*if($permission == '1') 
		{
          return true;
        } 
		else 
		{*/	
			$getPermission = array();
			$getPermission = json_decode(getRowByTableColomId('loan_permissions',$permission,'user_type','data'));
			
			
			if (isset($getPermission->$moduleName)) 
			{	
			
			  if(isset($moduleName) && isset($method) && $moduleName != "" && $method != "" )
			  {		
			  		
			  	   $method_arr = explode(',',$method);
			  	   foreach($method_arr as $method_item){ 
				   if(isset($getPermission->$moduleName->$method_item))
				   {  
						return $getPermission->$moduleName->$method_item;
					}
				   
				} 
				//return 0;
              } 
			  else
			  {
                return 0;
              }
			}
			else{return 0;}
      /* }*/
    } 
	else 
	{
      return 0;
    }
  }

  function getRowByTableColomId($tableName='',$id='',$colom='id',$whichColom='')
	{  
		if($colom == 'id' && $tableName != 'loan_users') {
			$colom = $tableName.'_id';
		}
		$CI = get_instance();
		$CI->db->select('*');
		$CI->db->from($tableName);
		$CI->db->where($colom , $id);
		$query = $CI->db->get();
		$result = $query->row();
			if(!empty($result))	
			{	
				if(!empty($whichColom)){
				 $result = $result->$whichColom;
				 return $result;
				}
				else
				{
					return $result;
				}
			}
			else
			{
				return false;
			}
	
	}

	 function getRowByTable($tableName='',$whichColom='')
	{  
		
		$CI = get_instance();
		$CI->db->select('*');
		$CI->db->from($tableName);
		//$CI->db->where($colom , $id);
		$query = $CI->db->get();		
		//$result = $query->result_array();
			if($query->num_rows() > 0)	
			{	
				if(!empty($whichColom)){
				foreach ($query->result_array() as $row) {
                        $result[] = $row['name'];
                }
                return $result;
				}
				else
				{
					return $result;
				}
			}
			else
			{
				return false;
			}
	
	}


	function getAllDataByTable($tableName='',$columnValue='*',$colume='')
	{  
		$CI = get_instance();
		$CI->db->select($columnValue);
		$CI->db->from($tableName);
		$query = $CI->db->get();
		if($query->num_rows() > 0) {
		   $catlog_data = $query->result();
			return $catlog_data;
		}else {return false;}
	}

	function curl_function($postfields,$url)
	{
	    $ch = curl_init();	    
	    $api_key = setting_all('api_key');	     
	    $headers[] = "api_key:".$api_key;
	    curl_setopt($ch, CURLOPT_URL, $url);
	    if($postfields!='')
	    {
	        curl_setopt($ch, CURLOPT_POST, 1);
	        curl_setopt($ch, CURLOPT_POSTFIELDS,$postfields);
	    }    
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    $server_output = curl_exec ($ch);
	    curl_close ($ch);
	    
	    return $server_output;
	}

	function api_url() {
		return 'http://13.127.79.121/itcare.net/';
	}


	function curls_function($url)
	{
	    $ch = curl_init();	   
	 	curl_setopt($ch, CURLOPT_URL, $url);	   
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $server_output = curl_exec ($ch);
	    curl_close ($ch);	    
	    return $server_output;
	}

	function randPasswordGenerator(){
	
	$re = generateStrongPassword();
	return $re = $re.'aA!1';

	}

	function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds')
	{
		$sets = array();
		if(strpos($available_sets, 'l') !== false)
			$sets[] = 'abcdefghjkmnpqrstuvwxyz';
		if(strpos($available_sets, 'u') !== false)
			$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
		if(strpos($available_sets, 'd') !== false)
			$sets[] = '23456789';
		if(strpos($available_sets, 's') !== false)
			$sets[] = '!@#$%&*?';
		$all = '';
		$password = '';
		foreach($sets as $set)
		{
			$password .= $set[array_rand(str_split($set))];
			$all .= $set;
		}
		$all = str_split($all);
		for($i = 0; $i < $length - count($sets); $i++)
			$password .= $all[array_rand($all)];
		$password = str_shuffle($password);
		if(!$add_dashes)
			return $password;
		$dash_len = floor(sqrt($length));
		$dash_str = '';
		while(strlen($password) > $dash_len)
		{
			$dash_str .= substr($password, 0, $dash_len) . '-';
			$password = substr($password, $dash_len);
		}
		$dash_str .= $password;
		return $dash_str;
	}
	
    function calcPayment(float $loanAmount, int $totalPayments, float $interest)
	{
	    //***********************************************************
	    //              INTEREST * ((1 + INTEREST) ^ TOTALPAYMENTS)
	    // PMT = LOAN * -------------------------------------------
	    //                  ((1 + INTEREST) ^ TOTALPAYMENTS) - 1
	    //***********************************************************

	    $value1 = $interest * pow((1 + $interest), $totalPayments);
	    $value2 = pow((1 + $interest), $totalPayments) - 1;
	    $pmt    = $loanAmount * ($value1 / $value2);
	    return $pmt;
	}
?>