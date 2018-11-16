<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paymentgateway extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');	
		$this->load->helper('utility_helper');
		$this->load->model('Payment_model');
		$this->load->model('user');
        
	}

	public function index()
	{      
        if(!CheckPermission(PGS, "own_read")){
        $this->session->set_userdata('error_msg', 'You are not authorized to access the page..!');
        redirect('dashboard');
        }

		$data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('users/paymentgateway', array());
        $this->load->view('templates/footer', $data);
	}

	public function get_tables() {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        if ($this->session->userdata('userType') == '1'){
        	$rows = $this->Payment_model->paymentgateway();
        }else {
	    	$wl_id=$this->session->userdata('userId');
	    	//$wl_id='8';
	        $rows = $this->Payment_model->paymentgatewayFilter($wl_id);    
        }
        
        $mem = array();  
        foreach($rows->result() as $r) {   
                
            $mman = '<a href="javascript:;" title="View" class="glyphicon glyphicon-zoom-in" style="padding-right:5px;" data-toggle="modal" data-target="#viewdetailmodal" onclick="viewpaymentgateway(\''.$r->id.'\')"></a> ';
              
            $mman1 = '<a href="javascript:;" data-toggle="tooltip" title="Approve"  class="glyphicon glyphicon-edit" onclick="return confirm(\'Are you sure to approve?\')" ></a>';

            $mman2 = '<a href="javascript:;" data-toggle="tooltip" title="Disapprove"  class="glyphicon glyphicon-remove-sign" style="color: #dd4b39;" onclick="return confirm(\'Are you sure to disapprove?\')" ></a>';
           

           if ($r->document != "") {
              $doc='<a href="'.base_url('assets/images/paymentgateway_doc/').$r->document.'" target="_blank"><i class="fa fa-file-o"></i></a>';
            }else{
                $doc='';
            }
            if($r->status)
            {
            	$status='<span class="label label-success">Approved</span>';
            }else{
            	$status='<span class="label label-danger">Disapprove</span>';
            }
            

               $mem[] = array(
                    $r->id,
                    $r->business_name,
                    $r->email,
                    $r->mobile,
                    $r->gateway_type,
                    $r->created_on,
                    $status,
                    $mman ."&nbsp;&nbsp;&nbsp;". $mman1 . "&nbsp;&nbsp;&nbsp;".$mman2
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

    public function updatestatus($id)
    {
        
    }

    public function viewpaymentgateway()
    {
        $id=$this->input->post('id');

        $query=$this->Payment_model->paymentgatewaydetailbyid($id);
        $response=$query->result_array();

        $data='<table class="table table-bordered">
                    <thead>
                      <tr>
                        
                        <th>Lastname</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       <th>Firstname</th>
                        <td>Doe</td>
                      </tr>
                      <tr>
                        <th>Firstname</th>
                        <td>Moe</td>
                      </tr>
                      <tr>
                        <th>Firstname</th>
                        <td>Dooley</td>
                      </tr>
                    </tbody>
                  </table>';


        print_r($data);
    }
   }