<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {


	function __construct() {
	    parent::__construct();
	    //Checking user is login or not 
	    is_login();
	    $this->load->model("setting");    
  	}

  	

}

/* End of file Settings.php */
/* Location: ./application/controllers/Settings.php */