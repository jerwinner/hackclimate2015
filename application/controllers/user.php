<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller{

    function __construct() {
        parent::__construct();
    }

    function add_score(){

    }

    function subtract_score(){

    }

    function log_in(){

    }

    function register(){

    }

    function view_badges($uid){
        $badges = $this->model->get_badges($uid);
        foreach ($badges as $key => $value) {
            $this->load->view('users/viewbadge', $value);
        }
    }

    function view_coupons(){

    }

    function view_profile($uid){
        $name = $this->model->get_value("name", "users", array("id" => $uid));

        $data = array(
            'name' => $name
        );

        $this->load->view('viewprofile', $data);
        $this->view_badges($uid);
    }



}