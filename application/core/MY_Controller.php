<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
      parent::__construct();
    }

	public function get_user_id(){
        return $this->session->userdata("user_id");
    }

}