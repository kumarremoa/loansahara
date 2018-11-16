<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fundrequests extends CI_Controller {

	function __construct() {
        parent::__construct();
        is_login();
        $this->load->library('form_validation');
        $this->load->model('user');
        $this->load->model('fundrequest');       
        $this->load->model('listall');       
        $this->load->model('fund');       
        
    }

	public function index()
	{
		$data = array();
        $postData = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
       
        //get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('fundrequest/add', $data);
        $this->load->view('templates/footer', $data);
		
	}

	function showbank(){

		$id = $this->input->post('id');
		$query = $this->fundrequest->showbank($id);
		//print_r($query);die;
	    if($query){
	    	$message = '<option value="">Select Operator</option>';
	    	foreach ($query as $value) {
	    		//print_r($value);die;	
	    		if ($value['status'] == "1"){				
					$message .= '<option value="'.$value['id'].'">'.$value['bank_name'].'('.$value['account_no'].')</option>'; 	
			    }
			}
	    	echo $message;
	    }

	}

	function bankList(){

		$id = $this->input->post('id');
		$query = $this->fundrequest->showbank($id);
		if($query){
	    	$message = '<tr><th>Sl No.</th><th>Bank Name</th><th>Account Name</th><th>Account Number</th><th> IFSC Code</th></tr>';
	    	$i = 1;
	    	foreach ($query as $value) {
	    		if ($value['status'] == "1"){				
					$message .= '<tr><td>'.$i.'</td><td>'.$value['bank_name'].'</td><td>'.$value['account_name'].'</td><td>'.$value['account_no'].'</td><td>'.$value['ifsc_code'].'</td></tr>'; 	
			    }
			    $i++;
			}
	    	echo $message;
	    }   

	}




}

/* End of file Fundrequests.php */
/* Location: ./application/controllers/Fundrequests.php */