<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller{

    function __construct() {
        parent::__construct();
    }

    function view_profile($uid){
        $name = $this->model->get_value("name", "users", array("id" => $uid));

        $data = array(
            'name' => $name
        );

        $this->load->view('viewprofile', $data);
    }



}