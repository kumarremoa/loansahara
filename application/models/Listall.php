<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listall extends CI_Model {

     function getCity() {
        $citylist = array();
        $query =  $this->db->get('loan_city');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $citylist[] = $row;
            }
        }
        return $citylist;     
    }

    function getState() {
        $citylist = array();
        $query =  $this->db->get('loan_state');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $citylist[] = $row;
            }
        }
        return $citylist;     
    }
    function getCountry() {
        $citylist = array();
        $query =  $this->db->get('loan_country');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $citylist[] = $row;
            }
        }
        return $citylist;     
    }
     function getUsertype() {
        $userTypelist = array();
        $query =  $this->db->get('loan_user_type');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $userTypelist[] = $row;
            }
        }
        return $userTypelist;     
    }

    function getPermissiontype() {
            $userTypelist = array();
            $query =  $this->db->get('loan_user_permissions');
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row) {
                    $userTypelist[] = $row;
                }
            }
            return $userTypelist;     
        }

    function getPermission() {
                $userPermissionlist = array();
                $query =  $this->db->get('loan_permissions');
                if ($query->num_rows() > 0) {
                    foreach ($query->result_array() as $row) {
                        $userPermissionlist[] = $row;
                    }
                }
                return $userPermissionlist;     
            }
    function getTypeJoin() {
                    $userPermissionlist = array();

                     $this->db->select('loan_permissions.*,loan_user_type.name as userName,loan_user_type.id as userId');
                    $this->db->from('loan_permissions');
                    $this->db->join('loan_user_type', 'loan_user_type.id = loan_permissions.user_type', 'right');
                    $query = $this->db->get();

                    return $result = $query->result();
                   
                }

}

/* End of file List.php */
/* Location: ./application/models/List.php */