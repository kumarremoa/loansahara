<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setcommissionslab extends CI_Controller {

	function __construct() {
        parent::__construct();
        is_login();
        $this->load->library('form_validation');
        $this->load->model('user');       
        $this->load->model('commissionslab');       
        
    }

    /*
     * Admin Users List
     */

    public function index(){   
        

        $data = array();
        $postData = array();
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
      
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        
        if(!CheckPermission(COMMISSIONSLAB, "own_read")){
        $this->session->set_userdata('error_msg', 'You are not authorized to access the page..!');
        redirect('dashboard');
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/breadcrum', $data);
        $this->load->view('commissionslab/list', array());
        $this->load->view('templates/footer', $data);

    }    
    
    public function get_tables() {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $rows = $this->commissionslab->getRow($this->session->userdata('userId'));     

        $mem = array(); 
        $i = 1; 
        foreach($rows->result() as $r) {  

            if($r->id == NULL){$i = $i;}
            if($r->operator_id == NULL){$o = $r->operator_ids;}else{$o = $r->operator_id;}
            if($r->slab_a == NULL){$a = "0";}else{$a = $r->slab_a;}
            if($r->slab_b == NULL){$b = "0";}else{$b = $r->slab_b;}
            if($r->slab_c == NULL){$c = "0";}else{$c = $r->slab_c;}
            if($r->slab_d == NULL){$d = "0";}else{$d = $r->slab_d;}
            if($r->slab_e == NULL){$e = "0";}else{$e = $r->slab_e;}           

            $slab_a = '<input style="width:50px;" type="text" id="slab_a-'.$i.'" name="slab_a-'.$i.'" onkeypress="return isNumberKey(event,this)" class="form-control emptyinp"  onchange="return comUpdated('.$i.')" value="'.$a.'" ><input type="hidden" id="operator_id-'.$i.'" name="operator_id" value="'.$o.'">';          
            $slab_b = '<input style="width:50px;" type="text" id="slab_b-'.$i.'" name="slab_b-'.$i.'" onkeypress="return isNumberKey(event,this)" class="form-control emptyinp"  onchange="return comUpdated('.$i.')" value="'.$b.'" >';          
            $slab_c = '<input style="width:50px;" type="text" id="slab_c-'.$i.'" name="slab_c-'.$i.'" onkeypress="return isNumberKey(event,this)" class="form-control emptyinp"  onchange="return comUpdated('.$i.')" value="'.$c.'" >';          
            $slab_d = '<input style="width:50px;" type="text" id="slab_d-'.$i.'" name="slab_d-'.$i.'" onkeypress="return isNumberKey(event,this)" class="form-control emptyinp"  onchange="return comUpdated('.$i.')" value="'.$d.'" >';          
            $slab_e = '<input style="width:50px;" type="text" id="slab_e-'.$i.'" name="slab_e-'.$i.'" onkeypress="return isNumberKey(event,this)" class="form-control emptyinp"  onchange="return comUpdated('.$i.')" value="'.$e.'" >';   
           $type = '<select id="type-'.$i.'" onchange="return comUpdated('.$i.')" name="type-'.$i.'" class="form-control emptyinp" >';
            
            if($r->type == "flat"){
                 $type .= '<option selected value="flat">Flat</option>';     
                 $type .= '<option value="perc">Percentage</option>';  
            }else {
                $type .= '<option value="flat">Flat</option>';     
                 $type .= '<option selected value="perc">Percentage</option>';      
            } 
            $type .='</select>';
            $st = $r->status;
            $status = '<select id="status-'.$i.'" onchange="return comUpdated('.$i.')" name="status-'.$i.'" class="form-control emptyinp" >';
            if($r->status == 1){
                 $status .= '<option selected  value="1">Active</option>';     
                 $status .= '<option  value="0">Inactive</option>'; 
            }else {
                 $status .= '<option  value="1">Active</option>';     
                 $status .= '<option selected value="0">Inactive</option>'; 
            } 
            $status .='</select>';   

            $surcharge = '<select id="surcharge-'.$i.'" onchange="return comUpdated('.$i.')" name="surcharge-'.$i.'" class="form-control emptyinp" >';
            if($r->surcharge == 'surcharge'){
                 $surcharge .= '<option selected  value="surcharge">Surcharge</option>';     
                 $surcharge .= '<option  value="commission">Commission</option>'; 
            }else {
                 $surcharge .= '<option  value="surcharge">Surcharge</option>';     
                 $surcharge .= '<option selected value="commission">Commission</option>'; 
            } 
            $surcharge .='</select>';                 

               $mem[] = array(                    
                    $r->operator_ids,
                    $r->operator_name,
                    $r->operator_type,
                    $slab_a,
                    $slab_b,
                    $slab_c,
                    $slab_d,
                    $slab_e,
                    $surcharge,
                    $type,
                    $status
               );     
        $i++;
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
        $postData['slab_a'] = $this->input->post('slab_a');
        $postData['operator_id'] = $this->input->post('operator_id');
        $postData['slab_b'] = $this->input->post('slab_b');
        $postData['slab_c'] = $this->input->post('slab_c');
        $postData['slab_d'] = $this->input->post('slab_d');
        $postData['slab_e'] = $this->input->post('slab_e');
        $postData['surcharge'] = $this->input->post('surcharge');
        $postData['status'] = $this->input->post('status');
        $postData['type'] = $this->input->post('type');
        
       
        $dat = $this->commissionslab->getRows($postData['operator_id'],$this->session->userdata('userId'));
       //print_r($dat); 
        if($dat != 0){
             $postData['modified_date'] =  date('Y-m-d H:i:s');
            $update = $this->commissionslab->update($postData, $id);
        }else {
             $postData['user_id'] = $this->session->userdata('userId');
             $postData['created_date'] =  date('Y-m-d H:i:s');
             $postData['modified_date'] =  date('Y-m-d H:i:s');
             $update = $this->commissionslab->insert($postData);

        }

        if($update){
            echo "test^1^Updated Successfully..!^test";
        }else{
             
           echo "test^2^Error occured while update your detail!!!^test";
        }


    }



}
