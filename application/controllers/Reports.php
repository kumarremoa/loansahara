<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	function __construct() {
        parent::__construct();

        is_login();
        $this->load->model('user');      
        $this->load->model('report');      
        
    }

	public function index(){   

        $data = array();
        $postData = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        // Validate User Auth.        
        if(!CheckPermission(REPORTS, "own_read")){
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

        //load the list page view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('reoprts/list', array());
        $this->load->view('templates/footer', $data);

    }    
    
    public function get_tables() {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        
        if(CheckPermission(REPORTS, "all_read")){
        $rows = $this->report->getRow(); 
        }elseif(CheckPermission(REPORTS, "own_read")){
        $rows = $this->report->getRowMy($this->session->userdata('userId')); 
        }

        $mem = array();  
        foreach($rows->result() as $r) {         	

        			$status = ($r->status == '1')?"Successful":"Unsuccessful";
        			$amount = inr($r->amount);
        			$mman = 'Print';

                    $mem[] = array(
	                    $r->trans_id,
	                    $amount,
	                    $r->pay_type,
	                    $r->narration,
	                    $r->created_date,
	                    $r->trans_type,
	                    $status,
	                    $mman
               		);     
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $rows->num_rows(),
            "recordsFiltered" => $rows->num_rows(),
            "data" => $mem
        );

        echo json_encode($output);
        exit(); 
   		
   	}

}

/* End of file Reports.php */
/* Location: ./application/controllers/Reports.php */