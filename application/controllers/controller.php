<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

	public function index(){
        $this->load->view("page_home.php");
    }
    //page openers
    public function page_addpost(){
        $this->load->view("page_addpost.php");
    }

    public function page_viewbadges(){
        $this->load->view("page_viewbadges.php");
    }

    public function page_viewcoupons(){
        $this->load->view("page_viewcoupons.php");
    }

    public function login(){
        $data = array(
            'user_id' => 1
        );

        $this->session->set_userdata($data);
    }


}
