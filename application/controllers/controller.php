<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

	public function index(){
    }

    public function login(){
        $data = array(
            'user_id' => 1
        );

        $this->session->set_userdata($data);
    }


}
