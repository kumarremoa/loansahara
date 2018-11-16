<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincommission extends CI_Controller {

	function __construct() {
        parent::__construct();
        is_login();
        $this->load->library('form_validation');
        $this->load->model('user');      
        $this->load->model('listall');       
        $this->load->model('fund');       
        $this->load->model('commission');       
        
    }

    /*
     * Admin Users List
     */

    public function index(){   
        

        $data = array();
        $postData = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
        
        if(!CheckPermission(ADMINCOMMISSION, "own_read")){
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
        $this->load->view('commission/adminlist', array());
        $this->load->view('templates/footer', $data);

    }    
    
    public function get_tables() {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $rows = $this->commission->getRow();          
        $mem = array();  
        foreach($rows->result() as $r) {   
            if(CheckPermission(ADMINCOMMISION, "own_update")){        
            
            }else {
            
            }  

            $commission = '<input style="width:50px;" type="text" id="commission-'.$r->id.'" name="commission" onkeypress="return isNumberKey(event,this)" class="form-control emptyinp"  onchange="return comUpdated('.$r->id.')" name="commission" value="'.$r->commission.'" >';          
            $surcharge = '<input style="width:50px;"  type="text" id="surcharge-'.$r->id.'" name="surcharge" onkeypress="return isNumberKey(event,this)" class="form-control emptyinp"  onchange="return comUpdated('.$r->id.')"  name="surcharge" value="'.$r->surcharge.'"  >'; 
           
           $margin = '<select id="margin_type-'.$r->id.'" onchange="return comUpdated('.$r->id.')" name="dtype" class="form-control emptyinp" >';
            
            if($r->margin_type == "flat"){
                 $margin .= '<option selected value="flat">Flat</option>';     
                 $margin .= '<option value="perc">Percentage</option>';  
            }else {
                $margin .= '<option value="flat">Flat</option>';     
                 $margin .= '<option selected value="perc">Percentage</option>';      
            }     
               

            $margin .='<select>';
            $st = $r->status;
            $status = '<select id="status-'.$r->id.'" onchange="return comUpdated('.$r->id.')" name="status" class="form-control emptyinp" >';
            if($r->status == 1){
                 $status .= '<option selected  value="1">Active</option>';     
                 $status .= '<option  value="0">Inactive</option>'; 
            }else {
                 $status .= '<option  value="1">Active</option>';     
                 $status .= '<option selected value="0">Inactive</option>'; 
            }               

            $status .='<select>';


                  

               $mem[] = array(
                    $r->id,
                    $r->api_name,
                    $r->operator_name,
                    $r->type_name,
                    $commission,
                    $surcharge,
                    $margin,
                    $status
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

    public function update(){

        $postData=array();
        $id = $this->input->post('id');
        $postData['commission'] = $this->input->post('commission');
        $postData['surcharge'] = $this->input->post('surcharge');
        $postData['status'] = $this->input->post('status');
        $postData['margin_type'] = $this->input->post('margin_type');

        $update = $this->commission->update($postData, $id);
        if($update){
            echo "test^1^Updated Successfully..!^test";
        }else{
            echo "test^2^Error occured while update your detail!!!^test";
        }


    }



}

/* End of file Admincommission.php */
/* Location: ./application/controllers/Admincommission.php */