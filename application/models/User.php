<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	function __construct() {
        $this->userTbl = 'loan_users';
        $this->userTblTy = 'loan_user_type';
    }
    /*
     * get rows from the users table
     */
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->userTbl);
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
            }
        }
        
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            $query = $this->db->get();
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $query->num_rows();
            }elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
                $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
            }else{
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        //return fetched data
        return $result;
    }

    function getRowsUser($params = array()){
        $this->db->select('*');
        $this->db->from($this->userTblTy);
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
            }
        }
        
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            $query = $this->db->get();
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $query->num_rows();
            }elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
                $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
            }else{
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        //return fetched data
        return $result;
    }

    function getuserDetails($id){

        $this->db->select('loan_users.*,loan_city.name as city_name,loan_state.name as state_name,loan_country.name as country_name');
        $this->db->from('loan_users');
        $this->db->join('loan_city', 'loan_city.id = loan_users.city', 'left');
        $this->db->join('loan_state', 'loan_state.id = loan_users.state', 'left');
        $this->db->join('loan_country', 'loan_country.id = loan_users.country', 'left');
        $this->db->where('loan_users.id',$id);
        $query = $this->db->get();
        return $result = $query->row_array();
          
    }

    function getMD(){
        $this->db->where('user_type', 3);
        $query = $this->db->get('loan_users');   
        return  $query->num_rows();    
    }
    function getAD(){
        $this->db->where('user_type', 6);
        $query = $this->db->get('loan_users');   
        return  $query->num_rows();      
    }
    function getAgent(){
        $this->db->where('user_type', 7);
        $query = $this->db->get('loan_users');   
        return  $query->num_rows();       
    }
    function getCustomer(){
        $this->db->where('user_type', 8);
        $query = $this->db->get('loan_users');   
        return  $query->num_rows();   
    }
    function getAPIUser(){
        $this->db->where('user_type', 5);
        $query = $this->db->get('loan_users');   
        return  $query->num_rows();       
    }
    function getWL(){
        $this->db->where('user_type', 2);
        $query = $this->db->get('loan_users');   
        return  $query->num_rows();       
    }

    function getCountPaymentSumAmt($userid)
    {
        $query=$this->db->query("select count(id) as count, sum(amount) as sum,trans_type FROM loan_transaction WHERE MONTH(created_date) = MONTH(CURRENT_DATE()) and YEAR(created_date) = YEAR(CURRENT_DATE()) and user_id='$userid' group by trans_type");
        return $data=$query->result_array();
    }

    function getCountSaleSumAmtMonth($userid,$date)
    {
        $sql="select count(id) as count, COALESCE(sum(amount),0) as sum FROM loan_transaction WHERE MONTH(created_date) = MONTH('$date') and YEAR(created_date) = YEAR('$date') and user_id='$userid'";
        $query=$this->db->query($sql);
        return $data=$query->result_array();
    }

    function getCountSaleSumAmtDaily($userid,$date)
    {
        $query=$this->db->query("select count(id) as count, COALESCE(sum(amount),0) as sum FROM loan_transaction WHERE date(created_date) = date('$date') and user_id='$userid'");
        return $data=$query->result_array();
    }

    function getCountSaleSumAmtYearly($userid,$date)
    {
        $query=$this->db->query("select count(id) as count, COALESCE(sum(amount),0) as sum FROM loan_transaction WHERE YEAR(created_date) = YEAR('$date') and user_id='$userid'");
        return $data=$query->result_array();
    }

    function updateStatus($data, $id){       


        if(!empty($data) && !empty($id)){
            $update = $this->db->update('loan_users', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }

    }

    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('loan_users', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

    public function updateSettings($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('loan_setting', $data, array('keys'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

    /*
     * Get Whitelabel Users
     */
    function getRowsa($id = ""){
        if(!empty($id)){            
            $query = $this->db->get_where('loan_users', array('id' => $id));
            return $query->row_array();
        }else{
            $this->db->where('user_type', 2);
            $query = $this->db->get('loan_users');
            return $query->result_array();
        }
    }

     function getByEmail($id = ""){
        if(!empty($id)){            
            $query = $this->db->get_where('loan_users', array('email' => $id));
            return $query->row_array();        
        }
    }
    

    public function add_user_type() {
        $rolesName = isset($_REQUEST['rolesName'])?$_REQUEST['rolesName']:'';
        $this->db->where('user_type', $rolesName);
        $result = $this->db->get('loan_permissions')->row();
        if(!empty($result)) {
            return 'This User Type('.$result->user_type.') is alredy exist...';
        } else {
            
            $this->insertRow('loan_user_type', array('name' => $rolesName, 'status' => '1'));
            $user_id = $this->db->insert_id();
            return $this->insertRow('loan_permissions', array('user_type' => $user_id));
        }
    }

    public function insertRow($table, $data){
        $this->db->insert($table, $data);
        return  $this->db->insert_id();
    }

    public function updateRow($table, $col, $colVal, $data) {
        $this->db->where($col,$colVal);
        $this->db->update($table,$data);
        return true;
    }

    function get_template($code){
        $this->db->where('code', $code);
        return $this->db->get('loan_templates')->row();
    }

    function mail_varify() {    
        $ucode = $this->input->get('code');     
        $this->db->select('email as e_mail');        
        $this->db->from('loan_users');
        $this->db->where('var_key',$ucode);
        $query = $this->db->get();     
        $result = $query->row();   
        if(!empty($result->e_mail)){      
            return $result->e_mail;         
        }else{     
            return false;
        }
    }

    function ResetPpassword(){
        $email = $this->input->post('email');
        if($this->input->post('password_confirmation') == $this->input->post('password')){
            $npass = md5($this->input->post('password'));
            $data['password'] = $npass;
            $data['var_key'] = '';
            return $this->db->update('loan_users',$data, "email = '$email'");
        }
    }

    function getcountchildbyparentId($parent_id)
    {
        $this->db->select('id');        
        $this->db->from('loan_users');
        $this->db->where('parent_id',$parent_id);
        $query = $this->db->get(); 
        return $query->result_array();    
    }



    function getCountPaymentSumAmtByDate($userid,$date)
    {
        $sql="select count(id) as count, COALESCE(sum(amount),0) as sum,trans_type,pay_type FROM loan_transaction WHERE DATE(created_date) = DATE('$date') and user_id='$userid' group by trans_type,pay_type";
        $query=$this->db->query($sql);
        return $data=$query->result_array();
    }
    function getClosingByOpeningDate($userid,$date,$pay_type)
    {
        $sql="select count(id) as count, COALESCE(sum(amount),0) as sum FROM loan_transaction WHERE DATE(created_date) = DATE('$date') and user_id='$userid' and pay_type='$pay_type'";
        $query=$this->db->query($sql);
        return $data=$query->result_array();
    }


}

/* End of file User.php */
/* Location: ./application/models/User.php */